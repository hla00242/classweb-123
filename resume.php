<?php
/**
 * Academic & Technical Resume (CV)
 * Modular PHP template with print optimization.
 */
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Hesten A. (Sheldon) | Academic & Tech Resume (CV)';
$metaDescription = 'Curriculum Vitae for Hesten A. (Sheldon) - Liberal Studies student at CCV / VSC transferring to VTSU for History B.A. & Secondary Education with SPED, with focus on front-end web development and digital humanities.';
$activePage = 'resume';
$rootPath = '';
$extraStyles = ['css/resume.css'];

include __DIR__ . '/includes/header.php';
?>

<!-- Main Resume Wrapper -->
<main class="resume-wrapper">

    <!-- Action Bar (Hidden on Print) -->
    <div class="resume-action-bar">
        <div class="resume-action-group">
            <a href="index.php" class="btn btn-secondary btn-sm">
                &larr; Return to Portfolio
            </a>
            <a href="int1050/index.php" class="btn btn-secondary btn-sm">
                INT-1050 Course Hub
            </a>
        </div>

        <div class="resume-action-group">
            <button onclick="window.print()" class="btn btn-primary btn-sm">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H7v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                Print / Download PDF
            </button>
        </div>
    </div>

    <!-- Resume Sheet -->
    <article class="resume-sheet">
        
        <!-- Header -->
        <header class="resume-header">
            <div>
                <h1 class="resume-name">Hesten A. <span class="gradient-text">(Sheldon)</span></h1>
                <p class="resume-role">Undergraduate Student &bull; Future Educator &amp; Web Developer</p>
                <div class="resume-contact-list">
                    <span class="resume-contact-item">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        CCV &bull; Vermont State Colleges (VSC)
                    </span>
                    <span class="resume-contact-item">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <a href="mailto:hla00242@vsc.edu" style="color: inherit; text-decoration: none;">hla00242@vsc.edu</a>
                    </span>
                    <span class="resume-contact-item">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        hesten.dev / classweb
                    </span>
                </div>
            </div>
        </header>

        <!-- Professional & Academic Summary -->
        <section class="resume-section">
            <h2 class="resume-section-title">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Profile & Academic Summary
            </h2>
            <p class="resume-entry-desc" style="font-size: 1rem;">
                Undergraduate student at the Community College of Vermont (CCV) within the Vermont State Colleges system pursuing an Associate degree in Liberal Studies, on an active pathway to transfer to Vermont State University (VTSU) for a Bachelor of Arts in History and Secondary Education with Special Education (SPED) endorsement. Combines dedication to inclusive pedagogy, historical inquiry, and sociological analysis with hands-on expertise in pure vanilla web engineering and accessible digital learning interfaces.
            </p>
        </section>

        <!-- Education -->
        <section class="resume-section" id="education">
            <h2 class="resume-section-title">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                Education
            </h2>
            
            <!-- Current Degree: CCV -->
            <div class="resume-entry" style="margin-bottom: 1.5rem;">
                <div class="resume-entry-header">
                    <div>
                        <span class="resume-entry-title">Community College of Vermont (CCV)</span>
                        <span class="resume-entry-subtitle"> &bull; A.A. in Liberal Studies</span>
                    </div>
                    <span class="resume-entry-date">2024 &ndash; Present</span>
                </div>
                <ul class="resume-bullets">
                    <li><strong>Academic Program:</strong> Liberal Studies &bull; Vermont State Colleges (VSC) System.</li>
                    <li><strong>Relevant Coursework:</strong> INT-1050 (Dimensions of Self and Society), Web Engineering &amp; Application Design, Introduction to Information Technology.</li>
                    <li><strong>Focus:</strong> Interdisciplinary foundation in humanities, critical sociological inquiry, and digital literacy.</li>
                </ul>
            </div>

            <!-- Transfer Pathway: VTSU -->
            <div class="resume-entry">
                <div class="resume-entry-header">
                    <div>
                        <span class="resume-entry-title">Vermont State University (VTSU)</span>
                        <span class="resume-entry-subtitle"> &bull; B.A. in History &amp; Secondary Education with SPED (Transfer Pathway)</span>
                    </div>
                    <span class="resume-entry-date">Upcoming Transfer</span>
                </div>
                <ul class="resume-bullets">
                    <li><strong>Program of Study:</strong> Bachelor of Arts in History; Secondary Education certification track with Special Education (SPED) endorsement.</li>
                    <li><strong>Pedagogical Goals:</strong> Inclusive curriculum planning, differentiated instruction, universal design for learning (UDL), and accessible educational technologies.</li>
                </ul>
            </div>
        </section>

        <!-- Technical & Academic Skills Matrix -->
        <section class="resume-section" id="skills">
            <h2 class="resume-section-title">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                Skills & Core Competencies
            </h2>
            <div class="resume-skills-grid">
                <div class="resume-skill-cat">
                    <h3 class="resume-skill-cat-title">Education & Pedagogy</h3>
                    <div class="resume-skill-tags">
                        <span class="tag">Special Education (SPED)</span>
                        <span class="tag">Secondary Education</span>
                        <span class="tag">Differentiated Instruction</span>
                        <span class="tag">Universal Design (UDL)</span>
                        <span class="tag">Classroom Inclusivity</span>
                        <span class="tag">Curriculum Design</span>
                    </div>
                </div>

                <div class="resume-skill-cat">
                    <h3 class="resume-skill-cat-title">History & Research</h3>
                    <div class="resume-skill-tags">
                        <span class="tag">Historical Inquiry</span>
                        <span class="tag">Sociological Analysis</span>
                        <span class="tag">Textual Analysis</span>
                        <span class="tag">MLA / APA Citations</span>
                        <span class="tag">Primary Source Evaluation</span>
                        <span class="tag">Academic Writing</span>
                    </div>
                </div>

                <div class="resume-skill-cat">
                    <h3 class="resume-skill-cat-title">Web & Digital Tools</h3>
                    <div class="resume-skill-tags">
                        <span class="tag">HTML5 Semantic</span>
                        <span class="tag">Pure Vanilla CSS</span>
                        <span class="tag">JavaScript (ES6+)</span>
                        <span class="tag">Modular PHP</span>
                        <span class="tag">Accessibility (WCAG)</span>
                        <span class="tag">Git / GitHub / cPanel</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Projects & Academic Portfolios -->
        <section class="resume-section">
            <h2 class="resume-section-title">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                Featured Projects & Platforms
            </h2>

            <div class="resume-entry">
                <div class="resume-entry-header">
                    <div>
                        <span class="resume-entry-title">Universal Academic Markdown Reader</span>
                        <span class="resume-entry-subtitle"> &bull; Drop-In Coursework Engine</span>
                    </div>
                    <span class="resume-entry-date">2026</span>
                </div>
                <p class="resume-entry-desc">
                    Engineered a client-side Markdown reading tool with dynamic URL parameters that parses raw academic text files, formats citations (MLA/APA), calculates reading speed, adjusts typography (Serif/Sans), and features real-time Web Speech API audio narration.
                </p>
            </div>

            <div class="resume-entry">
                <div class="resume-entry-header">
                    <div>
                        <span class="resume-entry-title">INT-1050 Coursework Dashboard</span>
                        <span class="resume-entry-subtitle"> &bull; Academic Portfolio Portal</span>
                    </div>
                    <span class="resume-entry-date">2025 &ndash; 2026</span>
                </div>
                <p class="resume-entry-desc">
                    Built a centralized curriculum portal hosting analytical response papers, course competencies, and weekly reflections for Dimensions of Self and Society at Vermont State Colleges.
                </p>
            </div>

            <div class="resume-entry">
                <div class="resume-entry-header">
                    <div>
                        <span class="resume-entry-title">Bespoke Vanilla CSS Design System</span>
                        <span class="resume-entry-subtitle"> &bull; Lightweight Portfolio Hub</span>
                    </div>
                    <span class="resume-entry-date">2026</span>
                </div>
                <p class="resume-entry-desc">
                    Designed and built a 100% zero-dependency portfolio website featuring dark/light theme switching with localStorage persistence, keyboard spotlight search (Ctrl+K), and responsive layouts.
                </p>
            </div>
        </section>

        <!-- Academic Papers & Publications -->
        <section class="resume-section">
            <h2 class="resume-section-title">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Selected Academic Essays
            </h2>
            <div class="resume-entry">
                <div class="resume-entry-header">
                    <div>
                        <span class="resume-entry-title">"So, What are You, Anyway?" &ndash; Racial Identity & Prejudice Analysis</span>
                        <span class="resume-entry-subtitle"> &bull; Response Paper #1</span>
                    </div>
                    <span class="resume-entry-date">Sept 2025</span>
                </div>
                <p class="resume-entry-desc">
                    An essay exploring Lawrence Hill's literary allegory, examining how subtle patronizing interactions shape mixed-race identity and demonstrating how family modeling fosters genuine empathy.
                </p>
            </div>
        </section>

    </article>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
