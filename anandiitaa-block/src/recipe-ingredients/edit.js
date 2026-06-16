import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';

export default function Edit( { attributes, setAttributes } ) {
	const groups = attributes.groups || [];
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	const update = ( i, patch ) =>
		setAttributes( { groups: groups.map( ( g, idx ) => ( idx === i ? { ...g, ...patch } : g ) ) } );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Ingredients — layout & labels locked. One ingredient per line. Add a group heading to split into sections.', 'anandiitaa-block' ) }
			</p>
			{ groups.map( ( g, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ groups.length > 1 ? `${ __( 'Group', 'anandiitaa-block' ) } ${ i + 1 }` : __( 'Ingredients', 'anandiitaa-block' ) }</div>
					{ ( groups.length > 1 || g.title ) && (
						<TextControl label={ __( 'Group heading', 'anandiitaa-block' ) } value={ g.title } onChange={ ( title ) => update( i, { title } ) } />
					) }
					<TextareaControl
						label={ __( 'Ingredients (one per line)', 'anandiitaa-block' ) }
						value={ ( g.items || [] ).join( '\n' ) }
						onChange={ ( v ) => update( i, { items: v.split( '\n' ).filter( ( s ) => s.trim() !== '' ) } ) }
						rows={ 8 }
					/>
				</div>
			) ) }
		</div>
	);
}
