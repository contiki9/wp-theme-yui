<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// アイキャッチ画像のIDを取得
$thumbnail_id = get_post_thumbnail_id();
// mediumサイズの画像内容を取得（引数にmediumをセット）
$thum = get_the_post_thumbnail_url(get_the_ID(), 'medium');

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="l-left">
        <?php if ($thum): ?>
            <div class="post-thumbnail" style="background-image:url('<?php echo $thum; ?>');"></div>
        <?php else: ?>
            <div class="post-thumbnail op-no-imege" style="background-image:url('<?php echo esc_url(get_stylesheet_directory_uri() . '/images/no-image.svg'); ?>');"></div>
        <?php endif; ?>
    </div>
    <div class="l-right">
        <header class="entry-header">

            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
                '</a></h2>'); ?>

            <?php if ('post' == get_post_type()) : ?>

                <div class="entry-meta">
                    <?php understrap_posted_on(); ?>
                </div><!-- .entry-meta -->

            <?php endif; ?>

        </header><!-- .entry-header -->


        <div class="entry-content">

            <?php
            the_excerpt();
            ?>

            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'yui'),
                'after' => '</div>',
            ));
            ?>

        </div><!-- .entry-content -->

        <footer class="entry-footer">

            <?php understrap_entry_footer(); ?>

        </footer><!-- .entry-footer -->
    </div>

</article><!-- #post-## -->
