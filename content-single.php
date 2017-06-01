<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ThemeGrill
 * @subpackage Spacious
 * @since Spacious 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'spacious_before_post_content' ); ?>
	<div class="entry-content clearfix">
		<?php
			the_content();

			$photo_album_links = get_post_meta( get_the_ID(), 'photo-album-link' );
			if( !empty( $photo_album_links ) ) {
		?>
				<div class="tags">
					<span class="tags-label"><?php _e( 'Albums', 'spacious' ); ?></span>
					<span class="tags-container">
		<?php
				foreach ($photo_album_links as $link) {
					$link_obj = json_decode( $link );
		?>
						<a href="<?php echo $link_obj->url; ?>"><?php echo $link_obj->name; ?></a>
		<?php
				}
		?>
					</span>
				</div>
		<?php
			}

			$spacious_tag_list = get_the_tag_list( '', ' ', '' );
			if( !empty( $spacious_tag_list ) ) {
		?>
				<div class="tags">
					<span class="tags-label"><?php _e( 'Tags', 'spacious' ); ?></span>
					<span class="tags-container"><?php echo $spacious_tag_list; ?></span>
				</div>
		<?php
			}

			$spacious_category_list = get_the_category_list( ' ' );
			if( !empty( $spacious_category_list ) ) {
		?>
				<div class="tags">
					<span class="tags-label"><?php _e( 'Categories', 'spacious' ); ?></span>
					<span class="tags-container"><?php echo $spacious_category_list; ?></span>
				</div>
		<?php
			}
		?>
	</div>

	<?php spacious_entry_meta(); ?>

	<?php
	do_action( 'spacious_after_post_content' );
   ?>
</article>