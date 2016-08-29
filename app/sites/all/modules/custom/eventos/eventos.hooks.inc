<?php

class Hooks {

    function Menu(){
        $items = array();

        $items['eventos/miseventos'] = array(
            'title' => 'Mis Eventos',
            'page callback' => 'eventos_miseventos',
            'access arguments' => array('access content'),
            'access callback' => 'user_is_logged_in',
            'type' => MENU_CALLBACK,
            'menu_name' => 'user-menu'
        );

        $items['eventos/contenidosEvento'] = array(
            'title' => '',
            'page callback' => 'eventos_contenidosEvento',
            'access arguments' => array('access content'),
            'type' => MENU_CALLBACK
        );
        $items['cerrarCurso.htm'] = array(
            'title' => 'cc',
            'page callback' => 'eventos_cerrarCurso',
            'access arguments' => array('access content'),
            'type' => MENU_CALLBACK
        );

        return $items;
    }

}