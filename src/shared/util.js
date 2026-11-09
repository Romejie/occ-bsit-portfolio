// Small helpers shared by every page. You normally never need to edit this file.

import gerome from "../data/gerome.js";
import leah from "../data/leah.js";
import marvin from "../data/marvin.js";

export const people = { gerome, leah, marvin };

/** Escape text so it is always shown as plain text. */
export const esc = (value = "") =>
  String(value)
    .replaceAll("&", "&amp;")
    .replaceAll("<", "&lt;")
    .replaceAll(">", "&gt;")
    .replaceAll('"', "&quot;");

/** Full URL path for a photo inside a person's folder. */
export const photo = (person, file) => (file ? person.imageFolder + file : "");

/** Navigation items: Home + one link per member (names come from the data files). */
export const navItems = [
  { key: "home", label: "Home", href: "/" },
  { key: "gerome", label: gerome.name.first, href: gerome.route },
  { key: "leah", label: leah.name.first, href: leah.route },
  { key: "marvin", label: marvin.name.first, href: marvin.route },
];

/** The <a> links for the shared navigation. */
export const navLinks = (current) =>
  navItems
    .map(
      (item) =>
        `<a href="${item.href}"${item.key === current ? ' aria-current="page"' : ""}>${esc(item.label)}</a>`
    )
    .join("");

/** Makes the mobile menu button work. */
export function initNavToggle() {
  const button = document.querySelector("[data-nav-toggle]");
  const menu = document.querySelector("[data-nav]");
  if (!button || !menu) return;
  const set = (open) => {
    menu.classList.toggle("is-open", open);
    button.setAttribute("aria-expanded", String(open));
  };
  button.addEventListener("click", () => set(!menu.classList.contains("is-open")));
  menu.addEventListener("click", (e) => {
    if (e.target.closest("a")) set(false);
  });
  document.addEventListener("keydown", (e) => e.key === "Escape" && set(false));
}

/** Fade-in on scroll (skipped when the visitor prefers reduced motion). */
export function initReveal() {
  const items = document.querySelectorAll("[data-reveal]");
  const reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduce || !("IntersectionObserver" in window)) {
    items.forEach((el) => el.classList.add("is-visible"));
    return;
  }
  const io = new IntersectionObserver(
    (entries) =>
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          io.unobserve(entry.target);
        }
      }),
    { threshold: 0.12 }
  );
  items.forEach((el) => io.observe(el));
}

/** Simple image lightbox for any element with [data-lightbox] around an <img>. */
export function initLightbox() {
  const triggers = document.querySelectorAll("[data-lightbox]");
  if (!triggers.length) return;
  const dialog = document.createElement("dialog");
  dialog.className = "lightbox";
  dialog.innerHTML =
    '<button type="button" class="lightbox__close" aria-label="Close photo">×</button><img alt=""><p class="lightbox__cap"></p>';
  document.body.append(dialog);
  const img = dialog.querySelector("img");
  const cap = dialog.querySelector(".lightbox__cap");
  triggers.forEach((t) =>
    t.addEventListener("click", () => {
      const src = t.querySelector("img");
      img.src = src.currentSrc || src.src;
      img.alt = src.alt;
      cap.textContent = t.dataset.caption || "";
      dialog.showModal();
    })
  );
  dialog.addEventListener("click", (e) => {
    if (e.target === dialog || e.target.closest(".lightbox__close")) dialog.close();
  });
}
