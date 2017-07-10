<?php
namespace NpsSDK;
use SoapClient;
use NpsSDK\ApiException;

/**
 * Created by Nps.
 * User: inge
 * Date: 11/1/16
 * Time: 8:36 AM
 */
class SoapClientSdk extends SoapClient {

  private $_logger;
  
  const ERROR_CONNECT = 1000;
  const ERROR_TIMEOUT = 1001;    

  
    function __construct() {
    $this->_logger = Configuration::logger();
    $options = array(
                  "trace"=>(Configuration::debug() ? 1 : 0),
                  "exceptions"=>1,
                  "connection_timeout" => Configuration::connectionTimeout(),
                  "execution_timeout" => Configuration::executionTimeout(),
                  "cache_wsdl" => WSDL_CACHE_NONE
                  );

    parent::__construct(Configuration::url(), $options);
    }


    private function log($data){
        if (Configuration::debug() && $this->_logger){
              if (Configuration::logLevel() == Constants::INFO){
                  $this->_logger->info(Utils::mask_data($data));
              }
              else{
                  $this->_logger->debug($data);
              }
          }
    }
  
  /**
   * 
   * @param type $request
   * @param type $location
   * @param type $action
   * @param type $version
   * @param type $one_way
   * @return type
   * @throws Exception
   */
  
    public function __doRequest($request, $location, $action, $version, $one_way = FALSE) { 
      $this->log($request);
      $ch = curl_init($location);
      curl_setopt($ch, CURLOPT_VERBOSE, FALSE);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_POST, TRUE);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array("SOAPAction: ".$action,"Content-Type: text/xml"));
      curl_setopt($ch, CURLOPT_TIMEOUT_MS, Configuration::executionTimeout());
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, Configuration::connectionTimeout());
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, (Configuration::verifyPeer() ? '1':'0'));
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_PROXY, Configuration::proxyUrl());
      curl_setopt($ch, CURLOPT_PROXYPORT, Configuration::proxyPort());
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      if (Configuration::proxyUser() != null){
          $proxyauth = Configuration::proxyUser() .':'. Configuration::proxyPass();
          curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
      }
      

      $response = curl_exec($ch);
      $curl_info = curl_getinfo($ch);

      $this->log($response);

      if( curl_errno($ch) ) {          
        if ($curl_info['connect_time'] <= 0) {
          throw new ApiException("Timeout Ocurred", self::ERROR_CONNECT);
        }else {
          throw new \Exception(curl_errno($ch)." - ".curl_error($ch));
        }
      }   

      curl_close($ch);
      return $response;
    }

}