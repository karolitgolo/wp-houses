<?php

use ITGolo\Houses\Modules\Front\Services\CreatorQuery;

get_header();
$typyDomow = array(
    'jednorodzinny' => 'Jednorodzinny',
    'blizniak' => 'Bliźniak',
    'szeregowka' => 'Szeregówka'
);
?>
<style>
    article{overflow: auto;}
    .filtr {margin: 0 0 15px;}
    .filtr label {display:inline-block;}
</style>
<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div class="filtr">
                <form method="GET" action="<?php echo home_url('domy') ?>">
                <label for="typy-domow">Filtr - typ domów:</label>
                <select name="typy-domow" id="typy-domow"  onchange='if(this.value != 0) { this.form.submit(); }'>
                    <?php foreach (CreatorQuery::getTypyDomow() as $value => $text): ?>
                        <option value="<?php echo esc_attr($value); ?>" <?php if (CreatorQuery::isSelectedTypDomu($value)) :echo 'selected="selected"';
                    endif;
                        ?>>
                        <?php echo esc_html($text); ?>
                        </option>
<?php endforeach; ?>
                </select>
                </form>
            </div>

            <?php
            $query = CreatorQuery::query();
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    ?>
            <hr>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <?php twentyseventeen_edit_link(get_the_ID()); ?>
                              <?php if ('' !== get_the_post_thumbnail() && !is_single()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('twentyseventeen-featured-image'); ?>
                                </a>
                            </div><!-- .post-thumbnail -->
        <?php endif; ?>
                        </header><!-- .entry-header -->
                        
                        <div class="entry-content">
                            <?php
                            the_content();

                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . __('Pages:', 'twentyseventeen'),
                                'after' => '</div>',
                            ));
                            ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->

                    <?php
                    

                endwhile; // End of the loop.
            endif;
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
