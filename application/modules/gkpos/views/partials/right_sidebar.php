<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 right-item">
    <div class="paginationbg">
        <ul>
            <li><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/prevbg.png" width="89" height="69" /></a></li>
            <li><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/nextbg.png" width="89" height="69" /></a></li>
        </ul>
        <a href="#"><div class="mainsystembg img-responsive"><?php echo $this->lang->line('gkpos_refresh')?></div></a>
        <h2><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/callersbg.png" width="192" height="73" class="img-responsive center-block"/></a></h2>
        <div class="callnumbg">
            <p><?php echo $this->lang->line('gkpos_customer')?>&nbsp; <?php echo $this->lang->line('gkpos_name')?></p>
            <input class="customernambg" type="text" name="cust_name" id="cust_name" />
        </div>

        <div class="callnumbg">
            <p><?php echo$this->lang->line('gkpos_phone')?>&nbsp;<?php echo $this->lang->line('gkpos_number')?> </p>
            <input class="customernambg" type="text" name="cust_phone" id="cust_phone"/>
        </div>
        <a href="#"><h4><img src="<?php echo ASSETS_GKPOS_PATH ?>images/clearbg.png" width="195"class="img-responsive center-block" /></h4></a>
        <div class="clearfix"></div>
        <div class="bottom-right">
            <a href="<?php echo site_url('gkpos/takeaway')?>"><div class="mainsystembg img-responsive"><?php echo $this->lang->line('gkpos_takeaway')?></div></a>
            <a href="#"><div class="mainsystembg2 img-responsive"><?php echo $this->lang->line('gkpos_bar_service')?></div></a>
            <a href="<?php echo site_url('gkpos/newtable')?>"><div class="mainsystembg img-responsive"><?php echo $this->lang->line('gkpos_new_table')?></div></a>
            <a href="<?php echo site_url('gkpos/newtableguest')?>"><div class="mainsystembg2 img-responsive"><?php echo $this->lang->line('gkpos_new_guest_table')?></div></a>
            <a href="#"><div class="mainsystembg img-responsive"><?php echo $this->lang->line('gkpos_logoff')?></div></a>
        </div>
    </div>
</div>