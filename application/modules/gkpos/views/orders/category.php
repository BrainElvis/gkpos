<div id="categoryList">
    <div class="category-list"></div>
</div>
<script>
    $(document).ready(function () {
        getcategory();
    });
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


</script>