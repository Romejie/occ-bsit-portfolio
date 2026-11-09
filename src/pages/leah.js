import "../shared/base.css";
import "./leah.css";
import p from "../data/leah.js";
import { esc, photo, navLinks, initNavToggle, initReveal, initLightbox } from "../shared/util.js";

const T = p.titles;
const roman = ["I", "II", "III", "IV", "V", "VI", "VII"];
const marqueeText = `Now showing &nbsp;✦&nbsp; ${esc(p.name.full)} &nbsp;✦&nbsp; ${esc(p.role)} &nbsp;✦&nbsp; Bachelor of Science in Information Technology &nbsp;✦&nbsp; `;

const sec = (id, kicker, title, body, cls = "") => `
<section class="sec ${cls}" id="${id}">
  <div class="wrap">
    <header class="sec__head" data-reveal>
      <p class="kicker">${esc(kicker)}</p>
      <h2>${esc(title)}</h2>
    </header>
    ${body}
  </div>
</section>`;

const header = `
<div class="marquee" aria-hidden="true"><div class="marquee__track"><span>${marqueeText.repeat(4)}</span><span>${marqueeText.repeat(4)}</span></div></div>
<header class="mast">
  <a class="mast__brand" href="/">${esc(p.name.first)} <i>${esc(p.name.last)}</i></a>
  <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="nav"><span class="sr-only">Menu</span><span aria-hidden="true"></span></button>
  <nav id="nav" class="mast__nav" data-nav aria-label="Main">${navLinks("leah")}</nav>
</header>`;

const hero = `
<section class="hero">
  <div class="wrap hero__grid">
    <div class="hero__copy">
      <p class="hero__pre">A BSIT story in four chapters</p>
      <h1><span>Leah <em>Mae</em></span><span>Actub</span></h1>
      <p class="hero__tag">${esc(p.tagline)}</p>
      <blockquote>“${esc(p.statement)}”</blockquote>
      <div class="hero__cta">
        <a class="btn btn--red" href="#story">Read the story</a>
        <a class="btn" href="#contact">Say hello</a>
      </div>
    </div>
    <figure class="poster">
      <span class="poster__circle" aria-hidden="true"></span>
      <div class="poster__arch"><img src="${photo(p, p.profile)}" alt="Portrait of ${esc(p.name.full)}" width="1101" height="1048" fetchpriority="high" style="object-position:${esc(p.profilePosition)}"></div>
      <figcaption>${esc(p.role)} · Opol Community College · 4th year</figcaption>
    </figure>
  </div>
</section>`;

const story = sec(
  "story", "Chapter one", T.about,
  `<div class="story">
    <div class="story__text" data-reveal>${p.about.map((t) => `<p>${esc(t)}</p>`).join("")}</div>
    <aside class="cast" data-reveal aria-label="${esc(T.background)}">
      <h3>${esc(T.background)}</h3>
      <dl>${p.facts.map((f) => `<div><dt>${esc(f.label)}</dt><dd>${esc(f.value)}</dd></div>`).join("")}</dl>
    </aside>
  </div>
  <div class="traits" data-reveal>
    <p class="traits__intro">${esc(p.strengths.intro)}</p>
    <ul>${p.strengths.items.map((s) => `<li>${esc(s)}</li>`).join("")}</ul>
  </div>`
);

const drive = `
<section class="drive" aria-labelledby="drive-h">
  <div class="wrap drive__grid">
    <div data-reveal><p class="kicker kicker--light">${esc(p.motivation.title)}</p><p class="drive__quote" id="drive-h">${esc(p.motivation.text)}</p></div>
    <div data-reveal><p class="kicker kicker--light">The dream</p><p class="drive__goal">${esc(p.goal)}</p></div>
  </div>
</section>`;

const hobbies = sec(
  "offscreen", "Chapter two", T.hobbies,
  `${p.hobbiesIntro ? `<p class="lead" data-reveal>${esc(p.hobbiesIntro)}</p>` : ""}
   <div class="posters">
    ${p.hobbies
      .map(
        (h, i) => `<article class="mini mini--${i % 3}" data-reveal>
          <span class="mini__n" aria-hidden="true">${String(i + 1).padStart(2, "0")}</span>
          <h3>${esc(h.title)}</h3>
          <p>${esc(h.text)}</p>
        </article>`
      )
      .join("")}
   </div>`
);

const skills = `
<section class="credits" id="credits">
  <div class="wrap">
    <header class="sec__head sec__head--center" data-reveal><p class="kicker kicker--light">The skills</p><h2>${esc(T.skills)}</h2></header>
    ${p.skills
      .map(
        (g) => `<div class="credits__group" data-reveal>
          <p class="credits__role">${esc(g.group)}</p>
          <ul>${g.items.map((i) => `<li>${esc(i)}</li>`).join("")}</ul>
        </div>`
      )
      .join("")}
  </div>
</section>`;

const eduItems = [...p.education].reverse();
const education = sec(
  "chapters", "Where it started", T.education,
  `<ol class="chapters">
    ${eduItems
      .map(
        (e, i) => `<li data-reveal>
          <span class="chapters__n" aria-hidden="true">${roman[i]}</span>
          <h3>${esc(e.school)}</h3>
          <p>${esc(e.level)}</p>
          ${e.period ? `<p class="chapters__now">${esc(e.period)}</p>` : ""}
        </li>`
      )
      .join("")}
  </ol>`,
  "sec--tint"
);

const projects = sec(
  "work", "Featured work", T.projects,
  `${p.projectsIntro ? `<p class="lead" data-reveal>${esc(p.projectsIntro)}</p>` : ""}
   <ul class="reels">
    ${p.projects
      .map(
        (pr, i) => `<li data-reveal>
          <span class="reels__n">№ ${i + 1}</span>
          <h3>${esc(pr.title)}</h3>
          <p class="reels__role">${esc(pr.role)}</p>
          ${pr.description ? `<p>${esc(pr.description)}</p>` : ""}
        </li>`
      )
      .join("")}
   </ul>`
);

const awards = sec(
  "awards", "Applause", T.achievements,
  `<div class="awards">
    ${p.achievements
      .map(
        (a) => `<article class="award${a.photo ? " award--photo" : ""}" data-reveal>
          ${a.photo ? `<button type="button" class="award__pic" data-lightbox data-caption="${esc(a.title)}"><img src="${photo(p, a.photo)}" alt="${esc(a.title)}" loading="lazy"></button>` : ""}
          <div><h3>${esc(a.title)}</h3>${a.detail ? `<p>${esc(a.detail)}</p>` : ""}</div>
        </article>`
      )
      .join("")}
  </div>`,
  "sec--tint"
);

const gallery = `
<section class="roll" id="roll">
  <div class="wrap"><header class="sec__head" data-reveal><p class="kicker kicker--light">Behind the scenes</p><h2>${esc(T.gallery)}</h2></header></div>
  <div class="roll__scroll" tabindex="0" role="region" aria-label="${esc(T.gallery)} — scroll sideways">
    <div class="roll__track">
      ${p.gallery
        .map(
          (g) => `<button type="button" class="frame" data-lightbox data-caption="${esc(g.caption)}">
            <img src="${photo(p, g.file)}" alt="${esc(g.caption)}" loading="lazy">
            <span>${esc(g.caption)}</span>
          </button>`
        )
        .join("")}
    </div>
  </div>
</section>`;

const contact = sec(
  "contact", "Last scene", T.contact,
  `<div class="ticket" data-reveal>
    <div class="ticket__main">
      <p class="kicker">Admit one conversation</p>
      <a class="ticket__mail" href="mailto:${esc(p.contact.email)}">${esc(p.contact.email)}</a>
    </div>
    <ul class="ticket__stub">${p.contact.links.map((l) => `<li><a href="${esc(l.url)}" target="_blank" rel="noopener">${esc(l.label)} ↗</a></li>`).join("")}</ul>
  </div>`
);

const footer = `
<footer class="foot">
  <div class="wrap foot__in">
    <p>${esc(p.name.full)} · BSIT · Opol Community College</p>
    <nav aria-label="Footer">${navLinks("leah")}</nav>
  </div>
</footer>`;

document.querySelector("#app").innerHTML = `${header}<main id="main">${hero}${story}${drive}${hobbies}${skills}${education}${projects}${awards}${gallery}${contact}</main>${footer}`;

initNavToggle();
initReveal();
initLightbox();
