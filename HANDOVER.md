# HANDOVER PROMPT — paste this into a new Claude session

You are taking over an existing project. Read this fully, then inspect the repo before changing anything.
Project folder: `C:\Users\Meepo\Downloads\WpProffesionalPortfolio` (Windows 11, no git repo yet).

## 0. How to talk to the user
- The user (developer, school/client project) writes in Bisaya/Tagalog/English mix. Reply in the same mix, short and practical.
- Beginner-friendly: they are not a PHP/JS expert. Give exact click paths / commands.
- Don't invent personal info. If something is unclear, ask.
- Be honest about what was tested and what was not.

## 1. The assignment (summary of the original brief)
ONE website, FOUR separate pages (not one long scroll), for three BSIT 4th-year students at Opol Community College:
`/` group homepage (photo-focused, short About Us, links), and one personal portfolio each:
- **Gerome Bahian Miñoza** ("Toto") — `/gerome/` — System Analyst, Army Reservist → **military theme** (matches his uniform; user asked for this explicitly)
- **Leah Mae M. Actub** ("Yamae") — `/leah/` — Technical Writer
- **Marvin John M. Saa** ("Totong") — `/marvin/` — Programmer / Project Manager

Each portfolio: hero, About Me, background, hobbies, skills, education, projects, achievements, gallery, contact/social.
The three portfolio pages MUST look genuinely different (hero layout, typography, palette, section order, nav presentation, image treatment, interactions). Shared nav: Home | Gerome | Leah | Marvin.
Content must be easy for a beginner to edit (separate data files, organized image folders, README).
**WordPress is REQUIRED by the school** → the WordPress theme is the real deliverable. The Vite site is an earlier static version (also works, deployable to Render).

### Hard rules
1. Never mix photos between people; never use another person's photo as a substitute; no AI faces, no stock portraits.
2. Use only information from the questionnaire (CSV) and the photos. No invented skills, levels, percentages, stats, testimonials, achievements.
3. Crop/resize OK; never alter faces.
4. No unnecessary dependencies/backend/paid services.
5. Don't show every photo — only ones that improve design.

## 2. Source material (kept on the user's PC, NOT in git)
- `Gerome Images/`, `Leah Mae Actub Images/`, `Marvin Images/` — original photos (unoptimized).
- `WORDPRESS PROJECT.csv/WORDPRESS PROJECT.csv` (+ `.zip`) — Google Forms responses (the content source). `.gitignore` excludes all of these (privacy + size).
- The questionnaire answers were already transferred into the data files below.

## 3. Repository layout
```
HANDOVER.md                     ← this file
README.md                       ← beginner README for the Vite (static) version; top note points to WordPress theme
package.json, vite.config.js    ← Vite multi-page (only dependency: vite)
index.html, gerome/, leah/, marvin/ (each has index.html)   ← the 4 HTML shells
src/data/{group,gerome,leah,marvin}.js   ← ALL content (Vite version)
src/shared/{util.js,base.css}
src/pages/{home,gerome,leah,marvin}.{js,css}   ← per-page layout + design
public/images/{group,gerome,leah,marvin}/      ← optimized JPGs (max ~1400–1600px, q78)
render.yaml                     ← Render static-site blueprint (build: npm install && npm run build, publish: dist)
.gitignore, .claude/launch.json (gitignored)

wordpress-theme/
  README.md                     ← beginner README for the WP theme (install, edit, troubleshoot, hosting)
  occ-portfolio.zip             ← ready-to-upload theme (built with .NET ZipArchive, forward-slash paths)
  occ-portfolio/                ← the theme
    style.css (theme header only), functions.php, header.php, footer.php, index.php (fallback/404)
    front-page.php              ← group homepage
    page-gerome.php / page-leah.php / page-marvin.php   (each has "Template Name:" header)
    inc/helpers.php             ← occ_data(), occ_people(), occ_h()/occ_a() escaping, occ_img(), occ_nav_links(), occ_current_page(), occ_snake()
    inc/data/{group,gerome,leah,marvin}.php   ← ALL content (WP version, PHP arrays, double-quoted strings)
    assets/css/{base,home,gerome,leah,marvin}.css   (copied from src; base.css adds html.js reveal gating + admin-bar offsets)
    assets/js/{site,gerome,marvin}.js   ← nav toggle, scroll reveal, lightbox / camo canvas / terminal typing
    assets/images/{group,gerome,leah,marvin}/ + favicon.svg
```

## 4. How it works (flow)
**Vite version:** `src/data/*.js` → imported by `src/pages/<page>.js` → builds HTML strings into `#app` (escaped via `esc()`), CSS per page, shared helpers in `src/shared/util.js`. Build: `npm install && npm run build` → `dist/` (4 pages). Dev: `npm run dev` (port 5173).
**WordPress version:** `inc/data/*.php` (arrays) → templates echo HTML (escaped with `occ_h/occ_a/esc_url`). `functions.php`:
- `template_include` filter stores the chosen template basename in `$GLOBALS['occ_template']`; `occ_current_page()` maps it to home|gerome|leah|marvin.
- `wp_enqueue_scripts` loads Google Fonts + `base.css` + `<page>.css` + `site.js` (+ `gerome.js` / `marvin.js`) for the current page only.
- `body_class` adds `page-<name>` (the CSS is scoped with `body.page-gerome` etc.).
- `pre_get_document_title` sets per-page titles.
- `after_switch_theme` creates pages Home/Gerome/Leah/Marvin, sets Home as static front page, sets permalinks `/%postname%/`, flushes rewrites.
- Page layout is chosen by slug (`page-gerome.php` etc.) or by the "Template Name" dropdown.
- Page-editor content is intentionally ignored; text comes only from data files.
**The JS data files and PHP data files are two copies of the same content — if you change content, update BOTH** (or regenerate PHP from JS; the converter script lived in a temp folder and is not in the repo).

## 5. Data schema (same shape in JS and PHP)
Per person: `slug, name{full,first,last,nickname}, role, badge (Gerome only), tagline, statement, shortIntro, folder/imageFolder, profile, profilePosition, titles{about,background,hobbies,skills,education,projects,achievements,gallery,contact}, about[], facts[{label,value}], strengths (Gerome: array of {title,text}; Leah/Marvin: {intro, items[]}), motivation{title,text}, goal, hobbiesIntro?, hobbies[{title,text,tags?}], skills[{group,items[]}], education[{school,level,period}], projectsIntro? (Leah), projects[{title,role,description,photo}], achievements[{title,detail,photo}], gallery[{file,caption}], contact{email,links[{label,url}]}`.
Group: `siteTitle, school, program, hero{eyebrow,headline[],text,photo,photoAlt,photoCaption}, about{title,text[]}, membersTitle, galleryTitle, gallery[{owner,file,caption,wide?}], footer{note}`.
Empty strings/blocks are hidden by the templates.

## 6. Design decisions
- **Home:** navy `#0e1a33` + cream `#f3ede1`; Bricolage Grotesque + Instrument Sans; trio photo hero; three-color stripe (olive / crimson / sunset = Gerome / Leah / Marvin); staggered member cards; mosaic gallery.
- **Gerome (military):** seeded digital-camo canvas background (OD green/brown/tan), Stardos Stencil + Barlow Condensed + Barlow + IBM Plex Mono, ID-card portrait with sewn "name tape" chips (his uniform has MIÑOZA / ARMY tapes), chevron dividers, khaki "field manual" sections, topo-map hobbies with waypoints + compass, "Loadout" skills, "Operations Log" projects, contact-sheet gallery.
- **Leah (cinematic):** cream/ink/red + blue accent; Playfair Display + DM Sans; scrolling "Now showing" marquee, arch-poster portrait, credits-roll skills, film-strip horizontal gallery with lightbox, ticket-stub contact.
- **Marvin (dev terminal at sunset):** dark navy, sunset gradient only on the sun/hobby panel; Space Grotesk + JetBrains Mono; desktop left sidebar "file tree" nav (pages + sections), terminal intro with typing animation, JSON-style profile, `const` code-style skills, window-chrome section cards.
- All: responsive (mobile menu toggles), reduced-motion respected, no horizontal overflow, skip link, focus styles, lazy images.

## 7. Photo decisions (ownership = folder the user put them in)
- Gerome: `hero.jpg` (portrait from HeroMain.jpg), `range`, `summit` (ROTC Advance Cadets Summit 2025), `cadets`, `fiesta`, `squad`.
- Leah: `main.jpg` (portrait), `costume`, `certificate` (1st Place Dance Contest, Christmas Event 2022, BSIT Dept — read from the certificate photo), `red-team`, `blue-team`, `duo`.
- Marvin: `portrait.jpg` (studio tuxedo portrait from his folder — assistant doubted it looks like him in name-tagged photos, but the user confirmed it is correct), `selfie`, `blue-team`, `name-tags`, `demo-day`, `stairs`.
- Group: `group/trio.jpg` = crop of a hallway shot showing Gerome, Leah, Marvin (a 4th person, probably the project manager Patrick Magboo, was cropped out). Other group shots include that 4th person, so they are not used as "group" photos.
- Name tags seen in photos: Miñoza Gerome B. (System Analyst), Actub Leah Mae M. (Technical Writer), Saa Marvin John M. (Programmer), Magboo Patrick John N. (Project Manager — NOT one of the three).

## 8. Confirmed by the user
- Marvin's studio portrait and his Instagram `ncly_mcxzne` are correct.
- WordPress is required. User chose LocalWP on their PC for the first real test.
- Site name in LocalWP: `occ-portfolio-project` (URL `occ-portfolio-project.local`).

## 9. Status
- Vite site: built (`npm run build` OK), checked in a browser at desktop + mobile widths, no console errors. Not deployed.
- WordPress theme: all PHP files pass `php -l` (PHP 8.3). All 4 pages were rendered through a small WordPress stand-in (stub functions, no DB) — no PHP warnings, correct titles/body classes/assets, visually matches Vite version, no console errors.
- **NOT tested in real WordPress:** activation hook (auto-create pages, front page, permalinks), template routing in WP, admin-bar offsets, PHP 7.4 compatibility.
- **Current blocker/last issue:** the user's first upload of `occ-portfolio.zip` in LocalWP failed with **"Incompatible Archive"**. The first zip was made with Windows `tar -a` (bsdtar) — likely cause. The zip was rebuilt with .NET `System.IO.Compression.ZipArchive`, forward-slash entry names, 42 files, `occ-portfolio/style.css` at the right place (structure verified in PowerShell; not opened in real WordPress yet). Fallback given: copy the `occ-portfolio` folder directly into `...\Local Sites\<site>\app\public\wp-content\themes\` and activate. **Waiting for the user to report whether the new zip works.**

## 10. Open content items
- Gerome & Marvin answered "Yes" to awards/competitions but gave no names; Gerome said certificates will be sent to the group chat. Add them to `achievements` (both JS + PHP data).
- Marvin's questionnaire lists "Rotc Number" as a certificate — unclear, intentionally NOT shown. Ask the user how it should read.
- Gerome's "learned from projects" answer was just "To learn" — not used.
- Project descriptions for Gerome and Leah are empty (only titles + roles) — nothing was invented.
- Gerome's "Army Reservist" achievement text comes from his own bio.

## 11. Environment quirks (Windows)
- Node 20.19, npm 11. PHP not installed globally (a PHP 8.3 zip was extracted in a temp folder for linting; it may be gone — re-download from windows.php.net if needed).
- WordPress Playground CLI latest needs Node ≥ 24; version 2.0.0 installs very slowly here — don't rely on it. Real testing = LocalWP.
- Don't create theme zips with `tar -a` (bsdtar) or `Compress-Archive` (backslash paths on PS 5.1). Use .NET `ZipArchive` and forward-slash names (see how `occ-portfolio.zip` was built).
- Shell heredocs mangle backslashes — write JS/PHP files with the Write tool.
- Images were optimized with `sharp` run from a temp folder (not a project dependency). For new photos: JPG, ~1000–1600 px, < 400 KB.
- `.claude/launch.json` has dev-server configs (gitignored).

## 12. Deployment notes
- Static (Vite): GitHub → Render Static Site, build `npm install && npm run build`, publish `dist` (or `render.yaml` Blueprint). Repo not created yet; `.gitignore` keeps originals/CSV out.
- WordPress: cannot run on Render Static Sites (needs PHP + MySQL). Options documented in `wordpress-theme/README.md`: LocalWP demo, free shared host (e.g., InfinityFree), paid WP host, or export static via Simply Static and host on Render. Ask the teacher what hosting is expected.

## 13. Pricing context (informational)
User asked what to charge classmates: assistant suggested about ₱800–₱1,000 per person (₱2,400–₱3,000 total), with scope limit (2 revisions), 50% upfront, hosting/domain excluded.

## 14. Likely next steps
1. Get the user's result for the new zip upload in LocalWP; fix any real-WordPress issue (activation, permalinks, templates).
2. Optionally add a WordPress admin settings page / Customizer fields so text can be edited without touching PHP files (user was offered this; not started).
3. Fill missing certificates / "Rotc Number" when the user provides them (update JS and PHP data, rebuild zip, rebuild Vite if used).
4. Hosting/deploy once the teacher's requirement is known.
5. Full visual pass of lower sections on all pages in a real browser, tablet widths, PHP 7.4 check.
