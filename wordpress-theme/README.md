# WordPress version — OCC Portfolio theme

This is the **WordPress** version of the three-member portfolio: one custom theme that gives you
one website with four pages.

| Page | Address | Design |
|---|---|---|
| Home (group) | `/` | Navy + cream, photo-first |
| Gerome Miñoza | `/gerome/` | Army field-manual theme |
| Leah Mae Actub | `/leah/` | Cinematic poster / film-roll theme |
| Marvin John Saa | `/marvin/` | Developer terminal at sunset |

Requires WordPress 6.0+ and PHP 7.4+. No plugins needed.

The theme folder is `occ-portfolio/`. A ready-to-upload copy is `occ-portfolio.zip`.

---

## 1. Install (3 minutes)

**Easiest way to try it on your computer:** install [LocalWP](https://localwp.com) (free), create a site, then follow the steps below.

1. In WordPress admin go to **Appearance → Themes → Add New Theme → Upload Theme**.
2. Choose `occ-portfolio.zip` → **Install Now** → **Activate**.

When you activate the theme it automatically:
- creates four pages: **Home, Gerome, Leah, Marvin**;
- makes **Home** the front page;
- turns on pretty links (`/gerome/`, `/leah/`, `/marvin/`).

Open your site — all four pages work and share the same navigation.

> The page content box in WordPress stays empty on purpose. The words and photos come from the theme's data files (below), so the design never breaks.

---

## 2. Where everything lives

```
occ-portfolio/
  inc/data/            ← ALL the words. Edit these.
     group.php           homepage text + homepage gallery
     gerome.php          Gerome's page
     leah.php            Leah's page
     marvin.php          Marvin's page
  assets/images/       ← ALL the photos
     group/  gerome/  leah/  marvin/
  assets/css/          ← the designs (one file per page)
  front-page.php, page-gerome.php, page-leah.php, page-marvin.php   ← page layouts
```

**Words → `inc/data/*.php`. Photos → `assets/images/<name>/`.**

### Edit text inside WordPress
**Appearance → Theme File Editor** → choose *OCC Portfolio* → open `inc/data/gerome.php` (or another) → change the text between the quotes → **Update File**.

### Edit on your computer
Edit the files, then zip the `occ-portfolio` folder again and upload it (Appearance → Themes → Upload; WordPress will offer to replace the old version).

### Rules for the data files
- Change only the text between the `"quotes"`. Keep the quotes, commas `,` and brackets `[ ]`.
- To hide something, make it empty: `""`. To remove a project/hobby/etc., delete its whole `[ ... ],` block.
- To add one, copy a block, paste it below, and change the words.
- Don't type a straight double quote `"` inside text — use curly quotes “ ”.
- If the site shows a white screen after an edit, you deleted a quote, comma or bracket. The Theme File Editor shows the problem line and restores the previous version if you don't save.

---

## 3. Change a photo or add gallery photos

1. Put the new `.jpg` in that person's folder: `assets/images/leah/new-photo.jpg`.
   - *With a host's File Manager/FTP:* `wp-content/themes/occ-portfolio/assets/images/leah/`.
   - *Or* add it to the folder on your computer and re-zip the theme.
2. In `inc/data/leah.php`:
   - profile picture → `'profile' => "new-photo.jpg",`
   - gallery → add a block: `[ 'file' => "new-photo.jpg", 'caption' => "What it shows" ],`
3. If a face is cut off, change `'profilePosition' => "50% 25%"` (left/right %, up/down %).

Photo tips: `.jpg`, about 1000–1600 px wide, under ~400 KB each.

The homepage gallery is in `inc/data/group.php` (`owner` is `gerome`, `leah`, `marvin` or `group`). The group photo is `assets/images/group/trio.jpg`.

---

## 4. Other things you can edit (in each person's data file)

| What | Key |
|---|---|
| Names, nickname, role, tagline | `name`, `role`, `tagline`, `statement` |
| About me | `about` |
| Personal background | `facts` |
| Hobbies | `hobbies` |
| Skills | `skills` |
| Education | `education` |
| Projects | `projects` |
| Achievements / certificates | `achievements` |
| Section headings | `titles` |
| Email and social links | `contact` |

---

## 5. Putting the WordPress site online

WordPress needs PHP and a MySQL database, so it can't be hosted on a plain static host. Options:

- **Free shared hosting** with WordPress support (for example InfinityFree) — create a site, install WordPress, then upload the theme zip as in step 1.
- **Any paid WordPress host** — same steps.
- **Render:** Render's *Static Site* can't run WordPress. If you must use Render, either run WordPress in a Docker web service plus a database (paid), or export a static copy with the free **Simply Static** plugin and deploy that as a Static Site.

Ask your teacher where the site should be hosted — often a LocalWP demo or a free host is enough.

---

## Troubleshooting

- **`/gerome/` shows "Page not found"** — go to **Settings → Permalinks** and click **Save Changes**, and check that pages with the slugs `gerome`, `leah`, `marvin` exist (Pages → All Pages).
- **Homepage shows my blog** — **Settings → Reading** → "Your homepage displays" → *A static page* → Homepage: **Home**.
- **A page looks unstyled** — make sure the theme is *OCC Portfolio* (Appearance → Themes), then hard-refresh (Ctrl + Shift + R).
- **Fonts look different offline** — fonts load from Google Fonts and need an internet connection.
- **If you rename a page** — the layout is chosen by the page slug, or choose it under *Page Attributes → Template* (Gerome / Leah / Marvin Portfolio).
