const {Component} = wp.element;
const {Button} = wp.components;

export class SinglePost extends Component {
    constructor(props) {
        super(props);

        this.state = {
            posts: [
                {
                    title: '',
                    id: ''
                }
            ],
            inputState: ''
        };
    }

    /**
     * render autocomplete suggestions
     */
    renderAutocompleteBlock() {
        let self = this;
        let inputState = self.state.inputState;
        let autocompleteBlock = [];
        let postsCount = self.state.posts.length;
        let posts = self.state.posts;
        let propPostId = self.props.propname;
        let propPostTitle = self.props.propname + 'Title';

        if (inputState !== '') {
            if (postsCount) {
                for (let i = 0; i < postsCount; i++) {
                    if (posts[i].title.toLowerCase().includes(inputState.toLowerCase())) {
                        autocompleteBlock.push(<Button className="singlePostOption"
                                                       onClick={
                                                           (e) => {
                                                               let params = `{"${propPostTitle}" : "${e.target.textContent}", "${propPostId}" : ${e.target.dataset.postid}}`;
                                                               params = JSON.parse(params);
                                                               self.props.properties.setAttributes(params);
                                                               self.setState({inputState: ''})
                                                           }
                                                       }
                                                       data-postid={posts[i].id}>{posts[i].title}</Button>);
                    }
                }
                return <div className="autocompleteBlock">
                    {autocompleteBlock}
                </div>
            }
        } else {
            return null
        }
    }

    /**
     * Render the component into html.
     */
    render() {
        let self = this;
        let autocompleteHtml = self.renderAutocompleteBlock();
        let choserHtml = <input className="text-input" type="text" placeholder="Search posts by title"
                                value={this.state.inputState} onChange={updateAutocomplete}/>;
        let propPostId = self.props.propname;
        let propPostTitle = self.props.propname + 'Title';
        if (Number.isInteger(self.props.properties.attributes[propPostId])) {
            choserHtml = <div className="chosenPostContainer">
                <p>{self.props.properties.attributes[propPostTitle]}</p>
                <button className="deleteChosenPost"
                        onClick={() => {
                            let params = `{"${propPostTitle}" : "", "${propPostId}" : ""}`;
                            params = JSON.parse(params);
                            self.props.properties.setAttributes(params);
                            self.setState({inputState: ''})
                        }
                        }>

                    <i></i>
                </button>
            </div>;
        }

        /*
        *  update input value
        */
        function updateAutocomplete(e) {
            let val = e.target.value;
            self.setState({inputState: val});
        }

        if (!this.props.save) {
            return null;
        } else {
            return <div className="custom-post-chooser">
                <div className="input-part">
                    {choserHtml}
                </div>
                {autocompleteHtml}
            </div>;
        }
    }

    componentDidMount() {
        fetch(`${ajaxurl}?action=jg_get_posts`)
            .then(response => {
                return response.json();
            })
            .then(data => {
                if (typeof (data) !== 'undefined') {
                    this.setState({posts: data});
                }
            })
            .catch(error => {
                console.error(error);
            });
    }
}

export default SinglePost;
