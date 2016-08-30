<?php

class Utils {

    function getIdPersona(){
        global $user;
        $idSociedad = $this->getIdSociedad();
        $userName  = $user->name;
        $parametros = array(
            'idsociedad' => $idSociedad,
            'nombre' => $userName,
        );

        $xml = esb_connector_execute_service('DetallePersona', 'getDetallePersona', $parametros);
//        print count($xml);
        $id = "null";
        foreach ($xml->Entries->Entry as $entry){
            $id = $entry->Id;
        }
        return $id;
    }

    function getIdSociedad(){
        $response = variable_get('client');
        return $response['IdSociedad'];
    }


    function getHeader($names){
        $response = array();
        foreach ($names as $name){
           array_push($response, array
            (
                'data' => t($name),
                'datatable_options' => array(
                    'bSortable' => TRUE,
                    'bSearchable' => TRUE,
                ),
            )
           );
        }

        return $response;
    }


}