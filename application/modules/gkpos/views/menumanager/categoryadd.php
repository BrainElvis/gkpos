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
                                        <?php echo form_input(array('name' => 'title', 'id' => 'title', 'class' => 'form-control required', 'value' => isset($title) ? $title : '')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="discount" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label required"><?php echo $this->lang->line('gkpos_category_type') ?></label>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <label class="radio-inline text-uppercase required"><input type="radio" name="type" id="type1" value="1" <?php (isset($type) && $type == "1") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_food') ?></label>
                                        <label class="radio-inline text-uppercase required"><input type="radio" name="type" id="type2" value="2" <?php (isset($type) && $type == "2") ? print "checked" : '' ?>><?php echo $this->lang->line('gkpos_non_food') ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="content" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_description') ?></label>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <?php echo form_textarea(array('name' => 'content', 'rows' => 2, 'class' => 'form-control', 'id' => 'content'), isset($content) ? $content : '') ?>
                                    </div>
                                </div>
                                <div class="fieldset">
                                    <legend><?php echo $this->lang->line('gkpos_kitchen_print_setting') ?></legend>
                                    <div class="form-group">
                                        <label for="radio-inline" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control-label"><?php echo $this->lang->line('gkpos_options') ?></label>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <label class="radio-inline text-uppercase required"><input type="radio" name="print_option" id="printerSet1" value="1" <?php (isset($print_option) && $print_option == "1") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_kitchen_print_setting1') ?></label>
                                            <label class="radio-inline text-uppercase required"><input type="radio" name="print_option" id="printerSet2" value="2" <?php (isset($print_option) && $print_option == "2") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_kitchen_print_setting2') ?></label>
                                            <label class="radio-inline text-uppercase required"><input type="radio" name="print_option" id="printerSet3" value="3" <?php (isset($print_option) && $print_option == "3") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_kitchen_print_setting3') ?></label>
                                            <label class="radio-inline text-uppercase required"><input type="radio" name="print_option" id="printerSet4" value="3" <?php (isset($print_option) && $print_option == "4") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_kitchen_print_setting4') ?></label>
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
        keyboard('virtualKeyboard');
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
                        type: "required"

                    },
            messages:
                    {
                        title: "<?php echo $this->lang->line('gkpos_category_title_required'); ?>",
                        print_option: "<?php echo $this->lang->line('gkpos_print_option_required'); ?>",
                        type: "<?php echo $this->lang->line('gkpos_select_category_food_type') ?>"

                    }
        });
    });
</script>