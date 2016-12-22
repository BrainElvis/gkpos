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
                    <?php echo $this->load->view('gkpos/partials/keyboard_setting') ?>
                    <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
                </div>
                <div id="MiddleContent">
                    <?php echo form_open('admin/config/save_general/', array('id' => 'info_config_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
                    <div id="config_wrapper">
                        <fieldset id="config_info">
                            <div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
                            <ul id="general_error_message_box" class="error_message_box"></ul>
                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('config_company'), 'company', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 required')); ?>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-home"></span></span>
                                        <?php
                                        echo form_input(array(
                                            'name' => 'company',
                                            'id' => 'company',
                                            'class' => 'form-control input-sm required',
                                            'value' => $this->config->item('company')));
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('config_company_logo'), 'company_logo', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4')); ?>
                                <div class='col-lg-8 col-md-8 col-sm-8 col-xs-8'>
                                    <div class="fileinput <?php echo isset($logo_exists) ? 'fileinput-exists' : 'fileinput-new'; ?>" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;"></div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;">
                                            <img data-src="holder.js/100%x100%" alt="<?php echo $this->lang->line('config_company_logo'); ?>"
                                                 src="<?php
                                                 if (isset($logo_exists))
                                                     echo base_url('uploads/' . $this->Appconfig->get('company_logo'));
                                                 else
                                                     echo '';
                                                 ?>"
                                                 style="max-height: 100%; max-width: 100%;">
                                        </div>
                                        <div>
                                            <span class="btn btn-default btn-sm btn-file">
                                                <span class="fileinput-new"><?php echo $this->lang->line("config_company_select_image"); ?></span>
                                                <span class="fileinput-exists"><?php echo $this->lang->line("config_company_change_image"); ?></span>
                                                <input type="file" name="company_logo">
                                            </span>
                                            <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput"><?php echo $this->lang->line("config_company_remove_image"); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('config_address'), 'address', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 required')); ?>
                                <div class='col-lg-8 col-md-8 col-sm-8 col-xs-8'>
                                    <?php
                                    echo form_textarea(array(
                                        'name' => 'address',
                                        'id' => 'address',
                                        'class' => 'form-control input-sm required',
                                        'rows' => 2,
                                        'value' => $this->config->item('address')));
                                    ?>
                                </div>
                            </div>

                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('config_website'), 'website', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4')); ?>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-globe"></span></span>
                                        <?php
                                        echo form_input(array(
                                            'name' => 'website',
                                            'id' => 'website',
                                            'class' => 'form-control input-sm',
                                            'value' => $this->config->item('website')));
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('common_email'), 'email', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4')); ?>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-envelope"></span></span>
                                        <?php
                                        echo form_input(array(
                                            'name' => 'email',
                                            'id' => 'email',
                                            'type' => 'email',
                                            'class' => 'form-control input-sm',
                                            'value' => $this->config->item('email')));
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('config_phone'), 'phone', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 required')); ?>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                        <?php
                                        echo form_input(array(
                                            'name' => 'phone',
                                            'id' => 'phone',
                                            'class' => 'form-control input-sm required',
                                            'value' => $this->config->item('phone')));
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('config_fax'), 'fax', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4')); ?>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                        <?php
                                        echo form_input(array(
                                            'name' => 'fax',
                                            'id' => 'fax',
                                            'class' => 'form-control input-sm',
                                            'value' => $this->config->item('fax')));
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('common_return_policy'), 'return_policy', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 required')); ?>
                                <div class='col-lg-8 col-md-8 col-sm-8 col-xs-8'>
                                    <?php
                                    echo form_textarea(array(
                                        'name' => 'return_policy',
                                        'id' => 'return_policy',
                                        'class' => 'form-control input-sm required',
                                        'rows' => 2,
                                        'value' => $this->config->item('return_policy')));
                                    ?>
                                </div>
                            </div>
                            <div class="form-group form-group-md">	
                                <div class="col-md-offset-4 col-md-8">
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

                            $('#info_config_form').validate({
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
                                            company: "required",
                                            address: "required",
                                            phone: "required",
                                            email: "email",
                                            return_policy: "required"
                                        },
                                messages:
                                        {
                                            company: "<?php echo $this->lang->line('config_company_required'); ?>",
                                            address: "<?php echo $this->lang->line('config_address_required'); ?>",
                                            phone: "<?php echo $this->lang->line('config_phone_required'); ?>",
                                            email: "<?php echo $this->lang->line('common_email_invalid_format'); ?>",
                                            return_policy: "<?php echo $this->lang->line('config_return_policy_required'); ?>"
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