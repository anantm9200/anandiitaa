import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const { image, title, body } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );
	const set = ( patch ) => setAttributes( patch );
	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Purpose — layout locked. Edit the image, title and body.', 'anandiitaa-block' ) }
			</p>
			<ImagePicker value={ image } onSelect={ ( m ) => set( { image: m.url } ) } />
			<TextControl label={ __( 'Title', 'anandiitaa-block' ) } value={ title } onChange={ ( v ) => set( { title: v } ) } />
			<TextareaControl label={ __( 'Body', 'anandiitaa-block' ) } value={ body } onChange={ ( v ) => set( { body: v } ) } />
		</div>
	);
}
