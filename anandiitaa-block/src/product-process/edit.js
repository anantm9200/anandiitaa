import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const { title, steps = [] } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	const update = ( i, patch ) =>
		setAttributes( { steps: steps.map( ( s, idx ) => ( idx === i ? { ...s, ...patch } : s ) ) } );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Process Timeline — layout, numbers & connectors locked. Edit the title and each step.', 'anandiitaa-block' ) }
			</p>

			<TextControl label={ __( 'Title', 'anandiitaa-block' ) } value={ title } onChange={ ( title ) => setAttributes( { title } ) } />

			{ steps.map( ( s, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Step', 'anandiitaa-block' ) } { i + 1 }</div>
					<ImagePicker value={ s.image } onSelect={ ( m ) => update( i, { image: m.url } ) } />
					<TextControl label={ __( 'Heading', 'anandiitaa-block' ) } value={ s.bold } onChange={ ( bold ) => update( i, { bold } ) } />
					<TextareaControl label={ __( 'Text', 'anandiitaa-block' ) } value={ s.rest } onChange={ ( rest ) => update( i, { rest } ) } />
				</div>
			) ) }
		</div>
	);
}
