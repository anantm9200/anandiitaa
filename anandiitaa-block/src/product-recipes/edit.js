import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const { title, recipes = [] } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	const update = ( i, patch ) =>
		setAttributes( { recipes: recipes.map( ( r, idx ) => ( idx === i ? { ...r, ...patch } : r ) ) } );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Recipes — layout & icons locked. Edit the title and each recipe card.', 'anandiitaa-block' ) }
			</p>

			<TextControl label={ __( 'Section title', 'anandiitaa-block' ) } value={ title } onChange={ ( title ) => setAttributes( { title } ) } />

			{ recipes.map( ( r, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Recipe', 'anandiitaa-block' ) } { i + 1 }</div>
					<ImagePicker value={ r.image } onSelect={ ( m ) => update( i, { image: m.url } ) } />
					<TextControl label={ __( 'Title', 'anandiitaa-block' ) } value={ r.title } onChange={ ( title ) => update( i, { title } ) } />
					<TextareaControl label={ __( 'Body', 'anandiitaa-block' ) } value={ r.body } onChange={ ( body ) => update( i, { body } ) } />
					<div className="anandiitaa-grid-2">
						<TextControl label={ __( 'Time', 'anandiitaa-block' ) } value={ r.time } onChange={ ( time ) => update( i, { time } ) } />
						<TextControl label={ __( 'Level', 'anandiitaa-block' ) } value={ r.level } onChange={ ( level ) => update( i, { level } ) } />
					</div>
					<div className="anandiitaa-grid-2">
						<TextControl label={ __( 'Serves', 'anandiitaa-block' ) } value={ r.serves } onChange={ ( serves ) => update( i, { serves } ) } />
						<TextControl label={ __( 'Link', 'anandiitaa-block' ) } value={ r.url } onChange={ ( url ) => update( i, { url } ) } />
					</div>
				</div>
			) ) }
		</div>
	);
}
