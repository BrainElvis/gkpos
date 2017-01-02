<div class="modal-header">
    <div class="phone-call col-md-12">
        <span class="text-uppercase"><?php echo $current_section ?></span>
        <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
    </div>
</div>
<?php if (!empty($takeaway_orders)): ?>
    <div id="tableOrders" class="order-list row">
        <p class="order-list-heading text-uppercase"><i class="fa fa-list"></i><?php echo $this->lang->line('gkpos_takeaway') ?></p>
        <div class="orders">
            <?php foreach ($takeaway_orders as $takeaway_order) : ?>
                <?php $order_status_color = 'order-status-color-' . $takeaway_order->status ?>
                <?php $takeaway_bg_color = ' order-bg-color-' . $takeaway_order->order_type ?>
                <?php $takeaway_icon = $takeaway_order->order_type . 'icon' ?>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 order-item">
                    <!--<div class="order-heading text-center text-uppercase center-block <?php echo $order_status_color; ?>"><?php echo $takeaway_order->order_type ?></div>-->
                    <div onclick="manageThisOrder('<?php echo $takeaway_order->order_type . '_' . $takeaway_order->id ?>')" id="<?php echo $takeaway_order->order_type . '_' . $takeaway_order->id ?>" class="table-icon <?php echo $takeaway_bg_color ?>"><img src="<?php echo ASSETS_GKPOS_PATH . 'images/' . $takeaway_icon . '.png' ?>" class="img-responsive center-block"></div> 
                    <div class="order-heading text-center text-uppercase <?php echo $order_status_color; ?>"><?php isset($takeaway_order->name) && $takeaway_order->name != null ? print substr($takeaway_order->name, 0, 8) . "<br/>" : print '...........<br/>' ?><?php echo $takeaway_order->phone ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>