<?php
/**
 * INT-1050 Dimensions of Self and Society Course Dashboard
 * Modular PHP template featuring automatic Markdown essay discovery.
 */
require_once __DIR__ . '/../includes/functions.php';

$pageTitle = 'INT-1050: Dimensions of Self and Society | Coursework Hub';
$metaDescription = 'Academic Coursework Portal for INT-1050 at Vermont State Colleges. Featuring weekly analytical response papers, sociological inquiry, and curriculum objectives.';
$activePage = 'coursework';
$rootPath = '../';

// Automatically discover all .md essays in this course folder
$discoveredPapers = getCoursePapers(__DIR__);

include __DIR__ . '/../includes/header.php';
?>

<!-- Main Course Hub Content -->
<main class="container" style="padding-top: 3rem; padding-bottom: 5rem;">

    <!-- Breadcrumb Navigation -->
    <nav aria-label="Breadcrumbs" style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem; margin-bottom: 2rem;">
        <a href="../index.php" style="color: var(--brand-primary); font-weight: 600;">Home</a>
        <span style="color: var(--text-muted);">&bull;</span>
        <span style="color: var(--text-muted);">Coursework</span>
        <span style="color: var(--text-muted);">&bull;</span>
        <span style="color: var(--text-primary); font-weight: 600;">INT-1050</span>
    </nav>

    <!-- Course Header Card -->
    <section class="course-featured-card" style="margin-bottom: 3.5rem;">
        <div class="course-header-row">
            <div>
                <span class="course-code-badge">INT-1050 &bull; CCV / Vermont State Colleges</span>
                <h1 class="course-title" style="font-size: 2.5rem; margin-top: 0.75rem;">
                    Dimensions of Self and Society
                </h1>
            </div>
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <a href="reader.php?paper=week1.md" class="btn btn-primary btn-sm">
                    Launch Dynamic Reader
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
        <p class="course-desc" style="font-size: 1.15rem;">
            This interdisciplinary course examines how personal identity is constructed through social, cultural, and political dynamics. Through literature, sociological research, and philosophical texts, we critically analyze race, privilege, civic duty, and the human condition.
        </p>

        <div class="hero-stats" style="margin-top: 2rem;">
            <div class="stat-item">
                <span class="stat-number gradient-text">Hesten A.</span>
                <span class="stat-label">Student (Sheldon)</span>
            </div>
            <div class="stat-item">
                <span class="stat-number"><?= count($discoveredPapers) ?> Completed</span>
                <span class="stat-label">Discovered Essays</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">PHP Auto-Scan</span>
                <span class="stat-label">Drop-In Ready</span>
            </div>
        </div>
    </section>

    <!-- Papers Section -->
    <section id="papers" class="section" style="padding: 0 0 4rem 0;">
        <div class="section-header" style="text-align: left; margin-bottom: 2.5rem; max-width: 100%;">
            <span class="section-tag">Curriculum Portfolio</span>
            <h2 class="section-title">Weekly Response Papers</h2>
            <p class="section-subtitle">Read full essays, textual analyses, and reflective arguments with built-in voice narration.</p>
        </div>

        <div class="cards-grid">
            <?php if (!empty($discoveredPapers)): ?>
                <?php foreach ($discoveredPapers as $paper): ?>
                    <!-- Auto-Discovered Paper Card -->
                    <article class="card" style="border-top: 4px solid var(--status-success);">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                            <span class="tag" style="background: var(--status-success-bg); color: var(--status-success); border-color: rgba(16, 185, 129, 0.3);">Completed & Published</span>
                            <span style="font-size: 0.8rem; color: var(--text-muted); font-family: var(--font-mono);">Date: <?= e($paper['date']) ?></span>
                        </div>
                        <h3 class="card-title" style="font-size: 1.4rem;">
                            <?= e($paper['title']) ?>
                        </h3>
                        <p class="card-text">
                            <?= e($paper['summary']) ?>
                        </p>
                        <div class="tag-list">
                            <span class="tag">Racial Identity</span>
                            <span class="tag">Lawrence Hill</span>
                            <span class="tag"><?= e($paper['read_time']) ?></span>
                            <span class="tag">Audio Ready</span>
                        </div>
                        <div style="display: flex; gap: 0.75rem; margin-top: auto; flex-wrap: wrap;">
                            <a href="reader.php?paper=<?= urlencode($paper['filename']) ?>" class="btn btn-primary btn-sm">
                                Read Paper in Dynamic Reader &rarr;
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>

            <!-- Week 2 Paper (Upcoming Roadmap) -->
            <article class="card" style="opacity: 0.85;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                    <span class="tag" style="background: var(--status-warning-bg); color: var(--status-warning); border-color: rgba(245, 158, 11, 0.3);">In Progress</span>
                    <span style="font-size: 0.8rem; color: var(--text-muted); font-family: var(--font-mono);">Week 2</span>
                </div>
                <h3 class="card-title">
                    The Role of Community in Civic Engagement
                </h3>
                <p class="card-text">
                    A research paper analyzing the impact of grassroots community initiatives on local civic participation, democratic representation, and neighborhood organizing.
                </p>
                <div class="tag-list">
                    <span class="tag">Civic Engagement</span>
                    <span class="tag">Sociology</span>
                    <span class="tag">Grassroots</span>
                </div>
                <span class="btn btn-secondary btn-sm" style="align-self: flex-start; margin-top: auto; cursor: not-allowed; opacity: 0.7;">
                    Paper in Progress
                </span>
            </article>

            <!-- Week 3 Paper (Upcoming Roadmap) -->
            <article class="card" style="opacity: 0.85;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                    <span class="tag" style="background: var(--status-warning-bg); color: var(--status-warning); border-color: rgba(245, 158, 11, 0.3);">Scheduled</span>
                    <span style="font-size: 0.8rem; color: var(--text-muted); font-family: var(--font-mono);">Week 3</span>
                </div>
                <h3 class="card-title">
                    Socioeconomic Factors in Urban Planning
                </h3>
                <p class="card-text">
                    Examining key systemic socioeconomic factors that influence equitable municipal development, public transit accessibility, and zoning justice.
                </p>
                <div class="tag-list">
                    <span class="tag">Urban Studies</span>
                    <span class="tag">Socioeconomics</span>
                    <span class="tag">Policy</span>
                </div>
                <span class="btn btn-secondary btn-sm" style="align-self: flex-start; margin-top: auto; cursor: not-allowed; opacity: 0.7;">
                    Paper Scheduled
                </span>
            </article>
        </div>
    </section>

    <!-- Dynamic Drop-In Instructions Box -->
    <section class="takeaways-box" style="background: var(--bg-card); margin-bottom: 3.5rem;">
        <h3 class="takeaways-title">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            PHP Auto-Discovery Workflow for Future Papers
        </h3>
        <p style="margin-bottom: 1rem; color: var(--text-secondary);">
            Whenever you finish a new weekly assignment:
        </p>
        <ol class="takeaways-list" style="list-style: decimal; padding-left: 1.25rem;">
            <li>Save your essay as a markdown file in the <code>int1050/</code> folder (e.g. <code>week2.md</code>).</li>
            <li>PHP automatically detects the file, calculates reading stats, and lists it above!</li>
            <li>Clicking <em>Dynamic Reader</em> opens the essay with voice narration, font sizing, and 1-click citation generators.</li>
        </ol>
    </section>

    <!-- Course Learning Objectives -->
    <section id="objectives" class="section" style="padding: 3rem 0; border-top: 1px solid var(--border-color);">
        <div class="takeaways-box" style="margin: 0; background: var(--bg-card);">
            <h3 class="takeaways-title">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                Core Learning Competencies in INT-1050
            </h3>
            <ul class="takeaways-list">
                <li><strong>Critical Inquiry:</strong> Deconstructing historical and contemporary narratives of race, culture, and power structures.</li>
                <li><strong>Textual Synthesis:</strong> Connecting personal narratives and lived experiences to broader sociological frameworks.</li>
                <li><strong>Ethical Awareness:</strong> Recognizing and confronting conscious and unconscious bias in daily interpersonal interactions.</li>
                <li><strong>Civic Responsibility:</strong> Evaluating individual agency in creating more equitable and empathetic communities.</li>
            </ul>
        </div>
    </section>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
