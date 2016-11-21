<div class="container">    
    <div class="row">
        <div class="contactbg">
            <h1 class="modal-header">
                  <?php isset( $title)? print $title: print'NO TITLE'; ?>
            </h1>
            <?php if (isset($image) && ($image != NULL || $image != '')): ?>
                <a class="post-image" href="<?php echo site_url('pages/index/' . $slug) ?>">
                    <img style="max-width: 100%;max-height:150px;" class="media-object thumbnail" src="<?php echo UPLOAD_PATH . 'page/' . $image ?>" tile="<?php echo $title ?>">
                </a>
            <?php endif; ?>
            <div class="media-body">
                <?php if (isset($content)): ?>
                    <p><?php echo $content ?></p>
                <?php else: ?>
                    <?php echo $this->lang->line('common_not_found') ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>