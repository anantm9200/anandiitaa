import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const { bgImage, title, callouts = [] } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	const update = ( i, patch ) =>
		setAttributes( { callouts: callouts.map( ( c, idx ) => ( idx === i ? { ...c, ...patch } : c ) ) } );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'About hero — callout positions & arrows locked. Edit the background, title and the 4 label texts.', 'anandiitaa-block' ) }
			</p>

			<label className="anandiitaa-field-label">{ __( 'Background image', 'anandiitaa-block' ) }</label>
			<ImagePicker value={ bgImage } onSelect={ ( m ) => setAttributes( { bgImage: m.url } ) } />
			<TextControl label={ __( 'Page title', 'anandiitaa-block' ) } value={ title } onChange={ ( title ) => setAttributes( { title } ) } />

			{ callouts.map( ( c, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Callout', 'anandiitaa-block' ) } { i + 1 }</div>
					<div className="anandiitaa-grid-2">
						<TextControl label={ __( 'Line 1', 'anandiitaa-block' ) } value={ c.l1 } onChange={ ( l1 ) => update( i, { l1 } ) } />
						<TextControl label={ __( 'Line 2', 'anandiitaa-block' ) } value={ c.l2 } onChange={ ( l2 ) => update( i, { l2 } ) } />
					</div>
				</div>
			) ) }
		</div>
	);
}
