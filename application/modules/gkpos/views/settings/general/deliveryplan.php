<input type="hidden" id="currentPage" value="<?php (isset($current_page) && ($current_page != '' || $current_page != null )) ? print $current_page : print'false' ?>">
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bodyitem">
    <div class="row" style="margin: 0px 5px 0 5px;">
        <div class="deliverybg col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="javascript:void(0)" onclick="getSettingPage('<?php echo site_url('gkpos/settings/general') ?>', 'general - info')"  ><h2 style="font-size: 11px"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/deliveryicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_general_info') ?></h2></a>
        </div>
        <div class="collectionbg col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="javascript:void(0)" onclick="getSettingPage('<?php echo site_url('gkpos/settings/vatsetup') ?>', 'general - vatsetup')" ><h2 style="font-size: 11px"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/collectionicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_general_vat_setup') ?></h2></a>
        </div>
        <div class="waitingbg col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="javascript:void(0)" onclick="getSettingPage('<?php echo site_url('gkpos/settings/discountsetup') ?>', 'general - discount')" > <h2 style="font-size: 11px"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_discount') ?></h2></a>
        </div>
        <div class="collectionbg col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="javascript:void(0)" onclick="getSettingPage('<?php echo site_url('gkpos/settings/promotion') ?>', 'general - promotion')"> <h2 style="font-size: 11px"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_promotion') ?></h2></a>
        </div>
        <div class="deliverybg col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="javascript:void(0)" onclick="getSettingPage('<?php echo site_url('gkpos/settings/depliveryplan') ?>', 'g - deliveryplan')"  ><h2 style="font-size: 11px"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/deliveryicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_delivery_plan') ?></h2></a>
        </div>
        <div class="waitingbg col-lg-2 col-md-2 col-sm-2 col-xs-4">
            <a href="javascript:void(0)" onclick="getSettingPage('<?php echo site_url('gkpos/settings/pagination') ?>', 'general - pagination')" > <h2 style="font-size: 11px"><img src="<?php echo ASSETS_GKPOS_PATH ?>images/waitingicon.png" width="30" height="30" />&nbsp;<?php echo $this->lang->line('gkpos_pagination') ?></h2></a>
        </div>
    </div>
    <div class="row">
        <?php echo form_open('gkpos/settings/save_deliveryplan/', array('id' => 'deliveryplan_form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
        <div id="config_wrapper">
            <fieldset id="config_info">
                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_area_or_title'), 'area', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-table" aria-hidden="true"></i></a></span>
                            <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                <input name="area" class="form-control required"  type="text" id="area" value="<?php isset($area) ? print $area : print'' ?>">
                            <?php else: ?>
                                <input name="area" class="form-control required"  type="text" id="area" onfocus="myJqueryKeyboard('area')" value="<?php isset($area) ? print $area : print'' ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_is_free'), '	is_free', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase')); ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <?php echo form_checkbox(array('name' => 'is_free', 'id' => 'is_free', 'value' => 1, 'checked' => isset($is_free) ? $is_free : '')); ?>
                    </div>
                </div>

                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_delivery_charge'), 'delivery_charge', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase required')); ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i><?php echo $this->config->item('currency_symbol') ?></i></a></span>
                            <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                <input name="delivery_charge" class="form-control required"  type="text" id="delivery_charge" value="<?php isset($delivery_charge) ? print $delivery_charge : print '' ?>">
                            <?php else: ?>
                                <input name="delivery_charge" class="form-control required"  type="text" id="delivery_charge" onfocus="myJqueryKeyboard('delivery_charge')" value="<?php isset($delivery_charge) ? print $delivery_charge : print '' ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_minimum_order'), 'min_order', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase')); ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i><?php echo $this->config->item('currency_symbol') ?></i></a></span>
                            <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                <input name="min_order" class="form-control required"  type="text" id="min_order" value="<?php isset($min_order) ? print $min_order : print'' ?>">
                            <?php else: ?>
                                <input name="min_order" class="form-control required"  type="text" id="min_order" onfocus="myJqueryKeyboard('min_order')" value="<?php isset($min_order) ? print $min_order : print'' ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_initial_postcode'), 'initial_code', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-uppercase')); ?>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon" style="background-color: #FF0000;"><a href="#"><i class="fa fa-street-view"></i></a></span>
                            <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                <input name="initial_code" class="form-control required"  type="text" id="initial_code" value="<?php isset($initial_code) ? print $initial_code : print'' ?>">
                            <?php else: ?>
                                <input name="initial_code" class="form-control required"  type="text" id="initial_code" onfocus="myJqueryKeyboard('initial_code')" value="<?php isset($initial_code) ? print $initial_code : print'' ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-sm">	
                    <?php echo form_label($this->lang->line('gkpos_applied_to_poscodes'), 'postcodes', array('class' => 'control-label col-lg-4 col-md-4 col-sm-4 col-xs-4 required text-uppercase')); ?>
                    <div class='col-lg-8 col-md-8 col-sm-8 col-xs-8'>
                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                            <?php echo form_textarea(array('name' => 'postcodes', 'rows' => 2, 'class' => 'form-control', 'id' => 'postcodes'), isset($postcodes) ? $postcode : '') ?>
                        <?php else: ?>
                            <textarea rows="2" name="postcodes" id="postcodes" class="form-control" onfocus="myJqueryKeyboard('postcodes')" ><?php isset($postcodes) ? print $postcode : print '' ?></textarea>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group form-group-md">	
                    <div class="col-md-offset-4 col-md-8">
                        <ul id="deliveryplan_error_message_box" class="error_message_box"></ul>
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
            $(document).ready(function ()
            {
                $('#deliveryplan_form').validate({
                    submitHandler: function (form) {
                        $(form).ajaxSubmit({
                            success: function (response) {
                                if (response.success)
                                {
                                    getBaseAjaxPage('<?php echo site_url("gkpos/settings/depliveryplan") ?>', 'G-Deliveryplan');
                                    //set_feedback(response.message, 'alert alert-dismissible alert-success', false);
                                } else
                                {
                                    set_feedback(response.message, 'alert alert-dismissible alert-danger', true);
                                }
                            },
                            dataType: 'json'
                        });
                    },
                    errorClass: "has-error",
                    errorLabelContainer: "#deliveryplan_error_message_box",
                    wrapper: "li",
                    highlight: function (e) {
                        $(e).closest('.form-group').addClass('has-error');
                    },
                    unhighlight: function (e) {
                        $(e).closest('.form-group').removeClass('has-error');
                    },
                    rules:
                            {
                                area: "required",
                                delivery_charge: {
                                    number: true,
                                    required: true
                                },
                                min_order: {
                                    number: true,
                                    required: true
                                },
                                initial_code: 'required',
                                postcodes: "required"

                            },
                    messages:
                            {
                                area: "Delivery Plan Area or title is a required field",
                                delivery_charge: "Please specify Delivery charge",
                                min_order: "You need to mention minimum order amount",
                                initial_code: "Postcode Initial is a required field",
                                postcodes: "you must provided atleat one postcode"

                            }
                });
            });
        </script>
        <div class="row voucher-list" style="margin: 10px">
            <div class="modal-header">
                <div class="page-title col-md-12"><?php echo $this->lang->line('gkpos_voucher_list') ?></div>
            </div>
            <div class="clearfix"></div>
            <table class="table table-responsive table-bordered fieldset">
                <tr>
                    <th class="text-center text-uppercase"><?php echo $this->lang->line('gkpos_area_or_title') ?></th> 
                    <th class="text-center text-uppercase"><?php echo $this->lang->line('gkpos_is_free') ?></th> 
                    <th class="text-center text-uppercase"><?php echo $this->lang->line('gkpos_delivery_charge') ?></th> 
                    <th class="text-center text-uppercase"><?php echo $this->lang->line('gkpos_minimum_order') ?></th> 
                    <th class="text-center text-uppercase"><?php echo $this->lang->line('gkpos_initial_postcode') ?></th> 
                    <!--<th class="text-center text-uppercase"><?php echo $this->lang->line('gkpos_applied_to_poscodes') ?></th>-->
                    <th class="text-center text-uppercase"><?php echo $this->lang->line('gkpos_action') ?></th> 
                </tr>
                <?php if (!empty($deliveryplan_list)): ?>
                    <?php foreach ($deliveryplan_list as $deliveryplan): ?> 
                        <tr>
                            <td class="text-center"><?php echo $deliveryplan->area ?></td> 
                            <td><?php $deliveryplan->is_free == 1 ? print 'Yes' : print'No' ?></td>
                            <td class="text-center"><?php echo to_currency($deliveryplan->delivery_charge) ?></td> 
                            <td class="text-center"><?php echo to_currency($deliveryplan->min_order) ?></td> 
                            <td onclick="viewPostcodeList('<?php echo $deliveryplan->id ?>')"><?php echo $deliveryplan->initial_code . ' (view list)' ?></td>
                            <!--<td title="<?php echo $deliveryplan->postcodes; ?>"><?php echo chop_string($deliveryplan->postcodes, 30) ?>...</td>-->
                            <td class="text-center">
                                <a href='javascript:void(0)' onclick="updateDeliveryplan('<?php echo $deliveryplan->id ?>', '<?php echo site_url('gkpos/settings/update_deliveryplan') ?>', '<?php $deliveryplan->status == 1 ? print'deactivate' : print 'activate' ?>')"><?php $deliveryplan->status == 1 ? print'Deactivate' : print 'Activate' ?> </a>
                                |
                                <a href='javascript:void(0)' onclick="updateDeliveryplan('<?php echo $deliveryplan->id ?>', '<?php echo site_url('gkpos/settings/update_deliveryplan') ?>', 'delete')">Delete</a> 
                            </td> 
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No Delivery Plans Found Found</td> 
                    </tr>
                <?php endif; ?>
            </table>  
            <script>
                function updateDeliveryplan(id, url, action) {
                    $.ajax({
                        url: url,
                        data: {
                            id: id,
                            action: action
                        },
                        type: "POST",
                        success: function (output) {
                            getSettingPage('<?php echo site_url("gkpos/settings/depliveryplan") ?>', 'G-depliveryplan');
                        },
                    });
                }
                function viewPostcodeList(id) {
                    $.ajax({
                        url: '<?php echo site_url("gkpos/settings/get_postcodelist") ?>',
                        data: {
                            id: id,
                        },
                        type: "POST",
                        success: function (output) {
                            var obj = $.parseJSON(output);
                            jQuery("#warningPopupHeader").text("POSTCODE LIST");
                            jQuery("#warningPopupContent").text(obj.postcodes.postcodes);
                            jQuery(".warningPopup").colorbox({
                                inline: true,
                                scrolling: true,
                                height: 400,
                                open: true,
                                width: '100%',
                                maxWidth: '600px'
                            });
                        }
                    });
                }
            </script>
        </div>
    </div>
</div>
