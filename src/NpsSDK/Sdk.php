<?php
/**
 * User: Ingenico ePayments
 * Date: 10/11/16
 * Time: 9:47 AM
 */


namespace NpsSDK;
require_once 'Errors.php';
use NpsSDK\Constants;
use NpsSDK\SoapClientSdk;

class Sdk extends SoapClientSdk
{
    private function callClient($name, $arguments)
    {

        $wrapped_args = array();
        if (!in_array($name, Utils::getMerchDetNotAddServices())){
          $arguments = Utils::addExtraInf($arguments);
        }

        if (Configuration::logLevel() == Constants::DEBUG && Configuration::environment() == Constants::PRODUCTION_ENV){
            throw new LogException("DEBUG level is now allowed in PRODUCTION ENVIRONMENT");
        }
        
        if (!array_key_exists('psp_ClientSession', $arguments)) {
            $arguments = Utils::addSecureHash($arguments, Configuration::secretKey());
        }
        
        if (Configuration::sanitize()){
            $arguments = Utils::sanitize($arguments);
        }
        $wrapped_args[] = $arguments;
        $resp = $this->__soapCall($name, $wrapped_args);
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
    
    function createPaymentMethod($params){
        $resp = $this->callClient(Constants::CREATE_PAYMENT_METHOD, $params);
        return $resp;
    }

    function createPaymentMethodFromPayment($params){
        $resp = $this->callClient(Constants::CREATE_PAYMENT_METHOD_FROM_PAYMENT, $params);
        return $resp;        
    }

    function retrievePaymentMethod($params){
        $resp = $this->callClient(Constants::RETRIEVE_PAYMENT_METHOD, $params);
        return $resp;        
    }

    function updatePaymentMethod($params){
        $resp = $this->callClient(Constants::UPDATE_PAYMENT_METHOD, $params);
        return $resp;
    }

    function deletePaymentMethod($params){
        $resp = $this->callClient(Constants::DELETE_PAYMENT_METHOD, $params);
        return $resp;        
    }

    function createCustomer($params){
        $resp = $this->callClient(Constants::CREATE_CUSTOMER, $params);
        return $resp;        
    }

    function retrieveCustomer($params){
        $resp = $this->callClient(Constants::RETRIEVE_CUSTOMER, $params);
        return $resp;        
    }

    function updateCustomer($params){
        $resp = $this->callClient(Constants::UPDATE_CUSTOMER, $params);
        return $resp;        
    }

    function deleteCustomer($params){
        $resp = $this->callClient(Constants::DELETE_CUSTOMER, $params);
        return $resp;        
    }

    function recachePaymentMethodToken($params){
        $resp = $this->callClient(Constants::RECACHE_PAYMENT_METHOD_TOKEN, $params);
        return $resp;        
    }

    function createPaymentMethodToken($params){
        $resp = $this->callClient(Constants::CREATE_PAYMENT_METHOD_TOKEN, $params);
        return $resp;        
    }

    function retrievePaymentMethodToken($params){
        $resp = $this->callClient(Constants::RETRIEVE_PAYMENT_METHOD_TOKEN, $params);
        return $resp;        
    }

    function createClientSession($params){
        $resp = $this->callClient(Constants::CREATE_CLIENT_SESSION, $params);
        return $resp;        
    }

    function getInstallmentsOptions($params){
        $resp = $this->callClient(Constants::GET_INSTALLMENTS_OPTIONS, $params);
        return $resp;        
    }

    function splitPayOnline2p($params){
        $resp = $this->callClient(Constants::SPLIT_PAY_ONLINE_2P, $params);
        return $resp;        
    }

    function splitAuthorize2p($params){
        $resp = $this->callClient(Constants::SPLIT_AUTHORIZE_2P, $params);
        return $resp;        
    }
    
    function queryCardDetails($params){
        $resp = $this->callClient(Constants::QUERY_CARD_DETAILS, $params);
        return $resp;        
    }
    
}

