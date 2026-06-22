<?php
/**
 * Seed the Anandiitaa block-theme pages into a WordPress DB.
 *
 * DEPLOYMENT.md §5: SFTP ships theme files only — page CONTENT lives in the DB.
 * This script recreates every editable page (with its baseline block content =
 * exact prod copy via block defaults), sets the static front page, and activates
 * the block theme. Idempotent: re-running updates the same slugs in place.
 *
 * Run ONCE per environment (testing first, prod at cutover):
 *   wp eval-file wp-content/themes/anandiitaa-block/tools/seed-anandiitaa-pages.php --allow-root
 *
 * After launch, content is authored on PROD (the master) and is NEVER overwritten
 * by a code deploy — so do NOT re-run this on prod after go-live (it would reset
 * client edits back to defaults).
 */

if ( ! defined( 'ABSPATH' ) ) {
	fwrite( STDERR, "Run via wp-cli: wp eval-file .../seed-anandiitaa-pages.php\n" );
	exit( 1 );
}

wp_set_current_user( 1 ); // unfiltered_html so block markup isn't kses-stripped

function ana_seed_upsert( $slug, $title, $content, $status = 'private' ) {
	$existing = get_page_by_path( $slug, OBJECT, 'page' );
	$data = array(
		'post_type'    => 'page',
		'post_status'  => $status,
		'post_name'    => $slug,
		'post_title'   => $title,
		'post_content' => $content,
	);
	if ( $existing ) {
		$data['ID'] = $existing->ID;
	}
	$id = wp_insert_post( $data );
	echo "  {$slug} -> #{$id} ({$status})\n";
	return $id;
}

/* ---- Pages whose content = block DEFAULTS (just the block tags) ---- */

$home = <<<'HTML'
<!-- wp:anandiitaa/hero-carousel /-->
<!-- wp:anandiitaa/standards /-->
<!-- wp:anandiitaa/feature-banner /-->
<!-- wp:anandiitaa/products-grid /-->
<!-- wp:anandiitaa/benefits /-->
<!-- wp:anandiitaa/reviews /-->
<!-- wp:anandiitaa/social /-->
HTML;

$products = "<!-- wp:anandiitaa/products-landing /-->";

$jaggery = <<<'HTML'
<!-- wp:anandiitaa/product-hero /-->
<!-- wp:anandiitaa/product-process /-->
<!-- wp:anandiitaa/product-benefits /-->
<!-- wp:anandiitaa/product-variants /-->
<!-- wp:anandiitaa/product-reviews /-->
HTML;

$cookies = <<<'HTML'
<!-- wp:anandiitaa/recipe-intro /-->
<!-- wp:anandiitaa/recipe-ingredients /-->
<!-- wp:anandiitaa/recipe-method /-->
<!-- wp:anandiitaa/recipe-tip /-->
HTML;

$about     = <<<'HTML'
<!-- wp:anandiitaa/about-products /-->
<!-- wp:anandiitaa/about-vision /-->
<!-- wp:anandiitaa/about-mission /-->
<!-- wp:anandiitaa/about-standards /-->
<!-- wp:anandiitaa/about-purpose /-->
<!-- wp:anandiitaa/social /-->
HTML;

$nutrition = "<!-- wp:anandiitaa/nutrition-facts /-->";
$mfg       = "<!-- wp:anandiitaa/mfg-details /-->";

/* ---- Pages with EXPLICIT (non-default) attributes ---- */

$sugar = <<<'HTML'
<!-- wp:anandiitaa/product-hero {"productName":"Sugar","heroImage":"/assets/images/products/sugar/sugar-slide-1.png","heroMac":"/assets/images/products/sugar/mac/sugar-slide-1-new.png","heroD1366":"/assets/images/products/sugar/d1366/sugar-slide-1.png","heroD1280":"/assets/images/products/sugar/d1280/sugar-slide-1.png","heroTablet":"/assets/images/products/sugar/tab/sugar-slide-1.png","heroPhone":"/assets/images/products/sugar/sugar-slide-1-4.png","heroAlt":"Anandiitaa Premium Refined Sugar — Bold Grain & Fine Grain","sealImage":"/assets/images/products/sugar/100-natural.png","features":[{"icon":"tested","text":"Each batch tested<br>professionally."},{"icon":"noChem","text":"No harmful chemical<br>additives."},{"icon":"clean","text":"Clean, controlled<br>processing."}]} /-->
<!-- wp:anandiitaa/product-process {"steps":[{"bold":"Sugarcane Selection","rest":"Carefully sourced sugarcane, selected for quality, maturity and consistency.","image":"/assets/images/products/sugar/process/cane-selection.png"},{"bold":"Juice Extraction & Filtration","rest":"Fresh cane juice is crushed and filtered to remove impurities for a cleaner process.","image":"/assets/images/products/sugar/process/extraction.png"},{"bold":"Refinement Process","rest":"The juice is gently clarified and evaporated to achieve purity, clarity and consistency.","image":"/assets/images/products/sugar/process/refinement.png"},{"bold":"Crystallisation","rest":"Controlled crystallisation ensures uniform grain size, brightness and high purity in every batch.","image":"/assets/images/products/sugar/process/crystallisation.png"},{"bold":"Testing & Packing","rest":"Every batch is tested for quality, then packed, sealed and stored under hygienic conditions.","image":"/assets/images/products/sugar/process/packed.png"}]} /-->
<!-- wp:anandiitaa/product-variants {"variants":[{"image":"/assets/images/products/packets/bold-grain.png","available":"1kg | 5kg | 20kg","title":"Bold Grain Sugar"},{"image":"/assets/images/products/packets/fine-grain.png","available":"1kg | 5kg | 25kg","title":"Fine Grain Sugar"}]} /-->
<!-- wp:anandiitaa/product-recipes /-->
<!-- wp:anandiitaa/product-reviews {"variant":"carousel","reviews":[{"image":"/assets/images/reviews/review1.png","name":"Aditi Parekh, 28","role":"(Ahmedabad)","quote":"In a busy life, convenience matters, but so does quality. Anandiitaa jaggery powder gives me both."},{"image":"/assets/images/reviews/review2.png","name":"Kavya Bhosle, 34","role":"(Mumbai)","quote":"I switched to Anandiitaa jaggery powder for my morning chai. The taste is richer, and I don't need to worry about my Jaggery's Purity."},{"name":"Anjali Tiwari, 38","role":"(Indore)","quote":"I run a tiffin service, so consistency matters more to me than taste alone. Anandiitaa has been consistent in both taste as well as quality everytime i bought it. This is what made me stick to it."},{"name":"Priya Jadhav, 31","role":"(Pune)","quote":"Switched from loose sugar to Anandiitaa Sugar, the grains are so white and big. That's how I can tell that it is premium quality."},{"name":"Neha Shah, 33","role":"(Mumbai)","quote":"I do most of my grocery shopping online now, and Anandiitaa is the only sugar I order on repeat, never had to think twice about it since I started."},{"name":"Komal Trivedi, 44","role":"(Vadodara)","quote":"Earlier with loose sugar I'd always find some dirt in it. Also in stores you see people put their hands in sugar kept loose. With Anandiitaa, the grains are clean and white, and it is packed so hygienic!"}]} /-->
HTML;

$gulab = <<<'HTML'
<!-- wp:anandiitaa/recipe-intro {"image":"/assets/images/products/sugar/recipes/battasa.png","title":"Gulab Jamun","intro":"Gulab Jamun is one of India's most loved festive desserts, known for its soft, melt-in-the-mouth texture and rich, aromatic syrup. Whether it is a celebration, family gathering, wedding, or festive meal, Gulab Jamun instantly adds sweetness to the occasion. In this recipe, the syrup is prepared using hygienically manufactured Anandiitaa Sugar, giving the dessert a rich sweetness and perfect festive flavour.","time":"1–2 hours","level":"Medium","serves":"4–5 people"} /-->
<!-- wp:anandiitaa/recipe-ingredients {"groups":[{"title":"For Gulab Jamun","items":["1 cup khoya / mawa","¼ cup all-purpose flour / maida","2 tbsp semolina / rava (optional)","¼ tsp baking soda","2–3 tbsp milk, as needed","Ghee or oil, for frying"]},{"title":"For Syrup","items":["1½ cups Anandiitaa Sugar","1½ cups water","3–4 cardamom pods, lightly crushed","1 tsp rose water","A few saffron strands (optional)","½ tsp lemon juice"]}]} /-->
<!-- wp:anandiitaa/recipe-method {"steps":[{"title":"Prepare the syrup","body":"In a pan, add Anandiitaa Sugar and water. Heat until the Anandiitaa Sugar dissolves completely. Add cardamom, saffron, and lemon juice. Simmer for 6–8 minutes until the syrup becomes slightly sticky. Switch off the flame and add rose water.","image":"/assets/images/products/sugar/recipes/gulab-jamun/gj1.png"},{"title":"Make the dough","body":"In a bowl, crumble the khoya until smooth. Add maida, baking soda, and rava. Mix gently. Add milk little by little and knead into a soft, smooth dough. Do not over-knead.","image":"/assets/images/products/sugar/recipes/gulab-jamun/gj2.png"},{"title":"Shape the jamuns","body":"Grease your palms and make small, smooth balls without cracks. Keep them slightly small because they will expand after frying and soaking.","image":"/assets/images/products/sugar/recipes/gulab-jamun/gj3.png"},{"title":"Fry slowly","body":"Heat ghee or oil on low to medium flame. Fry the balls slowly until they turn golden brown from all sides. Keep stirring gently for even colour.","image":"/assets/images/products/sugar/recipes/gulab-jamun/gj4.png"},{"title":"Soak in syrup","body":"Add the warm fried gulab jamuns into the warm Anandiitaa Sugar syrup. Let them soak for at least 1–2 hours.","image":"/assets/images/products/sugar/recipes/gulab-jamun/gj5.png"},{"title":"Serve","body":"Serve warm or at room temperature. Garnish with chopped pistachios or almonds.","image":"/assets/images/products/sugar/recipes/gulab-jamun/gj6.png"}]} /-->
<!-- wp:anandiitaa/recipe-tip {"title":"For perfect Gulab Jamun","body":"For soft and juicy Gulab Jamuns, keep both the fried balls and the Anandiitaa Sugar syrup warm while soaking. Avoid adding hot jamuns into boiling syrup, as this can make them hard or break them."} /-->
HTML;

$choco = <<<'HTML'
<!-- wp:anandiitaa/recipe-intro {"image":"/assets/images/products/sugar/recipes/chocolate-dessert.png","title":"Choco Lava Cake","intro":"Choco Lava Cake is a rich, indulgent dessert loved for its soft cake outside and warm molten chocolate centre inside. It is perfect for celebrations, dinner parties, or whenever you want a bakery-style dessert at home. Made with cocoa, chocolate, and balanced sweetness from Anandiitaa Sugar, this cake delivers a smooth, gooey, and luxurious chocolate experience in every bite.","time":"25–30 mins","level":"Easy","serves":"3–4 people"} /-->
<!-- wp:anandiitaa/recipe-ingredients {"groups":[{"title":"","items":["½ cup dark chocolate, chopped","¼ cup butter","¼ cup Anandiitaa Sugar, powdered","¼ cup all-purpose flour / maida","1 tbsp cocoa powder","¼ tsp baking powder","¼ cup milk","½ tsp vanilla essence","A pinch of salt","Butter, for greasing","Cocoa powder or flour, for dusting"]}]} /-->
<!-- wp:anandiitaa/recipe-method {"steps":[{"title":"Prepare the moulds","body":"Grease small ramekins or cupcake moulds with butter and dust them lightly with cocoa powder or flour. Keep aside.","image":"/assets/images/products/sugar/recipes/choco-lava-cake/clc1.png"},{"title":"Melt chocolate and butter","body":"In a bowl, add chopped dark chocolate and butter. Melt using a double boiler or microwave until smooth. Let it cool slightly.","image":"/assets/images/products/sugar/recipes/choco-lava-cake/clc2.png"},{"title":"Add Anandiitaa Sugar","body":"Add powdered Anandiitaa Sugar to the melted chocolate mixture and mix until smooth.","image":"/assets/images/products/sugar/recipes/choco-lava-cake/clc3.png"},{"title":"Prepare the batter","body":"Add maida, cocoa powder, baking powder, and salt. Mix gently. Add milk and vanilla essence to make a smooth, thick batter.","image":"/assets/images/products/sugar/recipes/choco-lava-cake/clc4.png"},{"title":"Fill the moulds","body":"Pour the batter into the prepared moulds, filling them about ¾ full.","image":"/assets/images/products/sugar/recipes/choco-lava-cake/clc5.png"},{"title":"Bake","body":"Bake in a preheated oven at 200°C for 8–10 minutes. The edges should be set, while the centre should remain soft.","image":"/assets/images/products/sugar/recipes/choco-lava-cake/clc6.png"},{"title":"Serve immediately","body":"Let the cakes rest for 1 minute, then gently unmould and serve warm. The centre should flow out like molten chocolate when cut.","image":"/assets/images/products/sugar/recipes/choco-lava-cake/clc7.png"}]} /-->
<!-- wp:anandiitaa/recipe-tip {"title":"For perfect Choco Lava Cake","body":"Do not overbake the cake. The perfect choco lava texture comes from keeping the centre slightly underbaked and soft."} /-->
HTML;

$gajar = <<<'HTML'
<!-- wp:anandiitaa/recipe-intro {"image":"/assets/images/products/sugar/recipes/gajar-ka-halwa.png","title":"Gajar Ka Halwa","intro":"Gajar Ka Halwa is a classic North Indian dessert that brings warmth, richness, and festive flavour to every celebration. Made with fresh carrots, milk, and pure Anandiitaa Sugar, this traditional sweet is especially popular during winter and festive occasions. Its rich aroma, soft texture, and delicious sweetness make it a favourite dessert for family gatherings, festivals, and special meals.","time":"45–60 mins","level":"Easy","serves":"4–5 people"} /-->
<!-- wp:anandiitaa/recipe-ingredients {"groups":[{"title":"","items":["500 g carrots, grated","500 ml full-fat milk","½ cup Anandiitaa Sugar","2 tbsp ghee","¼ tsp cardamom powder","2 tbsp chopped almonds","2 tbsp chopped cashews","1 tbsp raisins","A few saffron strands (optional)"]}]} /-->
<!-- wp:anandiitaa/recipe-method {"steps":[{"title":"Prepare the carrots","body":"Wash, peel, and grate the carrots. Keep them aside.","image":"/assets/images/products/sugar/recipes/gajar-ka-halwa/gkh1.png"},{"title":"Cook the carrots and milk","body":"In a heavy-bottomed pan, add the grated carrots and milk. Cook on medium flame, stirring occasionally until the milk reduces significantly and the carrots become soft.","image":"/assets/images/products/sugar/recipes/gajar-ka-halwa/gkh2.png"},{"title":"Add Anandiitaa Sugar","body":"Add Anandiitaa Sugar and mix well. Continue cooking until the mixture thickens and the moisture evaporates.","image":"/assets/images/products/sugar/recipes/gajar-ka-halwa/gkh3.png"},{"title":"Add ghee and flavouring","body":"Add ghee, cardamom powder, and saffron strands. Stir continuously and cook until the halwa becomes rich, glossy, and starts leaving the sides of the pan.","image":"/assets/images/products/sugar/recipes/gajar-ka-halwa/gkh4.png"},{"title":"Add dry fruits","body":"Add chopped almonds, cashews, and raisins. Mix well and cook for another 2–3 minutes.","image":"/assets/images/products/sugar/recipes/gajar-ka-halwa/gkh5.png"},{"title":"Serve","body":"Serve warm and garnish with additional chopped nuts if desired.","image":"/assets/images/products/sugar/recipes/gajar-ka-halwa/gkh6.png"}]} /-->
<!-- wp:anandiitaa/recipe-tip {"title":"For perfect Gajar Ka Halwa","body":"For a richer and more authentic taste, cook the carrots slowly in full-fat milk and allow the milk to reduce naturally. This enhances the flavour, texture, and overall richness of the Gajar Ka Halwa."} /-->
HTML;

echo "Seeding Anandiitaa block-theme pages...\n";
$home_id = ana_seed_upsert( 'home', 'Home', $home, 'publish' );
ana_seed_upsert( 'products', 'Products', $products, 'publish' );
ana_seed_upsert( 'products-jaggery', 'Products: Jaggery', $jaggery );
ana_seed_upsert( 'products-sugar', 'Products: Sugar', $sugar );
ana_seed_upsert( 'recipes-cookies', 'Recipe: Home Made Cookies', $cookies );
ana_seed_upsert( 'recipes-gulab-jamun', 'Recipe: Gulab Jamun', $gulab );
ana_seed_upsert( 'recipes-choco-lava-cake', 'Recipe: Choco Lava Cake', $choco );
ana_seed_upsert( 'recipes-gajar-ka-halwa', 'Recipe: Gajar Ka Halwa', $gajar );
ana_seed_upsert( 'about-us-content', 'About Us', $about );
ana_seed_upsert( 'nutrition-content', 'Nutritional Facts', $nutrition );
ana_seed_upsert( 'mfg-content', 'Manufacturing Details', $mfg );

update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $home_id );
echo "Front page set -> #{$home_id}\n";

if ( get_stylesheet() !== 'anandiitaa-block' ) {
	switch_theme( 'anandiitaa-block' );
	echo "Activated theme: anandiitaa-block\n";
} else {
	echo "Theme already active: anandiitaa-block\n";
}

if ( function_exists( 'wp_cache_flush' ) ) {
	wp_cache_flush();
}
echo "Done. Visit /, /about-us, /products/jaggery, /nutritional-facts, etc. to verify.\n";
