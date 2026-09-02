<?php
/**
 * Global Modular Header Template
 * Provides consistent SEO metadata, OpenGraph cards, navigation bar, and theme switcher.
 */
if (!isset($rootPath)) $rootPath = '';
if (!isset($pageTitle)) $pageTitle = 'Hesten A. | Student Portfolio & Academic Hub';
if (!isset($metaDescription)) $metaDescription = 'Academic Portfolio & Coursework Hub for Hesten A. (Sheldon) — Liberal Studies at CCV / VSC, transferring to VTSU for History & Secondary Education with SPED.';
if (!isset($activePage)) $activePage = '';
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($metaDescription) ?>">
    <meta name="author" content="Hesten A. (Sheldon)">

    <!-- OpenGraph / Social Sharing Card Meta -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($metaDescription) ?>">
    <meta property="og:site_name" content="Hesten.dev Portfolio">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($metaDescription) ?>">

    <title><?= htmlspecialchars($pageTitle) ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;1,300;1,400&family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= $rootPath ?>css/main.css">
    <?php if (isset($extraStyles)): ?>
        <?php foreach ((array)$extraStyles as $style): ?>
            <link rel="stylesheet" href="<?= $rootPath . $style ?>">
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Schema.org JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "Hesten A. (Sheldon)",
      "email": "hla00242@vsc.edu",
      "affiliation": [
        {
          "@type": "CollegeOrUniversity",
          "name": "Community College of Vermont"
        },
        {
          "@type": "CollegeOrUniversity",
          "name": "Vermont State Colleges"
        },
        {
          "@type": "CollegeOrUniversity",
          "name": "Vermont State University"
        }
      ],
      "jobTitle": "Undergraduate Student & Future Educator",
      "knowsAbout": ["Liberal Studies", "History Education", "Special Education (SPED)", "Secondary Education", "Web Development", "Vanilla CSS", "JavaScript", "Sociological Inquiry"]
    }
    </script>
</head>
<body>

    <!-- Sticky Navigation Header -->
    <header class="navbar" id="navbar">
        <div class="container navbar-inner">
            <a href="<?= $rootPath ?>index.php" class="brand-logo" aria-label="Hesten A. Portfolio Home">
                <div class="brand-badge">HA</div>
                <span>Hesten<span class="gradient-text">.dev</span></span>
            </a>

            <!-- Desktop Navigation Links -->
            <nav aria-label="Main Navigation">
                <ul class="nav-links">
                    <li><a href="<?= $rootPath ?>index.php#about" class="nav-link <?= $activePage === 'about' ? 'active' : '' ?>">About</a></li>
                    <li><a href="<?= $rootPath ?>int1050/index.php" class="nav-link <?= $activePage === 'coursework' ? 'active' : '' ?>">Coursework</a></li>
                    <li><a href="<?= $rootPath ?>index.php#skills" class="nav-link <?= $activePage === 'skills' ? 'active' : '' ?>">Skills</a></li>
                    <li><a href="<?= $rootPath ?>index.php#projects" class="nav-link <?= $activePage === 'projects' ? 'active' : '' ?>">Projects</a></li>
                    <li><a href="<?= $rootPath ?>index.php#blog" class="nav-link <?= $activePage === 'blog' ? 'active' : '' ?>">Blog</a></li>
                    <li><a href="<?= $rootPath ?>resume.php" class="nav-link <?= $activePage === 'resume' ? 'active' : '' ?>">Resume</a></li>
                    <li><a href="<?= $rootPath ?>index.php#contact" class="nav-link <?= $activePage === 'contact' ? 'active' : '' ?>">Contact</a></li>
                </ul>
            </nav>

            <!-- Actions (Search Button, Theme Toggle & Mobile Menu) -->
            <div class="nav-actions">
                <!-- Command Palette Search Button (Ctrl+K) -->
                <button class="theme-toggle-btn search-trigger-btn" aria-label="Search site (Ctrl+K)" title="Spotlight Search (Ctrl + K / /)">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px; height: 20px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>

                <!-- Theme Toggle Button -->
                <button class="theme-toggle-btn" aria-label="Toggle dark and light theme" title="Toggle Theme">
                    <svg class="sun-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <svg class="moon-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>

                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn" aria-label="Open mobile navigation menu">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div class="mobile-drawer" id="mobile-drawer">
            <ul class="mobile-nav-links">
                <li><a href="<?= $rootPath ?>index.php#about" class="nav-link">About</a></li>
                <li><a href="<?= $rootPath ?>int1050/index.php" class="nav-link">Coursework</a></li>
                <li><a href="<?= $rootPath ?>index.php#skills" class="nav-link">Skills</a></li>
                <li><a href="<?= $rootPath ?>index.php#projects" class="nav-link">Projects</a></li>
                <li><a href="<?= $rootPath ?>index.php#blog" class="nav-link">Blog</a></li>
                <li><a href="<?= $rootPath ?>resume.php" class="nav-link">Resume (CV)</a></li>
                <li><a href="<?= $rootPath ?>index.php#contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </header>
