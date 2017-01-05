<input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
<?php if (!empty($takeaway_orders)): ?>
    <div id="tableOrders" class="order-list row">
        <div class="orders">
            <?php foreach ($takeaway_orders as $takeaway_order) : ?>
                <?php $order_status_color = 'order-status-color-' . $takeaway_order->status ?>
                <?php $takeaway_bg_color = ' order-bg-color-' . $takeaway_order->order_type ?>
                <?php $takeaway_icon = $takeaway_order->order_type . 'icon' ?>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 order-item">
                    <div onclick="getBaseAjaxPage('<?php echo site_url("gkpos/orders/indexajax/" . $takeaway_order->id) ?>', 'Create Order')" class="table-icon <?php echo $takeaway_bg_color ?>"><img src="<?php echo ASSETS_GKPOS_PATH . 'images/' . $takeaway_icon . '.png' ?>" class="img-responsive center-block"></div> 
                    <div class="order-heading text-center text-uppercase <?php echo $order_status_color; ?>"><?php isset($takeaway_order->name) && $takeaway_order->name != null ? print substr($takeaway_order->name, 0, 8) : print $takeaway_order->phone ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>