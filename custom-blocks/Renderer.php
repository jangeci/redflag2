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
        $html .= '<div class="slider-section-top-decoration"></div>';
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
        $html .= '<div class="single-page-header">';
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
        $html .= '<div class="container">';
        $html .= '<div class="row">';
        $html .= '<div class="large-slider">';
        $html .= $content;
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="container">';

        return $html;
    }

    static function LargeSliderItem($attributes, $content)
    {

        $html = '<div class="large-slider-single-item" style="background-image: url(' . wp_get_attachment_url($attributes['imgId']) . ')">';
        $html .= '<div class="large-slider-single-item-content">';
        $html .= $content;
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

    static function CustomHeroImage($attributes, $content)
    {

        $html = '</div>';
        $html .= '<div class="custom-hero-image" style="background-image: url(' . wp_get_attachment_url($attributes['imgId']) . ')">';
        $html .= '<div class="container">';
        $html .= '<div class="custom-hero-image-content">';
        $html .= $content;
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="container">';

        return $html;
    }
}
