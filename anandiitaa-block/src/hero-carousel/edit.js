import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	RichText,
	MediaUpload,
	MediaUploadCheck,
} from '@wordpress/block-editor';
import { Button, SelectControl, TextControl } from '@wordpress/components';

const ICONS = [
	{ label: 'Shield', value: 'shield' },
	{ label: 'Clipboard', value: 'clipboard' },
	{ label: 'Spoon', value: 'spoon' },
];

const themeUri = window.anandiitaaThemeUri || '';
const previewSrc = ( val ) =>
	val ? ( /^https?:\/\//.test( val ) ? val : themeUri + val ) : '';

export default function Edit( { attributes, setAttributes } ) {
	const slides = attributes.slides || [];
	const blockProps = useBlockProps( {
		className: 'anandiitaa-hero-carousel-editor',
	} );

	const updateSlide = ( i, patch ) =>
		setAttributes( {
			slides: slides.map( ( s, idx ) => ( idx === i ? { ...s, ...patch } : s ) ),
		} );

	const updateFeature = ( si, fi, patch ) =>
		setAttributes( {
			slides: slides.map( ( s, idx ) => {
				if ( idx !== si ) return s;
				const features = ( s.features || [] ).map( ( f, j ) =>
					j === fi ? { ...f, ...patch } : f
				);
				return { ...s, features };
			} ),
		} );

	return (
		<div { ...blockProps }>
			<p className="anandiitaa-hero-carousel-editor__hint">
				{ __(
					'Hero Carousel — layout is locked. Edit each slide’s image, heading, button and feature lines. The slider animates on the live site.',
					'anandiitaa-block'
				) }
			</p>

			{ slides.map( ( slide, i ) => (
				<div className="anandiitaa-slide-card" key={ i }>
					<div className="anandiitaa-slide-card__head">
						{ __( 'Slide', 'anandiitaa-block' ) } { i + 1 }
					</div>

					<div className="anandiitaa-slide-card__media">
						{ slide.image ? (
							<img
								src={ previewSrc( slide.image ) }
								alt=""
								className="anandiitaa-slide-card__thumb"
							/>
						) : (
							<div className="anandiitaa-slide-card__thumb anandiitaa-slide-card__thumb--empty" />
						) }
						<MediaUploadCheck>
							<MediaUpload
								onSelect={ ( media ) =>
									updateSlide( i, { image: media.url, alt: media.alt || slide.alt } )
								}
								allowedTypes={ [ 'image' ] }
								render={ ( { open } ) => (
									<Button variant="secondary" onClick={ open }>
										{ __( 'Replace image', 'anandiitaa-block' ) }
									</Button>
								) }
							/>
						</MediaUploadCheck>
					</div>

					<label className="anandiitaa-field-label">{ __( 'Heading', 'anandiitaa-block' ) }</label>
					<RichText
						tagName="div"
						className="anandiitaa-slide-card__heading"
						value={ slide.heading }
						allowedFormats={ [] }
						onChange={ ( heading ) => updateSlide( i, { heading } ) }
						placeholder={ __( 'Slide heading', 'anandiitaa-block' ) }
					/>

					<div className="anandiitaa-field-row">
						<TextControl
							label={ __( 'Button label', 'anandiitaa-block' ) }
							value={ slide.ctaLabel || '' }
							onChange={ ( ctaLabel ) => updateSlide( i, { ctaLabel } ) }
						/>
						<TextControl
							label={ __( 'Button link', 'anandiitaa-block' ) }
							value={ slide.ctaHref || '' }
							onChange={ ( ctaHref ) => updateSlide( i, { ctaHref } ) }
						/>
					</div>

					{ ( slide.features || [] ).length > 0 && (
						<div className="anandiitaa-features">
							<label className="anandiitaa-field-label">{ __( 'Feature lines', 'anandiitaa-block' ) }</label>
							{ slide.features.map( ( feat, fi ) => (
								<div className="anandiitaa-feature-row" key={ fi }>
									<SelectControl
										value={ feat.icon }
										options={ ICONS }
										onChange={ ( icon ) => updateFeature( i, fi, { icon } ) }
									/>
									<TextControl
										value={ feat.text }
										onChange={ ( text ) => updateFeature( i, fi, { text } ) }
									/>
								</div>
							) ) }
						</div>
					) }
				</div>
			) ) }
		</div>
	);
}
