<?php
/**
 * Master Academic Catalog & Degree Pathway Hub
 * Interactive semester timeline, degree progress auditor, and all-course directory.
 */
require_once __DIR__ . '/../includes/functions.php';

$pageTitle = 'Academic Catalog & Degree Pathway | Hesten A. (Sheldon)';
$metaDescription = 'Academic Coursework & Degree Pathway for Hesten A. (Sheldon) — CCV Liberal Studies A.A. and VTSU History B.A. & Secondary Education with SPED Transfer Pathway.';
$activePage = 'courses';
$rootPath = '../';
$extraStyles = ['css/courses.css'];

$catalog = getAcademicCatalog();
$stats = getDegreeStats();

include __DIR__ . '/../includes/header.php';
?>

<main class="container" style="padding-top: 2.5rem; padding-bottom: 5rem;">

    <!-- Breadcrumbs -->
    <nav aria-label="Breadcrumbs" style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem; margin-bottom: 2rem;">
        <a href="../index.php" style="color: var(--brand-primary); font-weight: 600;">Home</a>
        <span style="color: var(--text-muted);">&bull;</span>
        <span style="color: var(--text-primary); font-weight: 600;">Academic Catalog & Degree Pathway</span>
    </nav>

    <!-- Page Title Header -->
    <div style="margin-bottom: 2.5rem;">
        <span class="hero-pill" style="margin-bottom: 0.75rem;">
            <span class="hero-pill-dot"></span>
            CCV Liberal Studies &bull; VTSU History &amp; Secondary Ed (SPED)
        </span>
        <h1 style="font-family: var(--font-heading); font-size: 2.75rem; font-weight: 800; color: var(--text-primary); margin: 0.5rem 0 0.75rem 0;">
            Academic Catalog &amp; <span class="gradient-text">Degree Pathway</span>
        </h1>
        <p style="font-size: 1.15rem; color: var(--text-secondary); max-width: 750px; line-height: 1.6;">
            A transparent, centralized repository of all current semester courses, completed coursework, and upcoming upper-level transfer requirements towards educator licensure.
        </p>
    </div>

    <!-- Degree Progress Auditor Card -->
    <section class="degree-progress-card">
        <div class="degree-progress-header">
            <div>
                <span style="font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted);">
                    Degree Progression &amp; Transfer Bridge
                </span>
                <h2 style="font-family: var(--font-heading); font-size: 1.65rem; font-weight: 700; color: var(--text-primary); margin-top: 0.25rem;">
                    CCV Liberal Studies (A.A.) &rarr; VTSU History &amp; Sec Ed / SPED (B.A.)
                </h2>
            </div>
            <div class="degree-badge-group">
                <span class="degree-status-pill">
                    <span class="pulse-dot"></span>
                    Current Semester: Spring 2026 Active
                </span>
                <span class="tag" style="background: var(--badge-bg); color: var(--badge-text); font-weight: 700;">
                    4.0 Target GPA
                </span>
            </div>
        </div>

        <div class="progress-track-wrap">
            <div style="display: flex; justify-content: space-between; font-size: 0.9rem; font-weight: 600; margin-bottom: 0.5rem;">
                <span style="color: var(--text-primary);">CCV Associate Degree Progress: <?= $stats['completed_credits'] + $stats['in_progress_credits'] ?> / <?= $stats['ccv_target'] ?> Credits Completed or In-Progress</span>
                <span class="gradient-text" style="font-weight: 800;"><?= $stats['ccv_progress_pct'] ?>%</span>
            </div>
            <div class="progress-track-bar">
                <div class="progress-fill" style="width: <?= $stats['ccv_progress_pct'] ?>%;"></div>
            </div>
        </div>

        <div class="degree-stats-grid">
            <div class="stat-metric-card">
                <span class="stat-metric-val gradient-text"><?= $stats['in_progress_credits'] ?> Cr</span>
                <span class="stat-metric-label">Current Term (Spring 2026)</span>
            </div>
            <div class="stat-metric-card">
                <span class="stat-metric-val"><?= $stats['completed_credits'] ?> Cr</span>
                <span class="stat-metric-label">Completed Fall 2025</span>
            </div>
            <div class="stat-metric-card">
                <span class="stat-metric-val"><?= $stats['planned_credits'] ?> Cr</span>
                <span class="stat-metric-label">VTSU Transfer Pathway</span>
            </div>
            <div class="stat-metric-card">
                <span class="stat-metric-val" style="color: var(--brand-accent);"><?= $stats['total_catalog_courses'] ?></span>
                <span class="stat-metric-label">Total Documented Courses</span>
            </div>
        </div>
    </section>

    <!-- Interactive Catalog Toolbar -->
    <div class="catalog-toolbar">
        <!-- Semester Filter Pills -->
        <div class="filter-bar" style="margin-bottom: 0; padding: 0;">
            <button class="filter-btn semester-filter-btn active" data-semester-filter="all">All Semesters</button>
            <button class="filter-btn semester-filter-btn" data-semester-filter="spring-2026">Current (Spring 2026)</button>
            <button class="filter-btn semester-filter-btn" data-semester-filter="fall-2025">Completed (Fall 2025)</button>
            <button class="filter-btn semester-filter-btn" data-semester-filter="vtsu-pathway">VTSU Transfer Pathway</button>
        </div>

        <!-- Live Search -->
        <div class="search-input-wrap">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" id="course-search-input" placeholder="Search course code, subject, title...">
        </div>

        <!-- View Switcher -->
        <div class="view-toggle-group">
            <button class="view-toggle-btn active" id="btn-view-grid" title="Grid View">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Grid
            </button>
            <button class="view-toggle-btn" id="btn-view-timeline" title="Timeline View">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Timeline
            </button>
        </div>
    </div>

    <!-- Category Filter Bar -->
    <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 2.5rem; align-items: center;">
        <span style="font-size: 0.85rem; font-weight: 700; color: var(--text-muted); margin-right: 0.5rem;">Subject Filter:</span>
        <button class="filter-btn category-filter-btn active" data-cat-filter="all" style="padding: 0.3rem 0.75rem; font-size: 0.8rem;">All Subjects</button>
        <button class="filter-btn category-filter-btn" data-cat-filter="history" style="padding: 0.3rem 0.75rem; font-size: 0.8rem;">History &amp; Humanities</button>
        <button class="filter-btn category-filter-btn" data-cat-filter="education" style="padding: 0.3rem 0.75rem; font-size: 0.8rem;">Education &amp; SPED</button>
        <button class="filter-btn category-filter-btn" data-cat-filter="social-sciences" style="padding: 0.3rem 0.75rem; font-size: 0.8rem;">Social Sciences</button>
        <button class="filter-btn category-filter-btn" data-cat-filter="technology" style="padding: 0.3rem 0.75rem; font-size: 0.8rem;">Technology &amp; Design</button>
        <button class="filter-btn category-filter-btn" data-cat-filter="general-ed" style="padding: 0.3rem 0.75rem; font-size: 0.8rem;">General Education</button>
    </div>

    <!-- 1. GRID VIEW CONTAINER -->
    <div id="catalog-grid-view" class="course-catalog-grid">
        <?php foreach ($catalog['courses'] as $key => $course): 
            $url = (str_contains($course['custom_url'], 'http') || str_starts_with($course['custom_url'], '../')) 
                    ? $course['custom_url'] 
                    : $rootPath . $course['custom_url'];
        ?>
            <article class="course-card-enhanced" 
                     data-semester="<?= e($course['semester_id']) ?>" 
                     data-category="<?= e($course['category_slug']) ?>"
                     data-search-text="<?= strtolower(e($course['code'] . ' ' . $course['title'] . ' ' . $course['description'] . ' ' . $course['category'])) ?>">
                
                <div>
                    <div class="course-card-top">
                        <span class="timeline-code-badge"><?= e($course['code']) ?></span>
                        <span class="tag" style="font-size: 0.75rem; <?= $course['status'] === 'In Progress' ? 'background: var(--brand-gradient-subtle); color: var(--brand-primary); font-weight:700;' : ($course['status'] === 'Completed' ? 'background: var(--status-success-bg); color: var(--status-success);' : '') ?>">
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
                        <span>&bull;</span>
                        <span style="color: var(--brand-primary); font-weight: 600;"><?= e($course['semester_name']) ?></span>
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
                    <a href="<?= e($url) ?>" class="btn btn-secondary btn-sm" style="margin-left: auto;">
                        View Course Hub &rarr;
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <!-- 2. TIMELINE VIEW CONTAINER (Initially Hidden or Toggled) -->
    <div id="catalog-timeline-view" class="semester-timeline" style="display: none;">
        <?php foreach ($catalog['courses'] as $key => $course): 
            $url = (str_contains($course['custom_url'], 'http') || str_starts_with($course['custom_url'], '../')) 
                    ? $course['custom_url'] 
                    : $rootPath . $course['custom_url'];
            $isActive = ($course['status'] === 'In Progress');
        ?>
            <div class="timeline-item <?= $isActive ? 'active' : '' ?>" 
                 data-semester="<?= e($course['semester_id']) ?>" 
                 data-category="<?= e($course['category_slug']) ?>"
                 data-search-text="<?= strtolower(e($course['code'] . ' ' . $course['title'] . ' ' . $course['description'] . ' ' . $course['category'])) ?>">
                
                <div class="timeline-node">
                    <div class="timeline-node-inner"></div>
                </div>

                <div class="timeline-content-card">
                    <div class="timeline-card-header">
                        <span class="timeline-code-badge"><?= e($course['code']) ?></span>
                        <span class="tag" style="<?= $isActive ? 'background: var(--brand-gradient-subtle); color: var(--brand-primary); font-weight:700;' : '' ?>">
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
                        <span style="color: var(--brand-primary); font-weight: 600;"><?= e($course['semester_name']) ?></span>
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

    <!-- Empty State -->
    <div id="catalog-empty-state" style="display: none; text-align: center; padding: 4rem 1rem; background: var(--bg-card); border-radius: var(--radius-lg); border: 1px dashed var(--border-color); margin-top: 2rem;">
        <div style="font-size: 2.5rem; margin-bottom: 1rem;">🔍</div>
        <h3 style="font-family: var(--font-heading); font-size: 1.35rem; color: var(--text-primary); margin-bottom: 0.5rem;">No Courses Match Your Filter</h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 1.5rem;">Try clearing your search query or selecting "All Semesters".</p>
        <button id="reset-filters-btn" class="btn btn-secondary btn-sm">Reset All Filters</button>
    </div>

</main>

<!-- Catalog Interactive Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    let currentSemester = 'all';
    let currentCategory = 'all';
    let searchQuery = '';
    let currentView = 'grid';

    const gridView = document.getElementById('catalog-grid-view');
    const timelineView = document.getElementById('catalog-timeline-view');
    const btnGrid = document.getElementById('btn-view-grid');
    const btnTimeline = document.getElementById('btn-view-timeline');
    const searchInput = document.getElementById('course-search-input');
    const emptyState = document.getElementById('catalog-empty-state');
    const resetBtn = document.getElementById('reset-filters-btn');

    const semesterBtns = document.querySelectorAll('.semester-filter-btn');
    const categoryBtns = document.querySelectorAll('.category-filter-btn');

    // View Switching
    btnGrid.addEventListener('click', () => {
        currentView = 'grid';
        btnGrid.classList.add('active');
        btnTimeline.classList.remove('active');
        gridView.style.display = 'grid';
        timelineView.style.display = 'none';
        applyFilters();
    });

    btnTimeline.addEventListener('click', () => {
        currentView = 'timeline';
        btnTimeline.classList.add('active');
        btnGrid.classList.remove('active');
        timelineView.style.display = 'block';
        gridView.style.display = 'none';
        applyFilters();
    });

    // Semester Filters
    semesterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            semesterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentSemester = btn.dataset.semesterFilter;
            applyFilters();
        });
    });

    // Category Filters
    categoryBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            categoryBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentCategory = btn.dataset.catFilter;
            applyFilters();
        });
    });

    // Search Input
    searchInput.addEventListener('input', (e) => {
        searchQuery = e.target.value.toLowerCase().trim();
        applyFilters();
    });

    // Reset Filters
    resetBtn.addEventListener('click', () => {
        currentSemester = 'all';
        currentCategory = 'all';
        searchQuery = '';
        searchInput.value = '';
        semesterBtns.forEach((b, idx) => b.classList.toggle('active', idx === 0));
        categoryBtns.forEach((b, idx) => b.classList.toggle('active', idx === 0));
        applyFilters();
    });

    function applyFilters() {
        const activeContainer = (currentView === 'grid') ? gridView : timelineView;
        const items = activeContainer.querySelectorAll(currentView === 'grid' ? '.course-card-enhanced' : '.timeline-item');
        let visibleCount = 0;

        items.forEach(item => {
            const itemSem = item.dataset.semester;
            const itemCat = item.dataset.category;
            const itemSearch = item.dataset.searchText || '';

            const matchSem = (currentSemester === 'all' || itemSem === currentSemester);
            const matchCat = (currentCategory === 'all' || itemCat === currentCategory);
            const matchSearch = (searchQuery === '' || itemSearch.includes(searchQuery));

            if (matchSem && matchCat && matchSearch) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        if (visibleCount === 0) {
            emptyState.style.display = 'block';
            activeContainer.style.display = 'none';
        } else {
            emptyState.style.display = 'none';
            activeContainer.style.display = (currentView === 'grid') ? 'grid' : 'block';
        }
    }
});
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
