#!/bin/bash

# Geiger & Cizek WordPress Setup Script
# Automatische Installation & Konfiguration
# Nutzung: ./setup.sh

set -e

echo "======================================"
echo "Geiger & Cizek WordPress Setup"
echo "======================================"
echo ""

# Variables
REPO_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
WP_VERSION="6.7.1"
WP_URL="http://localhost:8000"
DB_NAME="geiger_cizek"
DB_USER="geiger_cizek"
DB_PASS="geiger_cizek"
DB_HOST="localhost"

echo "📦 Schritt 1: WordPress $WP_VERSION herunterladen..."
if [ ! -d "$REPO_DIR/wordpress" ]; then
    cd /tmp
    wget -q https://wordpress.org/wordpress-${WP_VERSION}.tar.gz
    tar -xzf wordpress-${WP_VERSION}.tar.gz
    mv wordpress "$REPO_DIR/"
    rm wordpress-${WP_VERSION}.tar.gz
    echo "✅ WordPress heruntergeladen"
else
    echo "✅ WordPress existiert bereits"
fi

echo ""
echo "🎨 Schritt 2: Theme aktivieren..."
if [ ! -d "$REPO_DIR/wordpress/wp-content/themes/geiger-cizek" ]; then
    mkdir -p "$REPO_DIR/wordpress/wp-content/themes"
    # Theme wird vom Repo genutzt
    cp -r "$REPO_DIR/wp-content/themes/geiger-cizek" "$REPO_DIR/wordpress/wp-content/themes/" 2>/dev/null || true
    echo "✅ Theme vorbereitet"
else
    echo "✅ Theme existiert bereits"
fi

echo ""
echo "🖼️ Schritt 3: Assets kopieren..."
if [ -d "$REPO_DIR/wp-content/uploads" ]; then
    mkdir -p "$REPO_DIR/wordpress/wp-content/uploads"
    cp -r "$REPO_DIR/wp-content/uploads/"* "$REPO_DIR/wordpress/wp-content/uploads/" 2>/dev/null || true
    echo "✅ Bilder & Icons kopiert"
else
    echo "⚠️ Assets-Ordner nicht gefunden"
fi

echo ""
echo "⚙️ Schritt 4: wp-config.php konfigurieren..."
if [ ! -f "$REPO_DIR/wordpress/wp-config.php" ]; then
    cp "$REPO_DIR/wordpress/wp-config-sample.php" "$REPO_DIR/wordpress/wp-config.php"
    
    # Ersetze Datenbank-Credentials
    sed -i "s/database_name_here/$DB_NAME/g" "$REPO_DIR/wordpress/wp-config.php"
    sed -i "s/username_here/$DB_USER/g" "$REPO_DIR/wordpress/wp-config.php"
    sed -i "s/password_here/$DB_PASS/g" "$REPO_DIR/wordpress/wp-config.php"
    sed -i "s/localhost/$DB_HOST/g" "$REPO_DIR/wordpress/wp-config.php"
    
    echo "✅ wp-config.php erstellt"
else
    echo "✅ wp-config.php existiert bereits"
fi

echo ""
echo "🗄️ Schritt 5: MySQL Datenbank erstellen..."
# Dieser Schritt erfordert MySQL Zugang - manuell machen
echo "ℹ️  Bitte manuell ausführen:"
echo "   mysql -u root -p"
echo "   CREATE DATABASE $DB_NAME;"
echo "   CREATE USER '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASS';"
echo "   GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost';"
echo "   FLUSH PRIVILEGES;"
echo ""

echo "✅ Setup vorbereitet!"
echo ""
echo "======================================"
echo "Nächste Schritte:"
echo "======================================"
echo ""
echo "1. MySQL Datenbank erstellen (siehe oben)"
echo ""
echo "2. Webserver starten:"
echo "   cd $REPO_DIR/wordpress"
echo "   php -S localhost:8000"
echo ""
echo "3. WordPress konfigurieren:"
echo "   http://localhost:8000"
echo "   Admin: admin / geiger_cizek"
echo ""
echo "4. Theme aktivieren:"
echo "   wp-admin → Themes → Geiger & Cizek"
echo ""
echo "5. Elementor installieren:"
echo "   wp-admin → Plugins → Elementor installieren"
echo ""
echo "6. Pages importieren:"
echo "   Tools → Import → Elementor"
echo ""
echo "======================================"
