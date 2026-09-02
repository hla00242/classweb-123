<?php
/**
 * Global Modular Footer Template
 * Renders consistent footer, copyright, back-to-top button, and script tags.
 */
if (!isset($rootPath)) $rootPath = '';
?>
    <!-- Global Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="brand-logo">
                    <div class="brand-badge">HA</div>
                    <span>Hesten<span class="gradient-text">.dev</span></span>
                </div>

                <div class="footer-socials">
                    <a href="<?= $rootPath ?>resume.php" class="social-link" aria-label="Resume / CV" title="Resume / CV">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </a>
                    <a href="https://github.com/hla00242" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="GitHub Profile" title="GitHub">
                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.802 8.205 11.385.6.11.82-.257.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.043-1.61-4.043-1.61-.546-1.385-1.332-1.755-1.332-1.755-1.09-.745.08-.73.08-.73 1.205.085 1.838 1.238 1.838 1.238 1.07 1.832 2.809 1.303 3.493.996.108-.775.42-1.303.762-1.603-2.665-.3-5.466-1.332-5.466-5.942 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.52.14-3.178 0 0 1.005-.322 3.3-.997.957-.265 1.96-.398 2.96-.398s2.003.133 2.96.398c2.295.675 3.3 1 3.3 1 .68 1.658.275 2.875.14 3.178.77.84 1.235 1.91 1.235 3.22 0 4.62-2.802 5.637-5.475 5.937.42.36.81 1.096.81 2.21 0 1.595-.015 2.885-.015 3.275 0 .32.215.69.82.57C20.562 21.802 24 17.302 24 12c0-6.627-5.373-12-12-12z"></path></svg>
                    </a>
                    <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="LinkedIn Profile" title="LinkedIn">
                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path></svg>
                    </a>
                    <a href="#" onclick="window.scrollTo({top:0, behavior:'smooth'}); return false;" class="social-link" aria-label="Back to top" title="Back to Top">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                    </a>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?= date('Y') ?> Hesten A. (Sheldon) &bull; Vermont State Colleges. All rights reserved.</p>
                <p>Pure Vanilla CSS &bull; Modular PHP Platform</p>
            </div>
        </div>
    </footer>

    <!-- Global Application & Search Scripts -->
    <script src="<?= $rootPath ?>js/app.js"></script>
    <script src="<?= $rootPath ?>js/search-index.js"></script>
    <?php if (isset($extraScripts)): ?>
        <?php foreach ((array)$extraScripts as $script): ?>
            <script src="<?= $rootPath . $script ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
