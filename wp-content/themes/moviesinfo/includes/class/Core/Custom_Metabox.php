<?php

namespace Core;

/*
 * Class for rendering and saving metabox field. Implementation of save and render method.
 */
class Custom_Metabox extends Base_Metabox {

	/**
	 * Saving field from admin panel to current post meta field.
	 *
	 * @param integer $postID
	 *
	 * @return null
	 */
	public function save( $postID ) {
		if ( array_key_exists( $this->id, $_POST ) ) {
			update_post_meta(
				$postID,
				$this->id,
				$_POST[ $this->id ]
			);
		}
	}

	/**
	 * Rendering input field with existing value to admin panel.
	 *
	 * @param object $post
	 *
	 * @return null
	 */
	public function render( $post ) {
		?>
        <label for="<?= $this->id ?>"><?= $this->title ?></label>
        <input type="text" name="<?= $this->id ?>" id="<?= $this->id ?>"
               value="<?php $post = get_post();
		       $metaId            = $this->id;
		       echo $post->$metaId; ?>">
		<?php
	}
}
