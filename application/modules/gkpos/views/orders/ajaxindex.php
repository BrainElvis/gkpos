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
                    <a href="javascript:void(0)" onclick="addDiscount('<?php echo $this->uri->segment(4) ?>','<?php echo get_order_type($this->uri->segment(4))?>')"><div class="mainsystembg2 collection-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_promo_discount') ?></div></a>
                    <a href="javascript:void(0)" onclick="addServiceCharge('<?php echo $this->uri->segment(4) ?>','<?php echo get_order_type($this->uri->segment(4))?>')"><div class="mainsystembg2 collection-bg-color img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $this->lang->line('gkpos_add_service_charge') ?></div></a>
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
        //load default category sidebar 
        getcategory();
        $.ajax({
            url: "<?php echo site_url('gkpos/orders/ajaxcart/' . $this->uri->segment(4)) ?>",
            success: function (output) {
                $('#cartBody').html('');
                $('#cartBody').append(output);
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
        jQuery(".closeServiceChargePopup").click(function () {
            jQuery.colorbox.close();
            return false;
        });
    });
    //load menu category Left sidebar 
    function getcategory(pageBtn = '') {
        var firstCatOrder = $("#firstCatOrder").val();
        var lastCatOrder = $("#lastCatOrder").val();
        $.ajax({
            url: "<?php echo site_url('gkpos/orders/getcategory') ?>",
            data: {
                firstCatOrder: firstCatOrder,
                lastCatOrder: lastCatOrder,
                pageBtn: pageBtn,
            },
            type: "POST",
            dataType: "json",
            success: function (output) {
                if (true === output.status) {
                    $('#categoryList > .category-list').html('');
                    var objectLength = output.categories.length;
                    var firstObject = output.categories[0];
                    var lastObject = output.categories[objectLength - 1];
                    $("#firstCatOrder").val(firstObject.order);
                    $("#lastCatOrder").val(lastObject.order);
                    var index = 1;
                    var btnColorClass;
                    $.each(output.categories, function () {
                        if (index == 1) {
                            btnColorClass = "item-btn item-btn-1 ";
                        } else if (index == 2) {
                            btnColorClass = "item-btn item-btn-2 ";
                        } else if (index == 3) {
                            btnColorClass = "item-btn item-btn-3 ";
                        } else if (index == 4) {
                            btnColorClass = "item-btn item-btn-4 ";
                        } else if (index == 5) {
                            btnColorClass = "item-btn item-btn-5 ";
                        } else if (index == 6) {
                            btnColorClass = "item-btn item-btn-6 ";
                        } else if (index == 7) {
                            btnColorClass = "item-btn item-btn-7 ";
                        } else if (index == 8) {
                            btnColorClass = "item-btn item-btn-8 ";
                        } else if (index == 9) {
                            btnColorClass = "item-btn item-btn-9 ";
                        } else if (index == 10) {
                            btnColorClass = "item-btn item-btn-10 ";
                        } else if (index == 11) {
                            btnColorClass = "item-btn item-btn-11 ";
                        } else if (index == 12) {
                            btnColorClass = "item-btn item-btn-12 ";
                        } else if (index == 13) {
                            btnColorClass = "item-btn item-btn-13 ";
                        } else if (index == 14) {
                            btnColorClass = "item-btn item-btn-14 ";
                        } else if (index == 14) {
                            btnColorClass = "item-btn item-btn-15 ";
                        } else if (index % 2 == 0) {
                            btnColorClass = "btn-devide-by-two ";
                        } else if (index % 3 == 0 && index % 2 != 0) {
                            btnColorClass = "btn-devide-by-three ";
                        } else if (index % 7 == 0 && index % 2 != 0 && index % 3 != 0) {
                            btnColorClass = "btn-devide-by-seven ";
                        } else if (index % 5 == 0 && index % 2 != 0 && index % 3 != 0 && index % 4 != 0) {
                            btnColorClass = "btn-devide-by-five ";
                        } else {
                            btnColorClass = "btn-devide-by-one ";
                        }
                        $('#categoryList > .category-list').append('<div id="category_' + this.id + '" class="' + btnColorClass + 'btn btn-block btn-primary text-uppercase" data-order="' + this.order + '" title="' + this.content + '" onclick=getMenuByCategory("' + this.id + '","")>' + this.title + '</div>');
                        index++;
                    });
                    var windowScreenHeight = $(window).height();
                    $('.menuselection .left-top, .menuselection .middle-top,.menuselection .right-top').css({"height": windowScreenHeight - (windowScreenHeight * 0.223) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
                    $('.menuselection .order-menu-list').css({"height": windowScreenHeight - (windowScreenHeight * 0.44) + "px", "overflow-y": "auto", "overflow-x": "hidden"});
                    $('.menuselection .left-bottom,.menuselection .middle-bottom,.menuselection .right-bottom').css({"height": windowScreenHeight - (windowScreenHeight * 0.887) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
                    manageWindowHeight();
                } else {
                    jQuery("#warningPopupHeader").text("<?php echo $this->lang->line('gkpos_category_not_found') ?>");
                    jQuery("#warningPopupContent").text("<?php echo $this->lang->line('gkpos_category_not_found_desc') ?>");
                    jQuery(".warningPopup").colorbox({
                        inline: true,
                        slideshow: false,
                        scrolling: false,
                        height: "250px",
                        open: true,
                        width: '100%',
                        maxWidth: '400px'
                    });
                }
            },
            error: function (xhr, status, errorThrown) {
                console.log("Sorry, there was a problem!");
            },
            complete: function (xhr, status) {
                console.log("The request is complete!");
            }
        });
    }

//load menus of a category 
    function getMenuByCategory(category, pageBtn) {
        var categoryOrder = $('#category_' + category).attr('data-order');
        var btnColorClass = "item-btn item-btn-" + categoryOrder + " ";
        var categoryTitle = $('#category_' + category).text();
        $(".menuPrevBtn").attr('id', category);
        $(".menuNextBtn").attr('id', category);
        var menuFirstOrder = '0';
        var menuLastOrder = '0';
        var menuNextBtnCounter = '0';
        var menuPrevBtnCounter = '0';
        if (pageBtn == '') {
            $("#menuFirstOrder").val('0');
            $("#menuLastOrder").val('0');
            $("#menuNextBtnCounter").val("0");
            $("#menuPrevBtnCounter").val("0");
        } else {
            if (pageBtn == 'menuNextBtn') {
                menuNextBtnCounter = parseInt($("#menuNextBtnCounter").val()) + 1;
                $("#menuNextBtnCounter").val(menuNextBtnCounter);
                menuPrevBtnCounter = parseInt($("#menuPrevBtnCounter").val());
                if (menuPrevBtnCounter > 0) {
                    $("#menuPrevBtnCounter").val(menuPrevBtnCounter - 1);
                }

            }
            if (pageBtn == 'menuPrevBtn') {
                menuPrevBtnCounter = parseInt($("#menuPrevBtnCounter").val()) + 1;
                $("#menuPrevBtnCounter").val(menuPrevBtnCounter);
                menuNextBtnCounter = parseInt($("#menuNextBtnCounter").val());
                if (menuNextBtnCounter > 0) {
                    $("#menuNextBtnCounter").val(menuNextBtnCounter - 1);
                }
            }
            menuFirstOrder = $("#menuFirstOrder").val();
            menuLastOrder = $("#menuLastOrder").val();
        }
        $.ajax({
            url: "<?php echo site_url('gkpos/orders/getmenuorder') ?>",
            data: {
                category: category,
                pageBtn: pageBtn,
                menuFirstOrder: menuFirstOrder,
                menuLastOrder: menuLastOrder,
                menuNextBtnCounter: menuNextBtnCounter,
                menuPrevBtnCounter: menuPrevBtnCounter
            },
            type: "POST",
            dataType: "json",
            success: function (output) {
                if (true == output.status) {
                    var objectLength = output.menus.length;
                    if (objectLength > 0) {
                        getmenus(category, pageBtn, menuFirstOrder, menuLastOrder, btnColorClass, menuNextBtnCounter, menuPrevBtnCounter);
                    }
                } else {
                    $("#menuNextBtnCounter").val("0");
                    $("#menuPrevBtnCounter").val("0");
                    $('#categoryTitle').html('');
                    $('#categoryTitle').append(' <p class="sidebar-heading text-uppercase">' + categoryTitle + '</p>');
                    $('#menuListArea').html('');
                    $('#categoryDescription').html('');
                    $('#categoryDescription').append('<p class="' + btnColorClass + 'info text-uppercase"><?php echo $this->lang->line("gkpos_menu_not_found"); ?></p>');
                }
                var windowScreenHeight = $(window).height();
                $('.menuselection .left-top, .menuselection .middle-top,.menuselection .right-top').css({"height": windowScreenHeight - (windowScreenHeight * 0.223) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
                $('.menuselection .order-menu-list').css({"height": windowScreenHeight - (windowScreenHeight * 0.44) + "px", "overflow-y": "auto", "overflow-x": "hidden"});
                $('.menuselection .left-bottom,.menuselection .middle-bottom,.menuselection .right-bottom').css({"height": windowScreenHeight - (windowScreenHeight * 0.887) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
                manageWindowHeight();
            }
        });
    }
    function getmenus(category, pageBtn, menuFirstOrder, menuLastOrder, btnColorClass, menuNextBtnCounter, menuPrevBtnCounter) {
        $.ajax({
            url: "<?php echo site_url('gkpos/orders/get_menus_by_category') ?>",
            data: {
                category: category,
                menuFirstOrder: menuFirstOrder,
                menuLastOrder: menuLastOrder,
                pageBtn: pageBtn,
                menuNextBtnCounter: menuNextBtnCounter,
                menuPrevBtnCounter: menuPrevBtnCounter
            },
            type: "POST",
            dataType: "json",
            success: function (output) {
                if (true === output.status) {
                    var objectLength = output.menus.length;
                    if (objectLength > 0) {
                        var firstObject = output.menus[0];
                        var lastObject = output.menus[objectLength - 1];
                        menuFirstOrder = firstObject.order;
                        $("#menuFirstOrder").val(menuFirstOrder);
                        menuLastOrder = lastObject.order;
                        $("#menuLastOrder").val(menuLastOrder);
                        var menuIndex = 1;
                        $('#menuListArea').html('');
                        $.each(output.menus, function () {
                            if (menuIndex == 1) {
                                $('#categoryTitle').html('');
                                $('#categoryDescription').html('');
                                $('#categoryTitle').append(' <p class="sidebar-heading text-uppercase">' + this.categoryTitle + '</p>');
                                var description = this.categoryContent;
                                if (description) {
                                    $('#categoryDescription').append(' <p class="' + btnColorClass + 'info text-uppercase">' + this.categoryContent + '</p>');
                                }
                            }
                            $('#menuListArea').append('<div id="' + this.categoryId + "_" + this.id + '" class="' + btnColorClass + 'col-lg-4 col-md-4 col-sm-4 col-xs-4 menu-item text-center text-uppercase" title="' + this.content + '" onclick=checkSelection(\'' + this.categoryId + '\',\'' + this.id + '\',\'' + false + '\')>' + this.title + '<br/><span class="price-tag">TB-' + getPrice(this.base_price) + ' IN-' + getPrice(this.in_price) + ' OUT-' + getPrice(this.out_price) + '<span></div>');
                            menuIndex++;
                        });
                    }
                }
                var windowScreenHeight = $(window).height();
                $('.menuselection .left-top, .menuselection .middle-top,.menuselection .right-top').css({"height": windowScreenHeight - (windowScreenHeight * 0.223) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
                $('.menuselection .order-menu-list').css({"height": windowScreenHeight - (windowScreenHeight * 0.44) + "px", "overflow-y": "auto", "overflow-x": "hidden"});
                $('.menuselection .left-bottom,.menuselection .middle-bottom,.menuselection .right-bottom').css({"height": windowScreenHeight - (windowScreenHeight * 0.887) + "px", "overflow-y": "scroll", "overflow-x": "hidden"});
                manageWindowHeight();
            },
            error: function (xhr, status, errorThrown) {
                console.log("Sorry, there was a problem!");
            },
            complete: function (xhr, status) {
                console.log("The request is complete!");
            }
        });
    }
    function checkSelection(category, menu, sel) {
        var menuTitle = $("#" + category + "_" + menu).text();
        $.ajax({
            url: "<?php echo site_url('gkpos/orders/getmenuselection') ?>",
            data: {
                category: category,
                menu: menu
            },
            type: "POST",
            dataType: "json",
            success: function (output) {
                if (true == output.status) {
                    $('#warningPopupContent').html('');
                    $.each(output.selections, function () {
                        var btnColorClass = "item-btn item-btn-" + this.selMenuCategoryId + " ";
                        $('#warningPopupContent').append('<div id="' + this.selMenuCategoryId + "_" + this.selMenuId + "_" + this.id + '" class="' + btnColorClass + 'col-lg-4 col-md-4 col-sm-4 col-xs-4 menu-item text-center text-uppercase" title="' + this.content + '" onclick=addtocart(\'' + this.selMenuCategoryId + '\',\'' + this.selMenuId + '\',\'' + this.id + '\')>' + this.title + '<br/><span class="price-tag">TB-' + getPrice(this.base_price) + ' IN-' + getPrice(this.in_price) + ' OUT-' + getPrice(this.out_price) + '<span></div>');
                    });
                    jQuery("#warningPopupHeader").text(menuTitle + ' ' + "<?php echo $this->lang->line('gkpos_selection') ?>");
                    jQuery(".warningPopup").colorbox({
                        inline: true,
                        slideshow: false,
                        scrolling: false,
                        height: "300px",
                        className: 'menu-selection-popup',
                        open: true,
                        width: '100%',
                        maxWidth: '550px'
                    });
                } else {
                    addtocart(category, menu, 'no');
                }
            },
            error: function (xhr, status, errorThrown) {
                console.log("Sorry, there was a problem!");
            },
            complete: function (xhr, status) {
                console.log("The request is complete!");
            }
        });
    }
    function getPrice(price) {
        var currencySymbol = '<?php echo $this->config->item("currency_symbol") ?>';
        return currencySymbol + price;

    }
    //load cart 
    function addtocart(category, menu, sel) {
        jQuery.colorbox.close();
        console.log(category + "-" + menu + "-" + sel);
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
                $('#cartBody').append(output);
                //remove highlighted css
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