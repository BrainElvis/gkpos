<div class="container">   
    <div class="clearfix"></div>
    <div class="row">
        <div class=" col-md-12 text-uppercase"><?php echo $current_section ?></div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>             
                    <div class="well">
                        <div class="media">
                            <?php if ($post->image): ?>
                                <a class="pull-left" href="<?php echo site_url('pages/index' . $post->slug) ?>">
                                    <img width="150px" height="125px" class="media-object thumbnail" src="<?php echo UPLOAD_PATH . 'page/' . $post->image ?>" tile="<?php echo $post->title ?>">
                                </a>
                            <?php endif; ?>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $post->title ?></h4>
                                <p><?php echo substr($post->content, 0, 150) ?></p>
                            <p><a href="<?php echo site_url('pages/index/' . $post->slug) ?>"><?php echo $this->lang->line('common_read_more') ?><span>&raquo;</span></a></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <ul class="pagination pagination-sm">
                    <?php echo $pagination; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>

