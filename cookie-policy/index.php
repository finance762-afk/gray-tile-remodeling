<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Legal page identity ───────────────────────────────────────
$companyName       = $siteName;
$companyEntityType = 'Limited Liability Company';
$companyState      = 'Georgia';
$companyEmail      = $contactEmail;
$companyPhone      = $phone ?: $contactEmail;
$companyAddress    = $address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip'];
$lastUpdated       = 'April 24, 2026';

// ── Page Setup ────────────────────────────────────────────────
$pageTitle       = 'Cookie Policy | ' . $siteName;
$pageDescription = 'Cookie Policy for ' . $siteName . ' — what cookies we use and how to control them.';
$canonicalUrl    = $siteUrl . '/cookie-policy/';
$currentPage     = 'legal';
$ogImage         = $clientPhotos['photo06'];
$heroPreloadImage = $clientPhotos['photo06'];

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'WebPage',
            '@id'   => $siteUrl . '/cookie-policy/',
            'url'   => $siteUrl . '/cookie-policy/',
            'name'  => 'Cookie Policy | ' . $siteName,
            'description' => 'Cookie Policy for ' . $siteName . ' — what cookies we use and how to control them.',
            'isPartOf' => ['@id' => $siteUrl . '/'],
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Cookie Policy', 'item' => $siteUrl . '/cookie-policy/'],
            ],
        ],
    ],
], JSON_UNESCAPED_SLASHES);

// SEO: head.php outputs <link rel="canonical"> and application/ld+json schema for this page.
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ── Legal Page Shared Styles ────────────────────── */

.legal-hero {
  min-height: 40vh;
  display: flex;
  align-items: flex-end;
  padding: var(--space-3xl) 0 var(--space-2xl);
  background-color: var(--color-primary-dark);
  background-image: url('<?php echo htmlspecialchars($clientPhotos['photo06']); ?>');
  background-size: cover;
  background-position: center;
  position: relative;
  overflow: hidden;
}

.legal-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    135deg,
    rgba(var(--color-primary-dark-rgb), 0.88) 0%,
    rgba(var(--color-primary-rgb), 0.75) 60%,
    rgba(var(--color-primary-dark-rgb), 0.65) 100%
  );
  pointer-events: none;
}

.legal-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  pointer-events: none;
}

.legal-hero .container {
  position: relative;
  z-index: 1;
}

.legal-breadcrumb {
  display: flex;
  gap: var(--space-sm);
  align-items: center;
  font-family: var(--font-body);
  font-size: 0.85rem;
  color: rgba(255, 255, 255, 0.65);
  margin-bottom: var(--space-lg);
}

.legal-breadcrumb a {
  color: rgba(255, 255, 255, 0.65);
  text-decoration: none;
  transition: color var(--transition-base);
}

.legal-breadcrumb a:hover {
  color: var(--color-white);
}

.legal-breadcrumb span {
  color: rgba(255, 255, 255, 0.4);
}

.legal-hero h1 {
  font-family: var(--font-heading);
  color: var(--color-white);
  font-size: clamp(2rem, 5vw, 3.5rem);
  text-wrap: balance;
  font-weight: 800;
  letter-spacing: -0.02em;
  line-height: 1.15;
  position: relative;
  z-index: 1;
}

/* Content area */
.legal-content {
  padding: var(--space-4xl) 0;
  background: var(--color-bg);
}

.content-narrow {
  max-width: 800px;
  margin-inline: auto;
  padding-inline: var(--space-lg);
}

.content-narrow h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.3rem, 3vw, 1.8rem);
  color: var(--color-primary);
  margin-top: var(--space-3xl);
  margin-bottom: var(--space-md);
  text-wrap: balance;
  font-weight: 700;
  letter-spacing: -0.01em;
}

.content-narrow h3 {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  color: var(--color-primary);
  margin-top: var(--space-xl);
  margin-bottom: var(--space-sm);
  text-wrap: balance;
  font-weight: 600;
}

.content-narrow p,
.content-narrow li {
  font-family: var(--font-body);
  font-size: 1rem;
  line-height: 1.7;
  color: var(--color-text);
  margin-bottom: var(--space-md);
}

.content-narrow ul {
  padding-left: var(--space-xl);
  margin-bottom: var(--space-md);
}

.content-narrow a {
  color: var(--color-accent);
  text-decoration: underline;
}

.content-narrow a:hover {
  color: var(--color-primary);
}

.content-narrow a:focus-visible {
  outline: 2px solid var(--color-accent);
  outline-offset: 2px;
  border-radius: 2px;
}

.legal-updated {
  background: var(--color-bg-alt);
  border-left: 3px solid var(--color-accent);
  padding: var(--space-sm) var(--space-md);
  border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
  margin-bottom: var(--space-2xl);
  font-family: var(--font-body);
  font-size: 0.9rem;
  color: var(--color-text-light);
}

.legal-updated strong {
  color: var(--color-primary);
}

/* Cookie table */
.cookie-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: var(--space-lg);
  font-size: 0.9rem;
  overflow-x: auto;
  display: block;
}

.cookie-table th,
.cookie-table td {
  text-align: left;
  padding: var(--space-sm) var(--space-md);
  border: 1px solid var(--color-gray-light);
  font-family: var(--font-body);
  line-height: 1.5;
}

.cookie-table th {
  background: var(--color-bg-alt);
  font-family: var(--font-heading);
  font-weight: 600;
  color: var(--color-primary);
  white-space: nowrap;
}

.cookie-table td {
  color: var(--color-text);
}

.cookie-table tr:nth-child(even) td {
  background: rgba(var(--color-primary-rgb), 0.02);
}

/* Contact box */
.legal-contact-box {
  background: var(--color-bg-alt);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-md);
  padding: var(--space-xl) var(--space-lg);
  margin-top: var(--space-2xl);
}

.legal-contact-box h2 {
  margin-top: 0;
}

@media (max-width: 600px) {
  .content-narrow { padding-inline: var(--space-md); }
  .cookie-table th,
  .cookie-table td { padding: var(--space-xs) var(--space-sm); font-size: 0.8rem; }
}
</style>

<!-- Hero -->
<section class="legal-hero" aria-labelledby="cookie-heading">
  <div class="container">
    <nav class="legal-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span aria-hidden="true">/</span>
      <span aria-current="page">Cookie Policy</span>
    </nav>
    <h1 id="cookie-heading">Cookie Policy</h1>
  </div>
</section>

<!-- Content -->
<section class="legal-content">
  <div class="content-narrow" id="main-content">

    <div class="legal-updated">
      <strong>Last Updated:</strong> <?php echo htmlspecialchars($lastUpdated); ?>
    </div>

    <h2>What Are Cookies</h2>
    <p>Cookies are small text files that are stored on your device (computer, tablet, or phone) when you visit a website. They allow the website to recognize your device and remember certain information about your visit. Cookies can be "session" cookies (deleted when you close your browser) or "persistent" cookies (retained for a set period).</p>
    <p>We use cookies to make our website function properly and to understand how visitors use our site so we can improve it. This policy explains each cookie we use, who sets it, and how long it lasts.</p>

    <h2>Strictly Necessary Cookies</h2>
    <p>These cookies are required for the website to function. They cannot be disabled without affecting site functionality.</p>

    <table class="cookie-table" role="table" aria-label="Strictly necessary cookies">
      <thead>
        <tr>
          <th scope="col">Cookie Name</th>
          <th scope="col">Set By</th>
          <th scope="col">Purpose</th>
          <th scope="col">Duration</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><code>PHPSESSID</code></td>
          <td>This website</td>
          <td>PHP session management — maintains your session state while browsing</td>
          <td>Session (deleted on browser close)</td>
        </tr>
      </tbody>
    </table>

    <h2>Analytics Cookies</h2>
    <p>These cookies help us understand how visitors interact with our website. We use this data in aggregate to improve our content and user experience. Individual users are not identified.</p>

    <table class="cookie-table" role="table" aria-label="Analytics cookies">
      <thead>
        <tr>
          <th scope="col">Cookie Name</th>
          <th scope="col">Set By</th>
          <th scope="col">Purpose</th>
          <th scope="col">Duration</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><code>_ga</code></td>
          <td>Google Analytics 4</td>
          <td>Distinguishes unique users by assigning a randomly generated number</td>
          <td>2 years</td>
        </tr>
        <tr>
          <td><code>_ga_&lt;container-id&gt;</code></td>
          <td>Google Analytics 4</td>
          <td>Maintains session state for GA4 measurement</td>
          <td>2 years</td>
        </tr>
      </tbody>
    </table>
    <p>You can opt out of Google Analytics tracking by installing the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener noreferrer">Google Analytics Opt-Out Browser Add-on</a>.</p>

    <h2>Functional Cookies &amp; Third-Party Resources</h2>
    <p>These are set by third-party services we use to deliver certain website features. They are not used for advertising or tracking across unrelated sites.</p>

    <table class="cookie-table" role="table" aria-label="Functional cookies and third-party resources">
      <thead>
        <tr>
          <th scope="col">Resource / Cookie</th>
          <th scope="col">Provider</th>
          <th scope="col">Purpose</th>
          <th scope="col">Duration</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Google Fonts</td>
          <td>Google LLC</td>
          <td>Loads typography fonts (Rajdhani, Open Sans) for consistent visual design</td>
          <td>1 year</td>
        </tr>
        <tr>
          <td>Google Maps</td>
          <td>Google LLC</td>
          <td>Renders embedded maps to show our service area and business location</td>
          <td>Session / Persistent</td>
        </tr>
        <tr>
          <td>Lucide Icons CDN</td>
          <td>jsDelivr</td>
          <td>Delivers icon library assets for page icons</td>
          <td>Session</td>
        </tr>
        <tr>
          <td>Swiper CDN</td>
          <td>jsDelivr</td>
          <td>Delivers carousel/slider library (loaded only on pages with slideshows)</td>
          <td>Session</td>
        </tr>
      </tbody>
    </table>

    <h2>How to Control Cookies</h2>
    <p>You can control and manage cookies through your browser settings. Most browsers allow you to:</p>
    <ul>
      <li>View cookies that are set and delete individual cookies</li>
      <li>Block third-party cookies</li>
      <li>Block cookies from specific websites</li>
      <li>Block all cookies (note: this may break website functionality)</li>
      <li>Delete all cookies when you close your browser</li>
    </ul>
    <p>Browser-specific instructions:</p>
    <ul>
      <li><a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener noreferrer">Google Chrome</a></li>
      <li><a href="https://support.mozilla.org/en-US/kb/enhanced-tracking-protection-firefox-desktop" target="_blank" rel="noopener noreferrer">Mozilla Firefox</a></li>
      <li><a href="https://support.apple.com/guide/safari/manage-cookies-sfri11471/mac" target="_blank" rel="noopener noreferrer">Apple Safari</a></li>
      <li><a href="https://support.microsoft.com/en-us/microsoft-edge/delete-cookies-in-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank" rel="noopener noreferrer">Microsoft Edge</a></li>
    </ul>

    <h2>Do Not Track and Global Privacy Control</h2>
    <p>We honor the Global Privacy Control (GPC) signal as a valid opt-out request for the sale or sharing of personal information. When a GPC signal is detected, we treat it as a request to limit data sharing as described in our <a href="/privacy-policy/">Privacy Policy</a>.</p>
    <p>Some browsers also transmit a "Do Not Track" (DNT) signal. At this time there is no universally accepted standard for how websites must respond to DNT signals. We continue to monitor standards and will update this policy if our approach changes.</p>

    <h2>California Residents</h2>
    <p>California residents have additional rights regarding personal information collected through cookies and similar technologies. See the <a href="/privacy-policy/#ccpa-rights">Your Privacy Rights section of our Privacy Policy</a> for full details, including your right to opt out of the sale or sharing of personal information.</p>

    <h2>Changes to This Policy</h2>
    <p>We may update this Cookie Policy to reflect changes in the cookies we use or applicable law. When we make changes, we will update the "Last Updated" date at the top of this page. We encourage you to review this page periodically.</p>

    <div class="legal-contact-box">
      <h2>Contact Us</h2>
      <p>If you have questions about our use of cookies, please contact us:</p>
      <p>
        <strong><?php echo htmlspecialchars($companyName); ?></strong><br>
        <?php echo htmlspecialchars($companyAddress); ?><br>
        Email: <a href="mailto:<?php echo htmlspecialchars($companyEmail); ?>"><?php echo htmlspecialchars($companyEmail); ?></a><br>
        <?php if ($phone): ?>Phone: <a href="tel:<?php echo htmlspecialchars($phone); ?>"><?php echo htmlspecialchars(formatPhone($phone)); ?></a><?php endif; ?>
      </p>
    </div>

  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
