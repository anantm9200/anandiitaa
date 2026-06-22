import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const { variant = 'photo', bgImage, title, reviews = [] } = attributes;
	const isTestimonials = variant === 'testimonials';
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	const update = ( i, patch ) =>
		setAttributes( { reviews: reviews.map( ( r, idx ) => ( idx === i ? { ...r, ...patch } : r ) ) } );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ isTestimonials
					? __( 'Testimonials (text only) — fluid layout, locked. Edit the section title and each quote / name / location.', 'anandiitaa-block' )
					: __( 'Reviews — layout locked. Edit the background, title and each review.', 'anandiitaa-block' ) }
			</p>

			{ ! isTestimonials && (
				<>
					<label className="anandiitaa-field-label">{ __( 'Background image', 'anandiitaa-block' ) }</label>
					<ImagePicker value={ bgImage } onSelect={ ( m ) => setAttributes( { bgImage: m.url } ) } />
				</>
			) }
			<TextControl label={ __( 'Section title', 'anandiitaa-block' ) } value={ title } onChange={ ( v ) => setAttributes( { title: v } ) } />

			{ reviews.map( ( r, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ ( isTestimonials ? __( 'Testimonial', 'anandiitaa-block' ) : __( 'Review', 'anandiitaa-block' ) ) + ' ' + ( i + 1 ) }</div>
					{ ! isTestimonials && (
						<ImagePicker value={ r.image } onSelect={ ( m ) => update( i, { image: m.url } ) } label={ __( 'Replace photo', 'anandiitaa-block' ) } />
					) }
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
