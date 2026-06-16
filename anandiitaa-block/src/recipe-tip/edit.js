import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';

export default function Edit( { attributes, setAttributes } ) {
	const { title, body, backLabel, backHref } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );
	const set = ( patch ) => setAttributes( patch );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Pro Tip — badge & layout locked. Edit the heading, tip and back link.', 'anandiitaa-block' ) }
			</p>
			<TextControl label={ __( 'Heading', 'anandiitaa-block' ) } value={ title } onChange={ ( v ) => set( { title: v } ) } />
			<TextareaControl label={ __( 'Tip text', 'anandiitaa-block' ) } value={ body } onChange={ ( v ) => set( { body: v } ) } />
			<div className="anandiitaa-grid-2">
				<TextControl label={ __( 'Back link label', 'anandiitaa-block' ) } value={ backLabel } onChange={ ( v ) => set( { backLabel: v } ) } />
				<TextControl label={ __( 'Back link URL', 'anandiitaa-block' ) } value={ backHref } onChange={ ( v ) => set( { backHref: v } ) } />
			</div>
		</div>
	);
}
