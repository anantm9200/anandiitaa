#!/usr/bin/env bash
#
# Manual deploy of the block theme to PROD (anandiitaa.com) from a trusted machine.
# Ships THEME FILES ONLY into …/themes/anandiitaa-block. This is SAFE on its own —
# the live site keeps running the classic theme until anandiitaa-block is *activated*
# (that flip happens when you run the seed / switch the theme — see AGENT-HANDOFF.md
# "PUSH GUIDE" §B). Content is NEVER shipped by this script.
#
# Usage:  bash anandiitaa-block/tools/deploy-prod.sh
#
set -euo pipefail

HOST="148.135.140.158"
PORT="65002"
USER="u605618459"
REMOTE="/home/u605618459/domains/anandiitaa.com/public_html/wp-content/themes/anandiitaa-block"

THEME_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"

echo "⚠️  Deploying the block theme to PRODUCTION (anandiitaa.com)."
echo "    Files only — the live site is unaffected until the theme is activated."
read -r -p "    Type 'prod' to continue: " ans
[ "$ans" = "prod" ] || { echo "Aborted."; exit 1; }

echo "==> Building blocks…"
if ! ( cd "$THEME_DIR" && npm run build ); then
  ( cd "$THEME_DIR" && npm install --no-audit --no-fund && npm run build )
fi

echo "==> Mirroring theme to prod (enter the SSH password when asked)…"
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

==> Theme files on prod. The live site is STILL on the classic theme.
    • FIRST go-live (cutover): activate + seed once —
        ssh -p ${PORT} ${USER}@${HOST}
        cd ~/domains/anandiitaa.com/public_html
        wp eval-file wp-content/themes/anandiitaa-block/tools/seed-anandiitaa-pages.php
      Then verify https://anandiitaa.com/ . NEVER re-run the seed on prod after that.
    • ALREADY live on the block theme (code-only update): nothing else to do —
      content is edited in wp-admin.
EOF
