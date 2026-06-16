import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const { image, title, benefits = [] } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	const update = ( i, patch ) =>
		setAttributes( {
			benefits: benefits.map( ( b, idx ) => ( idx === i ? { ...b, ...patch } : b ) ),
		} );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Benefits — layout & icons locked. Edit the background, section title and each card. Use <br> for a line break in a card title.', 'anandiitaa-block' ) }
			</p>

			<label className="anandiitaa-field-label">{ __( 'Background image', 'anandiitaa-block' ) }</label>
			<ImagePicker value={ image } onSelect={ ( m ) => setAttributes( { image: m.url } ) } />
			<TextControl label={ __( 'Section title', 'anandiitaa-block' ) } value={ title } onChange={ ( title ) => setAttributes( { title } ) } />

			{ benefits.map( ( b, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Benefit', 'anandiitaa-block' ) } { i + 1 }</div>
					<TextControl label={ __( 'Title (use <br> for line break)', 'anandiitaa-block' ) } value={ b.title } onChange={ ( title ) => update( i, { title } ) } />
					<TextControl label={ __( 'Body', 'anandiitaa-block' ) } value={ b.body } onChange={ ( body ) => update( i, { body } ) } />
				</div>
			) ) }
		</div>
	);
}
