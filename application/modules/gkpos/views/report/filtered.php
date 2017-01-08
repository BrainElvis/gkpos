<fieldset style="margin-top:0px; margin-bottom: 0px; padding-bottom: 0px; border-radius: 0px 0px 10px 10px">
    <div class="row report-row">
        <table class="table table-responsivev table-bordered">
            <tr>
                <th style="width: 9%" class="text-left"><input type="checkbox" class="checkbox-inline" id="allCheck">SL#</th>
                <th style="width: 25%">Time</th>
                <th style="width: 10%">Type</th>
                <th style="width: 10%">Customer</th>
                <th style="width: 10%">Total</th>
                <th style="width: 15%">Tendered</th>
                <td style="width: 7%">Tips</td>
                <th style="width: 14%">Update</th>
            </tr>
            <?php if (!empty($orderList)): ?>
                <?php
                $total = 0;
                $tips = 0;
                ?>
                <?php $index = 1; ?>
                <?php foreach ($orderList as $key => $order): ?>
                    <tr>
                        <td><input type="checkbox" class="checkbox-inline" id="<?php echo $order->id ?>">00<?php echo $index ?></td>
                        <td><?php echo $order->created ?></td>
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
                            }
                            $payString.= $order->change_due < 0 ? ($order->pay_tip == 'yes' ? '' : 'Paid Back-' . to_currency(abs($order->change_due))) : 'Due-' . to_currency(abs($order->change_due));
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
            <p class="text-center text-uppercase">Table(100)</p>
            <table class="table table-bordered summary-table">
                <tr>
                    <td class="text-uppercase"> Guest Total</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td class="text-uppercase"> Ordered Total</td>
                    <td><?php echo to_currency(150) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Discount</td>
                    <td><?php echo to_currency(10) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Vat</td>
                    <td><?php echo to_currency(10) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Service Charge</td>
                    <td><?php echo to_currency(10) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Paid</td>
                    <td><?php echo to_currency(150) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">CASH</td>
                    <td><?php echo to_currency(20) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">EFT</td>
                    <td><?php echo to_currency(50) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">CHEQUE</td>
                    <td><?php echo to_currency(50) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">VOUCHER</td>
                    <td><?php echo to_currency(30) ?></td>
                </tr>
            </table>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <p class="text-center text-uppercase">Takeaway(50)</p>
            <table class="table table-bordered summary-table">
                <tr>
                    <td class="text-uppercase">Ordered Total</td>
                    <td><?php echo to_currency(150) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Collection</td>
                    <td><?php echo to_currency(50) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Delivery</td>
                    <td><?php echo to_currency(50) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Waiting</td>
                    <td><?php echo to_currency(50) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Discount</td>
                    <td><?php echo to_currency(10) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Vat</td>
                    <td><?php echo to_currency(10) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">CASH</td>
                    <td><?php echo to_currency(20) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">EFT</td>
                    <td><?php echo to_currency(50) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">CHEQUE</td>
                    <td><?php echo to_currency(50) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">VOUCHER</td>
                    <td><?php echo to_currency(30) ?></td>
                </tr>
            </table>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <p class="text-center text-uppercase">Online(30)</p>
            <table class="table table-bordered summary-table">
                <tr>
                    <td class="text-uppercase">Ordered Total</td>
                    <td><?php echo to_currency(300) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Pick up</td>
                    <td><?php echo to_currency(150) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">Delivery</td>
                    <td><?php echo to_currency(150) ?></td>
                </tr>

                <tr>
                    <td class="text-uppercase">Discount</td>
                    <td><?php echo to_currency(20) ?></td>
                </tr>

                <tr>
                    <td class="text-uppercase">Vat</td>
                    <td><?php echo to_currency(20) ?></td>
                </tr>

                <tr>
                    <td class="text-uppercase">Delivery FEE</td>
                    <td><?php echo to_currency(10) ?></td>
                </tr>

                <tr>
                    <td class="text-uppercase">Paid</td>
                    <td><?php echo to_currency(300) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">COD</td>
                    <td><?php echo to_currency(150) ?></td>
                </tr>
                <tr>
                    <td class="text-uppercase">ONLINE</td>
                    <td><?php echo to_currency(150) ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row report-sum">
        <div class="report-brief-table">
            <table class="table">
                <tr>
                    <td>Subtotal</td>
                    <td><?php echo to_currency(600) ?></td>
                </tr>
                <tr>
                    <td>Discount</td>
                    <td><?php echo to_currency(30) ?></td>
                </tr>
                <tr>
                    <td>VAT</td>
                    <td><?php echo to_currency(30) ?></td>
                </tr>
                <tr>
                    <td>Service Charge</td>
                    <td><?php echo to_currency(10) ?></td>
                </tr>
                <tr>
                    <td>Delivery Fee</td>
                    <td><?php echo to_currency(10) ?></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><?php echo to_currency(620) ?></td>
                </tr>
                <tr>
                    <td>Payment Methods</td>
                    <td><?php echo to_currency(620) ?></td>
                </tr>

                <tr>
                    <td>Expense</td>
                    <td><?php echo to_currency(620) ?></td>
                </tr>
                <tr>
                    <td>Savings</td>
                    <td><?php echo to_currency(620) ?></td>
                </tr>
            </table>
        </div>     
    </div>
</div>
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
            function filterReport() {
                $('#reportFilterForm').validate({
                    submitHandler: function (form) {
                        $(form).ajaxSubmit({
                            success: function (response) {
                                $("#filterContent").html(response);
                            }
                        });
                    },
                });
            }
</script>