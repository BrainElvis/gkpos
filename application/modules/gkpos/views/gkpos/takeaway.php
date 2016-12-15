<input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
<div class="middlebg body-vertical-align-center">
    <p class="text-center text-uppercase sidebar-heading"><?php echo $this->lang->line('gkpos_slecte_order_type') ?></p>
    <div class="deliverybg">
        <a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/delivery') ?>', 'delivery')"  id="delivery"><h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/deliveryicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_delivery') ?></h2></a>
    </div>
    <div class="collectionbg">
        <a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/collection') ?>', 'collection')"  id="collection"><h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/collectionicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_collection') ?></h2></a>
    </div>
    <div class="waitingbg">
        <a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/waiting') ?>', 'waiting')"  id="waiting"> <h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_waiting') ?></h2></a>
    </div>
</div>
