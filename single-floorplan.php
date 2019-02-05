<?php get_header(); ?>
<section id="main">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php the_content(); ?>

                <div class="container">
                    <div class="row">
                        <div class="col d-none d-lg-block img-container">
                            <img src="<?=IMGURL?>argyle3d.png" alt="3d View">
                        </div>
                        <div class="col full-height">
                            <div>
                                <div class="row">
                                    <div class="col floor-header number-header">
                                        <h2>$223,000-$226,500</h2>

                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                            nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut
                                            wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                                            lobortis nisl ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>
                                <div class="row full-height">
                                    <div class="col floor-header">
                                        <h3>ARGYLE</h3>
                                    </div>
                                    <div class="col img-container d-lg-none">
                                        <img src="<?=IMGURL?>argyle3d.png" alt="3d View">
                                    </div>
                                    <div class="col">
                                        <table class="floorplan" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td>FLOORPLAN</td>
                                                <td>SINGLE STORY
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>LIVING AREA
                                                </td>
                                                <td>1750 SQ. FT
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>BEDROOMS
                                                </td>
                                                <td>4</td>
                                            </tr>
                                            <tr>
                                                <td>BATHEOOMS
                                                </td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <td>PRICE
                                                </td>
                                                <td><span class="brand">$280,000</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row row-buttons">
                                    <div class="col">


                                        <a href="<?=SITEURL?>/contact-us/" class="contact-us">
                                            <button class="btn btn-primary">
                                                <span>SCHEDULE A TOUR</span>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <section class="more-properties">

                        <div class="row">
                            <div class="col text-center">
                                <h2>
                                    More Properties
                                </h2>
                            </div>
                        </div>



                        <?php
                        if ( get_query_var('paged') ) $paged = get_query_var('paged');
                        if ( get_query_var('page') ) $paged = get_query_var('page');
                 
                        $query = new WP_Query( array( 'posts_per_page' => 3, 'post_type' => 'floorplan', 'paged' => $paged, 'tax_query' => array(
                            array(
                                'taxonomy' => 'neighborhood',
                                'field' => 'slug',
                                'terms' => 'westside'
                            )
                            ), ) );

                        $posts_per_row = 3;
                        $post_counter = 0;

                        if ( $query->have_posts() ) : ?>


                        <div class="floorplan-list">

                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <?php if( ( ++$post_counter % $posts_per_row ) == 1  || $posts_per_row == 1 ) :
                                if( $post_counter > 1 ) :
                                    echo '</div>';
                                endif;
                            echo '<div class="row">';
                            endif;
                            ?>
                            <div class="col entry">

                                <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <div>
                                        <?php the_post_thumbnail(); ?>

                                        <h2 class="title"><?php the_title(); ?></h2>
                                    </div>
                                </a>
                                <?php else: ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <div class="coming-soon">

                                        <h2><?php the_title(); ?>
                                        </h2>

                                    </div>
                                </a>
                                <?php endif; ?>


                            </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                        <!-- show pagination here -->
                        <?php else : ?>
                        <!-- show 404 error here -->
                        <?php endif; ?>


                    </section>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?php get_footer(); ?>