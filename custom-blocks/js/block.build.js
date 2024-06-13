/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export SinglePost */
var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Component = wp.element.Component;
var Button = wp.components.Button;


var SinglePost = function (_Component) {
    _inherits(SinglePost, _Component);

    function SinglePost(props) {
        _classCallCheck(this, SinglePost);

        var _this = _possibleConstructorReturn(this, (SinglePost.__proto__ || Object.getPrototypeOf(SinglePost)).call(this, props));

        _this.state = {
            posts: [{
                title: '',
                id: ''
            }],
            inputState: ''
        };
        return _this;
    }

    /**
     * render autocomplete suggestions
     */


    _createClass(SinglePost, [{
        key: 'renderAutocompleteBlock',
        value: function renderAutocompleteBlock() {
            var self = this;
            var inputState = self.state.inputState;
            var autocompleteBlock = [];
            var postsCount = self.state.posts.length;
            var posts = self.state.posts;
            var propPostId = self.props.propname;
            var propPostTitle = self.props.propname + 'Title';

            if (inputState !== '') {
                if (postsCount) {
                    for (var i = 0; i < postsCount; i++) {
                        if (posts[i].title.toLowerCase().includes(inputState.toLowerCase())) {
                            autocompleteBlock.push(wp.element.createElement(
                                Button,
                                { className: 'singlePostOption',
                                    onClick: function onClick(e) {
                                        var params = '{"' + propPostTitle + '" : "' + e.target.textContent + '", "' + propPostId + '" : ' + e.target.dataset.postid + '}';
                                        params = JSON.parse(params);
                                        self.props.properties.setAttributes(params);
                                        self.setState({ inputState: '' });
                                    },
                                    'data-postid': posts[i].id },
                                posts[i].title
                            ));
                        }
                    }
                    return wp.element.createElement(
                        'div',
                        { className: 'autocompleteBlock' },
                        autocompleteBlock
                    );
                }
            } else {
                return null;
            }
        }

        /**
         * Render the component into html.
         */

    }, {
        key: 'render',
        value: function render() {
            var self = this;
            var autocompleteHtml = self.renderAutocompleteBlock();
            var choserHtml = wp.element.createElement('input', { className: 'text-input', type: 'text', placeholder: 'Search posts by title',
                value: this.state.inputState, onChange: updateAutocomplete });
            var propPostId = self.props.propname;
            var propPostTitle = self.props.propname + 'Title';
            if (Number.isInteger(self.props.properties.attributes[propPostId])) {
                choserHtml = wp.element.createElement(
                    'div',
                    { className: 'chosenPostContainer' },
                    wp.element.createElement(
                        'p',
                        null,
                        self.props.properties.attributes[propPostTitle]
                    ),
                    wp.element.createElement(
                        'button',
                        { className: 'deleteChosenPost',
                            onClick: function onClick() {
                                var params = '{"' + propPostTitle + '" : "", "' + propPostId + '" : ""}';
                                params = JSON.parse(params);
                                self.props.properties.setAttributes(params);
                                self.setState({ inputState: '' });
                            } },
                        wp.element.createElement('i', null)
                    )
                );
            }

            /*
            *  update input value
            */
            function updateAutocomplete(e) {
                var val = e.target.value;
                self.setState({ inputState: val });
            }

            if (!this.props.save) {
                return null;
            } else {
                return wp.element.createElement(
                    'div',
                    { className: 'custom-post-chooser' },
                    wp.element.createElement(
                        'div',
                        { className: 'input-part' },
                        choserHtml
                    ),
                    autocompleteHtml
                );
            }
        }
    }, {
        key: 'componentDidMount',
        value: function componentDidMount() {
            var _this2 = this;

            fetch(ajaxurl + '?action=jg_get_posts').then(function (response) {
                return response.json();
            }).then(function (data) {
                if (typeof data !== 'undefined') {
                    _this2.setState({ posts: data });
                }
            }).catch(function (error) {
                console.error(error);
            });
        }
    }]);

    return SinglePost;
}(Component);

/* harmony default export */ __webpack_exports__["a"] = (SinglePost);

/***/ }),
/* 1 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__component_home_featured_posts__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__component_featured_posts_slider_single_post__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__component_slider_section__ = __webpack_require__(4);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__component_page_header__ = __webpack_require__(5);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__component_large_slider_large_slider__ = __webpack_require__(6);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__component_google_map__ = __webpack_require__(7);







if (typeof JG === 'undefined') {
    var JG = {};
}

(function ($) {
    JG.Blocks = {
        Init: function Init() {
            Object(__WEBPACK_IMPORTED_MODULE_0__component_home_featured_posts__["a" /* default */])();
            Object(__WEBPACK_IMPORTED_MODULE_1__component_featured_posts_slider_single_post__["a" /* default */])();
            Object(__WEBPACK_IMPORTED_MODULE_2__component_slider_section__["a" /* default */])();
            Object(__WEBPACK_IMPORTED_MODULE_3__component_page_header__["a" /* default */])();
            Object(__WEBPACK_IMPORTED_MODULE_4__component_large_slider_large_slider__["a" /* default */])();
            Object(__WEBPACK_IMPORTED_MODULE_5__component_google_map__["a" /* default */])();
        }
    };
})($);

jQuery(function () {
    JG.Blocks.Init();
});

/***/ }),
/* 2 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__pick_single_post__ = __webpack_require__(0);


var InnerBlocks = wp.blockEditor.InnerBlocks;
var registerBlockType = wp.blocks.registerBlockType;


/* harmony default export */ __webpack_exports__["a"] = (function () {
    registerBlockType('jg-blocks/home-featured-posts', {
        title: 'Home featured posts',
        category: 'jg-blocks',
        attributes: {
            singlePost1: {
                number: ''
            },
            singlePost1Title: {
                string: '',
                default: ''
            },
            singlePost2: {
                number: ''
            },
            singlePost2Title: {
                string: '',
                default: ''
            }
        },

        edit: function edit(properties) {
            return wp.element.createElement(
                'div',
                { className: properties.className + '__container my-block-editor-style' },
                wp.element.createElement(
                    'h3',
                    null,
                    'Slider'
                ),
                wp.element.createElement(InnerBlocks, {
                    allowedBlocks: ['jg-blocks/featured-posts-slider-single-post'],
                    template: [['jg-blocks/featured-posts-slider-single-post'], ['jg-blocks/featured-posts-slider-single-post'], ['jg-blocks/featured-posts-slider-single-post']],
                    templateLock: false
                }),
                wp.element.createElement(
                    'h4',
                    null,
                    'Posts on right side:'
                ),
                wp.element.createElement(__WEBPACK_IMPORTED_MODULE_0__pick_single_post__["a" /* default */], { properties: properties, save: true, propname: 'singlePost1' }),
                wp.element.createElement(__WEBPACK_IMPORTED_MODULE_0__pick_single_post__["a" /* default */], { properties: properties, save: true, propname: 'singlePost2' })
            );
        },
        save: function save(properties) {
            return wp.element.createElement(InnerBlocks.Content, null);
        }
    });
});

/***/ }),
/* 3 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__pick_single_post__ = __webpack_require__(0);
var registerBlockType = wp.blocks.registerBlockType;



/* harmony default export */ __webpack_exports__["a"] = (function () {
    registerBlockType('jg-blocks/featured-posts-slider-single-post', {
        title: 'Featured posts single slide',
        icon: '',
        category: 'jg-blocks',
        parent: ['jg-blocks/featured-posts-slider'],
        attributes: {
            singlePost1: {
                number: ''
            },
            singlePost1Title: {
                string: '',
                default: ''
            }
        },

        edit: function edit(properties) {
            return wp.element.createElement(
                'div',
                { className: properties.className + '__container featured-posts-single-slide' },
                wp.element.createElement(__WEBPACK_IMPORTED_MODULE_0__pick_single_post__["a" /* default */], { properties: properties, save: true, propname: 'singlePost1' })
            );
        },

        save: function save() {
            return null;
        }
    });
});

/***/ }),
/* 4 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var registerBlockType = wp.blocks.registerBlockType;
var _wp$blockEditor = wp.blockEditor,
    InnerBlocks = _wp$blockEditor.InnerBlocks,
    MediaUpload = _wp$blockEditor.MediaUpload;
var Button = wp.components.Button;


/* harmony default export */ __webpack_exports__["a"] = (function () {
    registerBlockType('jg-blocks/slider-section', {
        title: 'Slider section',
        icon: '',
        category: 'jg-blocks',

        edit: function edit(properties) {
            return wp.element.createElement(
                'div',
                { className: properties.className + '__container slider-section' },
                wp.element.createElement(
                    'h3',
                    null,
                    'Slider'
                ),
                wp.element.createElement(InnerBlocks, {
                    allowedBlocks: ['jg-blocks/slider-section-item'],
                    template: [['jg-blocks/slider-section-item'], ['jg-blocks/slider-section-item'], ['jg-blocks/slider-section-item']] })
            );
        },

        save: function save() {
            return wp.element.createElement(InnerBlocks.Content, null);
        }
    });

    //single slide item
    registerBlockType('jg-blocks/slider-section-item', {
        title: 'Slide section item',
        icon: '',
        category: 'jg-blocks',
        parent: ['jg-blocks/slider-section-single-slide'],
        attributes: {
            imgUrl: {
                type: 'string',
                default: ''
            },
            imgId: {
                type: 'number',
                default: ''
            }
        },

        edit: function edit(properties) {
            var getImageButton = function getImageButton(openEvent) {
                if (properties.attributes.imgUrl) {
                    return wp.element.createElement('img', {
                        src: properties.attributes.imgUrl,
                        onClick: openEvent,
                        className: 'image'
                    });
                } else {
                    return wp.element.createElement(
                        'div',
                        { className: 'button-container' },
                        wp.element.createElement(
                            Button,
                            {
                                onClick: openEvent,
                                className: 'button button-large' },
                            'Pick an image'
                        )
                    );
                }
            };

            return wp.element.createElement(
                'div',
                { className: properties.className + '__container slider-section-item' },
                wp.element.createElement(MediaUpload, {
                    onSelect: function onSelect(media) {
                        properties.setAttributes({ imgUrl: media.url, imgId: media.id });
                    },
                    type: 'image',
                    value: properties.attributes.imgUrl,
                    render: function render(_ref) {
                        var open = _ref.open;
                        return getImageButton(open);
                    }
                })
            );
        },

        save: function save() {
            return null;
        }
    });
});

/***/ }),
/* 5 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var registerBlockType = wp.blocks.registerBlockType;
var RichText = wp.blockEditor.RichText;


/* harmony default export */ __webpack_exports__["a"] = (function () {
    registerBlockType('jg-blocks/page-header', {
        title: 'Page header',
        category: 'jg-blocks',
        attributes: {
            description: {
                type: 'string',
                default: ''
            }
        },

        edit: function edit(properties) {
            var description = properties.attributes.description;


            return wp.element.createElement(
                'div',
                { className: properties.className + '__container pageHeader' },
                wp.element.createElement(
                    'p',
                    null,
                    'Page header'
                ),
                wp.element.createElement(RichText, {
                    tagName: 'p',
                    placeholder: 'Description',
                    value: description,
                    onChange: function onChange(content) {
                        return properties.setAttributes({ description: content });
                    }
                })
            );
        },

        save: function save() {
            return null;
        }
    });
});

/***/ }),
/* 6 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var registerBlockType = wp.blocks.registerBlockType;
var _wp$blockEditor = wp.blockEditor,
    InnerBlocks = _wp$blockEditor.InnerBlocks,
    MediaUpload = _wp$blockEditor.MediaUpload;
var Button = wp.components.Button;


/* harmony default export */ __webpack_exports__["a"] = (function () {
    registerBlockType('jg-blocks/large-slider', {
        title: 'Large slider',
        icon: '',
        category: 'jg-blocks',

        edit: function edit(properties) {
            return wp.element.createElement(
                'div',
                { className: properties.className + '__container slider-section' },
                wp.element.createElement(
                    'h3',
                    null,
                    'Slider'
                ),
                wp.element.createElement(InnerBlocks, {
                    allowedBlocks: ['jg-blocks/large-slider-item'],
                    template: [['jg-blocks/large-slider-item'], ['jg-blocks/large-slider-item'], ['jg-blocks/large-slider-item']] })
            );
        },

        save: function save() {
            return wp.element.createElement(InnerBlocks.Content, null);
        }
    });

    //single slide item
    registerBlockType('jg-blocks/large-slider-item', {
        title: 'Large slider item',
        icon: '',
        category: 'jg-blocks',
        parent: ['jg-blocks/large-slider'],
        attributes: {
            imgUrl: {
                type: 'string',
                default: ''
            },
            imgId: {
                type: 'number',
                default: ''
            }
        },

        edit: function edit(properties) {
            var getImageButton = function getImageButton(openEvent) {
                if (properties.attributes.imgUrl) {
                    return wp.element.createElement('img', {
                        src: properties.attributes.imgUrl,
                        onClick: openEvent,
                        className: 'image'
                    });
                } else {
                    return wp.element.createElement(
                        'div',
                        { className: 'button-container' },
                        wp.element.createElement(
                            Button,
                            {
                                onClick: openEvent,
                                className: 'button button-large' },
                            'Pick an image'
                        )
                    );
                }
            };

            return wp.element.createElement(
                'div',
                { className: properties.className + '__container slider-section-item' },
                wp.element.createElement(
                    'h3',
                    null,
                    'Single slide'
                ),
                wp.element.createElement(InnerBlocks, {
                    allowedBlocks: ['core/paragraph', 'core/heading', 'core/navigation-link', 'core/button'],
                    template: ['core/paragraph'] }),
                wp.element.createElement('div', { className: 'vertical-space8' }),
                wp.element.createElement(MediaUpload, {
                    onSelect: function onSelect(media) {
                        properties.setAttributes({ imgUrl: media.url, imgId: media.id });
                    },
                    type: 'image',
                    value: properties.attributes.imgUrl,
                    render: function render(_ref) {
                        var open = _ref.open;
                        return getImageButton(open);
                    }
                })
            );
        },

        save: function save() {
            return wp.element.createElement(InnerBlocks.Content, null);
        }
    });
});

/***/ }),
/* 7 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var registerBlockType = wp.blocks.registerBlockType;
var _wp$editor = wp.editor,
    RichText = _wp$editor.RichText,
    InspectorControls = _wp$editor.InspectorControls;
var _wp$components = wp.components,
    TextControl = _wp$components.TextControl,
    PanelBody = _wp$components.PanelBody;
var Fragment = wp.element.Fragment;


/* harmony default export */ __webpack_exports__["a"] = (function () {
    registerBlockType('jg-blocks/google-map', {
        title: 'Google map',
        icon: '',
        category: 'jg-blocks',
        supports: {
            multiple: false
        },
        attributes: {
            label: {
                type: 'string',
                default: ''
            },
            text1: {
                type: 'string',
                default: ''
            },
            pinLat: {
                type: 'string',
                default: ''
            },
            pinLong: {
                type: 'string',
                default: ''
            },
            positionLat: {
                type: 'string',
                default: ''
            },
            positionLong: {
                type: 'string',
                default: ''
            }
        },
        edit: function edit(properties) {

            return wp.element.createElement(
                Fragment,
                null,
                wp.element.createElement(
                    InspectorControls,
                    null,
                    wp.element.createElement(
                        PanelBody,
                        null,
                        wp.element.createElement(TextControl, {
                            label: 'Pin latitude',
                            value: properties.attributes.pinLat,
                            onChange: function onChange(content) {
                                return properties.setAttributes({ pinLat: content });
                            }
                        }),
                        wp.element.createElement(TextControl, {
                            label: 'Pin longitude',
                            value: properties.attributes.pinLong,
                            onChange: function onChange(content) {
                                return properties.setAttributes({ pinLong: content });
                            }
                        }),
                        wp.element.createElement(TextControl, {
                            label: 'Map position latitude',
                            value: properties.attributes.positionLat,
                            onChange: function onChange(content) {
                                return properties.setAttributes({ positionLat: content });
                            }
                        }),
                        wp.element.createElement(TextControl, {
                            label: 'Map position longitude',
                            value: properties.attributes.positionLong,
                            onChange: function onChange(content) {
                                return properties.setAttributes({ positionLong: content });
                            }
                        })
                    )
                ),
                wp.element.createElement(
                    'div',
                    { className: properties.className + '__container' },
                    wp.element.createElement(
                        'div',
                        { className: 'gutenberg-style' },
                        wp.element.createElement(RichText, {
                            tagName: 'h3',
                            placeholder: 'Google map title',
                            value: properties.attributes.text1,
                            onChange: function onChange(content) {
                                return properties.setAttributes({ text1: content });
                            }
                        }),
                        wp.element.createElement(RichText, {
                            tagName: 'p',
                            placeholder: 'Google map description',
                            value: properties.attributes.label,
                            onChange: function onChange(content) {
                                return properties.setAttributes({ label: content });
                            }
                        })
                    )
                )
            );
        },

        save: function save() {
            return null;
        }
    });
});

/***/ })
/******/ ]);