<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 right-top cart">
    <div class="sidebar-heading text-center text-uppercase"><?php echo $this->lang->line('gkpos_food') ?></div>
    <div class="tablebackgroundbg">
        <?php
        $total = 0;
        $foodDbcartTotal = 0;
        $foodTotal = 0;
        $nonFoodTotal = 0;
        $nonFoodDbcartTotal = 0;
        $order_id = isset($order_id) ? $order_id : $this->uri->segment(4);
        $preTotal = $currentOrderObj->grand_total;
        ?>
        <table class="table table-responsive item-table-header cart-table">
            <tr>
                <th class="text-uppercase text-center" style="width: 60%;"><?php echo $this->lang->line('gkpos_item') ?></th>
                <th class="text-uppercase" style="width: 15%;"><?php echo $this->lang->line('gkpos_qnt') ?></td>
                <th class="text-uppercase" style="width: 25%;"><?php echo $this->lang->line('gkpos_price') ?></th>
            </tr>
        </table>
        <div class="item-table">
            <table class="table table-bordered table-responsive cart-table" id="foodCart">
                <?php if (!$isFoodCartEmpty): ?>
                    <?php $foodCart = array_reverse($foodCart, true) ?>
                    <?php foreach ($foodCart as $cart): ?>
                        <?php if ($cart ['line'] == $maxLine && isset($cart['plus']) && $cart['plus'] == 'yes'): ?>
                            <tr class="alert-success" id="FoodMaxLine" onclick="selectRow('<?php echo $cart['line'] ?>', '<?php echo $cart['order_id'] ?>')" >
                                <td style="width: 60%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php (isset($cart['selection_title']) && $cart['selection_title'] != null) ? print $cart['menu_title'] . '-' . $cart['selection_title'] : print $cart['menu_title'] ?></td>
                                <td style="width: 15%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo $cart ['quantity'] ?></td>
                                <td style="width: 25%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo to_currency($cart ['quantity'] * $cart ['price']) ?></td>
                            </tr>
                        <?php else: ?>
                            <tr <?php isset($cart['plus']) && $cart['plus'] == 'yes' ? print 'class="alert-success" id="FoodmaxLine"' : print'' ?> onclick="selectRow('<?php echo $cart['line'] ?>', '<?php echo $cart['order_id'] ?>')">
                                <td style="width: 60%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php (isset($cart['selection_title']) && $cart['selection_title'] != null) ? print $cart['menu_title'] . '-' . $cart['selection_title'] : print $cart['menu_title'] ?></td>
                                <td style="width: 15%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo $cart ['quantity'] ?></td>
                                <td style="width: 25%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo to_currency($cart ['quantity'] * $cart ['price']) ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php $foodTotal += $cart ['quantity'] * $cart ['price']; ?>
                    <?php endforeach; ?>  
                    <tr>
                        <th colspan="2" class="text-right">Food Total <?php !empty($dbcart) ? print'(New)' : print'' ?></th>
                        <td><?php echo to_currency($foodTotal) ?></td>
                    </tr>  
                <?php else: ?>
                    <?php if ($isFoodCartEmpty && $isDbcFoodCartEmpty): ?>
                        <tr>
                            <td> Your Food Cart is Empty</td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (!$isDbcFoodCartEmpty): ?>
                    <?php $dbcFoodCart = array_reverse($dbcFoodCart, true) ?>
                    <?php foreach ($dbcFoodCart as $dbc): ?>
                        <tr class="alert-warning">
                            <td style="width: 60%;" class="text-capitalize"><?php (isset($dbc['selection_title']) && $dbc['selection_title'] != null) ? print $dbc['menu_title'] . '-' . $dbc['selection_title'] : print $dbc['menu_title'] ?></td>
                            <td style="width: 15%;" class="text-capitalize"><?php echo $dbc ['quantity'] ?></td>
                            <td style="width: 25%;" class="text-capitalize"><?php echo to_currency($dbc ['quantity'] * $dbc ['price']) ?></td>
                        </tr>
                    <?php endforeach; ?>     
                <?php endif; ?>

            </table>
        </div>
    </div>
    <div class="sidebar-heading text-center text-uppercase"><?php echo $this->lang->line('gkpos_non_food') ?></div>
    <div class="tablebackgroundbg">
        <table class="table table-responsive cart-table">
            <tr>
                <th class="text-uppercase text-center" style="width: 60%;"><?php echo $this->lang->line('gkpos_item') ?></th>
                <th class="text-uppercase" style="width: 15%;"><?php echo $this->lang->line('gkpos_qnt') ?></td>
                <th class="text-uppercase" style="width: 25%;"><?php echo $this->lang->line('gkpos_price') ?></th>
            </tr>
        </table>
        <div class="item-table">
            <table class="table table-bordered table-responsive cart-table" id="nonFoodCart">
                <?php if (!$isNonFoodCartEmpty): ?>
                    <?php $nonFoodCart = array_reverse($nonFoodCart, true) ?>
                    <?php foreach ($nonFoodCart as $cart): ?>
                        <?php if ($cart ['line'] == $maxLine && isset($cart['plus']) && $cart['plus'] == 'yes'): ?>
                            <tr class="alert-success" <?php (isset($cart['plus']) && $cart['plus'] == 'yes') ? print'id="nonFoodMaxLine"' : print'' ?> onclick="selectRow('<?php echo $cart['line'] ?>', '<?php echo $cart['order_id'] ?>')" >
                                <td style="width: 60%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php (isset($cart['selection_title']) && $cart['selection_title'] != null) ? print $cart['menu_title'] . '-' . $cart['selection_title'] : print $cart['menu_title'] ?></td>
                                <td style="width: 15%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo $cart ['quantity'] ?></td>
                                <td style="width: 25%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo to_currency($cart ['quantity'] * $cart ['price']) ?></td>
                            </tr>
                        <?php else: ?>
                            <tr <?php isset($cart['plus']) && $cart['plus'] == 'yes' ? print 'class="alert-success" id="nonFoodMaxLine"' : print'' ?> onclick="selectRow('<?php echo $cart['line'] ?>', '<?php echo $cart['order_id'] ?>')">
                                <td style="width: 60%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php (isset($cart['selection_title']) && $cart['selection_title'] != null) ? print $cart['menu_title'] . '-' . $cart['selection_title'] : print $cart['menu_title'] ?></td>
                                <td style="width: 15%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo $cart ['quantity'] ?></td>
                                <td style="width: 25%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo to_currency($cart ['quantity'] * $cart ['price']) ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php $nonFoodTotal+=$cart ['quantity'] * $cart ['price'] ?>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="2" class="text-right">Non Food Total <?php !empty($dbcart) ? print'(New)' : print'' ?></th>
                        <td><?php echo to_currency($nonFoodTotal) ?></td>
                    </tr>
                <?php else: ?>
                    <?php if ($isNonFoodCartEmpty && $isDbcNonFoodCartEmpty): ?>
                        <tr>
                            <td> Your Beverage Cart is Empty</td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (!$isDbcNonFoodCartEmpty): ?>
                    <?php $dbcNonFoodCart = array_reverse($dbcNonFoodCart, true) ?>
                    <?php foreach ($dbcNonFoodCart as $dbc): ?>
                        <tr class="alert-warning">
                            <td style="width: 60%;" class="text-capitalize"><?php (isset($dbc['selection_title']) && $dbc['selection_title'] != null) ? print $dbc['menu_title'] . '-' . $dbc['selection_title'] : print $dbc['menu_title'] ?></td>
                            <td style="width: 15%;" class="text-capitalize"><?php echo $dbc ['quantity'] ?></td>
                            <td style="width: 25%;" class="text-capitalize"><?php echo to_currency($dbc ['quantity'] * $dbc ['price']) ?></td>
                        </tr>
                    <?php endforeach; ?>     
                <?php endif; ?>
            </table>
        </div>
    </div>
    <?php $total +=$foodTotal + $nonFoodTotal ?>
    <div class="tablebackgroundbg">
        <input type="hidden" id="CurrentOrderTotal" value='<?php echo $total ?>'/>
        <table class="table table-responsive calculation-table">
            <?php if ($total > 0) : ?>
                <tr>
                    <th>Sub Total</th>
                    <td><?php echo to_currency($total) ?></td>
                </tr>
            <?php endif; ?>

            <!--DISCOUNT MANAGE PART -->    
            <?php $discount = 0 ?>  
            <?php if ($total > 0): ?> 
                <?php if (isset($customDiscount) && !empty($customDiscount)): ?>
                    <tr class="line-discount">
                        <?php $discount += $customDiscount['discount']; ?>
                        <th>Discount</th>
                        <td><?php echo to_currency($discount) ?></td>
                    </tr>
                <?php else: ?>
                    <?php if ((int) $this->config->item('gk_discount_percent') > 0 && $this->config->item('gk_discount_applied') == 'yes'): ?>
                        <tr class="line-discount">
                            <?php $discount += $total * (int) $this->config->item('gk_discount_percent') / 100; ?>
                            <th>Discount</th>
                            <td><?php echo to_currency($discount) ?></td>
                        </tr>
                    <?php endif ?>
                <?php endif; ?>
            <?php endif; ?>
            <!--DISCOUNT MANAGE PART END--> 

            <?php $delivery_charge = 0 ?>
            <?php if (isset($deliveryPlan) && !empty($deliveryPlan) && $total > $deliveryPlan['delivery_charge'] && (isset($hasDBCart) && false == $hasDBCart)): ?>
                <tr>
                    <?php $delivery_charge = $deliveryPlan['is_free'] == 0 ? $deliveryPlan['delivery_charge'] : 0; ?>
                    <th>Delivery Fee</th>
                    <td><?php $delivery_charge > 0 ? print to_currency($delivery_charge) : 'FREE' ?></td>
                </tr>     
            <?php endif ?>

            <!--SERVICE CHARGE MANAGE PART -->    
            <?php $service_charge = 0 ?>   
            <?php if (!empty($serviceCharge) && isset($serviceCharge['service_charge']) && $total > 0): ?>
                <?php $service_charge += $serviceCharge['service_charge'] ?>
                <tr class="line-service-charge">
                    <th>Service Charge</th>
                    <td><?php echo to_currency($service_charge) ?></td>
                </tr>
            <?php endif; ?>
            <!--SERVICE CHARGE MANAGE PART END-->    

            <!--VAT MANAGE PART --> 
            <?php $vat = 0 ?>   
            <?php if (($this->config->item('gk_vat_reg') != '' || $this->config->item('gk_vat_reg') != null) && $total > 0): ?>
                <?php if ($this->config->item('gk_vat_included') == 'no'): ?>
                    <tr>
                        <?php $vat += ($total * $this->config->item('gk_vat_percent')) / 100; ?>
                        <th>VAT<?php echo "(" . $this->config->item('gk_vat_percent') . '&percnt;)' ?></th>
                        <td><?php echo to_currency($vat) ?></td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <th>VAT</th>
                        <td><span><?php echo $this->config->item('gk_vat_percent') ?>&percnt;</span>&nbsp;VAT included</td>
                    </tr>
                <?php endif ?>
            <?php endif; ?>
            <!--VAT MANAGE PART END--> 

            <!--TOTAL MANAGE PART --> 
            <?php $total+=($service_charge + $vat + $delivery_charge) - $discount; ?>
            <?php if (isset($hasDBCart) && true == $hasDBCart): ?>
                <tr>
                    <th>Total(<?php echo $newString ?>)</th>
                    <td><?php echo to_currency($total) ?></td>
                </tr> 
                <?php if ($total <= 0 && $currentOrderObj->order_total > 0): ?>
                    <tr class="alert-warning">
                        <th>Subtotal</th>
                        <td><?php echo to_currency($currentOrderObj->order_total) ?></td>
                    </tr> 
                <?php endif; ?>
                <?php if ($total <= 0 && $currentOrderObj->discount > 0): ?>
                    <tr class="alert-warning">
                        <th>Discount</th>
                        <td><?php echo to_currency($currentOrderObj->discount) ?></td>
                    </tr> 
                <?php endif; ?>

                <?php if ($total <= 0 && $currentOrderObj->delivery_charge > 0): ?>
                    <tr class="alert-warning">
                        <th>delivery Fee</th>
                        <td><?php echo to_currency($currentOrderObj->delivery_charge) ?></td>
                    </tr> 
                <?php endif ?> 


                <?php if ($total <= 0 && $currentOrderObj->service_charge > 0): ?>
                    <tr class="alert-warning">
                        <th>Service Charge</th>
                        <td><?php echo to_currency($currentOrderObj->service_charge) ?></td>
                    </tr> 
                <?php endif ?>

                <?php if ($total <= 0 && $currentOrderObj->vat > 0): ?>
                    <tr class="alert-warning">
                        <th>VAT</th>
                        <td><?php echo to_currency($currentOrderObj->vat) ?></td>
                    </tr> 
                <?php endif ?>    

                <tr class="alert-warning">
                    <th><?php $total > 0 ? print 'Previous Total' : print 'Total' ?></th>
                    <td><?php echo to_currency($preTotal) ?></td>
                </tr> 
                <tr>
                    <th>Grant Total</th>
                    <td><?php echo to_currency($total + $preTotal) ?></td>
                </tr> 
            <?php else: ?>
                <tr>
                    <th>Grant Total</th>
                    <td><?php echo to_currency($total) ?></td>
                </tr>
            <?php endif; ?>
            <!--TOTAL MANAGE PART --> 
            <?php if (!empty($deliveryPlan) && ($total + $preTotal) < $deliveryPlan ['min_order'] && $hasDBCart == false): ?>
                <tr>
                    <td colspan="2" class="text-center text-capitalize alert-info"><?php print'Minimum Delivery Order Amount:' . to_currency($deliveryPlan['min_order']) ?></td>
                </tr>
            <?php endif; ?>

        </table>
    </div>
    <input type="hidden" id="selectedRow" value="<?php isset($line) ? print $line : '' ?>">
    <input type="hidden" id="orderId" value="<?php isset($order_id) ? print $order_id : '' ?>">
    <?php if (!empty($deliveryPlan) && ($foodTotal + $nonFoodTotal) < $deliveryPlan['min_order'] && $hasDBCart == false): ?>
        <div class="sendbg col-lg-3 col-md-3 col-sm-3 col-xs-3" onclick="submitCart('<?php echo $order_id ?>', 'minYes', '<?php echo $isCartEmty ?>', '<?php echo $isDbcEmpty ?>')"><?php echo $this->lang->line('gkpos_send') ?></div>
    <?php else: ?>
        <div class="sendbg col-lg-3 col-md-3 col-sm-3 col-xs-3" onclick="submitCart('<?php echo $order_id ?>', 'minNo', '<?php echo $isCartEmty ?>', '<?php echo $isDbcEmpty ?>')"><?php echo $this->lang->line('gkpos_send') ?></div>
    <?php endif; ?>
    <div class="ktcbg col-lg-3 col-md-3 col-sm-3 col-xs-3"><?php echo $this->lang->line('gkpos_ktc') ?></div>
    <div class="minusbg col-lg-3 col-md-3 col-sm-3 col-xs-3" onclick="updatecart('minus')"><span class="minustextbg"> <?php echo $this->lang->line('gkpos_minus') ?> </span></div>
    <div class="plusbg col-lg-3 col-md-3 col-sm-3 col-xs-3" onclick="updatecart('plus')"><span class="plustextbg"> <?php echo $this->lang->line('gkpos_plus') ?> </span></div>
    <div class="clearfix"></div>
    <div class="colpay-close">
        <a href="javascript:void(0)" onclick="payAndClose('<?php isset($order_id) ? print $order_id : print $this->uri->segment(4) ?>', '<?php echo $isCartEmty ?>', '<?php echo $isDbcEmpty ?>')"><div class="mainsystembg collection-bg-color img-responsive"><?php echo $this->lang->line('gkpos_pay_and_close') ?></div></a>
    </div>
</div>

<script>
    function payAndClose(order_id, isCartEmty, isDbcEmpty) {
        if (order_id == null || order_id == '') {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_cart_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_make_order_sure') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
            return false;
        }
    }
</script>