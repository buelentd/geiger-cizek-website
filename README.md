# Geiger & Cizek WordPress Website

**Status:** Migration Branch `migration/wordpress`

## Quick Start (Lokal testen)

```bash
# 1. Repository klonen
git clone https://github.com/buelentd/geiger-cizek-website.git
cd geiger-cizek-website
git checkout migration/wordpress

# 2. Setup-Script ausführen
chmod +x setup.sh
./setup.sh

# 3. MySQL Datenbank erstellen:
mysql -u root -p
CREATE DATABASE geiger_cizek;
CREATE USER 'geiger_cizek'@'localhost' IDENTIFIED BY 'geiger_cizek';
GRANT ALL PRIVILEGES ON geiger_cizek.* TO 'geiger_cizek'@'localhost';
FLUSH PRIVILEGES;

# 4. WordPress Server starten
cd wordpress
php -S localhost:8000

# 5. Öffne im Browser
http://localhost:8000
```

## Was ist dabei?

✅ **WordPress 6.7.1** - Vollständig vorbereitet
✅ **Theme "Geiger & Cizek"** - Custom Theme mit Elementor-Support
✅ **11 Icons** - Aus Design-System
✅ **7 Partner-Logos** - Bosch, ETA, Fröling, MCZ, Red, Roth, Wilo
✅ **Hero-Bilder** - startheader01-03.jpg + Kaminofen
✅ **18 Pages** - Alle HTML-Seiten konvertiert

## Struktur

```
geiger-cizek-website/
├── wordpress/                    ← WordPress Installation
│   ├── wp-admin/
│   ├── wp-content/
│   │   ├── themes/geiger-cizek/
│   │   ├── uploads/              ← Alle Assets
│   │   └── plugins/
│   └── wp-config.php
├── wp-content/                   ← Repo Assets
│   └── uploads/
│       ├── slider/               ← Hero-Bilder
│       ├── herobilder/           ← Kaminofen
│       ├── icons/                ← 11 SVGs
│       └── Logos/                ← Partner-Logos
├── setup.sh                      ← Auto-Setup Script
└── README.md
```

## Pages (18 Seiten)

### Hauptseiten
- Homepage (index.html)
- Heizungsbau
- Klimaanlage
- Kaminöfen
- Badsanierung
- Lüftung & Wasser
- Über uns
- Kontakt

### Sub-Pages
- Wärmepumpe
- Luftwärmepumpe
- Hydraulischer Abgleich
- 10 Jahre Funktionsgarantie
- Heizungswartung & Notdienst
- Heizungsausstellung
- Komplettbadsanierung
- Split-Klimaanlage
- Multisplit-Klimaanlage
- Jobs

## WordPress Admin

**URL:** http://localhost:8000/wp-admin/
**User:** admin
**Pass:** geiger_cizek

## Design System

**Farben:**
- Primary: #E2001A (Rot)
- Yellow: #FFDD00
- Beige: #CEC696
- Dark: #192430

**Font:** Montserrat (Google Fonts)

## Features

✅ Elementor Editor
✅ Hero Slider (3 Bilder, auto-rotating)
✅ Service Cards
✅ Icon Slider (5 Icons)
✅ Partner Logo Slider
✅ Responsive Design
✅ Mobile-first

## Nächste Schritte

1. Lokal testen
2. Elementor Editor nutzen (wp-admin)
3. Content anpassen
4. Bei OK → Deploy auf test.vaventus.online

## Support

**Fragen?** Siehe setup.sh für Details.

---

**Branch:** migration/wordpress  
**Deploy:** Nach lokalem Test freigegeben
