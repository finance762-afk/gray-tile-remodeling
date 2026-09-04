<?php
/**
 * Estimate form partial (v6.3, 2026-09-04) — posts to the Page One leads endpoint.
 * Include with:
 *   $efPrefix   = 'hero' | 'band' | 'dlg' | 'contact'   (id prefix, unique per page)
 *   $efLocation = 'hero' | 'cta-band' | 'dialog' | 'contact' (form id reported with the lead)
 *   $efCompact  = true  → name / phone + email / service + one consent line
 *                 false → adds city + project details + the three unbundled consents
 */
$efPrefix   = $efPrefix   ?? 'ef';
$efLocation = $efLocation ?? 'inline';
$efCompact  = $efCompact  ?? true;
$efServices = [
  'Kitchen Remodeling', 'Bathroom Remodeling', 'Custom Tile Showers', 'Tile Installation', 'Flooring Installation',
  'Basement Finishing', 'Room Additions', 'Full Home Remodel', 'Design-Build Remodeling',
  'Other' => 'Something else — tell us about it',
];
$__ft_ts = (string) time();
?>
<form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="estimate-form<?php echo $efCompact ? ' estimate-form--compact' : ''; ?>">
  <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you/">
  <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
  <input type="hidden" name="form_location" value="<?php echo htmlspecialchars($efLocation); ?>">
  <?php echo p1_attribution_fields($efLocation); ?>

  <div class="ef-row">
    <label class="sr-only" for="<?php echo $efPrefix; ?>-name">Your name</label>
    <input id="<?php echo $efPrefix; ?>-name" type="text" name="name" placeholder="Your name" autocomplete="name" required>
  </div>
  <div class="ef-row ef-row--split">
    <div>
      <label class="sr-only" for="<?php echo $efPrefix; ?>-phone">Phone</label>
      <input id="<?php echo $efPrefix; ?>-phone" type="tel" name="phone" placeholder="Phone" autocomplete="tel" required>
    </div>
    <div>
      <label class="sr-only" for="<?php echo $efPrefix; ?>-email">Email</label>
      <input id="<?php echo $efPrefix; ?>-email" type="email" name="email" placeholder="Email" autocomplete="email" required>
    </div>
  </div>
  <?php if (!$efCompact): ?>
  <div class="ef-row">
    <label class="sr-only" for="<?php echo $efPrefix; ?>-city">City</label>
    <input id="<?php echo $efPrefix; ?>-city" type="text" name="city" placeholder="City / project location" autocomplete="address-level2">
  </div>
  <?php endif; ?>
  <div class="ef-row ef-row--select">
    <label class="sr-only" for="<?php echo $efPrefix; ?>-service">Service needed</label>
    <select id="<?php echo $efPrefix; ?>-service" name="service" required>
      <option value="">What do you need?</option>
      <?php foreach ($efServices as $k => $v): $val = is_int($k) ? $v : $k; ?>
      <option value="<?php echo htmlspecialchars($val); ?>"><?php echo htmlspecialchars($v); ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <?php if (!$efCompact): ?>
  <div class="ef-row">
    <label class="sr-only" for="<?php echo $efPrefix; ?>-message">Project details</label>
    <textarea id="<?php echo $efPrefix; ?>-message" name="message" rows="3" placeholder="Project details — rooms, tile or flooring you have in mind, timing"></textarea>
  </div>
  <?php endif; ?>

  <!-- spam shield: signed render timestamp + JS interaction signal -->
  <input type="hidden" name="_ft" value="<?php echo $__ft_ts . '.' . hash_hmac('sha256', $__ft_ts, $leadsFormSecret); ?>">
  <input type="hidden" name="_js" value="" class="js-shield-field">
  <?php if (empty($GLOBALS['__js_shield'])) { $GLOBALS['__js_shield'] = 1; ?>
  <script>(function(){var d=document,f=function(){var i,e=d.querySelectorAll('.js-shield-field');for(i=0;i<e.length;i++)e[i].value='1';d.removeEventListener('pointerdown',f);d.removeEventListener('keydown',f);};d.addEventListener('pointerdown',f);d.addEventListener('keydown',f);})();</script>
  <?php } ?>

  <!-- TCPA 2025/2026 consent — terms_accepted is REQUIRED by the leads endpoint; links open in a new tab so the form isn't lost -->
  <?php if ($efCompact): ?>
  <label class="ef-consent">
    <input type="checkbox" name="terms_accepted" value="yes" required>
    <span>I agree to the <a href="/terms/" target="_blank" rel="noopener">Terms</a> and <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a> and consent to be contacted about my estimate. *</span>
  </label>
  <?php else: ?>
  <fieldset class="ef-consent-set">
    <legend class="ef-consent-legend">Communication Consent</legend>
    <label class="ef-consent">
      <input type="checkbox" name="email_opt_in" value="yes">
      <span><strong>Email updates (optional):</strong> I agree to receive emails from <?php echo htmlspecialchars($siteName); ?> about my inquiry, services, and promotions. I can unsubscribe at any time.</span>
    </label>
    <label class="ef-consent">
      <input type="checkbox" name="sms_opt_in" value="yes">
      <span><strong>SMS/Text messages (optional):</strong> I agree to receive text messages from <?php echo htmlspecialchars($siteName); ?> at the number provided (appointment reminders, service updates, offers). Message frequency varies. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help. <strong>Consent is not a condition of purchase.</strong></span>
    </label>
    <label class="ef-consent">
      <input type="checkbox" name="terms_accepted" value="yes" required>
      <span>I have read and agree to the <a href="/terms/" target="_blank" rel="noopener">Terms of Service</a> and <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a> *</span>
    </label>
  </fieldset>
  <?php endif; ?>
  <input type="hidden" name="_consent_version" value="v2.1">
  <input type="hidden" name="_consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'] ?? ''); ?>">

  <button type="submit" class="btn btn-accent btn-block">
    <?php echo p1_icon('send', 18); ?> Get My Free Estimate
  </button>
  <p class="ef-footnote">No obligation. We reply within one business day.</p>
</form>
