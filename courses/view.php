<?php
/**
 * Dynamic Course Hub & Syllabus Portal
 * Renders individual course information, assignments, competencies, and reader integration.
 */
require_once __DIR__ . '/../includes/functions.php';

$code = $_GET['code'] ?? 'his1211';
$course = getCourseDetails($code);

if (!$course) {
    // Default fallback to HIS-1211 if not found
    $course = getCourseDetails('his1211');
}

$pageTitle = $course['code'] . ': ' . $course['title'] . ' | Course Hub';
$metaDescription = $course['code'] . ' - ' . $course['title'] . ' at ' . $course['institution'] . '. Syllabus, coursework, competencies, and academic reflections.';
$activePage = 'courses';
$rootPath = '../';
$extraStyles = ['css/courses.css'];

include __DIR__ . '/../includes/header.php';
?>

<main class="container" style="padding-top: 2.5rem; padding-bottom: 5rem;">

    <!-- Breadcrumb Navigation -->
    <nav aria-label="Breadcrumbs" style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem; margin-bottom: 2rem;">
        <a href="../index.php" style="color: var(--brand-primary); font-weight: 600;">Home</a>
        <span style="color: var(--text-muted);">&bull;</span>
        <a href="index.php" style="color: var(--brand-primary); font-weight: 600;">Academic Catalog</a>
        <span style="color: var(--text-muted);">&bull;</span>
        <span style="color: var(--text-primary); font-weight: 600;"><?= e($course['code']) ?></span>
    </nav>

    <!-- Course Header Card -->
    <header class="course-hub-header">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem; margin-bottom: 1rem;">
            <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
                <span class="timeline-code-badge" style="font-size: 0.9rem; padding: 0.35rem 0.85rem;">
                    <?= e($course['code']) ?> &bull; <?= e($course['institution']) ?>
                </span>
                <span class="tag" style="background: var(--brand-gradient-subtle); color: var(--brand-primary); font-weight: 700;">
                    <?= e($course['status_badge']) ?>
                </span>
            </div>

            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <a href="index.php" class="btn btn-secondary btn-sm">
                    &larr; Return to Catalog
                </a>
                <?php if (isset($course['reader_url'])): ?>
                    <a href="<?= $rootPath . e($course['reader_url']) ?>" class="btn btn-primary btn-sm">
                        Launch Markdown Reader
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <h1 style="font-family: var(--font-heading); font-size: 2.5rem; font-weight: 800; color: var(--text-primary); margin-bottom: 1rem; line-height: 1.2;">
            <?= e($course['title']) ?>
        </h1>

        <p style="font-size: 1.15rem; color: var(--text-secondary); max-width: 800px; line-height: 1.6; margin-bottom: 2rem;">
            <?= e($course['description']) ?>
        </p>

        <div class="degree-stats-grid" style="margin-top: 0; padding-top: 1.5rem;">
            <div class="stat-metric-card">
                <span class="stat-metric-val gradient-text"><?= e($course['credits']) ?> Credits</span>
                <span class="stat-metric-label">Credit Weight</span>
            </div>
            <div class="stat-metric-card">
                <span class="stat-metric-val"><?= e($course['semester_name']) ?></span>
                <span class="stat-metric-label">Term / Academic Cycle</span>
            </div>
            <div class="stat-metric-card">
                <span class="stat-metric-val" style="font-size: 1.25rem;"><?= e($course['schedule']) ?></span>
                <span class="stat-metric-label">Format / Meeting Time</span>
            </div>
            <div class="stat-metric-card">
                <span class="stat-metric-val" style="font-size: 1.25rem; color: var(--brand-primary);"><?= e($course['category']) ?></span>
                <span class="stat-metric-label">Academic Discipline</span>
            </div>
        </div>
    </header>

    <!-- Two-Column Course Body -->
    <div class="course-hub-grid">
        
        <!-- Left Column: Assignments & Projects -->
        <div>
            <section class="course-hub-section">
                <h2 class="course-hub-section-title">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Assignments, Projects &amp; Essays
                </h2>

                <?php if (!empty($course['assignments'])): ?>
                    <?php foreach ($course['assignments'] as $assign): ?>
                        <div class="assignment-row-card">
                            <div>
                                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.35rem;">
                                    <span class="tag" style="font-size: 0.75rem; <?= $assign['status'] === 'Completed' ? 'background: var(--status-success-bg); color: var(--status-success);' : '' ?>">
                                        <?= e($assign['status']) ?>
                                    </span>
                                    <span style="font-size: 0.8rem; font-weight: 600; color: var(--text-muted);"><?= e($assign['type']) ?></span>
                                </div>
                                <h3 class="assignment-title"><?= e($assign['title']) ?></h3>
                                <p class="assignment-meta"><?= e($assign['summary']) ?></p>
                            </div>

                            <div>
                                <?php if (isset($assign['reader_link'])): ?>
                                    <a href="<?= $rootPath . e($assign['reader_link']) ?>" class="btn btn-primary btn-sm" style="white-space: nowrap;">
                                        Read Paper &rarr;
                                    </a>
                                <?php else: ?>
                                    <span class="tag" style="white-space: nowrap;"><?= e($assign['status']) ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="color: var(--text-muted); font-style: italic;">Course syllabus and assignment schedule documented for degree audit records.</p>
                <?php endif; ?>
            </section>

            <!-- Learning Competencies -->
            <section class="course-hub-section">
                <h2 class="course-hub-section-title">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                    Curriculum Competencies &amp; Skills Acquired
                </h2>
                <ul class="resume-bullets" style="margin-left: 1rem;">
                    <?php foreach ($course['competencies'] as $comp): ?>
                        <li style="margin-bottom: 0.75rem; font-size: 1rem; color: var(--text-secondary);">
                            <strong style="color: var(--text-primary);"><?= e($comp) ?></strong>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </div>

        <!-- Right Column: Degree Alignment & Navigation -->
        <div>
            <section class="course-hub-section">
                <h2 class="course-hub-section-title">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Degree Alignment
                </h2>
                <p style="font-size: 0.95rem; color: var(--text-secondary); line-height: 1.6; margin-bottom: 1.25rem;">
                    This course directly satisfies foundational requirements within the <strong>CCV Liberal Studies A.A.</strong> and bridges into the <strong>VTSU History B.A. &amp; Secondary Education with SPED</strong> degree plan.
                </p>
                <div style="background: var(--bg-secondary); padding: 1rem; border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                    <div style="font-weight: 700; font-size: 0.9rem; color: var(--text-primary); margin-bottom: 0.25rem;">Transfer Destination:</div>
                    <div style="font-size: 0.85rem; color: var(--brand-primary); font-weight: 600;">Vermont State University (VTSU)</div>
                </div>
            </section>

            <!-- Other Active Courses Quick Jump -->
            <section class="course-hub-section">
                <h2 class="course-hub-section-title">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    Spring 2026 Roster
                </h2>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <a href="../int1050/index.php" style="padding: 0.65rem 0.85rem; border-radius: var(--radius-md); background: var(--bg-secondary); border: 1px solid var(--border-color); text-decoration: none; display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-weight: 700; font-size: 0.9rem; color: var(--text-primary);">INT-1050: Dimensions of Self &amp; Society</span>
                        <span style="font-size: 0.75rem; color: var(--brand-primary);">&rarr;</span>
                    </a>
                    <a href="view.php?code=his1211" style="padding: 0.65rem 0.85rem; border-radius: var(--radius-md); background: var(--bg-secondary); border: 1px solid var(--border-color); text-decoration: none; display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-weight: 700; font-size: 0.9rem; color: var(--text-primary);">HIS-1211: U.S. History to 1877</span>
                        <span style="font-size: 0.75rem; color: var(--brand-primary);">&rarr;</span>
                    </a>
                    <a href="view.php?code=edu1030" style="padding: 0.65rem 0.85rem; border-radius: var(--radius-md); background: var(--bg-secondary); border: 1px solid var(--border-color); text-decoration: none; display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-weight: 700; font-size: 0.9rem; color: var(--text-primary);">EDU-1030: Intro to SPED &amp; Sec Ed</span>
                        <span style="font-size: 0.75rem; color: var(--brand-primary);">&rarr;</span>
                    </a>
                    <a href="view.php?code=cis1151" style="padding: 0.65rem 0.85rem; border-radius: var(--radius-md); background: var(--bg-secondary); border: 1px solid var(--border-color); text-decoration: none; display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-weight: 700; font-size: 0.9rem; color: var(--text-primary);">CIS-1151: Websites &amp; Web App Design</span>
                        <span style="font-size: 0.75rem; color: var(--brand-primary);">&rarr;</span>
                    </a>
                    <a href="view.php?code=eng1061" style="padding: 0.65rem 0.85rem; border-radius: var(--radius-md); background: var(--bg-secondary); border: 1px solid var(--border-color); text-decoration: none; display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-weight: 700; font-size: 0.9rem; color: var(--text-primary);">ENG-1061: English Composition</span>
                        <span style="font-size: 0.75rem; color: var(--brand-primary);">&rarr;</span>
                    </a>
                </div>
            </section>
        </div>

    </div>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
