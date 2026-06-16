import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const steps = attributes.steps || [];
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	const update = ( i, patch ) =>
		setAttributes( { steps: steps.map( ( s, idx ) => ( idx === i ? { ...s, ...patch } : s ) ) } );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Method — numbers & alternating layout locked. Edit each step.', 'anandiitaa-block' ) }
			</p>
			{ steps.map( ( s, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Step', 'anandiitaa-block' ) } { i + 1 }</div>
					<ImagePicker value={ s.image } onSelect={ ( m ) => update( i, { image: m.url } ) } />
					<TextControl label={ __( 'Heading', 'anandiitaa-block' ) } value={ s.title } onChange={ ( title ) => update( i, { title } ) } />
					<TextareaControl label={ __( 'Text', 'anandiitaa-block' ) } value={ s.body } onChange={ ( body ) => update( i, { body } ) } />
				</div>
			) ) }
		</div>
	);
}
