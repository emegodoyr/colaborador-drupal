<?php

class EventoContent {

    function getContent() {

        drupal_add_js('var curso;', 'settings');

        drupal_add_js(drupal_get_path('module', 'eventos') . '/js/modalCurso.js', array('scope' => 'footer'));

        drupal_add_js('function closeCurso() {curso.hide();location.reload(true);}','inline');
        $idEvento = $_GET['idEvento'];
        $idPersona = $_GET['idPersona'];
        $parametros = array(
            'IdEvento' => $idEvento,
            'IdPersona' => $idPersona,
        );

        $xml = esb_connector_execute_service('D_Eventos', 'getContenidosNomina', $parametros);
//    $attributes['datatable_options'] = array(
//        'responsive'=>TRUE,
//        'aoColumnsDef' => array('bSortable'=>FALSE,'aTargets'=>array('no-sort')),
//        'bFilter'   => FALSE,
//        'language' => array('url'=>'/sites/all/modules/datatables/dataTables/media/js/dataTables.spanish.js',),
//        'aaSorting' =>array(),
//    );
        // Define table columns
        $header = array(
            array
            (
                'data' => t('Contenido'),

            ),
            array
            (
                'data' => t('Tipo'),

            ),
            array
            (
                'data' => t('Ponderación'),

            ),
            array
            (
                'data' => t('Avance'),

            ),
            array
            (
                'data' => t('Estado'),

            ),
            array
            (
                'data' => t('Resultado'),

            ),
            array
            (
                'data' => t('Situación Final'),

            ),
            array
            (
                'data' => t('Intentos'),

            ),
            array
            (
                'data' => t(''),

            ),


        );


        // Table data.
        $rows = array();

        foreach ($xml->Entries->Entry as $entry) {

            $row = array(

                $entry->Nombre,
                $entry->Tipo,
                $entry->Ponderacion.'%',
                $entry->PorcentajeAvance,
                getEstado($entry->IdEstado),
                $entry->Puntaje,
                getSituacionFinal($entry->IdSituacion),
                $entry->Intentos.' de '.$entry->MaximoIntentos,
                '<button type="button" class="btn btn-primary btn-sm" onclick="curso.show(\''.$entry->LinkScorm.'\');">Iniciar</button>'
            );

            array_push($rows, $row);
        }


        $variables = array(
            'header' => $header,
            'rows' => $rows,
        );

        $output = theme('table', $variables);

        $form['modal'] = array(
            '#type' => 'container',
            '#attributes' => array(
                'class'=> array('cursoModal')
            )

        );
        $form['header']=array(
            '#type'=>'container',
            '#attributes' => array(
                'class'=> array('bloque_form bloque_resumen evento')
            )

        );
        $form['header']['contenido'] = array(
            '#markup' => ''
        );


        ///////
        //contenido global
        $form['content']=array(
            '#type' => 'container',
            '#attributes' => array(
                'class'=> array('row eventos-drupal mallas')
            )
        );

        //panel
        $form['content']['panel']=array(
            '#type' => 'container',
            '#attributes' => array(
                'class'=> array('panel panel-default panel-page-content')
            )
        );

        //header del panel
        $form['content']['panel']['header']=array(
            '#type' => 'container',
            '#attributes' => array(
                'class'=> array('panel-heading')
            )
        );

        $form['content']['panel']['header']['titulo']=array(
            '#markup' => 'Contenidos'
        );

        //body del panel
        $form['content']['panel']['body']=array(
            '#type' => 'container',
            '#attributes' => array(
                'class'=> array('panel-body')
            )
        );

        $form['content']['panel']['body']['cursos']=array(
            '#type' => 'container',
            '#attributes' => array(
                'class'=> array('tabla-resultados-no-registros-buscar')
            )

        );
        $form['content']['panel']['body']['cursos']['tabla'] = array(
            '#markup' => $output

        );
        return $form ;

    }
}