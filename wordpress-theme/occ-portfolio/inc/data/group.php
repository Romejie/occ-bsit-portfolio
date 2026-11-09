<?php
/**
 * Group homepage content
 *
 * HOW TO EDIT: change only the text between the "quotes".
 * - Keep the quotes " ", the commas , and the brackets [ ].
 * - To hide something, make it empty: "" . To remove a block, delete the whole  [ ... ],  block.
 * - To type a double quote inside text, use the curly quotes “ ” instead.
 * Group photos live in: assets/images/group/. Member names, roles, photos and links come from gerome.php, leah.php and marvin.php.
 */

return [
    'siteTitle' => "OCC BSIT · Three Portfolios",
    'school' => "Opol Community College",
    'program' => "BSIT · 4th Year",
    'hero' => [
        'eyebrow' => "Opol Community College · BSIT · 4th Year",
        'headline' => ["Three students.", "Three stories."],
        'text' => "Meet Gerome, Leah, and Marvin — three Information Technology students with three different paths. Pick a portfolio to get to know each of us.",
        'photo' => "trio.jpg",
        'photoAlt' => "Gerome, Leah, and Marvin standing together in a hallway",
        'photoCaption' => "Gerome · Leah · Marvin",
    ],
    'about' => [
        'title' => "About us",
        'text' => [
            "We are fourth-year Bachelor of Science in Information Technology students at Opol Community College.",
            "Gerome plans and analyzes systems, Marvin writes the code, and Leah puts the work into words. This website is where each of us tells our own story.",
        ],
    ],
    'membersTitle' => "Meet the three",
    'galleryTitle' => "Snapshots",
    'gallery' => [
        [
            'owner' => "gerome",
            'file' => "summit.jpg",
            'caption' => "ROTC Advance Cadets Summit 2025",
            'wide' => true,
        ],
        [
            'owner' => "leah",
            'file' => "costume.jpg",
            'caption' => "In costume",
        ],
        [
            'owner' => "marvin",
            'file' => "stairs.jpg",
            'caption' => "With Leah",
        ],
        [
            'owner' => "leah",
            'file' => "red-team.jpg",
            'caption' => "BSIT Department",
            'wide' => true,
        ],
        [
            'owner' => "gerome",
            'file' => "squad.jpg",
            'caption' => "In uniform",
        ],
        [
            'owner' => "marvin",
            'file' => "blue-team.jpg",
            'caption' => "Blue-vest group",
            'wide' => true,
        ],
    ],
    'footer' => [
        'note' => "Opol Community College · Opol, Misamis Oriental",
    ],
];
