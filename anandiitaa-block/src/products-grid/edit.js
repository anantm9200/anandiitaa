import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const products = attributes.products || [];
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	const update = ( i, patch ) =>
		setAttributes( {
			products: products.map( ( p, idx ) => ( idx === i ? { ...p, ...patch } : p ) ),
		} );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Products Grid — layout & accent colors locked. Edit each card.', 'anandiitaa-block' ) }
			</p>

			{ products.map( ( p, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Card', 'anandiitaa-block' ) } { i + 1 }</div>
					<ImagePicker value={ p.image } onSelect={ ( m ) => update( i, { image: m.url } ) } />
					<TextControl label={ __( 'Title', 'anandiitaa-block' ) } value={ p.title } onChange={ ( title ) => update( i, { title } ) } />
					<TextControl label={ __( 'Description', 'anandiitaa-block' ) } value={ p.desc } onChange={ ( desc ) => update( i, { desc } ) } />
					<div className="anandiitaa-grid-2">
						<TextControl label={ __( 'Sizes', 'anandiitaa-block' ) } value={ p.sizes } onChange={ ( sizes ) => update( i, { sizes } ) } />
						<TextControl label={ __( 'Link', 'anandiitaa-block' ) } value={ p.href } onChange={ ( href ) => update( i, { href } ) } />
					</div>
				</div>
			) ) }
		</div>
	);
}
