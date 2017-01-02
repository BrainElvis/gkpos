<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 right-item">
    <?php echo $this->load->view('gkpos/partials/keyboard_setting') ?>
    <div class="sidebar-heading text-center text-uppercase"><?php echo $this->lang->line('gkpos_type_phone_number')?></div>
    <div class="pin-calculatorbg">
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
    <div class="rightbox-buttongbg">
        <a href="<?php echo site_url('gkpos/orders') ?>"><div class="center-div center-block collection-bg text-center"><h3><?php echo $this->lang->line('gkpos_finished') ?></h3></div></a>
        <a href="<?php echo site_url('gkpos') ?>"><div class="center-div center-block waiting-bg text-center"><h3><?php echo $this->lang->line('gkpos_cancel') ?></h3></div></a>
    </div>
</div>