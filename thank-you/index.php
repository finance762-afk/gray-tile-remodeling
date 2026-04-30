<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$pageTitle       = 'Request Received | Gray Tile & Remodeling';
$pageDescription = 'Thank you for contacting Gray Tile & Remodeling. We have received your request and will be in touch shortly.';
$canonicalUrl    = $siteUrl . '/thank-you/';
$currentPage     = 'home';
$noindex         = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ── Thank-You Page Styles ───────────────────────── */

.thankyou-page {
  min-height: calc(100vh - var(--navbar-height));
  display: flex;
  align-items: center;
  justify-content: center;
  padding: var(--space-4xl) var(--space-lg);
  background: var(--color-bg);
  position: relative;
  overflow: hidden;
}

.thankyou-page::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(
    ellipse 70% 55% at 50% 0%,
    rgba(var(--color-accent-rgb), 0.07) 0%,
    transparent 70%
  );
  pointer-events: none;
}

.thankyou-page::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--color-primary) 0%, var(--color-accent) 100%);
}

.thankyou-inner {
  text-align: center;
  max-width: 620px;
  margin-inline: auto;
  position: relative;
  z-index: 1;
}

.thankyou-icon {
  width: 80px;
  height: 80px;
  margin-inline: auto;
  margin-bottom: var(--space-lg);
  background: linear-gradient(135deg, rgba(var(--color-accent-rgb), 0.12) 0%, rgba(var(--color-accent-rgb), 0.06) 100%);
  border: 2px solid rgba(var(--color-accent-rgb), 0.3);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}

.thankyou-icon svg {
  width: 40px;
  height: 40px;
}

.thankyou-page h1 {
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 4.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-primary);
  line-height: 1.15;
  letter-spacing: -0.02em;
  text-wrap: balance;
  margin-bottom: var(--space-md);
}

.thankyou-page .lead {
  font-family: var(--font-body);
  font-size: 1.05rem;
  line-height: 1.65;
  color: var(--color-text-light);
  max-width: 50ch;
  margin-inline: auto;
  margin-bottom: var(--space-2xl);
}

.thankyou-divider {
  width: 48px;
  height: 3px;
  background: var(--color-accent);
  border-radius: 2px;
  margin: 0 auto var(--space-2xl);
}

/* Next steps */
.next-steps {
  background: var(--color-bg-alt);
  border: 1px solid var(--color-gray-light);
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg);
  margin-bottom: var(--space-2xl);
  text-align: left;
}

.next-steps h2 {
  font-family: var(--font-heading);
  font-size: 1.2rem;
  font-weight: 700;
  color: var(--color-primary);
  text-wrap: balance;
  margin-bottom: var(--space-lg);
  text-align: center;
  letter-spacing: 0.02em;
  text-transform: uppercase;
}

.next-steps-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}

.next-step {
  display: flex;
  gap: var(--space-md);
  align-items: flex-start;
}

.next-step__number {
  flex-shrink: 0;
  width: 36px;
  height: 36px;
  background: var(--color-primary);
  color: var(--color-white);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--font-heading);
  font-size: 0.95rem;
  font-weight: 700;
  line-height: 1;
}

.next-step__text {
  padding-top: 6px;
}

.next-step__text strong {
  display: block;
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 2px;
}

.next-step__text span {
  font-family: var(--font-body);
  font-size: 0.9rem;
  line-height: 1.55;
  color: var(--color-text-light);
}

/* CTA buttons */
.thankyou-ctas {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

.thankyou-btn-primary {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  padding: 13px var(--space-xl);
  background: var(--color-primary);
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  border-radius: var(--radius-md);
  text-decoration: none;
  box-shadow: 0 4px 0 var(--color-primary-dark), var(--shadow-md);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  overflow: hidden;
}

.thankyou-btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 0 var(--color-primary-dark), var(--shadow-lg);
  color: var(--color-white);
}

.thankyou-btn-primary:active {
  transform: translateY(2px);
  box-shadow: 0 2px 0 var(--color-primary-dark);
}

.thankyou-btn-secondary {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  padding: 13px var(--space-xl);
  background: transparent;
  color: var(--color-primary);
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  border-radius: var(--radius-md);
  border: 2px solid var(--color-primary);
  text-decoration: none;
  transition: background var(--transition-base), color var(--transition-base), transform var(--transition-base);
}

.thankyou-btn-secondary:hover {
  background: var(--color-primary);
  color: var(--color-white);
  transform: translateY(-2px);
}
</style>

<section class="thankyou-page" aria-labelledby="thankyou-heading">
  <div class="thankyou-inner">

    <div class="thankyou-icon" aria-hidden="true">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
        <polyline points="22 4 12 14.01 9 11.01"/>
      </svg>
    </div>

    <h1 id="thankyou-heading">Your Estimate Request Was Received!</h1>
    <p class="lead">Thank you for reaching out to Gray Tile &amp; Remodeling. Our team reviews every request the same business day.</p>

    <div class="thankyou-divider" aria-hidden="true"></div>

    <div class="next-steps" role="region" aria-label="What happens next">
      <h2>What Happens Next</h2>
      <ol class="next-steps-list">
        <li class="next-step">
          <span class="next-step__number" aria-hidden="true">1</span>
          <div class="next-step__text">
            <strong>We review your project details</strong>
            <span>Your request goes directly to our team in Bowdon — no call centers, no delays.</span>
          </div>
        </li>
        <li class="next-step">
          <span class="next-step__number" aria-hidden="true">2</span>
          <div class="next-step__text">
            <strong>A team member contacts you within 1 business day</strong>
            <span>We'll reach out to confirm your project scope and answer any questions you have.</span>
          </div>
        </li>
        <li class="next-step">
          <span class="next-step__number" aria-hidden="true">3</span>
          <div class="next-step__text">
            <strong>We schedule your free in-person estimate</strong>
            <span>We visit your home, assess the space, and provide a detailed written estimate — no obligation.</span>
          </div>
        </li>
      </ol>
    </div>

    <div class="thankyou-ctas">
      <a href="/services/" class="thankyou-btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
        Explore Our Services
      </a>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone); ?>" class="thankyou-btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.39 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.59a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        Call Us Now
      </a>
      <?php endif; ?>
    </div>

  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
