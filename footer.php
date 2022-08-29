<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GMMB
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
		<div class="container">

            <?php if( have_rows('logos', 'option') ) : ?>
                <div class="column-content logo-column">
                    <?php while ( have_rows('logos', 'option') ) : the_row(); ?>
                        <div class="logos">
                            <?php
                            $image_logo = get_sub_field('column_image', 'option');
                            $brand_url = get_sub_field('brand_url', 'option');
                            ?>

                            <a href="<?php echo $brand_url; ?>" target="_blank" class="brand"><img src="<?php echo $image_logo['url'] ?>" alt="<?php echo $image_logo['name'] ?>" /></a>
                            <a href="<?php the_sub_field('column_url', 'option');?>" target="_blank"><?php the_sub_field('column_text', 'option');?></a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <div class="column-content footer-data">
                <?php //the_custom_logo(); ?>

                <?php if( get_field('column_text', 'option') ) { ?>
                    <?php echo get_field('column_text', 'option'); ?>
                <?php } ?>

                <?php if( have_rows('follow_us', 'option') ) : ?>
                    <div class="follow-us">
                        Follow us:
                        <?php while ( have_rows('follow_us', 'option') ) : the_row(); ?>
                            <a href="<?php the_sub_field('social_url', 'option');?>" target="_blank"><i class="fab <?php the_sub_field('font_icon', 'option');?>"></i></a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php if( get_field('copyright', 'option') ) { ?>
                    <?php echo get_field('copyright', 'option'); ?>
                <?php } ?>
            </div>

		</div><!-- .site-info -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
