import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const variants = attributes.variants || [];
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	const update = ( i, patch ) =>
		setAttributes( { variants: variants.map( ( v, idx ) => ( idx === i ? { ...v, ...patch } : v ) ) } );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Variants — layout locked. Edit each card.', 'anandiitaa-block' ) }
			</p>
			{ variants.map( ( v, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Variant', 'anandiitaa-block' ) } { i + 1 }</div>
					<ImagePicker value={ v.image } onSelect={ ( m ) => update( i, { image: m.url } ) } />
					<TextControl label={ __( 'Sizes', 'anandiitaa-block' ) } value={ v.available } onChange={ ( available ) => update( i, { available } ) } />
					<TextControl label={ __( 'Title', 'anandiitaa-block' ) } value={ v.title } onChange={ ( title ) => update( i, { title } ) } />
				</div>
			) ) }
		</div>
	);
}
