import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const { image, columns = [] } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	const updateCol = ( i, patch ) =>
		setAttributes( {
			columns: columns.map( ( c, idx ) => ( idx === i ? { ...c, ...patch } : c ) ),
		} );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __(
					'The Anandiitaa Standards — layout, icons and wordmark are locked. Edit the background image and each column’s title + body.',
					'anandiitaa-block'
				) }
			</p>

			<label className="anandiitaa-field-label">{ __( 'Background image', 'anandiitaa-block' ) }</label>
			<ImagePicker value={ image } onSelect={ ( m ) => setAttributes( { image: m.url } ) } />

			{ columns.map( ( col, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Column', 'anandiitaa-block' ) } { i + 1 }</div>
					<TextControl
						label={ __( 'Title', 'anandiitaa-block' ) }
						value={ col.title }
						onChange={ ( title ) => updateCol( i, { title } ) }
					/>
					<TextControl
						label={ __( 'Body', 'anandiitaa-block' ) }
						value={ col.body }
						onChange={ ( body ) => updateCol( i, { body } ) }
					/>
				</div>
			) ) }
		</div>
	);
}
