<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bodyitem">
    <input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
    <div class="row">
        <?php echo form_open('gkpos/settings/save_spacial/', array('id' => 'special_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
        <div id="config_wrapper">
            <fieldset id="config_info">
                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_voucher_title'), 'gk_name', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-table" aria-hidden="true"></i></a></span>
                            <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                <input name="title" class="form-control required"  type="text" id="title" value="<?php isset($title) ? print $title : print'' ?>">
                            <?php else: ?>
                                <input name="title" class="form-control required"  type="text" id="title" onfocus="myJqueryKeyboard('title')" value="<?php isset($title) ? print $title : print'' ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group form-group-md">	
                    <div class="col-md-offset-4 col-md-8">
                        <ul id="promotion_error_message_box" class="error_message_box"></ul>
                        <?php
                        echo form_submit(array(
                            'name' => 'submit_form',
                            'id' => 'submit_form',
                            'value' => $this->lang->line('gkpos_numpad_key_enter'),
                            'class' => 'form-submit-button mainsystembg2 waiting-bg img-responsive delivery-info-submit-btn'));
                        ?>
                    </div>
                </div>
            </fieldset>
        </div>
        <?php echo form_close(); ?>
        <script type='text/javascript'>
            //validation and submit handling
            $(document).ready(function ()
            {
                $('#special_form').validate({
                    submitHandler: function (form) {
                        $(form).ajaxSubmit({
                            success: function (response) {
                                if (response.success)
                                {
                                    getSettingPage('<?php echo site_url('gkpos/settings/special') ?>', 'Special');
                                } else
                                {
                                    set_feedback(response.message, 'alert alert-dismissible alert-danger', false);
                                }
                            },
                            dataType: 'json'
                        });
                    },
                    errorClass: "has-error",
                    errorLabelContainer: "#promotion_error_message_box",
                    wrapper: "li",
                    highlight: function (e) {
                        $(e).closest('.form-group').addClass('has-error');
                    },
                    unhighlight: function (e) {
                        $(e).closest('.form-group').removeClass('has-error');
                    },
                    rules:
                            {
                                title: "required"
                            },
                    messages:
                            {
                                title: "<?php echo $this->lang->line('gkpos_special_required'); ?>",
                            }
                });
            });
        </script>
    </div>
    <div class="row voucher-list" style="margin: 10px">
        <div class="modal-header">
            <div class="page-title col-md-12"><?php echo $this->lang->line('gkpos_system_spacial') ?></div>
        </div>
        <div class="clearfix"></div>
        <table class="table table-responsive table-bordered fieldset">
            <tr>
                <th class="text-center text-uppercase"><?php echo $this->lang->line('gkpos_system_spacial_title') ?></th> 
                <th class="text-center text-uppercase"><?php echo $this->lang->line('gkpos_status') ?></th> 
                <th class="text-center text-uppercase"><?php echo $this->lang->line('gkpos_action') ?></th> 
            </tr>
            <?php if (!empty($voucher_list)): ?>
                <?php foreach ($voucher_list as $voucher): ?> 
                    <tr>
                        <td class="text-center"><?php echo $voucher->title ?></td> 
                        <td class="text-center"><?php $voucher->status == 1 ? print "Active" : print "Inactive" ?></td> 
                        <td class="text-center">
                            <a href='javascript:void(0)' onclick="updateSpecial('<?php echo $voucher->id ?>', '<?php echo site_url('gkpos/settings/update_special') ?>', '<?php $voucher->status == 1 ? print'deactivate' : print 'activate' ?>')"><?php $voucher->status == 1 ? print'Deactivate' : print 'Activate' ?> </a>
                            |
                            <a href='javascript:void(0)' onclick="updateSpecial('<?php echo $voucher->id ?>', '<?php echo site_url('gkpos/settings/update_special') ?>', 'delete')">Delete</a> 
                        </td> 
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No Special modifier found</td> 
                </tr>
            <?php endif; ?>
        </table>                        
    </div>
</div>

<script>
    function updateSpecial(voucher_id, url, action) {
        $.ajax({
            url: url,
            data: {
                id: voucher_id,
                action: action
            },
            dataType: 'json',
            type: "POST",
            success: function (output) {
                if (output.success) {
                    getSettingPage('<?php echo site_url("gkpos/settings/special") ?>', 'Special');
                } else {
                    set_feedback(output.message, 'alert alert-dismissible alert-danger', false);
                }

            },
        });
    }
</script>