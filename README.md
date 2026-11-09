# OCC BSIT — Three Portfolios (one website, four pages)

> **WordPress is required for the assignment?** Use the WordPress theme in [`wordpress-theme/`](wordpress-theme/README.md) (upload `wordpress-theme/occ-portfolio.zip` in WordPress). Same designs and photos. The rest of this README describes the static (Vite) version.

| Page | Address | Design |
|---|---|---|
| Group homepage | `/` | Navy + cream, photo-first |
| Gerome Miñoza | `/gerome/` | Army field-manual theme (camo, stencil, name tapes) |
| Leah Mae Actub | `/leah/` | Cinematic poster / film-roll theme |
| Marvin John Saa | `/marvin/` | Developer terminal at sunset |

Plain HTML + CSS + JavaScript, built with [Vite](https://vitejs.dev). No backend, no database, no paid services.

---

## 1. Run it on your computer

You need [Node.js](https://nodejs.org) (version 18 or newer) once.

```bash
npm install
npm run dev
```

Open the address it prints (usually `http://localhost:5173`). The page refreshes by itself every time you save a file.

---

## 2. Where everything lives

```
src/data/            ← ALL the words. Edit these files.
   group.js            homepage text + homepage gallery
   gerome.js           Gerome's page
   leah.js             Leah's page
   marvin.js           Marvin's page
public/images/       ← ALL the photos.
   group/  gerome/  leah/  marvin/
src/pages/           ← design (CSS + layout). You don't need to touch these.
```

Rule of thumb: **words → `src/data`, photos → `public/images`**.

---

## 3. Edit personal information

Open the person's file in `src/data/` (for example `gerome.js`). Change only the text **between the quotes**:

```js
name: { full: "Gerome Bahian Miñoza", first: "Gerome", nickname: "Toto" },
role: "System Analyst",
about: [
  "First paragraph…",
  "Second paragraph…",
],
```

- Keep the quote marks `"` and the commas `,`.
- Text is shown exactly as typed (no HTML needed).
- Setting something to `""` or deleting its whole `{ … },` block hides it on the page.
- `titles: { … }` changes the **section headings** on that person's page.
- The nickname, age, hometown and other "facts" are the `facts: [ … ]` list. Add a line:
  `{ label: "Birthday", value: "…" },`

---

## 4. Replace a profile picture

1. Put the new photo in that person's folder, e.g. `public/images/leah/new-photo.jpg`.
2. In `src/data/leah.js` change one line: `profile: "new-photo.jpg",`
3. If the face is cut off, adjust `profilePosition: "50% 25%"` (first number = left/right, second = up/down, 0%–100%).

The same `profile` photo is used on the homepage card.

**Photo tips:** use `.jpg`, about 1000–1600 px on the long side, under ~400 KB. Large phone photos make the site slow.

> **Marvin's profile photo:** `portrait.jpg` is the studio portrait that was in his folder. If you want a different one, put it in `public/images/marvin/` and change `profile:` in `marvin.js`.

---

## 5. Add or remove gallery photos

In the person's data file find `gallery:` and add a line:

```js
gallery: [
  { file: "summit.jpg", caption: "ROTC Advance Cadets Summit 2025" },
  { file: "my-new-photo.jpg", caption: "What this photo shows" },   // ← new
],
```

The file must be inside that person's folder (`public/images/<name>/`). To remove a photo, delete its line.

The **homepage** gallery is in `src/data/group.js`. Each line says whose folder the photo comes from:
`{ owner: "leah", file: "costume.jpg", caption: "In costume", wide: true }` (`owner` is `gerome`, `leah`, `marvin` or `group`; `wide: true` makes the tile bigger). The big group photo is `public/images/group/trio.jpg`.

---

## 6. Hobbies, skills, education, projects, achievements

All in the person's data file:

```js
hobbies:  [ { title: "Music", text: "…" }, … ],
skills:   [ { group: "Technical", items: ["Canva", "Excel"] }, … ],
education:[ { school: "…", level: "…", period: "4th Year · Current" }, … ],
projects: [ { title: "Capstone Project", role: "Programmer", description: "…", photo: "file.jpg" }, … ],
achievements: [ { title: "Certificate name", detail: "Who gave it · year", photo: "file.jpg" }, … ],
```

- **Add a project/achievement/hobby:** copy one `{ … },` block, paste it below, change the words.
- **Remove one:** delete its whole `{ … },` block.
- `description` and `photo` are optional — leave `""` if you have nothing yet.
- Skills are plain lists (no percentages, on purpose).

## 7. Social links and contact

```js
contact: {
  email: "name@gmail.com",
  links: [
    { label: "Facebook",  url: "https://www.facebook.com/…" },
    { label: "Instagram", url: "https://www.instagram.com/…" },   // add more lines like this
  ],
},
```

The email and links also appear in the homepage footer automatically.

---

## 8. Put it online with Render (one deployment)

1. Create a GitHub repository and upload this project folder (the original photo folders and the CSV are listed in `.gitignore`, so they stay on your computer).
2. On [render.com](https://render.com): **New → Static Site** → connect the repository.
3. Use exactly:
   - **Build Command:** `npm install && npm run build`
   - **Publish Directory:** `dist`
4. Click **Create Static Site**. When it finishes you get one address; all four pages work under it:
   `/`, `/gerome/`, `/leah/`, `/marvin/`.

(Alternatively: **New → Blueprint** and Render reads the included `render.yaml`, which has the same settings.)

## 9. Update the live website later

Edit files → save → push to GitHub:

```bash
git add .
git commit -m "Update portfolio content"
git push
```

Render rebuilds automatically (about 1 minute). Check locally first with `npm run build` then `npm run preview` if you like.

---

## Troubleshooting

- **A page is blank after I edited a data file** — you probably deleted a quote `"`, comma `,` or bracket. The terminal running `npm run dev` shows the line number.
- **A photo doesn't show** — the file name in the data file must match the file in `public/images/<name>/` exactly, including upper/lower case and `.jpg`.
- **Changed a photo but still see the old one** — hard-refresh the browser (Ctrl + Shift + R).
