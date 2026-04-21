<?php
/**
 * Abhyasa — Site Config & Content Store
 *
 * This file is the single source of truth for all site content.
 * A full database-backed CMS can replace these arrays with queries
 * using the same shape (see admin/README.md).
 */

declare(strict_types=1);

// ---------- Site settings ----------
$SITE = [
    'name'         => 'Abhyasa',
    'tagline'      => 'Exclusively for NEET',
    'full_name'    => 'Abhyasa — Best NEET Coaching in Nagpur',
    'description'  => 'Abhyasa is Nagpur\'s dedicated NEET coaching institute. One batch of 35 students. 20+ years of faculty experience. 1200+ hours of teaching, 40,000+ MCQs, 200+ tests per year.',
    'base_url'     => '', // leave empty for relative; set to https://abhyasa.in for absolute
    'theme_color'  => '#0B1F3A',
    'established'  => 2015,
    'copyright_year' => date('Y'),
    'locale'       => 'en-IN',
];

// ---------- Contact ----------
$CONTACT = [
    'phone_display' => '+91 80879 00022',
    'phone_tel'     => '+918087900022',
    'whatsapp'      => '918087900022',
    'email'         => 'sbisala@gmail.com',
    'address_lines' => [
        'Vimal Villa, 2-A, Second Floor,',
        'Gandhi Nagar, Off Hill Road,',
        'Nagpur, Maharashtra',
    ],
    'hours'         => 'Mon – Sat · 9:00 AM – 8:00 PM',
    'map_embed'     => 'https://maps.google.com/maps?q=Gandhi+Nagar+Nagpur&t=&z=13&ie=UTF8&iwloc=&output=embed',
];

// ---------- Social ----------
$SOCIAL = [
    ['id' => 'whatsapp', 'label' => 'WhatsApp',  'url' => 'https://wa.me/918087900022'],
    ['id' => 'facebook', 'label' => 'Facebook',  'url' => 'https://facebook.com/abhyasaneetclasses'],
    ['id' => 'twitter',  'label' => 'Twitter',   'url' => 'https://twitter.com/BisalaSrinivas'],
    ['id' => 'instagram','label' => 'Instagram', 'url' => 'https://instagram.com/abhyasaneetclasses'],
    ['id' => 'linkedin', 'label' => 'LinkedIn',  'url' => 'https://linkedin.com/in/srinivas-bisala'],
    ['id' => 'youtube',  'label' => 'YouTube',   'url' => 'https://youtube.com/@ABHYASAbestNEETClassesNagpur'],
];

// ---------- Navigation ----------
$NAV = [
    ['slug' => 'home',       'label' => 'Home',      'href' => 'index.php'],
    ['slug' => 'about',      'label' => 'About',     'href' => 'about.php'],
    ['slug' => 'courses',    'label' => 'Courses',   'href' => 'courses.php'],
    ['slug' => 'downloads',  'label' => 'Downloads', 'href' => 'downloads.php'],
    ['slug' => 'results',    'label' => 'Results',   'href' => 'results.php'],
    ['slug' => 'gallery',    'label' => 'Gallery',   'href' => 'gallery.php'],
    ['slug' => 'blog',       'label' => 'Blog',      'href' => 'blog.php'],
    ['slug' => 'contact',    'label' => 'Contact',   'href' => 'contact.php'],
];

// ---------- Headline stats ----------
$STATS = [
    ['num' => '1,200+', 'unit' => 'per year', 'label' => 'Hours of live lecturing',         'sub' => 'Structured for NEET & Boards'],
    ['num' => '40,000+','unit' => 'per year', 'label' => 'MCQs solved & reviewed',          'sub' => 'With detailed explanations'],
    ['num' => '200+',   'unit' => 'per year', 'label' => 'Topic, weekly & mock tests',      'sub' => 'Progressively harder'],
    ['num' => '35',     'unit' => 'per batch','label' => 'Students — hard ceiling',         'sub' => 'So every mind gets attention'],
];

// ---------- Courses ----------
$COURSES = [
    [
        'id'        => '2-year-neet',
        'number'    => '01',
        'title'     => 'Two-Year NEET with XI & XII Boards',
        'duration'  => '24 months · Starts after Class X',
        'featured'  => false,
        'image'     => 'assets/images/abhyasa/course1.jpg',
        'summary'   => 'Our flagship program. Build the full conceptual foundation alongside your school boards — at the pace a medical aspirant actually needs.',
        'features'  => [
            'Physics, Chemistry, Biology from first principles',
            'Weekly topic tests + monthly full-length mocks',
            'Simultaneous CBSE / State board support',
            '40,000+ MCQs across both years',
            'Printed study material, chapter by chapter',
            'Doubt-clearing sessions: daily and on-demand',
        ],
        'long_desc' => [
            'The two-year program is designed for students who have just completed Class X and are serious about a medical career. We use the full 24 months — not to rush, but to build.',
            'Year 1 focuses on conceptual clarity across all three subjects. Year 2 deepens application, problem-solving speed, and exam temperament. Board exam revision is woven in throughout — not bolted on at the end.',
            'Most of our top-performing students come from this batch. Two years of depth cannot be compressed into one.',
        ],
    ],
    [
        'id'        => '1-year-neet',
        'number'    => '02',
        'title'     => 'One-Year NEET with Class XII Boards',
        'duration'  => '12 months · For current Class XII students',
        'featured'  => true,
        'image'     => 'assets/images/abhyasa/course2.jpg',
        'summary'   => 'Accelerated, focused, intense. A complete NEET cycle built parallel to your XII boards, without either subject suffering.',
        'features'  => [
            'Full NEET syllabus + rapid Class XI revision',
            '1,200+ hours of live teaching',
            '200+ tests — topic, weekly & full-length',
            'Dedicated board-exam revision sprints',
            'Focused problem-solving clinics',
            'One-on-one strategy reviews every month',
        ],
        'long_desc' => [
            'The one-year program is for students currently in Class XII who want a serious NEET preparation that does not compromise their board results.',
            'We front-load Class XI revision in the first 4 months, cover Class XII in parallel with school, and dedicate the final 3 months to mock-test intensity and revision sprints.',
            'This is our most demanding schedule. In return, it delivers the most concentrated exposure to the exam pattern.',
        ],
    ],
    [
        'id'        => 'repeaters',
        'number'    => '03',
        'title'     => 'Repeaters / Droppers Batch for NEET',
        'duration'  => '12 months · For NEET 2025 aspirants',
        'featured'  => false,
        'image'     => 'assets/images/abhyasa/course3.jpg',
        'summary'   => 'A dedicated program for students preparing again. Diagnostic-led, gap-focused, built to convert last year\'s "almost" into this year\'s rank.',
        'features'  => [
            'Diagnostic assessment + personal study plan',
            'Rebuild weak chapters, sharpen strong ones',
            'High mock-test density from Day 1',
            'Stress, focus and motivation mentoring',
            'Parent counselling sessions',
            'Strict, structured daily schedule',
        ],
        'long_desc' => [
            'A dropper year is not a second chance — it is a final one. We treat it that way.',
            'The first two weeks are spent in deep diagnostic: where exactly you fell short, in which chapters, under what conditions. From that, we build a gap-focused plan unique to you.',
            'Our repeater alumni consistently report the same thing: the difference wasn\'t the content, it was the daily structure and accountability.',
        ],
    ],
];

// ---------- Value points (About page) ----------
$VALUES = [
    [
        'icon' => 'layers',
        'title' => 'Qualified, experienced, permanent faculty',
        'text' => 'No rotating trainers. Our teachers bring 20+ years of experience and stay with your batch from Day 1 to the NEET hall.',
    ],
    [
        'icon' => 'users',
        'title' => 'One batch. 35 students. Period.',
        'text' => 'We turn away admissions after the 35th seat. It\'s the only way personal mentoring can stay personal.',
    ],
    [
        'icon' => 'book',
        'title' => 'Board & NEET, taught together',
        'text' => 'No conflict between school and coaching. Physics, Chemistry and Biology are taught to serve both exams simultaneously.',
    ],
    [
        'icon' => 'clock',
        'title' => 'Free 7-day demo — no commitment',
        'text' => 'Sit through a full week of real classes before you decide. We\'d rather have the right 35 than any 35.',
    ],
    [
        'icon' => 'target',
        'title' => 'Built for one exam, not ten',
        'text' => 'We don\'t split teaching effort across JEE, NEET, Olympiad and Boards. NEET is everything we do.',
    ],
    [
        'icon' => 'heart',
        'title' => 'Mentoring, not babysitting',
        'text' => 'We\'re invested in your result, but you do the work. That clarity changes the dynamic of the classroom.',
    ],
];

// ---------- Testimonials ----------
$TESTIMONIALS = [
    [
        'name'   => 'Prachi Gangapari',
        'role'   => 'NEET Aspirant · Past batch',
        'initial'=> 'PG',
        'photo'  => 'assets/images/abhyasa/student1.jpg',
        'quote'  => 'A perfect place for medical aspirants — personal attention and guidance, exactly what a NEET student needs.',
    ],
    [
        'name'   => 'Megha Lanjewar',
        'role'   => 'NEET Aspirant · Past batch',
        'initial'=> 'ML',
        'photo'  => 'assets/images/abhyasa/student2.jpg',
        'quote'  => 'The best thing is that every student gets personal attention and guidance. Thank you, sir.',
    ],
    [
        'name'   => 'Anirban Chakraborty',
        'role'   => 'NEET Aspirant · Past batch',
        'initial'=> 'AC',
        'photo'  => 'assets/images/abhyasa/student3.jpg',
        'quote'  => 'Perfect place to learn. Every student is made the best — an affable environment to grow in.',
    ],
];

// ---------- Founder ----------
$FOUNDER = [
    'name'       => 'Srinivas Bisala',
    'nickname'   => 'Bisala Sir',
    'role'       => 'Founder & Chief Mentor',
    'experience' => '20+ years mentoring NEET aspirants',
    'initials'   => 'SB',
    'bio'        => [
        'Srinivas Bisala — known to generations of students simply as <strong>Bisala Sir</strong> — founded Abhyasa on a single belief: a student preparing for NEET doesn\'t need a bigger coaching class, they need a better one.',
        'Two decades of teaching Physics, Chemistry and Biology to medical aspirants taught him what doesn\'t work — crowded halls, revolving-door faculty, off-the-shelf lecture decks. Abhyasa is his answer to all of it.',
        'He personally teaches every batch. No sub-faculty, no delegation of the hardest chapters to juniors. When you enrol at Abhyasa, you enrol with him.',
    ],
];

// ---------- Blog posts ----------
$BLOG_POSTS = [
    [
        'slug'    => 'how-to-prepare-biology-for-neet',
        'title'   => 'How to prepare Biology for NEET?',
        'date'    => '2023-02-04',
        'date_display' => '04 Feb 2023',
        'excerpt' => 'Biology carries the highest weightage — nearly 50% of NEET marks. Here\'s how to actually study it, chapter by chapter, for real retention.',
        'read_time' => '7 min read',
        'category'=> 'Strategy',
        'image'   => 'assets/images/abhyasa/5.-How-to-Prepare-Biology-for-NEET.png',
        'body'    => [
            'Biology alone is worth 360 out of 720 marks in NEET — half the paper. That is not a subject you can afford to approach casually.',
            'The biggest mistake most aspirants make is treating Biology like a story subject to be read. It is not. It is a precision subject that rewards memory, pattern recognition, and disciplined revision.',
            'Start with NCERT. Read every line. The NEET Biology paper is built almost entirely from NCERT, and every line of NCERT has been asked at some point. Do not skip a paragraph.',
            'After NCERT, build a chapter-wise MCQ practice. We use 15,000+ Biology MCQs at Abhyasa, distributed across the full two-year program. The goal is not to solve them once — it is to solve them three times: first for learning, second for pattern recognition, third for speed.',
            'Finally, revision. Biology is unforgiving of gaps. Build a 30-day cycle where every chapter is touched at least once — a running revision that never stops.',
        ],
    ],
    [
        'slug'    => '5-reasons-join-abhyasa-for-neet',
        'title'   => '5 Reasons you should join Abhyasa for NEET',
        'date'    => '2021-10-23',
        'date_display' => '23 Oct 2021',
        'excerpt' => 'Why a 2-year, simultaneous NEET + Boards preparation gives students the only real shot at a top medical seat.',
        'read_time' => '5 min read',
        'category'=> 'Admissions',
        'image'   => 'assets/images/abhyasa/ABHYASA-for-NEET-Blog-4.png',
        'body'    => [
            'First: our batch size. 35 students. Not 350. Every student is known by name and by weakness.',
            'Second: our faculty. 20+ years of Physics, Chemistry and Biology teaching — the same teachers, every day, for two full years. No surprises.',
            'Third: simultaneous Board + NEET. Most classes force students to choose. We don\'t. We teach both, because the syllabus overlaps more than coaching marketing pretends.',
            'Fourth: the study material. Printed, versioned, chapter-by-chapter — not a photocopy of last year\'s notes with a new date.',
            'Fifth: the 7-day free demo. We invite any serious student to sit through a full week. If it isn\'t right for you, we\'ll say so first.',
        ],
    ],
    [
        'slug'    => 'best-neet-study-techniques',
        'title'   => 'Best NEET preparation study techniques',
        'date'    => '2021-04-23',
        'date_display' => '23 Apr 2021',
        'excerpt' => 'Don\'t procrastinate. NEET doesn\'t reward cramming — it rewards compound daily effort. Here\'s the playbook.',
        'read_time' => '6 min read',
        'category'=> 'Study',
        'image'   => 'assets/images/abhyasa/blog3.jpg',
        'body'    => [
            'The number one killer of NEET preparation is procrastination disguised as "planning."',
            'You do not need a better planner. You need to open the book today, solve 30 MCQs today, and revise yesterday\'s chapter today. That\'s it.',
            'Second: active recall beats re-reading. Close the book. Write the summary from memory. Compare. That gap is what you need to close.',
            'Third: spaced repetition. A chapter studied on Day 1 must be revisited on Day 3, Day 7, Day 21. The NEET syllabus is too large to be "finished" — it can only be kept alive through recurring contact.',
            'Fourth: test-first, not test-last. Do not wait until "after the syllabus" to take mocks. Take them from Week 1. The feedback is too valuable to defer.',
        ],
    ],
    [
        'slug'    => '5-things-to-ask-coaching-class',
        'title'   => '5 Things to ask before joining any coaching class',
        'date'    => '2021-03-12',
        'date_display' => '12 Mar 2021',
        'excerpt' => 'The questions most parents don\'t ask — and the ones that actually predict whether your child will clear NEET.',
        'read_time' => '4 min read',
        'category'=> 'Guide',
        'image'   => 'assets/images/abhyasa/blog2.jpg',
        'body'    => [
            'One: what is the batch size? Ask for a number, not a range. If they say "we keep it small," walk out. Small is not a number.',
            'Two: who will actually teach my child? Most coaching classes market senior teachers and deliver junior ones. Ask for the named teacher, per subject, per batch.',
            'Three: can I sit in a class before enrolling? A coaching class that will not let you observe a live class is not confident in what happens inside one.',
            'Four: how is the board syllabus handled? If the answer is vague, assume it will be neglected. Your child cannot clear NEET with a 60% board score.',
            'Five: what happens if my child falls behind? This is the most important question. Every class promises a great year. Only a good one has a real plan for a bad week.',
        ],
    ],
];

// ---------- Downloads / Study Material ----------
$DOWNLOADS = [
    [
        'title' => 'Class 8 Foundation',
        'desc'  => 'Early-start foundation material aligned with NEET-level thinking in Physics, Chemistry and Biology.',
        'size'  => '6 MB · PDF',
        'items' => ['Concept sheets', 'Formula cards', 'Chapter MCQs'],
    ],
    [
        'title' => 'Class 9 & 10 Boards + Foundation',
        'desc'  => 'Board revision notes plus NEET-foundation MCQ sets for students preparing early.',
        'size'  => '14 MB · PDF Bundle',
        'items' => ['CBSE & state board notes', '2,000+ practice MCQs', 'Previous year papers'],
    ],
    [
        'title' => 'Class 11 · Boards & NEET',
        'desc'  => 'Full-year chapter summaries, formula sheets, and 5,000+ MCQs for NEET-linked XI syllabus.',
        'size'  => '22 MB · PDF Bundle',
        'items' => ['Physics, Chemistry, Biology', '5,000+ MCQs', 'Formula cheatsheets'],
    ],
    [
        'title' => 'Class 12 & NEET Essentials',
        'desc'  => 'XII board-aligned notes, NEET PYQs, mock-paper answer keys and revision flashcards.',
        'size'  => '28 MB · PDF Bundle',
        'items' => ['10 years NEET PYQs', 'Full solutions', 'Revision flashcards'],
    ],
];

// ---------- Successful students (real alumni — photos from abhyasa.in/results) ----------
$SUCCESSFUL_STUDENTS = [
    ['name' => 'Tejaswini Tiple',   'college' => 'GMC Nandurbar',                                                    'photo' => 'assets/images/abhyasa/Tejaswini-Tiple-GMC-Nandurbar.jpg'],
    ['name' => 'Shubham Dhone',     'college' => 'GMC Nagpur',                                                       'photo' => 'assets/images/abhyasa/Shubham-Dhone-GMC-Nagpur.jpg'],
    ['name' => 'Renuka Agrawal',    'college' => 'GMC Gondia',  'note' => 'BVM SKN School Topper',                   'photo' => 'assets/images/abhyasa/Renuka-Agrawal-BVM-SKN-School-Topper-GMC-Gondia.jpg'],
    ['name' => 'Kunal Dhobale',     'college' => 'MGIMS Sevagram',                                                   'photo' => 'assets/images/abhyasa/Kunal-Dhobale-MGIMS-Sevagram.jpg'],
    ['name' => 'Charmi Saujani',    'college' => 'University of Central London', 'note' => 'BVM Civil Lines Topper', 'photo' => 'assets/images/abhyasa/Charmi-Saujani-BVM-Civil-Lines-Topper-University-of-Central-london.jpg'],
    ['name' => 'Amisha Dharne',     'college' => 'GMC Chandrapur',                                                   'photo' => 'assets/images/abhyasa/Amisha-Dharne-GMC-Chandrapur-1.jpg'],
    ['name' => 'Adesh Mutkure',     'college' => 'KEM Mumbai',                                                       'photo' => 'assets/images/abhyasa/Adesh-Mutkure-KEM-Mumbai.jpg'],
];

// ---------- Results (placeholder — replace with real data) ----------
$RESULTS = [
    ['year' => '2024', 'selected' => 29, 'top_scorer' => '687 / 720', 'admissions' => 'AIIMS, JIPMER, GMC-Nagpur'],
    ['year' => '2023', 'selected' => 31, 'top_scorer' => '672 / 720', 'admissions' => 'GMC-Nagpur, IGGMC, Seth GS'],
    ['year' => '2022', 'selected' => 28, 'top_scorer' => '665 / 720', 'admissions' => 'GMC-Nagpur, AFMC, BJMC'],
    ['year' => '2021', 'selected' => 30, 'top_scorer' => '651 / 720', 'admissions' => 'GMC-Nagpur, Dental & AYUSH'],
];

// ---------- Gallery (using real photos from abhyasa.in) ----------
$GALLERY = [
    ['type' => 'photo', 'src' => 'assets/images/abhyasa/1-1.jpg',  'label' => 'Classroom',     'caption' => 'Inside the classroom',           'aspect' => 'landscape'],
    ['type' => 'photo', 'src' => 'assets/images/abhyasa/2-1.jpg',  'label' => 'Batch session', 'caption' => 'A day with the batch',           'aspect' => 'portrait'],
    ['type' => 'photo', 'src' => 'assets/images/abhyasa/4-1.jpg',  'label' => 'Faculty',       'caption' => 'Teaching Biology · Bisala Sir',  'aspect' => 'landscape'],
    ['type' => 'photo', 'src' => 'assets/images/abhyasa/5-1.jpg',  'label' => 'Students',      'caption' => 'Past NEET batch',                'aspect' => 'square'],
    ['type' => 'photo', 'src' => 'assets/images/abhyasa/abtimg1.jpg','label' => 'Institute',   'caption' => 'Abhyasa at Vimal Villa',         'aspect' => 'landscape'],
    ['type' => 'photo', 'src' => 'assets/images/abhyasa/abtimg2.jpg','label' => 'Lecture',     'caption' => 'Physics session',                'aspect' => 'portrait'],
    ['type' => 'video', 'src' => 'assets/images/abhyasa/video1.jpg','label' => 'Walkthrough',  'caption' => 'Campus tour',                    'aspect' => 'landscape'],
    ['type' => 'video', 'src' => 'assets/images/abhyasa/video2.jpg','label' => 'Alumni',       'caption' => 'Where they are now',             'aspect' => 'portrait'],
    ['type' => 'video', 'src' => 'assets/images/abhyasa/video4.jpg','label' => 'Interview',    'caption' => 'NEET-qualifier interview',       'aspect' => 'square'],
    ['type' => 'video', 'src' => 'assets/images/abhyasa/video5.jpg','label' => 'Lecture clip', 'caption' => 'Chemistry concept',              'aspect' => 'landscape'],
];

// ---------- Homepage banner ----------
$BANNER = [
    'image'    => 'assets/images/abhyasa/banner1.jpg',
    'eyebrow'  => 'Admissions · 2025 & 2026',
    'title'    => 'Admissions Open for the NEET 2026 Batch',
    'subtitle' => 'Simultaneous Board & NEET preparation · Free 7-day demo · Limited to 35 seats',
    'cta_text' => 'Book your seat',
    'cta_href' => 'contact.php',
    'pill'     => 'Only 35 students · Filling fast',
];

// ---------- Hero background image ----------
$HERO_BG_IMAGE = 'assets/images/abhyasa/banner1.jpg';

// ---------- About page images ----------
$ABOUT_IMAGES = [
    'primary'   => 'assets/images/abhyasa/abtimg1.jpg',
    'secondary' => 'assets/images/abhyasa/abtimg2.jpg',
];

// ---------- Brand logo ----------
$BRAND_LOGO = 'assets/images/abhyasa/logo.png';

// ---------- Helper: current page slug ----------
function current_page_slug(): string {
    $name = basename($_SERVER['SCRIPT_NAME'] ?? '', '.php');
    return $name === '' || $name === 'index' ? 'home' : $name;
}
