<?php
/**
 * Academic Coursework & Degree Pathway Dataset
 * Centralized data store for semesters, course catalogs, degree progress, and weekly syllabi.
 */

function getAcademicCatalog() {
    return [
        'semesters' => [
            'spring-2026' => [
                'id' => 'spring-2026',
                'name' => 'Spring 2026',
                'label' => 'Current Active Semester',
                'institution' => 'Community College of Vermont (CCV)',
                'degree' => 'A.A. in Liberal Studies',
                'is_current' => true,
                'status' => 'In Progress',
                'term_weeks' => 'Weeks 1 – 15',
                'dates' => 'Jan 2026 – May 2026',
                'courses' => ['int1050', 'his1211', 'edu1030', 'cis1151', 'eng1061']
            ],
            'fall-2025' => [
                'id' => 'fall-2025',
                'name' => 'Fall 2025',
                'label' => 'Completed Semester',
                'institution' => 'Community College of Vermont (CCV)',
                'degree' => 'A.A. in Liberal Studies',
                'is_current' => false,
                'status' => 'Completed',
                'term_weeks' => 'Weeks 1 – 15',
                'dates' => 'Sep 2025 – Dec 2025',
                'courses' => ['pos1010', 'psy1010', 'mat1030', 'soc1010']
            ],
            'vtsu-pathway' => [
                'id' => 'vtsu-pathway',
                'name' => 'VTSU Transfer Pathway',
                'label' => 'Upcoming Degree Transfer (Junior & Senior)',
                'institution' => 'Vermont State University (VTSU)',
                'degree' => 'B.A. in History & Secondary Education with SPED',
                'is_current' => false,
                'status' => 'Planned / Pathway',
                'term_weeks' => 'Transfer Bridge',
                'dates' => 'Fall 2026 – Spring 2028',
                'courses' => ['his2010', 'his3120', 'edu3210', 'sed3050', 'sed4120', 'edu4810']
            ]
        ],
        'courses' => [
            // --- Spring 2026 (Current) ---
            'int1050' => [
                'code' => 'INT-1050',
                'title' => 'Dimensions of Self and Society',
                'semester_id' => 'spring-2026',
                'semester_name' => 'Spring 2026',
                'institution' => 'CCV / Vermont State Colleges',
                'credits' => 3,
                'status' => 'In Progress',
                'status_badge' => 'Active • Featured Portal',
                'category' => 'Interdisciplinary & Social Sciences',
                'category_slug' => 'social-sciences',
                'instructor' => 'Faculty Seminar',
                'schedule' => 'Tues / Thurs &bull; Hybrid & Canvas',
                'custom_url' => 'courses/view.php?code=int1050',
                'reader_url' => 'courses/reader.php?paper=week1.md',
                'icon' => 'globe',
                'description' => 'An interdisciplinary seminar exploring human identity, social constructs, racial prejudice, and civic engagement through literature, sociological research, and philosophical inquiry.',
                'timeline_milestone' => 'Week 1–4 Response Papers Active',
                'competencies' => [
                    'Critical Sociological Inquiry & Identity Theory',
                    'Textual Analysis & Rhetorical Synthesis',
                    'MLA Format Research Writing',
                    'Universal Markdown Publishing & Reader Tooling'
                ],
                'assignments' => [
                    [
                        'title' => 'Week 1: "So, What are You, Anyway?"',
                        'type' => 'Response Paper',
                        'status' => 'Completed',
                        'reader_link' => 'courses/reader.php?paper=week1.md',
                        'summary' => 'Analysis of Lawrence Hill\'s literary allegory on racial identity, prejudice, and empathy.'
                    ],
                    [
                        'title' => 'Week 2: Community & Civic Engagement',
                        'type' => 'Research Paper',
                        'status' => 'In Progress',
                        'summary' => 'Examining the sociological mechanisms of grassroots civic participation and community coalitions.'
                    ],
                    [
                        'title' => 'Week 3: Socioeconomic Factors in Urban Planning',
                        'type' => 'Analytical Essay',
                        'status' => 'In Progress',
                        'summary' => 'Analyzing municipal zoning, infrastructure equity, and public transit accessibility.'
                    ]
                ]
            ],
            'his1211' => [
                'code' => 'HIS-1211',
                'title' => 'U.S. History to 1877',
                'semester_id' => 'spring-2026',
                'semester_name' => 'Spring 2026',
                'institution' => 'Community College of Vermont (CCV)',
                'credits' => 3,
                'status' => 'In Progress',
                'status_badge' => 'Active • History Core',
                'category' => 'History & Humanities',
                'category_slug' => 'history',
                'instructor' => 'Department of History',
                'schedule' => 'Mon / Wed &bull; Online & Seminar',
                'custom_url' => 'courses/view.php?code=his1211',
                'reader_url' => 'courses/reader.php?paper=his1211-primary-source.md',
                'icon' => 'book-open',
                'description' => 'A foundational survey of early American history from pre-Columbian civilizations through the American Revolution, the formation of the Republic, Civil War, and Reconstruction Era. Essential foundation for History B.A.',
                'timeline_milestone' => 'Unit 2: Early Constitutional Frameworks',
                'competencies' => [
                    'Primary Source Document Analysis & Evaluation',
                    'Historiographical Debate & Historical Contextualization',
                    'Synthesis of Early American Democratic Ideals & Disenfranchisement',
                    'Curriculum Planning Foundation for Secondary Social Studies'
                ],
                'assignments' => [
                    [
                        'title' => 'Primary Source Analysis: Colonial Charters & Indigenous Treaties',
                        'type' => 'Document Study',
                        'status' => 'Completed',
                        'reader_link' => 'courses/reader.php?paper=his1211-primary-source.md',
                        'summary' => 'Comparative evaluation of colonial property agreements and indigenous territorial sovereignty.'
                    ],
                    [
                        'title' => 'The Constitutional Convention: Federalists vs. Anti-Federalists',
                        'type' => 'Research Essay',
                        'status' => 'In Progress',
                        'summary' => 'Critical inquiry into central authority debates and the Bill of Rights negotiations.'
                    ],
                    [
                        'title' => 'Reconstruction & the 14th Amendment: Legacy of Citizenship',
                        'type' => 'Term Project',
                        'status' => 'Upcoming',
                        'summary' => 'Deep dive into post-war constitutional amendments and civil rights.'
                    ]
                ]
            ],
            'edu1030' => [
                'code' => 'EDU-1030',
                'title' => 'Introduction to Special & Secondary Education',
                'semester_id' => 'spring-2026',
                'semester_name' => 'Spring 2026',
                'institution' => 'Community College of Vermont (CCV)',
                'credits' => 3,
                'status' => 'In Progress',
                'status_badge' => 'Active • Education & SPED Core',
                'category' => 'Education & SPED',
                'category_slug' => 'education',
                'instructor' => 'Education Department',
                'schedule' => 'Wednesday Evenings &bull; Hybrid Practicum',
                'custom_url' => 'courses/view.php?code=edu1030',
                'reader_url' => 'courses/reader.php?paper=edu1030-udl.md',
                'icon' => 'academic-cap',
                'description' => 'An introduction to pedagogical foundations, special education laws (IDEA, Section 504), Individualized Education Programs (IEPs), differentiated instruction, and Universal Design for Learning (UDL) in secondary school environments.',
                'timeline_milestone' => 'Module 3: UDL Lesson Scaffolding',
                'competencies' => [
                    'Universal Design for Learning (UDL) Framework Implementation',
                    'Understanding IDEA, 504 Plans, and IEP Accommodations',
                    'Differentiated Instruction Strategies for Inclusive Classrooms',
                    'Behavioral Support Models & Secondary Learner Engagement'
                ],
                'assignments' => [
                    [
                        'title' => 'Case Study: Designing Accommodations for Neurodivergent Learners',
                        'type' => 'Clinical Case Study',
                        'status' => 'Completed',
                        'reader_link' => 'courses/reader.php?paper=edu1030-udl.md',
                        'summary' => 'Formulating individualized accommodations and multi-tiered systems of support (MTSS).'
                    ],
                    [
                        'title' => 'Universal Design for Learning (UDL) Lesson Plan Scaffolding',
                        'type' => 'Curriculum Blueprint',
                        'status' => 'In Progress',
                        'summary' => 'Crafting an inclusive secondary history lesson accommodating diverse sensory and cognitive needs.'
                    ],
                    [
                        'title' => 'Field Observation & Inclusive Classroom Reflection',
                        'type' => 'Practicum Journal',
                        'status' => 'Upcoming',
                        'summary' => 'Observational analysis of co-teaching dynamics and assistive technology utilization.'
                    ]
                ]
            ],
            'cis1151' => [
                'code' => 'CIS-1151',
                'title' => 'Websites & Web Application Design',
                'semester_id' => 'spring-2026',
                'semester_name' => 'Spring 2026',
                'institution' => 'Community College of Vermont (CCV)',
                'credits' => 3,
                'status' => 'In Progress',
                'status_badge' => 'Active • Web Tech Core',
                'category' => 'Technology & Design',
                'category_slug' => 'technology',
                'instructor' => 'Computer Information Systems',
                'schedule' => 'Online &bull; Interactive Labs',
                'custom_url' => 'courses/view.php?code=cis1151',
                'reader_url' => 'courses/reader.php?paper=cis1151-architecture.md',
                'icon' => 'code',
                'description' => 'Hands-on engineering in semantic HTML5, pure CSS design systems, responsive layouts, accessibility standards (WCAG 2.1 AA), and lightweight client-side JavaScript architecture.',
                'timeline_milestone' => 'Milestone 4: Portfolio & Dynamic Reader System',
                'competencies' => [
                    'Pure Vanilla CSS Architecture & CSS Custom Properties',
                    'Semantic HTML5 & WCAG 2.1 AA Web Accessibility',
                    'Responsive Grid & Flexbox Fluid Layouts',
                    'Modular JavaScript & LocalStorage State Persistence'
                ],
                'assignments' => [
                    [
                        'title' => 'ClassWeb Architecture: Pure Vanilla CSS Design System',
                        'type' => 'Production Project',
                        'status' => 'Completed',
                        'reader_link' => 'courses/reader.php?paper=cis1151-architecture.md',
                        'summary' => 'Zero-dependency design system with theme toggles, fluid typography, and command palette.'
                    ],
                    [
                        'title' => 'Universal Markdown Paper Reader Engine',
                        'type' => 'Interactive Tool',
                        'status' => 'Completed',
                        'reader_link' => 'courses/reader.php?paper=cis1151-architecture.md',
                        'summary' => 'Client-side markdown parser with font-scaling, citation generators, and Web Speech API.'
                    ],
                    [
                        'title' => 'Interactive Semester Timeline & Academic Catalog',
                        'type' => 'Web Application',
                        'status' => 'In Progress',
                        'summary' => 'Dynamic academic portal visualizing semester milestones and degree progress.'
                    ]
                ]
            ],
            'eng1061' => [
                'code' => 'ENG-1061',
                'title' => 'English Composition & Critical Inquiry',
                'semester_id' => 'spring-2026',
                'semester_name' => 'Spring 2026',
                'institution' => 'Community College of Vermont (CCV)',
                'credits' => 3,
                'status' => 'In Progress',
                'status_badge' => 'Active • Core Writing',
                'category' => 'History & Humanities',
                'category_slug' => 'history',
                'instructor' => 'English & Humanities',
                'schedule' => 'Tuesdays &bull; Online Seminar',
                'custom_url' => 'courses/view.php?code=eng1061',
                'reader_url' => 'courses/reader.php?paper=eng1061-rhetoric.md',
                'icon' => 'pencil-alt',
                'description' => 'Advanced academic writing, rhetorical strategies, persuasive argumentation, empirical source evaluation, and peer review methodologies across academic disciplines.',
                'timeline_milestone' => 'Research Essay Draft Phase',
                'competencies' => [
                    'Thesis Development & Argumentation Synthesis',
                    'Peer Review Workshop Collaboration',
                    'Empirical Source Evaluation & Citation Standards',
                    'Rhetorical Analysis & Discursive Inquiry'
                ],
                'assignments' => [
                    [
                        'title' => 'Rhetorical Analysis: Persuasion in Educational Reform Policy',
                        'type' => 'Essay',
                        'status' => 'Completed',
                        'reader_link' => 'courses/reader.php?paper=eng1061-rhetoric.md',
                        'summary' => 'Analyzing discourse techniques in contemporary special education policy debates.'
                    ],
                    [
                        'title' => 'Annotated Bibliography: Historical Literacy in Secondary Schools',
                        'type' => 'Research Portfolio',
                        'status' => 'In Progress',
                        'summary' => 'Comprehensive survey of scholarly literature regarding historical critical thinking.'
                    ]
                ]
            ],

            // --- Fall 2025 (Completed) ---
            'pos1010' => [
                'code' => 'POS-1010',
                'title' => 'Introduction to Political Science & Democracy',
                'semester_id' => 'fall-2025',
                'semester_name' => 'Fall 2025',
                'institution' => 'Community College of Vermont (CCV)',
                'credits' => 3,
                'status' => 'Completed',
                'status_badge' => 'Grade: A',
                'category' => 'Interdisciplinary & Social Sciences',
                'category_slug' => 'social-sciences',
                'instructor' => 'Social Sciences Faculty',
                'schedule' => 'Fall Term',
                'custom_url' => 'courses/view.php?code=pos1010',
                'icon' => 'library',
                'description' => 'Study of political systems, democratic institutions, constitutional law, and civic behavior.',
                'timeline_milestone' => 'Completed (4.0 GPA)',
                'competencies' => ['Constitutional Law Basics', 'Democratic Theory', 'Civic Institutions'],
                'assignments' => []
            ],
            'psy1010' => [
                'code' => 'PSY-1010',
                'title' => 'Introduction to Psychology',
                'semester_id' => 'fall-2025',
                'semester_name' => 'Fall 2025',
                'institution' => 'Community College of Vermont (CCV)',
                'credits' => 3,
                'status' => 'Completed',
                'status_badge' => 'Grade: A',
                'category' => 'Interdisciplinary & Social Sciences',
                'category_slug' => 'social-sciences',
                'instructor' => 'Behavioral Sciences Department',
                'schedule' => 'Fall Term',
                'custom_url' => 'courses/view.php?code=psy1010',
                'icon' => 'user-group',
                'description' => 'Core concepts in human cognition, developmental psychology, cognitive processing, and adolescent mental health.',
                'timeline_milestone' => 'Completed (4.0 GPA)',
                'competencies' => ['Cognitive Development', 'Behavioral Psychology', 'Learning Theories'],
                'assignments' => []
            ],
            'mat1030' => [
                'code' => 'MAT-1030',
                'title' => 'Applied Mathematics & Quantitative Reasoning',
                'semester_id' => 'fall-2025',
                'semester_name' => 'Fall 2025',
                'institution' => 'Community College of Vermont (CCV)',
                'credits' => 3,
                'status' => 'Completed',
                'status_badge' => 'Grade: A',
                'category' => 'General Education',
                'category_slug' => 'general-ed',
                'instructor' => 'Mathematics Department',
                'schedule' => 'Fall Term',
                'custom_url' => 'courses/view.php?code=mat1030',
                'icon' => 'calculator',
                'description' => 'Statistical reasoning, algebraic modeling, financial mathematics, and graphical data analysis.',
                'timeline_milestone' => 'Completed (4.0 GPA)',
                'competencies' => ['Statistical Analysis', 'Data Interpretation', 'Mathematical Logic'],
                'assignments' => []
            ],
            'soc1010' => [
                'code' => 'SOC-1010',
                'title' => 'Introduction to Sociology',
                'semester_id' => 'fall-2025',
                'semester_name' => 'Fall 2025',
                'institution' => 'Community College of Vermont (CCV)',
                'credits' => 3,
                'status' => 'Completed',
                'status_badge' => 'Grade: A',
                'category' => 'Interdisciplinary & Social Sciences',
                'category_slug' => 'social-sciences',
                'instructor' => 'Sociology Faculty',
                'schedule' => 'Fall Term',
                'custom_url' => 'courses/view.php?code=soc1010',
                'icon' => 'users',
                'description' => 'Foundational sociological perspectives on culture, socialization, social stratification, race, class, and social institutions.',
                'timeline_milestone' => 'Completed (4.0 GPA)',
                'competencies' => ['Sociological Imagination', 'Structural Inequality Analysis', 'Cultural Studies'],
                'assignments' => []
            ],

            // --- VTSU Transfer Pathway (Planned) ---
            'his2010' => [
                'code' => 'HIS-2010',
                'title' => 'Historical Methods & Historiography',
                'semester_id' => 'vtsu-pathway',
                'semester_name' => 'VTSU Junior Year',
                'institution' => 'Vermont State University (VTSU)',
                'credits' => 3,
                'status' => 'Planned',
                'status_badge' => 'VTSU Transfer Core',
                'category' => 'History & Humanities',
                'category_slug' => 'history',
                'instructor' => 'VTSU History Department',
                'schedule' => 'Upper-Level Seminar',
                'custom_url' => 'courses/view.php?code=his2010',
                'icon' => 'book-open',
                'description' => 'Methodology of historical research, archival investigation, secondary source critique, and historical philosophy.',
                'timeline_milestone' => 'Transfer Bridge Requirement',
                'competencies' => ['Archival Research', 'Historiographical Analysis', 'Historical Synthesis'],
                'assignments' => []
            ],
            'his3120' => [
                'code' => 'HIS-3120',
                'title' => 'Vermont History & Local Communities',
                'semester_id' => 'vtsu-pathway',
                'semester_name' => 'VTSU Junior Year',
                'institution' => 'Vermont State University (VTSU)',
                'credits' => 3,
                'status' => 'Planned',
                'status_badge' => 'VTSU History Elective',
                'category' => 'History & Humanities',
                'category_slug' => 'history',
                'instructor' => 'VTSU History Department',
                'schedule' => 'Upper-Level Elective',
                'custom_url' => 'courses/view.php?code=his3120',
                'icon' => 'library',
                'description' => 'In-depth exploration of Vermont social, cultural, and political history from indigenous settlement to modern day.',
                'timeline_milestone' => 'Local History Focus',
                'competencies' => ['Local Heritage Research', 'Oral History', 'Vermont Political Evolution'],
                'assignments' => []
            ],
            'edu3210' => [
                'code' => 'EDU-3210',
                'title' => 'Curriculum & Instruction in Secondary Education',
                'semester_id' => 'vtsu-pathway',
                'semester_name' => 'VTSU Junior Year',
                'institution' => 'Vermont State University (VTSU)',
                'credits' => 4,
                'status' => 'Planned',
                'status_badge' => 'VTSU Licensure Core',
                'category' => 'Education & SPED',
                'category_slug' => 'education',
                'instructor' => 'VTSU Education Department',
                'schedule' => 'Lecture & Practicum',
                'custom_url' => 'courses/view.php?code=edu3210',
                'icon' => 'academic-cap',
                'description' => 'Secondary pedagogical methods, unit planning, formative assessment, classroom management, and state licensing standards.',
                'timeline_milestone' => 'Secondary Licensure Track',
                'competencies' => ['Secondary Lesson Planning', 'Formative Assessment', 'Classroom Leadership'],
                'assignments' => []
            ],
            'sed3050' => [
                'code' => 'SED-3050',
                'title' => 'Foundations of Special Education & Inclusive Practices',
                'semester_id' => 'vtsu-pathway',
                'semester_name' => 'VTSU Junior Year',
                'institution' => 'Vermont State University (VTSU)',
                'credits' => 3,
                'status' => 'Planned',
                'status_badge' => 'SPED Endorsement Core',
                'category' => 'Education & SPED',
                'category_slug' => 'education',
                'instructor' => 'VTSU Special Education Department',
                'schedule' => 'Core Endorsement Course',
                'custom_url' => 'courses/view.php?code=sed3050',
                'icon' => 'user-group',
                'description' => 'Legal, historical, and pedagogical foundations of special education, IEP development, and collaborative co-teaching.',
                'timeline_milestone' => 'SPED Endorsement Requirement',
                'competencies' => ['IEP Development', 'Special Education Law (IDEA)', 'Co-Teaching Models'],
                'assignments' => []
            ],
            'sed4120' => [
                'code' => 'SED-4120',
                'title' => 'Assessment & Differentiated Instruction in SPED',
                'semester_id' => 'vtsu-pathway',
                'semester_name' => 'VTSU Senior Year',
                'institution' => 'Vermont State University (VTSU)',
                'credits' => 3,
                'status' => 'Planned',
                'status_badge' => 'Advanced SPED Practicum',
                'category' => 'Education & SPED',
                'category_slug' => 'education',
                'instructor' => 'VTSU Special Education Department',
                'schedule' => 'Advanced Specialization',
                'custom_url' => 'courses/view.php?code=sed4120',
                'icon' => 'sparkles',
                'description' => 'Diagnostic and curriculum-based assessment, progress monitoring, and specialized instructional adaptations.',
                'timeline_milestone' => 'Senior SPED Specialization',
                'competencies' => ['Curriculum-Based Assessment', 'Assistive Technology', 'Targeted Intervention'],
                'assignments' => []
            ],
            'edu4810' => [
                'code' => 'EDU-4810',
                'title' => 'Student Teaching Practicum & Secondary Seminar',
                'semester_id' => 'vtsu-pathway',
                'semester_name' => 'VTSU Senior Year (Final Term)',
                'institution' => 'Vermont State University (VTSU)',
                'credits' => 12,
                'status' => 'Planned',
                'status_badge' => 'Capstone Student Teaching',
                'category' => 'Education & SPED',
                'category_slug' => 'education',
                'instructor' => 'VTSU Clinical Faculty',
                'schedule' => 'Full-Semester Clinical Placement',
                'custom_url' => 'courses/view.php?code=edu4810',
                'icon' => 'academic-cap',
                'description' => 'Full-time capstone student teaching practicum in a secondary public school setting with dual focus on History and Special Education instruction.',
                'timeline_milestone' => 'Graduation & Licensure Capstone',
                'competencies' => ['Full-Time Secondary Teaching', 'Individualized IEP Execution', 'Professional Educator Licensure'],
                'assignments' => []
            ]
        ]
    ];
}

/**
 * Returns single course details by course code or slug
 */
function getCourseDetails($code) {
    $catalog = getAcademicCatalog();
    $codeSlug = strtolower(str_replace(['-', ' '], '', $code));

    foreach ($catalog['courses'] as $key => $course) {
        $cleanKey = strtolower(str_replace(['-', ' '], '', $key));
        $cleanCode = strtolower(str_replace(['-', ' '], '', $course['code']));
        if ($cleanKey === $codeSlug || $cleanCode === $codeSlug) {
            return $course;
        }
    }
    return null;
}

/**
 * Computes degree progress statistics
 */
function getDegreeStats() {
    $catalog = getAcademicCatalog();
    $completedCredits = 0;
    $inProgressCredits = 0;
    $plannedCredits = 0;
    $totalCCVCreditsTarget = 60; // Standard CCV Associate Degree

    foreach ($catalog['courses'] as $course) {
        if ($course['semester_id'] === 'fall-2025' || $course['status'] === 'Completed') {
            $completedCredits += $course['credits'];
        } elseif ($course['semester_id'] === 'spring-2026' || $course['status'] === 'In Progress') {
            $inProgressCredits += $course['credits'];
        } else {
            $plannedCredits += $course['credits'];
        }
    }

    $ccvEarnedPlusCurrent = $completedCredits + $inProgressCredits;
    $ccvPercentage = min(100, round(($ccvEarnedPlusCurrent / $totalCCVCreditsTarget) * 100));

    return [
        'completed_credits' => $completedCredits,
        'in_progress_credits' => $inProgressCredits,
        'planned_credits' => $plannedCredits,
        'ccv_target' => $totalCCVCreditsTarget,
        'ccv_progress_pct' => $ccvPercentage,
        'current_semester_courses' => count($catalog['semesters']['spring-2026']['courses']),
        'total_catalog_courses' => count($catalog['courses'])
    ];
}
