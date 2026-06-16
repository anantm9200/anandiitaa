import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const { image, heading, subtitle, instagram, facebook, youtube } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );
	const set = ( patch ) => setAttributes( patch );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Social CTA — layout, wordmark and icons locked. Edit the background, text and the three social links. Use <br> for a line break.', 'anandiitaa-block' ) }
			</p>

			<label className="anandiitaa-field-label">{ __( 'Background image', 'anandiitaa-block' ) }</label>
			<ImagePicker value={ image } onSelect={ ( m ) => set( { image: m.url } ) } />

			<TextControl label={ __( 'Heading', 'anandiitaa-block' ) } value={ heading } onChange={ ( v ) => set( { heading: v } ) } />
			<TextControl label={ __( 'Subtitle', 'anandiitaa-block' ) } value={ subtitle } onChange={ ( v ) => set( { subtitle: v } ) } />
			<TextControl label={ __( 'Instagram URL', 'anandiitaa-block' ) } value={ instagram } onChange={ ( v ) => set( { instagram: v } ) } />
			<TextControl label={ __( 'Facebook URL', 'anandiitaa-block' ) } value={ facebook } onChange={ ( v ) => set( { facebook: v } ) } />
			<TextControl label={ __( 'YouTube URL', 'anandiitaa-block' ) } value={ youtube } onChange={ ( v ) => set( { youtube: v } ) } />
		</div>
	);
}
