<?php
/**
 * Created by PhpStorm.
 * User: inge
 * Date: 11/1/16
 * Time: 8:36 AM
 */
namespace NpsSDK;

class ApiException extends \Exception{
    function __construct($msg) {
        parent::__construct($msg);
    }
}
    
class LogException extends \Exception{
    function __construct($msg) {
        parent::__construct($msg);
    }
}