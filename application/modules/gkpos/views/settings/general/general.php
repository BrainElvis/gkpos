<input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bodyitem">
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
        <?php echo form_open('gkpos/settings/save_general/', array('id' => 'general_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
        <div id="config_wrapper">
            <fieldset id="config_info">
                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_restaurant_name'), 'gk_name', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-home" aria-hidden="true"></i></a></span>
                            <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                <input name="gk_name" class="form-control required"  type="text" id="gk_name" value="<?php echo $this->config->item('gk_name') ?>">
                            <?php else: ?>
                                <input name="gk_name" class="form-control required"  type="text" id="gk_name" onfocus="myJqueryKeyboard('gk_name')" value="<?php echo $this->config->item('gk_name') ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_logo'), 'gk_logo', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase')); ?>
                    <div class='col-lg-8 col-md-8 col-sm-8 col-xs-8'>
                        <div class="fileinput <?php echo isset($logo_exists) ? 'fileinput-exists' : 'fileinput-new'; ?>" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;"></div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;">
                                <img data-src="holder.js/100%x100%" alt="<?php echo $this->lang->line('gk_logo'); ?>"
                                     src="<?php
                                     if (isset($logo_exists))
                                         echo base_url('uploads/gkpos/logo/' . $this->Appconfig->get('gk_logo'));
                                     else
                                         echo '';
                                     ?>"
                                     style="max-height: 100%; max-width: 100%;">
                            </div>
                            <div>
                                <span class="btn btn-default btn-sm btn-file">
                                    <span class="fileinput-new"><?php echo $this->lang->line("gkpos_select_image"); ?></span>
                                    <span class="fileinput-exists"><?php echo $this->lang->line("gkpos_change_image"); ?></span>
                                    <input type="file" name="gk_logo">
                                </span>
                                <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line("gkpos_remove_image"); ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_address'), 'gk_address', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 required text-uppercase')); ?>
                    <div class='col-lg-8 col-md-8 col-sm-8 col-xs-8'>
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <?php echo form_textarea(array('name' => 'gk_address', 'rows' => 2, 'class' => 'form-control', 'id' => 'gk_address'), $this->config->item('gk_address')) ?>
                        <?php else: ?>
                            <textarea rows="2" name="gk_address" id="gk_address" class="form-control" onfocus="myJqueryKeyboard('gk_address')" ><?php echo $this->config->item('gk_address') ?></textarea>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_website'), 'gk_website', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase')); ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-home" aria-hidden="true"></i></a></span>
                            <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                <input name="gk_website" class="form-control required"  type="text" id="gk_website" value="<?php echo $this->config->item('gk_website') ?>">
                            <?php else: ?>
                                <input name="gk_website" class="form-control required"  type="text" id="gk_website" onfocus="myJqueryKeyboard('gk_website')" value="<?php echo $this->config->item('gk_website') ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_email'), 'gk_email', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase')); ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                            <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                <input name="gk_email" class="form-control"  type="text" id="gk_email" value="<?php echo $this->config->item('gk_email') ?>">
                            <?php else: ?>
                                <input name="gk_email" class="form-control"  type="text" id="gk_email" onfocus="myJqueryKeyboard('gk_email')" value="<?php echo $this->config->item('gk_email') ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_phone'), 'gk_phone', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 required text-uppercase')); ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon"  style="background-color: #FF0000;"><span class="glyphicon glyphicon-phone-alt"></span></span>
                            <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                <input name="gk_phone" class="form-control required"  type="text" id="gk_phone" value="<?php echo $this->config->item('gk_phone') ?>">
                            <?php else: ?>
                                <input name="gk_phone" class="form-control required"  type="text" id="gk_phone" onfocus="myJqueryKeyboard('gk_phone')" value="<?php echo $this->config->item('gk_phone') ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_fax'), 'gk_fax', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase')); ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                            <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                <input name="gk_fax" class="form-control"  type="text" id="gk_fax" value="<?php echo $this->config->item('gk_fax') ?>">
                            <?php else: ?>
                                <input name="gk_fax" class="form-control"  type="text" id="gk_fax" onfocus="myJqueryKeyboard('gk_fax')" value="<?php echo $this->config->item('gk_fax') ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_term_condition'), 'gk_policy', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 required text-uppercase')); ?>
                    <div class='col-lg-8 col-md-8 col-sm-8 col-xs-8'>
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <?php echo form_textarea(array('name' => 'gk_policy', 'rows' => 2, 'class' => 'form-control', 'id' => 'gk_policy'), $this->config->item('gk_policy')) ?>
                        <?php else: ?>
                            <textarea rows="2" name="gk_policy" id="gk_policy" class="form-control" onfocus="myJqueryKeyboard('gk_policy')" ><?php echo $this->config->item('gk_policy') ?></textarea>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group form-group-md">	

                    <div class="col-md-offset-4 col-md-8">
                        <ul id="general_error_message_box" class="error_message_box"></ul>
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
                $("a.fileinput-exists").click(function () {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo site_url("admin/config/remove_logo"); ?>",
                        dataType: "json"
                    });
                });

                $('#general_form').validate({
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
                    errorLabelContainer: "#general_error_message_box",
                    wrapper: "li",
                    highlight: function (e) {
                        $(e).closest('.form-group').addClass('has-error');
                    },
                    unhighlight: function (e) {
                        $(e).closest('.form-group').removeClass('has-error');
                    },
                    rules:
                            {
                                gk_name: "required",
                                gk_address: "required",
                                gk_phone: "required",
                                gk_email: "email",
                                gk_policy: "required"
                            },
                    messages:
                            {
                                gk_name: "<?php echo $this->lang->line('gkpos_restaurant_name_required'); ?>",
                                gk_address: "<?php echo $this->lang->line('gkpos_address_required'); ?>",
                                gk_phone: "<?php echo $this->lang->line('gkpos_valid_phone_required'); ?>",
                                gk_email: "<?php echo $this->lang->line('gkpos_email_invalid_format'); ?>",
                                gk_policy: "<?php echo $this->lang->line('gkpos_return_policy_required'); ?>"
                            }
                });
            });
        </script>
    </div>
</div>

