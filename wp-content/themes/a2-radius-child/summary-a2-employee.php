<div class="a2-portfolio a2-employee" data-id="post-<?php the_ID(); ?>" <?php echo 'data-type="'. strip_tags( get_the_term_list( get_the_ID(), 'categories', '', ' ', '' ) ) .'"'; ?>>
  <a href="<?php the_permalink(); ?>">
    <?php
      $photo = get_field('photo');

      if( !empty($photo) ): ?>

        <img src="<?php echo $photo['sizes']['portfolio-employee-thumb']; ?>" alt="<?php echo $photo['alt']; ?>" />

    <?php endif; ?>
  </a>
  <h4>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
      <?php the_title(); ?>
    </a>
    <span class="skills">
      <?php the_terms($post->ID, 'a2-employee-skill','', ', ', '') ?>
    </span>
  </h4>
</div>
