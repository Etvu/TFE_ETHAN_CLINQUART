<?php
/*
Template Name: Accueil
*/
get_header(); 
if (have_rows('accueil')) :
    
    while (have_rows('accueil')) : the_row();
   
        if (get_row_layout() == 'home_section') :
            ?>
            <div class="home_section">
                <h1><?php the_sub_field('titre_h1'); ?></h1>
                <span><?php the_sub_field('span_h1'); ?></span>
                <div class="ticket">
                    <a href="<?php echo site_url('/agenda'); ?>">Prendre son ticket</a>
                </div>
            </div>
            <?php

        elseif (get_row_layout() == 'section_img_droite') :
            ?>
            <div class="section_img_droite">
                <div>
                    <div class="container_img_droite">
                        <h2><?php the_sub_field('titre'); ?></h2>
                        <p><?php the_sub_field('texte'); ?></p>
                        <div class="ticket">
                            <a href="<?php echo site_url('/agenda'); ?>">Prendre son ticket</a>
                        </div>
                    </div>
                </div>
                <div><img src="<?php the_sub_field('img'); ?>" alt=""></div>
            </div>
            <?php

        elseif (get_row_layout() == 'section_img_gauche') :
            ?>
            <div class="section_img_gauche">
                <div><img src="<?php the_sub_field('img'); ?>" alt=""></div>
                <div>
                    <div class="container_img_droite">
                        <h2><?php the_sub_field('titre'); ?></h2>
                        <p><?php the_sub_field('texte'); ?></p>
                        <div class="ticket">
                            <a href="<?php echo site_url('/agenda'); ?>">Prendre son ticket</a>
                        </div>
                    </div>
                </div>
                
            </div>
            <?php
              elseif (get_row_layout() == 'activites') :
                ?>
                <div class="activites">
                    <div class="container_activites">
                        <h2><?php the_sub_field('titre'); ?></h2>
                        <div class="cards">
                            <div>
                                <h3><?php the_sub_field('titre_card_1'); ?></h3>
                                <p><?php the_sub_field('texte_card_1'); ?></p>
                            </div>
                            <div>
                                <h3><?php the_sub_field('titre_card_2'); ?></h3>
                                <p><?php the_sub_field('texte_card_2'); ?></p>
                            </div>
                            <div>
                                <h3><?php the_sub_field('titre_card_3'); ?></h3>
                                <p><?php the_sub_field('texte_card_3'); ?></p>
                            </div>
                        </div>
                        <div class="ticket_b">
                            <a href="<?php echo site_url('/agenda'); ?>">Prendre son ticket</a>
                        </div>
                    </div>
                </div>
                <?php
        endif; 
    endwhile; 
endif; 
?>
<?php echo do_shortcode('[wpgmza id="1"]'); ?>


<?php get_footer(); ?> 