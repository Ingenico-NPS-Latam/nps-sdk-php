<?php
/**
 * User: Ingenico ePayments
 * Date: 10/11/16
 * Time: 9:47 AM
 */


namespace NpsSDK;
require_once './vendor/autoload.php';
use NpsSDK\Constants;
use NpsSDK\SoapClientSdk;
#include_once 'SoapClientSdk.php';
#include_once 'Constants.php';
#include_once 'Utils.php';

class Sdk extends SoapClientSdk
{
    private function callClient($name, $arguments)
    {
        #$this->client = new SoapClientSdk();
        $wrapped_args = array();
        $arguments = $this->addExtraInf($arguments);
        $arguments = $this->addSecureHash($arguments, Configuration::secretKey());
        if (Configuration::sanitize()){
            $arguments = Utils::sanitize($arguments);
        }
        $wrapped_args[] = $arguments;
        try{
            $resp = $this->__soapCall($name, $wrapped_args);
        } catch (Exception $e){
            throw new ApiException("Connection Timeout");
        }
        return $resp;

    }

    function payOnline2p($params){
        $resp = $this->callClient(Constants::PAY_ONLINE_2P, $params);
        return $resp;
    }
    
    function authorize2p($params){
        $resp = $this->callClient(Constants::AUTHORIZE_2P, $params);
        return $resp;
    }
    
    function queryTxs($params){
        $resp = $this->callClient(Constants::QUERY_TXS, $params);
        return $resp;
    }
    
    function simpleQueryTx($params){
        $resp = $this->callClient(Constants::SIMPLE_QUERY_TX, $params);
        return $resp;
    }
    
    function refund($params){
        $resp = $this->callClient(Constants::REFUND, $params);
        return $resp;
    }
    
    function capture($params){
        $resp = $this->callClient(Constants::CAPTURE, $params);
        return $resp;
    }
    
    function authorize3p($params){
        $resp = $this->callClient(Constants::AUTHORIZE_3P, $params);
        return $resp;
    }
    
    function bankPayment3p($params){
        $resp = $this->callClient(Constants::BANK_PAYMENT_3P, $params);
        return $resp;
    }
    
    function cashPayment3p($params){
        $resp = $this->callClient(Constants::CASH_PAYMENT_3P, $params);
        return $resp;
    }
    
    function changeSecretKey($params){
        $resp = $this->callClient(Constants::CHANGE_SECRET_KEY, $params);
        return $resp;
    }
    
    function fraudScreening($params){
        $resp = $this->callClient(Constants::FRAUD_SCREENING, $params);
        return $resp;
    }
    
    function notifyFraudScreeningReview($params){
        $resp = $this->callClient(Constants::NOTIFY_FRAUD_SCREENING_REVIEW, $params);
        return $resp;
    }
    
    function payOnline3p($params){
        $resp = $this->callClient(Constants::PAY_ONLINE_3P, $params);
        return $resp;
    }
    
    function splitAuthorize3p($params){
        $resp = $this->callClient(Constants::SPLIT_AUTHORIZE_3P, $params);
        return $resp;
    }
    
    function splitPayOnline3p($params){
        $resp = $this->callClient(Constants::SPLIT_PAY_ONLINE_3P, $params);
        return $resp;
    }
    
    function queryCardNumber($params){
        $resp = $this->callClient(Constants::QUERY_CARD_NUMBER, $params);
        return $resp;
    }
    
    function getIinDetails($params){
        $resp = $this->callClient(Constants::GET_IIN_DETAILS, $params);
        return $resp;
    }
    
}

