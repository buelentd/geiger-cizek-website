<?php
/**
 * FINAL - Importiere alle 18 Geiger & Cizek Pages mit echtem Content
 * Speichern als: import-geiger-cizek.php im WordPress Root
 * Ausführen: http://localhost/import-geiger-cizek.php
 */

require 'wp-load.php';

$pages = array(
    'home' => array(
        'title' => 'Homepage',
        'content' => '<h1>Willkommen bei Geiger & Cizek</h1><p>Ihr zuverlässiger Partner für Heizung, Sanitär und Klimatechnik in Straubing und Umgebung.</p><p><strong>Unsere Leistungen:</strong></p><ul><li>Heizungsbau</li><li>Kaminöfen</li><li>Badsanierung</li><li>Lüftung & Wasser</li><li>Klimaanlage</li></ul>',
        'hero' => 'startheader01.jpg'
    ),
    'heizungsbau' => array(
        'title' => 'Heizungsbau',
        'content' => '<h1>Heizungsbau</h1><p>Moderne Heizungslösungen für Privat und Gewerbe</p><p>Professionelle Beratung, Installation und Wartung von Heizungsanlagen.</p>',
        'hero' => 'startheader01.jpg'
    ),
    'waermepumpe' => array(
        'title' => 'Wärmepumpe',
        'content' => '<h1>Wärmepumpe</h1><p>Moderne Wärmepumpentechnik für effiziente Heizung</p>',
        'hero' => 'startheader01.jpg'
    ),
    'luftwaermepumpe' => array(
        'title' => 'Luftwärmepumpe',
        'content' => '<h1>Luftwärmepumpe</h1><p>Installation und Wartung von Luftwärmepumpen</p>',
        'hero' => 'startheader01.jpg'
    ),
    'hydraulischer-abgleich' => array(
        'title' => 'Hydraulischer Abgleich',
        'content' => '<h1>Hydraulischer Abgleich</h1><p>Optimierung Ihrer Heizungsanlage durch hydraulischen Abgleich</p>',
        'hero' => 'startheader01.jpg'
    ),
    '10-jahre-funktionsgarantie' => array(
        'title' => '10 Jahre Funktionsgarantie',
        'content' => '<h1>10 Jahre Funktionsgarantie</h1><p>Garantie auf alle Heizungsanlagen</p>',
        'hero' => 'startheader01.jpg'
    ),
    'heizungswartung-notdienst' => array(
        'title' => 'Heizungswartung & Notdienst',
        'content' => '<h1>Heizungswartung & Notdienst</h1><p>24/7 Service für Heizungswartung und Notfälle</p>',
        'hero' => 'startheader01.jpg'
    ),
    'kaminoefen' => array(
        'title' => 'Kaminöfen',
        'content' => '<h1>Kaminöfen</h1><p>Premium Kaminöfen für Wärme und Gemütlichkeit</p>',
        'hero' => 'startheader02.jpg'
    ),
    'heizungsausstellung' => array(
        'title' => 'Heizungsausstellung',
        'content' => '<h1>Heizungsausstellung</h1><p>Besuchen Sie unsere Ausstellung</p>',
        'hero' => 'startheader02.jpg'
    ),
    'badsanierung' => array(
        'title' => 'Badsanierung',
        'content' => '<h1>Badsanierung</h1><p>Professionelle Badsanierung und Badgestaltung</p>',
        'hero' => 'startheader03.jpg'
    ),
    'komplettbadsanierung' => array(
        'title' => 'Komplettbadsanierung',
        'content' => '<h1>Komplettbadsanierung</h1><p>Von A bis Z - Wir sanieren Ihr Bad komplett</p>',
        'hero' => 'startheader03.jpg'
    ),
    'lueftung-wasser' => array(
        'title' => 'Lüftung & Wasser',
        'content' => '<h1>Lüftung & Wasser</h1><p>Lüftungs- und Wassertechnik Lösungen</p>',
        'hero' => 'startheader01.jpg'
    ),
    'klimaanlage' => array(
        'title' => 'Klimaanlage',
        'content' => '<h1>Klimaanlage</h1><p>Klimatechnik und Klimaanlagen für maximalen Komfort</p>',
        'hero' => 'startheader02.jpg'
    ),
    'split-klimaanlage' => array(
        'title' => 'Split-Klimaanlage',
        'content' => '<h1>Split-Klimaanlage</h1><p>Moderne Split-Klimasysteme für Ihr Zuhause</p>',
        'hero' => 'startheader02.jpg'
    ),
    'multisplit-klimaanlage' => array(
        'title' => 'Multisplit-Klimaanlage',
        'content' => '<h1>Multisplit-Klimaanlage</h1><p>Multisplit Klimasysteme für mehrere Räume</p>',
        'hero' => 'startheader02.jpg'
    ),
    'ueber-uns' => array(
        'title' => 'Über Uns',
        'content' => '<h1>Über Geiger & Cizek</h1><p>Wir sind ein Unternehmen mit langjähriger Erfahrung im Bereich Heizungs-, Klima- und Sanitärtechnik.</p><p><strong>Inhaber:</strong><br>Karl Geiger - Heizungsmeister<br>Florian Cizek - Heizungsmeister</p>',
        'hero' => 'startheader03.jpg'
    ),
    'jobs' => array(
        'title' => 'Jobs & Karriere',
        'content' => '<h1>Jobs & Karriere</h1><p>Werden Sie Teil unseres Teams!</p>',
        'hero' => 'startheader03.jpg'
    ),
    'kontakt' => array(
        'title' => 'Kontakt',
        'content' => '<h1>Kontakt</h1><p><strong>Geiger & Cizek GmbH</strong><br>Arndt-Sallinger-Str. 5<br>94315 Straubing<br><br><strong>Telefon:</strong> 09421 / 861 05 88<br><strong>Email:</strong> info@hs-straubing.de</p>',
        'hero' => 'startheader01.jpg'
    ),
);

echo "\n🚀 Importiere 18 Geiger & Cizek Pages...\n\n";

$count = 0;
foreach ($pages as $slug => $page) {
    $existing = get_page_by_path($slug);
    
    if ($existing) {
        wp_update_post(array(
            'ID' => $existing->ID,
            'post_title' => $page['title'],
            'post_content' => $page['content'],
            'post_status' => 'publish',
        ));
        echo "✅ UPDATED: {$page['title']}\n";
        $count++;
    }
}

echo "\n✅ FERTIG! $count Pages importiert.\n\n";
?>
