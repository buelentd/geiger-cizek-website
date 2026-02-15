<?php
/**
 * Import Homepage from test.vaventus.online
 * ONE EXAMPLE - Just the homepage!
 */

require 'wp-load.php';

echo "🚀 Importing Homepage...\n\n";

// Homepage Content (from test.vaventus.online)
$homepage = array(
    'title' => 'Startseite – Geiger & Cizek',
    'slug' => 'home',
    'content' => '
<!-- Hero Slider -->
<div class="hero-slider-container">
  <div class="swiper hero-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="' . home_url() . '/wp-content/uploads/2026/02/startheader01.jpg" alt="Hero 1">
      </div>
      <div class="swiper-slide">
        <img src="' . home_url() . '/wp-content/uploads/2026/02/startheader02.jpg" alt="Hero 2">
      </div>
      <div class="swiper-slide">
        <img src="' . home_url() . '/wp-content/uploads/2026/02/startheader03.jpg" alt="Hero 3">
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</div>

<h1>Willkommen bei Geiger & Cizek</h1>
<p>Ihr zuverlässiger Partner für Heizung, Sanitär und Klimatechnik in Straubing und Umgebung.</p>

<h2>Unsere Services</h2>
<ul>
  <li>Heizungsbau</li>
  <li>Kaminöfen</li>
  <li>Badsanierung</li>
  <li>Lüftung & Wasser</li>
  <li>Klimaanlage</li>
</ul>
'
);

// Find Homepage
$page = get_page_by_path('home');

if ($page) {
    // Update existing
    $result = wp_update_post(array(
        'ID' => $page->ID,
        'post_title' => $homepage['title'],
        'post_content' => $homepage['content'],
        'post_status' => 'publish',
    ));
    
    if (is_wp_error($result)) {
        echo "❌ Error: " . $result->get_error_message() . "\n";
    } else {
        echo "✅ Homepage updated (ID: {$page->ID})\n";
        echo "\n📊 CHECK LOKAL:\n";
        echo "   URL: http://cizek-geiger-local.local/\n";
        echo "   Sie sollten den Hero-Slider sehen!\n";
    }
} else {
    echo "⚠️  Homepage nicht gefunden!\n";
    echo "   Stelle sicher, dass die 'home' Page in WordPress existiert.\n";
}

echo "\n✅ Done!\n\n";
?>
