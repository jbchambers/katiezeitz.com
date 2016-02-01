<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section class="panel landing">
        <div class="container">
        <div class="content">
            <h1>Katie Zeitz</h1>

            <p>San Diego Singer-Songwriter</p>

            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                <div class="social">
                    <a class="facebook" href="https://www.facebook.com/katie.zeitz" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="twitter" href="#" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="instagram" href="#" target="_blank">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a class="soundcloud" href="#" target="_blank">
                        <i class="fa fa-soundcloud"></i>
                    </a>
                    <a class="youtube" href="#" target="_blank">
                        <i class="fa fa-youtube-play"></i>
                    </a>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-toggle="modal" data-target="#myModal">
                    Book Katie
                </button>

            </div>
        </div>
        </div>
    </section>
    <section class="panel music">
        <div class="content">
            <div class="container">
                <h2>Music</h2>
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <iframe width="100%" height="315" scrolling="no" frameborder="no"
                            src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/63248692&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="panel videos">
        <div class="container">
            <h2>Videos</h2>
            <div class="video-slider col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2">
                <div class="video">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/UR-hVt0Bnuk?rel=0"></iframe>
                    </div>
                </div>
                <div class="video">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/I3En7dtnowA?rel=0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="panel blog">
        <div class="container">
            <h2>Blog</h2>
                <div class="blog-slider">
                    <?php $args = array ('post_type' => array( 'post' ), 'post_status' => array( 'publish' ),); ?>
                    <?php $query = new WP_Query( $args );?>
                    <?php if ( $query->have_posts()){ while ( $query->have_posts() ) { $query->the_post(); ?>
                        <div class="col-sm-6 col-lg-4 post">
                            <article>
                                <?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive center-block' ) ); ?>
                                <h2><?php the_title(); ?></h2>
                                <?php the_excerpt(); ?>
                            </article>
                        </div>
                    <?php }} else {} wp_reset_postdata();?>
                </div>
        </div>
    </section>
    <section class="panel contact">
        <div class="container">
            <h2>Contact</h2>
            <p>Consequatur eius expedita nam neque nobis odio optio suscipit veritatis voluptate. Aut deserunt iure nihil!</p>
            <?php gravity_form(1, false, true, false, null, false); ?>
        </div>
    </section>


<?php endwhile;
else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?php gravity_form(1, false, false, false, '', false); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {
        $('.video-slider').slick({
            dots: true,
            arrows: true
        });
        $('.blog-slider').slick({
            dots: true,
            infinite: false,
            arrows: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });

</script>