<div class="modal-header">
    <div class="phone-call col-md-12"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/phoneicon.png" width="33" height="33" />
        <?php if (isset($isPhoneCall) && $isPhoneCall == 'yes'): ?>
            <span class="phone-yes"><?php echo $this->lang->line('gkpos_call') ?></span>
        <?php else: ?>
            <span class="phone-no"><?php echo $this->lang->line('gkpos_no_call') ?></span>
        <?php endif ?>
        <span><?php echo" ( " . $current_section . " )" ?></span>
        <span  class="loading centered" id="waitingAjaxLoading" style="display:none;"><img src="<?php echo ASSETS_GKPOS_PATH . 'images/ajax-loader.gif' ?>" alt="Loading..."/></span>
        <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
    </div>
</div>
<div class="formpartbg">
    <fieldset>
        <form class="form-horizontal" action="<?php echo site_url('gkpos/orderinitiate') ?>" method="post"  id="gkposWaitingForm">
            <legend><?php echo $this->lang->line('gkpos_customer') . " " . $this->lang->line('gkpos_information') ?></legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label required"><?php echo $this->lang->line('gkpos_name') ?></label>  
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-navicon" aria-hidden="true"></i></a></span>
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <input  name="name" id="name" placeholder="<?php echo $this->lang->line('gkpos_name') ?>" class="form-control required"  type="text" value="<?php (isset($callerName) && ($callerName != '' || $callerName != null)) ? print $callerName : print '' ?>">
                        <?php else: ?>
                            <input  name="name" id="name" placeholder="<?php echo $this->lang->line('gkpos_name') ?>" class="form-control required"  type="text" value="<?php (isset($callerName) && ($callerName != '' || $callerName != null)) ? print $callerName : print '' ?>" onfocus="myJqueryKeyboard('name')">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" ><?php echo $this->lang->line('gkpos_phone') ?></label> 
                <div class="col-md-8">
                    <div class="input-group">
                        <input name="phone" placeholder="<?php echo $this->lang->line('gkpos_phone') ?>" class="form-control" id="phone"  type="text" value="<?php (isset($callerPhone) && ($callerPhone != '' || $callerPhone != null)) ? print $callerPhone : print '' ?>">
                        <span class="input-group-addon" style="background-color: #FF0000;" data-toggle="tooltip-waiting-phone" data-placement="top"  title="<?php echo $this->lang->line('gkpos_click_to_get_customer_by_phone') ?>"><a href="javascript:void(0)" onclick="searchCustomerByKey('phone')"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-md-offset-3  col-md-9">
                    <ul id="gkposWaitingFormErrorMsgBox" class="error_message_box"></ul>
                </div>
            </div>
            <div class="form-group"> 
                <div class=" col-md-offset-3 col-md-6">
                    <input type="hidden" name="order_type" value="<?php (isset($info) && ($info != '' || $info != null) && $info = 'waiting' ) ? print strtolower($info) : print"waiting" ?>">
                    <input class="form-submit-button mainsystembg2 waiting-bg img-responsive delivery-info-submit-btn" type="submit" name="submit_form" value="<?php echo $this->lang->line('gkpos_numpad_key_enter') ?>" onclick="saveWaitingInfo('gkposWaitingForm', 'gkposWaitingFormErrorMsgBox', 'idToCheck<?php echo '1' ?>')">
                </div>
            </div>
        </form>
    </fieldset>
</div>
<div class="phone-pad-heading text-center text-uppercase"><?php echo $this->lang->line('gkpos_type_phone_number') ?></div>
<div class="numpad collection-numpad">
    <div class="pin-calculatorbg collection-pin-calculatorbg">
        <ul>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key1') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key2') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key3') ?></li>
        </ul>
        <ul>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key4') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key5') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key6') ?></li>
        </ul>
        <ul>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key7') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key8') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key9') ?></li>
        </ul>
        <ul>
            <li class="btnPin"><?php echo $this->lang->line('gkpos_numpad_key_del') ?></li>
            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key0') ?></li>
            <li class="btnPin"><?php echo $this->lang->line('gkpos_numpad_key_clr') ?></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        addjqueryValidatorFunction();
        $('[data-toggle="tooltip-waiting-phone"]').tooltip();
        setnumkeys('phone');
    });

    function saveWaitingInfo(formId, error_message_box, idToCheck) {
        $('#' + formId).validate({
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    beforeSend: function () {
                        $("#waitingAjaxLoading").show();
                    },
                    success: function (response) {
                        $("#waitingAjaxLoading").hide();
                        if (response.success)
                        {
                              getBaseAjaxPage('<?php echo site_url('gkpos/orders/indexajax/') ?>'+response.order_id,'Waiting-'+response.name);
                            //getPage('<?php echo site_url('gkpos/indexajaxccontent') ?>', 'Waiting');
                        } else
                        {
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
                            required: false,
                            phone: true
                        }
                    },
            messages:
                    {
                        name: "<?php echo $this->lang->line('gkpos_valid_name_required') ?>",
                        phone: "<?php echo $this->lang->line('gkpos_valid_phone_required') ?>"
                    }
        });
    }

</script>