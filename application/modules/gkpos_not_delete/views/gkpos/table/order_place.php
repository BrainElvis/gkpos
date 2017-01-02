<div class="modal-header">
    <div class="phone-call col-md-12">
        <span><?php echo $this->lang->line('gkpos_table_info') ?></span>
        <span  class="loading centered" id="tableAjaxLoading" style="display:none;"><img src="<?php echo ASSETS_GKPOS_PATH . 'images/ajax-loader.gif' ?>" alt="Loading..."/></span>
        <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
    </div>
</div>
<div class="clearfix pages-height"></div>
<div class="body-vertical-align-center">
    <form class="form-horizontal" action="<?php echo site_url('gkpos/orderinitiate') ?>" method="post"  id="gkposTableForm">
        <div class="pin-calculatorbg collection-pin-calculatorbg">
            <div id="TableNumber" class="col-md-6 pull-left">
                <p class="sidebar-heading text-center text-center text-uppercase"><?php echo $this->lang->line('gkpos_table') ?>&nbsp;<?php echo $this->lang->line('gkpos_number') ?></p>
                <input type="text" id="table_number" name="table_number" class="form-control" id="inputEmail3" placeholder="<?php echo $this->lang->line('gkpos_table') ?>&nbsp;<?php echo $this->lang->line('gkpos_number') ?>">
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
            <div class="divider"></div>
            <div id="GuestQuantity" class="col-md-6 pull-right">
                <p class="sidebar-heading text-center text-center text-uppercase"><?php echo $this->lang->line('gkpos_quantity_of_guest') ?></p>
                <input type="text" name="guest_quantity" id="guest_quantity" class="form-control" placeholder="<?php echo $this->lang->line('gkpos_quantity_of_guest') ?>">
                <ul>
                    <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key1') ?></li>
                    <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key2') ?></li>
                    <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key3') ?></li>
                </ul>
                <ul>
                    <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key4') ?></li>
                    <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key5') ?></li>
                    <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key6') ?></li>
                </ul>
                <ul>
                    <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key7') ?></li>
                    <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key8') ?></li>
                    <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key9') ?></li>
                </ul>
                <ul>
                    <li class="btnPin2"><?php echo $this->lang->line('gkpos_numpad_key_del') ?></li>
                    <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key0') ?></li>
                    <li class="btnPin2"><?php echo $this->lang->line('gkpos_numpad_key_clr') ?></li>
                </ul>
            </div>

        </div>
        <div class="col-md-12">
            <ul id="gkposTableFormErrorMsgBox" class="error_message_box"></ul>
        </div>
        <div class="last-calculatorbg collection-last-calculatorbg table-order-numpad-enter">
            <input type="hidden" name="order_type" value="<?php (isset($info) && ($info != '' || $info != null) && $info = 'table' ) ? print strtolower($info) : print"table" ?>">
            <input class="form-submit-button mainsystembg2 waiting-bg img-responsive delivery-info-submit-btn" type="submit" name="submit_form" value="<?php echo $this->lang->line('gkpos_numpad_key_enter') ?>" onclick="saveTableInfo('gkposTableForm', 'gkposTableFormErrorMsgBox', 'idToCheck<?php echo '1' ?>')">
        </div>
    </form>

</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        setnumkeys('table_number');
        setnumkeys2('guest_quantity');
        var width = $(window).width();
        var MaxResizeHeight = $(window).height();
        var CalculatedResizeHeight = MaxResizeHeight - 100;
        if ($('.divider').length > 0) {
            $('.divider').css({
                "position": "absolute",
                "left": ((width / 50) * 1.928) + "%",
                "top": ((CalculatedResizeHeight / 50) * 0.295) + "%",
                "bottom": ((CalculatedResizeHeight / 36) * 1.5) + "%",
                "border-left": "5px solid white"
            });
        }
    });
    function saveTableInfo(formId, error_message_box, idToCheck) {
        $('#' + formId).validate({
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    beforeSend: function () {
                        $("#tableAjaxLoading").show();
                    },
                    success: function (response) {
                        $("#tableAjaxLoading").hide();
                        if (response.success)
                        {
                            getPage('<?php echo site_url('gkpos/indexajaxccontent') ?>', 'mainboard');
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
                        table_number: {
                            number: true,
                            required: true
                        },
                        guest_quantity: {
                            number: true,
                            required: true
                        }
                    },
            messages:
                    {
                        table_number: "<?php echo $this->lang->line('gkpos_table_number_required') ?>",
                        guest_quantity: "<?php echo $this->lang->line('gkpos_table_guest_quantity_required') ?>"
                    }
        });
    }
</script>