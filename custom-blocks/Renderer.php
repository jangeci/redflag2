<?php

class Renderer
{
    static function FeaturedPostsSliderSinglePost($attributes)
    {
        $html = '';
        if (array_key_exists('singlePost1', $attributes)) {
            $singlePost = get_post($attributes['singlePost1']);
            $html .= '<a class="single-slide single-post-tile single-post-tile-large" href="' . get_permalink($singlePost) . '">';
            $html .= '<div class="single-post-tile-inner" style="background-image: url(' . get_the_post_thumbnail_url($singlePost) . ')" >';
            $html .= '<div class="post-tile-title-container">';
            $html .= '<h3 class="post-tile-title">' . $singlePost->post_title . '</h3>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</a>';
        }
        
        return $html;
    }
    
    static function HomeFeaturedPosts($attributes, $content)
    {
        $postsId = [];
        if (array_key_exists("singlePost1", $attributes)) {
            array_push($postsId, $attributes['singlePost1']);
        }
        if (array_key_exists("singlePost2", $attributes)) {
            array_push($postsId, $attributes['singlePost2']);
        }
        
        
        $html = '</div>';
        $html .= '<div class="section-featured-posts-background">';
        $html .= '<div class="container">';
        $html .= '<div class="row">';
        $html .= '<div class="featured-posts-container">';
        $html .= '<div class="featured-posts-left-col">';
        $html .= '<div class="featured-posts-slider">';
        $html .= $content;
        $html .= '</div>';
        $html .= '</div>';
        
        $html .= '<div class="featured-posts-right-col">';
        
        foreach ($postsId as $key => $id):
            $singlePost = get_post($id);
            $html .= '<a class="single-slide single-post-tile single-post-tile-medium index' . $key . '" href="' . get_permalink($id) . '">';
            $html .= '<div class="single-post-tile-inner" style="background-image: url(' . get_the_post_thumbnail_url($id) . ')">';
            $html .= '<div class="post-tile-title-container">';
            $html .= '<h3 class="post-tile-title">' . $singlePost->post_title . '</h3>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</a>';
        endforeach;
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="container">';
        
        return $html;
    }
    
    static function SliderSectionItem($attributes)
    {
        
        if ($attributes['imgId']) {
            $html = '<div class="single-slider-section-item-container">';
            $html .= '<div class="single-slider-section-item">';
            $html .= '<div class="slider-item-image" style="background-image: url(' . wp_get_attachment_url($attributes['imgId']) . ')">';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            
            return $html;
        }
        
        return '';
    }
    
    static function SliderSection($attributes, $content)
    {
        $html = '</div>';
        $html .= '<div class="slider-section">';
        $html .= '<div class="container">';
        $html .= '<div class="slider-section-slider">';
        $html .= $content;
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="container">';
        
        return $html;
    }
    
    static function PageHeader($attributes)
    {
        $html = '</div>';
        $html .= '<div class="single-page-header ' . (array_key_exists('description', $attributes) ? "has-description" : "no-description") . '">';
        $html .= '<div class="container">';
        $html .= '<div class="page-header-title">';
        $html .= '<h1>';
        $html .= get_the_title();
        $html .= '</h1>';
        if (array_key_exists('description', $attributes)) {
            $html .= '<p>' . $attributes['description'] . '</p>';
        }
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="container">';
        
        return $html;
    }
    
    static function LargeSlider($attributes, $content)
    {
        
        $html = '</div>';
        $html .= '<div class="large-slider-container">';
        $html .= '<div class="large-slider">';
        $html .= $content;
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="container">';
        
        return $html;
    }
    
    static function LargeSliderItem($attributes, $content)
    {
        
        $html = '<div class="large-slider-single-item" style="background-image: url(' . wp_get_attachment_url($attributes['imgId']) . ')">';
        $html .= '<div class="large-slider-single-item-inner">';
        $html .= '<div class="large-slider-gradient">';
        $html .= '<div class="container">';
        $html .= '<div class="large-slider-left-content">';
        $html .= '<img src="' . wp_get_attachment_url($attributes['imgId2']) . '"/>';
        $html .= '</div>';
        $html .= '<div class="large-slider-single-item-content">';
        $html .= $content;
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        
        return $html;
    }
    
    static function GoogleMap($attributes)
    {
        $apiKey = 'AIzaSyDXEoEqvPGDVXnf-Guq2DUul_5vbyTj8P0';
        
        $html = '';
        if (!is_admin()) {
            wp_enqueue_script('script-googlemaps', 'https://maps.googleapis.com/maps/api/js?key=' . $apiKey . '&callback=JG.RedFlag.GoogleMaps.InitMap', ['jquery'], '', true);
        }
        $html .= '<div class="google-map-outer">';
        $html .= '<div class="map-overlay"></div>';
        $html .= '<div class="map-content">';
        $html .= '<div class="contact-info-single">';
        $html .= '<div class="contact-info-label">';
        if (isset($attributes['label'])):
            $html .= '<span class="info-label">' . $attributes['label'] . '</span>';
        endif;
        $html .= '<span class="label-line"></span>';
        $html .= '</div>';
        if (isset($attributes['text1'])):
            $html .= '<p>' . nl2br($attributes['text1']) . '</p>';
        endif;
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div id="google-map-container" class="google-map-container">';
        $html .= '</div>';
        $html .= '</div>';
        
        $html .= '<script>window.JG_Main_Map = {apiKey: \'' . $apiKey . '\', 
                positionLat: \'' . $attributes ['positionLat'] . '\', positionLong: \'' . $attributes ['positionLong'] . '\',
                pinLat: \'' . $attributes ['pinLat'] . '\', pinLong: \'' . $attributes ['pinLong'] . '\', target: \'google-map-container\'};';
        //        mapMarker: \'' . $attributes ['imgUrl'] . ' \'
        $html .= '</script>';
        
        return $html;
    }
    
    static function CustomHeroImage($attributes)
    {
        
        $html = '</div>';
        $html .= '<div class="custom-hero-image" style="background-image: url(' . wp_get_attachment_url($attributes['imgId']) . ')">';
        $html .= '<div class="container">';
        $html .= '<div class="row">';
        $html .= '<div class="custom-hero-image-content">';
        if (isset($attributes['text'])) {
            $html .= '<h2>' . $attributes['text'] . '</h2>';
        }
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="container">';
        
        return $html;
    }
    
    static function ImageWithTextV1($attributes, $content)
    {
        $html = '</div>';
        $html .= '<div class="image-with-text-v1">';
        $html .= '<div class="container">';
        $html .= '<div class="row">';
        $html .= '<div class="left-part">';
        $html .= '<img src="' . wp_get_attachment_url($attributes['imgId']) . '">';
        $html .= '</div>';
        $html .= '<div class="right-part">';
        $html .= $content;
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="container">';
        
        return $html;
    }
    
    static function BlockWithBackground($attributes, $content)
    {
        $className = isset($attributes['className']) ? $attributes['className'] : '';
        
        
        $html = '</div>';
        $html .= '<div class="block-with-background ' . esc_attr($className) . '">';
        $html .= '<div class="container">';
        $html .= $content;
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="container">';
        
        return $html;
    }
    
    static function PartnersByCategory($attributes, $content)
    {
        $categoryId = null;
        
        if (isset($_GET['category'])) {
            $categoryId = $_GET['category'];
        }
        
        $className = isset($attributes['className']) ? $attributes['className'] : '';
        
        $html = '<div class="partners-by-category-block ' . esc_attr($className) . '">';
        $html .= '<div>';
        
        if ($categoryId !== null) {
            $categories = get_terms([
                'taxonomy' => 'partner_category',
                'include' => [$categoryId],
                'hide_empty' => false,
            ]);
            
            if (!empty($categories) && !is_wp_error($categories)) {
                foreach ($categories as $category) {
//                $category_pod = pods('partner_category', $category->term_id);
                    
                    $html .= '<div class="partner-category-section">';
//                $html .= '<div class="category-header">';
//
//                $html .= '<h2 class="category-title">' . esc_html($category->name) . '</h2>';
//                $html .= '</div>';

//                if ($category->description) {
//                    $html .= '<div class="category-description">' . wpautop($category->description) . '</div>';
//                }
                    
                    $args = [
                        'post_type' => 'partners',
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'tax_query' => [
                            [
                                'taxonomy' => 'partner_category',
                                'field' => 'term_id',
                                'terms' => $category->term_id,
                            ],
                        ],
                    ];
                    
                    $partners = new WP_Query($args);
                    
                    if ($partners->have_posts()) {
                        $html .= '<div class="partners-grid">';
                        
                        while ($partners->have_posts()) {
                            $partners->the_post();
                            $pod = pods('partners', get_the_ID());
                            $logo = $pod->field('logo');
                            $link = $pod->field('link') ? $pod->field('link') : esc_url(get_permalink(get_the_id()));
                            $description = $pod->field('description');
                            
                            $html .= '<div class="partner-item">';
                            
                            if ($logo) {
                                $html .= '<div class="partner-logo">';
                                $html .= '<a href="' . $link . '" target="_blank" rel="noopener noreferrer" class="partner-link">';
                                $html .= '<img src="' . esc_url($logo['guid']) . '" alt="' . esc_attr(get_the_title()) . '">';
                                $html .= '</a>';
                                $html .= '</div>';
                            }
                            
                            $html .= '<a href="' . $link . '" target="_blank" rel="noopener noreferrer" class="partner-link partner-title">';
                            $html .= '<h3>' . get_the_title() . '</h3>';
                            $html .= '</a>';
                            
                            
                            if ($description) {
                                $html .= '<div class="partner-description">' . wp_kses_post($description) . '</div>';
                            }
                            
                            $html .= '</div>';
                        }
                        
                        $html .= '</div>';
                        wp_reset_postdata();
                    }
                    
                    $html .= '</div>';
                }
            }
            
        } else {
//            $categories = get_terms([
//                'taxonomy' => 'partner_category',
//                'hide_empty' => true,
//                'orderby' => 'name',
//                'order' => 'ASC',
//            ]);
            
            $html .= '<div class="partner-category-section">';
//                $html .= '<div class="category-header">';
//
//                $html .= '<h2 class="category-title">' . esc_html($category->name) . '</h2>';
//                $html .= '</div>';

//                if ($category->description) {
//                    $html .= '<div class="category-description">' . wpautop($category->description) . '</div>';
//                }
            
            $args = [
                'post_type' => 'partners',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
            ];
            
            $partners = new WP_Query($args);
            
            if ($partners->have_posts()) {
                $html .= '<div class="partners-grid">';
                
                while ($partners->have_posts()) {
                    $partners->the_post();
                    $pod = pods('partners', get_the_ID());
                    $logo = $pod->field('logo');
                    $link = $pod->field('link') ? $pod->field('link') : esc_url(get_permalink(get_the_id()));
                    $description = $pod->field('description');
                    
                    $html .= '<div class="partner-item">';
                    
                    if ($logo) {
                        $html .= '<div class="partner-logo">';
                        $html .= '<a href="' . $link . '" target="_blank" rel="noopener noreferrer" class="partner-link">';
                        $html .= '<img src="' . esc_url($logo['guid']) . '" alt="' . esc_attr(get_the_title()) . '">';
                        $html .= '</a>';
                        $html .= '</div>';
                    }
                    $html .= '<a href="' . $link . '" target="_blank" rel="noopener noreferrer" class="partner-link partner-title">';
                    $html .= '<h3>' . get_the_title() . '</h3>';
                    $html .= '</a>';
                    
                    
                    if ($description) {
                        $html .= '<div class="partner-description">' . wp_kses_post($description) . '</div>';
                    }
                    
                    $html .= '</div>';
                }
                
                $html .= '</div>';
                wp_reset_postdata();
            }
            
            $html .= '</div>';
        }
        
        $html .= '</div>';
        $html .= '</div>';
        
        return $html;
    }
}
