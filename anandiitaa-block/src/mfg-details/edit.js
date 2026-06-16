import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';

export default function Edit( { attributes, setAttributes } ) {
	const { title, addresses = [], contactLabel, contactLead, contactAddress, contactRows = [] } = attributes;
	const blockProps = useBlockProps( { className: 'anandiitaa-section-editor' } );
	const set = ( patch ) => setAttributes( patch );
	const updAddr = ( i, patch ) => set( { addresses: addresses.map( ( a, idx ) => ( idx === i ? { ...a, ...patch } : a ) ) } );
	const updRow = ( i, patch ) => set( { contactRows: contactRows.map( ( r, idx ) => ( idx === i ? { ...r, ...patch } : r ) ) } );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-section-editor__hint">
				{ __( 'Manufacturing Details — layout locked. Edit all text. Use <br> for line breaks.', 'anandiitaa-block' ) }
			</p>

			<TextControl label={ __( 'Page title', 'anandiitaa-block' ) } value={ title } onChange={ ( v ) => set( { title: v } ) } />

			{ addresses.map( ( a, i ) => (
				<div className="anandiitaa-card" key={ i }>
					<div className="anandiitaa-card__head">{ __( 'Address', 'anandiitaa-block' ) } { i + 1 }</div>
					<TextControl label={ __( 'Label', 'anandiitaa-block' ) } value={ a.label } onChange={ ( v ) => updAddr( i, { label: v } ) } />
					<TextareaControl label={ __( 'Body', 'anandiitaa-block' ) } value={ a.body } onChange={ ( v ) => updAddr( i, { body: v } ) } />
				</div>
			) ) }

			<div className="anandiitaa-card">
				<div className="anandiitaa-card__head">{ __( 'Contact', 'anandiitaa-block' ) }</div>
				<TextControl label={ __( 'Label', 'anandiitaa-block' ) } value={ contactLabel } onChange={ ( v ) => set( { contactLabel: v } ) } />
				<TextControl label={ __( 'Lead', 'anandiitaa-block' ) } value={ contactLead } onChange={ ( v ) => set( { contactLead: v } ) } />
				<TextareaControl label={ __( 'Address', 'anandiitaa-block' ) } value={ contactAddress } onChange={ ( v ) => set( { contactAddress: v } ) } />
				{ contactRows.map( ( r, i ) => (
					<div className="anandiitaa-grid-2" key={ i }>
						<TextControl label={ r.dt } value={ r.text } onChange={ ( v ) => updRow( i, { text: v } ) } />
						<TextControl label={ __( 'Link', 'anandiitaa-block' ) } value={ r.href } onChange={ ( v ) => updRow( i, { href: v } ) } />
					</div>
				) ) }
			</div>
		</div>
	);
}
