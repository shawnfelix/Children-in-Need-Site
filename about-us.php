<?php
/*
Template Name: about-us
*/
?>
<?php
/**
 * This template displays the default page content.
 *
 */

get_template_part('header-no-image'); ?>

<?php $thumb = ( get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'giving-featured-large' ) : false; ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<section id="team">
        <div style="margin-top:30px">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="headline">Our Team</h1>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 fade-in one">
                    <div class="team-member">
                        <img class="profile-pic img-responsive img-circle" src="/wp-content/themes/givingpress-lite/images/profilepics/jeanette-profile-pic.png" alt="">
                        <h4 style="font-weight: bold; text-align: center;">Jeanette Felix</h4>
                        <div class="text-muted" style="width:100%; padding-bottom:10px;">Founder and President</div>
                        <div>
                            <div id="footer-social-wrapper">
                              <div id="fb-icon"></div>
                              <div id="email-icon"></div>
                            </div>
                        </div>
                        <div class="list-inline social-buttons" style="text-align:center; margin: 0 auto; padding: 0 11px;">
                           <p> A short but informative bio will go here. The images will be professional headshots taken at a photography studio soon!</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 fade-in two">
                    <div class="team-member">
                        <img class="profile-pic img-responsive img-circle" src="/wp-content/themes/givingpress-lite/images/profilepics/chris-profile-pic.png" alt="">
                        <h4 style="font-weight: bold; text-align: center;">Chris Felix</h4>
                        <div class="text-muted" style="width:100%; padding-bottom:10px;">Vice-President</div>
                        <div>
                        <div id="footer-social-wrapper">
                          <div id="fb-icon"></div>
                          <div id="email-icon"></div>
                        </div>
                        </div>
                        <div class="list-inline social-buttons" style="text-align:center; margin: 0 auto; padding: 0 11px;">
                           <p> A short but informative bio will go here. The images will be professional headshots taken at a photography studio soon!</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 fade-in three">
                    <div class="team-member">
                        <img class="profile-pic img-responsive img-circle" src="/wp-content/themes/givingpress-lite/images/profilepics/sharon-profile-pic.png" alt="">
                        <h4 style="font-weight: bold; text-align: center;">Sharon Cushing</h4>
                        <div class="text-muted" style="width:100%; padding-bottom:10px;"> Executive Coordinator</div>
                        <div>
                            <div id="footer-social-wrapper">
                              <div id="fb-icon"></div>
                              <div id="email-icon"></div>
                            </div>
                        </div>
                        <div class="list-inline social-buttons" style="text-align:center;     margin: 0 auto; padding: 0 11px;">
                           <p> A short but informative bio will go here. The images will be professional headshots taken at a photography studio soon!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:50px">
                <div class="col-lg-12 text-center">
                    <h1 class="headline">Our Teachers</h1>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <img src="/wp-content/themes/givingpress-lite/images/teacherspicture.png" class="img-responsive"/>
            </div>
            <div class="row">
                Some text will go here
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>
