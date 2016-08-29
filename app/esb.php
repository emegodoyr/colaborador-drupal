<?php


//    global $user; 
//    ini_set("soap.wsdl_cache_enabled", "0");
   // $esbconnector = variable_get('soap'); //'http://192.168.3.24:8280/services/'
	
//	$client = new SoapClient($esbconnector . $service . '?wsdl', $options);


    try {
       
        $esbconnector = 'http://192.168.3.24:8280/services/';
    $options = array(
        'soap_version' => SOAP_1_1,
        'trace' => 1 
    );
     
        $client = new SoapClient($esbconnector . "DetallePersona" . '?wsdl', $options);
//            $resp =$client->$operation($inputparameters);
//            $xml =$client->__soapCall($operation, array($inputparameters));

//        $client->$operation($inputparameters);
        $parametros = array(
            'idsociedad' => '4164',
            'nombre' => '8044145-2',
        );
        $client->__soapCall("getDetallePersona",array($parametros));
//            $resp= simplexml_load_string($xml->);
      
        $resp = $client->__getLastResponse();
		 //echo $resp;
//          $resp = htmlentities($client->__getLastResponse());
         // $dom = new DOMDocument();
          //$dom->loadXML($resp);
          //$xml=htmlentities($dom->textContent);
       
        $xml = simplexml_load_string($resp);
    
        //echo $xml->getNamespaces(TRUE);
        $namespaces = $xml->getNamespaces(TRUE);
       
        if (array_key_exists('soapenv', $namespaces)) {
            $xml->registerXPathNamespace("soapenv", "http://schemas.xmlsoap.org/soap/envelope/");
            $arreglo = $xml->xpath('//soapenv:Body');
            foreach ($arreglo[0]->Entries->Entry as $entry){
                 echo $entry->Id;
                 //$idPersona = $entry->Id;
            }
            $respuesta = $arreglo[0];
        } else {
            $respuesta = htmlentities($resp);
        }

//          $respuesta = $xml;
    } catch (Exception $exception) {
      echo $exception->getMessage();
       // $respuesta = 'soap fault occured: ' . $exception->getMessage() . '<br/>';
    }
    return $respuesta;
    
