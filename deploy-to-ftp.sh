#!/bin/bash

HOST="test.vaventus.online"
USER="cizekgeiger"
PASS='Vaventus,2030!'
REMOTE_DIR="test.vaventus.online"

echo "🚀 Deploying zu test.vaventus.online..."

# Alle HTML-Dateien + Assets hochladen
lftp -c "
set ssl:verify-certificate no
open -u $USER,$PASS $HOST
mirror -R --delete --verbose \
  --exclude .git \
  --exclude .gitignore \
  --exclude '*.sh' \
  --exclude '*.md' \
  ./ /$REMOTE_DIR/
bye
"

echo ""
echo "✅ Deployment abgeschlossen!"
echo "🌐 Live unter: https://test.vaventus.online/"
