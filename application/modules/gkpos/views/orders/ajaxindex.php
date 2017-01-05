<section id="body">
    <div class="container-fluid menuselection">
        <div class="row">
            <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 left-top">
                <div class="sidebar-heading text-center text-uppercase"><?php echo $this->lang->line('gkpos_category_list') ?></div>
                <?php echo $showcategory ?>
            </div>          
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 middle-top">
                <?php echo $this->load->view('gkpos/orders/menu') ?>
                <div class="row action-button">
                    <div class="main-arrowbg col-md-offset-3 col-md-6 col-md-offset-3 text-center">
                        <ul id="menuPagination">
                            <li><div class="prevbtng menuPrevBtn" id="menuPrevBtn" onclick="getMenuByCategory(this.id, 'menuPrevBtn')"><a href="javascript:void(0)"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/prevbtnbg.png" width="75" height="46" /></a></div></li>
                            <input type="hidden" id="menuFirstOrder" value="0">
                            <input type="hidden" id="menuPrevBtnCounter" value="0">
                            <li><div class="nextbtng menuNextBtn" id="menuNextBtn" onclick="getMenuByCategory(this.id, 'menuNextBtn')"><a href="javascript:void(0)"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/nextbtnbg.png" width="75" height="46" /></a></div></li>
                            <input type="hidden" id="menuLastOrder" value="0">
                            <input type="hidden" id="menuNextBtnCounter" value="0">
                        </ul>
                    </div>
                    <div class="clearfix"></div>

                    <a href="javascript:void(0)" onclick="addDiscount('<?php $this->Orders_Model->get_current_orderid() ? print $this->Orders_Model->get_current_orderid() : $this->uri->segment(4) ?>')"><div class="mainsystembg2 collection-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_promo_discount') ?></div></a>
                    <a href="javascript:void(0)" onclick="addQuantity('<?php $this->Orders_Model->get_current_orderid() ? print $this->Orders_Model->get_current_orderid() : $this->uri->segment(4) ?>')"><div class="mainsystembg2 delivery-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_quantity') ?></div></a>
                    <a href="javascript:void(0)" onclick="addServiceCharge('<?php $this->Orders_Model->get_current_orderid() ? print $this->Orders_Model->get_current_orderid() : $this->uri->segment(4) ?>')"><div class="mainsystembg2 collection-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_add_service_charge') ?></div></a>
                    <a href="#"><div class="mainsystembg2 delivery-bg-color  img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_change_table_details') ?></div></a>
                    <a href="#"><div class="mainsystembg2 waiting-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_special_modify') ?></div></a>
                    <a href="#"><div class="mainsystembg2 delivery-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_item_description') ?></div></a>
                </div>
            </div>

            <div id="cartBody"></div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 left-bottom">
                <div class="main-arrowbg">
                    <ul>
                        <li><div class="prevbtng" id="prevBtn" onclick="getcategory(this.id)"><a href="javascript:void(0)"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/prevbtnbg.png" width="75" height="46" /></a></div></li>
                        <input type="hidden" id="firstCatOrder" value="0">
                        <li><div class="nextbtng" id="nextBtn" onclick="getcategory(this.id)"><a href="javascript:void(0)"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/nextbtnbg.png" width="75" height="46" /></a></div></li>
                        <input type="hidden" id="lastCatOrder" value="0">
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 middle-bottom">
                <div class="row action-button">
                    <a href="#"><div class="mainsystembg2 waiting-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_print_guest_bill'); ?></div></a>
                    <a href="javascript:void(0)" onclick="pageExit('<?php echo site_url("gkpos/indexajax") ?>', 'Mainboard')"><div class="mainsystembg2 collection-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_exit') ?></div></a>
                    <a href="#"><div class="mainsystembg2 waiting-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_convert_to_takeaway') ?></div></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 right-bottom">&nbsp;</div>
        </div>
    </div>
</section>
<?php echo $this->load->view('gkpos/orders/popups/servicecharge') ?>
<?php echo $this->load->view('gkpos/orders/popups/discount') ?>
<?php echo $this->load->view('gkpos/orders/popups/quantity') ?>
<?php echo $this->load->view('gkpos/orders/popups/payandclose') ?>
<?php echo $this->load->view('gkpos/orders/popups/cart_warning') ?>


<script>
    $(document).ready(function () {
        var order_id = '<?php $this->Orders_Model->get_current_orderid() ? print $this->Orders_Model->get_current_orderid() : $this->uri->segment(4) ?>'
        loadCart(order_id);
        jQuery(".closeServiceChargePopup").click(function () {
            jQuery.colorbox.close();
            return false;
        });
        getcategory();
    });

    function loadCart(order_id, line) {
        $.ajax({
            url: '<?php echo site_url("gkpos/orders/loadcart") ?>',
            data: {
                order_id: order_id
            },
            type: "POST",
            success: function (output) {
                jQuery.colorbox.close();
                $('#cartBody').html(output);
                if (line) {
                    $('.line-' + line).removeClass('alert-success alert-warning').addClass('alert-success');
                    $('#selectedRow').val(line);
                    $('#orderId').val(order_id);
                }
                var windowScreenHeight = $(window).height();
                $('.menuselection .left-top, .menuselection .middle-top,.menuselection .right-top').css({"height": windowScreenHeight - (windowScreenHeight * 0.223) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
                $('.menuselection .order-menu-list').css({"height": windowScreenHeight - (windowScreenHeight * 0.44) + "px", "overflow-y": "auto", "overflow-x": "hidden"});
                $('.menuselection .left-bottom,.menuselection .middle-bottom,.menuselection .right-bottom').css({"height": windowScreenHeight - (windowScreenHeight * 0.887) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
                $('.item-table, .calculation-table').css({"height": "140px", "overflow-y": "scroll", "overflow-x": "hidden"});
                manageWindowHeight();
            }
        });
    }

    function addtocart(category, menu, sel, quantity = 1, extras) {
        var order_id = '<?php isset($order_id) ? print $order_id : print $this->uri->segment(4) ?>'
        $.ajax({
            url: '<?php echo site_url("gkpos/orders/addtocart") ?>',
            data: {
                order_id: order_id,
                category: category,
                menu: menu,
                sel: sel,
                quantity: quantity,
                extra: extras ? extras : false
            },
            type: "POST",
            dataType: "json",
            success: function (output) {
                loadCart(output.order_id, output.line);
            }
        });
    }

    function selectRow(line, orderId) {
        $('#selectedRow').val('');
        $('#orderId').val('');
        $('.line').removeClass('alert-success');
        if ($('.line-' + line).hasClass('alert-warning')) {
            $('.db-row').addClass('alert-warning');
            $('.line-' + line).removeClass('alert-warning').addClass('alert-success');
        } else {
            $('.line-' + line).addClass('alert-success');
        }
        $('#selectedRow').val(line);
        $('#orderId').val(orderId);
    }


    function updatecart(action, quantity, isCartEmty, isDbcEmpty) {
        var line = $('#selectedRow').val();
        var order_id = $('#orderId').val();
        if (!order_id) {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_cart_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_make_order_sure') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
            return false;
        } else if (isCartEmty && isDbcEmpty) {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_cart_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_put_item_on_cart') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
            return false;
        } else {
            if (!line) {
                jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_cart_warning') ?>");
                jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_select_item_row_to_change_quantity') ?>");
                jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
                return false;
            } else {
                $.ajax({
                    url: '<?php echo site_url("gkpos/orders/updatecart") ?>',
                    data: {
                        line: parseInt(line),
                        action: action,
                        order_id: order_id,
                        quantity: quantity
                    },
                    type: "POST",
                    dataType: "json",
                    success: function (output) {
                        if (output.not_allowed) {
                            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_cart_warning') ?>");
                            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_not_allowed_to_update') ?>");
                            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
                            return false;
                        } else {
                            loadCart(output.order_id, output.line);
                        }

                    }
                });
            }
        }
    }

    function submitCart(order_id, min, isCartEmty, isDbcEmpty, hasNew) {
        if (order_id == null || order_id == '') {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_cart_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_make_order_sure') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
            return false;
        } else if (hasNew == 'no') {
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_cart_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_put_item_on_cart') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
            return false;
        } else if (min == 'minYes') {
            //alert();
            jQuery('#cartWarningHeader').text("<?php echo $this->lang->line('gkpos_cart_warning') ?>");
            jQuery('#cartWarningContent').text("<?php echo $this->lang->line('gkpos_meet_delivery_condition') ?>");
            jQuery(".cartWarning").colorbox({inline: true, slideshow: false, scrolling: false, height: "250px", open: true, width: '100%', maxWidth: '400px', 'left': '30%'});
            return false;
        } else {
            if (!isDbcEmpty) {
                $.confirm({
                    'title': 'Sending Warning',
                    'message': 'Choose option to send items to kitchen',
                    'buttons': {
                        'Sent All': {
                            'class': 'btn btn-success',
                            'action': function () {
                                $.ajax({
                                    url: "<?php echo site_url('gkpos/orders/save_order') ?>",
                                    data: {
                                        order_id: parseInt(order_id),
                                        sent: 'all'
                                    },
                                    type: "POST",
                                    dataType: "json",
                                    success: function (output) {
                                        loadCart(output.order_id, 5);
                                    }
                                });
                            }
                        },
                        'Sent New': {
                            'class': 'btn btn-warning',
                            'action': function () {
                                $.ajax({
                                    url: "<?php echo site_url('gkpos/orders/save_order') ?>",
                                    data: {
                                        order_id: parseInt(order_id),
                                        sent: 'new'
                                    },
                                    type: "POST",
                                    dataType: "json",
                                    success: function (output) {
                                        loadCart(output.order_id, 5);
                                    }
                                });
                            }
                        },
                        'close': {
                            'class': 'btn btn-danger',
                            'action': function () {}
                        }
                    }
                });
            } else {
                $.ajax({
                    url: "<?php echo site_url('gkpos/orders/save_order') ?>",
                    data: {
                        order_id: parseInt(order_id),
                        sent: 'all'
                    },
                    type: "POST",
                    dataType: "json",
                    success: function (output) {
                        loadCart(output.order_id, 5);
                    }
                });
            }
        }
    }

</script>