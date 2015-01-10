<?php
 /*Template Name: Portfolio
 */
 
get_header(); ?>
<div class="row">
    <div class="eight columns">
    <div class="row">
        <section class="twelve columns">
            <h1><?php the_title(); ?></h1>
        </section>
    </div>
    <div class="row">

    <?php

    $team_members = array( 'post_type' => 'team_post', 'posts_per_page' => -1 );
    $loop = new WP_Query( $team_members );
    $x = 0;
    
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <section class="three columns gen-div <?php echo esc_html( get_post_meta( get_the_ID(), 'team_category', true ) ); ?> team"> 
                    <article class="twelve columns">
                        <img src="<?php the_field('display_picture'); ?>" alt="" />
                    </article>
		    <h5 class="gen-div-header"><?php the_title(); ?></h5>
		    <article class="gen-div-inner">
                    <p><?php echo esc_html( get_post_meta( get_the_ID(), 'team_position', true ) ); ?> <br />
                        <?php echo esc_html( get_post_meta( get_the_ID(), 'team_phone', true ) ); ?> <br />
                        <a href="mailto:<?php echo esc_html( get_post_meta( get_the_ID(), 'team_email', true ) ); ?>">
                            <?php echo esc_html( get_post_meta( get_the_ID(), 'team_email', true ) ); ?>
                        </a>
                    </p>
                </article>
            </section>
            <?php if($x == 3) { $x = -1; echo '</div><div class="row">'; } ?>
    <?php $x++; ?>
    <?php endwhile; ?>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>