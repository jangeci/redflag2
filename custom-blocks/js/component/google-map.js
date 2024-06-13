const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls } = wp.editor;
const { TextControl, PanelBody } = wp.components;
const { Fragment} = wp.element;

export default () => {
    registerBlockType ('jg-blocks/google-map', {
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
            },
        },
        edit: (properties) => {

            return <Fragment>
                <InspectorControls>
                    <PanelBody>
                        <TextControl
                            label="Pin latitude"
                            value={ properties.attributes.pinLat }
                            onChange={ (content) => properties.setAttributes( { pinLat : content } ) }
                        />
                        <TextControl
                            label="Pin longitude"
                            value={ properties.attributes.pinLong }
                            onChange={ (content) => properties.setAttributes( { pinLong : content } ) }
                        />
                        <TextControl
                            label="Map position latitude"
                            value={ properties.attributes.positionLat }
                            onChange={ (content) => properties.setAttributes( { positionLat : content } ) }
                        />
                        <TextControl
                            label="Map position longitude"
                            value={ properties.attributes.positionLong }
                            onChange={ (content) => properties.setAttributes( { positionLong : content } ) }
                        />
                    </PanelBody>
                </InspectorControls>
                <div className={`${properties.className}__container`}>
                    <div className="gutenberg-style">
                        <RichText
                            tagName="h3"
                            placeholder="Google map title"
                            value={ properties.attributes.text1 }
                            onChange={ (content) => properties.setAttributes( { text1 : content } ) }
                        />
                        <RichText
                            tagName="p"
                            placeholder="Google map description"
                            value={ properties.attributes.label }
                            onChange={ (content) => properties.setAttributes( { label : content } ) }
                        />
                    </div>
                </div>
            </Fragment>
        },

        save: () => {
            return null;
        }
    });
};