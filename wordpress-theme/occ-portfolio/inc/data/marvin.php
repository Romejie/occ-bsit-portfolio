<?php
/**
 * Marvin John M. Saa — portfolio content
 *
 * HOW TO EDIT: change only the text between the "quotes".
 * - Keep the quotes " ", the commas , and the brackets [ ].
 * - To hide something, make it empty: "" . To remove a block, delete the whole  [ ... ],  block.
 * - To type a double quote inside text, use the curly quotes “ ” instead.
 * Photos live in: assets/images/marvin/
 */

return [
    'slug' => "marvin",

    // ---- NAMES ----
    'name' => [
        'full' => "Marvin John M. Saa",
        'first' => "Marvin",
        'last' => "Saa",
        'nickname' => "Totong",
    ],
    'role' => "Programmer",
    'tagline' => "BSIT Student · Programmer",
    'statement' => "Learning from my mistakes, facing challenges, and becoming a better version of myself every day.",
    'shortIntro' => "Creative, curious, and determined — a programmer who loves learning new things and exploring different ideas.",

    // ---- PHOTOS: file names inside  assets/images/<folder>/  (change the file name to change the photo) ----
    'folder' => "marvin",
    'profile' => "portrait.jpg",
    'profilePosition' => "50% 25%",

    // ---- SECTION TITLES (the headings shown on the page) ----
    'titles' => [
        'about' => "about.md",
        'background' => "profile.json",
        'hobbies' => "off_duty/",
        'skills' => "stack/",
        'education' => "history.log",
        'projects' => "projects/",
        'achievements' => "certificates/",
        'gallery' => "screenshots/",
        'contact' => "contact.sh",
    ],

    // ---- ABOUT ME (each line in quotes = one paragraph) ----
    'about' => [
        "I am a creative, curious, and determined person who loves learning new things and exploring different ideas. I enjoy technology, designing, and expressing my creativity through different projects.",
        "I am hardworking, detail-oriented, and always willing to improve myself. I believe in learning from my mistakes, facing challenges, and becoming a better version of myself every day.",
    ],

    // ---- PERSONAL BACKGROUND (label / value rows) ----
    'facts' => [
        [
            'label' => "nickname",
            'value' => "Totong",
        ],
        [
            'label' => "age",
            'value' => "22",
        ],
        [
            'label' => "from",
            'value' => "Zone 3, Taboc, Opol, Misamis Oriental",
        ],
        [
            'label' => "program",
            'value' => "BS Information Technology",
        ],
        [
            'label' => "role",
            'value' => "Programmer / Project Manager",
        ],
    ],

    // ---- STRENGTHS ----
    'strengths' => [
        'intro' => "My personal strengths are being creative, patient, adaptable, and determined. I am willing to learn new things, accept challenges, and improve myself. I also consider myself someone who can work independently and is open to new ideas and experiences.",
        'items' => ["Creative", "Patient", "Adaptable", "Determined"],
    ],

    // ---- MOTIVATION ----
    'motivation' => [
        'title' => "What keeps me learning",
        'text' => "My desire to improve myself, gain new knowledge, and discover things I haven't experienced before. I want to develop my skills, overcome challenges, and become a better version of myself. I also want to achieve my dreams and build a better future.",
    ],

    // ---- CAREER GOAL ----
    'goal' => "To become a successful IT professional with a stable career. I want to improve my knowledge and skills in technology, especially programming and computer-related fields. I also dream of becoming financially independent, helping my family, traveling to different places, and enjoying the life I have worked hard for.",
    'hobbiesIntro' => "Activities that help me relax, express myself, and create wonderful memories.",

    // ---- HOBBIES AND INTERESTS ----
    'hobbies' => [
        [
            'title' => "Online games",
            'text' => "",
            'tags' => ["Mobile Legends", "Call of Duty", "Mutants: Genetic Gladiators", "Clash of Clans"],
        ],
        [
            'title' => "Music & dancing",
            'text' => "Listening to music and dancing.",
        ],
        [
            'title' => "Cats & dogs",
            'text' => "Spending time with cats and dogs.",
        ],
        [
            'title' => "Beaches & sunsets",
            'text' => "Exploring different places, visiting beaches, enjoying the ocean view, and watching beautiful sunsets.",
        ],
    ],

    // ---- SKILLS (no levels or percentages) ----
    'skills' => [
        [
            'group' => "Programming",
            'items' => ["Python", "JavaScript", "PHP", "Visual Basic (VB.NET)", "HTML & CSS", "SQL"],
        ],
        [
            'group' => "Tools",
            'items' => ["Microsoft Word", "Excel", "PowerPoint", "Canva"],
        ],
        [
            'group' => "Soft skills",
            'items' => ["Communication", "Teamwork", "Problem-solving", "Analysis"],
        ],
    ],

    // ---- EDUCATION (newest first) ----
    'education' => [
        [
            'school' => "Opol Community College",
            'level' => "Bachelor of Science in Information Technology",
            'period' => "4th Year · Current",
        ],
        [
            'school' => "Opol National Secondary Technical School",
            'level' => "Senior High & Junior High School",
            'period' => "",
        ],
        [
            'school' => "Opol Central School",
            'level' => "Elementary",
            'period' => "",
        ],
    ],

    // ---- PROJECTS (copy a block to add one, delete a block to remove one) ----
    'projects' => [
        [
            'title' => "Capstone Project",
            'role' => "Programmer / Project Manager",
            'description' => "Joining and completing these projects taught me the importance of patience, teamwork, responsibility, and problem-solving. I learned that making mistakes is part of the learning process — instead of giving up, I understand what went wrong, learn from it, and apply those lessons to my next project.",
            'photo' => "demo-day.jpg",
        ],
    ],

    // ---- ACHIEVEMENTS AND CERTIFICATES ----
    'achievements' => [
        [
            'title' => "IT Webinar Participation",
            'detail' => "Certificate of participation",
            'photo' => "",
        ],
    ],

    // ---- GALLERY (the file must be in this person's image folder) ----
    'gallery' => [
        [
            'file' => "selfie.jpg",
            'caption' => "Name tag on",
        ],
        [
            'file' => "blue-team.jpg",
            'caption' => "Blue-vest group",
        ],
        [
            'file' => "stairs.jpg",
            'caption' => "With Leah",
        ],
        [
            'file' => "demo-day.jpg",
            'caption' => "With Leah and a classmate",
        ],
        [
            'file' => "name-tags.jpg",
            'caption' => "With the team",
        ],
    ],

    // ---- CONTACT AND SOCIAL LINKS (add more lines like the Facebook one) ----
    'contact' => [
        'email' => "occ.saa.marvinjohn@gmail.com",
        'links' => [
            [
                'label' => "Facebook",
                'url' => "https://www.facebook.com/share/1A9kdLoSqw/",
            ],
            [
                'label' => "Instagram",
                'url' => "https://www.instagram.com/ncly_mcxzne/",
            ],
        ],
    ],
];
