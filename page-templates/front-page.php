<?php
/**
 * Template Name: Front Page Template for the Cloud4all Website
 *
 * Description: This page is the homepage of the Cloud4all website. 
 * The front page template for Cloud4all comprises a set of dedicated 
 * widgets and elements, aiming to become a proper landing page --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

  <div id="primary" class="site-content">
    <div id="content" role="main">
      <div id="project-banner" role="banner">

        <div id="video-overlay">
          <h1>Working to make a more accessible world</h1>
          <p>Imagine that all the devices you use during the day could automatically adapt to your needs and preferences. Cloud4all, an EC-funded project from the 7th European Framework, is working to turn this vision into reality. <a href="<?php echo home_url('/the-project/'); ?>">Want to learn more?</a></p>
          <a id="video-play-link" href="#">Play Video</a>
        </div>

        <div id="video-container">
          <video controls id="home-video" width="580px" height="320px">
            <source type="video/ogg;codecs=theora,vorbis" src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Cloud4ll-Train.oggtheora.ogv" />
            <source type="video/webm;codecs=vp8,vorbis" src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Cloud4ll-Train.webmhd.webm" />
            <source type='video/mp4' src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Cloud4ll-Train.mp4" />
              <p>Sorry, your browser does not seem to support <code>HTML5 video</code></p>
          </video>
        </div>
      </div>
    </div>
	</div><!-- #primary -->


<?php get_footer(); ?>