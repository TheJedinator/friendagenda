<?php
require_once('Fedex/fedex-common.php');
function valPostal($postal, $province){
$newline = "<br />";
//Please include and reference in $path_to_wsdl variable.
$path_to_wsdl = "Fedex/wsdl/CountryService/CountryService_v5.wsdl";

ini_set("soap.wsdl_cache_enabled", "0");
 
$client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

$request['WebAuthenticationDetail'] = array(
	'ParentCredential' => array(
		'Key' => getProperty('parentkey'), 
		'Password' => getProperty('parentpassword')
	),
	'UserCredential' => array(
		'Key' => getProperty('key'), 
		'Password' => getProperty('password')
	)
);

$request['ClientDetail'] = array(
	'AccountNumber' => getProperty('shipaccount'), 
	'MeterNumber' => getProperty('meter')
);
$request['TransactionDetail'] = array('CustomerTransactionId' => ' *** Validate Postal Code Request using PHP ***');
$request['Version'] = array(
	'ServiceId' => 'cnty', 
	'Major' => '5', 
	'Intermediate' => '0', 
	'Minor' => '1'
);

$request['Address'] = array(
	'PostalCode' => $postal,
	'CountryCode' => 'CA'
);

$request['CarrierCode'] = 'FDXE';


try {
	
	
	if(setEndpoint('changeEndpoint')){
		$newLocation = $client->__setLocation(setEndpoint('endpoint'));
	}
	$response = $client -> validatePostal($request);
    //Get's the province code returned by the webservice
    $postProvince = trim($response -> PostalDetail->StateOrProvinceCode);
    $province = strtoupper(trim($province));    
    if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
    	if ($province == $postProvince){
       		return true;
   		} else {
   			return false;
   		}  	
	}
	else{
		return false;	
    } 
} catch (SoapFault $exception) {
	echo "Exception False";
    return false;      
	}
}
//echo valPostal("R5G 1T1", "MB");
?>
