<div class="modal-header">
    <div class="phone-call col-md-12"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/phoneicon.png" width="33" height="33" /> <?php echo $this->lang->line('gkpos_no_call') ?></div>
</div>
<div class="formpartbg">
    <fieldset>
        <form class="form-horizontal" action=" " method="post" id="gkposDeliveryForm">
            <legend><?php echo $this->lang->line('gkpos_customer') . " " . $this->lang->line('gkpos_information') ?></legend>
            <div class="form-group">
                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_name') ?></label>  
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-navicon" aria-hidden="true"></i></a></span>
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <input  type="text" name="name" id="name" placeholder="<?php echo $this->lang->line('gkpos_name') ?>" class="form-control">
                        <?php else: ?>
                            <input  type="text" name="name" id="name" placeholder="<?php echo $this->lang->line('gkpos_name') ?>" class="form-control" onfocus="myJqueryKeyboard('name')">
                        <?php endif; ?>
                        <span class="input-group-addon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" ><?php echo $this->lang->line('gkpos_phone') ?></label> 
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a></span>
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <input name="phone" placeholder="<?php echo $this->lang->line('gkpos_phone') ?>" class="form-control"  type="text" id="phone">
                        <?php else: ?>
                            <input name="phone" placeholder="<?php echo $this->lang->line('gkpos_phone') ?>" class="form-control"  type="text" id="phone" onfocus="myJqueryKeyboard('phone')">
                        <?php endif; ?>
                        <span class="input-group-addon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></span>
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
                            <input name="floor" placeholder="<?php echo $this->lang->line('gkpos_floor_or_apt_no') ?>" class="form-control" id="floor"  type="text">
                        <?php else: ?>
                            <input name="floor" placeholder="<?php echo $this->lang->line('gkpos_floor_or_apt_no') ?>" class="form-control" id="floor"  type="text" onfocus="myJqueryKeyboard('floor')">
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
                            <input name="building" placeholder="<?php echo $this->lang->line('gkpos_building') . ' ', $this->lang->line('gkpos_name') ?>" class="form-control" type="text">
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
                         <input name="house"  id="house" placeholder="<?php echo $this->lang->line('gkpos_house') . ' ', $this->lang->line('gkpos_number') ?>" class="form-control" type="text" id="house" onfocus="myJqueryKeyboard('house')">
                         <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_street') . ' ', $this->lang->line('gkpos_name') ?></label>  
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-road" aria-hidden="true"></i></a></span>
                          <?php if ($this->config->item('is_touch') == 'disable'): ?>
                        <input name="street" placeholder="<?php echo $this->lang->line('gkpos_street') . ' ', $this->lang->line('gkpos_name') ?>" class="form-control" type="text">
                    <?php else: ?>
                        <input name="street" placeholder="<?php echo $this->lang->line('gkpos_street') . ' ', $this->lang->line('gkpos_name') ?>" class="form-control" type="text" id="street" onfocus="myJqueryKeyboard('street')">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_postal_code') ?></label>  
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-street-view" aria-hidden="true"></i></a></span>
                         <?php if ($this->config->item('is_touch') == 'disable'): ?>
                        <input name="postcode" placeholder="<?php echo $this->lang->line('gkpos_postal_code') ?>" class="form-control text-uppercase" type="text">
                       <?php else: ?>
                        <input name="postcode" placeholder="<?php echo $this->lang->line('gkpos_postal_code') ?>" class="form-control text-uppercase" type="text" id="postcode" onfocus="myJqueryKeyboard('postcode')">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"><?php echo $this->lang->line('gkpos_delivery_time') ?></label>  
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i></a></span>
                        <input name="delivery_time" placeholder="<?php echo $this->lang->line('gkpos_delivery_time') ?>" class="form-control date_filter" type="text" id="delivery_time">
                    </div>
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-md-12">
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
        manageWindowHeight();
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
    <?php
} else {
    ?>
            showMeridian: false,
    <?php
}
?>
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
                                floor: "required",
                                building: "required",
                                house: "required",
                                street: "required",
                                postcode: {
                                    required: true,
                                    postcodeUK: true,
                                },
                                delivery_time: "required"
                            },
                    messages:
                            {
                                name: "You must provide customer name with alphabetical characters only",
                                phone: "Please specify a valid phone number",
                                floor: "Customer floor/apt number is a required field",
                                building: "Customer Building Name is a required field",
                                street: "Customer Street is required field",
                                postcode: "Please specify a valid Postcode",
                                delivery_time: "Order delivery Time is a required field"
                            }
                });
            }
</script>