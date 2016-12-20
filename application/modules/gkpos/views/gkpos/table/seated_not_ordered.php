<div class="modal-header">
    <div class="phone-call col-md-12">
        <span class="text-uppercase"><?php echo $current_section ?></span>
         <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
    </div>
</div>
 <?php if (!empty($table_orders)): ?>
        <div id="tableOrders" class="order-list row">
            <p class="order-list-heading text-uppercase"><i class="fa fa-list"></i><?php echo $this->lang->line('gkpos_table') ?></p>
            <div class="orders">
                <?php foreach ($table_orders as $table) : ?>
                    <?php $order_status_color = 'order-status-color-' . $table->status ?>
                    <?php $order_table_bg_color = 'order-table-bg-color-' . $table->status ?>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <div class="order-heading text-center text-uppercase center-block <?php echo $order_status_color; ?>"><?php echo "t-no(" . $table->table_number . ")" ?></div>
                        <div onclick="manageThisOrder('<?php echo $table->order_type . '_' . $table->id ?>')" id="<?php echo $table->order_type . '_' . $table->id ?>" class="table-icon center-block text-center <?php echo $order_table_bg_color ?>"><img src="<?php echo ASSETS_GKPOS_PATH . 'images/' . $table->order_type . '.png' ?>" class="img-responsive center-block"></div> 
                        <div class="order-heading center-block text-center text-uppercase <?php echo $order_status_color; ?>"><?php echo "g-qty(" . $table->guest_quantity . ")" ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>