<?php

/**========================
	Quality and Standards Block.
===========================*/

if( ! function_exists('get_quality_block') ) {
    function get_quality_block() { 
        if( have_rows('quality') ) :
        while( have_rows('quality') ) : the_row();
        
        $image = get_sub_field('image');
        $posX = get_sub_field('position_x');
        $posY = get_sub_field('position_y');
        
        // Image variables.
        $title = $image['title'];
        $alt = $image['alt'];

        // Thumbnail size attributes.
        $medium = $image['sizes']['medium'];
        $large = $image['sizes']['large'];
        ?>

        <div class="block-artisans">
            <div class="block-artisans__bg"></div>
            <div class="block-artisans__content">

                <h2 class="block-artisans__content__ttl">
                    <?php the_sub_field('title') ?>
                </h2>
                <p class="block-artisans__content__txt">
                    <?php the_sub_field('text') ?>
                </p>
            </div>
            <figure class="block-artisans__img">
            <img src="<?php echo esc_url($medium); ?>" srcset="<?php echo esc_url($large) ?>" alt="<?php echo esc_attr( $alt ) ?>" title="<?php echo esc_attr( $title ) ?>" style="object-position: <?php echo $posX; ?>% <?php echo $posY; ?>%" class="img-field">

            </figure>
        </div>
        <?php endwhile;
        endif;
        
    }
}

/**========================
	About Alpacas Block.
===========================*/

if( ! function_exists('get_about_alpacas_block') ) {
    function get_about_alpacas_block() { 
        if( have_rows('about_alpacas') ) :
        while( have_rows('about_alpacas') ) : the_row();
        
        $image = get_sub_field('image');
        $posX = get_sub_field('position_x');
        $posY = get_sub_field('position_y');
        
        // Image variables.
        $title = $image['title'];
        $alt = $image['alt'];

        // Thumbnail size attributes.
        $medium = $image['sizes']['medium'];
        $large = $image['sizes']['large'];
        ?>

        <div class="block-guiltfree">
            <div class="block-guiltfree__bg"></div>
            <div class="block-guiltfree__content">
                <h2 class="block-guiltfree__content__ttl">
                    <?php the_sub_field('title') ?>
                </h2>
                <div class="block-guiltfree__content__txt">
                    <?php the_sub_field('text') ?>
                </div>
            </div>
            <figure class="block-guiltfree__img">
                <img src="<?php echo esc_url($medium); ?>" srcset="<?php echo esc_url($large) ?>" alt="<?php echo esc_attr( $alt ) ?>" title="<?php echo esc_attr( $title ) ?>" style="object-position: <?php echo $posX; ?>% <?php echo $posY; ?>%" class="img-field">
            </figure>
        </div>
        <?php endwhile;
        endif;
        
    }
}

/**========================
	Fiber Properties Block.
===========================*/

if( ! function_exists('get_fiber_properties_block') ) {
    function get_fiber_properties_block() { 
        if( have_rows('fiber_properties') ) :
        while( have_rows('fiber_properties') ) : the_row();
        
        $image = get_sub_field('image');
        $posX = get_sub_field('position_x');
        $posY = get_sub_field('position_y');
        
        // Image variables.
        $title = $image['title'];
        $alt = $image['alt'];

        // Thumbnail size attributes.
        $medium = $image['sizes']['medium'];
        $large = $image['sizes']['large'];
        ?>

        <div class="block-properties">
            <div class="block-properties__bg"></div>
            <div class="block-properties__content">
                <h2 class="block-properties__content__ttl">
                    <?php the_sub_field('title') ?>
                </h2>
                <div class="block-properties__content__txt">
                    <?php the_sub_field('text_left') ?>
                </div>
                <div class="block-properties__content__txt">
                    <?php the_sub_field('text_middle') ?>
                </div>
                <div class="block-properties__content__txt">
                    <?php the_sub_field('text_right') ?>
                </div>
            </div>
            <figure class="block-properties__img">
                <img src="<?php echo esc_url($medium); ?>" srcset="<?php echo esc_url($large) ?>" alt="<?php echo esc_attr( $alt ) ?>" title="<?php echo esc_attr( $title ) ?>" style="object-position: <?php echo $posX; ?>% <?php echo $posY; ?>%" class="img-field">
            </figure>
        </div>
        <?php endwhile;
        endif;
        
    }
}