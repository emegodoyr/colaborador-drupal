<?php

class Eventos {

    function pageResponse(){
        global $user;

        if($user->name == 'admin'){
            return '<h3>Estas autenticado como administrador, lo mas probable es que no poseas eventos</h3>';
        }

        $utils = new Utils();
        $idPersona = $utils->getIdPersona();
        $idSociedad = $utils->getIdSociedad();
        if($idPersona == 'null'){
            return '<h3>No tienes eventos cargados</h3>';
        }



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