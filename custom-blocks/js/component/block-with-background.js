const { registerBlockType } = wp.blocks;
const { InnerBlocks } = wp.blockEditor;

export default () => {
    registerBlockType('jg-blocks/block-with-background', {
        title: 'Block With Background',
        icon: '',
        category: 'jg-blocks',
        supports: {
            "customClassName": true
        },
        attributes: {
            className: {
                type: 'string',
                default: ''
            }
        },

        edit: (properties) => {
            return  <div className={`${properties.className} block-with-background`}>
                <h3>Block with background</h3>
                <InnerBlocks/>
            </div>
        },

        save: () => {
            return <InnerBlocks.Content/>;
        }
    });
};
