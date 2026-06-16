import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';
import { ImagePicker } from '../shared/ImagePicker';

export default function Edit( { attributes, setAttributes } ) {
	const { image, title, intro, time, level, serves } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );
	const set = ( patch ) => setAttributes( patch );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Recipe Intro — layout locked. Edit the photo, title, intro and meta.', 'anandiitaa-block' ) }
			</p>
			<ImagePicker value={ image } onSelect={ ( m ) => set( { image: m.url } ) } label={ __( 'Replace dish photo', 'anandiitaa-block' ) } />
			<TextControl label={ __( 'Title', 'anandiitaa-block' ) } value={ title } onChange={ ( v ) => set( { title: v } ) } />
			<TextareaControl label={ __( 'Intro', 'anandiitaa-block' ) } value={ intro } onChange={ ( v ) => set( { intro: v } ) } />
			<div className="anandiitaa-grid-2">
				<TextControl label={ __( 'Time', 'anandiitaa-block' ) } value={ time } onChange={ ( v ) => set( { time: v } ) } />
				<TextControl label={ __( 'Level', 'anandiitaa-block' ) } value={ level } onChange={ ( v ) => set( { level: v } ) } />
			</div>
			<TextControl label={ __( 'Serves', 'anandiitaa-block' ) } value={ serves } onChange={ ( v ) => set( { serves: v } ) } />
		</div>
	);
}
