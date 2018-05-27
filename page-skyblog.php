<?php
/**
* Template Name: Skyblog Homepage
* Description: Salade tomate oignon
*/
?>


<?php get_header(); ?>


<div class="wrapper">
    <div id="global" class="skyrock">
        <div id="wrapper" class="container clearfix blog " itemscope="" itemtype="http://schema.org/Blog">


<?php get_template_part('barleft'); ?>
<?php get_template_part('barright'); ?>
<?php get_template_part('loop-content'); ?>


        </div>
    </div>
</div>

<?php get_footer(); ?>