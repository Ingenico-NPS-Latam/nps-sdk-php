<?php
/**
 * Created by Nps.
 * User: inge
 * Date: 11/1/16
 * Time: 8:36 AM
 */
namespace NpsSDK;
class Constants
{
    const SDK_VERSION = "1.1.4";
    const SDK_NAME = "PHP SDK";
    const PAY_ONLINE_2P = "PayOnLine_2p";
    const AUTHORIZE_2P = "Authorize_2p";
    const QUERY_TXS = "QueryTxs";
    const SIMPLE_QUERY_TX = "SimpleQueryTx";
    const REFUND = "Refund";
    const CAPTURE = "Capture";
    const AUTHORIZE_3P = "Authorize_3p";
    const BANK_PAYMENT_3P = "BankPayment_3p";
    const CASH_PAYMENT_3P = "CashPayment_3p";
    const CHANGE_SECRET_KEY = "ChangeSecretKey";
    const FRAUD_SCREENING = "FraudScreening";
    const NOTIFY_FRAUD_SCREENING_REVIEW = "NotifyFraudScreeningReview";
    const PAY_ONLINE_3P = "PayOnLine_3p";
    const SPLIT_AUTHORIZE_3P = "SplitAuthorize_3p";
    const SPLIT_PAY_ONLINE_3P = "SplitPayOnLine_3p";
    const BANK_PAYMENT_2P = "BankPayment_2p";
    const SPLIT_PAY_ONLINE_2P = "SplitPayOnLine_2p";
    const SPLIT_AUTHORIZE_2P = "SplitAuthorize_2p";
    const QUERY_CARD_NUMBER = "QueryCardNumber";
    const QUERY_CARD_DETAILS = "QueryCardDetails";
    const GET_IIN_DETAILS = "GetIINDetails";
    const WSDL_FOLDER = "/NpsSDK/wsdl/";
    const STAGING_WSDL_FILE = "staging.wsdl";
    const PRODUCTION_WSDL_FILE = "production.wsdl";
    const SANDBOX_WSDL_FILE = "sandbox.wsdl";
    const DEVELOPMENT_WSDL_FILE = "development.wsdl";
    const STAGING_ENV = "staging";
    const PRODUCTION_ENV = "production";
    const SANDBOX_ENV = "sandbox";
    const DEVELOPMENT_ENV = "development";
    const CREATE_PAYMENT_METHOD = "CreatePaymentMethod";
    const CREATE_PAYMENT_METHOD_FROM_PAYMENT = "CreatePaymentMethodFromPayment";
    const RETRIEVE_PAYMENT_METHOD = "RetrievePaymentMethod";
    const UPDATE_PAYMENT_METHOD = "UpdatePaymentMethod";
    const DELETE_PAYMENT_METHOD = "DeletePaymentMethod";
    const CREATE_CUSTOMER = "CreateCustomer";
    const RETRIEVE_CUSTOMER = "RetrieveCustomer";
    const UPDATE_CUSTOMER = "UpdateCustomer";
    const DELETE_CUSTOMER = "DeleteCustomer";
    const RECACHE_PAYMENT_METHOD_TOKEN =  "RecachePaymentMethodToken";
    const CREATE_PAYMENT_METHOD_TOKEN = "CreatePaymentMethodToken";
    const RETRIEVE_PAYMENT_METHOD_TOKEN =  "RetrievePaymentMethodToken";
    const CREATE_CLIENT_SESSION = "CreateClientSession";
    const GET_INSTALLMENTS_OPTIONS = "GetInstallmentsOptions";
    const DEBUG = "DEBUG";
    const INFO = "INFO";
    const ERROR = "ERROR";
    const SANITIZE = array(
        'psp_Person.FirstName.max_length' => '128',
        'psp_Person.LastName.max_length' => '64',
        'psp_Person.MiddleName.max_length' => '64',
        'psp_Person.PhoneNumber1.max_length' => '32',
        'psp_Person.PhoneNumber2.max_length' => '32',
        'psp_Person.Gender.max_length' => '1',
        'psp_Person.Nationality.max_length' => '3',
        'psp_Person.IDNumber.max_length' => '40',
        'psp_Person.IDType.max_length' => '5',
        'psp_Address.Street.max_length' => '128',
        'psp_Address.HouseNumber.max_length' => '32',
        'psp_Address.AdditionalInfo.max_length' => '128',
        'psp_Address.City.max_length' => '40',
        'psp_Address.StateProvince.max_length' => '40',
        'psp_Address.Country.max_length' => '3',
        'psp_Address.ZipCode.max_length' => '10',
        'psp_OrderItem.Description.max_length' => '127',
        'psp_OrderItem.Type.max_length' => '20',
        'psp_OrderItem.SkuCode.max_length' => '48',
        'psp_OrderItem.ManufacturerPartNumber.max_length' => '30',
        'psp_OrderItem.Risk.max_length' => '1',
        'psp_Leg.DepartureAirport.max_length' => '3',
        'psp_Leg.ArrivalAirport.max_length' => '3',
        'psp_Leg.CarrierCode.max_length' => '2',
        'psp_Leg.FlightNumber.max_length' => '5',
        'psp_Leg.FareBasisCode.max_length' => '15',
        'psp_Leg.FareClassCode.max_length' => '3',
        'psp_Leg.BaseFareCurrency.max_length' => '3',
        'psp_Passenger.FirstName.max_length' => '50',
        'psp_Passenger.LastName.max_length' => '30',
        'psp_Passenger.MiddleName.max_length' => '30',
        'psp_Passenger.Type.max_length' => '1',
        'psp_Passenger.Nationality.max_length' => '3',
        'psp_Passenger.IDNumber.max_length' => '40',
        'psp_Passenger.IDType.max_length' => '10',
        'psp_Passenger.IDCountry.max_length' => '3',
        'psp_Passenger.LoyaltyNumber.max_length' => '20',
        'psp_SellerDetails.IDNumber.max_length' => '40',
        'psp_SellerDetails.IDType.max_length' => '10',
        'psp_SellerDetails.Name.max_length' => '128',
        'psp_SellerDetails.Invoice.max_length' => '32',
        'psp_SellerDetails.PurchaseDescription.max_length' => '32',
        'psp_SellerDetails.MCC.max_length' => '5',
        'psp_SellerDetails.ChannelCode.max_length' => '3',
        'psp_SellerDetails.GeoCode.max_length' => '5',
        'psp_TaxesRequest.TypeId.max_length' => '5',
        'psp_MerchantAdditionalDetails.Type.max_length' => '1',
        'psp_MerchantAdditionalDetails.SdkInfo.max_length' => '48',
        'psp_MerchantAdditionalDetails.ShoppingCartInfo.max_length' => '48',
        'psp_MerchantAdditionalDetails.ShoppingCartPluginInfo.max_length' => '48',
        'psp_CustomerAdditionalDetails.IPAddress.max_length' => '45',
        'psp_CustomerAdditionalDetails.AccountID.max_length' => '128',
        'psp_CustomerAdditionalDetails.DeviceFingerPrint.max_length' => '4000',
        'psp_CustomerAdditionalDetails.BrowserLanguage.max_length' => '2',
        'psp_CustomerAdditionalDetails.HttpUserAgent.max_length' => '255',
        'psp_BillingDetails.Invoice.max_length' => '32',
        'psp_BillingDetails.InvoiceCurrency.max_length' => '3',
        'psp_ShippingDetails.TrackingNumber.max_length' => '24',
        'psp_ShippingDetails.Method.max_length' => '3',
        'psp_ShippingDetails.Carrier.max_length' => '3',
        'psp_ShippingDetails.GiftMessage.max_length' => '200',
        'psp_AirlineDetails.TicketNumber.max_length' => '14',
        'psp_AirlineDetails.PNR.max_length' => '10',
        'psp_VaultReference.PaymentMethodToken.max_length' => '64',
        'psp_VaultReference.PaymentMethodId.max_length' => '64',
        'psp_VaultReference.CustomerId.max_length' => '64'
    );
}