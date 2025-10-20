
<?php

/* Template Name: Réservation */
get_header();
?>

<section class="reservation">
        <h2>Réserve ta place</h2>

        <form method="post" action="<?= esc_url( admin_url('admin-post.php') ); ?>" class="booking-form">
            <input type="hidden" name="action" value="reservation_externe">
            <?php wp_nonce_field('reservation_externe'); ?>

            <label for="name">Nom</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="qty">Nombre de places</label>
            <input type="number" name="qty" id="qty" min="1" value="1">

            <button type="submit">Envoyer ma réservation</button>
            <?php if (!empty($_GET['sent'])): ?>
        <p class="notice success">✅ Réservation envoyée ! Vérifie ta boîte mail.</p>
        <?php endif; ?>
        </form>
</section>

<?php
get_footer(); 
?>