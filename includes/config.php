<?php
// ============================================================
// config.php — Gray Tile & Remodeling
// Site-wide configuration. Included at the top of every page
// BEFORE including head.php, nav.php, or footer.php.
// ============================================================

// ------------------------------------------------------------
// Identity
// ------------------------------------------------------------
$slug        = 'gray-tile-remodeling';
$siteName    = 'Gray Tile & Remodeling';
$tagline     = 'Quality Tiles, Expert Remodeling, Exceptional Results';
$industry    = 'tile';
$ownerName   = '';

// ------------------------------------------------------------
// Contact
// ------------------------------------------------------------
$phone          = '(770) 555-0000'; // TODO: replace with client's actual phone number
$phoneSecondary = '';
$email          = '';

// ------------------------------------------------------------
// Address (must match Google Business Profile character-for-character)
// ------------------------------------------------------------
$address = [
    'street' => '220 Fowler Dr',
    'city'   => 'Bowdon',
    'state'  => 'GA',
    'zip'    => '30108',
];

// ------------------------------------------------------------
// Domain & URLs
// No production_domain in build-plan.json → using preview URL
// ------------------------------------------------------------
$domain  = 'gray-tile-remodeling.pageone.cloud';
$siteUrl = 'https://' . $domain;
// $canonicalUrl is NOT set here — each page sets its own before including head.php

// ------------------------------------------------------------
// Business history
// ------------------------------------------------------------
$yearEstablished = 2001;
$yearsInBusiness = 25;

// ------------------------------------------------------------
// Brand colors (extracted from logo)
// ------------------------------------------------------------
$colors = [
    'primary'        => '#1a2b3c',
    'primary_rgb'    => '26, 43, 60',
    'primary_dark'   => '#0f1a26',
    'secondary'      => '#4d5e6f',
    'secondary_rgb'  => '77, 94, 111',
    'accent'         => '#06b6d4',
    'accent_rgb'     => '6, 182, 212',
];

// ------------------------------------------------------------
// Typography (Handyman/Construction archetype: Rajdhani + Open Sans)
// ------------------------------------------------------------
$fonts = [
    'heading' => 'Rajdhani',
    'body'    => 'Open Sans',
];

// ------------------------------------------------------------
// SEO Keywords
// ------------------------------------------------------------
$primaryKeyword     = 'home remodeling bowdon ga';
$secondaryKeywords  = [
    'kitchen remodeling bowdon ga',
    'bathroom remodeling bowdon ga',
    'tile installation bowdon ga',
    'home renovation bowdon ga',
    'remodeling contractor bowdon ga',
    'basement finishing bowdon ga',
    'custom tile showers bowdon ga',
    'flooring installation bowdon ga',
    'home additions bowdon ga',
    'remodeling services near me',
    'tile contractor bowdon georgia',
    'design build remodeling bowdon ga',
];

// ------------------------------------------------------------
// Services (all 25 — used for nav dropdowns, schema, and sitemaps)
// ------------------------------------------------------------
$services = [
    [
        'name'        => 'Kitchen Remodeling',
        'slug'        => 'kitchen-remodeling',
        'description' => 'Transform your kitchen with complete renovation services in Bowdon, GA — design through installation for your dream kitchen.',
        'keywords'    => ['kitchen remodeling Bowdon GA', 'kitchen renovation Bowdon', 'custom kitchen design Georgia', 'kitchen contractors Bowdon', 'full kitchen remodel'],
    ],
    [
        'name'        => 'Bathroom Remodeling',
        'slug'        => 'bathroom-remodeling',
        'description' => 'Create your perfect bathroom with professional remodeling services throughout Bowdon and surrounding areas.',
        'keywords'    => ['bathroom remodeling Bowdon GA', 'bathroom renovation Georgia', 'bath remodel Bowdon', 'bathroom contractors Bowdon', 'custom bathroom design'],
    ],
    [
        'name'        => 'Basement Finishing',
        'slug'        => 'basement-finishing',
        'description' => 'Maximize your home\'s potential with professional basement finishing — transform unfinished space into functional living area.',
        'keywords'    => ['basement finishing Bowdon GA', 'basement remodeling Georgia', 'finished basement Bowdon', 'basement contractors Bowdon', 'basement renovation'],
    ],
    [
        'name'        => 'Basement Kitchen Remodeling',
        'slug'        => 'basement-kitchen-remodeling',
        'description' => 'Add value and functionality to your basement with a custom kitchen installation throughout Georgia.',
        'keywords'    => ['basement kitchen Bowdon GA', 'lower level kitchen Georgia', 'basement kitchen installation', 'basement remodeling kitchen', 'secondary kitchen Bowdon'],
    ],
    [
        'name'        => 'Attic Remodeling',
        'slug'        => 'attic-remodeling',
        'description' => 'Transform your attic into functional living space with expert remodeling services in Bowdon and surrounding areas.',
        'keywords'    => ['attic remodeling Bowdon GA', 'attic conversion Georgia', 'attic renovation Bowdon', 'attic finishing Bowdon', 'attic contractors Georgia'],
    ],
    [
        'name'        => 'Room Additions',
        'slug'        => 'room-additions',
        'description' => 'Add bedrooms, bathrooms, or living spaces with professional room addition services for your Bowdon, GA home.',
        'keywords'    => ['room additions Bowdon GA', 'home additions Georgia', 'house addition Bowdon', 'room addition contractors', 'home expansion Bowdon'],
    ],
    [
        'name'        => 'Full Home Remodel',
        'slug'        => 'full-home-remodel',
        'description' => 'Complete home transformation services — every aspect of your whole house renovation from start to finish.',
        'keywords'    => ['full home remodel Bowdon GA', 'whole house renovation Georgia', 'complete home remodeling', 'house renovation Bowdon', 'full house remodel'],
    ],
    [
        'name'        => 'Custom Remodeling',
        'slug'        => 'custom-remodeling',
        'description' => 'Personalized remodeling solutions tailored to your unique vision with attention to detail throughout Bowdon, GA.',
        'keywords'    => ['custom remodeling Bowdon GA', 'custom home renovation', 'personalized remodeling Georgia', 'bespoke home improvements', 'custom contractors Bowdon'],
    ],
    [
        'name'        => 'Structural Renovation',
        'slug'        => 'structural-renovation',
        'description' => 'Professional structural renovation for major home improvements and safety updates throughout Bowdon and Georgia.',
        'keywords'    => ['structural renovation Bowdon GA', 'structural remodeling Georgia', 'load bearing walls Bowdon', 'structural contractors', 'home structural work'],
    ],
    [
        'name'        => 'Eco-Friendly Remodeling',
        'slug'        => 'eco-friendly-remodeling',
        'description' => 'Sustainable remodeling solutions that are environmentally conscious and energy-efficient for Bowdon, GA homeowners.',
        'keywords'    => ['eco-friendly remodeling Bowdon GA', 'green remodeling Georgia', 'sustainable renovation Bowdon', 'energy efficient remodeling', 'environmentally friendly contractors'],
    ],
    [
        'name'        => 'Home Additions',
        'slug'        => 'home-additions',
        'description' => 'Expand your living space with professional home addition services that blend seamlessly with your existing home.',
        'keywords'    => ['home additions Bowdon GA', 'house additions Georgia', 'residential additions Bowdon', 'home expansion services', 'addition contractors Bowdon'],
    ],
    [
        'name'        => 'Plumbing Services',
        'slug'        => 'plumbing-services',
        'description' => 'Professional plumbing installation and repair for all remodeling projects in Bowdon, GA.',
        'keywords'    => ['plumbing services Bowdon GA', 'plumber Bowdon', 'remodeling plumbing Georgia', 'plumbing installation Bowdon', 'bathroom plumbing'],
    ],
    [
        'name'        => 'Electrical Services',
        'slug'        => 'electrical-services',
        'description' => 'Professional electrical installation and repair for all your remodeling needs in Bowdon, GA.',
        'keywords'    => ['electrical services Bowdon GA', 'electrician Bowdon', 'remodeling electrical Georgia', 'electrical installation Bowdon', 'home electrical work'],
    ],
    [
        'name'        => 'HVAC Services',
        'slug'        => 'hvac-services',
        'description' => 'Heating, ventilation, and air conditioning services for new construction and remodeling in Bowdon, GA.',
        'keywords'    => ['HVAC services Bowdon GA', 'heating cooling Bowdon', 'HVAC installation Georgia', 'HVAC contractors Bowdon', 'air conditioning installation'],
    ],
    [
        'name'        => 'Open Floor Plan Remodeling',
        'slug'        => 'open-floor-plan-remodeling',
        'description' => 'Remove walls and create modern, flowing layouts with open floor plan remodeling in Bowdon homes.',
        'keywords'    => ['open floor plan Bowdon GA', 'wall removal Georgia', 'open concept remodeling', 'floor plan renovation Bowdon', 'home layout redesign'],
    ],
    [
        'name'        => 'Custom Tile Showers',
        'slug'        => 'custom-tile-showers',
        'description' => 'Beautiful custom tile shower installations that transform your bathroom into a luxury spa experience throughout Bowdon, GA.',
        'keywords'    => ['custom tile showers Bowdon GA', 'tile shower installation', 'bathroom tile work Georgia', 'shower remodel Bowdon', 'luxury shower design'],
    ],
    [
        'name'        => 'Flooring Installation',
        'slug'        => 'flooring-installation',
        'description' => 'Professional flooring installation for all materials — expert solutions for homes in Bowdon, GA.',
        'keywords'    => ['flooring installation Bowdon GA', 'flooring contractors Georgia', 'floor installation Bowdon', 'new flooring services', 'professional flooring Bowdon'],
    ],
    [
        'name'        => 'Sanded Finish Flooring',
        'slug'        => 'sanded-finish-flooring',
        'description' => 'Expert hardwood floor sanding and finishing to restore and protect your floors in Bowdon, GA.',
        'keywords'    => ['floor sanding Bowdon GA', 'hardwood refinishing Georgia', 'floor finishing Bowdon', 'wood floor restoration', 'floor refinishing services'],
    ],
    [
        'name'        => 'LVP Flooring',
        'slug'        => 'lvp-flooring',
        'description' => 'Luxury vinyl plank flooring installation — durable, beautiful, and affordable throughout Bowdon, GA.',
        'keywords'    => ['LVP flooring Bowdon GA', 'luxury vinyl plank Georgia', 'vinyl flooring installation', 'LVP contractors Bowdon', 'vinyl plank flooring'],
    ],
    [
        'name'        => 'Subfloor Replacement',
        'slug'        => 'subfloor-replacement',
        'description' => 'Professional subfloor replacement and repair to ensure a solid foundation for new flooring in Bowdon, GA.',
        'keywords'    => ['subfloor replacement Bowdon GA', 'subfloor repair Georgia', 'floor foundation work', 'structural flooring Bowdon', 'subfloor contractors'],
    ],
    [
        'name'        => 'Design-Build Remodeling',
        'slug'        => 'design-build-remodeling',
        'description' => 'Streamlined design-and-build process for seamless project delivery throughout Bowdon, GA.',
        'keywords'    => ['design-build Bowdon GA', 'design build remodeling', 'integrated remodeling Georgia', 'design build contractors', 'integrated remodeling services'],
    ],
    [
        'name'        => 'Home Restoration',
        'slug'        => 'home-restoration',
        'description' => 'Restore your home\'s beauty and functionality — specializing in bringing older Georgia homes back to life.',
        'keywords'    => ['home restoration Bowdon GA', 'house restoration Georgia', 'historic home renovation', 'property restoration Bowdon', 'home revival services'],
    ],
    [
        'name'        => 'Garage Conversion',
        'slug'        => 'garage-conversion',
        'description' => 'Convert your garage into valuable living space — create additional rooms, offices, or living areas in Bowdon, GA.',
        'keywords'    => ['garage conversion Bowdon GA', 'garage remodel Georgia', 'garage to living space Bowdon', 'garage renovation Bowdon', 'home addition garage'],
    ],
    [
        'name'        => 'Home Upgrades',
        'slug'        => 'home-upgrades',
        'description' => 'Enhance your home\'s value and functionality with professional upgrade services in Bowdon, GA.',
        'keywords'    => ['home upgrades Bowdon GA', 'home improvements Georgia', 'house upgrades Bowdon', 'home enhancement services', 'property improvements Bowdon'],
    ],
    [
        'name'        => 'Framing Contractor',
        'slug'        => 'framing-contractor',
        'description' => 'Expert framing for new construction, additions, and remodeling projects throughout Bowdon, GA.',
        'keywords'    => ['framing contractor Bowdon GA', 'framing services Georgia', 'residential framing Bowdon', 'construction framing', 'home framing contractors'],
    ],
];

// ------------------------------------------------------------
// Service groups (for nav and service-group pages)
// ------------------------------------------------------------
$serviceGroups = [
    [
        'name'     => 'Remodeling Services',
        'slug'     => 'remodeling-services',
        'services' => ['Kitchen Remodeling', 'Bathroom Remodeling', 'Basement Finishing', 'Basement Kitchen Remodeling', 'Attic Remodeling', 'Room Additions', 'Full Home Remodel', 'Custom Remodeling', 'Structural Renovation', 'Eco-Friendly Remodeling', 'Home Additions'],
    ],
    [
        'name'     => 'Seasonal Services',
        'slug'     => 'seasonal-services',
        'services' => ['Plumbing Services', 'Electrical Services', 'HVAC Services'],
    ],
    [
        'name'     => 'Flooring Services',
        'slug'     => 'flooring-services',
        'services' => ['Open Floor Plan Remodeling', 'Custom Tile Showers', 'Flooring Installation', 'Sanded Finish Flooring', 'LVP Flooring', 'Subfloor Replacement'],
    ],
    [
        'name'     => 'Design-Build Remodeling',
        'slug'     => 'design-build-remodeling',
        'solo'     => true,
        'services' => ['Design-Build Remodeling'],
    ],
    [
        'name'     => 'Home Restoration',
        'slug'     => 'home-restoration',
        'solo'     => true,
        'services' => ['Home Restoration'],
    ],
    [
        'name'     => 'Garage Conversion',
        'slug'     => 'garage-conversion',
        'solo'     => true,
        'services' => ['Garage Conversion'],
    ],
    [
        'name'     => 'Home Upgrades',
        'slug'     => 'home-upgrades',
        'solo'     => true,
        'services' => ['Home Upgrades'],
    ],
    [
        'name'     => 'Framing Contractor',
        'slug'     => 'framing-contractor',
        'solo'     => true,
        'services' => ['Framing Contractor'],
    ],
];

// ------------------------------------------------------------
// Service areas
// ------------------------------------------------------------
$serviceAreas = [
    [
        'city'    => 'Bowdon',
        'state'   => 'GA',
        'zip'     => '30108',
        'primary' => true,
    ],
];

// ------------------------------------------------------------
// Social links (populated when client provides profiles)
// ------------------------------------------------------------
$socialLinks = [
    'facebook'  => '',
    'instagram' => '',
    'youtube'   => '',
    'google'    => '',
];

// ------------------------------------------------------------
// Analytics & verification (replace placeholders before launch)
// ------------------------------------------------------------
$googleAnalyticsId = 'G-XXXXXXXXXX';
$gscVerification   = '';

// ------------------------------------------------------------
// Lead form
// ------------------------------------------------------------
$formAction     = 'https://db.pageone.cloud/functions/v1/leads/gray-tile-remodeling';
$contactEmail   = $email ?: 'info@gray-tile-remodeling.pageone.cloud';

// ------------------------------------------------------------
// Client photos (remote CDN — referenced in templates)
// ------------------------------------------------------------
$cdnBase = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/gray-tile-remodeling';

$clientPhotos = [
    'hero'    => $cdnBase . '/gallery/1777502893596-e2d8ca9f-3347-4acd-a11d-7d584fc38b31.jpg',
    'photo01' => $cdnBase . '/photos/1777502658606-ba0wdv-e2d8ca9f-3347-4acd-a11d-7d584fc38b31.jpg',
    'photo02' => $cdnBase . '/photos/1777502659744-9sf0ka-e0d16062-bac4-4f4d-abe3-8ed2677a9609.jpg',
    'photo03' => $cdnBase . '/photos/1777502660546-5tv01m-f5c363da-5a68-4502-9d66-3b07364ced3e.jpg',
    'photo04' => $cdnBase . '/photos/1777502661301-x354j6-cd964894-8675-458e-8593-8ddfff96d576.jpg',
    'photo05' => $cdnBase . '/photos/1777502662130-10k6sr-c6f9aa95-11c0-4a17-8b7c-1649db5db363.jpg',
    'photo06' => $cdnBase . '/photos/1777502662924-8klbnf-c7da939c-61e3-487d-a025-1c778f88d951.jpg',
    'photo07' => $cdnBase . '/photos/1777502663900-1avp26-d3ab0e48-7fd4-4b3f-ac55-76cc02f03dfd.jpg',
    'photo08' => $cdnBase . '/photos/1777502664960-it2cqa-9e5df7d8-551b-47e2-a520-cea8b6b318df.jpg',
    'photo09' => $cdnBase . '/photos/1777502666040-0axxar-a8109cf3-d111-423a-8187-27dbd3c0fe85.jpg',
    'photo10' => $cdnBase . '/photos/1777502666780-0c1lb5-6baca883-28b1-450f-8618-0bb1e6a2c69b.jpg',
    'photo11' => $cdnBase . '/photos/1777502667550-e73ktf-c73de1e7-fac8-4450-89af-fdef3145cf75.jpg',
    'photo12' => $cdnBase . '/photos/1777502668290-i6rgb9-295362e2-bc93-43f3-bacd-98cf90a01674.jpg',
    'photo13' => $cdnBase . '/photos/1777502669520-szchcm-097b270c-06ac-4ac5-9dd3-3b7fb1549789.jpg',
    'photo14' => $cdnBase . '/photos/1777502670300-nod4ze-89ce741b-f095-4115-a763-22fdf50a649c.jpg',
    'photo15' => $cdnBase . '/photos/1777502671390-1sw8f5-8c9a3f42-e142-4e90-b98f-e3bfd92f5634.jpg',
    'photo16' => $cdnBase . '/photos/1777502672198-b93pyk-0c9d4bad-e283-4857-82fd-7c6eb5f46060.jpg',
    'photo17' => $cdnBase . '/photos/1777502672941-k1rl61-e96199bb-ccb2-457e-b615-588bafff4bcd.jpg',
    'gallery01' => $cdnBase . '/gallery/1777502893596-e2d8ca9f-3347-4acd-a11d-7d584fc38b31.jpg',
    'gallery02' => $cdnBase . '/gallery/1777502895455-e0d16062-bac4-4f4d-abe3-8ed2677a9609.jpg',
    'gallery03' => $cdnBase . '/gallery/1777502896486-f5c363da-5a68-4502-9d66-3b07364ced3e.jpg',
    'gallery04' => $cdnBase . '/gallery/1777502897463-cd964894-8675-458e-8593-8ddfff96d576.jpg',
    'logo'      => $cdnBase . '/logo/1777502577007-x0wqro-grey_tile_logo.jpg',
];

// ------------------------------------------------------------
// Business description (for AEO entity block and llms.txt)
// ------------------------------------------------------------
$businessDescription = 'At Gray Tile & Remodeling, beautiful and functional design begins with expert craftsmanship and an unwavering commitment to quality. Based in Bowdon, Georgia, our experienced team brings ' . $yearsInBusiness . ' years of passion and expertise to every tile installation and remodeling project.';

// ------------------------------------------------------------
// FAQs (from research brief — used on homepage and service pages)
// ------------------------------------------------------------
$faqs = [
    [
        'q' => 'What types of tile do you install?',
        'a' => 'We work with ceramic, porcelain, natural stone, glass, and specialty tiles for kitchens, bathrooms, floors, showers, and accent walls. We can help you select the right material for your space and budget.',
    ],
    [
        'q' => 'How long does a typical tile remodeling project take?',
        'a' => 'Project timelines vary based on scope and complexity. A bathroom remodel typically takes 2–4 weeks, while larger projects may take longer. We provide a detailed timeline during your consultation.',
    ],
    [
        'q' => 'Do you handle removal of old tile?',
        'a' => 'Yes, we manage complete tile removal and disposal as part of our remodeling service, including surface preparation to ensure proper installation of new tile.',
    ],
    [
        'q' => 'Can you help with tile selection and design?',
        'a' => 'Absolutely. Our design consultation service helps you choose the right tiles, colors, and layouts for your space — considering durability, style, maintenance, and your budget.',
    ],
    [
        'q' => 'How do you ensure tile installations last in Georgia\'s humid climate?',
        'a' => 'We use proper waterproofing, quality grout, and moisture barriers appropriate for Georgia\'s climate. Our installation methods prevent mold, mildew, and water damage for long-lasting results.',
    ],
];

// ------------------------------------------------------------
// Dynamic deployment config (set by site-verify / post-deploy Edge Functions)
// Reads site-config.json if present; falls back to empty strings.
// Previously lived in site-config.php — merged here so config.php is the
// single include required by every page.
// ------------------------------------------------------------
$gscVerification  = '';
$ga4MeasurementId = '';
$__siteConfigPath = __DIR__ . '/site-config.json';
if (is_readable($__siteConfigPath)) {
    $__cfg = json_decode(file_get_contents($__siteConfigPath), true);
    if (is_array($__cfg)) {
        $gscVerification  = isset($__cfg['gsc_verification'])   ? (string) $__cfg['gsc_verification']   : '';
        $ga4MeasurementId = isset($__cfg['ga4_measurement_id']) ? (string) $__cfg['ga4_measurement_id'] : '';
    }
    unset($__cfg);
}
unset($__siteConfigPath);
