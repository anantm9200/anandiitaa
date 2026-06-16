#!/usr/bin/env bash
#
# Manual deploy of the block theme to testing.anandiitaa.com from a TRUSTED machine
# (your laptop). Hostinger's SSH brute-force protection can ban GitHub-runner IPs
# after failed auths, which makes CI SFTP flaky; your laptop's IP is allowed, so
# this just works. Deploys THEME FILES ONLY — run the seed (below) once for content.
#
# Usage (from anywhere):  bash anandiitaa-block/tools/deploy-testing.sh
#
set -euo pipefail

HOST="148.135.140.158"
PORT="65002"
USER="u605618459"
REMOTE="/home/u605618459/domains/anandiitaa.com/public_html/testing/wp-content/themes/anandiitaa-block"

# Resolve the theme dir (parent of this tools/ folder) so it runs from anywhere.
THEME_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"

echo "==> Building blocks (npm run build)…"
if ! ( cd "$THEME_DIR" && npm run build ); then
  echo "   build failed — installing deps then retrying…"
  ( cd "$THEME_DIR" && npm install --no-audit --no-fund && npm run build )
fi

echo "==> Mirroring theme to testing.anandiitaa.com (enter the SSH password when asked)…"
# rsync over ssh; --delete makes the remote an exact mirror of the local theme.
rsync -avz --delete \
  -e "ssh -p ${PORT} -o StrictHostKeyChecking=accept-new" \
  --exclude '.git' \
  --exclude '.github' \
  --exclude 'node_modules' \
  --exclude 'src' \
  --exclude 'package.json' \
  --exclude 'package-lock.json' \
  --exclude '.DS_Store' \
  --exclude '.gitignore' \
  "${THEME_DIR}/" \
  "${USER}@${HOST}:${REMOTE}/"

cat <<EOF

==> Theme files deployed.
    Next (content — run ONCE on the server):
      ssh -p ${PORT} ${USER}@${HOST}
      cd ~/domains/anandiitaa.com/public_html/testing
      wp eval-file wp-content/themes/anandiitaa-block/tools/seed-anandiitaa-pages.php

    Then verify: https://testing.anandiitaa.com/  /about-us  /products/jaggery  /nutritional-facts

NOTE: if rsync errors with "command not found" on the server, Hostinger lacks rsync —
install lftp locally (brew install lftp) and tell me; I'll swap this to an lftp mirror.
EOF
