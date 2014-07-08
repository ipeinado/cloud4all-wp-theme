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
        </div> <!-- Video overlay -->

        <div id="video-container">
          <video controls id="home-video" width="580px" height="320px">
            <source type="video/ogg;codecs=theora,vorbis" src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Cloud4ll-Train.oggtheora.ogv" />
            <source type="video/webm;codecs=vp8,vorbis" src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Cloud4ll-Train.webmhd.webm" />
            <source type='video/mp4' src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Cloud4ll-Train.mp4" />
              <p>Sorry, your browser does not seem to support <code>HTML5 video</code></p>
          </video>
        </div>
      </div> <!-- Video Container -->

    </div> <!-- Project banner -->

    <div class="row" id="sections-banner" role="banner">

      <div class="section" id="research-section">
        <h2>Research</h2>
        <p>Cloud4all is a research project that is moving beyond the state of the art in several aspects. Discover our research!</p>
        <a href="<?php echo home_url('/research/'); ?>" class="section-link" title="Read more about our research and its results">Read more</a>
      </div>

      <div class="section" id="development-section">
        <h2>Development</h2>
        <p>Cloud4all is builiding an infrastructure that will be implemented in the real world. <strong>Join the effort!</strong></p>
        <a href="<?php echo home_url('/development/'); ?>" class="section-link" title="Read more about the developments that are taking place within Cloud4all">Read more</a>
      </div>

      <div class="section" id="dissemination-section">
        <h2>Dissemination</h2>
        <p>We are present in events all around the globe. Learn more about our vision, contact us and collaborate with us!</p>
        <a href="<?php echo home_url('/dissemination/'); ?>" class="section-link" title="Read more about our dissemination activities">Read more</a>
      </div>

    </div> <!-- Sections banner -->

    <section class = "row" id="news-banner">
      <div id="news-section">
        <header>
          <a href="#">Go to news</a>
          <h2>News</h2>
        </header>
        <ul class="news-list"> 

          <?php $the_query = new WP_Query( 'posts_per_page=4, category_name=news'); ?>

          <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
            <li class="news-item">
              <?php
                if( has_post_thumbnail() ) { ?>
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                <?php } else { ?>
                  <a href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/default_news_icon.png" width="50x" height="50px" title="<?php the_title(); ?>" /></a>
                <?php } ?>
                  <div class="news-content">
                    <a class="news-headline" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    <p class="news-date"><?php the_date(); ?></p>
                    <p><?php the_excerpt(); ?></p>
                  </div>
              </li>
          <?php endwhile;?>
        </ul>
      </div> <!-- news-section -->

      <div id="tweets-feed">
        <header>
          <h2>Tweets</h2>
          <a href="https://twitter.com/Cloud4all7FP" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @Cloud4all7FP</a>
        </header>
      </div>
     
    </section> <!-- news-banner -->

	</div><!-- #primary -->

<?php get_footer(); ?>