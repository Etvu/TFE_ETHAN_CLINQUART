<?php get_header(); ?>

<section class="genre-list">
  <h2><?php single_term_title(); ?></h2>

  <div class="grid-films">
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="film-card">
      <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()): ?>
          <div class="thumb"><?php the_post_thumbnail('large'); ?></div>
        <?php endif; ?>
        <div class="titre_film">
          <h3><?php the_title(); ?></h3>
          <span class="btn">Voir</span>
        </div>
      </a>
    </article>
  <?php endwhile; else: ?>
    <p>Aucun film dans cette catégorie.</p>
  <?php endif; ?>
  </div>
</section>

<?php get_footer();