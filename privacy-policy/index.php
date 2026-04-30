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
$pageTitle       = 'Privacy Policy | ' . $siteName;
$pageDescription = 'Privacy Policy for ' . $siteName . ' — how we collect, use, and protect your information.';
$canonicalUrl    = $siteUrl . '/privacy-policy/';
$currentPage     = 'legal';

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'WebPage',
            '@id'   => $siteUrl . '/privacy-policy/',
            'url'   => $siteUrl . '/privacy-policy/',
            'name'  => 'Privacy Policy | ' . $siteName,
            'description' => 'Privacy Policy for ' . $siteName . ' — how we collect, use, and protect your information.',
            'isPartOf' => ['@id' => $siteUrl . '/'],
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Privacy Policy', 'item' => $siteUrl . '/privacy-policy/'],
            ],
        ],
    ],
], JSON_UNESCAPED_SLASHES);

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
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative;
  overflow: hidden;
}

.legal-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse 60% 80% at 100% 50%, rgba(var(--color-accent-rgb), 0.12) 0%, transparent 60%);
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

/* State rights list */
.state-list {
  columns: 2;
  column-gap: var(--space-xl);
  list-style: none;
  padding-left: 0;
  margin-bottom: var(--space-md);
}

.state-list li {
  break-inside: avoid;
  padding-left: var(--space-md);
  position: relative;
  font-size: 0.95rem;
  margin-bottom: var(--space-xs);
}

.state-list li::before {
  content: '•';
  color: var(--color-accent);
  position: absolute;
  left: 0;
  font-weight: 700;
}

@media (max-width: 600px) {
  .state-list { columns: 1; }
  .content-narrow { padding-inline: var(--space-md); }
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
</style>

<!-- Hero -->
<section class="legal-hero" aria-labelledby="privacy-heading">
  <div class="container">
    <nav class="legal-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span aria-hidden="true">/</span>
      <span aria-current="page">Privacy Policy</span>
    </nav>
    <h1 id="privacy-heading">Privacy Policy</h1>
  </div>
</section>

<!-- Content -->
<section class="legal-content">
  <div class="content-narrow" id="main-content">

    <div class="legal-updated">
      <strong>Last Updated:</strong> <?php echo htmlspecialchars($lastUpdated); ?>
    </div>

    <h2>Introduction</h2>
    <p><?php echo htmlspecialchars($companyName); ?> ("we," "us," or "our") is a <?php echo htmlspecialchars($companyEntityType); ?> operating in the State of <?php echo htmlspecialchars($companyState); ?>. This Privacy Policy describes how we collect, use, disclose, and protect personal information when you visit our website or contact us about our services. By using our website, you agree to the terms of this policy.</p>

    <h2>Information We Collect</h2>
    <h3>Information You Provide Directly</h3>
    <p>When you submit a contact or estimate request form, we collect:</p>
    <ul>
      <li>Full name</li>
      <li>Email address</li>
      <li>Phone number</li>
      <li>Service type requested</li>
      <li>Message content</li>
      <li>Communication preferences (email opt-in, SMS opt-in)</li>
    </ul>

    <h3>Information Collected Automatically</h3>
    <p>When you submit a form or visit our site, we automatically collect:</p>
    <ul>
      <li>IP address</li>
      <li>Browser user agent string</li>
      <li>Timestamp of submission</li>
      <li>Consent version and page URL at time of consent</li>
      <li>Anonymized website usage data via Google Analytics 4 (pages visited, session duration, referral source)</li>
    </ul>

    <h2>How We Use Your Information</h2>
    <ul>
      <li>Respond to your estimate request or inquiry</li>
      <li>Schedule appointments and follow up on project discussions</li>
      <li>Send transactional emails related to your request</li>
      <li>With your explicit consent: send marketing emails or SMS messages about our services</li>
      <li>Improve our website and service offerings</li>
      <li>Comply with legal obligations and defend against legal claims</li>
    </ul>

    <h2>How We Share Your Information</h2>
    <p>We do not sell your personal information. We share data only with the following parties to operate our business:</p>
    <ul>
      <li><strong>Google LLC</strong> — Analytics (anonymized), Google Fonts (typography), Google Maps (embedded maps). <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">Google Privacy Policy</a></li>
      <li><strong>Page One Insights LLC</strong> — Form submission processing, CRM pipeline, and email delivery on our behalf. Sub-processors used by Page One Insights include Supabase (database hosting), Twilio SendGrid (transactional email), and Twilio (SMS delivery if applicable).</li>
      <li><strong>Hostinger</strong> — Web hosting provider. <a href="https://www.hostinger.com/privacy-policy" target="_blank" rel="noopener noreferrer">Hostinger Privacy Policy</a></li>
      <li><strong>Legal requirements</strong> — We may disclose your information to comply with a subpoena, court order, or other legal obligation, or to protect the rights and safety of our company, customers, or others.</li>
    </ul>

    <h2 id="ccpa-rights">Your Privacy Rights</h2>

    <h3>California Residents (CCPA/CPRA)</h3>
    <p>California residents have the following rights under the California Consumer Privacy Act (CCPA) and California Privacy Rights Act (CPRA):</p>
    <ul>
      <li><strong>Right to Know</strong> — Request disclosure of the personal information we have collected, used, disclosed, or sold about you in the past 12 months.</li>
      <li><strong>Right to Delete</strong> — Request deletion of your personal information, subject to certain exceptions.</li>
      <li><strong>Right to Correct</strong> — Request correction of inaccurate personal information we hold about you.</li>
      <li><strong>Right to Limit Use of Sensitive Information</strong> — Direct us to limit the use of your sensitive personal information to necessary purposes.</li>
      <li><strong>Right to Opt-Out of Sale or Sharing</strong> — We do not sell personal information. If our practices change, you may opt out using the "Do Not Sell or Share My Personal Information" link in our footer.</li>
      <li><strong>Right to Non-Discrimination</strong> — We will not discriminate against you for exercising your privacy rights.</li>
      <li><strong>Authorized Agent</strong> — You may designate an authorized agent to submit a request on your behalf. We may require proof of authorization.</li>
    </ul>
    <p>We honor Global Privacy Control (GPC) signals as a valid opt-out of the sale or sharing of personal information.</p>
    <p>To exercise your rights, contact us at <a href="mailto:<?php echo htmlspecialchars($companyEmail); ?>"><?php echo htmlspecialchars($companyEmail); ?></a>. We will respond within 45 days.</p>

    <h3>Residents of Other States</h3>
    <p>Residents of the following states have similar privacy rights under applicable state law. Contact us to exercise any of these rights:</p>
    <ul class="state-list">
      <li>Virginia (VCDPA)</li>
      <li>Colorado (CPA)</li>
      <li>Connecticut (CTDPA)</li>
      <li>Utah (UCPA)</li>
      <li>Texas (TDPSA)</li>
      <li>Florida (FDBR)</li>
      <li>Oregon (OCPA)</li>
      <li>Montana (MCDPA)</li>
      <li>Delaware (DPDPA)</li>
      <li>Iowa (ICDPA)</li>
      <li>Tennessee (TIPA)</li>
      <li>Indiana (INCDPA)</li>
      <li>Kentucky (KCDPA)</li>
      <li>Rhode Island (RIDPPA)</li>
      <li>Maryland (MODPA)</li>
      <li>Minnesota (MHPCA)</li>
      <li>New Hampshire (NHPPA)</li>
      <li>New Jersey (NJDPA)</li>
      <li>Nebraska (NDPA)</li>
    </ul>

    <h2>Data Retention</h2>
    <p>We retain personal information for up to 4 years from the date of collection, or as long as necessary to fulfill the purposes described in this policy, unless a longer retention period is required by law. Consent records related to TCPA compliance are retained for the full retention period to support legal defense.</p>

    <h2>Security</h2>
    <p>We implement reasonable security measures to protect your personal information, including SSL/TLS encryption on all data transmissions, secure cloud hosting with access controls, and restricted internal access to personal data. No method of transmission over the internet is completely secure, and we cannot guarantee absolute security.</p>

    <h2>Children's Privacy</h2>
    <p>Our website is not directed to children under the age of 13. We do not knowingly collect personal information from children under 13. If you believe we have inadvertently collected such information, please contact us immediately so we can delete it.</p>

    <h2>Third-Party Links</h2>
    <p>Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of those sites. We encourage you to review the privacy policies of any third-party site you visit.</p>

    <h2>SMS Program Terms</h2>
    <p>If you opt in to receive SMS text messages from us, the following terms apply:</p>
    <ul>
      <li>Message frequency varies based on your inquiry and service needs.</li>
      <li>Message and data rates may apply depending on your mobile carrier plan.</li>
      <li>Reply <strong>STOP</strong> at any time to unsubscribe from SMS messages. Reply <strong>HELP</strong> for assistance.</li>
      <li>Consent to receive SMS messages is not a condition of purchase or receiving any service.</li>
      <li>For support, contact us at <a href="mailto:<?php echo htmlspecialchars($companyEmail); ?>"><?php echo htmlspecialchars($companyEmail); ?></a>.</li>
    </ul>

    <h2>Changes to This Policy</h2>
    <p>We may update this Privacy Policy from time to time to reflect changes in our practices or applicable law. When we make material changes, we will update the "Last Updated" date at the top of this page. We encourage you to review this policy periodically.</p>

    <div class="legal-contact-box">
      <h2>Contact Us</h2>
      <p>If you have questions about this Privacy Policy or want to exercise your privacy rights, please contact us:</p>
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
