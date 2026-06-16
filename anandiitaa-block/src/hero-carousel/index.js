import { registerBlockType } from '@wordpress/blocks';
import metadata from './block.json';
import Edit from './edit';
import './editor.scss';

/**
 * Dynamic block — rendered on the front end by render.php (exact prod markup).
 * `save` returns null so all front-end output comes from PHP; the editor uses Edit.
 */
registerBlockType( metadata.name, {
	edit: Edit,
	save: () => null,
} );
