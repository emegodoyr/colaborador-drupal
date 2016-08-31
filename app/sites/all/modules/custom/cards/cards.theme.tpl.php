
<?php

echo '<div class="row icons">';
foreach($info as $entry) {
    if($entry[12] > 0) {
        $haveContent = true;
        echo '<a href="/eventos/contenidosEvento?idEvento='.$entry[0].'&idPersona='.$idPersona.'">';
    } else {
        $haveContent = false;
        echo '<a href="#">';
    }
    echo '

<section class="span2" style="border:1px solid lightgrey;padding-top:0; margin-bottom: 15px; border-radius: 5px 5px 5px 5px;">

    <header  title="'.$entry[1].'" style="background-color: darkgray; width: auto; padding:0;border-radius: 5px 5px 0px 0px;text-align:center; margin:0;">
        <label style=" color: whitesmoke ;height: 30px; margin-left: 5px; padding:5px; margin-right: 5px;overflow:hidden; white-space:nowrap; text-overflow: ellipsis";>'.$entry[1].'</label>
    </header>

    <article style="text-align:center;background-image:url('.$absolut.'/img/back-card-default.png)">
        
         <label style="height: 80px;padding:0;margin:0;">';
       
            if($haveContent) {
               echo '<i style = "color:mediumseagreen;font-size:80px;" class="icon-play-circle"></i>';
            }
	    echo '</label> 
        
     
    </article>

    <footer style="border-top: 1px solid lightgrey; height: 20px;">
        <i style="color:dodgerblue;float:right;font-size:15px; vertical-align:center;" class="icon-info-sign"></i>
    </footer>
    
</section></a>';

};

echo '</div>';