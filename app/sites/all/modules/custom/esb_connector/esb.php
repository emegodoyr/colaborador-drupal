<?php

//require_once('lib/nusoap.php');
function esb_connector_menu() {

    $items = array();

    $items['prueba_esb'] = array(
        'title' => 'Prueba de Conexión al ESB',
        'page callback' => 'esb_connector_prueba',
        'access arguments' => array('access content'),
        'type' => MENU_CALLBACK
    );
    return $items;
}

function call() {
//    global $user; 
//    ini_set("soap.wsdl_cache_enabled", "0");
   // $esbconnector = variable_get('soap'); //'http://192.168.3.24:8280/services/'
	$esbconnector = 'http://192.168.3.24:8280/services/';
    $options = array(
        'soap_version' => SOAP_1_1,
//                'exceptions'=>true ,
        'trace' => 1
//                'cache_wsdl'=>WSDL_CACHE_NONE 
    );
//	$client = new SoapClient($esbconnector . $service . '?wsdl', $options);


    try {
        $client = new SoapClient($esbconnector['url'] . "DetallePersona" . '?wsdl', $options);
//            $resp =$client->$operation($inputparameters);
//            $xml =$client->__soapCall($operation, array($inputparameters));

//        $client->$operation($inputparameters);
        $parametros = array(
            'idsociedad' => '4164',
            'nombre' => '8044145-2',
        );
        $client->__soapCall($operation,array($parametros));
//            $resp= simplexml_load_string($xml->);
        $resp = $client->__getLastResponse();
		
//          $resp = htmlentities($client->__getLastResponse());
//          $dom = new DOMDocument();
//          $dom->loadXML($resp);
//          $xml=htmlentities($dom->textContent);
        $xml = simplexml_load_string($resp);

        $namespaces = $xml->getNamespaces(TRUE);
        if (array_key_exists('soapenv', $namespaces)) {
            $xml->registerXPathNamespace("soapenv", "http://schemas.xmlsoap.org/soap/envelope/");
            $arreglo = $xml->xpath('//soapenv:Body');
            $respuesta = $arreglo[0];
        } else {
            $respuesta = htmlentities($resp);
        }

//          $respuesta = $xml;
    } catch (SoapFault $exception) {
        $respuesta = 'soap fault occured: ' . $exception->getMessage() . '<br/>';
    }

    return $respuesta;
}

function esb_connector_prueba() {
    $resultado = '';
//    $parametros = array(
//        'IdVersionColaborador' => '15538'
//    );
//    
//    $xml = esb_connector_execute_service('Mallas', 'getSeccionesPersona', $parametros);
    $xml = esb_connector_execute_service('Version', 'getVersion', array());
    $xml->registerXPathNamespace("ns", "http://version.services.core.carbon.wso2.org");
    $arreglo = $xml->xpath('//ns:getVersionResponse');
    $respuesta = $arreglo[0];
    $resultado .= '<pre>' . print_r($respuesta, TRUE) . '</pre>';

    return $resultado;
}
