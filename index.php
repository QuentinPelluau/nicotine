<?php get_header(); ?>


<div class="wrapper">
    <div id="global" class="skyrock">
        <div id="wrapper" class="container clearfix blog " itemscope="" itemtype="http://schema.org/Blog">

<?php get_template_part('popins'); ?>
<?php get_template_part('barleft'); ?>
<?php get_template_part('loop-posts'); ?>
<?php get_template_part('barright'); ?>


        </div>
    </div>
</div>

<?php get_footer(); ?>