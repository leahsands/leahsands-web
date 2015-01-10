<?php
 /*Template Name: Portfolio
 */
 
get_header(); ?>
<div id="portfolio" class="row">
    <div class="info">
        <section class="row title">
            <h1><?php the_title(); ?></h1>
        </section>
        <section class="row dscrp">
            <div class="gen-div">
                <div class="row">
                    <?php echo esc_html( get_post_meta( get_the_ID(), 'description', true ) ); ?> 
                </div>
                <div class="row category">
                    <?php
                    $categories = get_the_category();
                    $separator = ' // ';
                    $output = '';
                    if($categories){
                        foreach($categories as $category) {
                            $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" target="_blank">'.$category->cat_name.'</a>'.$separator;
                        }
                    echo trim($output, $separator);
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
    <div class="body">
        <section class="twelve columns">
                <?php the_field('portfolio_images'); ?> 
        </section>
    </div>
</div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>