<?php get_header(); ?>

<section>
    <div class="container">
        <h1><?php _e('Sorry, we kunnen deze pagina niet meer vinden', 'creators'); ?></h1>
        <p><?php echo sprintf(__('We hebben ons best gedaan, maar het lijkt erop dat deze pagina niet (meer) bestaat of misschien verhuisd is. Je kunt natuurlijk altijd naar de <a href="%s">homepage</a>.', 'creators'), home_url()); ?></p>
    </div>
</section>

<?php get_footer(); ?>