import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const { title, reviews = [] } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	const update = ( i, patch ) =>
		setAttributes( {
			reviews: reviews.map( ( r, idx ) => ( idx === i ? { ...r, ...patch } : r ) ),
		} );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Reviews — layout locked. Edit the section title and each review.', 'anandiitaa-block' ) }
			</p>

			<TextControl label={ __( 'Section title', 'anandiitaa-block' ) } value={ title } onChange={ ( title ) => setAttributes( { title } ) } />

			{ reviews.map( ( r, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Review', 'anandiitaa-block' ) } { i + 1 }</div>
					<ImagePicker value={ r.image } onSelect={ ( m ) => update( i, { image: m.url } ) } label={ __( 'Replace photo', 'anandiitaa-block' ) } />
					<div className="anandiitaa-grid-2">
						<TextControl label={ __( 'Name', 'anandiitaa-block' ) } value={ r.name } onChange={ ( name ) => update( i, { name } ) } />
						<TextControl label={ __( 'Location', 'anandiitaa-block' ) } value={ r.role } onChange={ ( role ) => update( i, { role } ) } />
					</div>
					<TextareaControl label={ __( 'Quote', 'anandiitaa-block' ) } value={ r.quote } onChange={ ( quote ) => update( i, { quote } ) } />
				</div>
			) ) }
		</div>
	);
}
