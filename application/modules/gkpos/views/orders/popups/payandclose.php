<a class='payAndClose' href="#payAndClose" style="display:none"></a>
<div style="display:none">
    <style>
        .discount-lebel {
            font-size: 12px;
            font-weight: bold;
        }
    </style>
    <div id="payAndClose" class="popupouter">
        <div class="popup-header row">
            <div id="discountPopupHeader" class="warningPopupHeader col-lg-10 col-md-10 col-sm-10 col-xs-10 pull-left text-uppercase"><?php echo $this->lang->line('gkpos_pay_and_close') ?></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-left closeServiceChargePopup text-center times pay-close-times">&times;</div>
        </div>
        <div class="popup-body row">
            <div id="discountPopupContent" class="warningPopupContent col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="MiddleContent">
                    <div class="row payment-row">
                        <div class="payment-option">
                            <?php if (!empty($payments_option)): ?>
                                <?php foreach ($payments_option as $key => $option): ?>
                                    <?php
                                    $payment_option_bg = '';
                                    if ($key == 'Cash') {
                                        $payment_option_bg = ' delivery-bg-color ';
                                    }
                                    if ($key == 'Cheque') {
                                        $payment_option_bg = ' waiting-bg-color ';
                                    }
                                    if ($key == 'EFT') {
                                        $payment_option_bg = ' collection-bg-color ';
                                    }
                                    if ($key == 'Voucher') {
                                        $payment_option_bg = ' table-bg-color ';
                                    }
                                    ?>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 payment-button <?php echo $payment_option_bg ?> text-center text-uppercase" id="<?php echo $key ?>" onclick="setPaymentOption(this.id)"><?php echo $option ?></div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row payment-row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 payment-due-block">
                            <div class="due-figure">
                                <?php
                                $dueAmount = $this->Orders_Model->get_amount_due($this->Orders_Model->get_current_orderid());
                                $payments = $this->Orders_Model->get_payments($this->Orders_Model->get_current_orderid())
                                ?>
                                <span id="dueLabel"><?php isset($dueAmount) && $dueAmount >= 0 ? print"DUE" : print "PAY BACK" ?></span>
                                <input type="hidden" id="exactDueAmountTotal" value="<?php isset($dueAmount) ? print $dueAmount : '' ?>">
                                <span><?php echo $this->config->item('currency_symbol') ?></span><span id="dueAmount"><?php echo to_currency_no_money(abs($dueAmount)) ?></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="pin-calculatorbg payment-pin-calculatorbg">
                                <div style="height: 20px" class="text-center text-uppercase" id="paymentIdentity"></div>
                                <input type="text" id="paymentAmount" name="payment_amount" class="form-control">
                                <ul>
                                    <li class="numkey paymentNumKey"><?php echo $this->lang->line('gkpos_numpad_key1') ?></li>
                                    <li class="numkey paymentNumKey"><?php echo $this->lang->line('gkpos_numpad_key2') ?></li>
                                    <li class="numkey paymentNumKey"><?php echo $this->lang->line('gkpos_numpad_key3') ?></li>
                                    <li class="numkey paymentNumKey"><?php echo $this->lang->line('gkpos_numpad_key4') ?></li>
                                </ul>
                                <ul>

                                    <li class="numkey paymentNumKey"><?php echo $this->lang->line('gkpos_numpad_key5') ?></li>
                                    <li class="numkey paymentNumKey"><?php echo $this->lang->line('gkpos_numpad_key6') ?></li>
                                    <li class="numkey paymentNumKey"><?php echo $this->lang->line('gkpos_numpad_key7') ?></li>
                                    <li class="numkey paymentNumKey"><?php echo $this->lang->line('gkpos_numpad_key8') ?></li>
                                </ul>
                                <ul>
                                    <li class="numkey paymentNumKey"><?php echo $this->lang->line('gkpos_numpad_key9') ?></li>
                                    <li class="numkey paymentNumKey"><?php echo $this->lang->line('gkpos_numpad_key0') ?></li>
                                    <li class="numkey paymentNumKey"><?php echo '.' ?></li>
                                    <li class="btnPin paymentBtnPin"><?php echo $this->lang->line('gkpos_numpad_key_del') ?></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <input type="hidden" name="payment_option" id="paymentOption">
                                    <span class="form-submit-button mainsystembg2 waiting-bg img-responsive add-payment-btn" onclick="addPayment()"><?php echo $this->lang->line('gkpos_add_payment') ?></span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <span class="btnPin paymentBtnPin payment-clear-btn"><?php echo $this->lang->line('gkpos_numpad_key_clr') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 payment-due-block">   
                            <div class="payment-option">
                                <br/>
                                <?php if (!empty($payments_option)): ?>
                                    <?php foreach ($payments_option as $key => $option): ?>
                                        <?php
                                        $payment_option_bg = '';
                                        if ($key == 'Cash') {
                                            $payment_option_bg = ' delivery-bg-color ';
                                        }
                                        if ($key == 'Cheque') {
                                            $payment_option_bg = ' waiting-bg-color ';
                                        }
                                        if ($key == 'EFT') {
                                            $payment_option_bg = ' collection-bg-color ';
                                        }
                                        if ($key == 'Voucher') {
                                            $payment_option_bg = ' table-bg-color ';
                                        }
                                        ?>
                                        <div class="payment-info-button text-center text-uppercase <?php echo $payment_option_bg ?>"><?php echo $option ?><span class="delete-payment pull-right" onclick="deletePayment('<?php echo $key ?>')"><img src="<?php echo ASSETS_GKPOS_PATH . 'images/closebg.png' ?>" width="48px" height="48px"></span><br/><span><?php echo $this->config->item('currency_symbol') ?></span><span id="<?php echo $key . 'Amount' ?>"><?php isset($payments[$key]) ? print to_currency_no_money($payments[$key]['amount']) : print '0.00' ?></span></div>
                                        <br/>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row payment-row"><input class="form-submit-button mainsystembg2 waiting-bg img-responsive payment-info-submit-btn" type="submit" value="<?php echo $this->lang->line('gkpos_numpad_key_enter') ?>" onclick="savePayments('<?php echo $this->Orders_Model->get_current_orderid() ?>')"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#paymentAmount").attr("disabled", 'disabled');
        setPaymentNumKeys('paymentAmount');
    });
    function savePayments(order_id) {
        var dueAmount = $('#exactDueAmountTotal').val();
        if (dueAmount > 0) {
            $.confirm({
                'title': 'Payment Warning',
                'message': 'Sorry! payment not yet covered ',
                'buttons': {
                    'Ok': {
                        'class': 'btn btn-danger',
                        'action': function () {}
                    }
                }
            });
        } else {
            $.ajax({
                url: "<?php echo site_url("gkpos/orders/payandclose") ?>",
                data: {
                    order_id: order_id
                },
                type: "POST",
                dataType: "json",
                success: function (output) {
                    if (output.success)
                    {
                        jQuery.colorbox.close();
                        getBaseAjaxPage('<?php echo site_url('gkpos/indexajax') ?>', 'Mainboard');
                    } else
                    {
                        set_feedback(output.message, 'alert alert-dismissible alert-danger', false);
                    }
                },
                error: function (xhr, status, errorThrown) {
                    console.log("Sorry, there was a problem!");
                },
                complete: function (xhr, status) {
                    console.log("The request is complete!");
                }
            });
        }

    }
    function  setPaymentOption(option) {
        $("#paymentAmount").removeAttr("disabled", false);
        $('#paymentOption').val(option);
        $('#paymentIdentity').text(option);
        $('#' + option).addClass('highlited');
        if ($("#paymentAmount").val() > 0) {
            $("#paymentAmount").val('');
        }
    }

    function setPaymentNumKeys(inputFiledId) {
        jQuery('.paymentNumKey').click(function (event) {
            if ($('#paymentOption').val() == '') {
                $("#" + inputFiledId).attr("disabled", 'disabled');
                $('#paymentIdentity').text('UNDEFINED PAYMENT METHOD');
            } else {
                $("#" + inputFiledId).removeAttr("disabled", false);
                var numBox = document.getElementById(inputFiledId);
                numBox.value = numBox.value + this.innerHTML;
                event.stopPropagation();
            }
        });
        $('.paymentBtnPin').click(function (event) {
            if ($('#paymentOption').val() == '') {
                $("#" + inputFiledId).attr("disabled", 'disabled');
            } else {
                $("#" + inputFiledId).removeAttr("disabled", false);
                if (this.innerHTML == 'DEL') {
                    var numBox = document.getElementById(inputFiledId);
                    if (numBox.value.length > 0) {
                        numBox.value = numBox.value.substring(0, numBox.value.length - 1);
                    }
                } else {
                    document.getElementById(inputFiledId).value = '';
                }
                event.stopPropagation();
            }
        });
    }

    function addPayment() {
        var paymentOption = $('#paymentOption').val();
        var paymentAmount = $('#paymentAmount').val();
        $.ajax({
            url: "<?php echo site_url("gkpos/orders/addpayment") ?>",
            data: {
                order_id: '<?php echo $this->Orders_Model->get_current_orderid() ?>',
                method: paymentOption,
                amount: paymentAmount,
            },
            type: "POST",
            dataType: "json",
            success: function (output) {
                if (output.payments) {
                    $.each(output.payments, function () {
                        $('#' + this.method + 'Amount').text(this.amount);
                    });
                }
                if (output.dueAmount) {
                    $('#paymentOption').val('');
                    $("#paymentAmount").val('');
                    $("#paymentAmount").attr("disabled", 'disabled');
                    var dueAmount = Number(output.dueAmount);
                    if (dueAmount < 0) {
                        $('#dueLabel').text('PAY BACK').css({'font-size': '27px', 'line-height': '5px'});
                    } else {
                        $('#dueLabel').text('DUE').css({'font-size': '27px', 'line-height': '5px'});
                    }
                    $('#exactDueAmountTotal').val(dueAmount);
                    $('#dueAmount').text(Math.abs(dueAmount));
                }
            },
            error: function (xhr, status, errorThrown) {
                console.log("Sorry, there was a problem!");
            },
            complete: function (xhr, status) {
                console.log("The request is complete!");
            }
        });
    }

    function deletePayment(method) {
        var currentAmount = $('#' + method + 'Amount').text();
        if (Number(currentAmount) <= 0) {
            return false;
        } else {
            $.ajax({
                url: "<?php echo site_url("gkpos/orders/deletepayment") ?>",
                data: {
                    order_id: '<?php echo $this->Orders_Model->get_current_orderid() ?>',
                    method: method
                },
                type: "POST",
                dataType: "json",
                success: function (output) {
                    if (true == output.success) {
                        $('#paymentOption').val('');
                        $("#paymentAmount").val('');
                        $("#paymentAmount").attr("disabled", 'disabled');
                        $('#' + method + 'Amount').text('0.00');
                        if (output.dueAmount) {
                            var dueAmount = Number(output.dueAmount);
                            if (dueAmount < 0) {
                                $('#dueLabel').text('PAY BACK').css({'font-size': '27px', 'line-height': '5px'});
                            } else {
                                $('#dueLabel').text('DUE').css({'font-size': '27px', 'line-height': '5px'});
                            }
                            $('#exactDueAmountTotal').val(dueAmount);
                            $('#dueAmount').text(Math.abs(dueAmount));
                        }
                    }
                },
                error: function (xhr, status, errorThrown) {
                    console.log("Sorry, there was a problem!");
                },
                complete: function (xhr, status) {
                    console.log("The request is complete!");
                }
            });
        }
    }



    function payAndClose(order_id, isCartEmty, $isDbcEmpty, hasNew) {
        if (hasNew == 'yes') {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_payment_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_cart_not_save_before_pay') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
        } else if (!isCartEmty) {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_payment_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_cart_not_save_before_pay') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
        } else if (!$isDbcEmpty && hasNew == 'yes') {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_payment_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_cart_not_save_before_pay') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
        } else if ($isDbcEmpty && isCartEmty && hasNew == 'no') {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_payment_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_payment_for_nothing') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
        } else {
            $.ajax({
                url: "<?php echo site_url("gkpos/orders/get_due_amount") ?>",
                data: {
                    order_id: '<?php echo $this->Orders_Model->get_current_orderid() ?>',
                },
                type: "POST",
                dataType: "json",
                success: function (output) {
                    if (true == output.success) {
                        if (output.dueAmount) {
                            var dueAmount = Number(output.dueAmount);
                            if (dueAmount < 0) {
                                $('#dueLabel').text('PAY BACK').css({'font-size': '27px', 'line-height': '5px'});
                            } else {
                                $('#dueLabel').text('DUE').css({'font-size': '27px', 'line-height': '5px'});
                            }
                            $('#exactDueAmountTotal').val(dueAmount);
                            $('#dueAmount').text(Math.abs(dueAmount));
                        }
                        jQuery(".payAndClose").colorbox({inline: true, slideshow: false, scrolling: false, height: "auto", open: true, width: '60%', left: "20%", right: "20%"});
                        return false;
                    }
                }
            });
        }
    }
</script>