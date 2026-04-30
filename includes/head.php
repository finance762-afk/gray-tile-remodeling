<?php
/**
 * head.php — Gray Tile & Remodeling
 * Outputs everything from <!DOCTYPE html> through </head>.
 *
 * REQUIRED variables (set by each page before including):
 *   $pageTitle        — unique page title (50–60 chars)
 *   $pageDescription  — meta description (140–155 chars)
 *   $canonicalUrl     — absolute canonical URL for this page
 *   $currentPage      — page slug for active nav state (e.g. 'home', 'about')
 *
 * OPTIONAL variables:
 *   $ogImage          — absolute URL to OG/share image (falls back to hero photo)
 *   $noindex          — bool true → noindex,nofollow (e.g. thank-you page)
 *   $schemaMarkup     — JSON-LD string for page-specific schema (in addition to LocalBusiness)
 *   $useSwiper        — bool true → loads Swiper CSS from CDN
 */

// Pull config if not already loaded
if (!isset($siteName)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
}

// Resolve variables with safe fallbacks
$_title       = $pageTitle       ?? ($siteName . ' | ' . ucwords($primaryKeyword) . ' | ' . $address['city'] . ', ' . $address['state']);
$_description = $pageDescription ?? ($siteName . ' — Expert home remodeling, tile installation, and renovation services in ' . $address['city'] . ', ' . $address['state'] . '. Get a free estimate today.');
$_canonical   = $canonicalUrl    ?? $siteUrl;
$_ogImage     = $ogImage         ?? $clientPhotos['hero'];
$_noindex     = $noindex         ?? false;

// Build service schema items for LocalBusiness hasOfferCatalog
$_serviceSchemaItems = [];
foreach ($services as $svc) {
    $_serviceSchemaItems[] = [
        '@type'       => 'Offer',
        'itemOffered' => [
            '@type'       => 'Service',
            'name'        => $svc['name'],
            'description' => $svc['description'],
        ],
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Primary SEO -->
  <title><?php echo htmlspecialchars($_title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($_description); ?>">
  <link rel="canonical" href="<?php echo htmlspecialchars($_canonical); ?>">

  <?php if ($_noindex): ?>
  <meta name="robots" content="noindex,nofollow">
  <?php else: ?>
  <meta name="robots" content="index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1">
  <?php endif; ?>

  <!-- Open Graph -->
  <meta property="og:type"        content="website">
  <meta property="og:title"       content="<?php echo htmlspecialchars($_title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($_description); ?>">
  <meta property="og:url"         content="<?php echo htmlspecialchars($_canonical); ?>">
  <meta property="og:image"       content="<?php echo htmlspecialchars($_ogImage); ?>">
  <meta property="og:site_name"   content="<?php echo htmlspecialchars($siteName); ?>">
  <meta property="og:locale"      content="en_US">

  <!-- Performance: DNS Prefetch + Preconnect -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link rel="dns-prefetch" href="https://db.pageone.cloud">
  <link rel="dns-prefetch" href="https://unpkg.com">
  <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

  <!-- Google Fonts: Rajdhani (heading) + Open Sans (body) -->
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Open+Sans:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">

  <!-- Favicon -->
  <link rel="icon"             type="image/svg+xml" href="/assets/images/favicon.svg">
  <link rel="icon"             type="image/png"     href="/assets/images/favicon.png" sizes="32x32">
  <link rel="apple-touch-icon"                      href="/assets/images/favicon.png">

  <!-- Hero Image Preload (improves LCP on pages using the hero photo) -->
  <link rel="preload" as="image" href="<?php echo htmlspecialchars($clientPhotos['hero']); ?>">

  <!-- Shared Stylesheet -->
  <link rel="stylesheet" href="/assets/css/framework.css">

  <?php if (isset($useSwiper) && $useSwiper): ?>
  <!-- Swiper CSS (conditional — only on pages with carousels) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <?php endif; ?>

  <!-- Google Analytics 4 — uncomment and replace GA_MEASUREMENT_ID before launch -->
  <!--
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo htmlspecialchars($googleAnalyticsId); ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?php echo htmlspecialchars($googleAnalyticsId); ?>');
  </script>
  -->

  <?php if (isset($currentPage) && $currentPage === 'home'): ?>
  <!-- Google Search Console Verification — replace content before launch -->
  <!-- <meta name="google-site-verification" content="REPLACE_WITH_GSC_VERIFICATION_CODE"> -->
  <?php endif; ?>

  <!-- LocalBusiness JSON-LD Schema (present on every page) -->
  <script type="application/ld+json">
  <?php echo json_encode([
      '@context'  => 'https://schema.org',
      '@type'     => 'HomeAndConstructionBusiness',
      'name'      => $siteName,
      'url'       => $siteUrl,
      'logo'      => $clientPhotos['logo'],
      'image'     => $clientPhotos['hero'],
      'description' => $businessDescription,
      'telephone' => $phone ?: null,
      'email'     => $contactEmail,
      'address'   => [
          '@type'           => 'PostalAddress',
          'streetAddress'   => $address['street'],
          'addressLocality' => $address['city'],
          'addressRegion'   => $address['state'],
          'postalCode'      => $address['zip'],
          'addressCountry'  => 'US',
      ],
      'geo' => [
          '@type'     => 'GeoCoordinates',
          'latitude'  => 33.5351,
          'longitude' => -85.2647,
      ],
      'openingHoursSpecification' => [
          [
              '@type'     => 'OpeningHoursSpecification',
              'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
              'opens'     => '08:00',
              'closes'    => '18:00',
          ],
          [
              '@type'     => 'OpeningHoursSpecification',
              'dayOfWeek' => 'Saturday',
              'opens'     => '09:00',
              'closes'    => '14:00',
          ],
      ],
      'areaServed' => [
          '@type'       => 'GeoCircle',
          'geoMidpoint' => [
              '@type'     => 'GeoCoordinates',
              'latitude'  => 33.5351,
              'longitude' => -85.2647,
          ],
          'geoRadius'   => '80000',
      ],
      'hasOfferCatalog' => [
          '@type'           => 'OfferCatalog',
          'name'            => 'Tile Installation & Remodeling Services',
          'itemListElement' => $_serviceSchemaItems,
      ],
      'foundingYear' => (string) $yearEstablished,
      'slogan'       => $tagline,
      'priceRange'   => '$$',
      'paymentAccepted' => 'Cash, Check, Credit Card',
      'currenciesAccepted' => 'USD',
  ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
  </script>

  <?php if (!empty($schemaMarkup)): ?>
  <!-- Page-Specific Schema -->
  <script type="application/ld+json"><?php echo $schemaMarkup; ?></script>
  <?php endif; ?>

</head>
