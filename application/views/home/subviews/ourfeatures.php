<div class="section service">
    <!--------------------- Featured Product List HTML ------------------------------->
    <div class="container">
        <div class="row destacados">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"><?php echo $this->lang->line('homepage_how_we_are') ?></h2>
                <!--<p class="text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">Lorem ipsum dolor sit amet, consectetur adipiscing elit quisque mattis lorem ex, in facilisis arcu lacinia vitae, proin porta molestie urna, rhoncusLorem ipsum dolor sit amet, consectetur adipiscing elit quisque mattis lorem ex, in facilisis arcu lacinia vitae, proin porta molestie urna, rhoncus</p>-->
            </div>
            <?php if (!empty($foodDrinks)): ?>
                <div class="col-md-4">
                    <div class="titbecontenbg">
                        <img src="<?php echo UPLOAD_PATH . 'page/' . $foodDrinks['image'] ?>" alt="<?php echo $foodDrinks['title'] ?>" class="img-circle img-thumbnail">
                        <h2><?php echo $foodDrinks['title'] ?></h2>
                        <p><?php echo chop_string($foodDrinks['content'], 100); ?></p>
                        <a href="<?php echo site_url('pages/index/' . $foodDrinks['slug']) ?>" class="btn btn-primary readmorebg" title="Enlace">Read More »</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-md-4">
                    <div class="titbecontenbg">
                        <img src="<?php echo ASSETS_SITE_IMAGE_PATH ?>foodimg-1.png" alt="Texto Alternativo" class="img-circle img-thumbnail">
                        <h2>Special Foods &amp; Drinks</h2>
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>-->
                        <a href="<?php echo site_url('pages/foodanddrinks') ?>" class="btn btn-primary readmorebg" title="Enlace">Read More »</a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($professionalChefs)): ?>
                <div class="col-md-4">
                    <div class="titbecontenbg">
                        <img src="<?php echo UPLOAD_PATH . 'page/' . $professionalChefs['image'] ?>" alt="<?php echo $professionalChefs['title'] ?>" class="img-circle img-thumbnail">
                        <h2><?php echo $professionalChefs['title'] ?></h2>
                        <p><?php echo chop_string($professionalChefs['content'], 100); ?></p>
                        <a href="<?php echo site_url('pages/index/' . $professionalChefs['slug']) ?>" class="btn btn-primary readmorebg" title="Enlace">Read More »</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-md-4">
                    <div class="titbecontenbg">
                        <img src="<?php echo ASSETS_SITE_IMAGE_PATH ?>cheif.png" alt="Texto Alternativo" class="img-circle img-thumbnail">
                        <h2>Professional Chefs</h2>
                        <!---<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>-->
                        <a href="<?php echo site_url('pages/profchefs') ?>" class="btn btn-primary readmorebg" title="Enlace">Read More »</a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($perfectRecipes)): ?>
                <div class="col-md-4">
                    <div class="titbecontenbg">
                        <img src="<?php echo UPLOAD_PATH . 'page/' . $perfectRecipes['image'] ?>" alt="<?php echo $perfectRecipes['title'] ?>" class="img-circle img-thumbnail">
                        <h2><?php echo $perfectRecipes['title'] ?></h2>
                        <p><?php echo chop_string($perfectRecipes['content'], 100); ?></p>
                        <a href="<?php echo site_url('pages/index/' . $perfectRecipes['slug']) ?>" class="btn btn-primary readmorebg" title="Enlace">Read More »</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-md-4">
                    <div class="titbecontenbg">
                        <img src="<?php echo ASSETS_SITE_IMAGE_PATH ?>recipi.png" alt="Texto Alternativo" class="img-circle img-thumbnail">
                        <h2>Perfect Recipes</h2>
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>--->
                        <a href="<?php echo site_url('pages/perfectrecipes') ?>" class="btn btn-primary readmorebg" title="Enlace">Read More »</a>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <!-------------------------------- End Featured Product list HTML -------------------------------------> 
</div>