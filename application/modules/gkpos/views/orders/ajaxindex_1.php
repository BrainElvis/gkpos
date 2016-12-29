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
                    <a href="#"><div class="mainsystembg2 waiting-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_change_table_details') ?></div></a>
                    <a href="#"><div class="mainsystembg2 delivery-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_quantity') ?></div></a>
                    <a href="javascript:void(0)" onclick="addDiscount('<?php echo $this->uri->segment(4) ?>', '<?php echo get_order_type($this->uri->segment(4)) ?>')"><div class="mainsystembg2 collection-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_promo_discount') ?></div></a>
                    <a href="javascript:void(0)" onclick="addServiceCharge('<?php echo $this->uri->segment(4) ?>', '<?php echo get_order_type($this->uri->segment(4)) ?>')"><div class="mainsystembg2 collection-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_add_service_charge') ?></div></a>
                    <a href="#"><div class="mainsystembg2 waiting-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_special_modify') ?></div></a>
                    <a href="#"><div class="mainsystembg2 delivery-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_item_description') ?></div></a>
                </div>
            </div>

            <div id="cartBody">
                <?php echo $this->load->view('gkpos/orders/cart') ?>
            </div>
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
                    <a href="#"><div class="mainsystembg2 delivery-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_print_guest_bill'); ?></div></a>
                    <a href="javascript:void(0)" onclick="pageExit('<?php echo site_url("gkpos/indexajax") ?>', 'Mainboard')"><div class="mainsystembg2 collection-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_exit') ?></div></a>
                    <a href="#"><div class="mainsystembg2 waiting-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_convert_to_takeaway') ?></div></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 right-bottom pay-close">
                <a href="#"><div class="mainsystembg collection-bg-color img-responsive"><?php echo $this->lang->line('gkpos_pay_and_close') ?></div></a>
            </div>
        </div>
    </div>
</section>
<?php echo $this->load->view('gkpos/orders/popups/servicecharge') ?>
<?php echo $this->load->view('gkpos/orders/popups/discount') ?>
<script>
    $(document).ready(function () {
        getcategory();
        loadCart('<?php echo $this->uri->segment(4) ?>')
        jQuery(".closeServiceChargePopup").click(function () {
            jQuery.colorbox.close();
            return false;
        });
    });

    function loadCart(order_id) {
        $.ajax({
            url: '<?php echo site_url("gkpos/orders/loadcart") ?>',
            data: {
                order_id: order_id
            },
            type: "POST",
            success: function (output) {
                jQuery.colorbox.close();
                $('#cartBody').html(output);
                $('.line').removeClass('highlighted');
                if ($('#FoodMaxLine').length > 0) {
                    setTimeout(function () {
                        $('#FoodMaxLine').removeClass('alert alert-success');
                    }, 1000);
                }
                if ($('#nonFoodMaxLine').length > 0) {
                    setTimeout(function () {
                        $('#nonFoodMaxLine').removeClass('alert alert-success');
                    }, 1000);
                }
                var windowScreenHeight = $(window).height();
                $('.menuselection .left-top, .menuselection .middle-top,.menuselection .right-top').css({"height": windowScreenHeight - (windowScreenHeight * 0.223) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
                $('.menuselection .order-menu-list').css({"height": windowScreenHeight - (windowScreenHeight * 0.44) + "px", "overflow-y": "auto", "overflow-x": "hidden"});
                $('.menuselection .left-bottom,.menuselection .middle-bottom,.menuselection .right-bottom').css({"height": windowScreenHeight - (windowScreenHeight * 0.887) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
                manageWindowHeight();
            }
        });
    }

    function addtocart(category, menu, sel) {
        var order_id = '<?php echo $this->uri->segment(4) ?>'
        $.ajax({
            url: '<?php echo site_url("gkpos/orders/addtocart") ?>',
            data: {
                order_id: order_id,
                category: category,
                menu: menu,
                sel: sel,
                quantity: 1
            },
            type: "POST",
            dataType: "json",
            success: function (output) {
                loadCart(output.order_id);
            }
        });
    }

    //load cart 
    function addtocart_old(category, menu, sel) {
        $.ajax({
            url: "<?php echo site_url('gkpos/orders/addtocart') ?>",
            data: {
                orderId: '<?php echo $this->uri->segment(4) ?>',
                category: category,
                menu: menu,
                sel: sel,
                quantity: 1
            },
            type: "POST",
            beforeSend: function () {

            },
            success: function (output) {
                $('#cartBody').html('');
                $('#cartBody').html(output);
                //remove highlighted css
            },
            complete: function (xhr, status) {
                console.log("The request is complete!");
            }
        });
    }
    function selectRow(line, orderId) {
        $('#selectedRow').val('');
        $('#orderId').val('');
        $('.line').removeClass('highlighted');
        $('.line-' + line).addClass('highlighted');
        $('#selectedRow').val(line);
        $('#orderId').val(orderId);
    }
    function changeQuantity(action) {
        var line = $('#selectedRow').val();
        var order_id = $('#orderId').val();
        if (!line || line == '') {
            alert('please select item row to increase first');
        } else {
            $.ajax({
                url: "<?php echo site_url('gkpos/orders/change_quantity/') ?>",
                data: {
                    line: parseInt(line),
                    action: action,
                    order_id: order_id,
                },
                type: "POST",
                beforeSend: function () {

                },
                success: function (output) {
                    $('#cartBody').html('');
                    $('#cartBody').append(output);
                    $('.line').removeClass('highlighted');
                    var selectedRow = $('#selectedRow').val();
                    $('.line-' + selectedRow).addClass('highlighted');
                    var windowScreenHeight = $(window).height();
                    $('.menuselection .left-top, .menuselection .middle-top,.menuselection .right-top').css({"height": windowScreenHeight - (windowScreenHeight * 0.223) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
                    $('.menuselection .order-menu-list').css({"height": windowScreenHeight - (windowScreenHeight * 0.44) + "px", "overflow-y": "auto", "overflow-x": "hidden"});
                    $('.menuselection .left-bottom,.menuselection .middle-bottom,.menuselection .right-bottom').css({"height": windowScreenHeight - (windowScreenHeight * 0.887) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
                    manageWindowHeight();
                },
                complete: function (xhr, status) {
                    console.log("The request is complete!");
                }

            });
        }
    }
    function submitCart(order_id) {
        if (order_id == null || order_id == '') {
            alert('Please put some item on the cart');
        } else {
            $.confirm({
                'title': 'Order completion warning!!!',
                'message': 'Are you sure that your item insertion on cart is completed? <br/> Continue proceed? Click Yes',
                'buttons': {
                    'Yes': {
                        'class': 'btn btn-success',
                        'action': function () {
                            sendCart(order_id);
                        }
                    },
                    'No': {
                        'class': 'btn btn-danger',
                        'action': function () {}	// Nothing to do in this case. You can as well omit the action property.
                    }
                }
            });
        }
    }
    function sendCart(order_id) {
        $.ajax({
            url: "<?php echo site_url('gkpos/orders/sendcart/') ?>",
            data: {
                order_id: parseInt(order_id)
            },
            type: "POST",
            beforeSend: function () {

            },
            success: function (output) {
                var obj = $.parseJSON(output);
                if (obj.success == true) {
                    alert(obj.message);
                    getBaseAjaxPage('<?php echo site_url('gkpos/indexajax') ?>', 'mainboard');
                } else {
                    alert(obj.message);
                }
            }
        });
    }
</script>