// ============================================================
//  LEAH'S PORTFOLIO CONTENT  —  edit the text between quotes.
//  Photos live in:  public/images/leah/
//  To change a photo: put the new file in that folder and change
//  the file name below (e.g. profile: "my-new-photo.jpg").
//  Leave a value as "" (or remove the item) to hide it on the page.
// ============================================================

export default {
  route: "/leah/",

  name: {
    full: "Leah Mae M. Actub",
    first: "Leah",
    last: "Actub",
    nickname: "Yamae",
  },
  role: "Technical Writer",
  tagline: "BSIT Student · Technical Writer",
  statement: "Every experience teaches me something valuable.",
  // One sentence shown on the group homepage card
  shortIntro:
    "Motivated, patient, and responsible — the one who puts the team's work into words.",

  // ---------- PHOTOS (file names inside public/images/leah/) ----------
  imageFolder: "/images/leah/",
  profile: "main.jpg", // main portrait
  profilePosition: "50% 25%",

  // ---------- SECTION TITLES ----------
  titles: {
    about: "The Story",
    background: "Cast Notes",
    hobbies: "Off-Screen",
    skills: "Credits",
    education: "Chapters",
    projects: "Featured Work",
    achievements: "Awards & Certificates",
    gallery: "Film Roll",
    contact: "Get in Touch",
  },

  // ---------- ABOUT ME ----------
  about: [
    "I am a simple and motivated student who is eager to learn and explore new opportunities. I always try to give my best in my studies and responsibilities, even when things become challenging.",
    "I believe that every experience teaches me something valuable and helps me grow as a person. My goal is to finish my studies, achieve my dreams, and build a successful future.",
  ],

  // ---------- PERSONAL BACKGROUND ----------
  facts: [
    { label: "Nickname", value: "Yamae" },
    { label: "Age", value: "22" },
    { label: "From", value: "Zone 3, Luyong, Bonbon, Opol, Misamis Oriental" },
    { label: "Program", value: "Bachelor of Science in Information Technology" },
    { label: "Team role", value: "Technical Writer" },
  ],

  strengths: {
    intro:
      "I consider myself a hardworking, patient, and responsible person. I am always willing to learn new things and improve my abilities. I can work well with others, adapt to different situations, and face challenges with determination.",
    items: ["Hardworking", "Patient", "Responsible"],
  },

  motivation: {
    title: "What keeps me learning",
    text: "My desire to achieve my dreams and have a better future. I want to gain more knowledge, develop new skills, and become a better version of myself. My family also inspires me to work hard and never give up, especially when I face challenges. I believe that every lesson and experience brings me one step closer to my goals.",
  },

  goal:
    "To become successful in my chosen profession and build a stable future for myself and my family. I dream of having a good job where I can apply my knowledge, develop my skills, and continue learning new things — and to become financially independent, support my family, and achieve the goals I have been working hard for.",

  // ---------- HOBBIES AND INTERESTS ----------
  hobbiesIntro:
    "These activities allow me to enjoy my free time, relieve stress, and entertain myself.",
  hobbies: [
    {
      title: "Online Games",
      text: "I enjoy playing games because they help me relax and have fun.",
    },
    {
      title: "Movies",
      text: "I love watching movies, especially those with interesting stories and exciting scenes.",
    },
    {
      title: "Music",
      text: "Listening to music is part of how I spend my free time.",
    },
  ],

  // ---------- SKILLS (no levels or percentages) ----------
  skills: [
    { group: "Technical", items: ["Microsoft Word", "Excel", "PowerPoint", "Canva"] },
    { group: "Programming", items: ["HTML", "Python", "Visual Basic", "SQL"] },
    { group: "Soft skills", items: ["Teamwork", "Problem-solving"] },
  ],

  // ---------- EDUCATION (newest first) ----------
  education: [
    {
      school: "Opol Community College (OCC)",
      level: "Bachelor of Science in Information Technology",
      period: "4th Year · Current",
    },
    {
      school: "Opol National Secondary Technical School",
      level: "Junior & Senior High School",
      period: "",
    },
    {
      school: "Luyong Bonbon Elementary School",
      level: "Elementary",
      period: "",
    },
  ],

  // ---------- PROJECTS ----------
  projectsIntro:
    "Through completing my Capstone, WordPress Portfolio, and IoT Project, I learned how to apply my technical knowledge to real-world tasks. I improved my programming, web development, and problem-solving skills while gaining experience in teamwork, time management, and handling challenges during project development.",
  projects: [
    { title: "Capstone Project", role: "Technical Writer", description: "", photo: "" },
    { title: "WordPress Portfolio", role: "Technical Writer", description: "", photo: "" },
    { title: "IoT Project", role: "Technical Writer", description: "", photo: "" },
  ],

  // ---------- ACHIEVEMENTS ----------
  achievements: [
    {
      title: "Dance Competition Certificate",
      detail:
        "1st Place, Dance Contest — Christmas Event 2022, “A December to Remember: Christmas Wonderland.” Opol Community College, December 16, 2022 (BSIT Department).",
      photo: "certificate.jpg",
    },
    {
      title: "IT Webinar Certificate",
      detail: "Certificate of participation",
      photo: "",
    },
  ],

  // ---------- GALLERY ----------
  gallery: [
    { file: "costume.jpg", caption: "In costume" },
    { file: "red-team.jpg", caption: "BSIT Department, Christmas Event 2022" },
    { file: "blue-team.jpg", caption: "Blue-vest group" },
    { file: "certificate.jpg", caption: "1st place, Dance Contest" },
    { file: "duo.jpg", caption: "With Marvin" },
  ],

  // ---------- CONTACT ----------
  contact: {
    email: "occ.actub.leahmae@gmail.com",
    links: [
      { label: "Facebook", url: "https://www.facebook.com/share/1G3sFvMwPs/" },
    ],
  },
};
