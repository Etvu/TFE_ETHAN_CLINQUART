<?php
/*
Template Name: FAQ
*/
get_header(); 

/*Mettre les get en variable pour gagner du temps*/ 
$repeteur = get_field("repeteur_question_reponse");// on récupe le nom du champs wordpress
?> 
<div class="container">
    <div class="prose">
        <?php the_content() ?>
    </div>
    <div class="questions_reponses">
        <?php
        foreach($repeteur as $reponse){

            get_template_part('template_parts/accordion_item',null,array( // on récupère le template 
                'question' => $reponse["question"],
                'reponse' => $reponse["reponse"],
            ));
            get_template_part('template_parts/accordion_item_green',null,array(
                'question' => $reponse["question"],
                'reponse' => $reponse["reponse"],
            ));
            
        } ?>
    </div>
</div>
<?php get_footer(); ?> 