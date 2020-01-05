<?php ob_start(); ?>
	<ul class="list-group similar-list-group" style="list-style: none;">
        <li>Similar movies on IMDB</li>
<?php foreach ( $movies as $movie ) { ?>
	<li class="list-group-item">
	<a href="https://www.imdb.com/title/<?=$movie->imdbID?>/" target="_blank"><?=$movie->Title . ' - ' . $movie->Year; ?></a>
	</li>
<?php } ?>
	</ul>
<?php return ob_get_clean();