<section id="body">
    <div class="container-fluid menuselection">
        <div class="row">
            <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 left-top">
                <div class="sidebar-heading text-center text-uppercase"><?php echo $this->lang->line('gkpos_category_list') ?></div>
                <?php echo $showcategory ?>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 middle-top">
                <?php echo $this->load->view('gkpos/orders/menu') ?>
                <div class="row action-button">
                    <div class="main-arrowbg col-md-offset-3 col-md-6 col-md-offset-3 text-center">
                        <ul id="menuPagination">
                            <li><div class="prevbtng menuPrevBtn" id="menuPrevBtn" onclick="getMenuByCategory(this.id, 'menuPrevBtn')"><a href="javascript:void(0)"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/prevbtnbg.png" width="75" height="46" /></a></div></li>
                            <input type="hidden" id="menuFirstOrder" value="0">
                            <input type="hidden" id="menuPrevBtnCounter" value="0">
                            <li><div class="nextbtng menuNextBtn" id="menuNextBtn" onclick="getMenuByCategory(this.id, 'menuNextBtn')"><a href="javascript:void(0)"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/nextbtnbg.png" width="75" height="46" /></a></div></li>
                            <input type="hidden" id="menuLastOrder" value="0">
                            <input type="hidden" id="menuNextBtnCounter" value="0">
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <a href="#"><div class="mainsystembg2 waiting-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_change_table_details') ?></div></a>
                    <a href="#"><div class="mainsystembg2 delivery-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_quantity') ?></div></a>
                    <a href="#"><div class="mainsystembg2 collection-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_promo_discount') ?></div></a>
                    <a href="#"><div class="mainsystembg2 collection-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_add_service_charge') ?></div></a>
                    <a href="#"><div class="mainsystembg2 waiting-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_special_modify') ?></div></a>
                    <a href="#"><div class="mainsystembg2 delivery-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_item_description') ?></div></a>
                </div>
            </div>
            <?php echo $this->load->view('gkpos/orders/cart') ?>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 left-bottom">
                <div class="main-arrowbg">
                    <ul>
                        <li><div class="prevbtng" id="prevBtn" onclick="getcategory(this.id)"><a href="javascript:void(0)"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/prevbtnbg.png" width="75" height="46" /></a></div></li>
                        <input type="hidden" id="firstCatOrder" value="0">
                        <li><div class="nextbtng" id="nextBtn" onclick="getcategory(this.id)"><a href="javascript:void(0)"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/nextbtnbg.png" width="75" height="46" /></a></div></li>
                        <input type="hidden" id="lastCatOrder" value="0">
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 middle-bottom">
                <div class="row action-button">
                    <a href="#"><div class="mainsystembg2 delivery-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_print_guest_bill'); ?></div></a>
                    <a href="javascript:void(0)" onclick="getBaseAjaxIndexPage('<?php echo site_url('gkpos/baseajaxindex') ?>', 'false')"><div class="mainsystembg2 collection-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_exit') ?></div></a>
                    <a href="#"><div class="mainsystembg2 waiting-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_convert_to_takeaway') ?></div></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 right-bottom pay-close">
                <a href="#"><div class="mainsystembg collection-bg-color img-responsive"><?php echo $this->lang->line('gkpos_pay_and_close') ?></div></a>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        var windowScreenHeight = $(window).height();
        $('.menuselection .left-top, .menuselection .middle-top,.menuselection .right-top').css({"height": windowScreenHeight - (windowScreenHeight * 0.223) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
        $('.menuselection .order-menu-list').css({"height": windowScreenHeight - (windowScreenHeight * 0.44) + "px", "overflow-y": "auto", "overflow-x": "hidden"});
        $('.menuselection .left-bottom,.menuselection .middle-bottom,.menuselection .right-bottom').css({"height": windowScreenHeight - (windowScreenHeight * 0.887) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
        manageWindowHeight();
    });
</script>