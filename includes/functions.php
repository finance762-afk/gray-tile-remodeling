<?php
/**
 * functions.php — Gray Tile & Remodeling
 * Shared helper functions. Included after config.php on every page.
 */

/**
 * Returns true if the given page slug matches the current page.
 * Relies on $currentPage being set by the individual page file before including.
 *
 * @param  string $page  Page slug to test (e.g. 'home', 'about', 'contact')
 * @return bool
 */
function isActivePage(string $page): bool
{
    global $currentPage;
    return isset($currentPage) && $currentPage === $page;
}

/**
 * Formats a raw phone number string into (XXX) XXX-XXXX.
 * Returns the input unchanged if it can't be formatted.
 *
 * @param  string $phone  Raw phone string (digits, dashes, parens, spaces accepted)
 * @return string
 */
function formatPhone(string $phone): string
{
    if (empty($phone)) {
        return '';
    }
    $digits = preg_replace('/\D/', '', $phone);
    if (strlen($digits) === 10) {
        return '(' . substr($digits, 0, 3) . ') ' . substr($digits, 3, 3) . '-' . substr($digits, 6);
    }
    if (strlen($digits) === 11 && $digits[0] === '1') {
        return '(' . substr($digits, 1, 3) . ') ' . substr($digits, 4, 3) . '-' . substr($digits, 7);
    }
    return $phone;
}

/**
 * Converts a human-readable service or page name to a URL-safe slug.
 *
 * @param  string $name  Service name (e.g. "Kitchen Remodeling")
 * @return string        Slug (e.g. "kitchen-remodeling")
 */
function getServiceSlug(string $name): string
{
    $slug = strtolower(trim($name));
    $slug = preg_replace('/[^a-z0-9\s\-]/', '', $slug);
    $slug = preg_replace('/[\s\-]+/', '-', $slug);
    return trim($slug, '-');
}

/**
 * Converts a city name to a URL-safe slug (delegates to getServiceSlug).
 *
 * @param  string $city  City name (e.g. "Bowdon")
 * @return string        Slug (e.g. "bowdon")
 */
function getAreaSlug(string $city): string
{
    return getServiceSlug($city);
}

/**
 * Generates a Service + HowTo schema JSON-LD string for a given service array.
 * The returned string is ready to drop into a <script type="application/ld+json"> tag.
 *
 * @param  array  $service  Single entry from $services in config.php
 * @return string           JSON-LD string
 */
function generateServiceSchema(array $service): string
{
    global $siteName, $siteUrl, $address, $phone, $clientPhotos;

    $slug = $service['slug'] ?? getServiceSlug($service['name']);

    $schema = [
        '@context'    => 'https://schema.org',
        '@graph'      => [
            [
                '@type'       => 'Service',
                'name'        => $service['name'],
                'description' => $service['description'],
                'url'         => $siteUrl . '/services/' . $slug . '/',
                'provider'    => [
                    '@type'     => 'HomeAndConstructionBusiness',
                    'name'      => $siteName,
                    'telephone' => $phone ?: null,
                    'url'       => $siteUrl,
                    'address'   => [
                        '@type'           => 'PostalAddress',
                        'streetAddress'   => $address['street'],
                        'addressLocality' => $address['city'],
                        'addressRegion'   => $address['state'],
                        'postalCode'      => $address['zip'],
                        'addressCountry'  => 'US',
                    ],
                ],
                'areaServed'  => [
                    '@type'           => 'State',
                    'name'            => 'Georgia',
                    'addressCountry'  => 'US',
                ],
                'serviceType' => $service['name'],
            ],
            [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl . '/'],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services/'],
                    ['@type' => 'ListItem', 'position' => 3, 'name' => $service['name'], 'item' => $siteUrl . '/services/' . $slug . '/'],
                ],
            ],
        ],
    ];

    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

/**
 * Generates a FAQPage schema JSON-LD string from an array of FAQ items.
 * Each FAQ item must have 'q' (question) and 'a' (answer) keys.
 * The returned string is ready to drop into a <script type="application/ld+json"> tag.
 *
 * @param  array  $faqs  Array of ['q' => '...', 'a' => '...'] items
 * @return string        JSON-LD string
 */
function generateFAQSchema(array $faqs): string
{
    $entities = array_map(function (array $faq): array {
        return [
            '@type' => 'Question',
            'name'  => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $faq['a'],
            ],
        ];
    }, $faqs);

    return json_encode([
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $entities,
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

/**
 * Generates the three core meta-tag HTML strings for a page.
 * Useful when building page titles/descriptions dynamically in service or area page loops.
 *
 * @param  string $title        Page <title> value
 * @param  string $description  Meta description value
 * @param  string $canonical    Absolute canonical URL
 * @return string               HTML string with title, meta description, and canonical link
 */
function generateMetaTags(string $title, string $description, string $canonical): string
{
    return implode("\n", [
        '<title>' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</title>',
        '<meta name="description" content="' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '">',
        '<link rel="canonical" href="' . htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') . '">',
    ]);
}

/**
 * Returns the AggregateRating schema snippet (array, not JSON-encoded).
 * Merge into any page schema that requires it.
 * Update ratingValue, reviewCount, and bestRating when real reviews are collected.
 *
 * @return array
 */
function getAggregateRatingSchema(): array
{
    return [
        '@type'       => 'AggregateRating',
        'ratingValue' => '5.0',
        'reviewCount' => '1',
        'bestRating'  => '5',
        'worstRating' => '1',
    ];
}
