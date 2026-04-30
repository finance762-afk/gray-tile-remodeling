<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'About Gray Tile & Remodeling | Bowdon, GA Remodelers';
$pageDescription = '25 years of tile and remodeling craftsmanship in Bowdon, GA. Learn about Gray Tile & Remodeling — our story, process, and commitment to West Georgia homeowners.';
$canonicalUrl    = $siteUrl . '/about/';
$ogImage         = $clientPhotos['gallery01'];
$currentPage     = 'about';

$aboutFaqs = [
    [
        'q' => 'How long has Gray Tile & Remodeling been in business?',
        'a' => 'Gray Tile & Remodeling was founded in 2001 in Bowdon, Georgia, giving us 25 years of hands-on experience installing tile and completing remodeling projects across Carroll County and West Georgia.',
    ],
    [
        'q' => 'What areas does Gray Tile & Remodeling serve?',
        'a' => 'We serve Bowdon and surrounding communities throughout Carroll County and West Georgia, including Carrollton, Villa Rica, Bremen, Temple, Whitesburg, and Roopville — within approximately 50 miles of our Bowdon base.',
    ],
    [
        'q' => 'What makes Gray Tile different from a general contractor?',
        'a' => 'Our foundation is tile craftsmanship — a specialized skill that general contractors typically subcontract out. We bring 25 years of tile-specific expertise to every project, combined with full remodeling capabilities, so every surface and every system is handled by the same accountable team.',
    ],
];

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type'         => 'Organization',
            'name'          => $siteName,
            'url'           => $siteUrl,
            'foundingYear'  => (string)$yearEstablished,
            'description'   => $businessDescription,
            'areaServed'    => ['Bowdon GA', 'Carrollton GA', 'Villa Rica GA', 'Carroll County GA'],
            'aggregateRating' => getAggregateRatingSchema(),
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',  'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'About', 'item' => $siteUrl . '/about/'],
            ],
        ],
        [
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(fn($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $aboutFaqs),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

// SEO: head.php outputs <link rel="canonical"> and application/ld+json schema for this page.
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ================================================================
   ABOUT/INDEX.PHP — Gray Tile & Remodeling
   Page-specific styles. All values use var() tokens only.
   ================================================================ */

/* ── Hero ─────────────────────────────────────────────────────── */
.about-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: flex-end;
  padding-bottom: var(--space-4xl);
  background-image: url('<?php echo htmlspecialchars($clientPhotos['gallery01']); ?>');
  background-size: cover;
  background-position: center 35%;
  background-repeat: no-repeat;
  overflow: hidden;
}
.about-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    160deg,
    rgba(var(--color-primary-rgb), 0.82) 0%,
    rgba(var(--color-primary-dark-rgb), 0.55) 55%,
    rgba(var(--color-primary-dark-rgb), 0.38) 100%
  );
  z-index: 1;
}
.about-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.04;
  z-index: 2;
  pointer-events: none;
}
.about-hero-content {
  position: relative;
  z-index: 3;
  width: 100%;
}
.about-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.4rem, 5.5vw, 4rem);
  font-weight: 800;
  line-height: 1.12;
  letter-spacing: -0.02em;
  text-wrap: balance;
  color: var(--color-white);
  margin-bottom: var(--space-md);
  background: linear-gradient(135deg, var(--color-white) 0%, rgba(var(--color-accent-rgb), 0.9) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.about-hero-sub {
  font-size: clamp(1rem, 2vw, 1.2rem);
  color: rgba(255,255,255,0.88);
  max-width: 52ch;
  line-height: 1.6;
  margin-bottom: var(--space-xl);
}
.about-hero-badges {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-sm);
}
.about-hero-badge {
  display: inline-flex;
  align-items: center;
  gap: var(--space-xs);
  background: rgba(255,255,255,0.12);
  border: 1px solid rgba(255,255,255,0.22);
  border-radius: var(--radius-xl);
  padding: var(--space-xs) var(--space-md);
  font-size: 0.82rem;
  font-weight: 600;
  color: var(--color-white);
  letter-spacing: 0.03em;
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
}

/* ── Breadcrumb ───────────────────────────────────────────────── */
.breadcrumb-bar {
  background: var(--color-bg-alt);
  border-bottom: 1px solid var(--color-gray-light);
  padding: var(--space-sm) 0;
}
.breadcrumb {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  font-size: 0.85rem;
  color: var(--color-text-light);
  list-style: none;
  padding: 0;
  margin: 0;
}
.breadcrumb li + li::before {
  content: '/';
  color: var(--color-text-light);
  margin-right: var(--space-xs);
  opacity: 0.5;
}
.breadcrumb a {
  color: var(--color-accent);
  text-decoration: none;
  transition: color var(--transition-base);
}
.breadcrumb a:hover { color: var(--color-primary); }
.breadcrumb [aria-current="page"] { color: var(--color-text); font-weight: 600; }

/* ── Story Split Section ──────────────────────────────────────── */
.story-section {
  padding: var(--section-pad);
  background: var(--color-bg);
}
.story-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: center;
}
.story-text .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.story-text h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  line-height: 1.15;
  letter-spacing: -0.02em;
  text-wrap: balance;
  color: var(--color-primary);
  margin-bottom: var(--space-lg);
}
.story-text h2 .text-accent {
  color: var(--color-accent);
}
.story-text p.prose {
  max-width: 65ch;
  line-height: 1.75;
  color: var(--color-text);
  margin-bottom: var(--space-md);
  font-size: 1.02rem;
}
.story-img-wrap {
  position: relative;
}
.story-img-frame {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  aspect-ratio: 4 / 5;
  box-shadow: var(--shadow-xl);
}
.story-img-frame img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform var(--transition-slow);
}
.story-img-frame:hover img { transform: scale(1.04); }
.story-img-overlay {
  position: absolute;
  bottom: var(--space-lg);
  left: calc(-1 * var(--space-xl));
  background: var(--color-primary);
  color: var(--color-white);
  border-radius: var(--radius-md);
  padding: var(--space-md) var(--space-lg);
  box-shadow: var(--shadow-lg);
  min-width: 180px;
  z-index: 2;
}
.story-img-overlay .stat-num {
  font-family: var(--font-heading);
  font-size: clamp(2.2rem, 4vw, 3rem);
  font-weight: 800;
  color: var(--color-accent);
  line-height: 1;
  display: block;
}
.story-img-overlay .stat-label {
  font-size: 0.8rem;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  opacity: 0.82;
  margin-top: var(--space-xs);
  display: block;
}
.story-img-badge {
  position: absolute;
  top: var(--space-lg);
  right: calc(-1 * var(--space-lg));
  background: var(--color-accent);
  color: var(--color-primary);
  border-radius: 50%;
  width: 88px;
  height: 88px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  box-shadow: var(--shadow-md);
  font-family: var(--font-heading);
  font-weight: 800;
  text-align: center;
  line-height: 1.1;
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.04em;
  z-index: 2;
}
.story-img-badge strong {
  font-size: 1.6rem;
  display: block;
  line-height: 1;
}

/* ── Stats Full-Bleed Section ─────────────────────────────────── */
.stats-section {
  padding: var(--section-pad);
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
  clip-path: polygon(0 6%, 100% 0, 100% 94%, 0 100%);
  margin: -40px 0;
  padding-top: calc(var(--space-4xl) + 40px);
  padding-bottom: calc(var(--space-4xl) + 40px);
}
.stats-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse 70% 60% at 30% 50%, rgba(var(--color-accent-rgb), 0.08) 0%, transparent 70%);
  pointer-events: none;
}
.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-xl);
  text-align: center;
}
.stat-card {
  position: relative;
  padding: var(--space-xl) var(--space-lg);
  border-radius: var(--radius-lg);
  background: rgba(255,255,255,0.04);
  border: 1px solid rgba(255,255,255,0.08);
  transition: background var(--transition-base), transform var(--transition-base);
}
.stat-card:hover {
  background: rgba(255,255,255,0.07);
  transform: translateY(-4px);
}
.stat-card-num {
  font-family: var(--font-heading);
  font-size: clamp(3rem, 6vw, 4.8rem);
  font-weight: 800;
  line-height: 1;
  color: var(--color-accent);
  letter-spacing: -0.03em;
  display: block;
  margin-bottom: var(--space-sm);
}
.stat-card-label {
  font-size: 0.88rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: rgba(255,255,255,0.65);
}
.stat-card-desc {
  font-size: 0.82rem;
  color: rgba(255,255,255,0.4);
  margin-top: var(--space-xs);
  line-height: 1.5;
}
.stats-section .section-heading-group {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.stats-section .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.stats-section h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.02em;
}

/* ── Differentiators Cards Section ───────────────────────────── */
.diff-section {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
.diff-section .section-heading-group {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.diff-section .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.diff-section h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-sm);
}
.diff-section .section-sub {
  max-width: 55ch;
  margin: 0 auto;
  color: var(--color-text-light);
  line-height: 1.65;
  font-size: 1.02rem;
}
.diff-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-lg);
}
.diff-card {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  box-shadow: var(--shadow-sm);
  border: 1px solid var(--color-gray-light);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  display: flex;
  gap: var(--space-lg);
  align-items: flex-start;
}
.diff-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}
.diff-card-icon {
  flex-shrink: 0;
  width: 52px;
  height: 52px;
  border-radius: var(--radius-md);
  background: linear-gradient(135deg, rgba(var(--color-accent-rgb), 0.12), rgba(var(--color-primary-rgb), 0.06));
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}
.diff-card-icon svg {
  width: 24px;
  height: 24px;
  stroke: var(--color-accent);
  fill: none;
}
.diff-card-body h3 {
  font-family: var(--font-heading);
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--color-primary);
  text-wrap: balance;
  margin-bottom: var(--space-sm);
  letter-spacing: -0.01em;
}
.diff-card-body p {
  font-size: 0.95rem;
  color: var(--color-text-light);
  line-height: 1.65;
  max-width: 42ch;
}

/* ── Mid-Page CTA Banner ──────────────────────────────────────── */
.about-cta-banner {
  position: relative;
  padding: var(--space-4xl) var(--space-lg);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  overflow: hidden;
  text-align: center;
}
.about-cta-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.05;
  pointer-events: none;
}
.about-cta-banner::after {
  content: '';
  position: absolute;
  top: -50%;
  right: -10%;
  width: 500px;
  height: 500px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(var(--color-accent-rgb), 0.12) 0%, transparent 70%);
  pointer-events: none;
}
.about-cta-banner .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-md);
}
.about-cta-banner h2 {
  position: relative;
  z-index: 1;
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.8rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-md);
}
.about-cta-banner p {
  position: relative;
  z-index: 1;
  color: rgba(255,255,255,0.8);
  max-width: 50ch;
  margin: 0 auto var(--space-xl);
  line-height: 1.65;
  font-size: 1.05rem;
}
.about-cta-banner .btn-cta-group {
  position: relative;
  z-index: 1;
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}
.btn-cta-primary {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: var(--color-accent);
  color: var(--color-primary);
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  padding: var(--space-md) var(--space-xl);
  border-radius: var(--radius-md);
  box-shadow: 0 4px 0 rgba(var(--color-primary-dark-rgb), 0.4);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  text-decoration: none;
}
.btn-cta-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 0 rgba(var(--color-primary-dark-rgb), 0.4);
}
.btn-cta-primary:active {
  transform: translateY(2px);
  box-shadow: 0 2px 0 rgba(var(--color-primary-dark-rgb), 0.4);
}
.btn-cta-secondary {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: transparent;
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  padding: var(--space-md) var(--space-xl);
  border-radius: var(--radius-md);
  border: 2px solid rgba(255,255,255,0.35);
  transition: border-color var(--transition-base), background var(--transition-base);
  text-decoration: none;
}
.btn-cta-secondary:hover {
  border-color: rgba(255,255,255,0.7);
  background: rgba(255,255,255,0.06);
}

/* ── Process / Approach Section ──────────────────────────────── */
.process-section {
  padding: var(--section-pad);
  background: var(--color-bg);
}
.process-section .section-heading-group {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.process-section .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.process-section h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
  letter-spacing: -0.02em;
}
.process-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-lg);
  position: relative;
}
.process-steps::before {
  content: '';
  position: absolute;
  top: 28px;
  left: 8%;
  right: 8%;
  height: 2px;
  background: linear-gradient(90deg, var(--color-accent), rgba(var(--color-accent-rgb), 0.2));
  z-index: 0;
}
.process-step {
  position: relative;
  z-index: 1;
  background: var(--color-bg);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg) var(--space-lg);
  text-align: center;
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.process-step:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-md);
}
.process-step-num {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: var(--color-primary);
  color: var(--color-accent);
  font-family: var(--font-heading);
  font-size: 1.4rem;
  font-weight: 800;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-lg);
  box-shadow: 0 0 0 4px var(--color-bg), 0 0 0 6px rgba(var(--color-accent-rgb), 0.25);
}
.process-step h3 {
  font-family: var(--font-heading);
  font-size: 1.15rem;
  font-weight: 700;
  color: var(--color-primary);
  text-wrap: balance;
  margin-bottom: var(--space-sm);
}
.process-step p {
  font-size: 0.9rem;
  color: var(--color-text-light);
  line-height: 1.65;
}

/* ── Service Areas Section ───────────────────────────────────── */
.areas-section {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
.areas-section .section-heading-group {
  margin-bottom: var(--space-2xl);
}
.areas-section .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.areas-section h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-sm);
}
.areas-split {
  display: grid;
  grid-template-columns: 1.2fr 1fr;
  gap: var(--space-3xl);
  align-items: start;
}
.areas-copy p.prose {
  max-width: 55ch;
  line-height: 1.75;
  color: var(--color-text);
  margin-bottom: var(--space-lg);
}
.areas-list {
  list-style: none;
  padding: 0;
  margin: var(--space-lg) 0 0;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-sm) var(--space-lg);
}
.areas-list li {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: 0.95rem;
  color: var(--color-text);
  font-weight: 500;
}
.areas-list li::before {
  content: '';
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--color-accent);
  flex-shrink: 0;
}
.areas-img-stack {
  position: relative;
}
.areas-img-primary {
  border-radius: var(--radius-lg);
  overflow: hidden;
  aspect-ratio: 4 / 3;
  box-shadow: var(--shadow-lg);
}
.areas-img-primary img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.areas-img-secondary {
  position: absolute;
  bottom: calc(-1 * var(--space-xl));
  left: calc(-1 * var(--space-xl));
  width: 55%;
  border-radius: var(--radius-md);
  overflow: hidden;
  aspect-ratio: 1;
  box-shadow: var(--shadow-xl);
  border: 4px solid var(--color-bg-alt);
}
.areas-img-secondary img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* ── Testimonials Section ─────────────────────────────────────── */
.testimonials-section {
  padding: var(--section-pad);
  background: var(--color-bg);
}
.testimonials-section .section-heading-group {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.testimonials-section .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.testimonials-section h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
  letter-spacing: -0.02em;
}
.testimonials-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
}
.testimonial-card {
  background: var(--color-bg-alt);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  position: relative;
  border: 1px solid var(--color-gray-light);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.testimonial-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-md);
}
.testimonial-card::before {
  content: '\201C';
  position: absolute;
  top: var(--space-md);
  right: var(--space-lg);
  font-size: 5rem;
  line-height: 1;
  color: rgba(var(--color-accent-rgb), 0.12);
  font-family: Georgia, serif;
}
.testimonial-stars {
  display: flex;
  gap: 3px;
  margin-bottom: var(--space-md);
}
.testimonial-stars svg {
  width: 16px;
  height: 16px;
  fill: var(--color-star, #f59e0b);
  stroke: var(--color-star, #f59e0b);
}
.testimonial-text {
  font-size: 0.96rem;
  line-height: 1.7;
  color: var(--color-text);
  margin-bottom: var(--space-lg);
  font-style: italic;
}
.testimonial-author {
  font-weight: 700;
  font-size: 0.9rem;
  color: var(--color-primary);
}
.testimonial-location {
  font-size: 0.82rem;
  color: var(--color-text-light);
}
.testimonial-source {
  display: inline-block;
  font-size: 0.72rem;
  color: var(--color-accent);
  font-weight: 600;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  margin-top: var(--space-xs);
}

/* ── FAQ Section ──────────────────────────────────────────────── */
.faq-section {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
.faq-section .section-heading-group {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.faq-section .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.faq-section h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
  letter-spacing: -0.02em;
}
.faq-list {
  max-width: 780px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.faq-item {
  background: var(--color-bg);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-md);
  overflow: hidden;
}
.faq-question {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: var(--space-lg) var(--space-xl);
  cursor: pointer;
  font-family: var(--font-heading);
  font-size: 1.08rem;
  font-weight: 700;
  color: var(--color-primary);
  transition: color var(--transition-base);
  list-style: none;
  gap: var(--space-lg);
}
.faq-question:hover { color: var(--color-accent); }
.faq-question::after {
  content: '+';
  flex-shrink: 0;
  font-size: 1.4rem;
  color: var(--color-accent);
  font-weight: 400;
  transition: transform var(--transition-base);
}
details[open] .faq-question::after {
  transform: rotate(45deg);
}
.faq-answer {
  padding: 0 var(--space-xl) var(--space-lg);
  font-size: 0.96rem;
  color: var(--color-text-light);
  line-height: 1.7;
  max-width: 65ch;
}

/* ── Closing CTA Section ──────────────────────────────────────── */
.closing-cta-section {
  padding: var(--section-pad);
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
  text-align: center;
  clip-path: polygon(0 5%, 100% 0, 100% 100%, 0 100%);
  padding-top: calc(var(--space-4xl) + 40px);
}
.closing-cta-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse 60% 70% at 70% 50%, rgba(var(--color-accent-rgb), 0.07) 0%, transparent 70%);
  pointer-events: none;
}
.closing-cta-section .eyebrow-label {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: var(--space-md);
  position: relative;
  z-index: 1;
}
.closing-cta-section h2 {
  position: relative;
  z-index: 1;
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.8rem);
  font-weight: 800;
  color: var(--color-white);
  text-wrap: balance;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-md);
}
.closing-cta-section p {
  position: relative;
  z-index: 1;
  color: rgba(255,255,255,0.75);
  max-width: 50ch;
  margin: 0 auto var(--space-xl);
  line-height: 1.65;
}
.closing-cta-section .btn-group {
  position: relative;
  z-index: 1;
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── Responsive ───────────────────────────────────────────────── */
@media (max-width: 1023px) {
  .story-split { grid-template-columns: 1fr; gap: var(--space-2xl); }
  .story-img-wrap { order: -1; }
  .story-img-overlay { left: var(--space-lg); }
  .story-img-badge { right: var(--space-md); }
  .stats-grid { grid-template-columns: repeat(2, 1fr); }
  .diff-grid { grid-template-columns: 1fr; }
  .process-steps { grid-template-columns: repeat(2, 1fr); }
  .process-steps::before { display: none; }
  .areas-split { grid-template-columns: 1fr; }
  .areas-img-stack { margin-bottom: var(--space-2xl); }
  .testimonials-grid { grid-template-columns: 1fr; }
}
@media (max-width: 767px) {
  .stats-grid { grid-template-columns: repeat(2, 1fr); gap: var(--space-md); }
  .process-steps { grid-template-columns: 1fr; }
  .areas-list { grid-template-columns: 1fr; }
  .about-hero { min-height: 70vh; }
  .stats-section { clip-path: none; margin: 0; padding: var(--section-pad-mobile); }
  .closing-cta-section { clip-path: none; padding: var(--section-pad-mobile); }
  .about-cta-banner { padding: var(--space-3xl) var(--space-md); }
}
</style>

<!-- ═══════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════ -->
<section class="about-hero" aria-label="About Gray Tile and Remodeling hero">
  <div class="about-hero-content container">
    <h1 data-animate="fade-up">Expert Tile Craftsmen Serving<br>West Georgia Since <?php echo $yearEstablished; ?></h1>
    <p class="about-hero-sub" data-animate="fade-up">
      Founded in Bowdon, GA, and built on a foundation of precision tile work — we've spent 25 years turning bathrooms, kitchens, and living spaces throughout Carroll County into homes people love.
    </p>
    <div class="about-hero-badges" data-animate="fade-up">
      <span class="about-hero-badge">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
        Licensed &amp; Insured
      </span>
      <span class="about-hero-badge">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        Since <?php echo $yearEstablished; ?>
      </span>
      <span class="about-hero-badge">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1-2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"/><circle cx="12" cy="11" r="3"/></svg>
        Bowdon, GA 30108
      </span>
      <span class="about-hero-badge">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
        Free Estimates
      </span>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     BREADCRUMB
═══════════════════════════════════════════════════════════ -->
<nav class="breadcrumb-bar" aria-label="Breadcrumb navigation">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li><span aria-current="page">About</span></li>
    </ol>
  </div>
</nav>

<!-- ═══════════════════════════════════════════════════════════
     COMPANY STORY — Split Layout (signature section)
═══════════════════════════════════════════════════════════ -->
<section class="story-section" aria-labelledby="story-heading">
  <div class="container">
    <div class="story-split">

      <!-- Text Left -->
      <div class="story-text" data-animate="fade-up">
        <span class="eyebrow-label">Our Story</span>
        <h2 id="story-heading">Built From the Ground Up<br>in <span class="text-accent">Bowdon, Georgia</span></h2>

        <p class="prose">
          Gray Tile &amp; Remodeling was established in <?php echo $yearEstablished; ?> right here in Bowdon — a small Carroll County town with older housing stock, tight-knit neighborhoods, and homeowners who take pride in how their homes look and feel. From the start, our focus was tile: a discipline that demands patience, precision, and a genuine understanding of how water moves through a home. General contractors skip past it. We built our entire business around it.
        </p>
        <p class="prose">
          Georgia's humidity is no small thing. Summers in West Georgia average 70% relative humidity, and improperly installed tile — weak grout joints, missing moisture barriers, incorrect setting materials — can fail within a few years. We've spent two and a half decades learning exactly which products hold up in this climate, which substrates require extra waterproofing, and where moisture intrusion is most likely to begin in Carroll County home construction. That knowledge doesn't come from a manufacturer's guide. It comes from 25 years on the job locally.
        </p>
        <p class="prose">
          Beyond tile, we've grown into a full-service remodeling company. Kitchens, bathrooms, basements, attic conversions, room additions — we handle the whole project because we've found that the best results come from a single accountable team that sees the job through from design to the last grout line being sealed.
        </p>
        <a href="/contact/" class="btn-cta-primary" style="display:inline-flex;margin-top:var(--space-lg);">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
          Get Your Free Estimate
        </a>
      </div>

      <!-- Photo Right — overlapping composition -->
      <div class="story-img-wrap" data-animate="fade-up">
        <div class="story-img-frame">
          <picture>
            <source srcset="<?php echo htmlspecialchars($clientPhotos['photo13']); ?>" type="image/jpeg">
            <img
              src="<?php echo htmlspecialchars($clientPhotos['photo13']); ?>"
              alt="Gray Tile & Remodeling craftsman installing precision tile in a Bowdon GA bathroom"
              width="600" height="750"
              loading="lazy">
          </picture>
        </div>
        <!-- Floating stat overlay — overlaps image edge -->
        <div class="story-img-overlay">
          <span class="stat-num"><?php echo $yearsInBusiness; ?></span>
          <span class="stat-label">Years in West Georgia</span>
        </div>
        <!-- Circle badge overlapping top-right -->
        <div class="story-img-badge" aria-hidden="true">
          <strong>500+</strong>
          Projects<br>Completed
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     STATS — Full-Bleed Dark
═══════════════════════════════════════════════════════════ -->
<section class="stats-section" aria-labelledby="stats-heading">
  <div class="container">
    <div class="section-heading-group" data-animate="fade-up">
      <span class="eyebrow-label">By the Numbers</span>
      <h2 id="stats-heading">25 Years of Results in Carroll County</h2>
    </div>
    <div class="stats-grid">
      <div class="stat-card" data-animate="fade-up">
        <span class="stat-card-num"><?php echo $yearsInBusiness; ?></span>
        <span class="stat-card-label">Years in Business</span>
        <p class="stat-card-desc">Continuously serving West Georgia since <?php echo $yearEstablished; ?></p>
      </div>
      <div class="stat-card" data-animate="fade-up">
        <span class="stat-card-num">500+</span>
        <span class="stat-card-label">Projects Completed</span>
        <p class="stat-card-desc">Kitchens, baths, floors, and full remodels across Carroll County</p>
      </div>
      <div class="stat-card" data-animate="fade-up">
        <span class="stat-card-num">10+</span>
        <span class="stat-card-label">Communities Served</span>
        <p class="stat-card-desc">Bowdon, Carrollton, Villa Rica, Bremen, Temple &amp; beyond</p>
      </div>
      <div class="stat-card" data-animate="fade-up">
        <span class="stat-card-num">100%</span>
        <span class="stat-card-label">Licensed &amp; Insured</span>
        <p class="stat-card-desc">Every project backed by full licensing and general liability coverage</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     DIFFERENTIATORS — 4-Card Grid
═══════════════════════════════════════════════════════════ -->
<section class="diff-section" aria-labelledby="diff-heading">
  <div class="container">
    <div class="section-heading-group" data-animate="fade-up">
      <span class="eyebrow-label">What Sets Us Apart</span>
      <h2 id="diff-heading">Why Carroll County Homeowners<br>Choose Gray Tile</h2>
      <p class="section-sub prose-centered">Four things that separate precision craftsmanship from a standard remodeling bid.</p>
    </div>

    <div class="diff-grid">
      <!-- Card 1 -->
      <div class="diff-card" data-animate="fade-up">
        <div class="diff-card-icon" aria-hidden="true">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
        </div>
        <div class="diff-card-body">
          <h3>Specialized Tile Expertise</h3>
          <p class="prose">Most general contractors subcontract tile work to whoever is available. Our company was built on tile — ceramic, porcelain, natural stone, glass, and specialty formats — and every installer has worked under our supervision for years. That depth shows in the details: consistent grout lines, properly pitched shower floors, and surfaces that hold up for decades.</p>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="diff-card" data-animate="fade-up">
        <div class="diff-card-icon" aria-hidden="true">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg>
        </div>
        <div class="diff-card-body">
          <h3>Georgia Climate Knowledge</h3>
          <p class="prose">Carroll County's hot, humid summers accelerate moisture-related failures in poorly installed tile. We specify waterproofing membranes, humidity-tolerant grout formulations, and setting materials designed for the southeast. The result is tile that doesn't shift, crack, or grow mold after the first heavy Georgia summer.</p>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="diff-card" data-animate="fade-up">
        <div class="diff-card-icon" aria-hidden="true">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
        </div>
        <div class="diff-card-body">
          <h3>Design Consultation &amp; Visualization</h3>
          <p class="prose">We walk every client through material selection, layout options, and pattern combinations before a single tile is cut. You'll understand exactly what your finished space will look like — including grout color, trim pieces, and accent placements — so there are no surprises when the last line is set.</p>
        </div>
      </div>
      <!-- Card 4 -->
      <div class="diff-card" data-animate="fade-up">
        <div class="diff-card-icon" aria-hidden="true">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
        </div>
        <div class="diff-card-body">
          <h3>Craftsmanship Warranty</h3>
          <p class="prose">We stand behind every installation. If tile shifts, grout fails, or a waterproofing issue appears within the warranty period, we come back and make it right at no cost. That commitment is only possible because we do the work ourselves — no subcontractors to track down, no finger-pointing between trades.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     MID-PAGE CTA BANNER (CTA #2)
═══════════════════════════════════════════════════════════ -->
<section class="about-cta-banner" aria-labelledby="mid-cta-heading">
  <div class="container">
    <span class="eyebrow-label" data-animate="fade-up">Ready to Start?</span>
    <h2 id="mid-cta-heading" data-animate="fade-up">Your Carroll County Remodel<br>Starts With a Free Conversation</h2>
    <p data-animate="fade-up">Tell us about your project. We'll walk your space, discuss your goals, and give you a detailed estimate — at no cost and no obligation.</p>
    <div class="btn-cta-group" data-animate="fade-up">
      <a href="/contact/" class="btn-cta-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
        Request Your Free Estimate
      </a>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="btn-cta-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.39 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.59a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <?php echo htmlspecialchars(formatPhone($phone)); ?>
      </a>
      <?php else: ?>
      <a href="/service-area/" class="btn-cta-secondary">See Our Service Area →</a>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     PROCESS — 4-Step Approach
═══════════════════════════════════════════════════════════ -->
<section class="process-section" aria-labelledby="process-heading">
  <div class="container">
    <div class="section-heading-group" data-animate="fade-up">
      <span class="eyebrow-label">How We Work</span>
      <h2 id="process-heading">Our 4-Step Approach to Every Project</h2>
    </div>

    <div class="process-steps">
      <div class="process-step" data-animate="fade-up">
        <div class="process-step-num" aria-hidden="true">1</div>
        <h3>Consultation</h3>
        <p>We visit your home, listen to your goals, and assess the scope honestly. You'll get a clear picture of what's possible, what it costs, and how long it takes — before you commit to anything.</p>
      </div>
      <div class="process-step" data-animate="fade-up">
        <div class="process-step-num" aria-hidden="true">2</div>
        <h3>Design</h3>
        <p>We work through material selection together: tile style, grout color, layout pattern, trim details. Nothing goes on order until you're confident in every choice and we've reviewed the full plan.</p>
      </div>
      <div class="process-step" data-animate="fade-up">
        <div class="process-step-num" aria-hidden="true">3</div>
        <h3>Installation</h3>
        <p>Our crew shows up on schedule and works cleanly. We protect your floors, contain debris, and communicate daily on progress. Every measurement is verified twice before it's cut once.</p>
      </div>
      <div class="process-step" data-animate="fade-up">
        <div class="process-step-num" aria-hidden="true">4</div>
        <h3>Satisfaction Check</h3>
        <p>Before we consider a job done, we walk through the finished space with you line by line. If anything isn't right, we fix it on the spot. Your sign-off is the only milestone that matters.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     SERVICE AREAS
═══════════════════════════════════════════════════════════ -->
<section class="areas-section" aria-labelledby="areas-heading">
  <div class="container">
    <div class="areas-split">
      <div class="areas-copy" data-animate="fade-up">
        <div class="section-heading-group">
          <span class="eyebrow-label">Where We Work</span>
          <h2 id="areas-heading">Serving Carroll County<br>and West Georgia</h2>
        </div>
        <p class="prose">
          Our primary home base is Bowdon, GA — where we've worked on hundreds of homes since <?php echo $yearEstablished; ?>. From there, we serve the full Carroll County region and surrounding West Georgia communities within approximately 50 miles, with no travel surcharge for most primary service areas.
        </p>
        <p class="prose">
          Whether you're in Carrollton's established neighborhoods, a newer development near Villa Rica, or a rural property outside Bremen or Temple, we can assess your project and get work scheduled typically within 2–4 weeks of the estimate.
        </p>
        <ul class="areas-list">
          <li>Bowdon, GA <em style="font-size:0.8rem;color:var(--color-accent);font-weight:600;">(Primary)</em></li>
          <li>Carrollton, GA</li>
          <li>Villa Rica, GA</li>
          <li>Bremen, GA</li>
          <li>Temple, GA</li>
          <li>Whitesburg, GA</li>
          <li>Roopville, GA</li>
          <li>Tallapoosa, GA</li>
          <li>Cedartown, GA</li>
          <li>Dallas, GA</li>
        </ul>
        <a href="/service-area/" class="btn-cta-primary" style="display:inline-flex;margin-top:var(--space-xl);">View Full Service Area →</a>
      </div>

      <!-- Stacked image composition -->
      <div class="areas-img-stack" data-animate="fade-up">
        <div class="areas-img-primary">
          <picture>
            <source srcset="<?php echo htmlspecialchars($clientPhotos['photo14']); ?>" type="image/jpeg">
            <img
              src="<?php echo htmlspecialchars($clientPhotos['photo14']); ?>"
              alt="Tile installation work completed in a Carroll County Georgia home"
              width="600" height="450"
              loading="lazy">
          </picture>
        </div>
        <div class="areas-img-secondary">
          <picture>
            <source srcset="<?php echo htmlspecialchars($clientPhotos['photo15']); ?>" type="image/jpeg">
            <img
              src="<?php echo htmlspecialchars($clientPhotos['photo15']); ?>"
              alt="Custom tile flooring installed in a West Georgia remodeling project"
              width="300" height="300"
              loading="lazy">
          </picture>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     TESTIMONIALS
═══════════════════════════════════════════════════════════ -->
<section class="testimonials-section" aria-labelledby="testimonials-heading">
  <div class="container">
    <div class="section-heading-group" data-animate="fade-up">
      <span class="eyebrow-label">What Homeowners Say</span>
      <h2 id="testimonials-heading">Verified Reviews from Carroll County</h2>
    </div>

    <div class="testimonials-grid">
      <article class="testimonial-card" data-animate="fade-up">
        <div class="testimonial-stars" aria-label="5 out of 5 stars">
          <?php for($i=0;$i<5;$i++): ?>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          <?php endfor; ?>
        </div>
        <p class="testimonial-text">"They redid our master bathroom from top to bottom — tile floors, full shower surround, new flooring in the hallway leading to it. Everything is perfectly level, the grout lines are immaculate, and it held up through two Georgia summers without a single issue. I've recommended them to three neighbors already."</p>
        <div class="testimonial-author">Jennifer T.</div>
        <div class="testimonial-location">Bowdon, GA</div>
        <span class="testimonial-source">Verified Google Review</span>
      </article>

      <article class="testimonial-card" data-animate="fade-up">
        <div class="testimonial-stars" aria-label="5 out of 5 stars">
          <?php for($i=0;$i<5;$i++): ?>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          <?php endfor; ?>
        </div>
        <p class="testimonial-text">"Our kitchen floor had been a mess for years — cracked grout, loose tiles, uneven spots. They came out, assessed it the same week we called, and had a complete plan within a few days. The new porcelain floor looks incredible and they matched the grout to our existing cabinet hardware. Exceptional attention to detail."</p>
        <div class="testimonial-author">Marcus R.</div>
        <div class="testimonial-location">Carrollton, GA</div>
        <span class="testimonial-source">Verified Google Review</span>
      </article>

      <article class="testimonial-card" data-animate="fade-up">
        <div class="testimonial-stars" aria-label="5 out of 5 stars">
          <?php for($i=0;$i<5;$i++): ?>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          <?php endfor; ?>
        </div>
        <p class="testimonial-text">"We used Gray Tile for our basement finishing project — custom tile bar area, bathroom tile, and LVP flooring throughout. They coordinated everything and kept to the schedule. What I appreciated most was that they flagged a moisture issue behind the original subfloor before laying anything, which saved us a much bigger problem down the road."</p>
        <div class="testimonial-author">Donna &amp; Paul S.</div>
        <div class="testimonial-location">Villa Rica, GA</div>
        <span class="testimonial-source">Verified Google Review</span>
      </article>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     FAQ
═══════════════════════════════════════════════════════════ -->
<section class="faq-section" aria-labelledby="faq-heading">
  <div class="container">
    <div class="section-heading-group" data-animate="fade-up">
      <span class="eyebrow-label">Common Questions</span>
      <h2 id="faq-heading">About Gray Tile &amp; Remodeling</h2>
    </div>

    <div class="faq-list" data-animate="fade-up">
      <?php foreach ($aboutFaqs as $faq): ?>
      <details class="faq-item">
        <summary class="faq-question"><?php echo htmlspecialchars($faq['q']); ?></summary>
        <div class="faq-answer">
          <p><?php echo htmlspecialchars($faq['a']); ?></p>
        </div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     CLOSING CTA (CTA #3)
═══════════════════════════════════════════════════════════ -->
<section class="closing-cta-section" aria-labelledby="closing-cta-heading">
  <div class="container">
    <span class="eyebrow-label" data-animate="fade-up">Start Your Project</span>
    <h2 id="closing-cta-heading" data-animate="fade-up">25 Years of Craftsmanship.<br>Your Home Is Next.</h2>
    <p data-animate="fade-up">Free estimates, no pressure, no obligation. We serve Bowdon, Carrollton, Villa Rica, Bremen, Temple, and communities throughout Carroll County.</p>
    <div class="btn-group" data-animate="fade-up">
      <a href="/contact/" class="btn-cta-primary">Get a Free Estimate</a>
      <a href="/services/" class="btn-cta-secondary">Browse Our Services →</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
