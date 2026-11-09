// ============================================================
//  MARVIN'S PORTFOLIO CONTENT  —  edit the text between quotes.
//  Photos live in:  public/images/marvin/
//  To change a photo: put the new file in that folder and change
//  the file name below (e.g. profile: "my-new-photo.jpg").
//  Leave a value as "" (or remove the item) to hide it on the page.
// ============================================================

export default {
  route: "/marvin/",

  name: {
    full: "Marvin John M. Saa",
    first: "Marvin",
    last: "Saa",
    nickname: "Totong",
  },
  role: "Programmer",
  tagline: "BSIT Student · Programmer",
  statement:
    "Learning from my mistakes, facing challenges, and becoming a better version of myself every day.",
  // One sentence shown on the group homepage card
  shortIntro:
    "Creative, curious, and determined — a programmer who loves learning new things and exploring different ideas.",

  // ---------- PHOTOS (file names inside public/images/marvin/) ----------
  imageFolder: "/images/marvin/",
  profile: "portrait.jpg", // main portrait
  profilePosition: "50% 25%",

  // ---------- SECTION TITLES ----------
  titles: {
    about: "about.md",
    background: "profile.json",
    hobbies: "off_duty/",
    skills: "stack/",
    education: "history.log",
    projects: "projects/",
    achievements: "certificates/",
    gallery: "screenshots/",
    contact: "contact.sh",
  },

  // ---------- ABOUT ME ----------
  about: [
    "I am a creative, curious, and determined person who loves learning new things and exploring different ideas. I enjoy technology, designing, and expressing my creativity through different projects.",
    "I am hardworking, detail-oriented, and always willing to improve myself. I believe in learning from my mistakes, facing challenges, and becoming a better version of myself every day.",
  ],

  // ---------- PERSONAL BACKGROUND ----------
  facts: [
    { label: "nickname", value: "Totong" },
    { label: "age", value: "22" },
    { label: "from", value: "Zone 3, Taboc, Opol, Misamis Oriental" },
    { label: "program", value: "BS Information Technology" },
    { label: "role", value: "Programmer / Project Manager" },
  ],

  strengths: {
    intro:
      "My personal strengths are being creative, patient, adaptable, and determined. I am willing to learn new things, accept challenges, and improve myself. I also consider myself someone who can work independently and is open to new ideas and experiences.",
    items: ["Creative", "Patient", "Adaptable", "Determined"],
  },

  motivation: {
    title: "What keeps me learning",
    text: "My desire to improve myself, gain new knowledge, and discover things I haven't experienced before. I want to develop my skills, overcome challenges, and become a better version of myself. I also want to achieve my dreams and build a better future.",
  },

  goal:
    "To become a successful IT professional with a stable career. I want to improve my knowledge and skills in technology, especially programming and computer-related fields. I also dream of becoming financially independent, helping my family, traveling to different places, and enjoying the life I have worked hard for.",

  // ---------- HOBBIES AND INTERESTS ----------
  hobbiesIntro:
    "Activities that help me relax, express myself, and create wonderful memories.",
  hobbies: [
    { title: "Online games", text: "", tags: ["Mobile Legends", "Call of Duty", "Mutants: Genetic Gladiators", "Clash of Clans"] },
    { title: "Music & dancing", text: "Listening to music and dancing." },
    { title: "Cats & dogs", text: "Spending time with cats and dogs." },
    {
      title: "Beaches & sunsets",
      text: "Exploring different places, visiting beaches, enjoying the ocean view, and watching beautiful sunsets.",
    },
  ],

  // ---------- SKILLS (no levels or percentages) ----------
  skills: [
    { group: "Programming", items: ["Python", "JavaScript", "PHP", "Visual Basic (VB.NET)", "HTML & CSS", "SQL"] },
    { group: "Tools", items: ["Microsoft Word", "Excel", "PowerPoint", "Canva"] },
    { group: "Soft skills", items: ["Communication", "Teamwork", "Problem-solving", "Analysis"] },
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
      level: "Senior High & Junior High School",
      period: "",
    },
    {
      school: "Opol Central School",
      level: "Elementary",
      period: "",
    },
  ],

  // ---------- PROJECTS ----------
  projects: [
    {
      title: "Capstone Project",
      role: "Programmer / Project Manager",
      description:
        "Joining and completing these projects taught me the importance of patience, teamwork, responsibility, and problem-solving. I learned that making mistakes is part of the learning process — instead of giving up, I understand what went wrong, learn from it, and apply those lessons to my next project.",
      photo: "demo-day.jpg",
    },
  ],

  // ---------- ACHIEVEMENTS ----------
  // "Rotc Number" from the questionnaire is not shown yet — add it here once
  // you know exactly how it should read, e.g. { title: "...", detail: "..." }
  achievements: [
    { title: "IT Webinar Participation", detail: "Certificate of participation", photo: "" },
  ],

  // ---------- GALLERY ----------
  gallery: [
    { file: "selfie.jpg", caption: "Name tag on" },
    { file: "blue-team.jpg", caption: "Blue-vest group" },
    { file: "stairs.jpg", caption: "With Leah" },
    { file: "demo-day.jpg", caption: "With Leah and a classmate" },
    { file: "name-tags.jpg", caption: "With the team" },
  ],

  // ---------- CONTACT ----------
  contact: {
    email: "occ.saa.marvinjohn@gmail.com",
    links: [
      { label: "Facebook", url: "https://www.facebook.com/share/1A9kdLoSqw/" },
      { label: "Instagram", url: "https://www.instagram.com/ncly_mcxzne/" },
    ],
  },
};
