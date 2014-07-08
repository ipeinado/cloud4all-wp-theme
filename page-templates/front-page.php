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
        <div class="tweets-container">
            <ul class="tweets">
                <?php
                    $tweets = getTweets("Cloud4all7FP", 3);

                    foreach($tweets as $tweet) {
                        if ($tweet['text']) {

                            $the_tweet = $tweet['text'];

                            // i. User_mentions must link to the mentioned user's profile.
                            if(is_array($tweet['entities']['user_mentions'])){
                                foreach($tweet['entities']['user_mentions'] as $key => $user_mention){
                                    $the_tweet = preg_replace(
                                        '/@'.$user_mention['screen_name'].'/i',
                                        '<a href="http://www.twitter.com/'.$user_mention['screen_name'].'" target="_blank">@'.$user_mention['screen_name'].'</a>',
                                        $the_tweet);
                                }
                            }

                            // ii. Hashtags must link to a twitter.com search with the hashtag as the query.
                            if(is_array($tweet['entities']['hashtags'])){
                                foreach($tweet['entities']['hashtags'] as $key => $hashtag){
                                    $the_tweet = preg_replace(
                                    '/#'.$hashtag['text'].'/i',
                                    '<a href="https://twitter.com/search?q=%23'.$hashtag['text'].'&src=hash" target="_blank">#'.$hashtag['text'].'</a>',
                                    $the_tweet);
                                }
                            }

                            // iii. Links in Tweet text must be displayed using the display_url
                            //      field in the URL entities API response, and link to the original t.co url field.
                            if(is_array($tweet['entities']['urls'])){
                                foreach($tweet['entities']['urls'] as $key => $link){
                                    $the_tweet = preg_replace(
                                    '`'.$link['url'].'`',
                                    '<a href="'.$link['url'].'" target="_blank">'.$link['url'].'</a>',
                                    $the_tweet);
                                }
                            }

                            echo '<li>' .
                                    '<time>' .
                                    date("M d \, y", strtotime($tweet['created_at'])).
                                    '</time>'.
                                    '<p>'.
                                    $the_tweet.
                                    '</p>'.
                                    '<div class="twitter-intents">
                                        <p><a class="reply" href="https://twitter.com/intent/tweet?in_reply_to='.$tweet['id_str'].'">Reply</a></p>
                                        <p><a class="retweet" href="https://twitter.com/intent/retweet?tweet_id='.$tweet['id_str'].'">Retweet</a></p>
                                        <p><a class="favorite" href="https://twitter.com/intent/favorite?tweet_id='.$tweet['id_str'].'">Favorite</a></p>
                                    </div>'.
                                     '</li>';
                             }
                        }

                ?>
        </div>
      </div>

    </section> <!-- news-banner -->

	</div><!-- #primary -->

<?php get_footer(); ?>
