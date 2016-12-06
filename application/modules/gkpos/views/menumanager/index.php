<?php
$catagory_type = array(1 => $this->lang->line('gkpos_food'), 2 => $this->lang->line('gkpos_non_food'));
$print_option = array(1 => $this->lang->line('gkpos_kitchen_print_setting1'), 2 => $this->lang->line('gkpos_kitchen_print_setting2'), 3 => $this->lang->line('gkpos_kitchen_print_setting3'), 4 => $this->lang->line('gkpos_kitchen_print_setting4'));
$status = array(1 => $this->lang->line('gkpos_active'), 2 => $this->lang->line('gkpos_inactive'), 3 => $this->lang->line('gkpos_archived'));
?>
<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->load->view('gkpos/menumanager/left_sidebar') ?>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 bodyitem" id="menuManagerBody">
                <?php echo $this->load->view('gkpos/subviews/keyboard_setting') ?>
                <div class="clearfix"></div>
                <?php echo $this->load->view('gkpos/menumanager/subviews/category_info', array()) ?>
                <div class="clearfix"></div>
                <?php if ($categories): ?>
                    <div id="accordion">
                        <?php foreach ($categories as $cat): ?>
                            <div class="s_panel" id="<?php echo $cat->id . '_' . $cat->order ?>">
                                <h3 class="text-uppercase"><?php echo $cat->title ?></h3>
                                <div class="cat-info">
                                    <table class="table table-responsive table-bordered category-table">
                                        <tr>
                                            <th><?php echo $this->lang->line('gkpos_title') ?></th>
                                            <th><?php echo $this->lang->line('gkpos_description') ?></a></th>
                                            <th><?php echo $this->lang->line('gkpos_category_type') ?></th>
                                            <th><?php echo $this->lang->line('gkpos_options') ?></th>
                                            <th><?php echo $this->lang->line('gkpos_update_status') ?></th>
                                        </tr>

                                        <tr>
                                            <td><a href="javascript:void(0)" onclick="editcategorycell('<?php echo"category_title_" . $cat->id ?>')" data-type="text" id="category_title_<?php echo $cat->id ?>" data-name="title" data-pk="<?php echo $cat->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editcategorycell') ?>" data-title="<?php echo $this->lang->line('gkpos_category') . ' ' . $this->lang->line('gkpos_title') ?>">
                                                    <?php echo $cat->title ?>
                                                </a>
                                            </td>

                                            <td><a href="javascript:void(0)" onclick="editcategorycell('<?php echo"category_content_" . $cat->id ?>')" data-type="textarea" id="category_content_<?php echo $cat->id ?>" data-name="content" data-pk="<?php echo $cat->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editcategorycell') ?>" data-title="<?php echo $this->lang->line('gkpos_category') . ' ' . $this->lang->line('gkpos_description') ?>">
                                                    <?php echo $cat->content . '>>init' ?>
                                                </a>
                                            </td>

                                            <td>
                                                <a href="javascript:void(0)" onclick="editcategorycell('<?php echo"type_" . $cat->id ?>')" data-type="select" id="type_<?php echo $cat->id ?>" data-name="type" data-pk="<?php echo $cat->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editcategorycell') ?>" data-value="<?php echo $cat->type ?>" data-title="<?php echo $this->lang->line('gkpos_update') . ' ' . $this->lang->line('gkpos_category_type') ?>">
                                                    <?php echo $catagory_type[$cat->type] ?>
                                                </a>

                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" onclick="editcategorycell('<?php echo"print_option_" . $cat->id ?>')" data-type="select" id="print_option_<?php echo $cat->id ?>" data-name="print_option" data-pk="<?php echo $cat->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editcategorycell') ?>" data-value="<?php echo $cat->print_option ?>" data-title="<?php echo $this->lang->line('gkpos_update') . ' ' . $this->lang->line('gkpos_options') ?>">
                                                    <?php echo $print_option[$cat->print_option] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" onclick="editcategorycell('<?php echo"category_status_" . $cat->id ?>')" data-type="select" id="category_status_<?php echo $cat->id ?>" data-name="status" data-pk="<?php echo $cat->id ?>" data-url="<?php echo site_url('gkpos/menumanager/editcategorycell') ?>" data-value="<?php echo $cat->status ?>" data-title="<?php echo $this->lang->line('gkpos_update_status') ?>">
                                                    <?php
                                                    $color = 'black';
                                                    if ($cat->status == 1) {
                                                        $color = 'green';
                                                    }
                                                    if ($cat->status == 2) {
                                                        $color = 'orange';
                                                    }
                                                    if ($cat->status == 3) {
                                                        $color = 'red';
                                                    }
                                                    ?>
                                                    <span style="color:<?php echo $color ?>;"><?php echo $status[$cat->status] ?></span>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php echo $this->load->view('gkpos/menumanager/subviews/menu_info', array('cat' => $cat, 'status' => $status)) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="clearfix"></div>
            </div>
            <?php echo $this->load->view('gkpos/menumanager/right_sidebar') ?>
        </div>
    </div>
</section>
<script>

    $(document).ready(function () {
        var windowScreenHeight = $(window).height();
        $('#accordion').css({"height": windowScreenHeight - 170 + "px", "overflow-y": "auto", "overflow-x": "hidden"});
        $('#menuManagerBody').css({"height": windowScreenHeight - 200 + "px", "overflow-y": "auto", "overflow-x": "hidden"});
        manageWindowHeight();
        $('#accordion').accordion({
            collapsible: true,
            active: false,
            height: 'fill',
            header: 'h3',
            autoHeight: false,
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

    function editcategorycell(field) {
        $.fn.editable.defaults.mode = 'inline';
        $('#' + field).editable({
            source: function () {
                if (field.includes("type")) {
                    return [
                        {value: 1, text: '<?php echo $this->lang->line('gkpos_food') ?>'},
                        {value: 2, text: '<?php echo $this->lang->line('gkpos_non_food') ?>'},
                    ]
                }
                if (field.includes("category_status")) {
                    return [
                        {value: 1, text: '<?php echo $this->lang->line('gkpos_active') ?>'},
                        {value: 2, text: '<?php echo $this->lang->line('gkpos_inactive') ?>'},
                        {value: 3, text: '<?php echo $this->lang->line('gkpos_archived') ?>'}
                    ]
                }
                if (field.includes("print_option")) {
                    return [
                        {value: 1, text: '<?php echo $this->lang->line('gkpos_kitchen_print_setting1') ?>'},
                        {value: 2, text: '<?php echo $this->lang->line('gkpos_kitchen_print_setting2') ?>'},
                        {value: 3, text: '<?php echo $this->lang->line('gkpos_kitchen_print_setting3') ?>'},
                        {value: 4, text: '<?php echo $this->lang->line('gkpos_kitchen_print_setting4') ?>'}
                    ]
                }
            }
        });
    }

</script>