<?php

    class Card {

        function getCards(){
            return array(
                'cards' => array(
                    'vars' => array('info' => NULL, 'idPersona' => NULL ,'absolut' => NULL),
                    'template' => 'cards.theme',
                ),
            );

        }
    }