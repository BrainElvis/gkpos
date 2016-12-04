<div class="menu-info">
    <a href="javascript:void(0)" onclick="toggleContent('AddMenuBlock<?php echo $cat->id ?>')"><div class="mainsystembg2 img-responsive collection-bg text-uppercase"><span class="glyphicon-plus"></span>&nbsp;<?php echo $this->lang->line('gkpos_add') . ' ' . $this->lang->line('gkpos_menu') ?></div></a>
    <div id="AddMenuBlock<?php echo $cat->id ?>" style="display: none;" class="add-menu-block">
        <div class="clearfix"></div>
        <fieldset>
            <?php $action = $this->uri->segment(4) ? 'gkpos/menumanager/menusave/' . $this->uri->segment(4) : 'gkpos/menumanager/menusave' ?>
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
        <?php $menus = get_record_list('gkpos_menu', array('category' => $cat->id, 'status' => 1, 'deleted' => 0, 'published' => 1), '*', 'order') ?>
        <?php if (!empty($menus)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <td class="text-uppercase"><?php echo $this->lang->line('gkpos_menu') . ' ' . $this->lang->line('gkpos_title') ?></td>
                        <td class="text-uppercase"> <?php echo $this->lang->line('gkpos_description') ?></td>
                        <td class="text-uppercase"><?php echo $this->lang->line('gkpos_menu_base_price') ?></td>
                        <td class="text-uppercase"><?php echo $this->lang->line('gkpos_menu_dine_in_price') ?></td>
                        <td class="text-uppercase"><?php echo $this->lang->line('gkpos_menu_dine_out_price') ?></td>
                        <td class="text-uppercase"><?php echo $this->lang->line('gkpos_action') ?></td>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menus as $menu): ?>
                        <tr>
                            <td><?php echo $menu->title ?></td>
                            <td><?php gkpos_chopstring($menu->content, 100) . "..." ?></td>
                            <td><?php isset($menu->base_price) && $menu->base_price > 0 ? print to_currency($menu->base_price) : print $this->lang->line('gkpos_n_a') ?></td>
                            <td><?php isset($menu->in_price) && $menu->in_price > 0 ? print to_currency($menu->in_price) : print $this->lang->line('gkpos_n_a') ?></td>
                            <td><?php isset($menu->out_price) && $menu->out_price > 0 ? print to_currency($menu->out_price) : print $this->lang->line('gkpos_n_a') ?></td>
                            <td>
                                <span class="inline-action-button" id="edit-<?php echo $cat->id . '-' . $menu->id ?>"><img src="<?php echo ASSETS_GKPOS_PATH . 'images/edit-note.png' ?>" width="24px" height="24px"/></span>
                                <span class="button-seperator">&nbsp;|&nbsp;</span>
                                <span class="inline-action-button" id="edit-<?php echo $cat->id . '-' . $menu->id ?>"><img src="<?php echo ASSETS_GKPOS_PATH . 'images/delete-note.png' ?>" width="24px" height="24px"/></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
<script>
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