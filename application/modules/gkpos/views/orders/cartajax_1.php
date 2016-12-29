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
        $preTotal = 0;
        $newString = '';
        $hasDBCart = false;
        if (!intval($order_id)) {
            $order_id = $foodCart[0]['order_id'] > 0 ? $foodCart[0]['order_id'] : $nonFoodCart[0]['order_id'];
        }
        if (intval($order_id) > 0) {
            $dbcart = $this->Orders_Model->get_db_cart($order_id);
            $currentOrderObj = $this->Orders_Model->get_single('gkpos_order', array('id' => $order_id));

            if (!empty($currentOrderObj) && !empty($dbcart)) {
                $hasDBCart = true;
                $newString = "New";
                $preTotal = $currentOrderObj->grand_total;
            }
        }
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
                <?php if (!empty($foodCart)): ?>
                    <?php $foodCart = array_reverse($foodCart, true) ?>
                    <?php foreach ($foodCart as $cart): ?>
                        <?php if ($cart ['line'] == $maxLine && isset($cart['plus']) && $cart['plus'] == 'yes'): ?>
                            <tr class="alert alert-success" id="FoodMaxLine" onclick="selectRow('<?php echo $cart['line'] ?>', '<?php echo $cart['order_id'] ?>')" >
                                <td style="width: 60%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php (isset($cart['selection_title']) && $cart['selection_title'] != null) ? print $cart['menu_title'] . '-' . $cart['selection_title'] : print $cart['menu_title'] ?></td>
                                <td style="width: 15%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo $cart ['quantity'] ?></td>
                                <td style="width: 25%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo to_currency($cart ['quantity'] * $cart ['price']) ?></td>
                            </tr>
                        <?php else: ?>
                            <tr <?php isset($cart['plus']) && $cart['plus'] == 'yes' ? print 'class="alert alert-success" id="FoodmaxLine"' : print'' ?> onclick="selectRow('<?php echo $cart['line'] ?>', '<?php echo $cart['order_id'] ?>')">
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
                    <?php if (empty($foodCart) && empty($dbcart)): ?>
                        <tr>
                            <td> Your Food Cart is Empty</td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (!empty($dbcart)): ?>
                    <?php foreach ($dbcart as $dbc): ?>
                        <?php if ($dbc['category_type'] == 1): ?>
                            <tr class="alert-info">
                                <td style="width: 60%;" class="text-capitalize"><?php (isset($dbc['selection_title']) && $dbc['selection_title'] != null) ? print $dbc['menu_title'] . '-' . $dbc['selection_title'] : print $dbc['menu_title'] ?></td>
                                <td style="width: 15%;" class="text-capitalize"><?php echo $dbc ['quantity'] ?></td>
                                <td style="width: 25%;" class="text-capitalize"><?php echo to_currency($dbc ['quantity'] * $dbc ['price']) ?></td>
                            </tr>
                        <?php endif; ?>
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
                <?php if (!empty($nonFoodCart)): ?>
                    <?php $nonFoodCart = array_reverse($nonFoodCart, true) ?>
                    <?php foreach ($nonFoodCart as $cart): ?>
                        <?php if ($cart ['line'] == $maxLine && isset($cart['plus']) && $cart['plus'] == 'yes'): ?>
                            <tr class="alert alert-success" <?php (isset($cart['plus']) && $cart['plus'] == 'yes') ? print'id="nonFoodMaxLine"' : print'' ?> onclick="selectRow('<?php echo $cart['line'] ?>', '<?php echo $cart['order_id'] ?>')" >
                                <td style="width: 60%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php (isset($cart['selection_title']) && $cart['selection_title'] != null) ? print $cart['menu_title'] . '-' . $cart['selection_title'] : print $cart['menu_title'] ?></td>
                                <td style="width: 15%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo $cart ['quantity'] ?></td>
                                <td style="width: 25%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo to_currency($cart ['quantity'] * $cart ['price']) ?></td>
                            </tr>
                        <?php else: ?>
                            <tr <?php isset($cart['plus']) && $cart['plus'] == 'yes' ? print 'class="alert alert-success" id="nonFoodMaxLine"' : print'' ?> onclick="selectRow('<?php echo $cart['line'] ?>', '<?php echo $cart['order_id'] ?>')">
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
                    <?php if (empty($nonFoodCart) && empty($dbcart)): ?>
                        <tr>
                            <td> Your Beverage Cart is Empty</td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (!empty($dbcart)): ?>
                    <?php foreach ($dbcart as $dbc): ?>
                        <?php if ($dbc['category_type'] == 2): ?>
                            <tr class="alert-info">
                                <td style="width: 60%;" class="text-capitalize"><?php (isset($dbc['selection_title']) && $dbc['selection_title'] != null) ? print $dbc['menu_title'] . '-' . $dbc['selection_title'] : print $dbc['menu_title'] ?></td>
                                <td style="width: 15%;" class="text-capitalize"><?php echo $dbc ['quantity'] ?></td>
                                <td style="width: 25%;" class="text-capitalize"><?php echo to_currency($dbc ['quantity'] * $dbc ['price']) ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>     
                <?php endif; ?>
            </table>
        </div>
    </div>
    <?php
    $total +=$foodTotal + $nonFoodTotal;
    $deliveryPlan = $this->Orders_Model->get_deliveryplan($order_id);
    $servicecharge = $this->Orders_Model->get_servicecharge($order_id);
    $customDiscount = $this->Orders_Model->get_discount($order_id);
    ?>
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
                    <tr>
                        <?php $discount += $customDiscount['discount']; ?>
                        <th>Discount</th>
                        <td><?php echo to_currency($discount) ?></td>
                    </tr>
                <?php else: ?>
                    <?php if ((int) $this->config->item('gk_discount_percent') > 0 && $this->config->item('gk_discount_applied') == 'yes'): ?>
                        <tr>
                            <?php $discount += $total * (int) $this->config->item('gk_discount_percent') / 100; ?>
                            <th>Discount</th>
                            <td><?php echo to_currency($discount) ?></td>
                        </tr>
                    <?php endif ?>
                <?php endif; ?>
            <?php endif; ?>
            <!--DISCOUNT MANAGE PART END--> 


            <?php $delivery_charge = 0 ?>
            <?php if (isset($deliveryPlan) && !empty($deliveryPlan) && $total > $deliveryPlan['delivery_charge'] && $hasDBCart == false): ?>
                <tr>
                    <?php $delivery_charge = $deliveryPlan['is_free'] == 0 ? $deliveryPlan['delivery_charge'] : 0; ?>
                    <th>Delivery Fee</th>
                    <td><?php $delivery_charge > 0 ? print to_currency($delivery_charge) : 'FREE' ?></td>
                </tr>     
            <?php endif ?>

            <!--SERVICE CHARGE MANAGE PART -->    
            <?php $service_charge = 0 ?>   
            <?php if (!empty($servicecharge) && isset($servicecharge['service_charge']) && $total > 0): ?>
                <?php $service_charge += (isset($servicecharge['charge_func']) && $servicecharge['charge_func'] == 'percent') ? ($servicecharge['service_charge'] * $total) / 100 : $servicecharge['service_charge'] ?>; 
                <tr>
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
            <?php if ($hasDBCart): ?>
                <tr>
                    <th>Total(<?php echo $newString ?>)</th>
                    <td><?php echo to_currency($total) ?></td>
                </tr> 
                <tr class="alert-info">
                    <th>Pre Total</th>
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
            <?php if (!empty($deliveryPlan) && ($total + $preTotal) < $deliveryPlan ['min_order']): ?>
                <tr>
                    <td colspan="2" class="text-center text-capitalize alert-info"><?php print'Minimum Delivery Order Amount:' . to_currency($deliveryPlan['min_order']) ?></td>
                </tr>
            <?php endif; ?>

        </table>
    </div>
    <input type="hidden" id="selectedRow" value="<?php isset($changeLine) ? print $changeLine : '' ?>">
    <input type="hidden" id="orderId" value="<?php isset($order_id) ? print $order_id : '' ?>">
    <input type="hidden" id="sentAction" value="">

    <?php if (!empty($deliveryPlan) && ($foodTotal + $nonFoodTotal) >= $deliveryPlan['min_order']): ?>
        <div class="sendbg col-lg-3 col-md-3 col-sm-3 col-xs-3" onclick="submitCart('<?php echo $order_id ?>')"><?php echo $this->lang->line('gkpos_send') ?></div>
    <?php else: ?>
        <div class="sendbg col-lg-3 col-md-3 col-sm-3 col-xs-3" onclick="submitCart('<?php echo $order_id ?>')"><?php echo $this->lang->line('gkpos_send') ?></div>
    <?php endif; ?>
    <div class="ktcbg col-lg-3 col-md-3 col-sm-3 col-xs-3"><?php echo $this->lang->line('gkpos_ktc') ?></div>
    <div class="minusbg col-lg-3 col-md-3 col-sm-3 col-xs-3" onclick="changeQuantity('minus')"><span class="minustextbg"> <?php echo $this->lang->line('gkpos_minus') ?> </span></div>
    <div class="plusbg col-lg-3 col-md-3 col-sm-3 col-xs-3" onclick="changeQuantity('plus')"><span class="plustextbg"> <?php echo $this->lang->line('gkpos_plus') ?> </span></div>
</div>
