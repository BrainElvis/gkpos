<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $template['partials']['left_sidebar'] ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 bodyitem">
                <?php echo $this->load->view('gkpos/subviews/keyboard_setting') ?>
            </div>
            <?php echo $template['partials']['right_sidebar'] ?>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        var height = screen.height - 211;
        $(".bodyitem").css({"min-height": height + "px"});
        $(".left-item").css({"min-height": height + "px"});
        $(".right-item").css({"min-height": height + "px"});
    });
</script>
