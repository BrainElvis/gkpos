<div class="menu-info">
    <a href="javascript:void(0)" class="manage-menu btn btn-block btn-info text-center" onclick="toggleContent('AddMenuBlock<?php echo $cat->id ?>')"><span class="glyphicon glyphicon-plus"></span>&nbsp;<?php echo $this->lang->line('gkpos_add') . ' ' . $this->lang->line('gkpos_menu') ?></a>
    <div id="AddMenuBlock<?php echo $cat->id ?>" style="display: none;" class="add-menu-block">
        <div class="clearfix"></div>
        <fieldset>
            <?php $action = $this->uri->segment(4) ? 'gkpos/menumanager/menu/' . $this->uri->segment(4) : 'gkpos/menumanager/menu' ?>
            <?php echo form_open($action, array('id' => 'gkposMenuForm' . $cat->id, 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
            <div class="fieldset">
                <div class='form-input-part col-lg-12 col-md-12 col-sm-12 col-xs-12 '>
                    <div class='pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6' >
                        <div class="form-group">
                            <?php echo form_label($this->lang->line('gkpos_menu') . ' ' . $this->lang->line('gkpos_title'), 'title', array('class' => 'col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label required')); ?>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                    <?php echo form_input(array('name' => 'title', 'id' => 'title', 'class' => 'form-control required', 'value' => isset($title) ? $title : '')); ?>
                                <?php else: ?>
                                    <input name="title" id="title<?php echo $cat->id ?>" class="form-control required" value="<?php isset($title) ? print $title : '' ?>" onfocus="myJqueryKeyboard('<?php echo "title" . $cat->id ?>')"/>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_description') ?></label>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                    <?php echo form_textarea(array('name' => 'content', 'rows' => 2, 'class' => 'form-control', 'id' => 'content' . $cat->id), isset($content) ? $content : '') ?>
                                <?php else: ?>
                                    <textarea rows="2" name="content" id="content<?php echo $cat->id ?>" class="form-control" onfocus="myJqueryKeyboard('<?php echo "content" . $cat->id ?>')" ><?php isset($content) ? $content : '' ?></textarea>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class='form-group form-message-part'>
                            <ul id="error_message_box<?php echo $cat->id ?>" class="error_message_box"></ul>
                        </div>
                    </div>
                    <div class='pull-right col-lg-6 col-md-6 col-sm-6 col-xs-6' >
                        <div class="form-group">
                            <label for="base_price" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_menu_base_price') ?></label>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 input-group">
                                <div class="input-group-addon"><?php echo $this->config->item('currency_symbol') ?></div>
                                <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                    <?php echo form_input(array('name' => 'base_price', 'id' => 'base_price', 'class' => 'form-control addon-input', 'value' => isset($base_price) && $base_price > 0 ? $base_price : '')); ?>
                                <?php else: ?>
                                    <input name="base_price" id="base_price<?php echo $cat->id ?>" class="form-control required" value="<?php isset($base_price) ? print $base_price : '' ?>" onfocus="myJqueryKeyboard('<?php echo "base_price" . $cat->id ?>')"/>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="fieldset">
                            <div class="checkbox">
                                <label><legend><input type="checkbox" name='is_dine' value='yes' id="idToCheck<?php echo $cat->id ?>" onclick="checkBlock('<?php echo "idToCheck" . $cat->id ?>', '<?php echo "checkBlock" . $cat->id ?>')"><?php echo $this->lang->line('gkpos_menu_price_differs_in_dine') ?></legend></label>
                            </div>
                            <div id="checkBlock<?php echo $cat->id ?>" style="display: none;" >
                                <div class="form-group">
                                    <label for="in_price" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_menu_dine_in_price') ?></label>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 input-group">
                                        <div class="input-group-addon"><?php echo $this->config->item('currency_symbol') ?></div>
                                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                            <?php echo form_input(array('name' => 'in_price', 'id' => 'in_price' . $cat->id, 'class' => 'form-control addon-input', 'value' => isset($in_price) && $in_price > 0 ? $in_price : '')); ?>
                                        <?php else: ?>
                                            <input name="in_price" id="in_price<?php echo $cat->id ?>" class="form-control required" value="<?php isset($in_price) && $in_price > 0 ? print $in_price : '' ?>" onfocus="myJqueryKeyboard('<?php echo "in_price" . $cat->id ?>')"/>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="out_price" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_menu_dine_out_price') ?></label>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 input-group">
                                        <div class="input-group-addon"><?php echo $this->config->item('currency_symbol') ?></div>                                                                         
                                        <?php if ($this->config->item('is_touch') == 'disable'): ?>
                                            <?php echo form_input(array('name' => 'out_price', 'id' => 'out_price' . $cat->id, 'class' => 'form-control addon-input', 'value' => isset($out_price) && $out_price > 0 ? $out_price : '')); ?>
                                        <?php else: ?>
                                            <input name="out_price" id="out_price<?php echo $cat->id ?>" class="form-control required" value="<?php isset($out_price) ? print $out_price : '' ?>" onfocus="myJqueryKeyboard('<?php echo "out_price" . $cat->id ?>')"/>
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
                    <input class="form-submit-button mainsystembg2 waiting-bg img-responsive" type="submit" name="submit_form" value="<?php echo $this->lang->line('gkpos_save') ?>" onclick="savemenu('gkposMenuForm<?php echo $cat->id ?>', 'error_message_box<?php echo $cat->id ?>', 'idToCheck<?php echo $cat->id ?>')">
                </div>
            </div>
            <?php echo form_close() ?>
        </fieldset>
        <div class="clearfix"></div>
    </div>
    <div class="menuList">
        <?php $menus = get_record_list('gkpos_menu', array('category' => $cat->id), '*', 'order') ?>
        <?php if (!empty($menus)): ?>
            <?php $count = 1; ?>
            <table class="table table-responsive table-bordered category-table" id="table-<?php echo $cat->id ?>">

                <tr>
                    <th class="text-capitalize"><?php echo $this->lang->line('gkpos_menu') . ' ' . $this->lang->line('gkpos_title') ?></th>
                    <th class="text-capitalize" style="width: 35%;"> <?php echo $this->lang->line('gkpos_description') ?></th>
                    <th class="text-capitalize"><?php echo $this->lang->line('gkpos_price') . "[" . $this->config->item('currency_symbol') . "]" ?></th>
                    <th class="text-capitalize"><?php echo $this->lang->line('gkpos_in') . "[" . $this->config->item('currency_symbol') . "]" ?></th>
                    <th class="text-capitalize"><?php echo $this->lang->line('gkpos_out') . "[" . $this->config->item('currency_symbol') . "]" ?></th>
                    <th class="text-capitalize"><?php echo $this->lang->line('gkpos_update_status') ?></th>
                </tr>

                <?php foreach ($menus as $menu): ?>
                    <tr>
                        <td>
                            <a href="javascript:void(0)" onclick="editmenucell('<?php echo"title_" . $menu->id ?>')" data-type="text" id="title_<?php echo $menu->id ?>" data-name="title" data-pk="<?php echo $menu->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editmenucell') ?>" data-title="<?php echo $this->lang->line('gkpos_menu') . ' ' . $this->lang->line('gkpos_title') ?>">
                                <?php echo $menu->title ?>
                            </a>
                        </td>

                        <td>
                            <a href="javascript:void(0)" onclick="editmenucell('<?php echo"content_" . $menu->id ?>')" data-type="textarea" id="content_<?php echo $menu->id ?>" data-name="content" data-pk="<?php echo $menu->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editmenucell') ?>" data-title="<?php echo $this->lang->line('gkpos_menu') . ' ' . $this->lang->line('gkpos_description') ?>">
                                <?php echo $menu->content ?>
                            </a>
                        </td>

                        <td>
                            <a href="javascript:void(0)" onclick="editmenucell('<?php echo"base_price_" . $menu->id ?>')" data-type="text" id="base_price_<?php echo $menu->id ?>" data-name="base_price" data-pk="<?php echo $menu->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editmenucell') ?>" data-title="<?php echo $this->lang->line('gkpos_menu_base_price') ?>">
                                <?php isset($menu->base_price) && $menu->base_price > 0 ? print $menu->base_price : print $this->lang->line('gkpos_n_a') ?>
                            </a>
                        </td>

                        <td>
                            <a href="javascript:void(0)" onclick="editmenucell('<?php echo"in_price_" . $menu->id ?>')" data-type="text" id="in_price_<?php echo $menu->id ?>" data-name="in_price" data-pk="<?php echo $menu->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editmenucell') ?>" data-title="<?php echo $this->lang->line('gkpos_menu_dine_in_price') ?>">
                                <?php isset($menu->in_price) && $menu->in_price > 0 ? print $menu->in_price : print $this->lang->line('gkpos_n_a') ?>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" onclick="editmenucell('<?php echo"out_price_" . $menu->id ?>')" data-type="text" id="out_price_<?php echo $menu->id ?>" data-name="out_price" data-pk="<?php echo $menu->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editmenucell') ?>" data-title="<?php echo $this->lang->line('gkpos_menu_dine_out_price') ?>">
                                <?php isset($menu->out_price) && $menu->out_price > 0 ? print $menu->out_price : print $this->lang->line('gkpos_n_a') ?>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" onclick="editmenucell('<?php echo"status_" . $menu->id ?>')" data-type="select" id="status_<?php echo $menu->id ?>" data-name="status" data-pk="<?php echo $menu->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editmenucell') ?>" data-value="<?php echo $menu->status ?>" data-title="<?php echo $this->lang->line('gkpos_update_status') ?>">
                                <?php
                                $color = 'black';
                                if ($menu->status == 1) {
                                    $color = 'green';
                                }
                                if ($menu->status == 2) {
                                    $color = 'orange';
                                }
                                if ($menu->status == 3) {
                                    $color = 'red';
                                }
                                ?>
                                <span style="color:<?php echo $color ?>;"><?php echo $status[$menu->status] ?></span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <?php echo $this->load->view('gkpos/menumanager/subviews/selection_info', array('menu' => $menu, 'cat' => $cat, 'counter' => $count, 'status' => $status)) ?>
                        </td>
                    </tr>
                    <?php $count++ ?>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
<script>
    function MenuCellEdit(field, pk, type) {
        $('#' + field).editable({
            type: type,
            pk: pk,
            url: '<?php echo site_url("gkpos/menumanager/editcell") ?>',
            title: 'New Value'
        });
    }

    function editmenucell(field) {
        $.fn.editable.defaults.mode = 'inline';
        $('#' + field).editable({
            source: [
                {value: 1, text: '<?php echo $this->lang->line('gkpos_active') ?>'},
                {value: 2, text: '<?php echo $this->lang->line('gkpos_inactive') ?>'},
                {value: 3, text: '<?php echo $this->lang->line('gkpos_archived') ?>'}
            ]
        });
    }
    function savemenu(formId, error_message_box, idToCheck) {
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
            errorLabelContainer: "#" + error_message_box,
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
                                return !$("#" + idToCheck).is(":checked");
                            }
                        },
                        in_price: {
                            number: true,
                            required: function (element) {
                                return $("#" + idToCheck).is(":checked");
                            }
                        },
                        out_price: {
                            number: true,
                            required: function (element) {
                                return $("#" + idToCheck).is(":checked");
                            }
                        }
                    },
            messages:
                    {
                        title: "<?php echo $this->lang->line('gkpos_menu_title_rquired') ?>",
                        base_price: "<?php echo $this->lang->line('gkpos_menu_price_rquired') ?>",
                        in_price: "<?php echo $this->lang->line('gkpos_dine_in_price_required') ?>",
                        out_price: "<?php echo $this->lang->line('gkpos_dine_in_price_required') ?>"
                    }
        });
    }

</script>