import "../shared/base.css";
import "./home.css";
import group, { members } from "../data/group.js";
import { esc, photo, navLinks, people, initNavToggle, initReveal } from "../shared/util.js";

const slugs = ["gerome", "leah", "marvin"];
const groupPhoto = (file) => "/images/group/" + file;

const header = `
<header class="top">
  <a class="brand" href="/" aria-label="Home"><span class="brand__bars" aria-hidden="true"><i></i><i></i><i></i></span>${esc(group.school)}</a>
  <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="nav"><span class="sr-only">Menu</span><span aria-hidden="true"></span></button>
  <nav id="nav" class="nav" data-nav aria-label="Main">${navLinks("home")}</nav>
</header>`;

const hero = `
<section class="hero">
  <div class="hero__text">
    <p class="eyebrow">${esc(group.hero.eyebrow)}</p>
    <h1>${group.hero.headline.map((l) => `<span>${esc(l)}</span>`).join("")}</h1>
    <p class="hero__lead">${esc(group.hero.text)}</p>
    <ul class="hero__links">
      ${members
        .map(
          (m, i) =>
            `<li><a class="pill pill--${slugs[i]}" href="${m.route}"><i aria-hidden="true"></i>${esc(m.name.first)}<small>${esc(m.role)}</small></a></li>`
        )
        .join("")}
    </ul>
  </div>
  <figure class="hero__photo">
    <span class="hero__stripe" aria-hidden="true"><i></i><i></i><i></i></span>
    <img src="${groupPhoto(group.hero.photo)}" alt="${esc(group.hero.photoAlt)}" width="1006" height="1350" fetchpriority="high">
    <figcaption>${esc(group.hero.photoCaption)}</figcaption>
  </figure>
</section>`;

const about = `
<section class="about" id="about" data-reveal>
  <h2 class="label">${esc(group.about.title)}</h2>
  <p class="about__big">${esc(group.about.text[0])}</p>
  ${group.about.text.slice(1).map((t) => `<p class="about__small">${esc(t)}</p>`).join("")}
</section>`;

const memberCards = members
  .map(
    (m, i) => `
  <article class="member member--${slugs[i]}" data-reveal>
    <a class="member__photo" href="${m.route}" tabindex="-1" aria-hidden="true">
      <img src="${photo(m, m.profile)}" alt="" loading="lazy" style="object-position:${esc(m.profilePosition)}">
    </a>
    <div class="member__body">
      <p class="member__role">${esc(m.role)}</p>
      <h3>${esc(m.name.full)}</h3>
      <p class="member__nick">“${esc(m.name.nickname)}”</p>
      <p>${esc(m.shortIntro)}</p>
      <a class="btn" href="${m.route}">${esc(m.name.first)}’s portfolio <span aria-hidden="true">→</span></a>
    </div>
  </article>`
  )
  .join("");

const tiles = group.gallery
  .map((g) => {
    const owner = people[g.owner];
    const src = owner ? photo(owner, g.file) : groupPhoto(g.file);
    const href = owner ? owner.route : "/";
    const who = owner ? owner.name.first : "Group";
    return `<a class="tile${g.wide ? " tile--wide" : ""}" href="${href}" data-reveal>
      <img src="${src}" alt="${esc(g.caption)}" loading="lazy">
      <span class="tile__cap"><b>${esc(who)}</b> ${esc(g.caption)}</span>
    </a>`;
  })
  .join("");

const footer = `
<footer class="foot">
  <div class="foot__grid">
    <div>
      <p class="foot__brand">${esc(group.siteTitle)}</p>
      <p>${esc(group.footer.note)}</p>
    </div>
    <nav aria-label="Footer"><h2 class="label">Pages</h2><div class="foot__links">${navLinks("home")}</div></nav>
    <div>
      <h2 class="label">Contact</h2>
      <ul class="foot__contact">
        ${members
          .map(
            (m) =>
              `<li><b>${esc(m.name.first)}</b> <a href="mailto:${esc(m.contact.email)}">${esc(m.contact.email)}</a>${m.contact.links
                .map((l) => ` · <a href="${esc(l.url)}" target="_blank" rel="noopener">${esc(l.label)}</a>`)
                .join("")}</li>`
          )
          .join("")}
      </ul>
    </div>
  </div>
</footer>`;

document.title = group.siteTitle;
document.querySelector("#app").innerHTML = `${header}<main id="main">${hero}${about}
<section class="members" id="members"><h2 class="members__title">${esc(group.membersTitle)}</h2><div class="members__grid">${memberCards}</div></section>
<section class="snap" id="snapshots"><h2 class="label">${esc(group.galleryTitle)}</h2><div class="mosaic">${tiles}</div></section>
</main>${footer}`;

initNavToggle();
initReveal();
