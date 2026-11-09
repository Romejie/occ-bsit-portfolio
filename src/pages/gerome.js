import "../shared/base.css";
import "./gerome.css";
import p from "../data/gerome.js";
import { esc, photo, navLinks, initNavToggle, initReveal, initLightbox } from "../shared/util.js";

/* ---------- Digital-camo texture (drawn once, seeded so it never changes) ---------- */
function makeCamo() {
  const size = 480, cell = 16, n = size / cell;
  const c = document.createElement("canvas");
  c.width = c.height = size;
  const g = c.getContext("2d");
  let s = 20260611;
  const rnd = () => ((s = (s * 1664525 + 1013904223) >>> 0) / 4294967296);
  g.fillStyle = "#2a3220";
  g.fillRect(0, 0, size, size);
  const layers = [
    ["#3a4527", 26], ["#4b5a2f", 22], ["#5d6c39", 14], ["#58452f", 14], ["#8a7a5a", 5],
  ];
  for (const [color, blobs] of layers) {
    g.fillStyle = color;
    for (let b = 0; b < blobs; b++) {
      let x = Math.floor(rnd() * n), y = Math.floor(rnd() * n);
      const len = 4 + Math.floor(rnd() * 14);
      for (let i = 0; i < len; i++) {
        const w = 1 + Math.floor(rnd() * 3), h = 1 + Math.floor(rnd() * 2);
        // wrap around so the tile repeats without seams
        for (let dx = 0; dx < w; dx++)
          for (let dy = 0; dy < h; dy++)
            g.fillRect(((x + dx) % n) * cell, ((y + dy) % n) * cell, cell, cell);
        x = (x + (rnd() < 0.5 ? -1 : 1) + n) % n;
        y = (y + (rnd() < 0.5 ? -1 : 0) + n) % n;
      }
    }
  }
  return c.toDataURL("image/png");
}
document.documentElement.style.setProperty("--camo", `url(${makeCamo()})`);

/* ---------- Small builders ---------- */
const T = p.titles;
const sec = (id, num, title, body, cls = "") => `
<section class="sec ${cls}" id="${id}">
  <div class="wrap">
    <h2 class="sec__title" data-reveal><span class="mono">${num}</span> ${esc(title)}</h2>
    ${body}
  </div>
</section>`;
const chevronSvg = `<svg class="rank" viewBox="0 0 40 52" aria-hidden="true"><path d="M4 4h32v10L20 24 4 14z M4 18l16 10 16-10v10L20 38 4 28z M4 32l16 10 16-10v10L20 52 4 42z" fill="currentColor"/></svg>`;

/* ---------- Page ---------- */
const header = `
<header class="bar">
  <a class="bar__brand" href="/" aria-label="Back to the group homepage">${chevronSvg}<span><b>${esc(p.name.last)}</b> <i>/ ${esc(p.name.first)}</i></span></a>
  <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="nav"><span class="sr-only">Menu</span><span aria-hidden="true"></span></button>
  <nav id="nav" class="bar__nav" data-nav aria-label="Main">${navLinks("gerome")}</nav>
</header>`;

const hero = `
<section class="hero camo">
  <div class="hero__shade"></div>
  <div class="wrap hero__grid">
    <div class="hero__copy">
      <p class="mono hero__tag">// Personal portfolio · BSIT 4th year</p>
      <h1><span>${esc(p.name.first.toUpperCase())}</span><span>${esc(p.name.last.toUpperCase())}</span></h1>
      <p class="hero__role">${esc(p.role)} <em>·</em> Army Reservist</p>
      <p class="hero__tagline">${esc(p.tagline)}</p>
      <blockquote class="hero__quote">${esc(p.statement)}</blockquote>
      <div class="hero__cta">
        <a class="btn btn--solid" href="#about">Read the mission brief</a>
        <a class="btn" href="#contact">Contact</a>
      </div>
    </div>
    <figure class="idcard">
      <span class="idcard__corner c1"></span><span class="idcard__corner c2"></span><span class="idcard__corner c3"></span><span class="idcard__corner c4"></span>
      <img src="${photo(p, p.profile)}" alt="Portrait of ${esc(p.name.full)} in Army uniform" width="1050" height="1400" fetchpriority="high" style="object-position:${esc(p.profilePosition)}">
      <figcaption>
        <span class="tape">${esc(p.name.last.toUpperCase())}</span>
        <span class="tape tape--wide">${esc(p.badge)}</span>
      </figcaption>
    </figure>
  </div>
</section>
<div class="chevrons" aria-hidden="true"></div>`;

const about = sec(
  "about", "01", T.about,
  `<div class="about">
    <div class="about__text" data-reveal>${p.about.map((t) => `<p>${esc(t)}</p>`).join("")}</div>
    <dl class="dossier" data-reveal>
      ${p.facts.map((f) => `<div><dt class="mono">${esc(f.label)}</dt><dd>${esc(f.value)}</dd></div>`).join("")}
    </dl>
  </div>`
);

const profile = sec(
  "profile", "02", T.background,
  `<div class="cards">
    ${p.strengths
      .map((s, i) => `<article class="card" data-reveal><p class="mono card__n">STRENGTH 0${i + 1}</p><h3>${esc(s.title)}</h3><p>${esc(s.text)}</p></article>`)
      .join("")}
  </div>
  <div class="orders" data-reveal>
    <p class="mono">STANDING ORDERS</p>
    <h3>${esc(p.motivation.title)}</h3>
    <p>${esc(p.motivation.text)}</p>
  </div>
  <div class="objective" data-reveal>
    <p class="mono">OBJECTIVE</p>
    <p>${esc(p.goal)}</p>
  </div>`,
  "sec--khaki"
);

const hobbies = sec(
  "field", "03", T.hobbies,
  `<div class="topo">
    <ol class="waypoints">
      ${p.hobbies
        .map(
          (h, i) => `<li class="wp" data-reveal>
            <span class="wp__pin mono">WP-0${i + 1}</span>
            <h3>${esc(h.title)}</h3>
            <p>${esc(h.text)}</p>
          </li>`
        )
        .join("")}
    </ol>
    <svg class="compass" viewBox="0 0 120 120" aria-hidden="true"><circle cx="60" cy="60" r="54" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="60" cy="60" r="44" fill="none" stroke="currentColor" stroke-width="1" stroke-dasharray="2 5"/><path d="M60 14l9 46H51z" fill="#c9b27c"/><path d="M60 106l-9-46h18z" fill="currentColor" opacity=".5"/><circle cx="60" cy="60" r="4" fill="#161a10" stroke="currentColor"/><text x="60" y="11" text-anchor="middle" font-size="10" font-family="IBM Plex Mono" fill="currentColor">N</text></svg>
  </div>`
);

const skills = sec(
  "loadout", "04", T.skills,
  `<div class="gear">
    ${p.skills
      .map(
        (g, i) => `<div class="gear__col" data-reveal>
          <p class="mono">SLOT 0${i + 1} · ${esc(g.group.toUpperCase())}</p>
          <ul>${g.items.map((it) => `<li class="tape tape--big">${esc(it)}</li>`).join("")}</ul>
        </div>`
      )
      .join("")}
  </div>`,
  "sec--dark2"
);

const education = sec(
  "training", "05", T.education,
  `<ol class="timeline">
    ${p.education
      .map(
        (e) => `<li data-reveal>${chevronSvg}<div><h3>${esc(e.school)}</h3><p>${esc(e.level)}</p>${e.period ? `<p class="mono">${esc(e.period)}</p>` : ""}</div></li>`
      )
      .join("")}
  </ol>`,
  "sec--khaki"
);

const projects = sec(
  "operations", "06", T.projects,
  `<ol class="oplog">
    ${p.projects
      .map(
        (pr, i) => `<li data-reveal>
          <span class="mono oplog__n">OP-0${i + 1}</span>
          <div><h3>${esc(pr.title)}</h3>${pr.description ? `<p>${esc(pr.description)}</p>` : ""}</div>
          <span class="oplog__role mono">ROLE: ${esc(pr.role)}</span>
          ${pr.photo ? `<img src="${photo(p, pr.photo)}" alt="" loading="lazy">` : ""}
        </li>`
      )
      .join("")}
  </ol>`
);

const awards = sec(
  "commendations", "07", T.achievements,
  `<div class="awards">
    ${p.achievements
      .map(
        (a) => `<article class="award" data-reveal>
          ${a.photo ? `<img src="${photo(p, a.photo)}" alt="" loading="lazy">` : ""}
          <div><h3>${esc(a.title)}</h3>${a.detail ? `<p>${esc(a.detail)}</p>` : ""}</div>
        </article>`
      )
      .join("")}
  </div>`,
  "sec--dark2"
);

const gallery = sec(
  "photos", "08", T.gallery,
  `<div class="sheet">
    ${p.gallery
      .map(
        (g) => `<button type="button" class="shot" data-lightbox data-caption="${esc(g.caption)}" data-reveal>
          <img src="${photo(p, g.file)}" alt="${esc(g.caption)}" loading="lazy">
          <span class="tape">${esc(g.caption)}</span>
        </button>`
      )
      .join("")}
  </div>`,
  "sec--khaki"
);

const contact = sec(
  "contact", "09", T.contact,
  `<div class="comms" data-reveal>
    <a class="comms__mail" href="mailto:${esc(p.contact.email)}">${esc(p.contact.email)}</a>
    <ul>${p.contact.links.map((l) => `<li><a class="btn" href="${esc(l.url)}" target="_blank" rel="noopener">${esc(l.label)} ↗</a></li>`).join("")}</ul>
  </div>`
);

const footer = `
<footer class="foot">
  <div class="chevrons" aria-hidden="true"></div>
  <div class="wrap foot__in">
    <p class="mono">${esc(p.name.full)} · BSIT · Opol Community College</p>
    <nav class="foot__nav" aria-label="Footer">${navLinks("gerome")}</nav>
  </div>
</footer>`;

document.querySelector("#app").innerHTML = `${header}<main id="main">${hero}${about}${profile}${hobbies}${skills}${education}${projects}${awards}${gallery}${contact}</main>${footer}`;

initNavToggle();
initReveal();
initLightbox();
