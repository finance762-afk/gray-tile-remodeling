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
require_once __DIR__ . '/attribution.php'; // v6.3 lead attribution — must run before any output
$siteName    = 'Gray Tile & Remodeling';
$tagline     = 'Quality Tiles, Expert Remodeling, Exceptional Results';
$industry    = 'tile';
$ownerName   = '';

// ------------------------------------------------------------
// Contact
// ------------------------------------------------------------
$phone          = '(404) 310-3381'; // GBP listing phone (native sync 2026-09-04)
$phoneSecondary = '';
$email          = 'graytile@bellsouth.net';

// ------------------------------------------------------------
// Address (must match Google Business Profile character-for-character)
// ------------------------------------------------------------
$address = [
    'street' => '', // service-area business — GBP hides the street address; never publish one
    'city'   => 'Bowdon',
    'state'  => 'GA',
    'zip'    => '30108',
];

// ------------------------------------------------------------
// Domain & URLs
// No production_domain in build-plan.json → using preview URL
// ------------------------------------------------------------
$domain  = 'graytileremodeling.com'; // launch domain (replaces the Hostinger Website Builder site)
$siteUrl = 'https://' . $domain;
// $canonicalUrl is NOT set here — each page sets its own before including head.php

// ------------------------------------------------------------
// Business history
// ------------------------------------------------------------
$yearEstablished = null; // not provided by the client and not on GBP — never claim a founding year
$yearsInBusiness = null;

// ------------------------------------------------------------
// Brand colors (extracted from logo — charcoal grey + warm gold)
// ------------------------------------------------------------
$colors = [
    'primary'        => '#3c3c3c',
    'primary_rgb'    => '60, 60, 60',
    'primary_dark'   => '#1a1a1a',
    'primary_dark_rgb' => '26, 26, 26',
    'secondary'      => '#6b6b6b',
    'secondary_rgb'  => '107, 107, 107',
    'accent'         => '#c9963a',
    'accent_rgb'     => '201, 150, 58',
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
// v6.3 (2026-09-04): photos live in /assets/images/ with -480/-960/-1600 webp+avif variants (see manifest.json);
// the Supabase-storage originals are the masters. Small originals (360–480px) are thumbnail-only.
$clientPhotos = [
    'hero' => '/assets/images/kitchen-remodel.jpg',
    'photo01' => '/assets/images/project-01.jpg',
    'photo02' => '/assets/images/project-05.jpg',
    'photo03' => '/assets/images/project-09.jpg',
    'photo04' => '/assets/images/project-01.jpg',
    'photo05' => '/assets/images/project-05.jpg',
    'photo06' => '/assets/images/project-06.jpg',
    'photo07' => '/assets/images/project-07.jpg',
    'photo08' => '/assets/images/project-08.jpg',
    'photo09' => '/assets/images/project-09.jpg',
    'photo10' => '/assets/images/project-10.jpg',
    'photo11' => '/assets/images/project-11.jpg',
    'photo12' => '/assets/images/project-12.jpg',
    'photo13' => '/assets/images/custom-tile-work.jpg',
    'photo14' => '/assets/images/kitchen-remodel.jpg',
    'photo15' => '/assets/images/project-15.jpg',
    'photo16' => '/assets/images/bathroom-remodel.jpg',
    'photo17' => '/assets/images/room-addition.jpg',
    'gallery01' => '/assets/images/project-01.jpg',
    'gallery02' => '/assets/images/project-06.jpg',
    'gallery03' => '/assets/images/project-10.jpg',
    'gallery04' => '/assets/images/project-07.jpg',
    'photo_kitchen' => '/assets/images/kitchen-remodel.jpg',
    'photo_bathroom' => '/assets/images/bathroom-remodel.jpg',
    'photo_tile_work' => '/assets/images/custom-tile-work.jpg',
    'photo_room_additions' => '/assets/images/room-addition.jpg',
    'logo' => '/assets/images/logo.jpg',
];

// ------------------------------------------------------------
// Business description (for AEO entity block and llms.txt)
// ------------------------------------------------------------
$businessDescription = 'Gray Tile & Remodeling is a tile contractor and home remodeler based in Bowdon, Georgia, serving Carroll County and West Georgia. The team handles custom tile showers, kitchen and bathroom remodels, flooring and finished basements in-house, from layout through final grout.';

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
$leadsFormSecret = 'bac7714a8f41505ab12d75311ccbb11a6374e38b1a010d69111c84a652cfa0f3'; // spam-shield HMAC (matches leads fn LEADS_FORM_SECRET)

// Hours — from the Google Business Profile (Mon–Thu 9am–5pm; closed Fri–Sun)
$hours = ['days' => ['Monday','Tuesday','Wednesday','Thursday'], 'opens' => '09:00', 'closes' => '17:00', 'display' => 'Mon–Thu 9am–5pm'];
$cssVersion = '2';
$googlePlaceId = 'ChIJkzazn-Yg9YgRms-LZNwZj6E';
