<footer id="gkposFooter">
    <div class="container-fluid">
        <div class="col-md-4 pull-left text-left back"><span class="back-button" onclick="goBack()">BACK</span></div>
        <div class="col-md-4"><p class="text-center"><a href="http://gksoft.co.uk"><?php echo $this->lang->line('gkpos_powered_by') ?>:<img src="<?php echo ASSETS_GKPOS_PATH ?>images/gk-logo.png" width="98" height="47" /></a></p></div>
        <div class="col-md-4 pull-right text-right back"><span class="back-button" onclick="goBack()">BACK</span></div>
    </div>
</footer>
<a class='warningPopup' href="#warningPopup" style="display:none"></a>
<div style="display:none">
    <div id="warningPopup" class="popupouter">
        <div class="popup-header row">
            <div id="warningPopupHeader" class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pull-left "></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-left closeWarningPopup text-center times">&times;</div>
        </div>
        <div class="popup-body row">
            <div id="warningPopupContent" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
        </div>
        <div class="popup-footer row">
            <a href="javascript:void(0)" class="closeWarningPopup text-center btn btn-default col-md-offset-5 col-md-2 col-md-offset-5"><?php echo $this->lang->line('gkpos_close') ?></a>
        </div>
    </div>
</div>
<style>
    #cboxClose{
        display: none;
    }
</style>
<script>
    jQuery(document).ready(function () {
        jQuery(".closeWarningPopup").click(function () {
            jQuery.colorbox.close();
            return false;
        });
    });
</script>