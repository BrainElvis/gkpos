<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 right-top cart">
    <div class="sidebar-heading text-center text-uppercase"><?php echo $this->lang->line('gkpos_food') ?></div>
    <div class="tablebackgroundbg">
        <?php $total = 0; ?>
        <?php $foodTotal = 0 ?>
        <?php $nonFoodTotal = 0 ?>
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
                                <td style="width: 60%;" class="line line-<?php echo $cart['line'] ?>"><?php (isset($cart['selection_title']) && $cart['selection_title'] != null) ? print $cart['selection_title'] : print $cart['menu_title'] ?></td>
                                <td style="width: 15%;" class="line line-<?php echo $cart['line'] ?>"><?php echo $cart ['quantity'] ?></td>
                                <td style="width: 25%;" class="line line-<?php echo $cart['line'] ?>"><?php echo to_currency($cart ['quantity'] * $cart ['price']) ?></td>
                            </tr>
                        <?php else: ?>
                            <tr <?php isset($cart['plus']) && $cart['plus'] == 'yes' ? print 'class="alert alert-success" id="FoodmaxLine"' : print'' ?> onclick="selectRow('<?php echo $cart['line'] ?>', '<?php echo $cart['order_id'] ?>')">
                                <td style="width: 60%;" class="line line-<?php echo $cart['line'] ?>"><?php (isset($cart['selection_title']) && $cart['selection_title'] != null) ? print $cart['selection_title'] : print $cart['menu_title'] ?></td>
                                <td style="width: 15%;" class="line line-<?php echo $cart['line'] ?>"><?php echo $cart ['quantity'] ?></td>
                                <td style="width: 25%;" class="line line-<?php echo $cart['line'] ?>"><?php echo to_currency($cart ['quantity'] * $cart ['price']) ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php $foodTotal += $cart ['quantity'] * $cart ['price']; ?>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="2" class="text-right">Food Total</th>
                        <td><?php echo to_currency($foodTotal) ?></td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td> Your Food Cart is Empty</td>
                    </tr>
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
                                <td style="width: 60%;" class="line line-<?php echo $cart['line'] ?>"><?php (isset($cart['selection_title']) && $cart['selection_title'] != null) ? print $cart['selection_title'] : print $cart['menu_title'] ?></td>
                                <td style="width: 15%;" class="line line-<?php echo $cart['line'] ?>"><?php echo $cart ['quantity'] ?></td>
                                <td style="width: 25%;" class="line line-<?php echo $cart['line'] ?>"><?php echo to_currency($cart ['quantity'] * $cart ['price']) ?></td>
                            </tr>
                        <?php else: ?>
                            <tr <?php isset($cart['plus']) && $cart['plus'] == 'yes' ? print 'class="alert alert-success" id="nonFoodMaxLine"' : print'' ?> onclick="selectRow('<?php echo $cart['line'] ?>', '<?php echo $cart['order_id'] ?>')">
                                <td style="width: 60%;" class="line line-<?php echo $cart['line'] ?>"><?php (isset($cart['selection_title']) && $cart['selection_title'] != null) ? print $cart['selection_title'] : print $cart['menu_title'] ?></td>
                                <td style="width: 15%;" class="line line-<?php echo $cart['line'] ?>"><?php echo $cart ['quantity'] ?></td>
                                <td style="width: 25%;" class="line line-<?php echo $cart['line'] ?>"><?php echo to_currency($cart ['quantity'] * $cart ['price']) ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php $nonFoodTotal+=$cart ['quantity'] * $cart ['price'] ?>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="2" class="text-right">Non Food Total</th>
                        <td><?php echo to_currency($nonFoodTotal) ?></td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td> Your Beverage Cart is Empty</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <div class="tablebackgroundbg">
        <table class="table table-responsive calculation-table">
            <tr>
                <th>Discount</th>
                <td><?php echo to_currency(0.0) ?></td>
            </tr>
            <tr>
                <th>Service Charge</th>
                <td><?php echo to_currency(0.0) ?></td>
            </tr>
            <tr>
                <?php $total+=$foodTotal + $nonFoodTotal ?>
                <th>Total</th>
                <td><?php echo to_currency($total) ?></td>
            </tr>
        </table>
    </div>
    <input type="hidden" id="selectedRow" value="<?php isset($changeLine) ? print $changeLine : '' ?>">
    <input type="hidden" id="orderId" value="<?php isset($orderId) ? print $orderId : '' ?>">
    <div class="sendbg col-lg-3 col-md-3 col-sm-3 col-xs-3"><?php echo $this->lang->line('gkpos_send') ?></div>
    <div class="ktcbg col-lg-3 col-md-3 col-sm-3 col-xs-3"><?php echo $this->lang->line('gkpos_ktc') ?></div>
    <div class="minusbg col-lg-3 col-md-3 col-sm-3 col-xs-3" onclick="changeQuantity('minus')"><span class="minustextbg"> <?php echo $this->lang->line('gkpos_minus') ?> </span></div>
    <div class="plusbg col-lg-3 col-md-3 col-sm-3 col-xs-3" onclick="changeQuantity('plus')"><span class="plustextbg"> <?php echo $this->lang->line('gkpos_plus') ?> </span></div>
</div>
