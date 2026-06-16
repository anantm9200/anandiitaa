import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const { image, captionTop, heading } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Feature Banner — layout locked. Edit the background and the two text lines.', 'anandiitaa-block' ) }
			</p>

			<label className="anandiitaa-field-label">{ __( 'Background image', 'anandiitaa-block' ) }</label>
			<ImagePicker value={ image } onSelect={ ( m ) => setAttributes( { image: m.url } ) } />

			<TextControl
				label={ __( 'Top caption', 'anandiitaa-block' ) }
				value={ captionTop }
				onChange={ ( captionTop ) => setAttributes( { captionTop } ) }
			/>
			<TextControl
				label={ __( 'Headline', 'anandiitaa-block' ) }
				value={ heading }
				onChange={ ( heading ) => setAttributes( { heading } ) }
			/>
		</div>
	);
}
