// ============================================================
//  GROUP HOMEPAGE CONTENT  —  edit the text between quotes.
//  Group photos live in:  public/images/group/
//  Member names, roles, photos and links come from each member's
//  own file (gerome.js, leah.js, marvin.js), so change them there.
// ============================================================

import gerome from "./gerome.js";
import leah from "./leah.js";
import marvin from "./marvin.js";

export const members = [gerome, leah, marvin];

export default {
  siteTitle: "OCC BSIT · Three Portfolios",
  school: "Opol Community College",
  program: "BSIT · 4th Year",

  hero: {
    eyebrow: "Opol Community College · BSIT · 4th Year",
    headline: ["Three students.", "Three stories."],
    text: "Meet Gerome, Leah, and Marvin — three Information Technology students with three different paths. Pick a portfolio to get to know each of us.",
    photo: "trio.jpg", // inside public/images/group/
    photoAlt: "Gerome, Leah, and Marvin standing together in a hallway",
    photoCaption: "Gerome · Leah · Marvin",
  },

  about: {
    title: "About us",
    text: [
      "We are fourth-year Bachelor of Science in Information Technology students at Opol Community College.",
      "Gerome plans and analyzes systems, Marvin writes the code, and Leah puts the work into words. This website is where each of us tells our own story.",
    ],
  },

  membersTitle: "Meet the three",
  galleryTitle: "Snapshots",

  // Photos for the homepage gallery. "owner" must be: gerome, leah or marvin
  // (the photo is read from that person's folder), or "group".
  gallery: [
    { owner: "gerome", file: "summit.jpg", caption: "ROTC Advance Cadets Summit 2025", wide: true },
    { owner: "leah", file: "costume.jpg", caption: "In costume" },
    { owner: "marvin", file: "stairs.jpg", caption: "With Leah" },
    { owner: "leah", file: "red-team.jpg", caption: "BSIT Department", wide: true },
    { owner: "gerome", file: "squad.jpg", caption: "In uniform" },
    { owner: "marvin", file: "blue-team.jpg", caption: "Blue-vest group", wide: true },
  ],

  footer: {
    note: "Opol Community College · Opol, Misamis Oriental",
  },
};
