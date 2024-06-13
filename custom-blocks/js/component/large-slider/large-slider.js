const { registerBlockType } = wp.blocks;
const { InnerBlocks, MediaUpload } = wp.blockEditor;
const { Button } = wp.components;

export default () => {
    registerBlockType('jg-blocks/large-slider', {
        title: 'Large slider',
        icon: '',
        category: 'jg-blocks',

        edit: (properties) => {
            return <div className={`${properties.className}__container slider-section`}>
                <h3>Slider</h3>
                <InnerBlocks
                    allowedBlocks={['jg-blocks/large-slider-item']}
                    template={[
                        ['jg-blocks/large-slider-item'],
                        ['jg-blocks/large-slider-item'],
                        ['jg-blocks/large-slider-item']
                    ]}/>
            </div>
        },

        save: () => {
            return <InnerBlocks.Content/>;
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
            },
        },

        edit: (properties) => {
            const getImageButton = (openEvent) => {
                if (properties.attributes.imgUrl) {
                    return (
                        <img
                            src={properties.attributes.imgUrl}
                            onClick={openEvent}
                            className="image"
                        />
                    );
                } else {
                    return (
                        <div className="button-container">
                            <Button
                                onClick={openEvent}
                                className="button button-large">
                                Pick an image
                            </Button>
                        </div>
                    );
                }
            };

            return <div className={`${properties.className}__container slider-section-item`}>
                <h3>Single slide</h3>
                <InnerBlocks
                    allowedBlocks={['core/paragraph', 'core/heading', 'core/navigation-link', 'core/button']}
                    template={['core/paragraph']}/>
                <div className={'vertical-space8'}></div>
                <MediaUpload
                    onSelect={media => {
                        properties.setAttributes({imgUrl: media.url, imgId: media.id});
                    }}
                    type="image"
                    value={properties.attributes.imgUrl}
                    render={({open}) => getImageButton(open)}
                />
            </div>
        },

        save: () => {
            return <InnerBlocks.Content/>;
        }
    });
};