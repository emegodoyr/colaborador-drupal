<?php

class Eventos {

    function pageResponse(){
        $utils = new Utils();
        $idPersona = $utils->getIdPersona();
        $idSociedad = $utils->getIdSociedad();

        $parametros = array(
            'IdSociedad' => $idSociedad,
            'IdPersona' => $idPersona,
        );

        $xml = esb_connector_execute_service('D_Eventos', 'ObtenerEventosPorIdPersona', $parametros);

        $rows = array();
        $nameHeader = array();
        foreach ($xml->Entries->Entry as $entry) {
            $row = array();

            foreach(get_object_vars($entry) as $k => $value) {
                if($value == ""){
                    $value = "No tiene";
                }
                array_push($row, $value);
            }

            array_push($rows, $row);

            if(count($nameHeader) == 0){
                foreach (get_object_vars($entry) as $llave => $valor){
                    array_push($nameHeader, $llave);
                }

            }

        }

        // Or, render using a theme function.
        $variables = array(
            'header' => $utils->getHeader($nameHeader),
            'rows' => $rows,
        );

        $datatable = theme('table', $variables);


        return $datatable;
    }

}