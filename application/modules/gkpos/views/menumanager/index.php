<?php
$catagory_type = array(1 => $this->lang->line('gkpos_food'), 2 => $this->lang->line('gkpos_non_food'));
$print_option = array(1 => $this->lang->line('gkpos_kitchen_print_setting1'), 2 => $this->lang->line('gkpos_kitchen_print_setting2'), 3 => $this->lang->line('gkpos_kitchen_print_setting3'), 4 => $this->lang->line('gkpos_kitchen_print_setting4'));
?>
<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->load->view('gkpos/menumanager/left_sidebar') ?>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 bodyitem">
                <?php if ($categories): ?>
                    <div id="accordion">
                        <?php foreach ($categories as $cat): ?>
                            <div class="s_panel" id="<?php echo $cat->id . '_' . $cat->order ?>">
                                <h3><?php echo $cat->title ?></h3>
                                <div class="cat-info">
                                    <table class="table table-responsive table-bordered">
                                        <tr>
                                            <th><?php echo $this->lang->line('gkpos_description') ?></th>
                                            <td><?php echo $cat->content ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo $this->lang->line('gkpos_category_type') ?></th>
                                            <td><?php echo $catagory_type[$cat->type] ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo $this->lang->line('gkpos_options') ?></th>
                                            <td><?php echo $print_option[$cat->print_option] ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo $this->lang->line('gkpos_discount') ?></th>
                                            <td><?php ($cat->discount_function == 'fixed') ? print to_currency($cat->discount) : print to_quantity_decimals($cat->discount) . '&percnt;' ?></td>
                                        </tr>
                                    </table>
                                    <a href="<?php echo site_url('gkpos/menumanager/categoryadd/' . $cat->id) ?>"><div class="mainsystembg2 collection-bg img-responsive"><?php echo $this->lang->line('gkpos_update') . ' ' . $this->lang->line('gkpos_category') ?></div></a>
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
                //console.log(data);
                $.post("<?php echo site_url('gkpos/menumanager/categorysort') ?>", {data: data}, function (output) {
                    console.log(output);
                },'json');
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
</script>