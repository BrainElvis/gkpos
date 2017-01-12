<fieldset style="margin-top:0px; margin-bottom: 0px; padding-bottom: 0px; border-radius: 0px 0px 10px 10px">
    <div class="row report-row">
        <?php if (!empty($orderList)): ?>
            <div class="table-bg-color">
                <?php if (isset($maxCounter) && $maxCounter > 1): ?>
                    <div class="main-arrowbg text-center pull-left">
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
                <div class="pull-right"><span class="text-uppercase text-center btn btn-danger btn-large close-day" onclick="closeTheDay()">Close The Day</span></div>
            </div>
        <?php endif; ?>
        <table class="table table-responsive table-bordered">
            <tr class="first-row table-bg-color">
                <td colspan="3" style="border: none;">&nbsp;</td>
                <td colspan="4" class="text-center text-capitalize" style="border: none;">Tendered</td>
                <td colspan="3" style="border: none;">&nbsp;</td>
            </tr>
            <tr class="table-bg-color">
                <th class="text-center text-capitalize">Date</th>
                <th class="text-center text-capitalize">Type</th>
                <th class="text-center text-capitalize">Total</th>
                <th class="text-center text-capitalize">Cash</th>
                <th class="text-center text-capitalize">EFT</th>
                <th class="text-center text-capitalize">Cheque</th>
                <th class="text-center text-capitalize">Voucher</th>
                <th class="text-center text-capitalize">Cash Tips</th>
                <th class="text-center text-capitalize">Tips on Card</th>
                <th class="text-center text-capitalize">Update</th>
            </tr>
            <?php
            $total_grand = 0;
            $total_cash = 0;
            $total_eft = 0;
            $total_cheque = 0;
            $total_voucher = 0;
            $total_cash_tips = 0;
            $total_eft_tips = 0;

            $cash_table = 0;
            $cash_collection = 0;
            $cash_delivery = 0;
            $cash_waiting = 0;
            $cash_bar = 0;

            $eft_table = 0;
            $eft_collection = 0;
            $eft_delivery = 0;
            $eft_waiting = 0;
            $eft_bar = 0;

            $cheque_table = 0;
            $cheque_collection = 0;
            $cheque_delivery = 0;
            $cheque_waiting = 0;
            $cheque_bar = 0;

            $voucher_table = 0;
            $voucher_collection = 0;
            $voucher_delivery = 0;
            $voucher_waiting = 0;
            $voucher_bar = 0;

            $tips_table = 0;
            $tips_delivery = 0;
            $tips_collection = 0;
            $tips_waiting = 0;
            $tips_bar = 0;

            $count_table = 0;
            $count_collection = 0;
            $count_delvery = 0;
            $count_waiting = 0;
            $count_bar = 0;
            $table_guest_served = 0;
            ?>
            <?php if (!empty($orderList)): ?>
                <?php foreach ($orderList as $obj): ?>
                    <tr class="table-bg-color-white table-content">
                        <td class="text-center text-capitalize"><?php echo date($this->config->item('dateformat'), strtotime($obj->created)) ?></td>
                        <td class="text-center text-capitalize"><?php echo $obj->order_type ?></td>
                        <td class="text-center text-capitalize"><?php
                            echo to_currency($obj->grand_total);
                            $total_grand+=$obj->grand_total
                            ?></td>
                        <?php
                        $payments = $this->Report_Model->get_order_paymentscool($obj->id);
                        $cash = isset($payments['Cash']) ? ($payments['Cash']['amount']) : 0;
                        $eft = isset($payments['EFT']) ? ($payments['EFT']['amount']) : 0;
                        $cheque = isset($payments['Cheque']) ? ($payments['Cheque']['amount']) : 0;
                        $voucher = isset($payments['Voucher']) ? ($payments['Voucher']['amount']) : 0;
                        $total_cash+=$cash;
                        $total_eft+=$eft;
                        $total_cheque+=$cheque;
                        $total_voucher+=$voucher;
                        if ($obj->order_type == 'table') {
                            $cash_table+=$cash;
                            $eft_table +=$eft;
                            $cheque_table+=$cheque;
                            $voucher_table+=$voucher;
                        }
                        if ($obj->order_type == 'collection') {
                            $cash_collection+=$cash;
                            $eft_collection +=$eft;
                            $cheque_collection+=$cheque;
                            $voucher_collection+=$voucher;
                        }
                        if ($obj->order_type == 'delivery') {
                            $cash_delivery+=$cash;
                            $eft_delivery +=$eft;
                            $cheque_delivery+=$cheque;
                            $voucher_delivery+=$voucher;
                        }
                        if ($obj->order_type == 'waiting') {
                            $cash_waiting+=$cash;
                            $eft_waiting +=$eft;
                            $cheque_waiting+=$cheque;
                            $voucher_waiting+=$voucher;
                        }
                        if ($obj->order_type == 'bar') {
                            $cash_bar+=$cash;
                            $eft_bar +=$eft;
                            $cheque_bar+=$cheque;
                            $voucher_bar+=$voucher;
                        }
                        ?>
                        <td class="text-center text-capitalize"><?php echo to_currency($cash) ?></td>
                        <td class="text-center text-capitalize"><?php echo to_currency($eft) ?></td>
                        <td class="text-center text-capitalize"><?php echo to_currency($cheque) ?></td>
                        <td class="text-center text-capitalize"><?php echo to_currency($voucher) ?></td>

                        <?php
                        $cash_tips = 0;
                        $eft_tips = 0;
                        if ($obj->change_due < 0 && $obj->pay_tip == 'yes') {
                            if (isset($payments['Cash']) && !isset($payments['EFT'])) {
                                $cash_tips = abs($obj->change_due);
                            }
                            if (!isset($payments['Cash']) && isset($payments['EFT'])) {
                                $eft_tips = abs($obj->change_due);
                            }
                            if (isset($payments['Cash']) && isset($payments['EFT'])) {
                                $cash_tips = abs($obj->change_due);
                            }
                            if (!isset($payments['Cash']) && !isset($payments['EFT'])) {
                                $cash_tips = abs($obj->change_due);
                            }
                        }
                        $total_cash_tips+=$cash_tips;
                        $total_eft_tips+=$eft_tips;
                        if ($obj->order_type == 'table') {
                            $tips_table+=$cash_tips + $eft_tips;
                            $count_table+=1;
                            $table_guest_served += $obj->guest_quantity;
                        }
                        if ($obj->order_type == 'collection') {
                            $tips_collection+=$cash_tips + $eft_tips;
                            $count_collection+=1;
                        }
                        if ($obj->order_type == 'delivery') {
                            $tips_delivery+=$cash_tips + $eft_tips;
                            $count_delvery+=1;
                        }
                        if ($obj->order_type == 'waiting') {
                            $tips_waiting+=$cash_tips + $eft_tips;
                            $count_waiting+=1;
                        }
                        if ($obj->order_type == 'bar') {
                            $tips_bar+=$cash_tips + $eft_tips;
                            $count_bar+=1;
                        }
                        ?>
                        <td class="text-center text-capitalize"><?php echo to_currency($cash_tips) ?></td>
                        <td  class="text-center text-capitalize"><?php echo to_currency($eft_tips) ?></td>
                        <td class="text-center text-capitalize" onclick="paginateReport('del', '<?php !empty($orderList) ? print $orderList[0]->id : print 0 ?>', '<?php !empty($orderList) ? print $orderList[count($orderList) - 1]->id : print 0 ?>', '<?php echo $obj->id ?>', '<?php echo $active_page ?>')"><span class="btn btn-danger btn-small delete-btn">Delete</span></td>
                    </tr>
                    <!--Prepare Summary data-->

                    <!--End summary-->
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="10">No Orders Found</td></tr>
            <?php endif; ?>
            <tr class="table-bg-color table-content">
                <td class="text-center text-capitalize">&nbsp;</td>
                <td class="text-center text-capitalize">All Total</td>
                <td class="text-center text-capitalize">Total<br/><?php echo to_currency($total_grand) ?></td>
                <td class="text-center text-capitalize">Cash<br/><?php echo to_currency($total_cash) ?></td>
                <td class="text-center text-capitalize">EFT<br/><?php echo to_currency($total_eft) ?></td>
                <td class="text-center text-capitalize">Cheque<br/><?php echo to_currency($total_cheque) ?></td>
                <td class="text-center text-capitalize">Voucher<br/><?php echo to_currency($total_voucher) ?></td>
                <td class="text-center text-capitalize">Cash Tips<br/><?php echo to_currency($total_cash_tips) ?></td>
                <td class="text-center text-capitalize">Tips on Card<br/><?php echo to_currency($total_eft_tips) ?></td>
                <td class="text-center text-capitalize">&nbsp;</td>
            </tr>
        </table>

        <table class="table table-responsive table-bordered">
            <tr class="first-row table-bg-color">
                <td colspan="8" class="text-center text-capitalize" style="border: none;"><span style="margin-right: 60px;">Summary</span></td>
            </tr>
            <tr class="table-bg-color">
                <th class="text-center text-capitalize">Type</th>
                <th class="text-center text-capitalize">Served</th>
                <th class="text-center text-capitalize">Guest Served</th>
                <th class="text-center text-capitalize">Cash</th>
                <th class="text-center text-capitalize">EFT</th>
                <th class="text-center text-capitalize">Cheque</th>
                <th class="text-center text-capitalize">Voucher</th>
                <th class="text-center text-capitalize">Tips</th>

            </tr>
            <tr class="table-bg-color-white table-content">
                <td class="text-center text-capitalize">Table</td>
                <td class="text-center text-capitalize"><?php echo to_quantity_decimals($count_table) ?></td>
                <td class="text-center text-capitalize"><?php echo to_quantity_decimals($table_guest_served) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($cash_table) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($eft_table) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($cheque_table) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($voucher_table) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($tips_table) ?></td>
            </tr>
            <tr class="table-bg-color-white table-content">
                <td class="text-center text-capitalize">Collection</td>
                <td class="text-center text-capitalize"><?php echo to_quantity_decimals($count_collection) ?></td>
                <td class="text-center text-capitalize">------</td>
                <td class="text-center text-capitalize"><?php echo to_currency($cash_collection) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($eft_collection) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($cheque_collection) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($voucher_collection) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($tips_collection) ?></td>
            </tr>
            <tr class="table-bg-color-white table-content">
                <td class="text-center text-capitalize">Delivery</td>
                <td class="text-center text-capitalize"><?php echo to_quantity_decimals($count_delvery) ?></td>
                <td class="text-center text-capitalize">------</td>
                <td class="text-center text-capitalize"><?php echo to_currency($cash_delivery) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($eft_delivery) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($cheque_delivery) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($voucher_delivery) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($tips_delivery) ?></td>
            </tr>
            <tr class="table-bg-color-white table-content">
                <td class="text-center text-capitalize">Waiting</td>
                <td class="text-center text-capitalize"><?php echo to_quantity_decimals($count_waiting) ?></td>
                <td class="text-center text-capitalize">------</td>
                <td class="text-center text-capitalize"><?php echo to_currency($cash_waiting) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($eft_waiting) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($cheque_waiting) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($voucher_waiting) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($tips_waiting) ?></td>
            </tr>
            <tr class="table-bg-color-white table-content">
                <td class="text-center text-capitalize">Bar</td>
                <td class="text-center text-capitalize"><?php echo to_quantity_decimals($count_bar) ?></td>
                <td class="text-center text-capitalize">------</td>
                <td class="text-center text-capitalize"><?php echo to_currency($cash_bar) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($eft_bar) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($cheque_bar) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($voucher_bar) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($tips_bar) ?></td>
            </tr>

            <?php
            $total_tips = $tips_table + $tips_collection + $tips_delivery + $tips_waiting + $tips_bar;
            $final_total_voucher = $voucher_table + $voucher_collection + $voucher_delivery + $voucher_waiting + $voucher_bar;
            $final_total_eft = $eft_table + $eft_collection + $eft_delivery + $eft_waiting + $eft_bar;
            $final_total_cheque = $cheque_table + $cheque_collection + $cheque_delivery + $cheque_waiting + $cheque_bar;
            $final_total_cash = $cash_table + $cash_collection + $cash_delivery + $cash_waiting + $cash_bar
            ?>
            <tr class="table-bg-color table-content">
                <td class="text-center text-capitalize">Total</td>
                <td class="text-center text-capitalize"><?php echo to_quantity_decimals($count_table + $count_collection + $count_delvery + $count_waiting + $count_bar) ?></td>
                <td class="text-center text-capitalize"><?php echo to_quantity_decimals($table_guest_served) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($final_total_cash) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($final_total_eft) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($final_total_cheque) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($final_total_voucher) ?></td>
                <td class="text-center text-capitalize"><?php echo to_currency($total_tips) ?></td>
            </tr>
            <tr class="table-bg-color first-row">
                <td class="text-center text-capitalize" colspan="3">&nbsp;</td>
                <td class="text-center text-capitalize" colspan="2">
                    <table class="table table-bordered table-bg-color-white ">
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize"><strong>Total</strong></td>
                            <td class="text-right"><strong><?php echo to_currency($total_grand) ?></strong></td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">Cash Expense</td>
                            <td class="text-right"><?php echo to_currency(0) ?></td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">Cash Tips</td>
                            <td class="text-right"><?php echo to_currency($total_tips) ?></td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">Voucher</td>
                            <td class="text-right"><?php echo to_currency($final_total_voucher) ?></td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">EFT</td>
                            <td class="text-right"><?php echo to_currency($final_total_eft) ?></td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">Cheque</td>
                            <td class="text-right"><?php echo to_currency($final_total_cheque) ?></td>
                        </tr>
                        <tr>
                            <td class="text-left text-capitalize">Cash In the Till</td>
                            <td class="text-right"><?php echo to_currency($final_total_cash) ?></td>
                        </tr>
                    </table>
                </td>
                <td class="text-center text-capitalize" colspan="3">&nbsp;</td>
            </tr>
        </table>
    </div>
</fieldset>

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
        jQuery(".closeServiceChargePopup").click(function () {
            jQuery.colorbox.close();
            return false;
        });

        $(".date_filter").datepicker({
            dateFormat: "dd/mm/yy"
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
                        }
                    }
                });
            }
        });
    }

    function paginateReport(pageBtn, firstOrderId, lastOrderId, order_id = false, active_page = false) {
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
                online_method: $('#filterOnlineMethod').val(),
                order_id: order_id,
                active_page: active_page
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
                }
            }
        });
    }
    function closeTheDay() {
        $.ajax({
            url: "<?php echo site_url('gkpos/report/getmaxclosingday') ?>",
            type: "GET",
            dataType: "json",
            success: function (json) {
                //console.log(json.availableClosingDate);
                if ($('#closing_date').val(json.availableClosingDate)) {
                    jQuery(".DayClose").colorbox({inline: true, slideshow: false, scrolling: false, height: "320px", open: true, width: '100%', maxWidth: '450px', left: "30%"});
                    return false;
                }
            }
        });
    }




</script>