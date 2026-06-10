import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InnerBlocks,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, ToggleControl, RangeControl } from '@wordpress/components';

// Each slide = a Cover block (image bg + heading + subtext + CTA). The client
// adds/removes/reorders slides as Cover blocks; the front end turns them into
// a slider. Editor shows them stacked for easy editing.
const TEMPLATE = [
	[
		'core/cover',
		{ dimRatio: 30, minHeight: 72, minHeightUnit: 'vh', align: 'full' },
		[
			[ 'core/heading', { textAlign: 'center', level: 1, placeholder: __( 'Slide heading', 'anandiitaa-block' ) } ],
			[ 'core/paragraph', { align: 'center', placeholder: __( 'Supporting line of text', 'anandiitaa-block' ) } ],
			[ 'core/buttons', { layout: { type: 'flex', justifyContent: 'center' } }, [ [ 'core/button', { text: __( 'Explore', 'anandiitaa-block' ) } ] ] ],
		],
	],
];

export default function Edit( { attributes, setAttributes } ) {
	const { autoplay, interval } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-hero-carousel is-editing' } );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Carousel settings', 'anandiitaa-block' ) }>
					<ToggleControl
						label={ __( 'Autoplay', 'anandiitaa-block' ) }
						checked={ autoplay }
						onChange={ ( v ) => setAttributes( { autoplay: v } ) }
					/>
					<RangeControl
						label={ __( 'Autoplay interval (ms)', 'anandiitaa-block' ) }
						value={ interval }
						min={ 2000 }
						max={ 10000 }
						step={ 500 }
						onChange={ ( v ) => setAttributes( { interval: v } ) }
					/>
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				<InnerBlocks template={ TEMPLATE } allowedBlocks={ [ 'core/cover' ] } />
			</div>
		</>
	);
}
