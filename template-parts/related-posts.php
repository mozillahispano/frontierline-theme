<aside id="related-posts" class="section">
  <div class="content">
    <div class="in-category">
    <?php
      global $post;
      $categories = get_the_category();
      $category = $categories[0];
      $cat_ID = $category->cat_ID;

      $catposts = get_posts('showposts=5&cat='.$cat_ID);
    ?>

      <h4 class="module-title"><?php printf( __('More articles in “%s”', 'rebrand'), esc_html($category->name)); ?></h4>
      <ul class="cat-posts">
      <?php foreach($catposts as $post) : ?>
        <li>
          <h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
          <time class="date" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php echo get_the_date(); ?></time>
        </li>
      <?php endforeach; ?>
      <?php wp_reset_query(); ?>
      </ul>
    </div>

    <div class="popular">
      <?php if ( function_exists('wpp_get_mostpopular') ) : ?>
      <h4 class="module-title"><?php _e('Popular articles', 'rebrand'); ?></h4>
      <?php
        $args = array(
          'limit' => '5',
          'range' => 'monthly',
          'post_type' => 'post',
          'stats_views' => 0,
          'stats_date' => 1,
          'post_html' => '<li><h5 class="entry-title"><a href="{url}">{text_title}</a></h5><span class="date">{date}</span></li>'
        );
        wpp_get_mostpopular($args); ?>

      <?php else : ?>
      <h4 class="module-title"><?php _e('Recent articles', 'rebrand'); ?></h4>
      <?php endif; ?>
    </div>
  </div>
</aside>
