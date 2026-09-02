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

    <!-- Coursework Hub Section -->
    <section id="coursework" class="section" style="background: var(--bg-tertiary); border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color);">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Academic Coursework</span>
                <h2 class="section-title">Coursework & Response Papers</h2>
                <p class="section-subtitle">A curated directory of research, critical reflections, and weekly essays for my classes.</p>
            </div>

            <!-- Featured INT-1050 Card -->
            <div class="course-featured-card">
                <div class="course-header-row">
                    <div>
                        <span class="course-code-badge">INT-1050 &bull; Vermont State Colleges</span>
                        <h3 class="course-title">Dimensions of Self and Society</h3>
                    </div>
                    <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                        <a href="int1050/reader.php?paper=week1.md" class="btn btn-secondary btn-sm" title="Launch Universal Markdown Reader">
                            Universal Markdown Reader
                        </a>
                        <a href="int1050/index.php" class="btn btn-primary btn-sm">
                            Open Course Portal
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
                <p class="course-desc">
                    An interdisciplinary seminar exploring human identity, social constructs, racial prejudice, and civic engagement. This portal hosts my weekly analytical response papers and reading syntheses.
                </p>

                <!-- Preview Papers in Course -->
                <div class="course-papers-preview">
                    <a href="int1050/reader.php?paper=week1.md" class="paper-mini-card">
                        <div>
                            <span class="tag" style="background: var(--status-success-bg); color: var(--status-success); border-color: rgba(16, 185, 129, 0.2); margin-bottom: 0.5rem; display: inline-block;">Completed</span>
                            <h4 class="paper-mini-title">Week 1: "So, What are You, Anyway?"</h4>
                            <p class="paper-mini-meta">Response to Lawrence Hill's allegory on racial identity & prejudice.</p>
                        </div>
                        <span class="card-link" style="margin-top: 1rem;">Read Paper &rarr;</span>
                    </a>

                    <div class="paper-mini-card" style="opacity: 0.75;">
                        <div>
                            <span class="tag" style="margin-bottom: 0.5rem; display: inline-block;">Coming Soon</span>
                            <h4 class="paper-mini-title">Week 2: Community & Civic Engagement</h4>
                            <p class="paper-mini-meta">Analyzing the mechanisms of grassroots community action.</p>
                        </div>
                        <span class="card-link" style="margin-top: 1rem; color: var(--text-muted);">In Progress</span>
                    </div>

                    <div class="paper-mini-card" style="opacity: 0.75;">
                        <div>
                            <span class="tag" style="margin-bottom: 0.5rem; display: inline-block;">Coming Soon</span>
                            <h4 class="paper-mini-title">Week 3: Socioeconomic Factors in Urban Planning</h4>
                            <p class="paper-mini-meta">Examining equity in local infrastructure and zoning.</p>
                        </div>
                        <span class="card-link" style="margin-top: 1rem; color: var(--text-muted);">In Progress</span>
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                    <span style="font-size: 0.85rem; color: var(--text-muted);">💡 <em>Tip: New weekly papers in .md format can be read dynamically in the reader!</em></span>
                    <a href="int1050/index.php" class="card-link">View all assignments in INT-1050 &rarr;</a>
                </div>
            </div>
        </div>
    </section>

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
