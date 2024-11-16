export default () => {

    registerBlockType('jg-blocks/custom-posts-section', {
        title: 'Custom posts',
        category: 'jg-blocks',
        description: '',
        attributes: {
            headline: {
                type: 'string',
                default: ''
            },
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
            },
            singlePost3: {
                number: ''
            },
            singlePost3Title: {
                string: '',
                default: ''
            },
        },

        edit(properties) {
            return <div className={`${properties.className}__container my-block-editor-style`}>
                <TextControl
                    className="text-input"
                    label="Headline:"
                    value={properties.attributes.headline}
                    onChange={(text) => properties.setAttributes({headline: text})}
                />
                <h3>Chosen articles:</h3>
                <SinglePost properties={properties} save={true} propname="singlePost1"/>
                <SinglePost properties={properties} save={true} propname="singlePost2"/>
                <SinglePost properties={properties} save={true} propname="singlePost3"/>
            </div>
        },
        save(properties) {
            return null;
        }
    })
}