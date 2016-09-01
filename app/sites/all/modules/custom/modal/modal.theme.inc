<?php

class Modal {

    function getModal(){
        $response = array(
            'cards' => array(
                'vars' => array('info' => NULL, 'idPersona' => NULL ,'absolut' => NULL),
                'template' => 'modal.theme',
            ),
        );

        return $response;
    }
}