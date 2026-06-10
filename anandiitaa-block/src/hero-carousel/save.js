import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { autoplay, interval } = attributes;
	const blockProps = useBlockProps.save( {
		className: 'anandiitaa-hero-carousel',
		'data-autoplay': autoplay ? 'true' : 'false',
		'data-interval': interval,
	} );

	return (
		<div { ...blockProps }>
			<div className="anandiitaa-hero-carousel__track">
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
