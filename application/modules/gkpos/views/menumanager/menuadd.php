<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->load->view('gkpos/menumanager/left_sidebar') ?>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bodyitem">
                <div class="row content">
                    <fieldset>
                        <?php $action = $this->uri->segment(4) ? 'gkpos/menumanager/categorysave/' . $this->uri->segment(4) : 'gkpos/menumanager/categorysave' ?>
                        <?php echo form_open($action, array('id' => 'gkposMenuCategoryForm', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
                        <div class="fieldset">
                            <div class='form-input-part col-lg-8 col-md-8 col-sm-8 col-xs-8 '>
                                <legend><?php echo $this->lang->line('gkpos_basic_information') ?></legend>
                                <div class="form-group">
                                    <?php echo form_label($this->lang->line('gkpos_category') . ' ' . $this->lang->line('gkpos_title'), 'title', array('class' => 'col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label required')); ?>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <?php echo form_input(array('name' => 'category', 'id' => 'category', 'class' => 'form-control required', 'value' => isset($category) ? $category : '')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <?php echo form_label($this->lang->line('gkpos_menu') . ' ' . $this->lang->line('gkpos_title'), 'title', array('class' => 'col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label required')); ?>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <?php echo form_input(array('name' => 'title', 'id' => 'title', 'class' => 'form-control required', 'value' => isset($title) ? $title : '')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="content" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_description') ?></label>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <?php echo form_textarea(array('name' => 'content', 'rows' => 2, 'class' => 'form-control', 'id' => 'content'), isset($content) ? $content : '') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="discount" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_menu_base_price') ?></label>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 input-group">
                                        <div class="input-group-addon"><?php echo $this->config->item('currency_symbol') ?></div>
                                        <?php echo form_input(array('name' => 'base_price', 'id' => 'base_price', 'class' => 'form-control addon-input', 'value' => isset($base_price) && $base_price > 0 ? $base_price : '')); ?>
                                    </div>
                                </div>
                                <div class="fieldset">
                                    <div class="checkbox">
                                        <label><legend><input type="checkbox" value="yes" id="IdToCheck" <?php isset($discount) && $discount > 0 ? print"checked" : '' ?>><?php echo $this->lang->line('gkpos_menu_price_differs_in_dine') ?></legend></label>
                                    </div>
                                    <div id="checkBlock" style="display: none;" >
                                        <div class="form-group">
                                            <label for="discount" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_amount') ?></label>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 input-group">
                                                <div class="input-group-addon"><?php echo $this->config->item('currency_symbol') ?></div>
                                                <?php echo form_input(array('name' => 'discount', 'id' => 'discount', 'class' => 'form-control addon-input', 'value' => isset($discount) && $discount > 0 ? $discount : '')); ?>
                                            </div>
                                        </div>
                                        <div class="form-group categoryDiscountBlock">
                                            <label for="discount" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_function') ?></label>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <label class="radio-inline text-uppercase"><input type="radio" name="discount_function" id="function1" value="fixed" <?php (isset($discount_function) && $discount_function == "fixed") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_fixed') ?></label>
                                                <label class="radio-inline text-uppercase"><input type="radio" name="discount_function" id="function2" value="percent" <?php (isset($discount_function) && $discount_function == "percent") ? print "checked" : '' ?>><?php echo $this->lang->line('gkpos_percentage') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <a href='javascript:void(0)'>
                                            <?php
                                            echo form_submit(array(
                                                'name' => 'submit_form',
                                                'id' => 'submit_form',
                                                'value' => $this->lang->line('gkpos_save'),
                                                'class' => 'form-submit-button mainsystembg2 collection-bg img-responsive'));
                                            ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class='form-message-part col-lg-4 col-md-4 col-sm-4 col-xs-4'>
                                <ul id="error_message_box" class="error_message_box"></ul>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </fieldset>
                </div>
                <div class="row main-keyboardbg">
                    <div id="virtualKeyboard"></div>
                </div>
            </div>
            <?php echo $this->load->view('gkpos/menumanager/right_sidebar') ?>
        </div>
    </div>
</section>
<script type='text/javascript'>
    $(document).ready(function ()
    {
        checkBlock('IdToCheck', 'checkBlock');
        setnumkeys('discount');
        $('#gkposMenuCategoryForm').validate({
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
            errorLabelContainer: "#error_message_box",
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
                        print_option: "required",
                        discount: {
                            number: true,
                            required: function (element) {
                                return $("#categoryDiscountChecked").is(":checked");
                            }
                        },
                        discount_function: {
                            required: function (element) {
                                return ($("#discount").val()) > 0;
                            }
                        },
                        type: "required"

                    },
            messages:
                    {
                        title: "<?php echo $this->lang->line('gkpos_category_title_required'); ?>",
                        discount_function: "<?php echo $this->lang->line('gkpos_discount_function_required'); ?>",
                        print_option: "<?php echo $this->lang->line('gkpos_print_option_required'); ?>",
                        discount: "On discount chekced, discount amount is required in number only",
                        type: 'Select Category Food Type'

                    }
        });
    });
</script>