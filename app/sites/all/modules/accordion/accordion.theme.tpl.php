<div class="row">

        <div class="accordion custom" id="accordion2">

            <?php $i=0?>
            <?php foreach($info as $item): ?>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $i;?>"><i class="icon-plus"></i> <?php echo $item['header']?> </a>
                    </div>
                    <div id="collapse<?php echo $i;?>" class="accordion-body collapse" style="height: 0px;">
                        <div class="accordion-inner">
                           <?php echo drupal_render($item['body']);?>
                        </div>
                    </div>
                </div>
            <?php
            $i = $i+1;
                endforeach;
            ?>
        </div>

</div>
