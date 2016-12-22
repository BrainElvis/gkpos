<section id="body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 left-item">
                <div class="userlogingbg ">
                    <h3><a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/table_seated_not_ordered') ?>', 'table')" ><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg.png" width="192" height="69"  class="img-responsive center-block"/></a></h3>
                    <h3><a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/table_seated_ordered') ?>', 'table')"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg2.png" width="192" height="69" class="img-responsive center-block"/></a></h3>
                    <h3><a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/table_waiting_payment') ?>', 'table')"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg3.png" width="192" height="69" class="img-responsive center-block"/></a></h3>
                    <h3><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg4.png" width="192" height="69" class="img-responsive center-block"/></h3>
                    <h3><a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/delivery_order') ?>', 'delivery order')"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg5.png" width="192" height="69" class="img-responsive center-block"/></a></h3>
                    <h3><a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/collection_order') ?>', 'collection orders')"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg6.png" width="192" height="69" class="img-responsive center-block"/></a></h3>
                    <h3><a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/waiting_order') ?>', 'waiting order')"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg7.png" width="192" height="69" class="img-responsive center-block"/></a></h3>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bodyitem">
                <div id="KeyboardSetting">
                    <?php echo $this->load->view('gkpos/partials/keyboard_setting') ?>
                    <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
                </div>
                <div id="MiddleContent">
                    asdasdsadsad
                </div>
            </div>
        </div>
    </div>
</section>