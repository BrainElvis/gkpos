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
                <?php if ($this->config->item('is_touch') == 'disable'): ?>
                    <input class="customernambg" type="text" name="caller_name" id="caller_name"  placeholder="Caller Name" />
                <?php else: ?>
                    <input class="customernambg" type="text" name="caller_name" id="caller_name" onfocus="myJqueryKeyboard('caller_name')" placeholder="Caller Name" />
                <?php endif ?>
            </div>
            <div class="callnumbg">
                <p><?php echo$this->lang->line('gkpos_phone') ?>&nbsp;<?php echo $this->lang->line('gkpos_number') ?> </p>
                <?php if ($this->config->item('is_touch') == 'disable'): ?>
                    <input class="customernambg" type="text" name="caller_phone" id="caller_phone" placeholder="Caller Phone number"/>
                <?php else: ?>
                    <input class="customernambg" type="text" name="caller_phone" id="caller_phone" onfocus="myJqueryKeyboard('caller_phone')" placeholder="Caller Phone number"/>
                <?php endif ?>
            </div>
            <div class="callnumbg">
                <p><?php echo "Order Type" ?></p>
                <?php if ($this->config->item('is_touch') == 'disable'): ?>
                    <input class="customernambg" type="text" name="caller_order_type" id="caller_order_type" placeholder="Caller Order Type"/>
                <?php else: ?>
                    <input class="customernambg" type="text" name="caller_order_type" id="caller_order_type" onfocus="myJqueryKeyboard('caller_order_type')" placeholder="caller_order_type"/>
                <?php endif ?>
            </div>
            <a href="javascript:void(0)" onclick="checkCallerInfo()"><div class="mainsystembg delivery-bg img-responsive caller-info-submit"><?php echo $this->lang->line('gkpos_finished') ?></div></a>
        </div>
        <div class="clearfix"></div>
        <div class="bottom-right">
            <a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/takeaway') ?>', 'false')"  id="takeaway"><div class="mainsystembg collection-bg img-responsive"><?php echo $this->lang->line('gkpos_takeaway') ?></div></a>
            <a href="#"><div class="mainsystembg2 img-responsive waiting-bg"><?php echo $this->lang->line('gkpos_bar_service') ?></div></a>
            <a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/table') ?>', 'table')"  id="takeaway"><div class="mainsystembg waiting-bg img-responsive"><?php echo $this->lang->line('gkpos_new_table') ?></div></a>
            <!--<a href="<?php echo site_url('gkpos/newtableguest') ?>"><div class="mainsystembg2 img-responsive"><?php echo $this->lang->line('gkpos_new_guest_table') ?></div></a>-->
            <a href="#"><div class="mainsystembg img-responsive collection-bg"><?php echo $this->lang->line('gkpos_logoff') ?></div></a>
        </div>
    </div>
</div>
<script>
    function checkCallerInfo() {
        var caller_phone = $("#caller_phone").val();
        var caller_order_type = $("#caller_order_type").val();
        if(caller_phone =='' ||  caller_order_type =='' ){
            alert("Caller phone and order type are  required");
        }else{
            getPage(base_url+"gkpos/"+caller_order_type.toLowerCase());
        }
    }
</script>
