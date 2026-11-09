<?php
/**
 * Gerome Bahian Miñoza — portfolio content
 *
 * HOW TO EDIT: change only the text between the "quotes".
 * - Keep the quotes " ", the commas , and the brackets [ ].
 * - To hide something, make it empty: "" . To remove a block, delete the whole  [ ... ],  block.
 * - To type a double quote inside text, use the curly quotes “ ” instead.
 * Photos live in: assets/images/gerome/
 */

return [
    'slug' => "gerome",

    // ---- NAMES ----
    'name' => [
        'full' => "Gerome Bahian Miñoza",
        'first' => "Gerome",
        'last' => "Miñoza",
        'nickname' => "Toto",
    ],
    'role' => "System Analyst",
    'badge' => "ARMY",
    'tagline' => "Information Technology Student · Army Reservist",
    'statement' => "Duty, service, and personal standards.",
    'shortIntro' => "Balances IT studies with service as an Army Reservist, bringing discipline to every system he plans.",

    // ---- PHOTOS: file names inside  assets/images/<folder>/  (change the file name to change the photo) ----
    'folder' => "gerome",
    'profile' => "hero.jpg",
    'profilePosition' => "50% 88%",

    // ---- SECTION TITLES (the headings shown on the page) ----
    'titles' => [
        'about' => "Mission Brief",
        'background' => "Profile",
        'hobbies' => "Field Activities",
        'skills' => "Loadout",
        'education' => "Training & Education",
        'projects' => "Operations Log",
        'achievements' => "Commendations",
        'gallery' => "Field Photos",
        'contact' => "Contact",
    ],

    // ---- ABOUT ME (each line in quotes = one paragraph) ----
    'about' => [
        "I am a dedicated Information Technology student balancing academic advancement with active military service as a Reservist in Charlie Company, 1001st CDC (10 RCDG, RCPA).",
        "Managing both rigorous coursework and military obligations has instilled in me exceptional discipline, strategic problem-solving skills, and operational adaptability. My dual role reflects a strong commitment to continuous self-improvement and service to the community.",
        "I thrive in high-pressure environments where technical acumen and clear, dependable leadership are required.",
    ],

    // ---- PERSONAL BACKGROUND (label / value rows) ----
    'facts' => [
        [
            'label' => "Nickname",
            'value' => "Toto",
        ],
        [
            'label' => "Age",
            'value' => "24",
        ],
        [
            'label' => "From",
            'value' => "Zone 1A Danao, Patag, Opol, Misamis Oriental",
        ],
        [
            'label' => "Program",
            'value' => "Bachelor of Science in Information Technology",
        ],
        [
            'label' => "Team role",
            'value' => "System Analyst",
        ],
        [
            'label' => "Reserve unit",
            'value' => "Charlie Company, 1001st CDC (10 RCDG, RCPA)",
        ],
    ],

    // ---- STRENGTHS ----
    'strengths' => [
        [
            'title' => "High-Pressure Resilience",
            'text' => "Operating as an active Army Reservist while maintaining a demanding IT workload demonstrates a high tolerance for stress, strong composure, and the ability to make clear decisions in fast-paced environments.",
        ],
        [
            'title' => "Accountability and Structure",
            'text' => "Military service instills absolute reliability, self-discipline, and respect for chain-of-command operations, ensuring projects are executed systematically from planning through completion.",
        ],
    ],

    // ---- MOTIVATION ----
    'motivation' => [
        'title' => "Duty, Service, and Personal Standards",
        'text' => "As an Army Reservist, I hold myself to high standards of discipline, readiness, and accountability.",
    ],

    // ---- CAREER GOAL ----
    'goal' => "To become a trusted, multi-disciplinary leader — someone who can architect high-performing technical systems under demanding conditions while mentoring and guiding teams with clarity, discipline, and purpose.",

    // ---- HOBBIES AND INTERESTS ----
    'hobbies' => [
        [
            'title' => "Rucking and Trail Hiking",
            'text' => "Carrying a weighted pack on scenic trails or local routes to build stamina while enjoying nature.",
        ],
        [
            'title' => "Land Navigation",
            'text' => "Practicing map-reading, compass orientation, and route-planning skills outdoors.",
        ],
    ],

    // ---- SKILLS (no levels or percentages) ----
    'skills' => [
        [
            'group' => "Technical",
            'items' => ["Computer Repair"],
        ],
        [
            'group' => "Programming",
            'items' => ["PHP"],
        ],
        [
            'group' => "Soft skills",
            'items' => ["Leadership"],
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
            'level' => "Previous school",
            'period' => "",
        ],
    ],

    // ---- PROJECTS (copy a block to add one, delete a block to remove one) ----
    'projects' => [
        [
            'title' => "Capstone Project",
            'role' => "System Analyst",
            'description' => "",
            'photo' => "",
        ],
        [
            'title' => "IoT Project",
            'role' => "System Analyst",
            'description' => "",
            'photo' => "",
        ],
        [
            'title' => "Portfolio Website",
            'role' => "System Analyst",
            'description' => "",
            'photo' => "",
        ],
    ],

    // ---- ACHIEVEMENTS AND CERTIFICATES ----
    'achievements' => [
        [
            'title' => "Army Reservist",
            'detail' => "Charlie Company, 1001st CDC (10 RCDG, RCPA)",
            'photo' => "squad.jpg",
        ],
        [
            'title' => "ROTC Advance Cadets Summit 2025",
            'detail' => "“Empowering Future Leaders through Discipline, Patriotism, and Service”",
            'photo' => "summit.jpg",
        ],
    ],

    // ---- GALLERY (the file must be in this person's image folder) ----
    'gallery' => [
        [
            'file' => "summit.jpg",
            'caption' => "ROTC Advance Cadets Summit 2025",
        ],
        [
            'file' => "range.jpg",
            'caption' => "Rifle zeroing, 25 m",
        ],
        [
            'file' => "squad.jpg",
            'caption' => "In uniform with the group",
        ],
        [
            'file' => "cadets.jpg",
            'caption' => "ROTC training group",
        ],
        [
            'file' => "fiesta.jpg",
            'caption' => "Off duty",
        ],
    ],

    // ---- CONTACT AND SOCIAL LINKS (add more lines like the Facebook one) ----
    'contact' => [
        'email' => "occ.minoza.gerome@gmail.com",
        'links' => [
            [
                'label' => "Facebook",
                'url' => "https://www.facebook.com/share/1ERu8AVLgM/",
            ],
        ],
    ],
];
