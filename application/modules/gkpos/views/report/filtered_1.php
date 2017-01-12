<?php
$total = 0;
$tips = 0;
$table_count = 0;
$table_guest_count = 0;
$table_order_total = 0;
$table_discount = 0;
$table_vat = 0;
$table_service_charge = 0;
$table_paid = 0;
$table_cash = 0;
$table_eft = 0;
$table_cheque = 0;
$table_voucher = 0;
$table_tips = 0;

$takeaway_count = 0;
$collection_order_total = 0;
$delivery_order_total = 0;
$delivery_fee = 0;
$waiting_order_total = 0;
$takeaway_discount = 0;
$takeaway_vat = 0;
$takeaway_service_charge = 0;
$takeaway_cash = 0;
$takeaway_eft = 0;
$takeaway_cheque = 0;
$takeaway_voucher = 0;
$takeaway_tips = 0;

$bar_order_total = 0;
$bar_count = 0;
$bar_discount = 0;
$bar_vat = 0;
$bar_service_charge = 0;
$bar_tips = 0;

$online_count = 0;
$online_order_total = 0;
$online_discount = 0;
$online_vat = 0;
$online_service_charge = 0;
$online_tips = 0;
?>
<fieldset style="margin-top:0px; margin-bottom: 0px; padding-bottom: 0px; border-radius: 0px 0px 10px 10px">
    <div class="row report-row">
        <table class="table table-responsive table-bordered">
            <tr>
                <td colspan="6">
                    <?php if ( isset($maxCounter) && $maxCounter > 1): ?>
                        <div class="main-arrowbg text-center" style="width: 100%">
                            <ul class="pagination">
                                <?php if ($active_page != 1): ?>
                                    <li><a href="javascript:void(0)" onclick="paginateReport('prevBtn', '<?php !empty($orderList) ? print $orderList[0]->id : print 0 ?>', '<?php !empty($orderList) ? print $orderList[count($orderList) - 1]->id : print 0 ?>')" ><span><img src="<?php echo ASSETS_GKPOS_PATH ?>images/prevbtnbg.png" width="20" height="18" /></span></a></li>
                                <?php endif; ?>
                                <?php for ($i = 1; $i <= $maxCounter; $i++): ?>
                                    <li <?php $active_page == $i ? print'class="active"' : '' ?>><a href="javascript:void(0)" onclick="paginateReport('<?php print $i ?>', '<?php !empty($orderList) ? print $orderList[0]->id : print 0 ?>', '<?php !empty($orderList) ? print $orderList[count($orderList) - 1]->id : print 0 ?>')"><?php echo $i ?></a></li>
                                <?php endfor; ?>
                                <?php if ($active_page != $maxCounter): ?>
                                    <li><a href="javascript:void(0)" onclick="paginateReport('nextBtn', '<?php !empty($orderList) ? print $orderList[0]->id : print 0 ?>', '<?php !empty($orderList) ? print $orderList[count($orderList) - 1]->id : print 0 ?>')"><span><img src="<?php echo ASSETS_GKPOS_PATH ?>images/nextbtnbg.png" width="20" height="18" /></span></a></li>
                                <?php endif ?>
                            </ul>
                        </div>
                    <?php endif ?>
                </td>
                <td colspan="2" class="text-center"><span class="text-uppercase text-center btn btn-danger btn-large close-day" onclick="closeTheDay()">Close The Day</span></td>
            <tr>
                <th style="width: 9%" class="text-left"><input type="checkbox" class="checkbox-inline" id="allCheck">SL#</th>
                <th style="width: 25%">Time</th>
                <th style="width: 10%">Type</th>
                <th style="width: 10%">Customer</th>
                <th style="width: 10%">Total</th>
                <th style="width: 15%">Tendered</th>
                <th style="width: 7%">Tips</th>
                <th style="width: 14%">Update</th>

            </tr>
            <?php if (!empty($orderList)): ?>

                <?php $index = 1; ?>
                <?php foreach ($orderList as $key => $order): ?>
                    <tr <?php $order->closing_date != null ? print'class="alert-warning"' : '' ?>>
                        <td><input type="checkbox" class="checkbox-inline" id="<?php echo $order->id ?>">00<?php echo $index ?></td>
                        <td><?php echo date($this->config->item('dateformat'), strtotime($order->created)) ?></td>
                        <td><?php echo $order->order_type ?></td>
                        <td><?php $order->order_type == 'table' ? print "Table-" . $order->table_number : $order->name != '' ? print $order->name : print $order->phone  ?></td>
                        <td><?php
                            $total+=$order->grand_total;
                            echo to_currency($order->grand_total)
                            ?></td>

                        <?php
                        $payments = $this->Report_Model->get_order_payments($order->id);
                        if (!empty($payments)) {
                            $payString = '';
                            foreach ($payments as $payObject) {
                                $payString.=$payObject->method . '-' . to_currency($payObject->amount) . '&nbsp;';
                                if ($order->order_type == 'table') {
                                    if ($payObject->method == 'Cash') {
                                        $table_cash+=$payObject->amount;
                                    }
                                    if ($payObject->method == 'EFT') {
                                        $table_eft+=$payObject->amount;
                                    }
                                    if ($payObject->method == 'Cheque') {
                                        $table_cheque+=$payObject->amount;
                                    }
                                    if ($payObject->method == 'Voucher') {
                                        $table_voucher+=$payObject->amount;
                                    }
                                } else {
                                    if ($order->order_type != 'online') {
                                        if ($payObject->method == 'Cash') {
                                            $takeaway_cash+=$payObject->amount;
                                        }
                                        if ($payObject->method == 'EFT') {
                                            $takeaway_eft+=$payObject->amount;
                                        }
                                        if ($payObject->method == 'Cheque') {
                                            $takeaway_cheque+=$payObject->amount;
                                        }
                                        if ($payObject->method == 'Voucher') {
                                            $takeaway_voucher+=$payObject->amount;
                                        }
                                    }
                                }
                            }
                            $payString.= $order->change_due < 0 ? ($order->pay_tip == 'yes' ? '' : 'Paid Back-' . to_currency(abs($order->change_due))) : ''; // 'Due-' . to_currency(abs($order->change_due));
                        }
                        ?>
                        <td>
                            <?php echo $payString ?>
                        </td>
                        <td>
                            <?php
                            if ($order->pay_tip == 'yes') {
                                $tips+=abs($order->change_due);
                                print to_currency(abs($order->change_due));
                            } else {
                                print 'N/A';
                            }
                            ?>

                        </td>
                        <td>Edit | Delete</td>
                    </tr>
                    <?php $index++; ?>
                    <?php
                    if ($order->order_type == 'table') {
                        $table_count+=1;
                        $table_order_total+=$order->order_total;
                        $table_guest_count+=$order->guest_quantity;
                        $table_discount+=$order->discount;
                        $table_vat+=$order->vat;
                        $table_service_charge+=$order->service_charge;
                        $table_tips += $order->pay_tip == 'yes' ? abs($order->change_due) : 0;
                    }
                    if ($order->order_type == 'collection') {
                        $collection_order_total+=$order->order_total;
                        $takeaway_count+=1;
                        $takeaway_discount+=$order->discount;
                        $takeaway_vat+=$order->vat;
                        $takeaway_service_charge+=$order->service_charge;
                        $takeaway_tips += $order->pay_tip == 'yes' ? abs($order->change_due) : 0;
                    }
                    if ($order->order_type == 'delivery') {
                        $delivery_order_total+=$order->order_total;
                        $takeaway_count+=1;
                        $takeaway_discount+=$order->discount;
                        $takeaway_vat+=$order->vat;
                        $takeaway_service_charge+=$order->service_charge;
                        $takeaway_tips += $order->pay_tip == 'yes' ? abs($order->change_due) : 0;
                        $delivery_fee+=$order->delivery_charge;
                    }
                    if ($order->order_type == 'waiting') {
                        $waiting_order_total+=$order->order_total;
                        $takeaway_count+=1;
                        $takeaway_discount+=$order->discount;
                        $takeaway_vat+=$order->vat;
                        $takeaway_service_charge+=$order->service_charge;
                        $takeaway_tips += $order->pay_tip == 'yes' ? abs($order->change_due) : 0;
                    }
                    if ($order->order_type == 'bar') {
                        $bar_order_total+= $order->order_total;
                        $bar_count+=1;
                        $bar_discount+=$order->discount;
                        $bar_vat+=$order->vat;
                        $bar_service_charge+=$order->service_charge;
                        $bar_tips += $order->pay_tip == 'yes' ? abs($order->change_due) : 0;
                    }
                    if ($order->order_type == 'online') {
                        $online_order_total+=$order->order_total;
                        $online_count+=1;
                        $online_discount+=$order->discount;
                        $online_vat+=$order->vat;
                        $online_service_charge+=$order->service_charge;
                        $online_tips += $order->pay_tip == 'yes' ? abs($order->change_due) : 0;
                    }
                    ?>

                <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="text-right">Total</td>
                    <td><?php echo to_currency($total) ?></td>
                    <td class="text-right">Tips</td>
                    <td><?php echo to_currency($tips) ?></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="8">No orders placed today</td>
                </tr>
            <?php endif; ?>
        </table>

    </div>
</fieldset>
<div id="viewSummary">
    <div><input type="checkbox" class="checkbox-inline view-summary" style="margin-top:-3px;"><label>Check to view Summary</label></div>
    <div class="row report-summary report-sum">
        <legend class="text-uppercase text-left">Summary</legend>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <p class="text-center text-uppercase">Table(<?php echo $table_count ?>)</p>
            <table class="table table-bordered summary-table">
                <tr>
                    <td class="text-uppercase"> Guest Total</td>
                    <td><?php echo $table_guest_count; ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase"> Ordered Total</td>
                    <td><?php echo to_currency($table_order_total) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Discount</td>
                    <td><?php echo to_currency($table_discount) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Vat</td>
                    <td><?php echo to_currency($table_vat) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Service Charge</td>
                    <td><?php echo to_currency($table_service_charge) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Grand Total</td>
                    <td><?php echo to_currency(($table_order_total + $table_vat + $table_service_charge) - $table_discount) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Paid</td>
                    <td><?php echo to_currency($table_cash + $table_eft + $table_cheque + $table_voucher) ?></td>
                </tr>

                <tr>
                    <td class="text-uppercase">CASH</td>
                    <td><?php echo to_currency($table_cash) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">EFT</td>
                    <td><?php echo to_currency($table_eft) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">CHEQUE</td>
                    <td><?php echo to_currency($table_cheque) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">VOUCHER</td>
                    <td><?php echo to_currency($table_voucher) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Tips</td>
                    <td><?php echo to_currency($table_tips) ?></td>
                </tr>
            </table>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <p class="text-center text-uppercase">Takeaway(<?php echo $takeaway_count ?>)</p>
            <table class="table table-bordered summary-table">
                <tr>
                    <td class="text-uppercase">Ordered Total</td>
                    <td><?php echo to_currency($delivery_order_total + $collection_order_total + $waiting_order_total) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Collection</td>
                    <td><?php echo to_currency($collection_order_total) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Delivery</td>
                    <td><?php echo to_currency($delivery_order_total) ?>(+D.F-<?php echo to_currency($delivery_fee) ?>)</td>
                </tr>
                <tr>
                    <td class="text-uppercase">Waiting</td>
                    <td><?php echo to_currency($waiting_order_total) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Discount</td>
                    <td><?php echo to_currency($takeaway_discount) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Vat</td>
                    <td><?php echo to_currency($takeaway_vat) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Grand Total</td>
                    <td><?php echo to_currency(($delivery_order_total + $collection_order_total + $waiting_order_total + $takeaway_vat + $takeaway_service_charge + $delivery_fee) - $takeaway_discount) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Paid</td>
                    <td><?php echo to_currency($takeaway_cash + $takeaway_eft + $takeaway_cheque + $takeaway_voucher) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">CASH</td>
                    <td><?php echo to_currency($takeaway_cash) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">EFT</td>
                    <td><?php echo to_currency($takeaway_eft) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">CHEQUE</td>
                    <td><?php echo to_currency($takeaway_cheque) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">VOUCHER</td>
                    <td><?php echo to_currency($takeaway_voucher) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Tips</td>
                    <td><?php echo to_currency($takeaway_tips) ?></td>
                </tr>
            </table>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <p class="text-center text-uppercase">Online(<?php echo $online_count ?>)</p>
            <table class="table table-bordered summary-table">
                <tr>
                    <td class="text-uppercase">Ordered Total</td>
                    <td><?php echo to_currency($online_order_total) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Pick up</td>
                    <td><?php echo to_currency(0) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Delivery</td>
                    <td><?php echo to_currency(0) ?></td>
                </tr>

                <tr>
                    <td class="text-uppercase">Discount</td>
                    <td><?php echo to_currency($online_discount) ?></td>
                </tr>

                <tr>
                    <td class="text-uppercase">Vat</td>
                    <td><?php echo to_currency($online_vat) ?></td>
                </tr>

                <tr>
                    <td class="text-uppercase">Delivery FEE</td>
                    <td><?php echo to_currency(0) ?></td>
                </tr>

                <tr>
                    <td class="text-uppercase">Grand Total</td>
                    <td><?php echo to_currency(($online_order_total + $online_vat + $online_service_charge) - $online_discount) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Paid</td>
                    <td><?php echo to_currency(0) ?></td>
                </tr>

                <tr>
                    <td class="text-uppercase">COD</td>
                    <td><?php echo to_currency(0) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">ONLINE</td>
                    <td><?php echo to_currency(0) ?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
    $final_subtotal = $table_order_total + $delivery_order_total + $collection_order_total + $waiting_order_total + $bar_order_total + $online_order_total;
    $final_discount = $table_discount + $takeaway_discount + $bar_discount + $online_discount;
    $final_vat = $table_vat + $takeaway_vat + $bar_vat + $online_vat;
    $final_service_charge = $table_service_charge + $takeaway_service_charge + $bar_service_charge + $online_service_charge;
    $final_delivery_charge = $delivery_fee;
    $final_total = ($final_subtotal + $final_vat + $final_service_charge + $final_delivery_charge) - $final_discount;
    $final_cash = $table_cash + $takeaway_cash;
    $final_eft = $table_eft + $takeaway_eft;
    $final_cheque = $table_cheque + $takeaway_cheque;
    $final_voucher = $table_voucher + $takeaway_voucher;
    $final_tips = $table_tips + $takeaway_tips + $online_tips + $bar_tips;
    ?>
    <div class="row report-sum">
        <div class="report-brief-table">
            <table class="table">
                <tr>
                    <td>Subtotal</td>
                    <td><?php echo to_currency($final_subtotal) ?></td>
                </tr>
                <tr>
                    <td>Discount</td>
                    <td><?php echo to_currency($final_discount) ?></td>
                </tr>
                <tr>
                    <td>VAT</td>
                    <td><?php echo to_currency($final_vat) ?></td>
                </tr>
                <tr>
                    <td>Service Charge</td>
                    <td><?php echo to_currency($final_service_charge) ?></td>
                </tr>
                <tr>
                    <td>Delivery Fee</td>
                    <td><?php echo to_currency($final_delivery_charge) ?></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><?php echo to_currency($final_total) ?></td>
                </tr>
                <tr>
                    <td>Paid Total</td>
                    <?php $paid_total = $final_cash + $final_cheque + $final_eft + $final_voucher ?>
                    <td><?php echo to_currency($paid_total) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">CASH</td>
                    <td><?php echo to_currency($final_cash) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">EFT</td>
                    <td><?php echo to_currency($final_eft) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">CHEQUE</td>
                    <td><?php echo to_currency($final_cheque) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">VOUCHER</td>
                    <td><?php echo to_currency($final_voucher) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Tips</td>
                    <td><?php echo to_currency($final_tips) ?></td>
                </tr>

                <tr>
                    <td>Expense</td>
                    <?php $expense = 0 ?>
                    <td><?php echo to_currency($expense) ?></td>
                </tr>
                <tr>
                    <td>Savings</td>
                    <td><?php echo to_currency($paid_total - $expense) ?></td>
                </tr>
            </table>
        </div>     
    </div>
</div>
<?php echo $this->load->view('gkpos/report/day_close') ?>
<script>
    $(document).ready(function () {
        $('#orderType').change(function () {
            if ($(this).val() == 'online') {
                $("#posPayment").hide();
                $('#onlinePayment').show();
            } else {
                $('#onlinePayment').hide();
                $("#posPayment").show();
            }
        });
        showDivOnCheck('view-summary', 'report-sum');
        jQuery(".closeServiceChargePopup").click(function () {
            jQuery.colorbox.close();
            return false;
        });

        $(".date_filter").datepicker({
            dateFormat: "dd/mm/yy",
        });

    });
    function filterReport() {
        $('#reportFilterForm').validate({
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    success: function (response) {
                        if ($("#filterContent").html(response)) {
                            var filterContentHeight = $("#filterContent").height();
                            var MaxResizeHeight = $(window).height();
                            //console.log(MaxResizeHeight + "-" + filterContentHeight);
                            var CalculatedResizeHeight = 0;
                            if (filterContentHeight > MaxResizeHeight) {
                                CalculatedResizeHeight = MaxResizeHeight + (filterContentHeight - MaxResizeHeight) + 250;
                            } else if (filterContentHeight < MaxResizeHeight) {
                                CalculatedResizeHeight = MaxResizeHeight + 120;
                            } else {
                                CalculatedResizeHeight = MaxResizeHeight + 120;
                            }
                            $(".bodyitem").css({"min-height": CalculatedResizeHeight + "px"});
                            $(".left-item").css({"min-height": CalculatedResizeHeight + "px"});
                            $(".right-item").css({"min-height": CalculatedResizeHeight + "px"});
                            showDivOnCheck('view-summary', 'report-sum', CalculatedResizeHeight);
                        }
                    }
                });
            }
        });
    }

    function paginateReport(pageBtn, firstOrderId, lastOrderId) {
        $.ajax({
            url: "<?php echo site_url('gkpos/report/filter') ?>",
            data: {
                pageBtn: pageBtn,
                firstOrderId: firstOrderId,
                lastOrderId: lastOrderId,
                start_date: $('#filterStartDate').val(),
                end_date: $('#filterEndDate').val(),
                order_type: $('#filterOrderType').val(),
                pos_method: $('#filterPosMethod').val(),
                online_method: $('#filterOnlineMethod').val()
            },
            type: "POST",
            success: function (response) {
                if ($("#filterContent").html(response)) {
                    var filterContentHeight = $("#filterContent").height();
                    var MaxResizeHeight = $(window).height();
                    //console.log(MaxResizeHeight + "-" + filterContentHeight);
                    var CalculatedResizeHeight = 0;
                    if (filterContentHeight > MaxResizeHeight) {
                        CalculatedResizeHeight = MaxResizeHeight + (filterContentHeight - MaxResizeHeight) + 250;
                    } else if (filterContentHeight < MaxResizeHeight) {
                        CalculatedResizeHeight = MaxResizeHeight + 120;
                    } else {
                        CalculatedResizeHeight = MaxResizeHeight + 120;
                    }
                    $(".bodyitem").css({"min-height": CalculatedResizeHeight + "px"});
                    $(".left-item").css({"min-height": CalculatedResizeHeight + "px"});
                    $(".right-item").css({"min-height": CalculatedResizeHeight + "px"});
                    showDivOnCheck('view-summary', 'report-sum', CalculatedResizeHeight);
                }
            }
        });
    }

    function showDivOnCheck(checkBoxClass, divClass, customHeight = false) {
        $("." + divClass).hide();
        $("." + checkBoxClass).click(function () {
            if ($(this).is(":checked")) {
                if ($("." + divClass).show()) {
                    var CalculatedResizeHeight = 0;
                    var divHeight = $("." + divClass).height();
                    if (customHeight && customHeight > 0) {
                        CalculatedResizeHeight = customHeight + divHeight;
                    } else {
                        var filterContentHeight = $("#filterContent").height();
                        var MaxResizeHeight = $(window).height();
                        CalculatedResizeHeight = (MaxResizeHeight - 100) + divHeight - 20 + filterContentHeight;
                    }
                    $(".bodyitem").css({"min-height": CalculatedResizeHeight + "px"});
                    $(".left-item").css({"min-height": CalculatedResizeHeight + "px"});
                    $(".right-item").css({"min-height": CalculatedResizeHeight + "px"});
                }
            } else {
                var CalculatedResizeHeight = 0;
                $("." + divClass).hide();
                if (customHeight && customHeight > 0) {
                    CalculatedResizeHeight = customHeight;
                } else {
                    var MaxResizeHeight = $(window).height();
                    var filterContentHeight = $("#filterContent").height();
                    CalculatedResizeHeight = MaxResizeHeight + filterContentHeight;
                }
                $(".bodyitem").css({"min-height": CalculatedResizeHeight + "px"});
                $(".left-item").css({"min-height": CalculatedResizeHeight + "px"});
                $(".right-item").css({"min-height": CalculatedResizeHeight + "px"});
            }
        });
    }

    function closeTheDay() {
        jQuery(".DayClose").colorbox({inline: true, slideshow: false, scrolling: false, height: "320px", open: true, width: '100%', maxWidth: '450px', left: "30%"});
        return false;
    }

</script>