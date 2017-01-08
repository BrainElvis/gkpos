<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bodyitem">
    <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
    <div class="row" style="margin: 0px 5px 0 5px;">
        <div class="deliverybg col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="javascript:void(0)" onclick="getSettingPage('<?php echo site_url('gkpos/settings/general') ?>', 'general - info')"  ><h2 style="font-size: 11px"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/deliveryicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_general_info') ?></h2></a>
        </div>
        <div class="collectionbg col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="javascript:void(0)" onclick="getSettingPage('<?php echo site_url('gkpos/settings/vatsetup') ?>', 'general - vatsetup')" ><h2 style="font-size: 11px"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/collectionicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_general_vat_setup') ?></h2></a>
        </div>
        <div class="waitingbg col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="javascript:void(0)" onclick="getSettingPage('<?php echo site_url('gkpos/settings/discountsetup') ?>', 'general - discount')" > <h2 style="font-size: 11px"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_discount') ?></h2></a>
        </div>
        <div class="collectionbg col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="javascript:void(0)" onclick="getSettingPage('<?php echo site_url('gkpos/settings/promotion') ?>', 'general - promotion')"> <h2 style="font-size: 11px"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_promotion') ?></h2></a>
        </div>
        <div class="deliverybg col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="javascript:void(0)" onclick="getSettingPage('<?php echo site_url('gkpos/settings/depliveryplan') ?>', 'g - deliveryplan')"  ><h2 style="font-size: 11px"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/deliveryicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_delivery_plan') ?></h2></a>
        </div>
        <div class="waitingbg col-lg-2 col-md-2 col-sm-2 col-xs-4">
            <a href="javascript:void(0)" onclick="getSettingPage('<?php echo site_url('gkpos/settings/pagination') ?>', 'general - pagination')" > <h2 style="font-size: 11px"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_pagination') ?></h2></a>
        </div>
    </div>
    <div class="row">
        <?php echo form_open('gkpos/settings/save_vat/', array('id' => 'vat_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
        <div id="config_wrapper">
            <fieldset id="config_info">
                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_vat_reg_no'), 'gk_name', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-table" aria-hidden="true"></i></a></span>
                            <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                <input name="gk_vat_reg" class="form-control required"  type="text" id="gk_vat_reg" value="<?php echo $this->config->item('gk_vat_reg') ?>">
                            <?php else: ?>
                                <input name="gk_vat_reg" class="form-control required"  type="text" id="gk_vat_reg" onfocus="myJqueryKeyboard('gk_vat_reg')" value="<?php echo $this->config->item('gk_vat_reg') ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_vat_percent'), 'gk_vat_percent', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-table" aria-hidden="true"></i></a></span>
                            <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                <input name="gk_vat_percent" class="form-control required"  type="text" id="gk_vat_percent" value="<?php echo $this->config->item('gk_vat_percent') ?>">
                            <?php else: ?>
                                <input name="gk_vat_percent" class="form-control required"  type="text" id="gk_vat_percent" onfocus="myJqueryKeyboard('gk_vat_percent')" value="<?php echo $this->config->item('gk_vat_percent') ?>">
                            <?php endif; ?>
                            <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-percent" aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                </div>
                <div class="form-group form-group-sm">	
                    <label for="radio-inline" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label text-uppercase required"><?php echo $this->lang->line('gkpos_tax_incuded') ?></label>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <label class="radio-inline text-uppercase required"><input type="radio" name="gk_vat_included" id="gk_vat_percent1" value="yes" <?php ($this->config->item('gk_vat_included') == "yes") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_yes') ?></label>
                        <label class="radio-inline text-uppercase required"><input type="radio" name="gk_vat_included" id="gk_vat_percent2" value="no" <?php ($this->config->item('gk_vat_included') == "no") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_no') ?></label>
                    </div>
                </div>

                <div class="form-group form-group-md">	
                    <div class="col-md-offset-4 col-md-8">
                        <ul id="vat_error_message_box" class="error_message_box"></ul>
                        <?php
                        echo form_submit(array(
                            'name' => 'submit_form',
                            'id' => 'submit_form',
                            'value' => $this->lang->line('gkpos_numpad_key_enter'),
                            'class' => 'form-submit-button mainsystembg2 waiting-bg img-responsive delivery-info-submit-btn'));
                        ?>
                    </div>
                </div>
            </fieldset>
        </div>
        <?php echo form_close(); ?>
        <script type='text/javascript'>
            //validation and submit handling
            $(document).ready(function ()
            {
                $('#vat_form').validate({
                    submitHandler: function (form) {
                        $(form).ajaxSubmit({
                            success: function (response) {
                                if (response.success)
                                {
                                    set_feedback(response.message, 'alert alert-dismissible alert-success', false);
                                } else
                                {
                                    set_feedback(response.message, 'alert alert-dismissible alert-danger', true);
                                }
                            },
                            dataType: 'json'
                        });
                    },
                    errorClass: "has-error",
                    errorLabelContainer: "#vat_error_message_box",
                    wrapper: "li",
                    highlight: function (e) {
                        $(e).closest('.form-group').addClass('has-error');
                    },
                    unhighlight: function (e) {
                        $(e).closest('.form-group').removeClass('has-error');
                    },
                    rules:
                            {
                                gk_vat_reg: "required",
                                gk_vat_percent: {
                                    number: true,
                                    required: true
                                },
                                gk_vat_included: "required",
                            },
                    messages:
                            {
                                gk_vat_reg: "<?php echo $this->lang->line('gkpos_vat_reg_no_required'); ?>",
                                gk_vat_percent: "<?php echo $this->lang->line('gkpos_vat_percent_required') ?>",
                                gk_vat_included: "<?php echo $this->lang->line('gkpos_tax_included_required') ?>"
                            }
                });
            });
        </script>
    </div>
</div>
