const {registerBlockType} = wp.blocks;
import SinglePost from "./pick-single-post";


export default () => {
    registerBlockType('jg-blocks/featured-posts-slider-single-post', {
        title: 'Featured posts single slide',
        icon: '',
        category: 'jg-blocks',
        parent: ['jg-blocks/featured-posts-slider'],
        attributes: {
            singlePost1: {
                number: ''
            },
            singlePost1Title: {
                string: '',
                default: ''
            },
        },

        edit: (properties) => {
            return <div className={`${properties.className}__container featured-posts-single-slide`}>
                <SinglePost properties={properties} save={true} propname="singlePost1"/>
            </div>
        },

        save: () => {
            return null;
        }
    });
}