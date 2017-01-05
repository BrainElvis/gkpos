<input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
<?php if (!empty($table_orders)): ?>
    <div id="tableOrders" class="order-list row">
        <div class="orders">
            <?php foreach ($table_orders as $table) : ?>
                <?php $order_status_color = 'order-status-color-' . $table->status ?>
                <?php $order_table_bg_color = 'order-table-bg-color-' . $table->status ?>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div onclick="getBaseAjaxPage('<?php echo site_url("gkpos/orders/indexajax/" . $table->id) ?>', 'Create Order')" class="center-block text-center <?php echo $order_table_bg_color ?>"><div class="table-number"><?php echo $table->table_number ?></div></div>
                    <div class="order-heading center-block text-center text-uppercase <?php echo $order_status_color; ?>"><?php echo $table->guest_quantity ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>