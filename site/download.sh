#!/bin/bash
# Download archived Ares Speed site from Wayback Machine
UA="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36"
WB="https://web.archive.org/web"

# Helper: download a Wayback URL stripping the WB prefix to a local path
fetch() {
  local ts="$1"; local path="$2"; local out="$3"
  echo "==> $out"
  wget -q --user-agent="$UA" "$WB/${ts}id_/http://www.aresspeed.com.au${path}" -O "$out" || echo "FAILED: $out"
}

# Main HTML pages (using id_ flag to get the raw original file, no Wayback toolbar)
fetch 20050404124142 "/"                  "index.html"
fetch 20050405001502 "/aresspeed.html"    "aresspeed.html"
fetch 20050307183425 "/index2.html"       "index2.html"
fetch 20050218145523 "/february.html"     "february.html"
fetch 20050218213334 "/feb_profile.html"  "feb_profile.html"
fetch 20050218213322 "/feb_pics.html"     "feb_pics.html"
fetch 20050218145400 "/aprilmay_pics.html" "aprilmay_pics.html"
fetch 20050218145400 "/aprilmay_pics2.html" "aprilmay_pics2.html"

# May 2005 customer car photos (from recovered CDX listing)
for n in 0031 0032 0033 0076 0080 0113 0114 0115 0116 0118 0134 0135 0136 0137 0138 0139 0140 0141 0142 0143 0144 0150 0151 0152 0153; do
  fetch 20041020121805 "/may/IMG_${n}_l.jpg" "may/IMG_${n}_l.jpg"
done

# Splash flash file (try several known SWF paths)
fetch 20050405001502 "/aresspeed.swf" "aresspeed.swf"
fetch 20050405001502 "/splash.swf"    "splash.swf"

# Forum index
fetch 20031217105719 "/forum/" "forum/index.html"

echo "---- DONE ----"
ls -la
