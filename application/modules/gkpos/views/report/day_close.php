<a class='DayClose' href="#DayClose" style="display:none"></a>
<div style="display:none">
    <div id="DayClose" class="popupouter">
        <div class="popup-header row">
            <div id="DayClosePopupHeader" class="warningPopupHeader col-lg-10 col-md-10 col-sm-10 col-xs-10 pull-left text-uppercase"><?php echo $this->lang->line('gkpos_close_the_day') ?></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-left closeServiceChargePopup text-center times">&times;</div>
        </div>
        <div class="popup-body row">
            <div id="DayClosePopupContent" class="warningPopupContent col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php echo form_open('gkpos/report/closeday', array('id' => 'custom_closeday_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
                <fieldset>
                    <div class="form-group form-group-sm">	
                        <?php echo form_label($this->lang->line('gkpos_close_date'), 'closing_date', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group">
                                <span class="input-group-addon"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i></a></span>
                                <input name="closing_date" class="form-control required"  type="text" id="closing_date" value="<?php isset($end_date) ? print $end_date : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group form-group-md">	
                        <div class="col-md-offset-4 col-md-8">
                            <ul id="custom_closeday_form_error_message_box" class="error_message_box"></ul>
                            <div class="clearfix"></div>
                            <input class="form-submit-button mainsystembg2 waiting-bg img-responsive delivery-info-submit-btn" type="submit" name="submit_form" value="<?php echo $this->lang->line('gkpos_numpad_key_enter') ?>" onclick="dayClose()">
                        </div>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#closing_date").datepicker({
            dateFormat: "dd/mm/yy",
        });
    });
    function dayClose() {
        $('#custom_closeday_form').validate({
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    success: function (response) {
                        if (true == response.success) {
                            $('#custom_closeday_form_error_message_box').hide();
                            jQuery.colorbox.close();
                            getSettingPage('<?php echo site_url("gkpos/report/index") ?>', 'View Transaction');
                        } else {
                            $('#custom_closeday_form_error_message_box').html('<li>' + response.message + '</li>');
                            $('#custom_closeday_form_error_message_box').show();
                        }

                    },
                    dataType: 'json'
                });
            },
            errorClass: "has-error",
            errorLabelContainer: "#custom_closeday_form_error_message_box",
            wrapper: "li",
            highlight: function (e) {
                $(e).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (e) {
                $(e).closest('.form-group').removeClass('has-error');
            },
            rules:
                    {
                        closing_date: "required"
                    },
            messages:
                    {
                        closing_date: "<?php echo "Closing Date is required"; ?>",
                    }
        });
    }
</script>