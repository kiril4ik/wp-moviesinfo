<?php

namespace Core;

class Custom_Metabox extends Base_Metabox {
    private $display_post_type;

	function __construct($id, $title, $display_post_type = "", $screen = null, $context = 'advanced', $priority = 'default', $callback_args = null) {
		$this->display_post_type = $display_post_type;
		$this->id = $id;
		$this->title = $title;
		$this->screen = $screen;
		$this->context = $context;
		$this->priority = $priority;
		$this->callback_args = $callback_args;

		if ($this->display_post_type != "") {
			add_action( 'add_meta_boxes_' . $display_post_type, array( &$this, 'init' ) );
		} else {
			add_action( 'add_meta_boxes', array( &$this, 'init' ) );
        }
        add_action('save_post', array($this, 'save'));
	}

	public function save( $postID ) {
		if ( array_key_exists( $this->id, $_POST ) ) {
			update_post_meta(
				$postID,
				$this->id,
				$_POST[$this->id]
			);
		}
	}

	public function render( $post ) {
	    if ($this->display_post_type == "" || get_post_type() == $this->display_post_type) {
		?>
		<label for="<?=$this->id?>"><?=$this->title?></label>
		<input type="text" name="<?=$this->id?>" id="<?=$this->id?>"
		       value="<?php $post = get_post(); $metaId = $this->id; echo $post->$metaId;?>">
		<?php
        }
	}
}
