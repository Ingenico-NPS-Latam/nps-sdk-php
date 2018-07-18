<?php
/**
 * Created by PhpStorm.
 * User: inge
 * Date: 10/17/16
 * Time: 9:21 AM
 */

use NpsSDK\Constants;
use NpsSDK\Configuration;
use NpsSDK\Sdk;
use NpsSDK\ApiException;

// payonline_2p
$API_KEY = "IeShlZMDk8mp8VA6vy41mLnVggnj1yqHcJyNqIYaRINZnXdiTfhF0Ule9WNAUCR6";

Configuration::environment(Constants::DEVELOPMENT_ENV);
Configuration::secretKey($API_KEY);


$sdk = new Sdk();

$params = array(
    'psp_Version'          => '2.2',
    'psp_MerchantId'       => 'psp_test',
    'psp_TxSource'         => 'WEB',
    'psp_MerchTxRef'       => 'ORDER56666-3',
    'psp_MerchOrderId'     => 'ORDER56666',
    'psp_Amount'           => 1000,
    'psp_NumPayments'      => '1',
    'psp_Currency'         => '032', 
    'psp_Country'          => 'ARG', 
    'psp_Product'          => 14,
    'psp_CustomerMail'     => 'yourmail@gmail',
    'psp_CardNumber'       => 4507990000000010, 
    'psp_CardExpDate'      => '1903', 
    'psp_CardSecurityCode' => '306',
    'psp_SoftDescriptor'   => 'Sol Tropical E',
    'psp_PosDateTime'      => '2016-12-01 12:00:00'
    
);
try{
    $resp = $sdk->payOnline2p($params);
}catch(ApiException $e){
    echo 'Code to handle error';
}

var_dump($resp);
/*



//Authorize_2p

#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL);
$params = array(
    'psp_Version'          => '2.2',
    'psp_MerchantId'       => 'psp_test',
    'psp_TxSource'         => 'WEB',
    'psp_MerchTxRef'       => 'ORDER66666-3',
    'psp_MerchOrderId'     => 'ORDER66666',
    'psp_MerchAdditionalRef'    => '0239299238749873249',
    'psp_Amount'           => '1000',
    'psp_NumPayments'      => '1',
    'psp_Currency'         => '152', // Chile
    'psp_Country'            => 'CHL', // ???
    'psp_Product'          => 14,
    'psp_ForceProcessingMethod' => '26', // Transbank_Cl
    'psp_CustomerMail'     => 'sebastiantapia@gmail',
    'psp_CardNumber'       => '4507990000000010', // visa - Aprobada
    'psp_CardExpDate'      => '1903', // mastercard - redeban - aprobada
    'psp_CardSecurityCode' => '306', // Redeban_Co
    'psp_SoftDescriptor'           => 'Sol Tropical ê',
    'psp_PosDateTime'              => date('Y-m-d H:i:s')
);
#$resp $sdk->Authorize_2p($params);

#var_dump($resp);



//PayOnLine_3p


#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL);
$params = array(
    'psp_Version'                  => '2.2',
    'psp_MerchantId'               => 'psp_test',
    'psp_TxSource'                 => 'WEB',
    'psp_PosDateTime'              => date('Y-m-d H:i:s'),
    'psp_MerchTxRef'               => 'ORDER66666-3',
    'psp_MerchOrderId'             => '240', // unico por intento de transaccion
    'psp_MerchAdditionalRef'       => 'W392140',
    'psp_Amount'                   => '50000',
    'psp_NumPayments'              => 1,
    'psp_Currency'                 => '152',
    'psp_CustomerMail'             => 'customer_root@psp.com.ar',
    'psp_MerchantMail'             => 'merchant@psp.com.ar',
    'psp_Product'                  => 14,
    'psp_Country'                  => 'CHL',
    'psp_ReturnURL'                => 'http://psp-client.localhost/simple_query_tx.php',
    'psp_FrmLanguage'              => 'en_US',
    'psp_FrmBackButtonURL'         => 'http://psp-client.localhost/simple_query_tx.php',
    'psp_PurchaseDescription'    => mb_convert_encoding(' !"#$%&\'()*+,-./' . ':;<=>?@' . '[\\]^_`' . '{|}~', "LATIN1", "auto"),
    'psp_SoftDescriptor'           => 'Zapatos',
    'psp_ForceProcessingMethod' => '27', // Transbank_Cl_Remote3p
    'psp_CustomerAdditionalDetails' => array(
        'EmailAddress'=>'pepe@pepe.com',
        'AlternativeEmailAddress'=>'pepito@pepe.com',
        'AccountID'=>'2',
        'AccountCreatedAt'=>'2014-01-01',
        'AccountPreviousActivity'=>'1',
        'AccountHasCredentials'=>'1',
        'DeviceType'=>'2',
        'BrowserLanguage'=>'ES',
        'HttpUserAgent'=>'User Agent TEST, filled by merchant',
    )
);
#$resp $sdk->PayOnLine_3p($params);

#var_dump($resp);


//Authorize_3p
#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL);
$params = array(
    'psp_Version'                  => '2.2',
    'psp_MerchantId'               => 'psp_test',
    'psp_TxSource'                 => 'WEB',
    'psp_PosDateTime'              => date('Y-m-d H:i:s'),
    'psp_MerchTxRef'               => 'ORDER66666-3',
    'psp_MerchOrderId'             => '240', // unico por intento de transaccion
    'psp_MerchAdditionalRef'       => 'W392140',
    'psp_Amount'                   => '50000',
    'psp_NumPayments'              => 1,
    'psp_Currency'                 => '152',
    'psp_CustomerMail'             => 'customer_root@psp.com.ar',
    'psp_MerchantMail'             => 'merchant@psp.com.ar',
    'psp_Product'                  => 14,
    'psp_Country'                  => 'CHL',
    'psp_ReturnURL'                => 'http://psp-client.localhost/simple_query_tx.php',
    'psp_FrmLanguage'              => 'en_US',
    'psp_FrmBackButtonURL'         => 'http://psp-client.localhost/simple_query_tx.php',
    'psp_PurchaseDescription'    => mb_convert_encoding(' !"#$%&\'()*+,-./' . ':;<=>?@' . '[\\]^_`' . '{|}~', "LATIN1", "auto"),
    'psp_SoftDescriptor'           => 'Zapatos',
    'psp_ForceProcessingMethod' => '27', // Transbank_Cl_Remote3p
    'psp_CustomerAdditionalDetails' => array(
        'EmailAddress'=>'pepe@pepe.com',
        'AlternativeEmailAddress'=>'pepito@pepe.com',
        'AccountID'=>'2',
        'AccountCreatedAt'=>'2014-01-01',
        'AccountPreviousActivity'=>'1',
        'AccountHasCredentials'=>'1',
        'DeviceType'=>'2',
        'BrowserLanguage'=>'ES',
        'HttpUserAgent'=>'User Agent TEST, filled by merchant',
    )
);
#$resp $sdk->Authorize_3p($params);

#var_dump($resp);

//SplitPayOnLine_3p
#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL);
$params = array(
    'psp_Version'          => '2.2',
    'psp_MerchantId'       => 'psp_test',
    'psp_TxSource'         => 'WEB',
    'psp_MerchOrderId'     => 'W392140',
    'psp_ReturnURL'        => 'http://psp-client.localhost/simple_query_tx.php',
    'psp_FrmLanguage'      => 'en_US',
    'psp_FrmBackButtonURL' => 'http://psp-client.localhost/simple_query_tx.php',
    'psp_Amount'           => '3000',

    'psp_Currency'         => '032',
    'psp_Country'          => 'ARG',
    'psp_Product'          => '14',
    'psp_CustomerMail'     => 'customer@psp.com.ar',
    'psp_MerchantMail'     => 'merchant@psp.com.ar',
    'psp_PosDateTime'      => date('Y-m-d H:i:s'),
    'psp_PurchaseDescription' => 'Description XYZ',
    'psp_SoftDescriptor'   => 'Com X Art 15',
    'psp_UseMultipleProducts' => '1',
    'psp_Transactions' => array(
        array(
            'psp_MerchantId'  => 'psp_test',
            'psp_MerchTxRef'  => 'ORDER96666-3',
            'psp_Amount'      => '1000',
            'psp_NumPayments' => '6',
            'psp_Product'     => '14',
        ),
        array(
            'psp_MerchantId'  => 'psp_test_fee',
            'psp_MerchTxRef'  => 'ORDER66366-3',
            'psp_Amount'      => '2000',
            'psp_NumPayments' => '1',
            'psp_Product'     => '5',
        )
    )
);
#$resp $sdk->SplitPayOnLine_3p($params);
#var_dump($resp);


//SplitAuthorize_3p
#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL);
$params = array(
    'psp_Version'          => '2.2',
    'psp_MerchantId'       => 'psp_test',
    'psp_TxSource'         => 'WEB',
    'psp_MerchOrderId'     => 'W392140',
    'psp_ReturnURL'        => 'http://psp-client.localhost/simple_query_tx.php',
    'psp_FrmLanguage'      => 'en_US',
    'psp_FrmBackButtonURL' => 'http://psp-client.localhost/simple_query_tx.php',
    'psp_Amount'           => '3000',

    'psp_Currency'         => '032',
    'psp_Country'          => 'ARG',
    'psp_Product'          => '14',
    'psp_CustomerMail'     => 'customer@psp.com.ar',
    'psp_MerchantMail'     => 'merchant@psp.com.ar',
    'psp_PosDateTime'      => date('Y-m-d H:i:s'),
    'psp_PurchaseDescription' => 'Description XYZ',
    'psp_SoftDescriptor'   => 'Com X Art 15',
    'psp_UseMultipleProducts' => '1',
    'psp_Transactions' => array(
        array(
            'psp_MerchantId'  => 'psp_test',
            'psp_MerchTxRef'  => 'ORDER96666-3',
            'psp_Amount'      => '1000',
            'psp_NumPayments' => '6',
            'psp_Product'     => '14',
        ),
        array(
            'psp_MerchantId'  => 'psp_test_fee',
            'psp_MerchTxRef'  => 'ORDER66366-3',
            'psp_Amount'      => '2000',
            'psp_NumPayments' => '1',
            'psp_Product'     => '5',
        )
    )
);
#$resp $sdk->SplitAuthorize_3p($params);
#var_dump($resp);

//CashPayment_3p
#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL);
$params = array(
    'psp_Version'                => '2.2',
    'psp_MerchantId'             => 'psp_test',
    'psp_TxSource'               => 'WEB',
    'psp_PosDateTime'            => date('Y-m-d H:i:s'),
    'psp_MerchTxRef'             => 'ORDER96666-3', // unico
    'psp_MerchOrderId'           => '240',
    'psp_Currency'               => '032',
    'psp_CustomerMail'           => 'customer@psp.com.ar',
    'psp_MerchantMail'           => 'merchant@psp.com.ar',
    'psp_Product'                => 301,//pagofacil
    'psp_Country'                => 'ARG',
    'psp_ReturnURL'              => 'http://psp-client.localhost/simple_query_tx.php',
    'psp_FrmLanguage'            => 'es_AR',
    'psp_FrmBackButtonURL'       => 'http://urlback',
    'psp_FirstExpDate'           => '2017-12-30',
    'psp_MerchAdditionalRef'     => 'W392140',
    'psp_Amount'                 => '150000',
    'psp_CustomerDocNum'         => '27087764',
    'psp_PurchaseDescription'    => 'medias rayadas',
    'psp_ForceProcessingMethod' => '5', // Pagofacil
    'psp_BillingDetails' => array(
        'Person'=>array(
            'FirstName'=>'Juan',
            'LastName'=>'Perez',
            'MiddleName'=>'Javier',
            'PhoneNumber1'=>'4123-1234',
            'PhoneNumber2'=>'4123-1234',
            'Gender'=>'M',
            'DateOfBirth'=> '1987-01-01',
            'Nationality'=>'ARG',
            'IDNumber'=>'32123123',
            'IDType'=>'100',
        ),
        'Address'=>array(
            'Street'=>'callefalsa',
            'HouseNumber'=>'123',
            'AdditionalInfo'=>'3',
            'City'=>'capìtal federal',
            'StateProvince'=>'Buenos Aires',
            'Country'=>'ARG',
            'ZipCode'=>'1414',
        ),
    ),
);
#$resp $sdk->CashPayment_3p($params);
#var_dump($resp);


//BankPayment_3p
#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL);
$params = array(
    'psp_Version'           => '2.2',
    'psp_MerchantId'        => 'psp_test',
    'psp_TxSource'          => 'WEB',
    'psp_MerchTxRef'        => 'ORDER66666-3',
    'psp_MerchOrderId'      => '126',
    'psp_MerchAdditionalRef'=> 'W392140',
    'psp_ReturnURL'         => 'http://psp-client.localhost/simple_query_tx.php',
    'psp_FrmLanguage'       => 'es_AR',
    'psp_FrmBackButtonURL'  => 'http://urlback',
    'psp_ScreenDescription' => 'Desc. pantalla',
    'psp_TicketDescription' => 'Descripcion de Ticket',
    'psp_Currency'          => '032', //ARG
    'psp_Country'           => 'ARG',
    'psp_Product'           => '320', //pagomiscuentas?
    'psp_Amount1'           => '10000',
    'psp_ExpDate1'          => '2016-12-28',
    'psp_CustomerMail'      => 'customer@psp.com.ar',
    'psp_PosDateTime'       => date('Y-m-d H:i:s')
);
#$resp $sdk->BankPayment_3p($params);


#var_dump($resp);

//Capture
#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL);
$params = array(
    'psp_Version'            => '2.2',
    'psp_MerchantId'         => 'psp_test',
    'psp_TxSource'           => 'WEB',
    'psp_MerchTxRef'         => 'ORDER66666-3',
    'psp_MerchAdditionalRef' => 111, ///getRandMerchAdditionalRef(),
    'psp_TransactionId_Orig' => '96763',
    'psp_AmountToCapture'    => '5000',
    'psp_PosDateTime'        => date('Y-m-d H:i:s'),
    'psp_UserId'             => 'api_test',
);
#$resp $sdk->Capture($params);
#var_dump($resp);


//Refund
#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL);
$params = array(
    'psp_MerchTxRef'         => 'ORDER66666-3',
    'psp_Version' => '2.2',
    'psp_MerchantId' => 'psp_test',
    'psp_TxSource' => 'WEB',
    'psp_TransactionId_Orig' => '96830',
    'psp_AmountToRefund' => '1000',
    'psp_PosDateTime' => '2015-12-03 16:32:43',
);
#$resp $sdk->Refund($params);
#var_dump($resp);


//SimpleQueryTx
#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL);
$params = array(
    'psp_Version'         => '2.2',
    'psp_MerchantId'      => 'psp_test',
    'psp_QueryCriteria'   => 'T',
    'psp_QueryCriteriaId' => "1111",
    'psp_PosDateTime'     => date('Y-m-d H:i:s')
);
##$resp $sdk->SimpleQueryTx($params);


//QueryTxs
#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL, null, true);
$params = array(
    'psp_Version'          => '2.2',
    'psp_MerchantId'       => 'psp_test',
    'psp_QueryCriteria'    => 'O',
    'psp_QueryCriteriaId'  => '41',
    'psp_PosDateTime'      => date('Y-m-d H:i:s')
);
$resp = $sdk->QueryTxs($params);
#var_dump($resp);


//ChangeSecretKey
#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL);
$params = array(
    'psp_Version'          => '2.2',
    'psp_MerchantId'       => 'psp_test',
    'psp_NewSecretKey'    => 'P1SPiAVp3TtAvWFdLceTvlftm2QO5TFUShr9sNytqp1jJGLcsz4nljeVk3rpW6Hw',
    'psp_PosDateTime'      => date('Y-m-d H:i:s')
);
#$resp $sdk->ChangeSecretKey($params);


#var_dump($resp);
//FraudScreening
#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL);
$params = array(
    'psp_Version'                  => '2.2',
    'psp_MerchantId'               => 'psp_test',
    'psp_TxSource'                 => 'WEB',
    'psp_PosDateTime'              => date('Y-m-d H:i:s'),
    'psp_MerchTxRef'               => 'ORDER66666-3',
    'psp_MerchOrderId'             => '240', // unico por intento de transaccion
    'psp_MerchAdditionalRef'       => 'W392140',
    'psp_Amount'                   => '100',
    'psp_NumPayments'              => 1,
    'psp_Currency'                 => '986',
    'psp_Product'                  => 1,
    'psp_Country'                  => 'BRA',
    'psp_PurchaseDescription'      => 'RemeraAAA01',
    'psp_CardNumber'               => '370000000001106',
    'psp_CardExpDate'              => '1512'
);
#$resp $sdk->FraudScreening($params);

#var_dump($resp);

//NotifyFraudScreeningReview
#require 'NpsSdk.php';
$sdk = new NpsSdk($API_KEY, SAND_URL);
$params = array(
    'psp_Version'          => '2.2',
    'psp_MerchantId'       => 'psp_test',
    'psp_Criteria'         => 'T',
    'psp_CriteriaId'       => '76577',
    'psp_ReviewResult'     => 'A',
    'psp_PosDateTime'      => date('Y-m-d H:i:s'),
);

#$resp $sdk->NotifyFraudScreeningReview($params);


#var_dump($resp);
*/