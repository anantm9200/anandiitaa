import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const { introTitle, introText, categories = [] } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );

	const update = ( i, patch ) =>
		setAttributes( {
			categories: categories.map( ( c, idx ) => ( idx === i ? { ...c, ...patch } : c ) ),
		} );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Products Landing — layout & colors locked. Edit the intro and the two category cards.', 'anandiitaa-block' ) }
			</p>

			<TextControl label={ __( 'Intro title', 'anandiitaa-block' ) } value={ introTitle } onChange={ ( introTitle ) => setAttributes( { introTitle } ) } />
			<TextControl label={ __( 'Intro text', 'anandiitaa-block' ) } value={ introText } onChange={ ( introText ) => setAttributes( { introText } ) } />

			{ categories.map( ( c, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Category', 'anandiitaa-block' ) } { i + 1 }</div>
					<ImagePicker value={ c.image } onSelect={ ( m ) => update( i, { image: m.url } ) } />
					<TextControl label={ __( 'Title', 'anandiitaa-block' ) } value={ c.title } onChange={ ( title ) => update( i, { title } ) } />
					<TextControl label={ __( 'Tagline', 'anandiitaa-block' ) } value={ c.tagline } onChange={ ( tagline ) => update( i, { tagline } ) } />
					<TextControl label={ __( 'Link', 'anandiitaa-block' ) } value={ c.href } onChange={ ( href ) => update( i, { href } ) } />
				</div>
			) ) }
		</div>
	);
}
