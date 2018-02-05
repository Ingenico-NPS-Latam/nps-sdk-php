<?php
/**
 * Created by Nps.
 * User: inge
 * Date: 11/1/16
 * Time: 8:36 AM
 */
namespace NpsSDK;
require_once 'Constants.php';
use NpsSDK\Constants;
class Configuration
{
    public static $global;
    private $_environment = null;
    private $_secretKey = null;
    public $_connectionTimeout = 10000;
    public $_executionTimeout = 60000;
    private $_useCache = False;
    private $_cacheDuration = 86400;
    private $_cacheLocation = '/tmp';
    private $_debug = True;
    private $_verifPeer =false;
    private $_logLevel = Constants::INFO;
    private $_sanitize = True;
    private $_logger = null;
    private $_pem = null;
    private $_pemkey = null;
    private $_proxy_url = null;
    private $_proxy_port = null;
    private $_proxy_username = null;
    private $_proxy_password = null;
    
    /**
     * Nps API version to use
     * @access public
     */
     const API_VERSION =  1;
    
     public static function url()
    {   
        switch(self::environment()) {
         case 'production':
             $url = dirname(__DIR__) . Constants::WSDL_FOLDER . Constants::PRODUCTION_WSDL_FILE;
             break;
         case 'staging':
             $url = dirname(__DIR__) . Constants::WSDL_FOLDER . Constants::STAGING_WSDL_FILE;
             break;
         case 'sandbox':
             $url = dirname(__DIR__) . Constants::WSDL_FOLDER . Constants::SANDBOX_WSDL_FILE;
             break;
         default:
             $url = dirname(__DIR__) . Constants::WSDL_FOLDER . Constants::DEVELOPMENT_WSDL_FILE;
             break;
        }
        return $url;
    }
    
    public static function executionTimeout($value=null){
        if (is_null($value)) {
            return self::$global->getexecutionTimeout();
        }
        self::$global->setexecutionTimeout($value);
    }    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setExecutionTimeout($value)
    {
        $this->_executionTimeout = $value;
    }
    
    public function getExecutionTimeout(){
        return $this->_executionTimeout;
    }

    public static function useCache($value=null){
      if (is_null($value)) {
        return self::$global->getUseCache();
      }
      self::$global->setUseCache($value);
    }

    public function setUseCache($value){
      $this->_useCache = $value;
    }

    public function getUseCache(){
      return $this->_useCache;
    }


  public static function cacheLocation($value=null){
    if (is_null($value)) {
      return self::$global->getCacheLocation();
    }
    self::$global->setCacheLocation($value);
  }

  public function setCacheLocation($value){
    $this->_cacheLocation = $value;
  }

  public function getCacheLocation(){
    return $this->_cacheLocation;
  }

  public static function cacheTTL($value=null){
    if (is_null($value)) {
      return self::$global->getCacheDuration();
    }
    self::$global->setCacheDuration($value);
  }

  public function setCacheDuration($value){
    $this->_cacheDuration = $value;
  }

  public function getCacheDuration(){
    return $this->_cacheDuration;
  }

  public static function connectionTimeout($value=null){
        if (is_null($value)) {
            return self::$global->getConnectionTimeout();
        }
        self::$global->setConnectionTimeout($value);
    }    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setConnectionTimeout($value)
    {
        $this->_connectionTimeout = $value;
    }
    
    public function getConnectionTimeout(){
        return $this->_connectionTimeout;
    }
    
    
    public static function logLevel($value=null){
        if (is_null($value)) {
            return self::$global->getLogLevel();
        }
        self::$global->setLogLevel($value);
    }    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setLogLevel($value)
    {
        $this->_logLevel = $value;
    }
    
    public function getLogLevel(){
        return $this->_logLevel;
    }
    
    public static function verifyPeer($value=null){
        if (is_null($value)) {
            return self::$global->getVerifyPeer();
        }
        self::$global->setVerifyPeer($value);
    }    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setVerifyPeer($value)
    {
        $this->_verifPeer = $value;
    }
    
    public function getVerifyPeer(){
        return $this->_verifPeer;
    }
    
    
    public static function debug($value=null){
        if (is_null($value)) {
            return self::$global->getDebug();
        }
        self::$global->setDebug($value);
    }    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setDebug($value)
    {
        $this->_debug = $value;
    }
    
    public function getDebug(){
        return $this->_debug;
    }
    
    
    
    public static function sanitize($value=null){
        if (is_null($value)) {
            return self::$global->getSanitize();
        }
        self::$global->setSanitize($value);
    }    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setSanitize($value)
    {
        $this->_sanitize = $value;
    }
    
    public function getSanitize(){
        return $this->_sanitize;
    }
    
    
    
    public static function secretKey($value=null){
        if (is_null($value)) {
            return self::$global->getSecretKey();
        }
        self::$global->setSecretKey($value);
    }    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setSecretKey($value)
    {
        $this->_secretKey = $value;
    }
    
    public function getSecretKey(){
        return $this->_secretKey;
    }
    
    public static function environment($value=null){
        if (is_null($value)) {
            return self::$global->getEnvironment();
        }
        self::$global->setEnvironment($value);
    }
    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setEnvironment($value)
    {
        $this->_environment = $value;
    }
    
    public function getEnvironment(){
        return $this->_environment;
    }
    
    
    public static function logger($value=null){
        if (is_null($value)) {
            return self::$global->getLogger();
        }
        self::$global->setLogger($value);
    }    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setLogger($value)
    {
        $this->_logger = $value;
    }
    
    public function getLogger(){
        return $this->_logger;
    }
    
    public static function cert($value=null){
        if (is_null($value)) {
            return self::$global->getCert();
        }
        self::$global->setCert($value);
    }    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setCert($value)
    {
        $this->_pem = $value;
    }
    
    public function getCert(){
        return $this->_pem;
    }
    
    public static function certKey($value=null){
        if (is_null($value)) {
            return self::$global->getCertKey();
        }
        self::$global->setCertKey($value);
    }    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setCertKey($value)
    {
        $this->_pemkey = $value;
    }
    
    public function getCertKey(){
        return $this->_pemkey;
    }
    
    
    public static function proxyUrl($value=null){
        if (is_null($value)) {
            return self::$global->getProxyUrl();
        }
        self::$global->setProxyUrl($value);
    }    
    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setProxyUrl($value)
    {
        $this->_proxy_url = $value;
    }
    
    public function getProxyUrl(){
        return $this->_proxy_url;
    }

  public static function proxyPort($value=null){
    if (is_null($value)) {
      return self::$global->getProxyPort();
    }
    self::$global->setProxyPort($value);
  }

  /**
   * Do not use this method directly. Pass in the environment to the constructor.
   */
  public function setProxyPort($value)
  {
    $this->_proxy_port = $value;
  }

  public function getProxyPort(){
    return $this->_proxy_port;
  }
    
    public static function proxyUser($value=null){
        if (is_null($value)) {
            return self::$global->getProxyUser();
        }
        self::$global->setProxyUser($value);
    }    
    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setProxyUser($value)
    {
        $this->_proxy_username = $value;
    }
    
    public function getProxyUser(){
        return $this->_proxy_username;
    }
    
    public static function proxyPass($value=null){
        if (is_null($value)) {
            return self::$global->getProxyPassword();
        }
        self::$global->setProxyPassword($value);
    }    
    
    /**
     * Do not use this method directly. Pass in the environment to the constructor.
     */
    public function setProxyPassword($value)
    {
        $this->_proxy_password = $value;
    }
    
    public function getProxyPassword(){
        return $this->_proxy_password;
    }
    
    
    /**
     * resets configuration to default
     * @access public
     */
    public static function reset()
    {
        self::$global = new Configuration();
    }
    
}
Configuration::reset();