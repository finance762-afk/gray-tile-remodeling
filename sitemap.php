<?php
/**
 * sitemap.php — dynamic XML sitemap (v6.3). /sitemap.xml rewrites here (see .htaccess).
 * Enumerates the page registry from config.php at request time — never a static sitemap file.
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
header('Content-Type: application/xml; charset=UTF-8');
$root = $_SERVER['DOCUMENT_ROOT'];
$mod  = function (string $rel) use ($root): string { $f = $root . '/' . ltrim($rel, '/') . 'index.php'; return date('Y-m-d', is_file($f) ? filemtime($f) : time()); };
$urls = [['/', 'weekly', '1.0'], ['/services/', 'monthly', '0.9'], ['/about/', 'monthly', '0.7'], ['/service-area/', 'monthly', '0.7'], ['/contact/', 'monthly', '0.7']];
foreach ($serviceGroups as $g) { $urls[] = ['/services/' . $g['slug'] . '/', 'monthly', '0.8']; }
foreach ($services as $svc) { $urls[] = ['/services/' . $svc['slug'] . '/', 'monthly', '0.8']; }
foreach (['/privacy-policy/', '/terms/', '/cookie-policy/', '/accessibility/'] as $legal) { $urls[] = [$legal, 'yearly', '0.3']; }
$seen = [];
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
foreach ($urls as [$path, $freq, $prio]) {
    if (isset($seen[$path]) || !is_file($root . $path . 'index.php')) continue;
    $seen[$path] = true;
    echo "  <url>\n    <loc>" . htmlspecialchars($siteUrl . $path) . "</loc>\n    <lastmod>" . $mod($path) . "</lastmod>\n    <changefreq>{$freq}</changefreq>\n    <priority>{$prio}</priority>\n";
    if ($path === '/') {
        foreach (['kitchen-remodel' => 'Kitchen remodel in Bowdon, GA', 'project-07' => 'Walk-in tile shower and tub', 'custom-tile-work' => 'Custom tile shower'] as $img => $title) {
            echo "    <image:image>\n      <image:loc>" . htmlspecialchars($siteUrl . '/assets/images/' . $img . '.jpg') . "</image:loc>\n      <image:title>" . htmlspecialchars($title) . "</image:title>\n    </image:image>\n";
        }
    }
    echo "  </url>\n";
}
echo "</urlset>\n";
