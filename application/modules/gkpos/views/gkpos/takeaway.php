
<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $template['partials']['left_sidebar'] ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 bodyitem">
                <div class="middlebg body-vertical-align-center">
                    <p class="text-center"><?php echo $this->lang->line('gkpos_slecte_order_type')?></p>
                    <div class="deliverybg">
                        <a href="<?php echo site_url('gkpos/customerinformation')?>"><h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/deliveryicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_delivery')?></h2></a>
                    </div>
                    <div class="collectionbg">
                        <a href="<?php echo site_url('gkpos/collection')?>"><h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/collectionicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_collection')?></h2></a>
                    </div>
                    <div class="waitingbg">
                       <a href="<?php echo site_url('gkpos/waiting')?>"> <h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_waiting')?></h2></a>
                    </div>
                </div>
            </div>
            <?php echo $template['partials']['right_sidebar'] ?>
        </div>
    </div>
</section>
