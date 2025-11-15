const { registerBlockType } = wp.blocks;

export default () => {

    registerBlockType('jg-blocks/partners-by-category', {
        title: 'Partners list',
        category: 'jg-blocks',
        description: '',

        edit(properties) {
            return <div className={`${properties.className}__container my-block-editor-style`}>
                <h3>Partners list</h3>
            </div>
        },
        save(properties) {
            return null;
        }
    })
}