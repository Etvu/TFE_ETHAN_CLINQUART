  </main>
<footer>
        
        <nav class="div_menu_bas">
            <div class="div_menu_bas_container">
                <div>
                    <h2>Liens important</h2>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'bas-menu1', 
                        'container' => false, 
                        'menu_class' => 'bas-menu1', 
                    ) )?>
                </div>
                <div>
                    <h2>Nous contacter</h2>
                    <a href="mailto:ethan.clinquart@gmail.com">ethan.clinquart@gmail.com</a>
                </div>
                <div>
                    <a href=""><i class="fa-brands fa-facebook" style="color: #ffffff;"></i></a>
                    <a href=""><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></a>
                </div>
            </div>
        </nav>
        
</footer>

<?php wp_footer();  ?>
</body>
</html>