import { MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

const themeUri = window.anandiitaaThemeUri || '';

/** Resolve a stored image value for editor preview (media URL as-is; theme-relative → theme URI). */
export const previewSrc = ( val ) =>
	val ? ( /^https?:\/\//.test( val ) ? val : themeUri + val ) : '';

/** Thumbnail + "Replace image" media-library button used across all section blocks. */
export function ImagePicker( { value, onSelect, label } ) {
	return (
		<div className="anandiitaa-imgpick">
			{ value ? (
				<img className="anandiitaa-imgpick__thumb" src={ previewSrc( value ) } alt="" />
			) : (
				<div className="anandiitaa-imgpick__thumb anandiitaa-imgpick__thumb--empty" />
			) }
			<MediaUploadCheck>
				<MediaUpload
					onSelect={ onSelect }
					allowedTypes={ [ 'image' ] }
					render={ ( { open } ) => (
						<Button variant="secondary" onClick={ open }>
							{ label || __( 'Replace image', 'anandiitaa-block' ) }
						</Button>
					) }
				/>
			</MediaUploadCheck>
		</div>
	);
}
