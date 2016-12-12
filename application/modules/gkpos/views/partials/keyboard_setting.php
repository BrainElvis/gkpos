<div class="fieldset text-uppercase text-center touch-enable-disbled">
    <legend><?php echo $this->lang->line('gkpos_touch_keyboard_enable_disable_setting') ?></legend>
    <div class="form-group">
        <label class="radio-inline is-touch  text-uppercase required"><input type="radio" name="is_touch" id="enable" value="enable" <?php ( $this->config->item('is_touch') == "enable") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_enable') ?></label>
        <label class="radio-inline is-touch  text-uppercase required"><input type="radio" name="is_touch" id="disable" value="disable" <?php ( $this->config->item('is_touch') == "disable") ? print "checked" : '' ?>><?php echo $this->lang->line('gkpos_disable') ?></label>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('input:radio[name=is_touch]').click(function () {
            var is_touch = $(this).val();
            $.post("<?php echo site_url('gkpos/keyboard_setting') ?>", {is_touch: is_touch}, function (output) {
                if (output === 1) {
                    window.location.reload();
                }
            }, 'json');
        })
    });
    
</script>