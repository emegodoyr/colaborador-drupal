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
        foreach ($xml->Entries->Entry as $entry) {
            $row = array();

            foreach(get_object_vars($entry) as $k => $value) {
                if($value == ""){
                    $value = "No tiene";
                }
                array_push($row, $value);
            }

            array_push($rows, $row);
        }


        $datatable = theme('cards', array('info' => $rows, 'idPersona' => $idPersona,'absolut'=> url(drupal_get_path("module", "cards"), array("absolute" => true))));


        return $datatable;
    }

}