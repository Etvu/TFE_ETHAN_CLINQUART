<?php get_header(); ?>
<body <?php body_class(); ?>> <!-- classes dynamiques pour personnaliser via CSS -->

    <?php get_header(); 
    $current_category = null; // par defaut ca n'existe pas 
    if(isset($_GET["category"])){ // si on la dans l'url on recup
        
        $current_category = $_GET["category"]; 
    }
    $cates = get_terms(array( 
        'taxonomy' => 'category', //on récupère tous les termes de la taxonomie category
        'hide_empty' => true,
    ));
    //si les catégories existent
    if(!empty($cates)){
        echo "<ul class='cate'>";
        //toute les caté
        echo "<li>";
        echo "<a href='?'>Toutes</a>";
        echo "</li>";
        foreach($cates as $cate){ // recupere toutes les caté et crée un lien pour chaque caté
            echo "<li>";
            echo "<a href='?category=" . $cate->slug . "'>" . $cate->name . "</a>";
            echo "</li>";
        }
        echo "</ul>";
    }
    


    global $wp_query; // pour récup les parametres 

    $query_vars = $wp_query->query_vars; //recupere les variables dans wp query

    if($current_category){ //Si on clique sur la caté on modifie les variables de la requete
        $query_vars["tax_query"] = array( 
            array(
            'taxonomy' => 'category',
            'field' =>'slug',
            'terms' => $current_category, // on pourrait faire passer plusieurs catégories donc au pluriel
            )
        );
    
        $wp_query = new WP_Query($query_vars); // on doit la réinitialiser
    }
    

    
    ?>
    
    <ul class="galery_article">
    <?php
    if(have_posts()){ // les articles
        while(have_posts()){
         the_post();
         $thumbnail_id = get_post_thumbnail_id();
         if(!empty($thumbnail_id)){
             $image = wp_get_attachment_image($thumbnail_id, 'large');
         }else{
             $image = false;
         }


         ?>
         <li>
            <?php
            if(!empty($image)){
                echo "<div class='img_articlee'>";
                echo $image;
                echo "</div>";
            }
            ?>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <p class="content_article"><?php the_content() ?></p>
            <span class="time_article"><?php the_time('d/m/Y'); ?></span>
        </li>
        
         <?php
    }
}

    
    ?> 
</ul>
    
            
    <?php get_footer(); ?> 

    <?php wp_footer(); ?> <!-- charger les scripts nécessaires avant la fin de la page -->
</body>
</html>