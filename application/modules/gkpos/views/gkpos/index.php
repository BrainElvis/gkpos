<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $template['partials']['left_sidebar'] ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 bodyitem">
                <?php echo $this->load->view('gkpos/partials/keyboard_setting') ?>
                <div id="MiddleContent"></div>
                <div id="customerInformation"></div>
            </div>
            <?php echo $template['partials']['right_sidebar'] ?>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        setPhoneNumKeys('phone');
        manageWindowHeight();
    });
    function getPage(url, info) {
        $.ajax({
            url: url,
            type: "GET",
            data: {
                info: info
            },
            success: function (output) {
                $('#MiddleContent').html('');
                $('#MiddleContent').append(output);
            },
            complete: function (xhr, status) {
                console.log("The request is complete!");
            }

        });
    }

</script>
