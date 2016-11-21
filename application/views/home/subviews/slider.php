<?php $sliders = getsliders();?>
<?php if (!empty($sliders)): ?>
    <section id="home">
        <div id="main-slide" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $count = 1; ?>
                <?php foreach ($sliders as $slide) : ?>
                    <div class="item <?php if ($count == 1) print"active" ?>">
                        <img class="img-responsive" src="<?php echo UPLOAD_PATH . 'slider/' . $slide->image ?>" alt="<?php isset($slide->title) ? print $slide->title : print'' ?>">
                        <div class="slider-content">
                            <div class="col-md-12 text-center">
                                <?php if (isset($slide->title)): ?>
                                    <h2 class="animated2"> <span><strong><?php isset($slide->title) ? print $slide->title : print'' ?></strong></span></h2>
                                <?php endif; ?>
                                <?php if (isset($slide->content)): ?>
                                    <h3 class="animated3"><span><?php isset($slide->content) ? print $slide->content : print'' ?></span></h3>
                                <?php endif; ?>
                                <?php if ($slide->is_hook == 1): ?>
                                    <div class="">
                                        <a class="btn-lg slider btn btn-system btn-large" href="<?php echo site_url($slide->hook_url) ?>"><?php isset($slide->hook) ? print$slide->hook : print "Order Online" ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php $count++; ?>
                <?php endforeach; ?>
            </div>
         <a class="left carousel-control" href="index.html#main-slide" data-slide="prev"><span><i class="fa fa-angle-left"></i></span></a>
        <a class="right carousel-control" href="index.html#main-slide" data-slide="next"><span><i class="fa fa-angle-right"></i></span></a>
        </div>
    </section>
<?php endif; ?>