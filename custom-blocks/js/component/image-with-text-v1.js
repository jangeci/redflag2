const {registerBlockType} = wp.blocks;
const {InnerBlocks, MediaUpload} = wp.blockEditor;
const {Button} = wp.components;

export default () => {
    registerBlockType('jg-blocks/image-with-text-v1', {
        title: 'Image with text v1',
        icon: '',
        category: 'jg-blocks',
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

            return <div className={`${properties.className}__container slider-section`}>
                <h3>Image block with text v1 block</h3>
                <MediaUpload
                    onSelect={media => {
                        properties.setAttributes({imgUrl: media.url, imgId: media.id});
                    }}
                    type="image"
                    value={properties.attributes.imgUrl}
                    render={({open}) => getImageButton(open)}
                />
                <InnerBlocks
                    allowedBlocks={['core/paragraph', 'core/heading', 'core/navigation-link', 'core/button']}
                    template={['core/paragraph']}/>
            </div>
        },

        save: () => {
            return <InnerBlocks.Content/>;
        }
    });
};