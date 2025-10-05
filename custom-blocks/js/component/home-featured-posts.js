import SinglePost from "./pick-single-post";

const {InnerBlocks} = wp.blockEditor;
const {registerBlockType} = wp.blocks;

export default () => {
    registerBlockType('jg-blocks/home-featured-posts', {
        title: 'Home featured posts',
        category: 'jg-blockås',
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
            },
        },

        edit(properties) {
            return <div className={`${properties.className}__container my-block-editor-style`}>
                <h3>Slider</h3>
                <InnerBlocks
                    allowedBlocks={['jg-blocks/featured-posts-slider-single-post']}
                    template={[
                        ['jg-blocks/featured-posts-slider-single-post'],
                        ['jg-blocks/featured-posts-slider-single-post'],
                        ['jg-blocks/featured-posts-slider-single-post']
                    ]}
                    templateLock={false}
                />
                <h4>Posts on right side:</h4>
                <SinglePost properties={properties} save={true} propname="singlePost1"/>
                <SinglePost properties={properties} save={true} propname="singlePost2"/>
            </div>
        },

        save(properties) {
            return <InnerBlocks.Content/>;
        }
    });
}