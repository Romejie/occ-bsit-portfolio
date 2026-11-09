import "../shared/base.css";
import "./marvin.css";
import p from "../data/marvin.js";
import { esc, photo, navLinks, initNavToggle, initReveal, initLightbox } from "../shared/util.js";

const T = p.titles;
const snake = (s) => s.toLowerCase().replace(/[^a-z0-9]+/g, "_").replace(/^_|_$/g, "");

const win = (id, title, body, cls = "") => `
<section class="win ${cls}" id="${id}" data-reveal>
  <div class="win__bar"><span class="dots" aria-hidden="true"><i></i><i></i><i></i></span><h2>${esc(title)}</h2></div>
  <div class="win__body">${body}</div>
</section>`;

const sections = [
  ["about", T.about],
  ["profile", T.background],
  ["offduty", T.hobbies],
  ["stack", T.skills],
  ["history", T.education],
  ["projects", T.projects],
  ["certs", T.achievements],
  ["shots", T.gallery],
  ["contact", T.contact],
];

const side = `
<aside class="side" id="nav" data-nav>
  <p class="side__prompt"><span>${esc(p.name.first.toLowerCase())}</span>@occ:~$</p>
  <nav aria-label="Pages"><p class="side__h">pages</p>${navLinks("marvin")}</nav>
  <nav class="side__sections" aria-label="On this page"><p class="side__h">sections</p>${sections
    .map(([id, t]) => `<a href="#${id}">${esc(t)}</a>`)
    .join("")}</nav>
</aside>`;

const topbar = `
<header class="top">
  <a class="top__brand" href="/"><span>${esc(p.name.first.toLowerCase())}</span>@occ:~$</a>
  <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="nav"><span class="sr-only">Menu</span><span aria-hidden="true"></span></button>
</header>`;

const termLines = [
  { cmd: "whoami", out: p.name.full },
  { cmd: "cat role.txt", out: `${p.role} · BSIT 4th year · Opol Community College` },
  { cmd: "echo $MOTTO", out: `“${p.statement}”` },
];

const hero = `
<section class="hero">
  <div class="hero__term" aria-label="Terminal introduction">
    <div class="win__bar"><span class="dots" aria-hidden="true"><i></i><i></i><i></i></span><span class="win__file">intro.sh</span></div>
    <div class="term" data-term>
      ${termLines
        .map(
          (l) => `<p class="term__cmd"><span class="term__ps">$</span> <span data-type>${esc(l.cmd)}</span></p><p class="term__out" data-type>${esc(l.out)}</p>`
        )
        .join("")}
      <p class="term__cmd"><span class="term__ps">$</span> <span class="term__cursor" aria-hidden="true"></span></p>
    </div>
    <div class="hero__cta">
      <a class="btn btn--sun" href="#projects">View projects</a>
      <a class="btn" href="#contact">Contact</a>
    </div>
  </div>
  <figure class="avatar">
    <div class="sun" aria-hidden="true"></div>
    <img src="${photo(p, p.profile)}" alt="Portrait of ${esc(p.name.full)}" width="1000" height="1000" fetchpriority="high" style="object-position:${esc(p.profilePosition)}">
    <figcaption><b>${esc(p.name.nickname)}</b> / ${esc(p.name.full)}</figcaption>
  </figure>
</section>`;

const jsonRows = p.facts
  .map((f, i) => `<span class="ln"><span class="k">"${esc(f.label)}"</span>: <span class="s">"${esc(f.value)}"</span>${i < p.facts.length - 1 ? "," : ""}</span>`)
  .join("");

const about = win(
  "about", T.about,
  `<div class="md">
    ${p.about.map((t, i) => `<p><span class="md__n" aria-hidden="true">${String(i + 1).padStart(2, "0")}</span>${esc(t)}</p>`).join("")}
  </div>`
);

const profile = win(
  "profile", T.background,
  `<div class="profile">
    <pre class="json" aria-label="Profile facts"><span class="ln">{</span>${jsonRows}<span class="ln">}</span></pre>
    <div>
      <p class="cm">// strengths</p>
      <p class="traits-intro">${esc(p.strengths.intro)}</p>
      <ul class="tags">${p.strengths.items.map((s) => `<li>#${esc(s.toLowerCase())}</li>`).join("")}</ul>
    </div>
  </div>
  <div class="why">
    <div><p class="cm">// ${esc(p.motivation.title.toLowerCase())}</p><p>${esc(p.motivation.text)}</p></div>
    <div><p class="cm">// career goal</p><p>${esc(p.goal)}</p></div>
  </div>`
);

const hobbies = win(
  "offduty", T.hobbies,
  `${p.hobbiesIntro ? `<p class="lead">${esc(p.hobbiesIntro)}</p>` : ""}
   <div class="hob">
    ${p.hobbies
      .map(
        (h, i) => `<article class="hob__item hob__item--${i % 4}">
          <h3>${esc(h.title)}</h3>
          ${h.text ? `<p>${esc(h.text)}</p>` : ""}
          ${h.tags ? `<ul class="games">${h.tags.map((t) => `<li>${esc(t)}</li>`).join("")}</ul>` : ""}
        </article>`
      )
      .join("")}
   </div>`
);

const skills = win(
  "stack", T.skills,
  `<pre class="code" aria-label="Skills">${p.skills
    .map(
      (g) => `<span class="ln"><span class="kw">const</span> <span class="v">${esc(snake(g.group))}</span> = [</span>${g.items
        .map((it, i) => `<span class="ln ind"><span class="s">"${esc(it)}"</span>${i < g.items.length - 1 ? "," : ""}</span>`)
        .join("")}<span class="ln">];</span>`
    )
    .join("<span class=\"ln\"></span>")}</pre>`
);

const education = win(
  "history", T.education,
  `<ol class="log">
    ${p.education
      .map(
        (e) => `<li><span class="log__t">${esc(e.period || "earlier")}</span><div><h3>${esc(e.school)}</h3><p>${esc(e.level)}</p></div></li>`
      )
      .join("")}
  </ol>`
);

const projects = win(
  "projects", T.projects,
  `<div class="proj">
    ${p.projects
      .map(
        (pr) => `<article class="proj__item">
          <div>
            <p class="cm">// role: ${esc(pr.role)}</p>
            <h3>${esc(pr.title)}</h3>
            ${pr.description ? `<p>${esc(pr.description)}</p>` : ""}
          </div>
          ${pr.photo ? `<button type="button" class="proj__pic" data-lightbox data-caption="${esc(pr.title)}"><img src="${photo(p, pr.photo)}" alt="${esc(pr.title)}" loading="lazy"></button>` : ""}
        </article>`
      )
      .join("")}
  </div>`
);

const certs = win(
  "certs", T.achievements,
  `<ul class="certs">
    ${p.achievements.map((a) => `<li><span class="ok" aria-hidden="true">✓</span><div><h3>${esc(a.title)}</h3>${a.detail ? `<p>${esc(a.detail)}</p>` : ""}</div></li>`).join("")}
  </ul>`
);

const shots = win(
  "shots", T.gallery,
  `<div class="shots">
    ${p.gallery
      .map(
        (g, i) => `<button type="button" class="shot shot--${i % 5}" data-lightbox data-caption="${esc(g.caption)}">
          <img src="${photo(p, g.file)}" alt="${esc(g.caption)}" loading="lazy">
          <span>${esc(g.file)} — ${esc(g.caption)}</span>
        </button>`
      )
      .join("")}
  </div>`
);

const contact = win(
  "contact", T.contact,
  `<div class="term term--static">
    <p class="term__cmd"><span class="term__ps">$</span> mail --to ${esc(p.name.first.toLowerCase())}</p>
    <p class="term__out"><a class="big" href="mailto:${esc(p.contact.email)}">${esc(p.contact.email)}</a></p>
    ${p.contact.links
      .map(
        (l) => `<p class="term__cmd"><span class="term__ps">$</span> open ${esc(l.label.toLowerCase())}</p><p class="term__out"><a href="${esc(l.url)}" target="_blank" rel="noopener">${esc(l.url)} ↗</a></p>`
      )
      .join("")}
  </div>`
);

const footer = `
<footer class="foot">
  <p>// ${esc(p.name.full)} · BSIT · Opol Community College</p>
</footer>`;

document.querySelector("#app").innerHTML = `${topbar}<div class="shell">${side}<main id="main">${hero}${about}${profile}${hobbies}${skills}${education}${projects}${certs}${shots}${contact}${footer}</main></div>`;

/* typing intro (skipped for visitors who prefer reduced motion) */
function typeIntro() {
  const reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  const nodes = [...document.querySelectorAll("[data-type]")];
  if (reduce || !nodes.length) return;
  const texts = nodes.map((n) => n.textContent);
  nodes.forEach((n) => (n.textContent = ""));
  let i = 0;
  const next = () => {
    if (i >= nodes.length) return;
    const node = nodes[i], full = texts[i];
    const isCmd = node.closest(".term__cmd");
    let c = 0;
    const tick = () => {
      node.textContent = full.slice(0, ++c);
      if (c < full.length) setTimeout(tick, isCmd ? 32 : 7);
      else { i++; setTimeout(next, isCmd ? 120 : 80); }
    };
    tick();
  };
  next();
}
typeIntro();

initNavToggle();
initReveal();
initLightbox();
