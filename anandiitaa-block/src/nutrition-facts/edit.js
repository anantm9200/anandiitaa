import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

const rowsToText = ( rows ) => ( rows || [] ).map( ( r ) => r.join( ' | ' ) ).join( '\n' );
const textToRows = ( text ) =>
	text.split( '\n' ).filter( ( l ) => l.trim() !== '' ).map( ( l ) => {
		const parts = l.split( '|' ).map( ( s ) => s.trim() );
		return [ parts[ 0 ] || '', parts[ 1 ] || '', parts[ 2 ] || '' ];
	} );

export default function Edit( { attributes, setAttributes } ) {
	const { title, jaggeryTitle, sugarTitle, sugarNote, jaggery = [], sugar = [] } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );
	const set = ( patch ) => setAttributes( patch );
	const updJag = ( i, patch ) => set( { jaggery: jaggery.map( ( p, idx ) => ( idx === i ? { ...p, ...patch } : p ) ) } );
	const updSug = ( i, patch ) => set( { sugar: sugar.map( ( p, idx ) => ( idx === i ? { ...p, ...patch } : p ) ) } );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Nutritional Facts — table structure locked. Edit headings, product names, serve text, images and rows (one row per line: Nutrient | Per 100g | Per Serve).', 'anandiitaa-block' ) }
			</p>

			<TextControl label={ __( 'Page title', 'anandiitaa-block' ) } value={ title } onChange={ ( v ) => set( { title: v } ) } />
			<TextControl label={ __( 'Jaggery group heading', 'anandiitaa-block' ) } value={ jaggeryTitle } onChange={ ( v ) => set( { jaggeryTitle: v } ) } />
			<TextControl label={ __( 'Sugar group heading', 'anandiitaa-block' ) } value={ sugarTitle } onChange={ ( v ) => set( { sugarTitle: v } ) } />
			<TextareaControl label={ __( 'Sugar RDA note', 'anandiitaa-block' ) } value={ sugarNote } onChange={ ( v ) => set( { sugarNote: v } ) } />

			<p className="anandiitaa-section-editor__title">{ __( 'Jaggery products', 'anandiitaa-block' ) }</p>
			{ jaggery.map( ( p, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ p.name || `#${ i + 1 }` }</div>
					<ImagePicker value={ p.image } onSelect={ ( m ) => updJag( i, { image: m.url } ) } />
					<TextControl label={ __( 'Name', 'anandiitaa-block' ) } value={ p.name } onChange={ ( v ) => updJag( i, { name: v } ) } />
					<TextControl label={ __( 'Serve', 'anandiitaa-block' ) } value={ p.serve } onChange={ ( v ) => updJag( i, { serve: v } ) } />
					<TextareaControl label={ __( 'Rows', 'anandiitaa-block' ) } value={ rowsToText( p.rows ) } onChange={ ( v ) => updJag( i, { rows: textToRows( v ) } ) } rows={ 10 } />
				</div>
			) ) }

			<p className="anandiitaa-section-editor__title">{ __( 'Sugar products', 'anandiitaa-block' ) }</p>
			{ sugar.map( ( p, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ p.name || `#${ i + 1 }` }</div>
					<div className="anandiitaa-grid-2">
						<ImagePicker value={ p.packet1 } onSelect={ ( m ) => updSug( i, { packet1: m.url } ) } label={ __( 'Pack 1', 'anandiitaa-block' ) } />
						<ImagePicker value={ p.packet2 } onSelect={ ( m ) => updSug( i, { packet2: m.url } ) } label={ __( 'Pack 2', 'anandiitaa-block' ) } />
					</div>
					<TextControl label={ __( 'Name', 'anandiitaa-block' ) } value={ p.name } onChange={ ( v ) => updSug( i, { name: v } ) } />
					<TextControl label={ __( 'Serve', 'anandiitaa-block' ) } value={ p.serve } onChange={ ( v ) => updSug( i, { serve: v } ) } />
					<TextareaControl label={ __( 'Rows', 'anandiitaa-block' ) } value={ rowsToText( p.rows ) } onChange={ ( v ) => updSug( i, { rows: textToRows( v ) } ) } rows={ 9 } />
				</div>
			) ) }
		</div>
	);
}
