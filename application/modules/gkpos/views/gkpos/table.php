<div class="body-vertical-align-center">
    <div class="pin-calculatorbg collection-pin-calculatorbg">
        <div class="middlebg">
            <p class="sidebar-heading text-center text-center text-uppercase table-order-header"><?php echo $this->lang->line('gkpos_table_info') ?></p>
        </div>
        <div id="TableNumber" class="col-md-6 pull-left">
            <p class="sidebar-heading text-center text-center text-uppercase"><?php echo $this->lang->line('gkpos_table') ?>&nbsp;<?php echo $this->lang->line('gkpos_number') ?></p>
            <input type="text" id="table_number" name="table_number" class="form-control" id="inputEmail3" placeholder="<?php echo $this->lang->line('gkpos_table') ?>&nbsp;<?php echo $this->lang->line('gkpos_number') ?>">
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

        <div id="GuestQuantity" class="col-md-6 pull-right">
            <p class="sidebar-heading text-center text-center text-uppercase"><?php echo $this->lang->line('gkpos_quantity_of_guest') ?></p>
            <input type="text" name="guest_quantity" id="guest_quantity" class="form-control" placeholder="<?php echo $this->lang->line('gkpos_quantity_of_guest') ?>">
            <ul>
                <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key1') ?></li>
                <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key2') ?></li>
                <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key3') ?></li>
            </ul>
            <ul>
                <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key4') ?></li>
                <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key5') ?></li>
                <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key6') ?></li>
            </ul>
            <ul>
                <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key7') ?></li>
                <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key8') ?></li>
                <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key9') ?></li>
            </ul>
            <ul>
                <li class="btnPin2"><?php echo $this->lang->line('gkpos_numpad_key_del') ?></li>
                <li class="numkey2"><?php echo $this->lang->line('gkpos_numpad_key0') ?></li>
                <li class="btnPin2"><?php echo $this->lang->line('gkpos_numpad_key_clr') ?></li>
            </ul>
        </div>

    </div>

    <div class="last-calculatorbg collection-last-calculatorbg table-order-numpad-enter">
        <ul>
            <li><a href="javascript:void(0)" onclick="submitTableInfo()"><?php echo $this->lang->line('gkpos_numpad_key_enter') ?></a></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        setnumkeys('table_number');
        setnumkeys2('guest_quantity');
        manageWindowHeight();
    });
    function submitTableInfo() {
        var tableNumber = $("#table_number").val();
        var guestQuantity = $("#guest_quantity").val();
        alert(tableNumber + " " + guestQuantity);

    }
</script>