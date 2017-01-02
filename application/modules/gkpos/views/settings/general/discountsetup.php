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
                    <?php echo $this->load->view('gkpos/settings/keyboard_setting') ?>
                    <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
                </div>
                <div id="MiddleContent">
                    <?php echo form_open('gkpos/settings/save_discount/', array('id' => 'discount_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
                    <div id="config_wrapper">
                        <fieldset id="config_info">
                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('dkpos_default_discount'), 'gk_vat_percent', array('class' => 'control-label col-lg-5 col-md-5 col-sm-5 col-xs-5 text-uppercase required')); ?>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-table" aria-hidden="true"></i></a></span>
                                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                            <input name="gk_discount_percent" class="form-control required"  type="text" id="gk_discount_percent" value="<?php echo $this->config->item('gk_discount_percent') ?>">
                                        <?php else: ?>
                                            <input name="gk_discount_percent" class="form-control required"  type="text" id="gk_discount_percent" onfocus="myJqueryKeyboard('gk_discount_percent')" value="<?php echo $this->config->item('gk_discount_percent') ?>">
                                        <?php endif; ?>
                                        <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-percent" aria-hidden="true"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm">	
                                <label for="radio-inline" class="col-lg-5 col-md-5 col-sm-5 col-xs-5 control-label text-uppercase required"><?php echo $this->lang->line('gkpos_auto_default_discount_applied') ?></label>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <label class="radio-inline text-uppercase required"><input type="radio" name="gk_discount_applied" id="gk_discount_applied1" value="yes" <?php ($this->config->item('gk_discount_applied') == "yes") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_yes') ?></label>
                                    <label class="radio-inline text-uppercase required"><input type="radio" name="gk_discount_applied" id="gk_discount_applied2" value="no" <?php ($this->config->item('gk_discount_applied') == "no") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_no') ?></label>
                                </div>
                            </div>

                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('gkpos_discount_applied'), '', array('class' => 'text-uppercase control-label col-lg-5 col-md-5 col-sm-5 col-xs-5')); ?>
                                <div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 text-uppercase '><?php echo form_checkbox(array('name' => 'gk_discount_food', 'class' => 'checkbox-inline', 'value' => 'yes', 'checked' => $this->config->item('gk_discount_food'))); ?><span class="discount-lebel"><?php echo $this->lang->line('gkpos_food') ?></span></div>
                                <div class='col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center text-uppercase '><?php echo form_checkbox(array('name' => 'gk_discount_nonfood', 'class' => 'checkbox-inline', 'value' => 'yes', 'checked' => $this->config->item('gk_discount_nonfood'))); ?> <span class="discount-lebel"><?php echo $this->lang->line('gkpos_non_food') ?></span></div>
                            </div>
                            <div class="form-group form-group-md">	
                                <div class="col-md-offset-5 col-md-7">
                                    <ul id="discount_error_message_box" class="error_message_box"></ul>
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

                            $('#discount_form').validate({
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
                                errorLabelContainer: "#discount_error_message_box",
                                wrapper: "li",
                                highlight: function (e) {
                                    $(e).closest('.form-group').addClass('has-error');
                                },
                                unhighlight: function (e) {
                                    $(e).closest('.form-group').removeClass('has-error');
                                },
                                rules:
                                        {
                                            gk_discount_percent: {
                                                number: true,
                                                required: true
                                            },
                                            gk_discount_applied: "required",
                                        },
                                messages:
                                        {
                                            gk_discount_percent: "<?php echo $this->lang->line('gkpos_discount_percent_required') ?>",
                                            gk_discount_applied: "<?php echo $this->lang->line('gkpos_discount_auto_applied_required') ?>"
                                        }
                            });
                        });
                    </script>
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