const {registerBlockType} = wp.blocks;
const {RichText} = wp.blockEditor;

export default () => {
    registerBlockType('jg-blocks/page-header', {
        title: 'Page header',
        category: 'jg-blocks',
        attributes: {
            description: {
                type: 'string',
                default: ''
            },
        },

        edit: (properties) => {
            const {description} = properties.attributes;

            return <div className={`${properties.className}__container pageHeader`}>
                <p>Page header</p>
                <RichText
                    tagName="p"
                    placeholder="Description"
                    value={ description }
                    onChange={ (content) => properties.setAttributes( { description : content } ) }
                />
            </div>
        },

        save: () => {
            return null;
        }
    });
}