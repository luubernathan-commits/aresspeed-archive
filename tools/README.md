# Wayback Image Pull Tools

Utilities for re-extracting images for `aresspeed.com.au` from the Internet Archive Wayback Machine.

## Quick start (GitHub Actions)

1. Go to **Actions** tab.
2. Select **Wayback Image Pull**.
3. Click **Run workflow** (defaults: domain=`aresspeed.com.au`, target_dir=`site`).
4. Action queries the CDX API, downloads ~607 images via `wget` using `id_/` raw replay, and commits to `site/_wayback_pull/`.

## Local one-liner (Linux/macOS)

```bash
curl -sS 'https://web.archive.org/cdx/search/cdx?url=aresspeed.com.au/*&output=json&filter=mimetype:image/.*&fl=original,timestamp&collapse=urlkey' \
  | jq -r '.[1:][] | "https://web.archive.org/web/\(.[1])id_/\(.[0])"' > ares_images.txt
mkdir -p _wayback_pull && cd _wayback_pull
wget -i ../ares_images.txt --force-directories --no-host-directories --cut-dirs=2 \
     --restrict-file-names=windows -e robots=off --wait=1 --random-wait \
     --tries=3 --timeout=30 -U "Mozilla/5.0"
```

## Why `id_/`?

`https://web.archive.org/web/<timestamp>id_/<url>` returns the raw archived bytes (no Wayback toolbar/JS injection) — required for binary assets.

## Inventory snapshot (2026-05)

| Directory | Images |
|---|---|
| modules/gallery-kits/ | 135 |
| images/ | 164 |
| gallery/ | 106 |
| may/ | 62 |
| modules/gallery-ares/ | 26 |
| ikonboard/ | 33 |
| workshop/ | 22 |
| modules/Stats/ | 17 |
| dragcombat/ | 17 |
| modules/gallery-clients/ | 8 |
| forum/ | 8 |
| Root/misc | 9 |
| **Total** | **~607** |
