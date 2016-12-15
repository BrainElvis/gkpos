<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 right-item">
    <div class="paginationbg">
        <ul>
            <li><a href="javascript:void(0)"  onclick="previousPage()"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/prevbg.png" width="89" height="69" /></a></li>
            <li><a href="javascript:void(0)"  onclick="nextPage()"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/nextbg.png" width="89" height="69" /></a></li>
        </ul>
        <div class="center-div extra-bg">
            <h2><a href="#"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/callersbg.png" width="192" height="73" class="img-responsive center-block"/></a></h2>
            <div class="callnumbg">
                <p><?php echo $this->lang->line('gkpos_customer') ?>&nbsp; <?php echo $this->lang->line('gkpos_name') ?></p>
                <div class="input-group">
                    <?php if ($this->config->item('is_touch') == 'disable'): ?>
                        <input class="customernambg" type="text" name="caller_name" id="caller_name"  placeholder="Caller Name" />
                    <?php else: ?>
                        <input class="customernambg" type="text" name="caller_name" id="caller_name" onfocus="myJqueryKeyboard('caller_name')" placeholder="Caller Name" />
                    <?php endif ?>
                   
                </div>
            </div>
            <div class="callnumbg">
                <p><?php echo$this->lang->line('gkpos_phone') ?>&nbsp;<?php echo $this->lang->line('gkpos_number') ?> </p>
                <div class="input-group">
                    <?php if ($this->config->item('is_touch') == 'disable'): ?>
                        <input class="customernambg" type="text" name="caller_phone" id="caller_phone" placeholder="Caller Phone number"/>
                    <?php else: ?>
                        <input class="customernambg" type="text" name="caller_phone" id="caller_phone" onfocus="myJqueryKeyboard('caller_phone')" placeholder="Caller Phone number"/>
                    <?php endif ?>
                    <span class="input-group-addon" style="background-color: #FF0000;" data-toggle="caller-phone-tooltip" data-placement="top"  title="<?php echo $this->lang->line('gkpos_click_to_get_caller_name') ?>"><a href="javascript:void(0)" onclick="searchCaller('phone')"><i class="fa fa-search" aria-hidden="true"></i></a></span>
                </div>
            </div>
            <div class="callnumbg">
                <p><?php echo $this->lang->line('gkpos_order_type') ?></p>
                <?php if ($this->config->item('is_touch') == 'disable'): ?>
                    <input class="customernambg" type="text" name="caller_order_type" id="caller_order_type" placeholder="<?php echo $this->lang->line('gkpos_order_type_hints') ?>"/>
                <?php else: ?>
                    <input class="customernambg" type="text" name="caller_order_type" id="caller_order_type" onfocus="myJqueryKeyboard('caller_order_type')" placeholder="<?php echo $this->lang->line('gkpos_order_type_hints_touch_screen') ?>"/>
                <?php endif ?>
            </div>
            <a href="javascript:void(0)" onclick="checkCallerInfo()"><div class="mainsystembg delivery-bg img-responsive caller-info-submit"><?php echo $this->lang->line('gkpos_finished') ?></div></a>
        </div>

        <div class="bottom-right mainboard-rihgt-sideber-bottom">
            <div class="page-exit-button text-uppercase text-center">
                <a href="javascript:void(0)" onclick="pageExit()"><i class="fa fa-power-off"></i>&nbsp;&nbsp;<?php echo $this->lang->line('gkpos_exit') ?></a>
            </div>
            <a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/takeaway') ?>', 'false')"  id="takeaway"><div class="mainsystembg collection-bg img-responsive"><?php echo $this->lang->line('gkpos_takeaway') ?></div></a>
            <a href="#"><div class="mainsystembg2 img-responsive waiting-bg"><?php echo $this->lang->line('gkpos_bar_service') ?></div></a>
            <a href="javascript:void(0)" onclick="getPage('<?php echo site_url('gkpos/table') ?>', 'table')"  id="takeaway"><div class="mainsystembg waiting-bg img-responsive"><?php echo $this->lang->line('gkpos_new_table') ?></div></a>
            <!--<a href="<?php echo site_url('gkpos/newtableguest') ?>"><div class="mainsystembg2 img-responsive"><?php echo $this->lang->line('gkpos_new_guest_table') ?></div></a>-->
            <a href="#"><div class="mainsystembg img-responsive collection-bg"><?php echo $this->lang->line('gkpos_logoff') ?></div></a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#caller_name").autocomplete({
            delay: 0,
            source: '<?php echo site_url('gkpos/get_customer') ?>',
            minLength: 2
        });
        $('[data-toggle="caller-phone-tooltip"]').tooltip();
        $("#caller_name").val('');
        $("#caller_phone").val('');
        $("#caller_order_type").val('');
    });
    function checkCallerInfo() {
        var callerName = $("#caller_name").val();
        var callerPhone = $("#caller_phone").val();
        var CallerOrderType = $("#caller_order_type").val();
        if (callerPhone === '' || callerPhone === null) {
            jQuery("#warningPopupHeader").text("<?php echo $this->lang->line('gkpos_caller_information_error') ?>");
            jQuery("#warningPopupContent").text("<?php echo $this->lang->line('gkpos_caller_phone_error') ?>");
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
        } else if (CallerOrderType === '' || CallerOrderType === null) {
            jQuery("#warningPopupHeader").text("<?php echo $this->lang->line('gkpos_caller_information_error') ?>");
            jQuery("#warningPopupContent").text("<?php echo $this->lang->line('gkpos_caller_order_type_error') ?>");
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
            if (CallerOrderType == 'collection' || CallerOrderType == 'delivery' || CallerOrderType == 'waiting' || CallerOrderType == 'table') {
                $("#caller_name").val('');
                $("#caller_phone").val('');
                $("#caller_order_type").val('');
                getPage(base_url + "gkpos/" + CallerOrderType.toLowerCase(), [callerName, callerPhone, CallerOrderType, "yes"]);
            } else {
                jQuery("#warningPopupHeader").text("<?php echo $this->lang->line('gkpos_caller_information_error') ?>");
                jQuery("#warningPopupContent").text("<?php echo $this->lang->line('gkpos_caller_order_type_error') ?>");
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

        }
    }
    function searchCaller(key) {
        var value = $('#caller_' + key).val();
        if (value === '') {
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
                        $("#caller_phone").val(customer.phone);
                        $("#caller_name").val(customer.name);
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
            getPage(base_url + "gkpos/waiting", "false");
        } else if (currentPage == 'waiting') {
            getPage(base_url + "gkpos/collection", "false");
        } else if (currentPage == 'collection') {
            getPage(base_url + "gkpos/delivery", "false");
        } else if (currentPage == 'delivery') {
            getPage(base_url + "gkpos/takeaway", "false");
        } else {
            window.location.reload();
        }
    }
    function nextPage() {
        var currentPage = $("#currentPage").val();
        if (currentPage == 'takeaway') {
            getPage(base_url + "gkpos/delivery", "false");
        } else if (currentPage == 'delivery') {
            getPage(base_url + "gkpos/collection", "false");
        } else if (currentPage == 'collection') {
            getPage(base_url + "gkpos/waiting", "false");
        } else if (currentPage == 'waiting') {
            getPage(base_url + "gkpos/table", "false");
        } else if (currentPage == 'table') {
            getPage(base_url + "gkpos/takeaway", "false");
        } else {
            window.location.reload();
        }

    }

</script>
