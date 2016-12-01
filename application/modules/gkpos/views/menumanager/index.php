<?php
$catagory_type = array(1 => $this->lang->line('gkpos_food'), 2 => $this->lang->line('gkpos_non_food'));
$print_option = array(1 => $this->lang->line('gkpos_kitchen_print_setting1'), 2 => $this->lang->line('gkpos_kitchen_print_setting2'), 3 => $this->lang->line('gkpos_kitchen_print_setting3'), 4 => $this->lang->line('gkpos_kitchen_print_setting4'));
?>
<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->load->view('gkpos/menumanager/left_sidebar') ?>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 bodyitem">
                <?php echo $this->load->view('gkpos/subviews/keyboard_setting') ?>
                <?php if ($categories): ?>
                    <div id="accordion">
                        <?php foreach ($categories as $cat): ?>
                            <div class="s_panel" id="<?php echo $cat->id . '_' . $cat->order ?>">
                                <h3><?php echo $cat->title ?></h3>
                                <div class="cat-info">
                                    <table class="table table-responsive table-bordered">
                                        <tr>
                                            <td><?php echo $this->lang->line('gkpos_description') . ":<br/>" ?><?php echo $cat->content ?></td>
                                            <td><?php echo $this->lang->line('gkpos_category_type') . ":<br/>" ?><?php echo $catagory_type[$cat->type] ?></td>
                                            <td><?php echo $this->lang->line('gkpos_options') . ":<br/>" ?><?php echo $print_option[$cat->print_option] ?></td>
                                            <td><a href="<?php echo site_url('gkpos/menumanager/categoryadd/' . $cat->id) ?>"> <img src="<?php echo ASSETS_GKPOS_PATH . "images/update.png" ?>" alt="<?php echo $this->lang->line('gkpos_update') . ' ' . $this->lang->line('gkpos_category') ?>"></a></td>
                                        </tr>
                                    </table>
                                    <div class="menu-info">
                                        <a href="javascript:void(0)" onclick="toggleContent('AddMenuBlock<?php echo $cat->id ?>')"><div class="mainsystembg2 img-responsive collection-bg text-uppercase"><span class="glyphicon-plus"></span>&nbsp;<?php echo $this->lang->line('gkpos_add') . ' ' . $this->lang->line('gkpos_menu') ?></div></a>
                                        <div id="AddMenuBlock<?php echo $cat->id ?>" style="display: none;" class="add-menu-block">
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
                                            <?php //debugPrint(get_record_list('gkpos_menu', array('category' => $cat->id, 'status' => 1, 'deleted' => 0, 'published' => 1), '*', 'order')) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php echo $this->load->view('gkpos/menumanager/right_sidebar') ?>
        </div>
    </div>
</section>
<script>

    $(document).ready(function () {
        setnumkeys('base_price');
        $('#accordion').accordion({
            collapsible: true,
            active: false,
            height: 'fill',
            header: 'h3'
        }).sortable({
            items: '.s_panel',
            cursor: "move",
            update: function (event, ui) {
                var data = $(this).sortable('serialize');
                $.post("<?php echo site_url('gkpos/menumanager/categorysort') ?>", {data: data}, function (output) {
                    console.log(output);
                }, 'json');
            }
        });

        $('#accordion').on('accordionactivate', function (event, ui) {
            if (ui.newPanel.length) {
                $('#accordion').sortable('disable');
            } else {
                $('#accordion').sortable('enable');
            }
        });
    });
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
    function some_function() {
        alert("ok");
    }
</script>