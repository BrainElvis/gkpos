<div class="modal-header">
    <div class="phone-call col-md-12"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/phoneicon.png" width="33" height="33" /> 
        <?php if (isset($isPhoneCall) && $isPhoneCall == 'yes'): ?>
            <span class="phone-yes"><?php echo $this->lang->line('gkpos_call') ?></span>
        <?php else: ?>
            <span class="phone-no"><?php echo $this->lang->line('gkpos_no_call') ?></span>
        <?php endif ?>
        <span><?php echo" ( " . $current_section . " )" ?></span>
        <span  class="loading centered" id="deliveryAjaxLoading" style="display:none;"><img src="<?php echo ASSETS_GKPOS_PATH . 'images/ajax-loader.gif' ?>" alt="Loading..."/></span>
        <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
    </div>
</div>
<div class="formpartbg">
    <fieldset>
        <form class="form-horizontal" action="<?php echo site_url('gkpos/orderinitiate') ?>" method="post" id="gkposDeliveryForm">
            <legend><?php echo $this->lang->line('gkpos_customer') . " " . $this->lang->line('gkpos_information') ?></legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label required" ><?php echo $this->lang->line('gkpos_phone') ?></label> 
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a></span>
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <input name="phone" placeholder="<?php echo $this->lang->line('gkpos_phone') ?>" class="form-control required"  type="text" id="phone" value="<?php (isset($callerPhone) && ($callerPhone != '' || $callerPhone != null)) ? print $callerPhone : print '' ?>">
                        <?php else: ?>
                            <input name="phone" placeholder="<?php echo $this->lang->line('gkpos_phone') ?>" class="form-control required"  type="text" id="phone" onfocus="myJqueryKeyboard('phone')" value="<?php (isset($callerPhone) && ($callerPhone != '' || $callerPhone != null)) ? print $callerPhone : print '' ?>">
                        <?php endif; ?>
                        <span class="input-group-addon" style="background-color: #FF0000;" data-toggle="tooltip-delivery-phone" data-placement="bottom"  title="<?php echo $this->lang->line('gkpos_click_to_get_customer_by_phone') ?>"><a href="javascript:void(0)" onclick="searchCustomerByKey('phone')"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label required"><?php echo $this->lang->line('gkpos_name') ?></label>  
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-navicon" aria-hidden="true"></i></a></span>
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <input  type="text" name="name" id="name" placeholder="<?php echo $this->lang->line('gkpos_name') ?>" class="form-control required" value="<?php (isset($callerName) && ($callerName != '' || $callerName != null)) ? print $callerName : print '' ?>">
                        <?php else: ?>
                            <input  type="text" name="name" id="name" placeholder="<?php echo $this->lang->line('gkpos_name') ?>" class="form-control required" onfocus="myJqueryKeyboard('name')" value="<?php (isset($callerName) && ($callerName != '' || $callerName != null)) ? print $callerName : print '' ?>">
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_floor_or_apt_no') ?></label>  
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-home" aria-hidden="true"></i></a></span>
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <input name="floor_or_apt" placeholder="<?php echo $this->lang->line('gkpos_floor_or_apt_no') ?>" class="form-control" id="floor_or_apt"  type="text" >
                        <?php else: ?>
                            <input name="floor_or_apt" placeholder="<?php echo $this->lang->line('gkpos_floor_or_apt_no') ?>" class="form-control" id="floor_or_apt"  type="text" onfocus="myJqueryKeyboard('floor_or_apt')">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_building') . ' ', $this->lang->line('gkpos_name') ?></label>  
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-building" aria-hidden="true"></i></a></span>
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <input name="building" placeholder="<?php echo $this->lang->line('gkpos_building') . ' ', $this->lang->line('gkpos_name') ?>" class="form-control" type="text" id="building">
                        <?php else: ?>
                            <input name="building" placeholder="<?php echo $this->lang->line('gkpos_building') . ' ', $this->lang->line('gkpos_name') ?>" class="form-control" type="text" id="building" onfocus="myJqueryKeyboard('building')">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_house') . ' ', $this->lang->line('gkpos_number') ?></label>  
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-home" aria-hidden="true"></i></a></span>
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <input name="house"  id="house" placeholder="<?php echo $this->lang->line('gkpos_house') . ' ', $this->lang->line('gkpos_number') ?>" class="form-control" type="text">
                        <?php else: ?>
                            <input name="house"  id="house" placeholder="<?php echo $this->lang->line('gkpos_house') . ' ', $this->lang->line('gkpos_number') ?>" class="form-control" type="text" onfocus="myJqueryKeyboard('house')">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label required"><?php echo $this->lang->line('gkpos_street') . ' ', $this->lang->line('gkpos_name') ?></label>  
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-road" aria-hidden="true"></i></a></span>
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <input name="street" placeholder="<?php echo $this->lang->line('gkpos_street') . ' ', $this->lang->line('gkpos_name') ?>" class="form-control required" type="text" id="street">
                        <?php else: ?>
                            <input name="street" placeholder="<?php echo $this->lang->line('gkpos_street') . ' ', $this->lang->line('gkpos_name') ?>" class="form-control required" type="text" id="street" onfocus="myJqueryKeyboard('street')">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label required"><?php echo $this->lang->line('gkpos_postal_code') ?></label>  
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-street-view" aria-hidden="true"></i></a></span>
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <input name="postcode" placeholder="<?php echo $this->lang->line('gkpos_postal_code') ?>" class="form-control text-uppercase required" type="text" id="postcode">
                        <?php else: ?>
                            <input name="postcode" placeholder="<?php echo $this->lang->line('gkpos_postal_code') ?>" class="form-control text-uppercase required" type="text" id="postcode" onfocus="myJqueryKeyboard('postcode')">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label required"><?php echo $this->lang->line('gkpos_delivery_time') ?></label>  
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i></a></span>
                        <input name="delivery_time" placeholder="<?php echo $this->lang->line('gkpos_delivery_time') ?>" class="form-control date_filter required" type="text" id="delivery_time">
                    </div>
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-md-offset-4 col-md-8">
                    <input type="hidden" name="order_type" value="<?php (isset($info) && ($info != '' || $info != null) && $info = 'delivery' ) ? print strtolower($info) : print"delivery" ?>">
                    <input class="form-submit-button mainsystembg2 waiting-bg img-responsive delivery-info-submit-btn" type="submit" name="submit_form" value="<?php echo $this->lang->line('gkpos_finished') ?>" onclick="saveDeliveryInfo('gkposDeliveryForm', 'gkposDeliveryFormErrorMsgBox', 'idToCheck<?php echo '1' ?>')">
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-md-12">
                    <ul id="gkposDeliveryFormErrorMsgBox" class="error_message_box"></ul>
                </div>
            </div>
        </form>
    </fieldset>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('[data-toggle="tooltip-delivery-phone"]').tooltip();
        //dont delete the following code it is alternative of tooptip
        //$('[data-toggle="tooltip-delivery-phone"]').popover({trigger: 'hover click'});

        addjqueryValidatorFunction();
<?php $this->load->view('gkpos/partials/datepicker_locale'); ?>
        $(".date_filter").datetimepicker({
        format: "<?php echo gkpos_dateformat($this->config->item("dateformat")) . ' ' . dateformat_bootstrap($this->config->item("timeformat")); ?>",
                startDate: "<?php echo date($this->config->item('dateformat') . ' ' . $this->config->item('timeformat'), mktime(0, 0, 0, 1, 1, 2010)); ?>",
<?php
$t = $this->config->item('timeformat');
$m = $t[strlen($t) - 1];
if (strpos($this->config->item('timeformat'), 'a') !== false || strpos($this->config->item('timeformat'), 'A') !== false) {
    ?>
            showMeridian: true,
<?php } else { ?>
            scriptshowMeridian: false,
<?php } ?>
        autoclose: true,
                todayBtn: true,
                todayHighlight: true,
                bootcssVer: 3,
                language: "<?php echo $this->config->item('language'); ?>"
    });
    });
            function saveDeliveryInfo(formId, error_message_box, idToCheck) {
                $('#' + formId).validate({
                    submitHandler: function (form) {
                        $(form).ajaxSubmit({
                            beforeSend: function () {
                                $("#deliveryAjaxLoading").show();
                            },
                            success: function (response) {
                                $("#deliveryAjaxLoading").hide();
                                if (response.success)
                                {
                                    getBaseAjaxPage('<?php echo site_url('gkpos/orders/indexajax/') ?>' + response.order_id, 'Delivery-' + response.name);
                                    // getPage('<?php echo site_url('gkpos/indexajaxccontent') ?>', 'mainboard');
                                } else {
                                    set_feedback(response.message, 'alert alert-dismissible alert-danger', false);
                                }
                            },
                            dataType: 'json'
                        });
                    },
                    errorClass: "has-error",
                    errorLabelContainer: "#" + error_message_box,
                    wrapper: "li",
                    highlight: function (e) {
                        $(e).closest('.form-group').addClass('has-error');
                    },
                    unhighlight: function (e) {
                        $(e).closest('.form-group').removeClass('has-error');
                    },
                    rules:
                            {
                                name: {
                                    lettersonly: true,
                                    required: true
                                },
                                phone: {
                                    phone: true,
                                    required: true
                                },
                                street: "required",
                                postcode: {
                                    required: true,
                                    postcodeUK: true,
                                },
                                delivery_time: "required"
                            },
                    messages:
                            {
                                name: "<?php echo $this->lang->line('gkpos_valid_name_required') ?>",
                                phone: "<?php echo $this->lang->line('gkpos_valid_phone_required') ?>",
                                street: "<?php echo $this->lang->line('gkpos_customer_street_required') ?>",
                                postcode: "<?php echo $this->lang->line('gkpos_customer_postcode_required') ?>",
                                delivery_time: "<?php echo $this->lang->line('gkpos_order_delivery_time_required') ?>"
                            }
                });
            }

</script>