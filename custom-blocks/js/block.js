import HomeFeaturedPosts from "./component/home-featured-posts";
import FeaturedPostsSliderSinglePost from "./component/featured-posts-slider-single-post";
import SliderSection from "./component/slider-section";
import PageHeader from "./component/page-header";
import LargeSlider from "./component/large-slider/large-slider";
import GoogleMap from "./component/google-map";

if (typeof (JG) === 'undefined') {
    var JG = {};
}

(function ($) {
    JG.Blocks = {
        Init: function () {
            HomeFeaturedPosts();
            FeaturedPostsSliderSinglePost();
            SliderSection();
            PageHeader();
            LargeSlider();
            GoogleMap();
        },
    };
})($);

jQuery(function () {
    JG.Blocks.Init();
});