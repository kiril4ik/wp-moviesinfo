<?php ob_start(); ?>
	<h1>Top <?=$params['posts_num']?> posts</h1>
	<ul class="list-group">
<?php foreach ( $posts_array as $post ) { ?>
	<li class="list-group-item">
	<h3><?=$post->post_title?></h3>
	<p><?=get_the_excerpt($post)?></p>
	</li>
<?php } ?>
	</ul>

<?php return ob_get_clean();