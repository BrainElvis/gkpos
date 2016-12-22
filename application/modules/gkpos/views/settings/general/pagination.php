<section id="body">
    <div class="container-fluid">
        <div class="row">
            <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 left-item">
                <div class="middlebg">
                    <div class="deliverybg">
                        <a href="javascript:void(0)" onclick="getBaseAjaxPage('<?php echo site_url('gkpos/settings/general') ?>', 'general - info')"  ><h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/deliveryicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_general_info') ?></h2></a>
                    </div>
                    <div class="collectionbg">
                        <a href="javascript:void(0)" onclick="getBaseAjaxPage('<?php echo site_url('gkpos/settings/vatsetup') ?>', 'general - vatsetup')" ><h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/collectionicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_general_vat_setup') ?></h2></a>
                    </div>
                    <div class="waitingbg">
                        <a href="javascript:void(0)" onclick="getBaseAjaxPage('<?php echo site_url('gkpos/settings/discountsetup') ?>', 'general - discount')" > <h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_discount') ?></h2></a>
                    </div>
                     <div class="collectionbg">
                        <a href="javascript:void(0)" onclick="getBaseAjaxPage('<?php echo site_url('gkpos/settings/promotion') ?>', 'general - promotion')"> <h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_promotion') ?></h2></a>
                    </div>
                    <div class="deliverybg">
                        <a href="javascript:void(0)" onclick="getBaseAjaxPage('<?php echo site_url('gkpos/settings/depliveryplan') ?>', 'g - deliveryplan')"  ><h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/deliveryicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_delivery_plan') ?></h2></a>
                    </div>
                     <div class="waitingbg">
                        <a href="javascript:void(0)" onclick="getBaseAjaxPage('<?php echo site_url('gkpos/settings/pagination') ?>', 'general - pagination')" > <h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_pagination') ?></h2></a>
                    </div>
                    
                </div>
                <div class="clearfix pages-height"></div>
                <div class="page-exit-button text-uppercase text-center system-management-page-exit">
                    <a href="javascript:void(0)" onclick="pageExit('<?php echo site_url("gkpos/settings") ?>', '<?php echo $this->lang->line('gkpos_system_management'); ?>')"><i class="fa fa-home"></i>&nbsp;&nbsp;<?php echo $this->lang->line('gkpos_system_management') ?></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 bodyitem">
                <div id="KeyboardSetting">
                    <?php echo $this->load->view('gkpos/partials/keyboard_setting') ?>
                    <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
                </div>
                <div id="MiddleContent">

                </div>
            </div>
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 right-item">
                <div class="middlebg">
                    <div class="deliverybg">
                        <a href="javascript:void(0)" onclick="getBaseAjaxPage('<?php echo site_url('gkpos/settings/general') ?>', 'general - info')"  ><h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/deliveryicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_general_info') ?></h2></a>
                    </div>
                    <div class="collectionbg">
                        <a href="javascript:void(0)" onclick="getBaseAjaxPage('<?php echo site_url('gkpos/settings/vatsetup') ?>', 'general - vatsetup')" ><h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/collectionicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_general_vat_setup') ?></h2></a>
                    </div>
                    <div class="waitingbg">
                        <a href="javascript:void(0)" onclick="getBaseAjaxPage('<?php echo site_url('gkpos/settings/discountsetup') ?>', 'general - discount')" > <h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_discount') ?></h2></a>
                    </div>
                     <div class="collectionbg">
                        <a href="javascript:void(0)" onclick="getBaseAjaxPage('<?php echo site_url('gkpos/settings/promotion') ?>', 'general - promotion')"> <h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_promotion') ?></h2></a>
                    </div>
                    <div class="deliverybg">
                        <a href="javascript:void(0)" onclick="getBaseAjaxPage('<?php echo site_url('gkpos/settings/depliveryplan') ?>', 'g - deliveryplan')"  ><h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/deliveryicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_delivery_plan') ?></h2></a>
                    </div>
                     <div class="waitingbg">
                        <a href="javascript:void(0)" onclick="getBaseAjaxPage('<?php echo site_url('gkpos/settings/pagination') ?>', 'general - pagination')" > <h2><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_pagination') ?></h2></a>
                    </div>
                </div>
                <div class="clearfix pages-height"></div>
                <div class="page-exit-button text-uppercase text-center system-management-page-exit">
                    <a href="javascript:void(0)" onclick="pageExit('<?php echo site_url("gkpos/settings") ?>', '<?php echo $this->lang->line('gkpos_system_management'); ?>')"><i class="fa fa-home"></i>&nbsp;&nbsp;<?php echo $this->lang->line('gkpos_system_management') ?></a>
                </div>
            </div>
        </div>
    </div>
</section>