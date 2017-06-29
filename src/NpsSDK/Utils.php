<?php
/**
 * Created by Nps.
 * User: inge
 * Date: 11/1/16
 * Time: 8:36 AM
 */
namespace NpsSDK;

class Utils{
    public static function getMerchDetNotAddServices(){
        return [Constants::QUERY_TXS,
            Constants::REFUND,
            Constants::SIMPLE_QUERY_TX,
            Constants::CAPTURE,
            Constants::CHANGE_SECRET_KEY,
            Constants::NOTIFY_FRAUD_SCREENING_REVIEW,
            Constants::GET_IIN_DETAILS,
            Constants::QUERY_CARD_NUMBER,
            Constants::CREATE_PAYMENT_METHOD,
            Constants::CREATE_PAYMENT_METHOD_FROM_PAYMENT,
            Constants::RETRIEVE_PAYMENT_METHOD,
            Constants::UPDATE_PAYMENT_METHOD,
            Constants::DELETE_PAYMENT_METHOD,
            Constants::CREATE_CUSTOMER,
            Constants::RETRIEVE_CUSTOMER,
            Constants::UPDATE_CUSTOMER,
            Constants::DELETE_CUSTOMER,
            Constants::RECACHE_PAYMENT_METHOD_TOKEN,
            Constants::CREATE_PAYMENT_METHOD_TOKEN,
            Constants::RETRIEVE_PAYMENT_METHOD_TOKEN,
            Constants::CREATE_CLIENT_SESSION,
            Constants::GET_INSTALLMENTS_OPTIONS,
            Constants::QUERY_CARD_DETAILS];
    }

    public static function addExtraInf($params)
    {
        $info = array("SdkInfo" => Constants::SDK_NAME . Constants::SDK_VERSION);
        if (isset($params["psp_MerchantAdditionalDetails"])){
          $params["psp_MerchantAdditionalDetails"] = array_merge($params["psp_MerchantAdditionalDetails"], $info);
          //$preAddDetails = $params["psp_MerchantAdditionalDetails"];
        }else{
          $params["psp_MerchantAdditionalDetails"] = $info;
        }

        return $params;
    }

    public static function addSecureHash($params, $key)
    {
      ksort($params);
      $concatenated_data = self::concatValues($params);
      $concat_data_w_key = $concatenated_data . $key;
      $s_hash = md5($concat_data_w_key);
      $params["psp_SecureHash"] = $s_hash;
      return $params;
    }

    public static function concatValues($params)
    {
      $concated_data = "";
      foreach ($params as $k => $v){
        if (gettype($v) == 'array') { continue; }
        $concated_data = $concated_data . $v;
      }
      return $concated_data;
    }

    public static function validate_size($value, $k="", $nodo="", $sanitizeStruc){
        if ($nodo != False){
            $key_name = $nodo . "." . $k . ".max_length";
        }else{
            $key_name = $k . ".max_length";
        }
        $size = isset($sanitizeStruc[$key_name]) ? $sanitizeStruc[$key_name] : null;
        if ($size != null){
            $value = substr($value, 0, intval($size));
        }
        return $value;
    }

    public static function sanitize($params, $is_root=True, $nodo = False, $sanitizeStruc = null){
        if ($is_root){
            //$sanitizeStruc = parse_ini_file(dirname(__FILE__) . '/conf/' . 'sanitize_struc.ini');
          $sanitizeStruc = Constants::SANITIZE;
        }
        if ($is_root == True){
            $result_params = array();
        }
        else{
            $result_params = $params;
        }
        foreach ($params as $key => $value) {


            if (is_array($value)){
                if (self::is_assoc($value)){
                    $result_params[$key] = self::sanitize($value, False, $key, $sanitizeStruc);
                }
                elseif (is_array($value)){
                    $result_params[$key] = self::check_sanitize_array($value, $key, $sanitizeStruc);
                }
            }
            else{

                $result_params[$key] = self::validate_size($value, $key, $nodo, $sanitizeStruc);
            }
        }

        return $result_params;
    }

    public static function is_assoc($array){
        $keys = array_keys($array);
        return array_keys($keys) !== $keys;
    }

    public static function check_sanitize_array($params, $nodo, $sanitizeStruc){
        $result_params = array();
        foreach ($params as $x){
            array_push($result_params, self::sanitize($x, False, $nodo, $sanitizeStruc));
        }
        return $result_params;
    }

    public static function mask_data($data){
        $data = self::_mask_c_number($data);
        $data = self::_mask_exp_date($data);
        $data = self::_mask_cvc($data);
        $data = self::_mask_token_c_number($data);
        $data = self::_mask_token_exp_date($data);
        $data = self::_mask_token_cvc($data);
        return $data;
    }

    public static function _mask_token_cvc($data){
      $cvc_key = "</SecurityCode>";
      $cvcs = self::_find_token_cvc($data);
      foreach ($cvcs as $cvc){
        $repeat = strlen($cvc) - strlen($cvc_key);
        $data = str_replace($cvcs, str_repeat("*", $repeat). $cvc_key, $data);
      }
      return $data;
    }

  public static function _find_token_cvc($data){
    $var = '';
    $cvcs = preg_match_all('/\d{3,4}<\/SecurityCode>/', $data, $var);
    return $var[0];
  }

    public static function _mask_cvc($data){
        $cvc_key = "</psp_CardSecurityCode>";
        $cvcs = self::_find_cvc($data);
        foreach ($cvcs as $cvc){
            $repeat = strlen($cvc) - strlen($cvc_key);
            $data = str_replace($cvcs, str_repeat("*", $repeat). $cvc_key, $data);
        }
        return $data;
    }

    public static function _find_cvc($data){
        $var = '';
        $cvcs = preg_match_all('/\d{3,4}<\/psp_CardSecurityCode>/', $data, $var);
        return $var[0];
    }


  public static function _mask_token_exp_date($data){
    $exp_date_key = "</ExpirationDate>";
    $exp_dates = self::_find_token_exp_date($data);
    foreach ($exp_dates as $exp_date){
      $data = str_replace($exp_date, "****" . $exp_date_key, $data);
    }
    return $data;
  }


  public static function _find_token_exp_date($data){
    $var = '';
    $exp_dates = preg_match_all('/\d{4}<\/ExpirationDate>/', $data, $var);
    return $var[0];
  }

    public static function _mask_exp_date($data){
        $exp_date_key = "</psp_CardExpDate>";
        $exp_dates = self::_find_exp_date($data);
        foreach ($exp_dates as $exp_date){
            $data = str_replace($exp_date, "****" . $exp_date_key, $data);
        }
        return $data;
    }


    public static function _find_exp_date($data){
        $var = '';
        $exp_dates = preg_match_all('/\d{4}<\/psp_CardExpDate>/', $data, $var);
        return $var[0];
    }

    public static function _mask_c_number($data){
        $c_number_key = "</psp_CardNumber>";

        $c_numbers = self::_find_c_numbers($data);
        foreach ($c_numbers as $c_number){
            $c_number_len = strlen(substr($c_number,0, strlen($c_number) - strlen($c_number_key)));
            $masked_chars = $c_number_len - 10;
            $replacer = substr($c_number, 0, 6) . str_repeat("*", $masked_chars) . substr($c_number, strlen($c_number) - 4 - strlen($c_number_key), strlen($c_number));
            $data = str_replace($c_number, $replacer, $data);
        }
        return $data;
    }

    public static function _find_c_numbers($data){
        $var = '';
        $c_numbers = preg_match_all('/\d{13,19}<\/psp_CardNumber>/', $data, $var);
        return $var[0];
    }

  public static function _mask_token_c_number($data){
    $c_number_key = "</Number>";

    $c_numbers = self::_find_token_c_numbers($data);
    foreach ($c_numbers as $c_number){
      $c_number_len = strlen(substr($c_number,0, strlen($c_number) - strlen($c_number_key)));
      $masked_chars = $c_number_len - 10;
      $replacer = substr($c_number, 0, 6) . str_repeat("*", $masked_chars) . substr($c_number, strlen($c_number) - 4 - strlen($c_number_key), strlen($c_number));
      $data = str_replace($c_number, $replacer, $data);
    }
    return $data;
  }

  public static function _find_token_c_numbers($data){
    $var = '';
    $c_numbers = preg_match_all('/\d{13,19}<\/Number>/', $data, $var);
    return $var[0];
  }
    
}
    