<div class="menu-selection">
    <a href="javascript:void(0)" class="text-uppercase manage-menu-selection btn btn-block btn-success text-center" onclick="toggleContent('AddMenuSelectionBlock<?php echo $menu->id . $counter ?>')"><span class="glyphicon glyphicon-plus"></span>&nbsp;<?php echo $this->lang->line('gkpos_manage') . ' ' . $menu->title . ' ' . $this->lang->line('gkpos_selection') ?></a>
    <div id="AddMenuSelectionBlock<?php echo $menu->id . $counter ?>" style="display: none;" class="add-menu-selection-block">
        <div class="clearfix"></div>
        <a href="javascript:void(0)" class="text-uppercase manage-menu-selection btn btn-warning btn-block" onclick="toggleContent('AddSelectionPanel<?php echo $menu->id . $counter ?>')"><span class="glyphicon glyphicon-plus"></span>&nbsp;<?php echo $this->lang->line('gkpos_add') . ' ' . $menu->title . ' ' . $this->lang->line('gkpos_selection') ?></a>
        <fieldset id="AddSelectionPanel<?php echo $menu->id . $counter ?>" style="display: none;">
            <?php $action = $this->uri->segment(4) ? 'gkpos/menumanager/selection/' . $this->uri->segment(4) : 'gkpos/menumanager/selection' ?>
            <?php echo form_open($action, array('id' => 'gkposMenuSelectionForm' . $menu->id, 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
            <div class="fieldset">
                <div class='form-input-part col-lg-12 col-md-12 col-sm-12 col-xs-12 '>
                    <div class='pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6' >
                        <div class="form-group">
                            <?php echo form_label($this->lang->line('gkpos_selection') . ' ' . $this->lang->line('gkpos_title'), 'title', array('class' => 'col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label required')); ?>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                    <?php echo form_input(array('name' => 'title', 'id' => 'title' . $menu->id . $counter, 'class' => 'form-control required', 'value' => isset($title) ? $title : '')); ?>
                                <?php else: ?>
                                    <input name="title" id="title<?php echo $menu->id . '' . $counter ?>" class="form-control required" value="<?php isset($title) ? print $title : '' ?>" onfocus="myJqueryKeyboard('<?php echo "title" . $menu->id . $counter ?>')"/>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_description') ?></label>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                    <?php echo form_textarea(array('name' => 'content', 'rows' => 2, 'class' => 'form-control', 'id' => 'content' . $menu->id . $counter), isset($content) ? $content : '') ?>
                                <?php else: ?>
                                    <textarea rows="2" name="content" id="content<?php echo $menu->id . $counter ?>" class="form-control" onfocus="myJqueryKeyboard('<?php echo "content" . $menu->id . $counter ?>')" ><?php isset($content) ? $content : '' ?></textarea>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class='form-group form-message-part'>
                            <ul id="selection_error_message_box<?php echo $menu->id . $counter ?>" class="selection_error_message_box"></ul>
                        </div>
                    </div>
                    <div class='pull-right col-lg-6 col-md-6 col-sm-6 col-xs-6' >
                        <div class="form-group">
                            <label for="base_price" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_menu_base_price') ?></label>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 input-group">
                                <div class="input-group-addon"><?php echo $this->config->item('currency_symbol') ?></div>
                                <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                    <?php echo form_input(array('name' => 'base_price', 'id' => 'base_price' . $menu->id . $counter, 'class' => 'form-control addon-input', 'value' => isset($base_price) && $base_price > 0 ? $base_price : '')); ?>
                                <?php else: ?>
                                    <input name="base_price" id="base_price<?php echo $menu->id . $counter ?>" class="form-control required" value="<?php isset($base_price) ? print $base_price : '' ?>" onfocus="myJqueryKeyboard('<?php echo "base_price" . $menu->id . $counter ?>')"/>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="fieldset">
                            <div class="checkbox">
                                <label><legend><input type="checkbox" name='is_dine' value='yes' id="menuIdToCheck<?php echo $menu->id . $counter ?>" onclick="checkBlock('<?php echo "menuIdToCheck" . $menu->id . $counter ?>', '<?php echo "selectionCheckBlock" . $menu->id . $counter ?>')"><?php echo $this->lang->line('gkpos_menu_price_differs_in_dine') ?></legend></label>
                            </div>
                            <div id="selectionCheckBlock<?php echo $menu->id . $counter ?>" style="display: none;" >
                                <div class="form-group">
                                    <label for="in_price" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_menu_dine_in_price') ?></label>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 input-group">
                                        <div class="input-group-addon"><?php echo $this->config->item('currency_symbol') ?></div>
                                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                            <?php echo form_input(array('name' => 'in_price', 'id' => 'in_price' . $menu->id . $counter, 'class' => 'form-control addon-input', 'value' => isset($in_price) && $in_price > 0 ? $in_price : '')); ?>
                                        <?php else: ?>
                                            <input name="in_price" id="in_price<?php echo $menu->id . $counter ?>" class="form-control required" value="<?php isset($in_price) && $in_price > 0 ? print $in_price : '' ?>" onfocus="myJqueryKeyboard('<?php echo "in_price" . $menu->id . $counter ?>')"/>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="out_price" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_menu_dine_out_price') ?></label>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 input-group">
                                        <div class="input-group-addon"><?php echo $this->config->item('currency_symbol') ?></div>                                                                         
                                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                            <?php echo form_input(array('name' => 'out_price', 'id' => 'out_price' . $menu->id . $counter, 'class' => 'form-control addon-input', 'value' => isset($out_price) && $out_price > 0 ? $out_price : '')); ?>
                                        <?php else: ?>
                                            <input name="out_price" id="out_price<?php echo $menu->id . $counter ?>" class="form-control required" value="<?php isset($out_price) ? print $out_price : '' ?>" onfocus="myJqueryKeyboard('<?php echo "out_price" . $menu->id . $counter ?>')"/>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <input type='hidden' name='category' value='<?php echo $cat->id ?>'>
                    <input type='hidden' name='menu' value='<?php echo $menu->id ?>'>
                    <input class="form-submit-button mainsystembg2 waiting-bg img-responsive" type="submit" name="submit_form" value="<?php echo $this->lang->line('gkpos_save') ?>" onclick="savemenuselection('gkposMenuSelectionForm<?php echo $menu->id ?>', 'selection_error_message_box<?php echo $menu->id . $counter ?>', 'menuIdToCheck<?php echo $menu->id . $counter ?>')">
                </div>
            </div>
            <?php echo form_close() ?>
        </fieldset>
        <div class="clearfix"></div>
        <div class="selectionList">
            <?php $selections = get_record_list('gkpos_selection', array('category' => $cat->id, 'menu' => $menu->id), '*', 'order') ?>
            <?php if (!empty($selections)): ?>
                <?php $sel_counter = 1; ?>
                <table class="table table-responsive table-bordered category-table" id="table-<?php echo $cat->id . $menu->id ?>">

                    <tr>
                        <th class="text-capitalize"><?php echo $this->lang->line('gkpos_title') ?></th>
                        <th style="width: 35%;" class="text-capitalize"> <?php echo $this->lang->line('gkpos_description') ?></th>
                        <th class="text-capitalize"><?php echo $this->lang->line('gkpos_price') . "[" . $this->config->item('currency_symbol') . "]" ?></th>
                        <th class="text-capitalize"><?php echo $this->lang->line('gkpos_in') . "[" . $this->config->item('currency_symbol') . "]" ?></th>
                        <th class="text-capitalize"><?php echo $this->lang->line('gkpos_out') . "[" . $this->config->item('currency_symbol') . "]" ?></th>
                        <th class="text-capitalize"><?php echo $this->lang->line('gkpos_update_status') ?></th>
                    </tr>

                    <?php foreach ($selections as $sel): ?>
                        <tr>
                            <td>
                                <a href="javascript:void(0)" onclick="editmenuselcell('<?php echo"title_" . $cat->id . $menu->id . $sel->id ?>')" data-type="text" id="title_<?php echo $cat->id . $menu->id . $sel->id ?>" data-name="title" data-pk="<?php echo $sel->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editmenuselcell') ?>" data-title="<?php echo $menu->title . ' ' . $this->lang->line('gkpos_selection') . ' ' . $this->lang->line('gkpos_title') ?>">
                                    <?php echo $sel->title ?>
                                </a>
                            </td>

                            <td>
                                <a href="javascript:void(0)" onclick="editmenuselcell('<?php echo"content_" . $cat->id . $menu->id . $sel->id ?>')" data-type="textarea" id="content_<?php echo $cat->id . $menu->id . $sel->id ?>" data-name="content" data-pk="<?php echo $sel->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editmenuselcell') ?>" data-title="<?php echo $menu->title . ' ' . $this->lang->line('gkpos_selection') . ' ' . $this->lang->line('gkpos_description') ?>">
                                    <?php echo $sel->content ?>
                                </a>
                            </td>

                            <td>
                                <a href="javascript:void(0)" onclick="editmenuselcell('<?php echo"base_price_" . $cat->id . $menu->id . $sel->id ?>')" data-type="text" id="base_price_<?php echo $cat->id . $menu->id . $sel->id ?>" data-name="base_price" data-pk="<?php echo $sel->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editmenuselcell') ?>" data-title="<?php echo $menu->title . ' ' . $this->lang->line('gkpos_selection') . ' ' . $this->lang->line('gkpos_price') ?>">
                                    <?php isset($sel->base_price) && $sel->base_price > 0 ? print $sel->base_price : print $this->lang->line('gkpos_n_a') ?>
                                </a>
                            </td>

                            <td>
                                <a href="javascript:void(0)" onclick="editmenuselcell('<?php echo"in_price_" . $cat->id . $menu->id . $sel->id ?>')" data-type="text" id="in_price_<?php echo $cat->id . $menu->id . $sel->id ?>" data-name="in_price" data-pk="<?php echo $sel->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editmenuselcell') ?>" data-title="<?php echo $menu->title . ' ' . $this->lang->line('gkpos_selection') . ' ' . $this->lang->line('gkpos_in') . ' ' . $this->lang->line('gkpos_price') ?>" >
                                    <?php isset($sel->in_price) && $sel->in_price > 0 ? print $sel->in_price : print $this->lang->line('gkpos_n_a') ?>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="editmenuselcell('<?php echo"out_price_" . $cat->id . $menu->id . $sel->id ?>')" data-type="text" id="out_price_<?php echo $cat->id . $menu->id . $sel->id ?>" data-name="out_price" data-pk="<?php echo $sel->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editmenuselcell') ?>" data-title="<?php echo $menu->title . ' ' . $this->lang->line('gkpos_selection') . ' ' . $this->lang->line('gkpos_out') . ' ' . $this->lang->line('gkpos_price') ?>">
                                    <?php isset($sel->out_price) && $sel->out_price > 0 ? print $sel->out_price : print $this->lang->line('gkpos_n_a') ?>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="editmenuselcell('<?php echo"status_" . $cat->id . $menu->id . $sel->id ?>')" data-type="select" id="status_<?php echo $cat->id . $menu->id . $sel->id ?>" data-name="status" data-pk="<?php echo $sel->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editmenuselcell') ?>" data-value="<?php echo $sel->status ?>" data-title="<?php echo $this->lang->line('gkpos_update_status') ?>">
                                    <?php
                                    $color = 'black';
                                    if ($sel->status == 1) {
                                        $color = 'green';
                                    }
                                    if ($sel->status == 2) {
                                        $color = 'orange';
                                    }
                                    if ($sel->status == 3) {
                                        $color = 'red';
                                    }
                                    ?>
                                    <span style="color:<?php echo $color ?>;"><?php echo $status[$sel->status] ?></span>

                                </a>
                            </td>
                        </tr>
                        <?php $sel_counter++ ?>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    function editmenuselcell(field) {
        $.fn.editable.defaults.mode = 'inline';
        $('#' + field).editable({
            source: [
                {value: 1, text: '<?php echo $this->lang->line('gkpos_active') ?>'},
                {value: 2, text: '<?php echo $this->lang->line('gkpos_inactive') ?>'},
                {value: 3, text: '<?php echo $this->lang->line('gkpos_archived') ?>'}
            ]
        });
    }
    function savemenuselection(formId, selection_error_message_box, menuIdToCheck) {
        $('#' + formId).validate({
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    success: function (response) {
                        if (response.success)
                        {
                            set_feedback(response.message, 'alert alert-dismissible alert-success', false);
                        } else
                        {
                            set_feedback(response.message, 'alert alert-dismissible alert-danger', true);
                        }
                    },
                    dataType: 'json'
                });
            },
            errorClass: "has-error",
            errorLabelContainer: "#" + selection_error_message_box,
            wrapper: "li",
            highlight: function (e) {
                $(e).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (e) {
                $(e).closest('.form-group').removeClass('has-error');
            },
            rules:
                    {
                        title: "required",
                        base_price: {
                            number: true,
                            required: function () {
                                return !$("#" + menuIdToCheck).is(":checked");
                            }
                        },
                        in_price: {
                            number: true,
                            required: function (element) {
                                return $("#" + menuIdToCheck).is(":checked");
                            }
                        },
                        out_price: {
                            number: true,
                            required: function (element) {
                                return $("#" + menuIdToCheck).is(":checked");
                            }
                        }
                    },
            messages:
                    {
                        title: "<?php echo $this->lang->line('gkpos_menu_selection_title_rquired') ?>",
                        base_price: "<?php echo $this->lang->line('gkpos_menu_selection_price_rquired') ?>",
                        in_price: "<?php echo $this->lang->line('gkpos_selection_dine_in_price_required') ?>",
                        out_price: "<?php echo $this->lang->line('gkpos_selection_dine_out_price_required') ?>"
                    }
        });
    }

</script>