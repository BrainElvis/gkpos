<footer id="gkposFooter">
    <div class="container-fluid">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  pull-left text-left back"><span class="back-button" onclick="previousPage()">PREV</span></div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><p class="text-center"><a href="http://gksoft.co.uk"><?php echo $this->lang->line('gkpos_powered_by') ?>:<img src="<?php echo ASSETS_GKPOS_PATH ?>images/gk-logo.png" width="98" height="47" /></a></p></div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-right text-right back"><span class="next-button" onclick="nextPage()">NEXT</span></div>
    </div>
</footer>
<a class='warningPopup' href="#warningPopup" style="display:none"></a>
<div style="display:none">
    <div id="warningPopup" class="popupouter">
        <div class="popup-header row">
            <div id="warningPopupHeader" class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pull-left "></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-left closeWarningPopup text-center times">&times;</div>
        </div>
        <div class="popup-body row">
            <div id="warningPopupContent" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
        </div>
        <div class="popup-footer row">
            <a href="javascript:void(0)" class="closeWarningPopup text-center btn btn-default col-md-offset-5 col-md-2 col-md-offset-5"><?php echo $this->lang->line('gkpos_close') ?></a>
        </div>
    </div>
</div>
<style>
    #cboxClose{
        display: none;
    }
</style>
<script>
    jQuery(document).ready(function () {
        jQuery(".closeWarningPopup").click(function () {
            jQuery.colorbox.close();
            return false;
        });
        $("#name").autocomplete({
            delay: 0,
            source: '<?php echo site_url('gkpos/get_customer') ?>',
            minLength: 2
        });
        $("#phone").autocomplete({
            delay: 0,
            source: '<?php echo site_url('gkpos/get_customer_phone') ?>',
            minLength: 6
        });
        manageWindowHeight();
    });
    function pageExit(returnUrl, info) {
        var currentPage = $("#currentPage").val();
        console.log(currentPage);
        $.confirm({
            'title': currentPage == 'orders' ? 'Order Page Exiting Warning' : 'Current Page Exiting Warning',
            'message': currentPage == 'orders' ? 'Are you sure want to leave this page? Unsave data may be lost.<br/>Still Continue proceed? Click Yes' : 'Are you sure want to leave this Page? <br/> Continue proceed? Click Yes',
            'buttons': {
                'Yes': {
                    'class': 'btn btn-success',
                    'action': function () {
                        getBaseAjaxPage(returnUrl, info);
                    }
                },
                'No': {
                    'class': 'btn btn-danger',
                    'action': function () {}	// Nothing to do in this case. You can as well omit the action property.
                }
            }
        });
    }
    function searchCustomerByKey(key) {
        var value = $('#' + key).val();
        if (value == '') {
            jQuery("#warningPopupHeader").text("<?php echo $this->lang->line('gkpos_caller_information_error') ?>");
            jQuery("#warningPopupContent").text("<?php echo $this->lang->line('gkpos_caller_field_alert') . ' ' ?>" + key);
            jQuery(".warningPopup").colorbox({
                inline: true,
                slideshow: false,
                scrolling: false,
                height: "250px",
                open: true,
                width: '100%',
                maxWidth: '400px'
            });
            return false;
        } else {
            $.ajax({
                url: "<?php echo site_url('gkpos/search_customer') ?>",
                type: "POST",
                data: {
                    key: key,
                    value: value
                },
                success: function (output) {
                    var obj = $.parseJSON(output);
                    if (true == obj.status) {
                        var customer = obj.customer;
                        $("#phone").val(customer.phone);
                        $("#name").val(customer.name);
                        if ($("#postcode").length > 0) {
                            $("#floor_or_apt").val(customer.floor_or_apt);
                            $("#building").val(customer.building);
                            $("#house").val(customer.house);
                            $("#street").val(customer.street);
                            $("#postcode").val(customer.postcode);
                        }
                    } else {
                        jQuery("#warningPopupHeader").text("<?php echo $this->lang->line('gkpos_invalid_customer') ?>");
                        jQuery("#warningPopupContent").text("<?php echo $this->lang->line('gkpos_customer_not_found') . ' ' ?>" + key + "=>" + value);
                        jQuery(".warningPopup").colorbox({
                            inline: true,
                            slideshow: false,
                            scrolling: false,
                            height: "250px",
                            open: true,
                            width: '100%',
                            maxWidth: '400px'
                        });
                        return false;
                    }

                },
                complete: function (xhr, status) {
                    console.log("The request is complete!");
                }
            });
        }
    }
    function previousPage() {
        var currentPage = $("#currentPage").val();

        if (currentPage == 'table') {
            getPage(base_url + "gkpos/waiting", "Wating");
        } else if (currentPage == 'waiting') {
            getPage(base_url + "gkpos/collection", "collection");
        } else if (currentPage == 'collection') {
            getPage(base_url + "gkpos/delivery", "delivery");
        } else if (currentPage == 'delivery') {
            getPage(base_url + "gkpos/takeaway", "takeaway");
        } else if (currentPage == 'waiting_order') {
            getPage(base_url + "gkpos/collection_order", "collection");
        } else if (currentPage == 'collection_order') {
            getPage(base_url + "gkpos/delivery_order", "delivery");
        } else if (currentPage == 'delivery_order') {
            getPage(base_url + "gkpos/table_waiting_payment", "table");
        } else if (currentPage == 'table_waiting_payment') {
            getPage(base_url + "gkpos/table_seated_ordered", "table");
        } else if (currentPage == 'table_seated_ordered') {
            getPage(base_url + "gkpos/table_seated_not_ordered", "table");
        } else {
            getPage(base_url + "gkpos/indexajaxccontent", "mainboard");
        }
    }
    function nextPage() {
        var currentPage = $("#currentPage").val();
        if (currentPage == 'takeaway') {
            getPage(base_url + "gkpos/delivery", "delivery");
        } else if (currentPage == 'delivery') {
            getPage(base_url + "gkpos/collection", "collection");
        } else if (currentPage == 'collection') {
            getPage(base_url + "gkpos/waiting", "waiting");
        } else if (currentPage == 'waiting') {
            getPage(base_url + "gkpos/table", "table");
        } else if (currentPage == 'table') {
            getPage(base_url + "gkpos/takeaway", "takeaway");
        } else if (currentPage == 'table_seated_not_ordered') {
            getPage(base_url + "gkpos/table_seated_ordered", "table");
        } else if (currentPage == 'table_seated_ordered') {
            getPage(base_url + "gkpos/table_waiting_payment", "table");
        } else if (currentPage == 'table_waiting_payment') {
            getPage(base_url + "gkpos/delivery_order", "delivery");
        } else if (currentPage == 'delivery_order') {
            getPage(base_url + "gkpos/collection_order", "collection");
        } else if (currentPage == 'collection_order') {
            getPage(base_url + "gkpos/waiting_order", "waiting");
        } else if (currentPage == 'waiting_order') {
            getPage(base_url + "gkpos/indexajaxccontent", "mainboard");
        } else {
            getPage(base_url + "gkpos/indexajaxccontent", "mainboard");
        }

    }
</script>