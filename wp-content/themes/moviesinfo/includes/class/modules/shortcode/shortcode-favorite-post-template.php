<?php ob_start(); ?>
    <p class="add-to-fav-block <?php echo (is_user_logged_in())?"":"hide"; ?>" data-post-id="<?=$params['post_id']?>" data-is-fav="<?=$is_fav?>">
        <span class="glyphicon glyphicon-star<?php echo ($is_fav)?"":"-empty"; ?>"></span>
        <span class="text-fav text-fav-add <?php echo ($is_fav)?"hide":""; ?>">Add to favorites</span>
        <span class="text-fav text-fav-delete <?php echo ($is_fav)?"":"hide"; ?>">Remove</span>
    </p>
<?php return ob_get_clean();