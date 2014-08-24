<div class="project a2-portfolio" data-id="post-<?php the_ID(); ?>" <?php echo 'data-type="'. strip_tags( get_the_term_list( get_the_ID(), 'categories', '', ' ', '' ) ) .'"'; ?>>
  <div class="portfolio-item">
    <a href="<?php the_permalink(); ?>">
      <?php if ( get_field('image')) {
        $image = get_field('image');
        ?>
      <?php if(get_field('image_type') == 'logo'): ?>
        <img class="logo" src="<?php echo $image['sizes']['portfolio-logo-thumb']; ?>" />
      <?php else : ?>
        <img src="<?php echo $image['sizes']['portfolio-photo-thumb']; ?>" />
      <?php endif; ?>
    <?php } ?>
    </a>
    <h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
      <?php the_title(); ?>
    </a></h4>
  </div>
</div>
