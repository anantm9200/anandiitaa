import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';

export default function Edit( { attributes, setAttributes } ) {
	const { title, body } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );
	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Vision — layout & background locked. Edit the title and body. Use <br> for line breaks.', 'anandiitaa-block' ) }
			</p>
			<TextControl label={ __( 'Title', 'anandiitaa-block' ) } value={ title } onChange={ ( v ) => setAttributes( { title: v } ) } />
			<TextareaControl label={ __( 'Body', 'anandiitaa-block' ) } value={ body } onChange={ ( v ) => setAttributes( { body: v } ) } />
		</div>
	);
}
