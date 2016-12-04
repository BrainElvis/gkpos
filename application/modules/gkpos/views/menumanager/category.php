<section id="body">
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->load->view('gkpos/menumanager/left_sidebar') ?>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 bodyitem">
                body content goes here 
            </div>
             <?php echo $this->load->view('gkpos/menumanager/right_sidebar') ?>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function () {
        manageWindowHeight();    
    });
</script>