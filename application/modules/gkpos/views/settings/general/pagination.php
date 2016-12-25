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
                    <?php echo form_open('gkpos/settings/save_pagination/', array('id' => 'pagination_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
                    <div id="config_wrapper">
                        <fieldset id="config_info">
                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('gkpos_category_num_per_page'), 'gk_category_line_page', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-table" aria-hidden="true"></i></a></span>
                                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                            <input name="gk_category_line_page" class="form-control required"  type="text" id="gk_category_line_page" value="<?php echo $this->config->item('gk_category_line_page') ?>">
                                        <?php else: ?>
                                            <input name="gk_category_line_page" class="form-control required"  type="text" id="gk_category_line_page" onfocus="myJqueryKeyboard('gk_category_line_page')" value="<?php echo $this->config->item('gk_category_line_page') ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('gkpos_menu_num_per_page'), 'gk_menu_line_page', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-table" aria-hidden="true"></i></a></span>
                                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                            <input name="gk_menu_line_page" class="form-control required"  type="text" id="gk_vat_percent" value="<?php echo $this->config->item('gk_menu_line_page') ?>">
                                        <?php else: ?>
                                            <input name="gk_menu_line_page" class="form-control required"  type="text" id="gk_vat_percent" onfocus="myJqueryKeyboard('gk_vat_percent')" value="<?php echo $this->config->item('gk_menu_line_page') ?>">
                                        <?php endif; ?>
                                        <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-percent" aria-hidden="true"></i></a></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group-md">	
                                <div class="col-md-offset-4 col-md-8">
                                    <ul id="pagination_error_message_box" class="error_message_box"></ul>
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

                            $('#pagination_form').validate({
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
                                errorLabelContainer: "#pagination_error_message_box",
                                wrapper: "li",
                                highlight: function (e) {
                                    $(e).closest('.form-group').addClass('has-error');
                                },
                                unhighlight: function (e) {
                                    $(e).closest('.form-group').removeClass('has-error');
                                },
                                rules:
                                        {
                                            gk_category_line_page: {
                                                number: true,
                                                required: true
                                            },
                                            gk_menu_line_page: {
                                                number: true,
                                                required: true
                                            },
                                        },
                                messages:
                                        {
                                            gk_category_line_page: "<?php echo $this->lang->line('gkpos_category_num_per_page'); ?>",
                                            gk_menu_line_page: "<?php echo $this->lang->line('gkpos_menu_num_per_page') ?>",
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