const { registerBlockType } = wp.blocks;
const { InnerBlocks, MediaUpload } = wp.blockEditor;
const { Button } = wp.components;

export default () => {
    registerBlockType('jg-blocks/slider-section', {
        title: 'Slider section',
        icon: '',
        category: 'jg-blocks',

        edit: (properties) => {
            return <div className={`${properties.className}__container slider-section`}>
                <h3>Slider</h3>
                <InnerBlocks
                    allowedBlocks={['jg-blocks/slider-section-item']}
                    template={[
                        ['jg-blocks/slider-section-item'],
                        ['jg-blocks/slider-section-item'],
                        ['jg-blocks/slider-section-item']
                    ]}/>
            </div>
        },

        save: () => {
            return <InnerBlocks.Content/>;
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
            return null;
        }
    });
};
