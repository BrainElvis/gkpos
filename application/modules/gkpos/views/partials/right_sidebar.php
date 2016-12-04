<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 right-item">
    <div class="paginationbg">
        <ul>
            <li><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/prevbg.png" width="89" height="69" /></a></li>
            <li><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/nextbg.png" width="89" height="69" /></a></li>
        </ul>
        <a href="#"><div class="mainsystembg waiting-bg img-responsive"><?php echo $this->lang->line('gkpos_refresh') ?></div></a>


        <div class="center-div extra-bg">
            <h2><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/callersbg.png" width="192" height="73" class="img-responsive center-block"/></a></h2>
            <div class="callnumbg">
                <p><?php echo $this->lang->line('gkpos_customer') ?>&nbsp; <?php echo $this->lang->line('gkpos_name') ?></p>
                <input class="customernambg" type="text" name="cust_name" id="cust_name" onfocus="myJqueryKeyboard('cust_name')" placeholder="Customer Name" />
            </div>

            <div class="callnumbg">
                <p><?php echo$this->lang->line('gkpos_phone') ?>&nbsp;<?php echo $this->lang->line('gkpos_number') ?> </p>
                <input class="customernambg" type="text" name="cust_phone" id="cust_phone" onfocus="myJqueryKeyboard('cust_phone')" placeholder="Customer Phone"/>
            </div>
            <a href="<?php echo site_url('gkpos/takeaway') ?>"><div class="mainsystembg delivery-bg img-responsive"><?php echo $this->lang->line('gkpos_finished') ?></div></a>
        </div>
        <div class="clearfix"></div>
        <div class="bottom-right">
            <a href="<?php echo site_url('gkpos/takeaway') ?>"><div class="mainsystembg collection-bg img-responsive"><?php echo $this->lang->line('gkpos_takeaway') ?></div></a>
            <a href="#"><div class="mainsystembg2 img-responsive waiting-bg"><?php echo $this->lang->line('gkpos_bar_service') ?></div></a>
            <a href="<?php echo site_url('gkpos/table') ?>"><div class="mainsystembg waiting-bg img-responsive"><?php echo $this->lang->line('gkpos_new_table') ?></div></a>
            <!--<a href="<?php echo site_url('gkpos/newtableguest') ?>"><div class="mainsystembg2 img-responsive"><?php echo $this->lang->line('gkpos_new_guest_table') ?></div></a>-->
            <a href="#"><div class="mainsystembg img-responsive collection-bg"><?php echo $this->lang->line('gkpos_logoff') ?></div></a>
        </div>
    </div>
</div>