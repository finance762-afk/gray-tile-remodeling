<?php
/**
 * head.php — Gray Tile & Remodeling
 * Outputs everything from <!DOCTYPE html> through the head close
</head>.
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
if (str_starts_with($_ogImage, '/')) $_ogImage = $siteUrl . $_ogImage;
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

  <!-- v6.3: self-hosted fonts, no third-party preconnects -->
  <link rel="dns-prefetch" href="https://db.pageone.cloud">

  <link rel="preload" href="/assets/fonts/rajdhani-700.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="/assets/fonts/open-sans.woff2" as="font" type="font/woff2" crossorigin>

  <!-- Favicon (cut from the logo mark) -->
  <link rel="icon" type="image/png" href="/assets/images/favicon.png" sizes="32x32">
  <link rel="apple-touch-icon" href="/assets/images/favicon-180.png">

  <!-- Hero image preload — AVIF variants via imagesrcset (v6.3) -->
  <?php echo p1_hero_preload($heroPreloadImage ?? $clientPhotos['hero']); ?>

  <!-- Above-the-fold CSS inline (generated from framework.css by the critical extractor — regenerate after editing nav/hero/form rules); full stylesheet loads async (v6.3) -->
  <style><?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/critical.css'; ?></style>
  <link rel="preload" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>"></noscript>

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
      'logo'      => $siteUrl . $clientPhotos['logo'],
      'image'     => $_ogImage,
      'description' => $businessDescription,
      'telephone' => $phone ?: null,
      'email'     => $contactEmail,
      'address'   => array_filter([
          '@type'           => 'PostalAddress',
          'streetAddress'   => $address['street'] ?: null,
          'addressLocality' => $address['city'],
          'addressRegion'   => $address['state'],
          'postalCode'      => $address['zip'],
          'addressCountry'  => 'US',
      ]),
      'geo' => [
          '@type'     => 'GeoCoordinates',
          'latitude'  => 33.5351,
          'longitude' => -85.2647,
      ],
      'openingHoursSpecification' => [
          [
              '@type'     => 'OpeningHoursSpecification',
              'dayOfWeek' => $hours['days'],
              'opens'     => $hours['opens'],
              'closes'    => $hours['closes'],
          ],
      ],
      'areaServed' => [
          '@type'       => 'GeoCircle',
          'geoMidpoint' => [
              '@type'     => 'GeoCoordinates',
              'latitude'  => 33.5351,
              'longitude' => -85.2647,
          ],
          'geoRadius'   => '50000',
      ],
      'hasOfferCatalog' => [
          '@type'           => 'OfferCatalog',
          'name'            => 'Tile Installation & Remodeling Services',
          'itemListElement' => $_serviceSchemaItems,
      ],
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

<?php require_once __DIR__ . '/edit-mode.php'; ?>
</head>
