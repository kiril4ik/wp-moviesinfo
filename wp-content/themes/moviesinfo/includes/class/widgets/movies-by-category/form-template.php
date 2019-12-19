<p>
    <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
           name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"
           placeholder="Enter new title"/>
</p>

<p>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <label class="input-group-text" for="<?php echo $this->get_field_name( 'category' ); ?>">Movie genre</label>
    </div>
    <select class="custom-select" id="<?php echo $this->get_field_id( 'category' ); ?>"
            name="<?php echo $this->get_field_name( 'category' ); ?>">
        <option <?php if ( is_null( $category ) ) {
			echo 'selected';
		} else {
			echo 'hidden';
		} ?>>Choose...
        </option>

		<?php
		$terms = get_terms( array(
			'taxonomy'   => 'movie_genre',
			'hide_empty' => true
		) );
		foreach ( $terms as $term ) {
			$sel = '';
			if ( $category == $term->name ) {
				$sel = ' selected ';
			}
			echo "<option value='{$term->name}'$sel>{$term->name}</option>";
		}
		?>
    </select>
</div>
</p>

<p>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <label class="input-group-text" for="<?php echo $this->get_field_name( 'sort_order' ); ?>">Order</label>
    </div>
    <select class="custom-select" id="<?php echo $this->get_field_id( 'sort_order' ); ?>"
            name="<?php echo $this->get_field_name( 'sort_order' ); ?>">
    <option <?php if ( is_null( $category ) ) {
		echo 'selected';
	} else {
		echo 'hidden';
	} ?>>Choose...
    </option>
    <option value='ASC' <?php if ( $sort_order == 'ASC' )
		echo ' selected ' ?>>Ascending
    </option>
    <option value='DESC' <?php if ( $sort_order == 'DESC' )
		echo ' selected ' ?>>Descending
    </option>
    </select>
</div>
</p>
