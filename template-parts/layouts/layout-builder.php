<?php if ( have_rows( 'layout' ) ) :  ?>
    <?php
        $rowclasses = 'justify-content-center';
        $columssize = 'col-xl-7 col-lg-10 col-md-12';
    ?>
    <main class="content">
    <?php while ( have_rows('layout' ) ) : the_row(); ?>

        <?php if ( get_row_layout() == 'layout01' ) : // textarea ?>
            <div class="container">
                <div class="row <?php echo $rowclasses; ?>">
                    <div class="<?php echo $columssize; ?>">
                        <?php the_sub_field( 'tekst' ); ?>
                        <?php if ( have_rows('buttons') ) : ?>
                            <div class="btns">
                            <?php $btncount = 0; while( have_rows('buttons') ) : the_row(); $btncount++;?>
                                <a class="btn <?php if($btncount > 1): echo 'btn-primary'; else: echo 'btn-secondary'; endif;?>"href="<?php the_sub_field('button_link'); ?>"><?php the_sub_field('button_tekst'); ?></a>
                            <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        <?php elseif ( get_row_layout() == 'layout02' ) : // media ?>
            <div class="container">
                <div class="row <?php echo $rowclasses; ?>">
                    <div class="<?php echo $columssize; ?>">
                        <div class="content__media">
                            <img src="<?php echo get_sub_field('afbeelding')['url'];?>" alt="<?php echo get_sub_field('afbeelding')['alt'];?>">
                            <a href="<?php echo get_sub_field('afbeelding')['url'];?>" class="stretched-link" data-fancybox></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php elseif ( get_row_layout() == 'layout03' ) : // quote ?>
                <div class="container">
                    <div class="row <?php echo $rowclasses; ?>">
                        <div class="<?php echo $columssize; ?>">
                            <blockquote class="content__quote">
                                <?php the_sub_field( 'quote' );?>
                            </blockquote>
                        </div>
                    </div>
                </div>
            <?php elseif ( get_row_layout() == 'layout04' ) : // gallerij ?>
                <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
                <div class="container">
                    <div class="row gy-3 <?php echo $rowclasses; ?>" data-masonry='{"percentPosition": true }'>
                    <?php $images = get_sub_field('gallerij');
                        if( $images ): $imagescount = 0; foreach( $images as $image ): $imagescount++; ?>
                        <div class="col-lg-6">
                            <div class="content__gallery <?php if($imagescount % 2 == 0){} else { echo '--big'; }?>">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <a href="<?php echo esc_url($image['url']); ?>" class="stretched-link" data-fancybox="gallery"></a>
                            </div>
                        </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>

            <?php elseif ( get_row_layout() == 'layout05' ) : // formulier ?>  
                <div class="container">
                    <div class="row <?php echo $rowclasses; ?>">
                        <div class="<?php echo $columssize; ?>">
                            <div class="content__form">
                                <?php if(get_sub_field( 'titel' )):?>
                                    <h2 class="display-3 mb-3 mt-2"><?php the_sub_field( 'titel' );?></h2>
                                    <?php endif;?>
                                <?php $posts = get_sub_field('formulier');
                                if( $posts ):   foreach( $posts as $p ): 
                                    $cf7_id= $p->ID;
                                    echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' ); 
                                endforeach; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

        <?php endif; ?>


    <?php endwhile; // end layout builder ?>
    </main>
<?php endif; ?>
