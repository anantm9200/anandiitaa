import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const { title, footer, items = [] } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	const update = ( i, patch ) =>
		setAttributes( { items: items.map( ( s, idx ) => ( idx === i ? { ...s, ...patch } : s ) ) } );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Benefits Accordion — layout & numbers locked. Edit the title, footer and each item.', 'anandiitaa-block' ) }
			</p>

			<TextControl label={ __( 'Title', 'anandiitaa-block' ) } value={ title } onChange={ ( title ) => setAttributes( { title } ) } />

			{ items.map( ( b, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Benefit', 'anandiitaa-block' ) } { i + 1 }</div>
					<ImagePicker value={ b.image } onSelect={ ( m ) => update( i, { image: m.url } ) } />
					<TextControl label={ __( 'Title', 'anandiitaa-block' ) } value={ b.title } onChange={ ( title ) => update( i, { title } ) } />
					<TextareaControl label={ __( 'Body', 'anandiitaa-block' ) } value={ b.body } onChange={ ( body ) => update( i, { body } ) } />
				</div>
			) ) }

			<TextareaControl label={ __( 'Footer note', 'anandiitaa-block' ) } value={ footer } onChange={ ( footer ) => setAttributes( { footer } ) } />
		</div>
	);
}
