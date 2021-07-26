const {registerBlockType} = wp.blocks; //Blocks API
const {createElement} = wp.element; //React.createElement
const {__} = wp.i18n; //translation functions
const {InspectorControls} = wp.blockEditor; //Block inspector wrapper
const {serverSideRender} = wp;
const {TextControl,SelectControl} = wp.components; //WordPress form inputs and server-side renderer

registerBlockType( 'wp1s-display-block/wp1s-widget', {
	title: __( 'WP-1-Slider' ), // Block title.
	category:  __( 'media' ), //category
	attributes:  {
		heading: {
			default: __('WP-1-Slider Title'),
			type: 'string'
		},
		heading_tag : {
			default: 'h2',
			type:'string'
		},
		wp1s_id : {
			default: '',
			type:'string'
		},
	},
	//display the post title
		edit(props){
		const wp1slider = WP1S_logos_array;
		const attributes =  props.attributes;
		const setAttributes =  props.setAttributes;


		const headingTags = [
		{ label: 'Heading 1', value: 'h1' },
		{ label: 'Heading 2', value: 'h2' },
		{ label: 'Heading 3', value: 'h3' },
		{ label: 'Heading 4', value: 'h4' },
		{ label: 'Heading 5', value: 'h5' },
		{ label: 'Heading 6', value: 'h6' }
		];


		//Function to update heading level
		function changeHeading(heading){
			setAttributes({heading});
		}

		//Function to update id attribute
		function changeheadingTag(heading_tag){
			setAttributes({heading_tag});
		}

		//Function to update id attribute
		function changewp1sId(wp1s_id){
			setAttributes({wp1s_id});
		}
		
		//Display block preview and UI
		return createElement('div', {}, [
			//Preview a block with a PHP render callback
			createElement( serverSideRender, {
				block: 'wp1s-display-block/wp1s-widget',
				attributes: attributes
			} ),
			//Block inspector
			createElement( InspectorControls, {},
				[
				createElement(TextControl, {
					value: attributes.heading,
					label: __( 'Title' ),
					onChange: changeHeading,
				}),
				createElement(SelectControl, {
					value: [attributes.heading_tag],
					label: __( 'Title Tag' ),
					onChange: changeheadingTag,
					options: headingTags,
				}),
				createElement(SelectControl, {
					value: [props.attributes.wp1s_id],
					label: __( 'WP-1-Slider' ),
					onChange: changewp1sId,
					options: wp1slider,
				}),
				]
				)
			] )
	},
	save(){
		return null;//save has to exist. This all we need
	}
});