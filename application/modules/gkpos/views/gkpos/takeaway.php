
<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $template['partials']['left_sidebar'] ?>
            <div class="col-md-6 col-sm-6 col-xs-6 bodyitem">
                <div class="middlebg">
                    <p><?php echo $this->lang->line('gkpos_slecte_order_type')?></p>
                    <div class="deliverybg">
                        <h2><a href="<?php echo site_url('gkpos/customerinformation')?>"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/deliveryicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_delivery')?></a></h2>
                    </div>
                    <div class="collectionbg">
                        <h2><a href="<?php echo site_url('gkpos/collection')?>"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/collectionicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_collection')?></a></h2>
                    </div>
                    <div class="waitingbg">
                        <h2><a href="<?php echo site_url('gkpos/waiting')?>"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_waiting')?></a></h2>
                    </div>
                </div>
            </div>
            <?php echo $template['partials']['right_sidebar'] ?>
        </div>
    </div>
</section>
