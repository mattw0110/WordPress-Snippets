
<?php
$image = get_field('image');
?>

<div class="hero" style="background-image: url(<?php echo esc_url($image['url']); ?>)" alt="<?php echo esc_attr($image['alt']); ?>" />
    <div class="hero-wrap">
        <div class="content-wrap">
            <h1><?php the_field('headline');?></h1>
            <div class="hero-excerpt"><?php the_field('excerpt');?></div>
        </div>
    </div>
</div>