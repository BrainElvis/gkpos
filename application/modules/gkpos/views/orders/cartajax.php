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
                        <tr onclick="selectRow('<?php echo $cart['line'] ?>', '<?php echo $cart['order_id'] ?>')" class="line line-<?php echo $cart['line'] ?>">
                            <td style="width: 60%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php (isset($cart['selection_title']) && $cart['selection_title'] != null) ? print $cart['menu_title'] . '-' . $cart['selection_title'] : print $cart['menu_title'] ?></td>
                            <td style="width: 15%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo $cart ['quantity'] ?></td>
                            <td style="width: 25%;" class="text-capitalize line line-<?php echo $cart['line'] ?>"><?php echo to_currency($cart ['quantity'] * $cart ['price']) ?></td>
                        </tr>
                        <?php $foodTotal += $cart ['quantity'] * $cart ['price']; ?>
                    <?php endforeach; ?>  
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
                        <tr onclick="selectRow('<?php echo $dbc['line'] ?>', '<?php echo $dbc['order_id'] ?>')" class="line line-<?php echo $dbc['line'] ?> alert-warning db-row" >
                            <td style="width: 60%;" class="text-capitalize"><?php (isset($dbc['selection_title']) && $dbc['selection_title'] != null) ? print $dbc['menu_title'] . '-' . $dbc['selection_title'] : print $dbc['menu_title'] ?></td>
                            <td style="width: 15%;" class="text-capitalize"><?php echo $dbc ['quantity'] ?></td>
                            <td style="width: 25%;" class="text-capitalize"><?php echo to_currency($dbc ['quantity'] * $dbc ['price']) ?></td>
                        </tr>
                        <?php $foodTotal+=$dbc ['quantity'] * $dbc ['price']; ?>

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
                        <tr onclick="selectRow('<?php echo $cart['line'] ?>', '<?php echo $cart['order_id'] ?>')" class="line line-<?php echo $cart['line'] ?>" >
                            <td style="width: 60%;" class="text-capitalize"><?php (isset($cart['selection_title']) && $cart['selection_title'] != null) ? print $cart['menu_title'] . '-' . $cart['selection_title'] : print $cart['menu_title'] ?></td>
                            <td style="width: 15%;"><?php echo $cart ['quantity'] ?></td>
                            <td style="width: 25%;"><?php echo to_currency($cart ['quantity'] * $cart ['price']) ?></td>
                        </tr>
                        <?php $nonFoodTotal+=$cart ['quantity'] * $cart ['price'] ?>
                    <?php endforeach; ?>
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
                        <tr onclick="selectRow('<?php echo $dbc['line'] ?>', '<?php echo $dbc['order_id'] ?>')" class="line line-<?php echo $dbc['line'] ?> alert-warning db-row " >
                            <td style="width: 60%;" class="text-capitalize"><?php (isset($dbc['selection_title']) && $dbc['selection_title'] != null) ? print $dbc['menu_title'] . '-' . $dbc['selection_title'] : print $dbc['menu_title'] ?></td>
                            <td style="width: 15%;" class="text-capitalize"><?php echo $dbc ['quantity'] ?></td>
                            <td style="width: 25%;" class="text-capitalize"><?php echo to_currency($dbc ['quantity'] * $dbc ['price']) ?></td>
                        </tr>
                        <?php $nonFoodTotal+=$dbc ['quantity'] * $dbc ['price']; ?>
                    <?php endforeach; ?>     
                <?php endif; ?>
            </table>
        </div>
    </div>

    <?php
    $subtotal = $foodTotal + $nonFoodTotal;
    $this->Orders_Model->set_subtotal($order_id, $subtotal);
    $total+= $subtotal;
    ?>
    <div class="tablebackgroundbg" id="calculationTable">
        <input type="hidden" id="CurrentOrderTotal" value='<?php echo $total ?>'/>

        <table class="table table-responsive calculation-table">
            <tr>
                <th>Sub Total</th>
                <td><?php echo to_currency($total) ?></td>
            </tr>
            <!--DISCOUNT MANAGE PART -->    
            <?php
            $discount_data = $this->Orders_Model->get_discount($order_id);
            $discountArray = !empty($discount_data) ? calculate_discount($order_id, $total, $foodTotal, $nonFoodTotal, $discount_data) : 0;
            $discount = $discountArray['discount'];
            $discount_string = $discountArray['dsicount_string'];
            $this->Orders_Model->set_discount_amount($order_id, $discount);
            ?>
            <tr class="line-discount">
                <th>Discount</th>
                <td><?php echo to_currency(!$this->Orders_Model->get_discount_amount($order_id) ? $discount : $this->Orders_Model->get_discount_amount($order_id) ) ?></td>
            </tr>
            <!--DISCOUNT MANAGE PART END--> 
            <?php $delivery_charge = 0; ?>
            <?php if ($currentOrderObj->order_type = 'delivery'): ?>
                <?php $delivery_plan = $this->Orders_Model->get_deliveryplan($order_id); ?>
                <?php if (isset($delivery_plan) && !empty($delivery_plan)): ?>
                    <tr>
                        <?php $delivery_charge = $delivery_plan['is_free'] == 0 ? $delivery_plan['delivery_charge'] : 0; ?>
                        <th>Delivery Fee</th>
                        <td><?php $delivery_charge > 0 ? print to_currency($delivery_charge) : 'FREE' ?></td>
                    </tr>     
                <?php endif ?>
            <?php endif; ?>     
            <?php $this->Orders_Model->set_deliveryplan_amount($order_id, $delivery_charge) ?>
            <!--SERVICE CHARGE MANAGE PART -->    
            <?php
            $service_charge_data = $this->Orders_Model->get_servicecharge($order_id);
            $service_charge = !empty($service_charge_data) ? calculate_service_charge($order_id, $total, $service_charge_data) : 0;
            $service_charge = !$this->Orders_Model->get_servicecharge_amount($order_id) ? $service_charge : $this->Orders_Model->get_servicecharge_amount($order_id)
            ?>   
            <?php if ($service_charge > 0): ?>
                <tr class="line-service-charge">
                    <th>Service Charge</th>
                    <td><?php echo to_currency($service_charge) ?></td>
                </tr>
            <?php endif; ?>
            <!--SERVICE CHARGE MANAGE PART END-->    

            <!--VAT MANAGE PART --> 
            <?php
            $vat_data = $this->Orders_Model->get_vat($order_id);
            $vat = 0;
            if (!empty($vat_data) && $vat_data['is_included'] == 2) {
                $vat = calculate_vat($order_id, $total, $vat_data);
            }
            ?>   
            <tr>
                <th>VAT</th>
                <td><?php $vat_data['is_included'] == 1 ? print'<span class="alert-info">' . $vat_data['number'] . '&percnt;' . $this->lang->line('gkpos_vat_included') . '</span>' : print to_currency($vat) ?></td>
            </tr>

            <!--VAT MANAGE PART END--> 

            <!--TOTAL MANAGE PART --> 
            <?php $total+=($service_charge + $vat + $delivery_charge) - $discount; ?>
            <?php $this->Orders_Model->set_total($order_id, $total) ?>
            <tr>
                <th>Grant Total</th>
                <td><?php echo to_currency($total) ?></td>
            </tr>
            <!--TOTAL MANAGE PART --> 
            <?php if (!empty($delivery_plan) && ($foodTotal + $nonFoodTotal) < $delivery_plan ['min_order']): ?>
                <tr>
                    <td colspan="2" class="text-center text-capitalize alert-info"><?php print'Minimum Delivery Order Amount:' . to_currency($delivery_plan['min_order']) ?></td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
    <input type="hidden" id="selectedRow" value="<?php isset($line) ? print $line : '' ?>">
    <input type="hidden" id="orderId" value="<?php isset($order_id) ? print $order_id : '' ?>">
    <?php if (!empty($delivery_plan) && ($foodTotal + $nonFoodTotal) < $delivery_plan['min_order']): ?>
        <div class="sendbg col-lg-3 col-md-3 col-sm-3 col-xs-3" onclick="submitCart('<?php echo $order_id ?>', 'minYes', '<?php echo $isCartEmty ?>', '<?php echo $isDbcEmpty ?>', '<?php echo $has_new ?>')"><?php echo $this->lang->line('gkpos_send') ?></div>
    <?php else: ?>
        <div class="sendbg col-lg-3 col-md-3 col-sm-3 col-xs-3" onclick="submitCart('<?php echo $order_id ?>', 'minNo', '<?php echo $isCartEmty ?>', '<?php echo $isDbcEmpty ?>', '<?php echo $has_new ?>')"><?php echo $this->lang->line('gkpos_send') ?></div>
    <?php endif; ?>
    <div class="ktcbg col-lg-3 col-md-3 col-sm-3 col-xs-3"><?php echo $this->lang->line('gkpos_ktc') ?></div>
    <div class="minusbg col-lg-2 col-md-2 col-sm-2 col-xs-2 update-button-width" onclick="updatecart('minus', '1', '<?php echo $isCartEmty ?>', '<?php echo $isDbcEmpty ?>')"><span class="minustextbg"> <?php echo $this->lang->line('gkpos_minus') ?> </span></div>
    <div class="plusbg col-lg-2 col-md-2 col-sm-2 col-xs-2  update-button-width" onclick="updatecart('plus', '1', '<?php echo $isCartEmty ?>', '<?php echo $isDbcEmpty ?>')"><span class="plustextbg"> <?php echo $this->lang->line('gkpos_plus') ?> </span></div>
    <div class="minusbg col-lg-2 col-md-2 col-sm-2 col-xs-2  update-button-width" onclick="updatecart('del', '1', '<?php echo $isCartEmty ?>', '<?php echo $isDbcEmpty ?>')"><span class="plustextbg"> <?php echo $this->lang->line('gkpos_numpad_key_del') ?> </span></div>
    <div class="clearfix"></div>
    <div class="colpay-close">
        <a href="javascript:void(0)" onclick="payAndClose('<?php isset($order_id) ? print $order_id : print $this->uri->segment(4) ?>', '<?php echo $isCartEmty ?>', '<?php echo $isDbcEmpty ?>', '<?php echo $has_new ?>')"><div class="mainsystembg collection-bg-color img-responsive"><?php echo $this->lang->line('gkpos_pay_and_close') ?></div></a>
    </div>
</div>