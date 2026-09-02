<?php
/**
 * Main Student Portfolio & Academic Hub
 * Developed with modular PHP, pure Vanilla CSS, and modular JavaScript.
 */
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Hesten A. (Sheldon) | Student Portfolio & Academic Hub';
$metaDescription = 'Undergraduate Student Portfolio for Hesten A. (Sheldon) — Liberal Studies at CCV / VSC, transferring to VTSU for History B.A. & Secondary Education with SPED.';
$activePage = 'home';
$rootPath = '';
$extraStyles = ['css/courses.css'];

$catalog = getAcademicCatalog();
$springCourses = $catalog['semesters']['spring-2026']['courses'];

include __DIR__ . '/includes/header.php';
?>

<!-- Main Content Container -->
<main id="main-content">

    <!-- Hero / Bio Section -->
    <section id="about" class="hero">
        <div class="container hero-grid">
            <div class="hero-content">
                <div class="hero-pill">
                    <span class="hero-pill-dot"></span>
                    CCV (Liberal Studies) &rarr; VTSU (History B.A. &amp; Sec Ed / SPED)
                </div>
                <h1 class="hero-title">
                    Hi, I'm <span class="gradient-text">Hesten A.</span>
                </h1>
                <p class="hero-bio">
                    I am an undergraduate student currently studying Liberal Studies at the Community College of Vermont (CCV) within the Vermont State Colleges system, on track to transfer to Vermont State University (VTSU) for a B.A. in History and Secondary Education with Special Education (SPED). Alongside education and history, I build clean, accessible web platforms and digital learning tools.
                </p>
                <div class="hero-actions">
                    <a href="#coursework" class="btn btn-primary">
                        Explore Coursework
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <a href="resume.php" class="btn btn-secondary">
                        View Resume (CV)
                    </a>
                    <a href="#contact" class="btn btn-outline">Get in Touch</a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number gradient-text">INT-1050</span>
                        <span class="stat-label">Active Course Hub</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">Pure CSS</span>
                        <span class="stat-label">Zero Framework Bloat</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">Ctrl + K</span>
                        <span class="stat-label">Spotlight Search</span>
                    </div>
                </div>
            </div>

            <!-- Hero Visual Card -->
            <div class="hero-visual">
                <div class="avatar-card">
                    <div class="avatar-img-wrap">
                        <span class="avatar-initials">HA</span>
                    </div>
                    <div class="avatar-floating-badge">
                        <div class="floating-badge-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                        </div>
                        <div>
                            <div class="floating-badge-title">Academic Writer</div>
                            <div class="floating-badge-subtitle">Self & Society</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Coursework & Semester Timeline Section -->
    <section id="coursework" class="section" style="background: var(--bg-tertiary); border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color);">
        <div class="container">
            <div class="section-header" style="max-width: 800px; margin: 0 auto 2.5rem auto;">
                <span class="section-tag">Spring 2026 Academic Roster</span>
                <h2 class="section-title">Current Semester <span class="gradient-text">Timeline &amp; Classes</span></h2>
                <p class="section-subtitle">
                    Active coursework roadmap at Community College of Vermont (CCV) bridging into Vermont State University (VTSU) for History B.A. &amp; Secondary Education with SPED.
                </p>
            </div>

            <!-- Toolbar / Quick Controls -->
            <div class="catalog-toolbar" style="margin-bottom: 2.5rem;">
                <div style="display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap;">
                    <span class="degree-status-pill">
                        <span class="pulse-dot"></span>
                        Spring 2026 Active Term (Weeks 1 &ndash; 15)
                    </span>
                    <span class="tag" style="background: var(--badge-bg); color: var(--badge-text); font-weight: 700;">
                        5 Enrolled Classes &bull; 15 Credits
                    </span>
                </div>

                <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                    <div class="view-toggle-group">
                        <button class="view-toggle-btn active" id="home-view-timeline" title="Timeline View">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Timeline
                        </button>
                        <button class="view-toggle-btn" id="home-view-grid" title="Grid View">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            Grid
                        </button>
                    </div>

                    <a href="courses/index.php" class="btn btn-primary btn-sm">
                        View All Classes &amp; Degree Pathway &rarr;
                    </a>
                </div>
            </div>

            <!-- 1. SEMESTER TIMELINE VIEW -->
            <div id="home-timeline-container" class="semester-timeline">
                <?php foreach ($springCourses as $courseKey): 
                    $course = $catalog['courses'][$courseKey];
                    $url = (str_contains($course['custom_url'], 'http') || str_starts_with($course['custom_url'], '../')) 
                            ? $course['custom_url'] 
                            : $rootPath . $course['custom_url'];
                ?>
                    <div class="timeline-item active">
                        <div class="timeline-node">
                            <div class="timeline-node-inner"></div>
                        </div>

                        <div class="timeline-content-card">
                            <div class="timeline-card-header">
                                <span class="timeline-code-badge"><?= e($course['code']) ?></span>
                                <span class="tag" style="background: var(--brand-gradient-subtle); color: var(--brand-primary); font-weight:700;">
                                    <?= e($course['status_badge']) ?>
                                </span>
                            </div>

                            <h3 class="timeline-course-title">
                                <a href="<?= e($url) ?>" style="color: inherit; text-decoration: none;">
                                    <?= e($course['title']) ?>
                                </a>
                            </h3>

                            <div class="timeline-course-meta">
                                <span><?= e($course['institution']) ?></span>
                                <span>&bull;</span>
                                <span><?= e($course['credits']) ?> Credits</span>
                                <span>&bull;</span>
                                <span style="color: var(--brand-primary); font-weight: 600;"><?= e($course['schedule']) ?></span>
                            </div>

                            <p class="timeline-course-desc">
                                <?= e($course['description']) ?>
                            </p>

                            <div class="timeline-milestone-pill">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                <span><?= e($course['timeline_milestone']) ?></span>
                            </div>

                            <div class="timeline-actions">
                                <a href="<?= e($url) ?>" class="btn btn-primary btn-sm">
                                    Open Course Portal
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                                <?php if (isset($course['reader_url'])): ?>
                                    <a href="<?= $rootPath . e($course['reader_url']) ?>" class="btn btn-secondary btn-sm" title="Launch Markdown Reader">
                                        Academic Reader
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- 2. SEMESTER GRID VIEW (Initially Hidden) -->
            <div id="home-grid-container" class="course-catalog-grid" style="display: none; margin-top: 1.5rem;">
                <?php foreach ($springCourses as $courseKey): 
                    $course = $catalog['courses'][$courseKey];
                    $url = (str_contains($course['custom_url'], 'http') || str_starts_with($course['custom_url'], '../')) 
                            ? $course['custom_url'] 
                            : $rootPath . $course['custom_url'];
                ?>
                    <article class="course-card-enhanced">
                        <div>
                            <div class="course-card-top">
                                <span class="timeline-code-badge"><?= e($course['code']) ?></span>
                                <span class="tag" style="background: var(--brand-gradient-subtle); color: var(--brand-primary); font-weight:700;">
                                    <?= e($course['status_badge']) ?>
                                </span>
                            </div>

                            <h3 class="course-card-title">
                                <a href="<?= e($url) ?>" style="color: inherit; text-decoration: none;">
                                    <?= e($course['title']) ?>
                                </a>
                            </h3>

                            <div class="timeline-course-meta">
                                <span><?= e($course['institution']) ?></span>
                                <span>&bull;</span>
                                <span><?= e($course['credits']) ?> Credits</span>
                            </div>

                            <p class="course-card-desc">
                                <?= e($course['description']) ?>
                            </p>

                            <div class="course-competencies-list">
                                <?php foreach (array_slice($course['competencies'], 0, 3) as $comp): ?>
                                    <span class="competency-tag"><?= e($comp) ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="course-card-footer">
                            <span style="font-size: 0.85rem; color: var(--text-muted);">
                                <?= e($course['schedule']) ?>
                            </span>
                            <a href="<?= e($url) ?>" class="btn btn-secondary btn-sm">
                                Open Hub &rarr;
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- Degree Pathway Bridge Banner -->
            <div style="margin-top: 3.5rem; background: var(--bg-card); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border: 1px solid var(--border-color); border-radius: var(--radius-xl); padding: 2rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1.5rem; box-shadow: var(--shadow-md);">
                <div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.25rem;">
                        <span style="font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--brand-primary);">Complete Academic Record</span>
                        <span class="tag" style="font-size: 0.75rem;">CCV &rarr; VTSU Pathway</span>
                    </div>
                    <h3 style="font-family: var(--font-heading); font-size: 1.45rem; font-weight: 700; color: var(--text-primary); margin: 0.25rem 0;">
                        Looking for previous coursework or upcoming transfer courses?
                    </h3>
                    <p style="font-size: 0.95rem; color: var(--text-muted); margin: 0;">
                        Explore all Fall 2025 completed classes and planned VTSU History &amp; Special Education (SPED) degree courses.
                    </p>
                </div>
                <a href="courses/index.php" class="btn btn-primary" style="white-space: nowrap;">
                    Open Master Course Catalog
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

        </div>
    </section>

    <!-- Homepage View Switcher Script -->
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const btnTimeline = document.getElementById('home-view-timeline');
        const btnGrid = document.getElementById('home-view-grid');
        const timelineContainer = document.getElementById('home-timeline-container');
        const gridContainer = document.getElementById('home-grid-container');

        if (btnTimeline && btnGrid && timelineContainer && gridContainer) {
            btnTimeline.addEventListener('click', () => {
                btnTimeline.classList.add('active');
                btnGrid.classList.remove('active');
                timelineContainer.style.display = 'block';
                gridContainer.style.display = 'none';
            });

            btnGrid.addEventListener('click', () => {
                btnGrid.classList.add('active');
                btnTimeline.classList.remove('active');
                gridContainer.style.display = 'grid';
                timelineContainer.style.display = 'none';
            });
        }
    });
    </script>

    <!-- Skills & Tech Matrix Section -->
    <section id="skills" class="section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Core Competencies</span>
                <h2 class="section-title">Skills & Tech Stack</h2>
                <p class="section-subtitle">Front-end web development capabilities paired with rigorous academic inquiry tools.</p>
            </div>

            <!-- Skills Filter Bar -->
            <div class="filter-bar">
                <button class="filter-btn skills-filter-btn active" data-skill-filter="all">All Disciplines</button>
                <button class="filter-btn skills-filter-btn" data-skill-filter="dev">Front-End & Code</button>
                <button class="filter-btn skills-filter-btn" data-skill-filter="academic">Academic Research</button>
                <button class="filter-btn skills-filter-btn" data-skill-filter="tools">Developer Tools</button>
            </div>

            <!-- Skills Grid (Rendered via js/app.js) -->
            <div id="skills-grid" class="skills-grid">
                <!-- Dynamic skill cards injected via JavaScript -->
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="section" style="background: var(--bg-tertiary); border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color);">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Showcase</span>
                <h2 class="section-title">Featured Projects</h2>
                <p class="section-subtitle">Web applications, tools, and platforms built with clean code and modern design.</p>
            </div>

            <!-- Projects Grid (Rendered via js/app.js) -->
            <div id="projects-grid" class="cards-grid">
                <!-- Dynamic cards injected via JavaScript -->
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Writings & Thoughts</span>
                <h2 class="section-title">Articles & Reflections</h2>
                <p class="section-subtitle">Insights on front-end development, coursework reflections, and digital design.</p>
            </div>

            <!-- Filter Bar -->
            <div class="filter-bar">
                <button class="filter-btn blog-filter-btn active" data-filter="all">All Articles</button>
                <button class="filter-btn blog-filter-btn" data-filter="dev">Web Dev</button>
                <button class="filter-btn blog-filter-btn" data-filter="academic">Academic</button>
                <button class="filter-btn blog-filter-btn" data-filter="design">UI/UX Design</button>
            </div>

            <!-- Blog Grid (Rendered via js/app.js) -->
            <div id="blog-posts-grid" class="cards-grid">
                <!-- Dynamic blog cards injected via JavaScript -->
            </div>
        </div>
    </section>

    <!-- Contact Section with FormSubmit.co Integration -->
    <section id="contact" class="section" style="background: var(--bg-tertiary); border-top: 1px solid var(--border-color);">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Get In Touch</span>
                <h2 class="section-title">Let's Connect</h2>
                <p class="section-subtitle">Have a question about a project, coursework, or interested in collaborating? Send a message directly to my inbox.</p>
            </div>

            <div class="contact-grid">
                <!-- Contact Info Card -->
                <div class="contact-info-card">
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem;">Contact Information</h3>
                    <p style="font-size: 1rem; line-height: 1.6; margin-bottom: 2rem;">
                        I am always open to discussing academic research, web design best practices, and new project opportunities.
                    </p>

                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <div>
                            <div class="contact-item-title">Student</div>
                            <div class="contact-item-val">Hesten A. (Sheldon)</div>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div>
                            <div class="contact-item-title">Institution</div>
                            <div class="contact-item-val">CCV / Vermont State Colleges (VSC)</div>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <div class="contact-item-title">Email</div>
                            <div class="contact-item-val"><a href="mailto:hla00242@vsc.edu" style="color: inherit; text-decoration: none;">hla00242@vsc.edu</a></div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Card (FormSubmit.co Integrated) -->
                <div class="contact-form-card">
                    <form id="contact-form" action="https://formsubmit.co/ajax/hla00242@vsc.edu" method="POST">
                        <!-- FormSubmit Configuration Fields -->
                        <input type="hidden" name="_subject" value="New Message from Hesten.dev Portfolio">
                        <input type="hidden" name="_template" value="table">
                        <input type="hidden" name="_captcha" value="false">
                        <!-- Anti-spam Honeypot -->
                        <input type="text" name="_honey" style="display:none">

                        <div class="form-group">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Jane Doe" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="jane@example.com" required>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Question regarding INT-1050 or Project" required>
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" name="message" class="form-control" rows="5" placeholder="Write your message here..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            Send Message
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>

                        <div id="form-feedback" class="form-feedback" role="alert"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
