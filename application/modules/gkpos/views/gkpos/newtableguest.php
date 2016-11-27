
<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $template['partials']['left_sidebar'] ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 bodyitem">
                <div class="pin-calculatorbg">
                    <div class="middlebg2">
                        <p><?php echo $this->lang->line('gkpos_quantity_of_guest')?></p>
                        <p><input type="text" name="guest_quantity"  placeholder="<?php echo $this->lang->line('gkpos_quantity_of_guest')?>" id="guest_quantity" /></p>
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
                        <input type="hidden" name="pincode" id="pincode"/>
                        <li><a href="<?php echo site_url('gkpos')?>"><?php echo $this->lang->line('gkpos_numpad_key_enter') ?></a></li>
                    </ul>
                </div>
            </div>
            <?php echo $template['partials']['right_sidebar'] ?>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function () {
        setnumkeys('guest_quantity');
    });
</script>