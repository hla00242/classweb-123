<?php
/**
 * Universal Dynamic Markdown & Academic Essay Reader
 * Loads any markdown file, extracts metadata, renders reading tools, and powers Audio Narration.
 */
require_once __DIR__ . '/../includes/functions.php';

$paperFile = $_GET['paper'] ?? 'week1.md';
// Sanitize filename to prevent directory traversal
$paperFile = basename($paperFile);
$fullPath = __DIR__ . '/' . $paperFile;

$defaultTitle = 'Academic Essay Reader';
$defaultDate = date('F Y');
if (file_exists($fullPath)) {
    $content = file_get_contents($fullPath);
    $firstLine = strtok($content, "\r\n");
    if (!empty($firstLine) && !str_contains($firstLine, ':')) {
        $defaultTitle = ltrim($firstLine, '# ');
    }
}

$pageTitle = $defaultTitle . ' | INT-1050 Academic Reader';
$metaDescription = "Read '" . $defaultTitle . "' by Hesten A. (Sheldon) for INT-1050 Dimensions of Self & Society with interactive voice narration and typography tools.";
$activePage = 'coursework';
$rootPath = '../';
$extraStyles = ['css/reader.css'];
$extraScripts = ['js/markdown-engine.js', 'js/reader.js', 'js/audio-narrator.js'];

include __DIR__ . '/../includes/header.php';
?>

<!-- Reading Progress Bar -->
<div id="reading-progress" class="reading-progress-bar" role="progressbar" aria-label="Reading progress"></div>

<!-- Main Reader Wrapper -->
<main class="reader-container">

    <!-- Breadcrumb Navigation -->
    <nav class="breadcrumb-nav" aria-label="Breadcrumb">
        <a href="../index.php">Home</a>
        <span class="breadcrumb-separator">/</span>
        <a href="index.php">INT-1050</a>
        <span class="breadcrumb-separator">/</span>
        <span id="breadcrumb-paper-title"><?= e($defaultTitle) ?></span>
    </nav>

    <!-- Academic Metadata Header (Dynamically Populated) -->
    <header id="academic-header" class="academic-header">
        <span id="paper-badge" class="academic-header-tag">INT-1050 &bull; Response Paper</span>
        <h1 id="paper-title" class="academic-title"><?= e($defaultTitle) ?></h1>
        
        <div class="academic-meta-grid">
            <div class="meta-field">
                <span class="meta-label">Author</span>
                <span class="meta-value" id="paper-author">Hesten A. (Sheldon)</span>
            </div>
            <div class="meta-field">
                <span class="meta-label">Course</span>
                <span class="meta-value" id="paper-course">Dimensions of Self & Society</span>
            </div>
            <div class="meta-field">
                <span class="meta-label">Date Completed</span>
                <span class="meta-value" id="paper-date">September 13, 2025</span>
            </div>
            <div class="meta-field">
                <span class="meta-label">Reading Time</span>
                <span class="meta-value" id="estimated-read-time">Calculating...</span>
            </div>
        </div>
    </header>

    <!-- Reading Customization Toolbar -->
    <section class="reader-toolbar" aria-label="Reading Options">
        <div class="toolbar-group">
            <span style="font-size: 0.85rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Text Size:</span>
            <button class="toolbar-btn" data-font-size="sm" title="Smaller Font">A-</button>
            <button class="toolbar-btn active" data-font-size="md" title="Default Font">A</button>
            <button class="toolbar-btn" data-font-size="lg" title="Larger Font">A+</button>
        </div>

        <div class="toolbar-group">
            <button id="font-family-toggle" class="toolbar-btn" title="Toggle Serif / Sans Font">
                Sans Mode
            </button>
            <button id="print-paper-btn" class="toolbar-btn" title="Print or Save as PDF">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H7v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                Print / PDF
            </button>
        </div>
    </section>

    <!-- Dynamic Table of Contents (If headings exist) -->
    <nav id="reader-toc-container" class="takeaways-box" style="display: none; margin-bottom: 2.5rem; background: var(--bg-card);">
        <h3 class="takeaways-title" style="font-size: 1.1rem; margin-bottom: 0.75rem;">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
            Table of Contents
        </h3>
        <ul id="reader-toc-list" class="takeaways-list" style="margin-left: 0.5rem;"></ul>
    </nav>

    <!-- Main Dynamic Paper Content -->
    <article id="paper-content" class="paper-content">
        <div style="text-align: center; padding: 3rem 0; color: var(--text-muted);">
            <p>Loading paper from source...</p>
        </div>
    </article>

    <!-- Citation Helper Card -->
    <section class="citation-box" id="citation-box">
        <div class="citation-header">
            <span class="citation-title">Academic Citation (MLA Format)</span>
            <button id="copy-citation-btn" class="btn btn-secondary btn-sm">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                Copy Citation
            </button>
        </div>
        <div id="citation-text" class="citation-text">
            Sheldon, Hesten A. "<?= e($defaultTitle) ?>." INT-1050: Dimensions of Self and Society, Vermont State Colleges, 2025.
        </div>
    </section>

    <!-- Reader Navigation Footer -->
    <footer class="reader-nav-footer">
        <div class="paper-nav-card">
            <span class="paper-nav-label">Course Portal</span>
            <a href="index.php" class="paper-nav-link">
                &larr; Back to INT-1050 Hub
            </a>
        </div>

        <div class="paper-nav-card" style="text-align: right;">
            <span class="paper-nav-label">Main Site</span>
            <a href="../index.php" class="paper-nav-link">
                Return to Portfolio &rarr;
            </a>
        </div>
    </footer>

</main>

<!-- Dynamic Loader Script -->
<script>
    document.addEventListener('DOMContentLoaded', async () => {
        const urlParams = new URLSearchParams(window.location.search);
        const paperFile = urlParams.get('paper') || '<?= e($paperFile) ?>';

        try {
            const response = await fetch(paperFile);
            if (!response.ok) {
                throw new Error(`Failed to load ${paperFile} (Status: ${response.status})`);
            }
            const rawMarkdown = await response.text();
            const parsed = MarkdownEngine.parse(rawMarkdown);

            // Update Metadata Header
            document.getElementById('paper-title').textContent = parsed.meta.title || 'Response Paper';
            document.title = `${parsed.meta.title} | INT-1050 Reader`;
            document.getElementById('breadcrumb-paper-title').textContent = parsed.meta.title;
            if (parsed.meta.author) document.getElementById('paper-author').textContent = parsed.meta.author;
            if (parsed.meta.course) document.getElementById('paper-course').textContent = parsed.meta.course;
            if (parsed.meta.date) document.getElementById('paper-date').textContent = parsed.meta.date;
            if (parsed.meta.assignment) document.getElementById('paper-badge').textContent = `INT-1050 • ${parsed.meta.assignment}`;

            // Update Citation
            const citeYear = parsed.meta.date ? (parsed.meta.date.match(/\d{4}/) ? parsed.meta.date.match(/\d{4}/)[0] : '2025') : '2025';
            document.getElementById('citation-text').textContent = 
                `Sheldon, Hesten A. "${parsed.meta.title}." INT-1050: Dimensions of Self and Society, Vermont State Colleges, ${parsed.meta.date || citeYear}.`;

            // Update TOC if headers exist
            const tocContainer = document.getElementById('reader-toc-container');
            const tocList = document.getElementById('reader-toc-list');
            if (parsed.toc && parsed.toc.length > 0) {
                tocList.innerHTML = parsed.toc.map(item => `
                    <li><a href="#${item.id}" style="color: var(--brand-primary); font-weight: 600;">${item.text}</a></li>
                `).join('');
                tocContainer.style.display = 'block';
            }

            // Render Content Body
            const paperContentEl = document.getElementById('paper-content');
            paperContentEl.innerHTML = parsed.html;

            // Recalculate Reading Time & Words
            const words = rawMarkdown.trim().split(/\s+/).length;
            const minutes = Math.max(1, Math.ceil(words / 200));
            document.getElementById('estimated-read-time').textContent = `${minutes} min read (${words} words)`;

            // Re-initialize Audio Narrator on newly injected content
            if (window.narrator) {
                window.narrator.findParagraphs();
            }

        } catch (err) {
            console.error('Error rendering markdown paper:', err);
            document.getElementById('paper-content').innerHTML = `
                <div class="takeaways-box" style="border-color: #ef4444;">
                    <h3 style="color: #ef4444; font-size: 1.2rem; margin-bottom: 0.5rem;">Could not load paper source</h3>
                    <p style="color: var(--text-secondary);">Unable to fetch markdown file: <code>${paperFile}</code>.</p>
                    <p style="margin-top: 1rem;"><a href="index.php" class="btn btn-primary btn-sm">&larr; Return to INT-1050 Course Hub</a></p>
                </div>
            `;
        }
    });
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
