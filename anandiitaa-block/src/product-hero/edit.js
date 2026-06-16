import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, SelectControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

const ICONS = [
	{ label: 'Tested', value: 'tested' },
	{ label: 'No chemicals', value: 'noChem' },
	{ label: 'Minerals', value: 'minerals' },
	{ label: 'Clean processing', value: 'clean' },
];

export default function Edit( { attributes, setAttributes } ) {
	const { productName, heroImage, sealImage, features = [] } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	// Swapping the hero image clears the responsive tiers so the new image is used everywhere.
	const swapHero = ( m ) =>
		setAttributes( { heroImage: m.url, heroMac: '', heroD1366: '', heroD1280: '', heroTablet: '', heroPhone: '' } );

	const updateFeature = ( i, patch ) =>
		setAttributes( { features: features.map( ( f, idx ) => ( idx === i ? { ...f, ...patch } : f ) ) } );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Product Hero — layout & icons locked. Edit the product name, feature lines and images. Use <br> for line breaks.', 'anandiitaa-block' ) }
			</p>

			<TextControl label={ __( 'Product name', 'anandiitaa-block' ) } value={ productName } onChange={ ( productName ) => setAttributes( { productName } ) } />

			<label className="anandiitaa-field-label">{ __( 'Hero image', 'anandiitaa-block' ) }</label>
			<ImagePicker value={ heroImage } onSelect={ swapHero } />

			<label className="anandiitaa-field-label">{ __( '100% Natural seal', 'anandiitaa-block' ) }</label>
			<ImagePicker value={ sealImage } onSelect={ ( m ) => setAttributes( { sealImage: m.url } ) } />

			{ features.map( ( f, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Feature', 'anandiitaa-block' ) } { i + 1 }</div>
					<SelectControl value={ f.icon } options={ ICONS } onChange={ ( icon ) => updateFeature( i, { icon } ) } />
					<TextControl value={ f.text } onChange={ ( text ) => updateFeature( i, { text } ) } />
				</div>
			) ) }
		</div>
	);
}
