<?php

class Utils {

    function getIdPersona(){
//        global $user;
        $idSociedad = $this->getIdSociedad();
        $userName  = '8044145-2';
        $parametros = array(
            'idsociedad' => $idSociedad,
            'nombre' => $userName,
        );

        $xml = esb_connector_execute_service('DetallePersona', 'getDetallePersona', $parametros);

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