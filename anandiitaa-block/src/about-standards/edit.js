import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const items = attributes.items || [];
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );
	const update = ( i, patch ) =>
		setAttributes( { items: items.map( ( s, idx ) => ( idx === i ? { ...s, ...patch } : s ) ) } );
	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Standards — layout & wordmark locked. Edit each item.', 'anandiitaa-block' ) }
			</p>
			{ items.map( ( s, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Standard', 'anandiitaa-block' ) } { i + 1 }</div>
					<ImagePicker value={ s.image } onSelect={ ( m ) => update( i, { image: m.url, alt: m.alt || s.alt } ) } />
					<TextControl label={ __( 'Title', 'anandiitaa-block' ) } value={ s.title } onChange={ ( title ) => update( i, { title } ) } />
					<TextControl label={ __( 'Body', 'anandiitaa-block' ) } value={ s.body } onChange={ ( body ) => update( i, { body } ) } />
				</div>
			) ) }
		</div>
	);
}
