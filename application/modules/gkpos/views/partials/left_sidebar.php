<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 left-item">
    <div class="userlogingbg ">
        <h3><a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/table_seated_not_ordered') ?>', 'table')" ><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg.png" width="192" height="69"  class="img-responsive center-block"/></a></h3>
        <h3><a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/table_seated_ordered') ?>', 'table')"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg2.png" width="192" height="69" class="img-responsive center-block"/></a></h3>
        <h3><a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/table_waiting_payment') ?>', 'table')"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg3.png" width="192" height="69" class="img-responsive center-block"/></a></h3>
        <h3><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg4.png" width="192" height="69" class="img-responsive center-block"/></h3>
        <h3><a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/delivery_order') ?>', 'delivery order')"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg5.png" width="192" height="69" class="img-responsive center-block"/></a></h3>
        <h3><a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/collection_order') ?>', 'collection orders')"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg6.png" width="192" height="69" class="img-responsive center-block"/></a></h3>
        <h3><a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/waiting_order') ?>', 'waiting order')"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/seatedbg7.png" width="192" height="69" class="img-responsive center-block"/></a></h3>
        <div class="mainboard-left-sideber-bottom">
            <div class="page-exit-button text-uppercase text-center">
                <a href="javascript:void(0)" onclick="pageExit('<?php echo site_url("gkpos/indexajax") ?>', 'Mainboard')"><i class="fa fa-home"></i>&nbsp;&nbsp;<?php echo $this->lang->line('gkpos_home') ?></a>
            </div>
            <a href="javascript:void(0)" onclick="pageExit('<?php echo site_url("gkpos/settings") ?>', '<?php echo $this->lang->line('gkpos_system_management') ?>')"><div class="mainsystembg collection-bg img-responsive"><?php echo $this->lang->line('gkpos_system_management') ?></div></a>
            <a href="#"><div class="mainsystembg2 waiting-bg img-responsive"><?php echo $this->lang->line('gkpos_table_information') ?></div></a>
            <a href="#"><div class="mainsystembg waiting-bg img-responsive"><?php echo $this->lang->line('gkpos_name_table') ?></div></a>
            <a href="#"><div class="mainsystembg2 collection-bg  img-responsive"><?php echo $this->lang->line('gkpos_change_details') ?></div></a>
        </div>
    </div>
</div>