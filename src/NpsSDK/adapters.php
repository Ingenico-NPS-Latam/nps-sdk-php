<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace NpsSDK;

class KloggerAdapter extends PsrLogAbstractLogger implements PsrLogLoggerInterface
{
    private $logger;    
    
    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    public function log($level, $message, array $context = array())
    {
        $message = (string)$message;

        switch ($level) {
            case PsrLogLogLevel::EMERGENCY:
                $this->logger->logEmerg($message, $context);
                break;
            case PsrLogLogLevel::ALERT:
                $this->logger->logAlert($message, $context);
                break;
            case PsrLogLogLevel::CRITICAL:
                $this->logger->logCrit($message, $context);
                break;
            case PsrLogLogLevel::ERROR:
                $this->logger->logError($message, $context);
                break;
            case PsrLogLogLevel::WARNING:
                $this->logger->logWarn($message, $context);
                break;
            case PsrLogLogLevel::NOTICE:
                $this->logger->logNotice($message, $context);
                break;
            case PsrLogLogLevel::INFO:
                $this->logger->logInfo($message, $context);
                break;
            case PsrLogLogLevel::DEBUG:
                $this->logger->logDebug($message);
                break;
            default:
                throw new PsrLogInvalidArgumentException(
                    "Unknown severity level"
                );
        }
    }
}
