<div class="order-menu-list">
    <?php if (1 == 2): ?>
        <div class="menu guest-table">
            <div class="iteammenubg">
                <h2><?php echo $this->lang->line('gkpos_table_information') ?></h2>
                <table>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_table_number') ?></td>
                        <td>01</td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_table_guest_quantity') ?></td>
                        <td>02</td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_table_guest_seated_time') ?></td>
                        <td>02.50 PM</td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_table_first_order_taken') ?></td>
                        <td><?php echo $this->lang->line('gkpos_n_a') ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('gkpos_table_last_order_taken') ?></td>
                        <td><?php echo $this->lang->line('gkpos_n_a') ?></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endif; ?>
    <div class="menupage-category-info">
        <div id="categoryTitle"><p class="sidebar-heading text-uppercase"><?php echo $this->lang->line('gkpos_click_category_mesage') ?></p></div>
        <div id="categoryDescription"></div>
    </div>
    <div id="menuListArea"></div>
</div>
<script>

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
    $(document).ready(function () {
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
    });

    function getPrice(price) {
        var currencySymbol = '<?php echo $this->config->item("currency_symbol") ?>';
        return currencySymbol + price;

    }

</script>