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

      <div id="newsflash">
        <label id="newsflash_title"><a href="<?php echo home_url('/news/'); ?>" title="Check all the latest news">Latest</a></label>
        <ul>
            <?php $the_query = new WP_Query( 'showposts=5' ); ?>
            <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
              <li>
                <span class="news-date"><?php the_date('d-m-y'); ?></span>
                <span class="permalink"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span>
              </li>
            <?php endwhile;?>
        </ul>
      </div> <!-- newsflash -->

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
            <track kind="captions" label="English subtitles" src="<?php echo get_stylesheet_directory_uri(); ?>/videos/english-captions.vtt" srclang="en" default></track>
            <track kind="captions" label="Deutsche Untertitel" src="<?php echo get_stylesheet_directory_uri(); ?>/videos/german-captions.vtt" srclang="ge"></track>
            <track kind="captions" label="Subtítulos en español" src="<?php echo get_stylesheet_directory_uri(); ?>/videos/spanish-captions.vtt" srclang="es"></track>
            <track kind="captions" label="Ελληνική Υπότιτλοι" src="<?php echo get_stylesheet_directory_uri(); ?>/videos/greek-captions.vtt" srclang="el"></track>
              <p>Sorry, your browser does not seem to support <code>HTML5 video</code></p>
          </video>
          <label for="home-video">Video of a use case when using Cloud4all</label>
        </div>
      </div> <!-- Video Container -->

    </div> <!-- Project banner -->

    <section class="row" id="sections-banner" role="banner">

      <div class="section" id="research-section">
        <h2>Research</h2>
        <p>Cloud4all is a research project that is moving beyond the state of the art in several aspects. Discover our research!</p>
        <a href="<?php echo home_url('/research/'); ?>" class="btn btn-large" title="Read more about our research and its results">More Research</a>
      </div>

      <div class="section" id="development-section">
        <h2>Development</h2>
        <p>Cloud4all is builiding an infrastructure that will be implemented in the real world. <strong>Join the effort!</strong></p>
        <a href="<?php echo home_url('/development/'); ?>" class="btn btn-large" title="Read more about the developments that are taking place within Cloud4all">More development</a>
      </div>

      <div class="section" id="dissemination-section">
        <h2>Dissemination</h2>
        <p>We are present in events all around the globe. Learn more about our vision, contact us and collaborate with us!</p>
        <a href="<?php echo home_url('/dissemination/'); ?>" class="btn btn-large" title="Read more about our dissemination activities">More dissemination</a>
      </div>

    </section> <!-- Sections banner -->

    <section class = "row" id="news-banner">
      <div id="news-section">
        <header>
          <a href="#" class="btn" title="Visit the news section">Go to news</a>
          <h2>News</h2>
        </header>
        <ul class="news-list">

          <?php $the_query = new WP_Query( 'posts_per_page=4, category_name=news'); ?>

          <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
            <li class="news-item">
              <?php
                if( has_post_thumbnail() ) { ?>
                  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                <?php } else { ?>
                  <a href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/default_news_icon.png" width="50x" height="50px" title="<?php the_title(); ?>" alt="news logo" /></a>
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
          <a href="https://twitter.com/Cloud4all7FP" class="btn" data-show-count="false" data-lang="en" title="Follow Cloud4all on Twitter">Follow @Cloud4all7FP</a>
        </header>
        <?php
          echo do_shortcode('[kebo_tweets title="" count="3" style="list" theme="light" offset="false" avatar="on"]'); 
        ?>
      </div>

    </section> <!-- news-banner -->

    <aside class="row" id="extra-info" role="complementary">
      <div id="success-stories">
        <h2>Success stories</h2>
        <p>Up to 19 accessibility solutions are integrating with Cloud4all. Check some success stories</p>
        <ul>
          <li><a href="<?php echo home_url('/development/solutions/readwrite-gold/'); ?>" title="Read&Write Gold" class="success-story-link" id="rwg-story"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/read_write-gold-logo-cmyk.gif" alt="Read & Write Logo" /></a></li>
          <li><a href="<?php echo home_url('/development/solutions/maavis/'); ?>" title="Maavis" class="success-story-link" id="maavis-story"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/maavis_logo.jpg" alt="Learn more about Maavis" /></a></li>
          <li><a href="<?php echo home_url('/development/solutions/mobile-accessibility-for-android/'); ?>" title="Mobile Accessibility for Android" class="success-story-link" id="ma-story"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ma_logo.png" alt="Learn more about Mobile Accessibility for Android" /></a></li>
        </ul>
      </div>
      <div id="newsletter">
        <h2>Cloud4all Newsletter</h2>
        <p><a class="latest-newsletter" href="http://pub.lucidpress.com/cloud4all/" target="_blank" title="Check Cloud4all's latest newsletter">Check our digital newsletter</a></p>
        <h3>Subscribe to our newsletter</h3>
        <form action="http://cloud4all.us6.list-manage.com/subscribe/post?u=f5aad2c587ca21bfd989738b4&amp;id=f0cd05af4d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
          <label for="mce-EMAIL" id="mce-EMAIL-label">E-mail address</label>
          <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="e-mail address" aria-labelledby="mce-EMAIL-label" required>
          <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div class="clear"><input value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-large" type="submit"></div>
      </div>
    </aside>

	</div><!-- #primary -->

<?php get_footer(); ?>
