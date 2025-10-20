<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article class="film_fiche">
  <div class="col_media">
  

    <?php if (function_exists('get_field')): ?>
      <?php if ($embed = get_field('video_url')): ?>
        <div class="video-embed"><?= $embed; /* oEmbed HTML direct */ ?></div>
      <?php endif; ?>
    <?php endif; ?>
    <div class="film_titre">
      <h2>Film : <?php the_title(); ?></h2>
      <?php
        $synopsis = function_exists('get_field') ? get_field('synopsis') : '';
        if ($synopsis) : ?>
          <section class="section-synopsis">
            <div class="synopsis-body">
              <?= wpautop( wp_kses_post($synopsis) ); ?>
            </div>
          </section>
        <?php endif; ?>
      </div>
  </div>

  <div class="col_infos">
    
    <?php
      $realisateur = get_field('realisateur');
      $duree       = get_field('duree');
      $has_acteurs = have_rows('acteurs'); // repeater
    ?>

    <?php if ($realisateur || $duree || $has_acteurs): ?>
      <h2>Fiche technique</h2>
      <ul class="tech">
        <?php if ($realisateur): ?>
          <li>Réalisation : <?= esc_html($realisateur); ?></li>
        <?php endif; ?>

        <?php if ($duree): ?>
          <li>Durée : <?= esc_html($duree); ?></li>
        <?php endif; ?>

        <?php if ($has_acteurs): ?>
          <li>Acteurs :
            <ul class="actors">
              <?php while (have_rows('acteurs')): the_row();
                $nom  = get_sub_field('nom');
                $role = get_sub_field('role'); ?>
                <li>
                  <?= esc_html($nom); ?>
                  <?php if ($role): ?> <em>(<?= esc_html($role); ?>)</em><?php endif; ?>
                </li>
              <?php endwhile; ?>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    <?php endif; ?>
  </div>
</article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
