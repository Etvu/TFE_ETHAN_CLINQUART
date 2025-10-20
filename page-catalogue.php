<?php
/* Template Name: Catalogue Films */
get_header(); ?>

<section class="genres">
  <div class="grid-genres">
    <?php
    // Récupère tous les genres
    $terms = get_terms(['taxonomy' => 'genre', 'hide_empty' => false]);

    foreach ($terms as $t) :
      $link    = get_term_link($t);                   
      $img_url = function_exists('get_field')
        ? get_field('image_genre', 'genre_' . $t->term_id)  // ACF sur taxonomie
        : '';
      ?>
      <article class="genre-card">
        <a href="<?= esc_url($link) ?>">
          <?php if (!empty($img_url)) : ?>
            <img src="<?= esc_url($img_url) ?>" alt="<?= esc_attr($t->name) ?>">
          <?php else : ?>
            <div class="genre-placeholder" aria-hidden="true"></div>
          <?php endif; ?>
          <div class="genre_desc">
            <h2><?= esc_html($t->name) ?></h2>
            <span class="btn">Voir</span>
          </div>
        </a>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<?php get_footer(); ?>