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
                    <?php echo form_open('gkpos/settings/save_promotion/', array('id' => 'promotion_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
                    <div id="config_wrapper">
                        <fieldset id="config_info">
                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('gkpos_voucher_title'), 'gk_name', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-table" aria-hidden="true"></i></a></span>
                                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                            <input name="title" class="form-control required"  type="text" id="title" value="<?php isset($title) ? print $title : print'' ?>">
                                        <?php else: ?>
                                            <input name="title" class="form-control required"  type="text" id="title" onfocus="myJqueryKeyboard('title')" value="<?php isset($title) ? print $title : print'' ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('gkpos_voucher_code'), 'gk_vat_percent', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-table" aria-hidden="true"></i></a></span>
                                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                            <input name="code" class="form-control required"  type="text" id="code" value="<?php isset($code) ? print $code : print'' ?>">
                                        <?php else: ?>
                                            <input name="code" class="form-control required"  type="text" id="code" onfocus="myJqueryKeyboard('code')" value="<?php isset($code) ? print $code : print'' ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group form-group-sm">	
                                <?php echo form_label($this->lang->line('gkpos_voucher_amount'), 'gk_vat_percent', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-table" aria-hidden="true"></i></a></span>
                                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                            <input name="amount" class="form-control required"  type="text" id="amount" value="<?php isset($amount) ? print $amount : print '' ?>">
                                        <?php else: ?>
                                            <input name="amount" class="form-control required"  type="text" id="amount" onfocus="myJqueryKeyboard('amount')" value="<?php isset($amount) ? print $amount : print '' ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-group-sm">	
                                <label for="radio-inline" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label text-uppercase required"><?php echo $this->lang->line('gkpos_voucher_amount_function') ?></label>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <label class="radio-inline text-uppercase required"><input type="radio" name="function" id="function-percent" value="percent" <?php (isset($function) && $function == "percent") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_fixed') ?></label>
                                    <label class="radio-inline text-uppercase required"><input type="radio" name="function" id="function-percent" value="fixed" <?php (isset($function) && $function == "fixed") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_percentage') ?></label>
                                </div>
                            </div>

                            <div class="form-group form-group-md">	
                                <div class="col-md-offset-4 col-md-8">
                                    <ul id="promotion_error_message_box" class="error_message_box"></ul>
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
                            $('#promotion_form').validate({
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
                                errorLabelContainer: "#promotion_error_message_box",
                                wrapper: "li",
                                highlight: function (e) {
                                    $(e).closest('.form-group').addClass('has-error');
                                },
                                unhighlight: function (e) {
                                    $(e).closest('.form-group').removeClass('has-error');
                                },
                                rules:
                                        {
                                            title: "required",
                                            code: "required",
                                            amount: {
                                                number: true,
                                                required: true
                                            },
                                            function: "required",
                                        },
                                messages:
                                        {
                                            title: "<?php echo $this->lang->line('gkpos_vat_reg_no_required'); ?>",
                                            code: "<?php echo $this->lang->line('gkpos_vat_percent_required') ?>",
                                            amount: "<?php echo $this->lang->line('gkpos_tax_included_required') ?>",
                                            function: 'amount function'
                                        }
                            });
                        });
                    </script>

                    <div class="clearfix"></div>
                    <div class="voucher-list">
                        <table class="table table-responsive table-bordered fieldset">
                            <tr>
                                <th>title</th> 
                                <th>code</th> 
                                <th>Discount Amount</th> 
                                <th>Action</th> 
                            </tr>
                            <?php if (!empty($voucher_list)): ?>
                                <?php foreach ($voucher_list as $voucher): ?> 
                                    <tr>
                                        <td><?php echo $voucher->title ?></td> 
                                        <td><?php echo $voucher->code ?></td> 
                                        <td><?php $voucher->function == 'fixed' ? print to_currency($voucher->amount) : print to_tax_decimals($voucher->amount) . '&percnt;' ?></td> 
                                        <td>
                                            <a href='javascript:void(0)' onclick="updatePromotion('<?php echo $voucher->id ?>', '<?php echo site_url('gkpos/settings/update_promotion') ?>', '<?php $voucher->status == 1 ? print'deactivate' : print 'activate' ?>')"><?php $voucher->status == 1 ? print'Deactivate' : print 'Activate' ?> </a>
                                            |
                                            <a href='javascript:void(0)' onclick="updatePromotion('<?php echo $voucher->id ?>', '<?php echo site_url('gkpos/settings/update_promotion') ?>','delete')">Delete</a> 
                                        </td> 
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4">No Vouchers found</td> 
                                </tr>
                            <?php endif; ?>
                        </table>                        
                    </div>
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
<script>
    function updatePromotion(voucher_id, url, action) {
        $.ajax({
            url: url,
            data: {
                id: voucher_id,
                action: action
            },
            type: "POST",
            success: function (output) {
                getBaseAjaxPage('<?php echo site_url("gkpos/settings/promotion") ?>', 'General - Promotion');
            },
        });
    }
</script>