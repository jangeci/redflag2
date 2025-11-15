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
                default: 0
            },
        },

        edit: (properties) => {
            const {attributes, setAttributes} = properties;
            const {imgUrl, imgId} = attributes;

            const getImageButton = (open) => {
                if (imgUrl) {
                    return (
                        <div className="image-wrapper" onClick={open}>
                            <img
                                src={imgUrl}
                                className="image"
                            />
                        </div>

                    );
                } else {
                    return (
                        <div className="button-container">
                            <Button
                                onClick={open}
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
                    allowedTypes={['image']}
                    value={imgId}
                    render={({open}) => getImageButton(open)}
                />
                <InnerBlocks
                    allowedBlocks={['core/paragraph', 'core/heading', 'core/navigation-link', 'core/button']}
                    template={[['core/paragraph']]}/>
            </div>
        },

        save: () => {
            return <InnerBlocks.Content/>;
        }
    });
};