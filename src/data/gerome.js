// ============================================================
//  GEROME'S PORTFOLIO CONTENT  —  edit the text between quotes.
//  Photos live in:  public/images/gerome/
//  To change a photo: put the new file in that folder and change
//  the file name below (e.g. profile: "my-new-photo.jpg").
//  Leave a value as "" (or remove the item) to hide it on the page.
// ============================================================

export default {
  route: "/gerome/",

  name: {
    full: "Gerome Bahian Miñoza",
    first: "Gerome",
    last: "Miñoza",
    nickname: "Toto",
  },
  role: "System Analyst",
  badge: "ARMY", // second name tape on the portrait card
  tagline: "Information Technology Student · Army Reservist",
  statement: "Duty, service, and personal standards.",
  // One sentence shown on the group homepage card
  shortIntro:
    "Balances IT studies with service as an Army Reservist, bringing discipline to every system he plans.",

  // ---------- PHOTOS (file names inside public/images/gerome/) ----------
  imageFolder: "/images/gerome/",
  profile: "hero.jpg", // main portrait
  profilePosition: "50% 88%", // how the portrait is cropped (x% y%)

  // ---------- SECTION TITLES (change the wording if you like) ----------
  titles: {
    about: "Mission Brief",
    background: "Profile",
    hobbies: "Field Activities",
    skills: "Loadout",
    education: "Training & Education",
    projects: "Operations Log",
    achievements: "Commendations",
    gallery: "Field Photos",
    contact: "Contact",
  },

  // ---------- ABOUT ME ----------
  about: [
    "I am a dedicated Information Technology student balancing academic advancement with active military service as a Reservist in Charlie Company, 1001st CDC (10 RCDG, RCPA).",
    "Managing both rigorous coursework and military obligations has instilled in me exceptional discipline, strategic problem-solving skills, and operational adaptability. My dual role reflects a strong commitment to continuous self-improvement and service to the community.",
    "I thrive in high-pressure environments where technical acumen and clear, dependable leadership are required.",
  ],

  // ---------- PERSONAL BACKGROUND (label / value rows) ----------
  facts: [
    { label: "Nickname", value: "Toto" },
    { label: "Age", value: "24" },
    { label: "From", value: "Zone 1A Danao, Patag, Opol, Misamis Oriental" },
    { label: "Program", value: "Bachelor of Science in Information Technology" },
    { label: "Team role", value: "System Analyst" },
    { label: "Reserve unit", value: "Charlie Company, 1001st CDC (10 RCDG, RCPA)" },
  ],

  strengths: [
    {
      title: "High-Pressure Resilience",
      text: "Operating as an active Army Reservist while maintaining a demanding IT workload demonstrates a high tolerance for stress, strong composure, and the ability to make clear decisions in fast-paced environments.",
    },
    {
      title: "Accountability and Structure",
      text: "Military service instills absolute reliability, self-discipline, and respect for chain-of-command operations, ensuring projects are executed systematically from planning through completion.",
    },
  ],

  motivation: {
    title: "Duty, Service, and Personal Standards",
    text: "As an Army Reservist, I hold myself to high standards of discipline, readiness, and accountability.",
  },

  goal:
    "To become a trusted, multi-disciplinary leader — someone who can architect high-performing technical systems under demanding conditions while mentoring and guiding teams with clarity, discipline, and purpose.",

  // ---------- HOBBIES AND INTERESTS ----------
  hobbies: [
    {
      title: "Rucking and Trail Hiking",
      text: "Carrying a weighted pack on scenic trails or local routes to build stamina while enjoying nature.",
    },
    {
      title: "Land Navigation",
      text: "Practicing map-reading, compass orientation, and route-planning skills outdoors.",
    },
  ],

  // ---------- SKILLS (no levels or percentages) ----------
  skills: [
    { group: "Technical", items: ["Computer Repair"] },
    { group: "Programming", items: ["PHP"] },
    { group: "Soft skills", items: ["Leadership"] },
  ],

  // ---------- EDUCATION (newest first) ----------
  education: [
    {
      school: "Opol Community College",
      level: "Bachelor of Science in Information Technology",
      period: "4th Year · Current",
    },
    {
      school: "Opol National Secondary Technical School",
      level: "Previous school",
      period: "",
    },
  ],

  // ---------- PROJECTS (add or delete blocks freely) ----------
  projects: [
    { title: "Capstone Project", role: "System Analyst", description: "", photo: "" },
    { title: "IoT Project", role: "System Analyst", description: "", photo: "" },
    { title: "Portfolio Website", role: "System Analyst", description: "", photo: "" },
  ],

  // ---------- ACHIEVEMENTS ----------
  // Add real certificates/awards here once you have the details, e.g.
  // { title: "Certificate name", detail: "Who gave it · year", photo: "file.jpg" }
  achievements: [
    {
      title: "Army Reservist",
      detail: "Charlie Company, 1001st CDC (10 RCDG, RCPA)",
      photo: "squad.jpg",
    },
    {
      title: "ROTC Advance Cadets Summit 2025",
      detail: "“Empowering Future Leaders through Discipline, Patriotism, and Service”",
      photo: "summit.jpg",
    },
  ],

  // ---------- GALLERY ----------
  gallery: [
    { file: "summit.jpg", caption: "ROTC Advance Cadets Summit 2025" },
    { file: "range.jpg", caption: "Rifle zeroing, 25 m" },
    { file: "squad.jpg", caption: "In uniform with the group" },
    { file: "cadets.jpg", caption: "ROTC training group" },
    { file: "fiesta.jpg", caption: "Off duty" },
  ],

  // ---------- CONTACT ----------
  contact: {
    email: "occ.minoza.gerome@gmail.com",
    links: [
      { label: "Facebook", url: "https://www.facebook.com/share/1ERu8AVLgM/" },
    ],
  },
};
