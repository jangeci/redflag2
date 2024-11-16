if (typeof (JG) === 'undefined') {
    var JG = {};
}

(function ($) {
    JG.RedFlag = {

        Init: function () {
            var self = this;

            var body = jQuery('body');

            body.on('click', '.navtoggle', function () {
                self.NavToggle();
            });

            body.on('click', function (e) {
                self.NavClose(e);
            });

            // body.on('click', '.galleryShowMore', function (e) {
            //     self.ShowWholeGallery(e);
            // });

            self.RangeSliders();

            body.on('change', '.contact-typeradio', function (e) {
                self.ContactRadioTypeChange(e);
            })

            // self.InitGalleries();
            self.InitGalleriesAnimations();
        },

        // LoadMoreArchive: function(btn){
        //     var archives = jQuery('.js-fancy-archive');
        //     var page = jQuery(btn).data('page');
        //     var url = jQuery(btn).data('ajaxurl');
        //     this.AjaxSearchPostsAJAX = jQuery.ajax({
        //         type: "GET",
        //         url: url,
        //         data: { action: 'RenderArchivesWidget', archivepage: page }
        //     }).always(function (result) {
        //         if (typeof (result) != 'undefined' && result != '') {
        //             try {
        //                 archives.html(result);
        //             }
        //             catch (err) {
        //                 console.log(err.message);
        //             }
        //         }
        //     });
        // },


        NavToggle: function () {
            if (jQuery('.js-main-menu-mobile-container').hasClass('visible')) {
                jQuery('.js-main-menu-mobile-container').removeClass('visible');
                jQuery('.navtoggle').removeClass('open');
                // if (window.matchMedia('(max-width: 991px)').matches) {
                //     jQuery('body').removeClass('noScroll');
                // }
            } else {
                jQuery('.js-main-menu-mobile-container').addClass('visible');
                jQuery('.navtoggle').addClass('open');
                // if (window.matchMedia('(max-width: 991px)').matches) {
                //     jQuery('body').addClass('noScroll');
                // }
            }
        },


        NavClose: function (e) {
            if (typeof (e.target) != 'undefined') {
                if (jQuery(e.target).hasClass('js-main-menu-mobile-container') || jQuery(e.target).hasClass('navtoggle') || jQuery(e.target).parents('.navtoggle').length > 0 || jQuery(e.target).parents('.js-main-menu-mobile-container').length > 0) {
                    return;
                }
                if (jQuery('.js-main-menu-mobile-container').hasClass('visible')) {
                    this.NavToggle();
                }
            }
        },

        RangeSliders: function () {
            if ($('#consumptionInput').length) {
                const consumptionValue = jQuery("#consumption");
                const consumptionInput = jQuery("#consumptionInput");
                consumptionValue.text(consumptionInput.value);
                consumptionInput.on("propertychange  input", (event) => {
                    consumptionValue.text(event.target.value);
                });
            }

            if ($('#paymentsInput').length) {
                const paymentsValue = jQuery("#payments");
                const paymentsInput = jQuery("#paymentsInput");
                paymentsValue.text(paymentsValue.value);
                paymentsInput.on("propertychange  input", (event) => {
                    paymentsValue.text(event.target.value);
                });
            }
        },

        ContactRadioTypeChange: function (e) {
            let paymentsValue = jQuery("#payments");
            let paymentsInput = jQuery("#paymentsInput");
            let consumptionValue = jQuery("#consumption");
            let consumptionInput = jQuery("#consumptionInput");
            if (e.target.value === 'house') {
                paymentsInput.attr('max', 500);
                paymentsInput.attr('step', 1);
                consumptionInput.attr('max', 10000);
                consumptionInput.attr('min', 1000);
                paymentsInput.val(0);
                consumptionInput.val(1000);
            } else {
                paymentsInput.attr('max', 10000);
                paymentsInput.attr('step', 50);
                consumptionInput.attr('max', 100000);
                consumptionInput.attr('min', 10000);
                paymentsInput.val(0);
                consumptionInput.val(10000);
            }
            paymentsValue.text(paymentsInput.val());
            consumptionValue.text(consumptionInput.val());
        },

        GoogleMaps: {
            InitMap: async function () {
                const {AdvancedMarkerElement} = await google.maps.importLibrary("marker");

                if (typeof (window.JG_Main_Map) !== 'undefined') {

                    let options = {
                        disableDefaultUI: false,
                        scrollwheel: true,
                        zoom: 16,
                        mapId: "DEMO_MAP_ID",
                    };

                    options.center = new google.maps.LatLng(window.JG_Main_Map.positionLat, window.JG_Main_Map.positionLong);

                    let map = new google.maps.Map(document.getElementById(window.JG_Main_Map.target), options);

                    if (window.JG_Main_Map.pinLat !== '') {
                        options = {
                            position: new google.maps.LatLng(window.JG_Main_Map.pinLat, window.JG_Main_Map.pinLong),
                            map: map
                        };

                        if (typeof (window.JG_Main_Map.mapMarker) === 'string' && window.JG_Main_Map.mapMarker !== '') {
                            options.icon = decodeURIComponent(window.JG_Main_Map.mapMarker);
                        }

                        const marker = new AdvancedMarkerElement(options);
                    }
                }
            }
        },

        // InitGalleries: function () {
        //     let galleries = jQuery('.showmoregallery');
        //
        //     galleries.each(
        //         function (i) {
        //             let thisGallery = jQuery(galleries[i]);
        //             let images = thisGallery.find('.wp-block-image');
        //
        //             if (images.length > 5) {
        //                 images.each(
        //                     function (j) {
        //                         if (j > 4) {
        //                             jQuery(images[j]).hide();
        //                         }
        //                     }
        //                 )
        //                 thisGallery.append('<a href="#" class="galleryShowMore">Ukázať Viac</a>');
        //
        //             }
        //         }
        //     );
        // },
        //
        // ShowWholeGallery: function (e) {
        //     e.preventDefault();
        //     let link = jQuery(e.target);
        //     let thisGallery = link.closest('.showmoregallery');
        //     let images = thisGallery.find('.wp-block-image');
        //
        //     images.each(
        //         function (j) {
        //             if (j > 4) {
        //                 jQuery(images[j]).show();
        //             }
        //         }
        //     )
        //     link.hide();
        // }
    };
})(jQuery);

if (jQuery('.featured-posts-slider').length) {
    var sliders = jQuery('.featured-posts-slider');

    sliders.each(function () {
        var singleSlider = jQuery(this);
        singleSlider.slick({
            dots: true,
            infinite: true,
            speed: 1000,
            slidesToShow: 1,
            autoplay: true
        });
    });
}


if (jQuery('.slider-section-slider').length) {
    var sliders = jQuery('.slider-section-slider');

    sliders.each(function () {
        var singleSlider = jQuery(this);
        singleSlider.slick({
            infinite: true,
            speed: 1300,
            slidesToShow: 5,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                    }
                },
            ]
        });
    });
}


jQuery(function () {
    JG.RedFlag.Init();
});
