<?php
/**
 * EDU-1030 Dynamic Markdown & Special Education Paper Reader
 */
require_once __DIR__ . '/../includes/functions.php';

$paperFile = $_GET['paper'] ?? 'udl-case-study.md';
$paperFile = basename($paperFile);
$fullPath = __DIR__ . '/' . $paperFile;

$defaultTitle = 'EDU-1030 Paper Reader';
if (file_exists($fullPath)) {
    $content = file_get_contents($fullPath);
    $firstLine = strtok($content, "\r\n");
    if (!empty($firstLine) && !str_contains($firstLine, ':')) {
        $defaultTitle = ltrim($firstLine, '# ');
    }
}

$pageTitle = $defaultTitle . ' | EDU-1030 Reader';
$metaDescription = "Read '" . $defaultTitle . "' by Hesten A. (Sheldon) for EDU-1030 Intro to Special & Secondary Education.";
$activePage = 'courses';
$rootPath = '../';
$extraStyles = ['css/reader.css'];
$extraScripts = ['js/markdown-engine.js', 'js/reader.js', 'js/audio-narrator.js'];

include __DIR__ . '/../includes/header.php';
?>

<div id="reading-progress" class="reading-progress-bar" role="progressbar" aria-label="Reading progress"></div>

<main class="reader-container">
    <nav class="breadcrumb-nav" aria-label="Breadcrumb">
        <a href="../index.php">Home</a>
        <span class="breadcrumb-separator">/</span>
        <a href="index.php">EDU-1030</a>
        <span class="breadcrumb-separator">/</span>
        <span id="breadcrumb-paper-title"><?= e($defaultTitle) ?></span>
    </nav>

    <header id="academic-header" class="academic-header">
        <span id="paper-badge" class="academic-header-tag">EDU-1030 &bull; SPED Clinical Case Study</span>
        <h1 id="paper-title" class="academic-title"><?= e($defaultTitle) ?></h1>

        <div class="academic-meta-grid">
            <div class="meta-item">
                <span class="meta-label">Author</span>
                <span id="paper-author" class="meta-value">Hesten A. (Sheldon)</span>
            </div>
            <div class="meta-item">
                <span class="meta-label">Course</span>
                <span id="paper-course" class="meta-value">EDU-1030: Special & Secondary Education</span>
            </div>
            <div class="meta-item">
                <span class="meta-label">Date</span>
                <span id="paper-date" class="meta-value"><?= date('F Y') ?></span>
            </div>
            <div class="meta-item">
                <span class="meta-label">Estimated Read</span>
                <span id="paper-read-time" class="meta-value">Calculating...</span>
            </div>
        </div>
    </header>

    <!-- Reader Controls Bar -->
    <section class="reader-controls-bar" aria-label="Reading Tools">
        <div class="control-group">
            <button id="font-decrease" class="control-btn" title="Decrease text size">A-</button>
            <button id="font-reset" class="control-btn" title="Reset text size">A</button>
            <button id="font-increase" class="control-btn" title="Increase text size">A+</button>
        </div>

        <div class="control-group">
            <button id="font-serif-btn" class="control-btn active" title="Serif font">Serif</button>
            <button id="font-sans-btn" class="control-btn" title="Sans-Serif font">Sans</button>
        </div>

        <div class="control-group">
            <button id="tts-play-btn" class="control-btn tts-btn" title="Listen to paper audio">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072M18.364 5.636a9 9 0 010 12.728M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                <span>Listen (Audio)</span>
            </button>
            <button onclick="window.print()" class="control-btn" title="Print paper">Print</button>
        </div>
    </section>

    <!-- Paper Content -->
    <article id="paper-content" class="paper-content font-serif font-size-md">
        <div class="reader-loading" id="reader-loading">
            <div class="loading-spinner"></div>
            <p>Parsing Markdown document and calculating typography...</p>
        </div>
    </article>

    <!-- Academic Citation Box -->
    <section class="citation-box" id="citation-box">
        <div class="citation-header">
            <span class="citation-title">Academic Citation (MLA Format)</span>
            <button id="copy-citation-btn" class="btn btn-secondary btn-sm">Copy Citation</button>
        </div>
        <div id="citation-text" class="citation-text">
            Sheldon, Hesten A. "<?= e($defaultTitle) ?>." EDU-1030: Introduction to Special & Secondary Education, Community College of Vermont / Vermont State Colleges, 2026.
        </div>
    </section>

    <footer class="reader-nav-footer">
        <div class="paper-nav-card">
            <span class="paper-nav-label">Course Portal</span>
            <a href="index.php" class="paper-nav-link">&larr; Back to EDU-1030 Hub</a>
        </div>
        <div class="paper-nav-card" style="text-align: right;">
            <span class="paper-nav-label">Main Site</span>
            <a href="../index.php" class="paper-nav-link">Return to Portfolio &rarr;</a>
        </div>
    </footer>
</main>

<script>
document.addEventListener('DOMContentLoaded', async () => {
    const urlParams = new URLSearchParams(window.location.search);
    const paperFile = urlParams.get('paper') || '<?= e($paperFile) ?>';

    try {
        const response = await fetch(paperFile);
        if (!response.ok) throw new Error(`Failed to load ${paperFile}`);
        const rawMarkdown = await response.text();
        const parsed = MarkdownEngine.parse(rawMarkdown);

        document.getElementById('paper-title').textContent = parsed.meta.title || 'Special Education Paper';
        document.title = `${parsed.meta.title} | EDU-1030 Reader`;
        document.getElementById('breadcrumb-paper-title').textContent = parsed.meta.title;
        if (parsed.meta.author) document.getElementById('paper-author').textContent = parsed.meta.author;
        if (parsed.meta.course) document.getElementById('paper-course').textContent = parsed.meta.course;
        if (parsed.meta.date) document.getElementById('paper-date').textContent = parsed.meta.date;

        const words = rawMarkdown.trim().split(/\s+/).length;
        document.getElementById('paper-read-time').textContent = `${Math.ceil(words / 200)} min read (${words} words)`;

        const paperContent = document.getElementById('paper-content');
        paperContent.innerHTML = parsed.html;

        document.getElementById('citation-text').textContent = 
            `Sheldon, Hesten A. "${parsed.meta.title}." EDU-1030: Introduction to Special & Secondary Education, Community College of Vermont / Vermont State Colleges, 2026.`;
    } catch (err) {
        document.getElementById('paper-content').innerHTML = `
            <div style="padding: 2rem; background: var(--status-warning-bg); border-radius: var(--radius-md); border: 1px solid var(--status-warning);">
                <h3>Unable to Load Document</h3>
                <p>Ensure <code>${paperFile}</code> exists in the <code>edu1030/</code> directory.</p>
            </div>
        `;
    }
});
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
