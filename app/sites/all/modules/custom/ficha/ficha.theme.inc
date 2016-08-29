<?php
class Ficha{

    function getTheme(){
        $response = array(
            'formularioFicha' => array(
                'vars' => array('info' => ""),
                'template' => 'formularioFicha.theme',
            ),
        );

        return $response;
    }
}