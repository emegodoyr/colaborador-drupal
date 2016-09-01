
<?php

echo '<div class="row icons">';

echo '
<section style="border:1px solid lightgrey;padding-top:0; margin-bottom: 15px; border-radius: 5px 5px 5px 5px;">
<a href="#" data-toggle="modal" data-target="#myModal"><span><i class="fa fa-question-circle"></i> Simbología</span></a>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Simbología de Capacitación</h4>
				  </div>
				  <div class="modal-body"> 
						<div class="simbologia table-responsive">
                        <table class="table table-condensed">
                            <tbody><tr>
                                <th width="60">Símbolo</th>
                                <th width="150">&nbsp;</th>
                                <th>Que significa</th>
                            </tr>
                            <tr>
                            
                                <td><span title="Reprobada" style="color:red;font-size:15px; vertical-align:center;" class="icon-circle"></span> <span title="Reprobada" style="color:red;font-size:15px; vertical-align:center;" class="icon-circle"></span></td>
                                <td>Reprobada</td>
                                <td>Situación final reprobada. No cumple con los requisitos para aprobar la capacitación</td>
                            </tr>
                            <tr>
                                <td>
                                    <span title="Aprobada" style="color:green;font-size:15px; vertical-align:center;" class="icon-circle"></span> 
                                    <span title="Completada" style="color:blue;font-size:15px; vertical-align:center;" class="icon-circle"></span>
                                 </td>
                                <td>Aprobada</td>
                                <td>Situación final aprobada. Cumplió con los requisitos para aprobar la capacitación</td>
                            </tr>
                            <tr>
                                <td><span title="No disponible" style="color:grey;font-size:15px; vertical-align:center;" class="icon-circle"></span><span title="No disponible" style="color:grey;font-size:15px; vertical-align:center;" class="icon-circle"></span></td>
                                <td>No disponible</td>
                                <td>No tiene disponible una situación final</td>
                            </tr>
                            <tr>
                                <td>N/D</td>
                                <td>No disponible</td>
                                <td>No ha iniciado o no tiene disponible una capacitación </td>
                            </tr>
                            <tr>
                                <td><span title="Completada" style="color:blue;font-size:15px; vertical-align:center;" class="icon-circle"></span></td>
                                <td>Completada</td>
                                <td>Se completo una capacitación</td>
                            </tr>
                            <tr>
                                <td><span title="En progreso" style="color:orange;font-size:15px; vertical-align:center;" class="icon-circle"></span></td>
                                <td>En progreso</td>
                                <td>Evento e-learning comenzado y en periodo vigente</td>
                            </tr>
                            <tr>
                                <td><span title="No iniciado" style="color:white;font-size:15px; vertical-align:center;" class="icon-circle"></span></td>
                                <td>No iniciado</td>
                                <td>Evento disponible no iniciado</td>
                            </tr>
                            <tr>
                                <td><i title="Evento presencial" style="font-size:15px; vertical-align:center;" class="icon-user icon-book"></i></td>
                                <td>Evento presencial</td>
                                <td>Actividad de capacitación que se realiza en un  lugar físico definido. Se requiere la asistencia del alumno tanto a las lecciones  como a las evaluaciones</td>
                            </tr>
                            <tr>
                                <td><i title="Evento e-learning" style="color:grey;font-size:15px; vertical-align:center;" class="icon-laptop"></i></td>
                                <td>Evento e-learning</td>
                                <td><p>Actividad de capacitación a la  que se accede a través de plataforma web. Tanto las lecciones como evaluaciones  se realizan a través de la plataforma, por lo que no requiere la presencia  física del alumno</p></td>
                            </tr>
                            <tr>
                                <td><i title="Evento a distancia" style="color:grey;font-size:15px; vertical-align:center;" class="icon-book"></i></td>
                                <td>Evento a distancia</td>
                                <td><p>Actividad de capacitación&nbsp;que no requiere asistencia presencial ni interacción con la plataforma e-learning, sino que las lecciones y evaluaciones son realizadas por medio de la entrega de un  CD-ROM, documento físico u otro medio que no considere uso de Internet. </p></td>
                            </tr>
                            <tr>
                                <td><i title="Nota" class="icon icon-nota icon-read"></i>&nbsp;</td>
                                <td>Nota de la capacitación</td>
                                <td>Resultado. N/D corresponde a nota no disponible, que no tiene nota, o, en evento e-learning, que el contenido no es evaluable.</td>
                            </tr>
                            <tr>
                                <td><i title="Diploma" style="color:grey;font-size:15px; vertical-align:center;" class="icon-certificate"></i></td>
                                <td>Diploma del evento</td>
                                <td>Documento que certifica la aprobación del evento</td>
                            </tr>
                            <tr>
                                <td><i title="Detalle" style="color:blue;font-size:15px; vertical-align:center;" class="icon-info-sign"></i></td>
                                <td>Detalle</td>
                                <td>Especificaciones de unidad curricular o del evento</td>
                            </tr>
                        </tbody></table>
                    </div>
				  </div>
				  
				   <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
				   </div>
			  </div>
			</div>
</section> 
';

foreach($info as $entry) {
    if($entry[12] > 0) {
        $haveContent = true;
        echo '<a href="'.$base.'/eventos/contenidosEvento?idEvento='.$entry[0].'&idPersona='.$idPersona.'">';
    } else {
        $haveContent = false;
        echo '<a href="#">';
    }
    if($entry[6] != "") {
        $image = $entry[6];

    } else {
       $image = $absolut."/img/back-card-default.png";
    }


    switch ($entry[7]) {
        case "No Iniciado":
            $estado = '<i style="color:grey;font-size:15px; vertical-align:center;" class="icon-circle"></i>';
            break;
        case "En Curso":
            $estado = '<i style="color:orange;font-size:15px; vertical-align:center;" class="icon-circle"></i>';
            break;
        case "Finalizado":
            echo $estado = '<i style="color:blue;font-size:15px; vertical-align:center;" class="icon-circle"></i>';
            break;
        default:
            echo "Your favorite color is neither red, blue, nor green!";
    }
    switch ($entry[8]) {
        case "N/D":
            $resultado = '<i style="color:black;font-size:15px; vertical-align:center;" >N/D</i>';
            break;
        default:
            $resultado = '<i style="color:black;font-size:15px; vertical-align:center;" >'.$entry[8].'%</i>';
    }
    switch ($entry[9]) {
        case "N/D":
            $situacionFinal = '<i style="color:black;font-size:15px; vertical-align:center;" >N/D</i>';
            break;
        case "Reprobado":
            $situacionFinal =  '<i style="color:red;font-size:15px; vertical-align:center;" class="icon-circle"></i>';
            break;
        case "Aprobado":
            $situacionFinal =  '<i style="color:green;font-size:15px; vertical-align:center;" class="icon-circle"></i>';
            break;
    }
    switch ($entry[10]) {
        case "N/D":
            $modalidad = '<i style="color:black;font-size:15px; vertical-align:center;" >N/D</i>';
            break;
        case "Reprobado":
            $modalidad =  '<i style="color:red;font-size:15px; vertical-align:center;" class="icon-circle"></i>';
            break;
        case "Aprobado":
            $modalidad =  '<i style="color:green;font-size:15px; vertical-align:center;" class="icon-circle"></i>';
            break;
    }



    echo '

<section class="span2" style="border:1px solid lightgrey;padding-top:0; margin-bottom: 15px; border-radius: 5px 5px 5px 5px;">

    <header  title="'.$entry[1].'" style="background-color: darkgray; width: auto; padding:0;border-radius: 5px 5px 0px 0px;text-align:center; margin:0;">
        <label style=" color: whitesmoke ;height: 30px; margin-left: 5px; padding:5px; margin-right: 5px;overflow:hidden; white-space:nowrap; text-overflow: ellipsis";>'.$entry[1].'</label>
    </header>

    <article style="text-align:center;background-image:url('.$image.')">
        
         <label style="height: 80px;padding:0;margin:0;">';
       
            if($haveContent) {
               echo '<i style = "color:mediumseagreen;font-size:80px;" class="icon-play-circle"></i>';
            }
	    echo '</label> 
        
     
    </article>

    <footer style="border-top: 1px solid lightgrey; height: 20px;">
        '.$estado.'
        '.$resultado.'
        '.$situacionFinal.'
        <i style="color:dodgerblue;float:right;font-size:15px; vertical-align:center;" class="icon-info-sign"></i>
        
    </footer>
    
</section></a>';

};

echo '</div>';