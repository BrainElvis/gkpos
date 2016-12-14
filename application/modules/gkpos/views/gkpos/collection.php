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
        <form class="form-horizontal" action="<?php echo site_url('gkpos/collection') ?>" method="post"  id="gkposCollectionForm">
            <legend><?php echo $this->lang->line('gkpos_customer') . " " . $this->lang->line('gkpos_information') ?></legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" ><?php echo $this->lang->line('gkpos_phone') ?></label> 
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group">
                        <input name="phone" id="phone" placeholder="<?php echo $this->lang->line('gkpos_phone') ?>" class="form-control" id="phone"  type="text" value="<?php (isset($callerPhone) && ($callerPhone != '' || $callerPhone != null)) ? print $callerPhone : print '' ?>">
                        <span class="input-group-addon" style="background-color: #FF0000;" data-toggle="tooltip-collection-phone" data-placement="top"  title="<?php echo $this->lang->line('gkpos_click_to_get_customer_by_phone') ?>"><a href="javascript:void(0)" onclick="searchCustomerByKey('phone')"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"><?php echo $this->lang->line('gkpos_name') ?></label>  
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group">
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <input  name="name" id="name" placeholder="<?php echo $this->lang->line('gkpos_name') ?>" class="form-control"  type="text" value="<?php (isset($callerName) && ($callerName != '' || $callerName != null)) ? print $callerName : print '' ?>">
                        <?php else: ?>
                            <input  name="name" id="name" placeholder="<?php echo $this->lang->line('gkpos_name') ?>" class="form-control"  type="text" value="<?php (isset($callerName) && ($callerName != '' || $callerName != null)) ? print $callerName : print '' ?>" onfocus="myJqueryKeyboard('name')">
                        <?php endif; ?>
                        <span class="input-group-addon" style="background-color: #FF0000;" data-toggle="tooltip-collection-name" data-placement="top"  title="<?php echo $this->lang->line('gkpos_click_to_get_customer_by_name') ?>"><a href="javascript:void(0)" onclick="searchCustomerByKey('name')"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-md-12">
                    <ul id="gkposCollectionFormErrorMsgBox" class="error_message_box"></ul>
                </div>
            </div>
            <div class="form-group"> 
                <div class=" col-md-offset-3 col-md-6">
                    <input type="hidden" name="order_type" value="<?php (isset($info) && ($info != '' || $info != null) && $info = 'collection' ) ? print strtolower($info) : print"collection" ?>">
                    <input class="form-submit-button mainsystembg2 waiting-bg img-responsive delivery-info-submit-btn" type="submit" name="submit_form" value="<?php echo $this->lang->line('gkpos_numpad_key_enter') ?>" onclick="saveCollectionInfo('gkposCollectionForm', 'gkposCollectionFormErrorMsgBox', 'idToCheck<?php echo '1' ?>')">
                </div>
            </div>
        </form>
    </fieldset>
</div>
<?php if (!isset($isPhoneCall) || $isPhoneCall != 'yes'): ?>
    <div class="phone-pad-heading text-center text-uppercase"><?php echo $this->lang->line('gkpos_type_phone_number') ?></div>
<?php endif; ?>
<div class="numpad collection-numpad">
    <?php if (!isset($isPhoneCall) || $isPhoneCall != 'yes'): ?>
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
    <?php endif; ?>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        manageWindowHeight();
        setnumkeys('phone');
        $('[data-toggle="tooltip-collection-phone"]').tooltip();
        $('[data-toggle="tooltip-collection-name"]').tooltip();
        addjqueryValidatorFunction();
        $("#collection_name").autocomplete({
            delay: 0,
            source: '<?php echo site_url('gkpos/get_customer') ?>',
            minLength: 2
        });
    });
    function searchCustomerByKey(key) {
        var value = $('#' + key).val();
        if (value == '') {
            jQuery("#warningPopupHeader").text("<?php echo $this->lang->line('gkpos_caller_information_error') ?>");
            jQuery("#warningPopupContent").text("<?php echo $this->lang->line('gkpos_caller_field_alert') . ' ' ?>" + key);
            jQuery(".warningPopup").colorbox({
                inline: true,
                slideshow: false,
                scrolling: false,
                height: "250px",
                open: true,
                width: '100%',
                maxWidth: '400px'
            });
            return false;
        } else {
            $.ajax({
                url: "<?php echo site_url('gkpos/search_customer') ?>",
                type: "POST",
                data: {
                    key: key,
                    value: value
                },
                success: function (output) {
                    var obj = $.parseJSON(output);
                    if (true == obj.status) {
                        var customer = obj.customer;
                        $("#phone").val(customer.phone);
                        $("#name").val(customer.name);
                    } else {
                        jQuery("#warningPopupHeader").text("<?php echo $this->lang->line('gkpos_invalid_customer') ?>");
                        jQuery("#warningPopupContent").text("<?php echo $this->lang->line('gkpos_customer_not_found') . ' ' ?>"+ key +"=>"+value);
                        jQuery(".warningPopup").colorbox({
                            inline: true,
                            slideshow: false,
                            scrolling: false,
                            height: "250px",
                            open: true,
                            width: '100%',
                            maxWidth: '400px'
                        });
                        return false;
                    }

                },
                complete: function (xhr, status) {
                    console.log("The request is complete!");
                }
            });
        }
    }
    function saveCollectionInfo(formId, error_message_box, idToCheck) {
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
                        }
                    },
            messages:
                    {
                        name: "<?php echo $this->lang->line('gkpos_valid_name_required')?>",
                        phone: "<?php echo $this->lang->line('gkpos_valid_phone_required')?>"
                    }
        });
    }

</script>