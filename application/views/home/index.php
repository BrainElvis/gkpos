<?php
?>
<!--------------------------- Slider ---------------------->
<?php if (isset($template['partials']['home_slider'])): ?>
    <?php echo $template['partials']['home_slider'] ?>
<?php endif; ?>
<!--------------------------------------------------------->

<section id="restStatus">
    <div class="container-fluid">
        <marquee behavior="alternate" scrollamount="5"><h3 class="marquee-text <?php $this->session->userdata('restaurant_status') == 1 ? print'opened-status' : print'closed-status' ?>"></h3></marquee>
    </div>
</section>

<!----------------------------We Serve -------------------->
<?php if (isset($template['partials']['home_weserve'])): ?>
    <?php echo $template['partials']['home_weserve'] ?>
    <!--------------------------------------------------------->
<?php endif; ?>
<!----------------------------Menu Horizontal Slider ------>
<?php if (isset($template['partials']['home_menucarousel'])): ?>
    <?php echo $template['partials']['home_menucarousel'] ?>
<?php endif; ?>
<!--------------------------------------------------------->
<!----------------------------Our Feature ----------------->
<?php if (isset($template['partials']['home_ourfeatures'])): ?>
    <?php echo $template['partials']['home_ourfeatures'] ?>
<?php endif; ?>
<!--------------------------------------------------------->
<!-------------------------Client Testimonials------------->
<?php if (isset($template['partials']['home_testimonials'])): ?>
    <?php echo $template['partials']['home_testimonials'] ?>
<?php endif; ?>
<!--------------------------------------------------------->

<script>
    jQuery(document).ready(function () {
        checkrest();
    });
</script>