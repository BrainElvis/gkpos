<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $template['partials']['left_sidebar'] ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 bodyitem">
                <?php echo $this->load->view('gkpos/partials/keyboard_setting') ?>
                <div class="body-vertical-align-center">
                    <div class="pin-calculatorbg">
                        <div class="middlebg">
                            <p class="sidebar-heading text-center text-center text-uppercase"><?php echo $this->lang->line('gkpos_table_info') ?></p>
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" id="table_number" name="table_number" class="form-control" id="inputEmail3" placeholder="<?php echo $this->lang->line('gkpos_table') ?>&nbsp;<?php echo $this->lang->line('gkpos_number') ?>" onfocus="myJqueryKeyboard('table_number')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" name="guest_quantity" id="guest_quantity" class="form-control" placeholder="<?php echo $this->lang->line('gkpos_quantity_of_guest') ?>" onfocus="myJqueryKeyboard('guest_quantity')">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <ul>
                            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key1') ?></li>
                            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key2') ?></li>
                            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key3') ?></li>
                        </ul>
                        <ul>
                            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key4') ?></li>
                            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key5') ?></li>
                            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key6') ?></li>
                        </ul>
                        <ul>
                            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key7') ?></li>
                            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key8') ?></li>
                            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key9') ?></li>
                        </ul>
                        <ul>
                            <li class="btnPin"><?php echo $this->lang->line('gkpos_numpad_key_del') ?></li>
                            <li class="numkey"><?php echo $this->lang->line('gkpos_numpad_key0') ?></li>
                            <li class="btnPin"><?php echo $this->lang->line('gkpos_numpad_key_clr') ?></li>
                        </ul>
                    </div>

                    <div class="last-calculatorbg">
                        <ul>
                            <li><a href="<?php echo site_url('gkpos/order') ?>"><?php echo $this->lang->line('gkpos_numpad_key_enter') ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php echo $template['partials']['right_sidebar'] ?>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function () {
        setnumkeys('table_number');
        manageWindowHeight();
    });
</script>