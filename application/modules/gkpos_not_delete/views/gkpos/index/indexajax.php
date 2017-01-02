<?php if ($this->config->item('is_touch') == 'disable'): ?>
    <style>
        .ui-autocomplete {
            border: none !important ;
        }
        .ui-autocomplete .ui-menu-item {
            padding: 7px;
        }
    </style>
<?php else: ?>
    <style>
        .ui-autocomplete {
            left: 5% !important;
            border: none !important ;
        }
        .ui-autocomplete .ui-menu-item {
            padding: 10px 7px 10px 7px;
        }
    </style>
<?php endif; ?>
<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->load->view('gkpos/partials/left_sidebar') ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 bodyitem">
                <div id="KeyboardSetting">
                    <?php echo $this->load->view('gkpos/partials/keyboard_setting') ?>
                    <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
                </div>
                <div id="MiddleContent">
                    <?php if (!empty($table_orders)): ?>
                        <div id="tableOrders" class="order-list row">
                            <p class="order-list-heading text-uppercase"><i class="fa fa-list"></i><?php echo $this->lang->line('gkpos_table') ?></p>
                            <div class="orders">
                                <?php foreach ($table_orders as $table) : ?>
                                    <?php $order_status_color = 'order-status-color-' . $table->status ?>
                                    <?php $order_table_bg_color = 'order-table-bg-color-' . $table->status ?>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <!--<div class="order-heading text-center text-uppercase center-block <?php echo $order_status_color; ?>"><?php echo "t-no(" . $table->table_number . ")" ?></div>-->
                                        <div onclick="manageThisOrder('<?php echo $table->order_type . '_' . $table->id ?>')" id="<?php echo $table->order_type . '_' . $table->id ?>" class="center-block text-center <?php echo $order_table_bg_color   ?>"><div class="table-number"><?php echo $table->table_number ?></div></div> 
                                        <div class="order-heading center-block text-center text-uppercase <?php echo $order_status_color; ?>"><?php echo "g-qty(" . $table->guest_quantity . ")" ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

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
                </div>
                <div id="customerInformation"></div>
            </div>
            <?php echo $this->load->view('gkpos/partials/right_sidebar') ?>
        </div>
    </div>
</section>
<div id="MangerOrderPopoUp"></div>
<script>
    $(document).ready(function () {
        setnumkeys('phone');
        manageWindowHeight();
        $('#MangerOrderPopoUp').html('');
        $("#caller_order_type").autocomplete({
            delay: 0,
            source: ["delivery", "collection", "table", "waiting"],
            minLength: 0
        });
    });
</script>
