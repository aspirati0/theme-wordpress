    <style>
        .widget-title {
    font-family: 'Marcellus';
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 25px;
    /* identical to box height, or 139% */

    text-transform: uppercase;
    color: #000000;
}

.widget a {
    text-decoration: none;
}

.widget:last-of-type {
        display: flex;
        grid-gap: 70px;
}
</style>
    
    <div class="footer" style="display: flex; grid-gap: 70px; justify-content: center; background: #EAEAEA;">
            <?php dynamic_sidebar( 'footer-widgets' ); ?>

    </div>

<?php wp_footer(); ?>
</body>
</html>