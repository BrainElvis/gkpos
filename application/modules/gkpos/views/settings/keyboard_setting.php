<div class="fieldset text-uppercase text-center touch-enable-disbled">
    <legend><?php echo $this->lang->line('gkpos_touch_keyboard_enable_disable_setting') ?></legend>
    <div class="form-group">
        <label class="radio-inline is-touch  text-uppercase required"><input type="radio" name="is_touch" id="enable" value="enable" <?php ( $this->config->item('is_touch') == "enable") ? print "checked" : '' ?> ><?php echo $this->lang->line('gkpos_enable') ?></label>
        <label class="radio-inline is-touch  text-uppercase required"><input type="radio" name="is_touch" id="disable" value="disable" <?php ( $this->config->item('is_touch') == "disable") ? print "checked" : '' ?>><?php echo $this->lang->line('gkpos_disable') ?></label>
        <span  class="loading centered" id="keyboardAjaxLoading" style="display:none;"><img src="<?php echo ASSETS_GKPOS_PATH . 'images/ajax-loader.gif' ?>" alt="Loading..."/></span>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('input:radio[name=is_touch]').click(function () {
            $("#keyboardAjaxLoading").show();
            var is_touch = $(this).val();
            $.post("<?php echo site_url('gkpos/keyboard_setting') ?>", {is_touch: is_touch}, function (output) {
                if (output === 1) {
                    $("#keyboardAjaxLoading").hide();
                    getBaseAjaxPage('<?php echo site_url("gkpos/settings/" . $current_page) ?>', '<?php echo $current_page?>')
                }
            }, 'json');
        })
    });

</script>