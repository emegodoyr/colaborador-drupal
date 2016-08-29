<?php
class Accordion{

    function getTheme(){
        $response = array(
            'accordion' => array(
                'vars' => array('info' => NULL),
                'template' => 'accordion.theme',
            ),
        );

        return $response;
    }
}