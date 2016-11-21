<div class="col-md-3 col-sm-3 col-xs-3 right-item">
    <div class="paginationbg">
        <ul>
            <li><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/prevbg.png" width="89" height="69" /></a></li>
            <li><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/nextbg.png" width="89" height="69" /></a></li>
        </ul>
        <div class="mainsystembg img-responsive"><a href="#"><?php echo $this->lang->line('gkpos_refresh')?></a></div>
        <h2><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/callersbg.png" width="192" height="73" class="img-responsive center-block"/></a></h2>
        <div class="callnumbg">
            <p><?php echo $this->lang->line('gkpos_customer')?>&nbsp; <?php echo $this->lang->line('gkpos_name')?></p>
            <input class="customernambg" type="text" name="cust_name" id="cust_name" />
        </div>

        <div class="callnumbg">
            <p><?php echo$this->lang->line('gkpos_phone')?>&nbsp;<?php echo $this->lang->line('gkpos_number')?> </p>
            <input class="customernambg" type="text" name="cust_phone" id="cust_phone"/>
        </div>
        <h4><img src="<?php echo ASSETS_GKPOS_PATH ?>images/clearbg.png" width="136" height="49" class="img-responsive center-block" /></h4>
        <div class="bottom-right">
            <div class="mainsystembg img-responsive"><a href="<?php echo site_url('gkpos/takeaway')?>"><?php echo $this->lang->line('gkpos_takeaway')?></a></div>
            <div class="mainsystembg2 img-responsive"><a href="#"><?php echo $this->lang->line('gkpos_bar_service')?></a></div>
            <div class="mainsystembg img-responsive"><a href="<?php echo site_url('gkpos/newtable')?>"><?php echo $this->lang->line('gkpos_new_table')?></a></div>
            <div class="mainsystembg2 img-responsive"><a href="<?php echo site_url('gkpos/newtableguest')?>"><?php echo $this->lang->line('gkpos_new_guest_table')?></a></div>
            <div class="mainsystembg img-responsive"><a href="#"><?php echo $this->lang->line('gkpos_logoff')?></a></div>
        </div>
    </div>
</div>