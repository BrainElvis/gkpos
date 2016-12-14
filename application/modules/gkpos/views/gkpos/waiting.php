<div class="modal-header">
    <div class="phone-call col-md-12"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/phoneicon.png" width="33" height="33" />
        <?php if (isset($isPhoneCall) && $isPhoneCall == 'yes'): ?>
            <span class="phone-yes"><?php echo $this->lang->line('gkpos_call') ?></span>
        <?php else: ?>
            <span class="phone-no"><?php echo $this->lang->line('gkpos_no_call') ?></span>
        <?php endif ?>
        <span><?php echo" ( " . $current_section . " )" ?></span>
    </div>
</div>
<div class="formpartbg">
    <fieldset>
        <form class="form-horizontal" action=" " method="post"  id="gkposWaitingForm">
            <legend><?php echo $this->lang->line('gkpos_customer') . " " . $this->lang->line('gkpos_information') ?></legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" ><?php echo $this->lang->line('gkpos_phone') ?></label> 
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group">
                        <input name="phone" placeholder="<?php echo $this->lang->line('gkpos_phone') ?>" class="form-control" id="phone"  type="text" value="<?php (isset($callerPhone) && ($callerPhone != '' || $callerPhone != null)) ? print $callerPhone : print '' ?>">
                        <span class="input-group-addon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></span>
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
        manageWindowHeight();
        setnumkeys('phone');
        addjqueryValidatorFunction();
    });

    function saveWaitingInfo(formId, error_message_box, idToCheck) {
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
                        phone: {
                            phone: true,
                            required: true
                        }
                    },
            messages:
                    {
                        phone: "<?php echo $this->lang->line('gkpos_valid_phone_required')?>"
                    }
        });
    }
</script>