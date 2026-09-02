<?php
/**
 * HIS-1211: U.S. History to 1877 - Course Dashboard
 */
require_once __DIR__ . '/../includes/functions.php';

$pageTitle = 'HIS-1211: U.S. History to 1877 | Course Hub';
$metaDescription = 'Academic Coursework & Primary Source Analyses for HIS-1211 at CCV / Vermont State Colleges. Early American history from Colonial America to Reconstruction.';
$activePage = 'courses';
$rootPath = '../';

// Automatically discover all .md essays in this course folder
$discoveredPapers = getCoursePapers(__DIR__);

include __DIR__ . '/../includes/header.php';
?>

<main class="container" style="padding-top: 3rem; padding-bottom: 5rem;">

    <!-- Breadcrumb Navigation -->
    <nav aria-label="Breadcrumbs" style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem; margin-bottom: 2rem;">
        <a href="../index.php" style="color: var(--brand-primary); font-weight: 600;">Home</a>
        <span style="color: var(--text-muted);">&bull;</span>
        <a href="../courses/index.php" style="color: var(--brand-primary); font-weight: 600;">Academic Catalog</a>
        <span style="color: var(--text-muted);">&bull;</span>
        <span style="color: var(--text-primary); font-weight: 600;">HIS-1211</span>
    </nav>

    <!-- Course Header Card -->
    <section class="course-featured-card" style="margin-bottom: 3.5rem;">
        <div class="course-header-row">
            <div>
                <span class="course-code-badge">HIS-1211 &bull; CCV / Vermont State Colleges</span>
                <h1 class="course-title" style="font-size: 2.5rem; margin-top: 0.75rem;">
                    U.S. History to 1877
                </h1>
            </div>
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <a href="../courses/index.php" class="btn btn-secondary btn-sm">
                    &larr; All Classes
                </a>
                <?php if (!empty($discoveredPapers)): ?>
                    <a href="reader.php?paper=<?= urlencode($discoveredPapers[0]['filename']) ?>" class="btn btn-primary btn-sm">
                        Launch Dynamic Reader
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <p class="course-desc" style="font-size: 1.15rem;">
            A foundational survey of early American history from pre-Columbian indigenous societies through the American Revolution, the formation of the Republic, Antebellum sectionalism, Civil War, and the Reconstruction Era. Foundational core for the VTSU History B.A. pathway.
        </p>

        <div class="hero-stats" style="margin-top: 2rem;">
            <div class="stat-item">
                <span class="stat-number gradient-text">Hesten A.</span>
                <span class="stat-label">Student (Sheldon)</span>
            </div>
            <div class="stat-item">
                <span class="stat-number"><?= count($discoveredPapers) ?> Completed</span>
                <span class="stat-label">Discovered Papers</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">VTSU Core</span>
                <span class="stat-label">History B.A. Track</span>
            </div>
        </div>
    </section>

    <!-- Papers Section -->
    <section id="papers" class="section" style="padding: 0 0 4rem 0;">
        <div class="section-header" style="text-align: left; margin-bottom: 2.5rem; max-width: 100%;">
            <span class="section-tag">Historical Essays &amp; Analyses</span>
            <h2 class="section-title">Primary Source Essays &amp; Historiographical Research</h2>
            <p class="section-subtitle">Drop any <code>.md</code> file into this <code>his1211/</code> folder to automatically publish and read it with audio narration.</p>
        </div>

        <div class="cards-grid">
            <?php if (!empty($discoveredPapers)): ?>
                <?php foreach ($discoveredPapers as $paper): ?>
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
                            <span class="tag">Primary Sources</span>
                            <span class="tag">Early America</span>
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
        </div>
    </section>

    <!-- Drop-In Guide Box -->
    <section class="takeaways-box" style="background: var(--bg-card); margin-bottom: 3.5rem;">
        <h3 class="takeaways-title">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            How to Add New Papers &amp; Readings to HIS-1211
        </h3>
        <p style="margin-bottom: 1rem; color: var(--text-secondary);">
            To add a new history essay or primary source reflection to this class:
        </p>
        <ol class="takeaways-list" style="list-style: decimal; padding-left: 1.25rem;">
            <li>Save your essay as a markdown file in the <code>his1211/</code> folder (e.g. <code>his1211/unit2-constitution.md</code>).</li>
            <li>Add header lines at the top of your markdown file (Title, Student Name, Date, Assignment, Course).</li>
            <li>Refresh this page—PHP will automatically list it with reading stats and audio narration!</li>
        </ol>
    </section>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
