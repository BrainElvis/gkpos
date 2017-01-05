<section id="body">
    <div class="container-fluid bodyitem">
        <div class="row">
            <?php echo $this->load->view('gkpos/settings/left_sidebar') ?>
            <div id="MiddleContent">
                <?php echo $this->load->view('gkpos/settings/indexcontent') ?>
            </div>
            <?php echo $this->load->view('gkpos/settings/right_sidebar') ?>
        </div>
    </div>
</section>
<script>
    function getSettingPage(url, info) {
        $.ajax({
            url: url,
            type: "POST",
            data: {
                info: info
            },
            success: function (output) {
                $('#MiddleContent').html('');
                $('#userPageHeading').html('');
                $('#userPageHeading').html('');
                if (Array.isArray(info)) {
                    $('#userPageHeading').append(info[2]);
                } else {
                    $('#userPageHeading').append(info);
                }
                $('#MiddleContent').append(output);
                manageWindowHeight();
            },
            complete: function (xhr, status) {
                console.log("The request is complete!");
            }

        });
    }
</script>
