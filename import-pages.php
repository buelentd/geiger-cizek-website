<?php
/**
 * Import 18 HTML Pages to WordPress
 * Usage: wp eval-file import-pages.php
 */

$pages = [
    [
        'file' => 'index.html',
        'title' => 'Startseite',
        'slug' => 'home',
        'parent' => 0,
    ],
    [
        'file' => 'heizungsbau.html',
        'title' => 'Heizungsbau',
        'slug' => 'heizungsbau',
        'parent' => 0,
    ],
    [
        'file' => 'klimaanlage.html',
        'title' => 'Klimaanlage',
        'slug' => 'klimaanlage',
        'parent' => 0,
    ],
    [
        'file' => 'kaminoefen.html',
        'title' => 'Kaminöfen',
        'slug' => 'kaminoefen',
        'parent' => 0,
    ],
    [
        'file' => 'badsanierung.html',
        'title' => 'Badsanierung',
        'slug' => 'badsanierung',
        'parent' => 0,
    ],
    [
        'file' => 'lueftung-wasser.html',
        'title' => 'Lüftung & Wasser',
        'slug' => 'lueftung-wasser',
        'parent' => 0,
    ],
    [
        'file' => 'ueber-uns.html',
        'title' => 'Über uns',
        'slug' => 'ueber-uns',
        'parent' => 0,
    ],
    [
        'file' => 'kontakt.html',
        'title' => 'Kontakt',
        'slug' => 'kontakt',
        'parent' => 0,
    ],
    [
        'file' => 'heizungsbau/waermepumpe.html',
        'title' => 'Wärmepumpe',
        'slug' => 'waermepumpe',
        'parent' => 'heizungsbau',
    ],
    [
        'file' => 'heizungsbau/luftwaermepumpe.html',
        'title' => 'Luftwärmepumpe',
        'slug' => 'luftwaermepumpe',
        'parent' => 'heizungsbau',
    ],
    [
        'file' => 'heizungsbau/hydraulischer-abgleich.html',
        'title' => 'Hydraulischer Abgleich',
        'slug' => 'hydraulischer-abgleich',
        'parent' => 'heizungsbau',
    ],
    [
        'file' => 'heizungsbau/10-jahre-funktionsgarantie.html',
        'title' => '10 Jahre Funktionsgarantie',
        'slug' => '10-jahre-funktionsgarantie',
        'parent' => 'heizungsbau',
    ],
    [
        'file' => 'heizungsbau/heizungswartung-notdienst.html',
        'title' => 'Heizungswartung & Notdienst',
        'slug' => 'heizungswartung-notdienst',
        'parent' => 'heizungsbau',
    ],
    [
        'file' => 'kaminoefen/heizungsausstellung.html',
        'title' => 'Heizungsausstellung',
        'slug' => 'heizungsausstellung',
        'parent' => 'kaminoefen',
    ],
    [
        'file' => 'badsanierung/komplettbadsanierung.html',
        'title' => 'Komplettbadsanierung',
        'slug' => 'komplettbadsanierung',
        'parent' => 'badsanierung',
    ],
    [
        'file' => 'klimaanlage/split-klimaanlage.html',
        'title' => 'Split-Klimaanlage',
        'slug' => 'split-klimaanlage',
        'parent' => 'klimaanlage',
    ],
    [
        'file' => 'klimaanlage/multisplit-klimaanlage.html',
        'title' => 'Multisplit-Klimaanlage',
        'slug' => 'multisplit-klimaanlage',
        'parent' => 'klimaanlage',
    ],
    [
        'file' => 'ueber-uns/jobs.html',
        'title' => 'Jobs',
        'slug' => 'jobs',
        'parent' => 'ueber-uns',
    ],
];

echo "Importing 18 pages...\n";

foreach ($pages as $page_data) {
    $file_path = dirname(__FILE__) . '/' . $page_data['file'];
    
    if (!file_exists($file_path)) {
        echo "❌ File not found: {$page_data['file']}\n";
        continue;
    }
    
    // Read HTML file
    $html = file_get_contents($file_path);
    
    // Extract content from body
    preg_match('/<body[^>]*>(.*)<\/body>/is', $html, $matches);
    $content = $matches[1] ?? $html;
    
    // Get parent ID if parent slug exists
    $parent_id = 0;
    if ($page_data['parent']) {
        $parent = get_page_by_path($page_data['parent']);
        $parent_id = $parent ? $parent->ID : 0;
    }
    
    // Create/Update page
    $page = [
        'post_title' => $page_data['title'],
        'post_name' => $page_data['slug'],
        'post_content' => $content,
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_parent' => $parent_id,
    ];
    
    $page_id = wp_insert_post($page);
    
    if (is_wp_error($page_id)) {
        echo "❌ Error: {$page_data['title']} - " . $page_id->get_error_message() . "\n";
    } else {
        echo "✅ Imported: {$page_data['title']} (ID: $page_id)\n";
    }
}

echo "\n✅ Import complete!\n";
