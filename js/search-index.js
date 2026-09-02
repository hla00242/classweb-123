/**
 * Unified Search Index & Command Palette Engine (Ctrl + K / Cmd + K / Slash / Click)
 * Instant spotlight search across essays, coursework, projects, blog, and quick actions.
 */

const siteSearchIndex = [
    // --- Academic Coursework & Papers ---
    {
        title: "Week 1: 'So, What are You, Anyway?'",
        category: "Coursework",
        snippet: "Response paper analyzing Lawrence Hill's allegory on racial identity, prejudice, and parental lessons.",
        url: "int1050/week1.html",
        keywords: "lawrence hill carole racial identity prejudice stewardess shirley temple int1050 week 1 response paper essay"
    },
    {
        title: "Universal Markdown Paper Reader",
        category: "Coursework",
        snippet: "Drop-in Markdown reading engine for any INT-1050 weekly response paper.",
        url: "int1050/reader.html?paper=week1.md",
        keywords: "reader markdown dynamic week1 week2 week3 int1050 viewer"
    },
    {
        title: "INT-1050 Course Dashboard",
        category: "Coursework",
        snippet: "Dimensions of Self and Society curriculum roadmap, paper archives, and competencies.",
        url: "int1050/index.html",
        keywords: "int-1050 dimensions self society course class syllabus vermont state colleges"
    },
    {
        title: "Week 2: Community & Civic Engagement",
        category: "Coursework",
        snippet: "Research paper on grassroots initiatives and democratic civic participation.",
        url: "int1050/index.html#papers",
        keywords: "civic engagement community grassroots politics sociology week 2"
    },
    {
        title: "Week 3: Socioeconomic Factors in Urban Planning",
        category: "Coursework",
        snippet: "Analysis of socioeconomic equity in municipal transit, zoning, and infrastructure.",
        url: "int1050/index.html#papers",
        keywords: "urban planning socioeconomic zoning transit policy week 3"
    },

    // --- Projects ---
    {
        title: "INT-1050 Course Portal",
        category: "Project",
        snippet: "Centralized academic hub for weekly response papers and course reflections.",
        url: "int1050/index.html",
        keywords: "project int1050 portal academic website"
    },
    {
        title: "Modern Student Portfolio",
        category: "Project",
        snippet: "Pure Vanilla CSS web hub with dark mode, custom design system, and responsive layout.",
        url: "index.html#about",
        keywords: "project portfolio vanilla css javascript web development design system"
    },
    {
        title: "Editorial Academic Reader",
        category: "Project",
        snippet: "Accessible long-form essay reading tool with font scaling, citations, and print styles.",
        url: "int1050/week1.html",
        keywords: "project reader typography accessibility citations tool"
    },

    // --- Blog & Articles ---
    {
        title: "Why I Rebuilt My Portfolio with Pure Vanilla CSS",
        category: "Blog",
        snippet: "Moving away from heavy runtime CDNs toward a clean, bespoke Vanilla CSS system.",
        url: "index.html#blog",
        keywords: "blog vanilla css tailwind rebuild performance web development"
    },
    {
        title: "Analyzing Racial Identity in Literature: Lawrence Hill's Allegory",
        category: "Blog",
        snippet: "Sociological reflection on subtle character interactions and parental values.",
        url: "int1050/week1.html",
        keywords: "blog academic literature lawrence hill race prejudice"
    },
    {
        title: "Crafting Accessible Reading Experiences on the Web",
        category: "Blog",
        snippet: "How font size scalers, serif/sans toggles, and print stylesheets enhance comprehension.",
        url: "index.html#blog",
        keywords: "blog ui ux design typography accessibility reading"
    },

    // --- Quick Actions & Resume ---
    {
        title: "View Academic & Tech Resume (CV)",
        category: "Resume",
        snippet: "View and print Hesten A.'s education, technical skills, coursework, and projects.",
        url: "resume.html",
        keywords: "resume cv education skills experience jobs hire vermont state colleges"
    },
    {
        title: "Toggle Dark / Light Theme",
        category: "Action",
        snippet: "Switch between dark mode and light mode color palettes.",
        action: "toggle-theme",
        keywords: "dark mode light mode theme color switch"
    },
    {
        title: "Get In Touch / Contact Form",
        category: "Action",
        snippet: "Send a direct inquiry or message to Hesten A.",
        url: "index.html#contact",
        keywords: "contact message email reach out connect hire"
    }
];

// --------------------------------------------------------------------------
// Command Palette UI Management
// --------------------------------------------------------------------------
function initCommandPalette() {
    let modal = document.getElementById('command-palette-modal');
    if (!modal) {
        modal = document.createElement('div');
        modal.id = 'command-palette-modal';
        modal.className = 'command-palette-modal';
        modal.setAttribute('role', 'dialog');
        modal.setAttribute('aria-modal', 'true');
        modal.setAttribute('aria-label', 'Spotlight Search');
        modal.innerHTML = `
            <div class="command-palette-backdrop" id="cp-backdrop"></div>
            <div class="command-palette-card">
                <div class="command-palette-input-wrap">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="cp-search-icon"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" id="cp-search-input" class="command-palette-input" placeholder="Search essays, projects, coursework, actions... (ESC to close)" autocomplete="off" spellcheck="false">
                    <button id="cp-close-btn" class="cp-kbd" style="cursor: pointer; border: none;" title="Close">ESC</button>
                </div>
                <div id="cp-results-list" class="command-palette-results">
                    <!-- Results dynamically injected -->
                </div>
                <div class="command-palette-footer">
                    <span><kbd class="cp-kbd">↑</kbd> <kbd class="cp-kbd">↓</kbd> Navigate</span>
                    <span><kbd class="cp-kbd">ENTER</kbd> Select</span>
                    <span><kbd class="cp-kbd">ESC</kbd> Close</span>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
    }

    const input = document.getElementById('cp-search-input');
    const resultsContainer = document.getElementById('cp-results-list');
    const backdrop = document.getElementById('cp-backdrop');
    const closeBtn = document.getElementById('cp-close-btn');

    let activeIndex = 0;
    let currentResults = [];

    function openPalette() {
        modal.classList.add('open');
        input.value = '';
        renderResults('');
        setTimeout(() => {
            input.focus();
            input.select();
        }, 30);
    }

    function closePalette() {
        modal.classList.remove('open');
    }

    function renderResults(query) {
        const q = (query || '').trim().toLowerCase();
        if (!q) {
            currentResults = siteSearchIndex.slice(0, 8); // Show default options
        } else {
            currentResults = siteSearchIndex.filter(item => {
                const text = `${item.title} ${item.category} ${item.snippet} ${item.keywords}`.toLowerCase();
                return text.includes(q);
            });
        }

        activeIndex = 0;
        if (currentResults.length === 0) {
            resultsContainer.innerHTML = `
                <div class="cp-no-results">
                    <p>No matching essays, projects, or actions found for "<strong>${escapeHtml(query)}</strong>"</p>
                </div>
            `;
            return;
        }

        resultsContainer.innerHTML = currentResults.map((item, index) => {
            const badgeClass = item.category.toLowerCase();
            return `
                <div class="cp-result-item ${index === 0 ? 'selected' : ''}" data-index="${index}">
                    <div class="cp-item-main">
                        <span class="cp-badge cp-badge-${badgeClass}">${item.category}</span>
                        <div class="cp-item-text">
                            <span class="cp-item-title">${item.title}</span>
                            <span class="cp-item-snippet">${item.snippet}</span>
                        </div>
                    </div>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="cp-item-arrow"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            `;
        }).join('');

        // Add click events to items
        resultsContainer.querySelectorAll('.cp-result-item').forEach(el => {
            el.addEventListener('click', () => {
                const idx = parseInt(el.getAttribute('data-index'), 10);
                selectItem(idx);
            });
        });
    }

    function selectItem(index) {
        const item = currentResults[index];
        if (!item) return;

        closePalette();

        if (item.action === 'toggle-theme') {
            const current = document.documentElement.getAttribute('data-theme');
            const next = current === 'dark' ? 'light' : 'dark';
            document.documentElement.setAttribute('data-theme', next);
            localStorage.setItem('site-theme', next);
        } else if (item.url) {
            // Adjust relative url if we're inside a subdirectory like int1050/
            const currentPath = window.location.pathname.replace(/\\/g, '/');
            const inSubfolder = currentPath.includes('/int1050/') || currentPath.endsWith('/int1050') || currentPath.includes('/int1050');
            
            let targetUrl = item.url;
            if (inSubfolder) {
                if (targetUrl.startsWith('int1050/')) {
                    targetUrl = targetUrl.replace('int1050/', '');
                } else if (!targetUrl.startsWith('http') && !targetUrl.startsWith('../')) {
                    targetUrl = '../' + targetUrl;
                }
            }
            window.location.href = targetUrl;
        }
    }

    function updateSelection() {
        const items = resultsContainer.querySelectorAll('.cp-result-item');
        items.forEach((el, idx) => {
            if (idx === activeIndex) {
                el.classList.add('selected');
                el.scrollIntoView({ block: 'nearest' });
            } else {
                el.classList.remove('selected');
            }
        });
    }

    // Input Search Listener
    input.addEventListener('input', (e) => {
        renderResults(e.target.value);
    });

    // Keyboard Navigation inside input
    input.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowDown') {
            e.preventDefault();
            if (currentResults.length > 0) {
                activeIndex = (activeIndex + 1) % currentResults.length;
                updateSelection();
            }
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            if (currentResults.length > 0) {
                activeIndex = (activeIndex - 1 + currentResults.length) % currentResults.length;
                updateSelection();
            }
        } else if (e.key === 'Enter') {
            e.preventDefault();
            selectItem(activeIndex);
        } else if (e.key === 'Escape') {
            e.preventDefault();
            closePalette();
        }
    });

    backdrop.addEventListener('click', closePalette);
    if (closeBtn) closeBtn.addEventListener('click', closePalette);

    // Global Key Listener on document with CAPTURING phase
    document.addEventListener('keydown', (e) => {
        const isMac = navigator.platform.toUpperCase().indexOf('MAC') >= 0;
        const isShortcut = (isMac ? e.metaKey : e.ctrlKey) && (e.key === 'k' || e.key === 'K');
        
        // Also support '/' when not focused on an input/textarea
        const isSlash = e.key === '/' && !['INPUT', 'TEXTAREA', 'SELECT'].includes(document.activeElement?.tagName);

        if (isShortcut || isSlash) {
            e.preventDefault();
            e.stopPropagation();
            if (modal.classList.contains('open')) {
                closePalette();
            } else {
                openPalette();
            }
        } else if (e.key === 'Escape' && modal.classList.contains('open')) {
            e.preventDefault();
            closePalette();
        }
    }, true);

    // Attach to any search button triggers on page
    document.querySelectorAll('.search-trigger-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            openPalette();
        });
    });

    // Expose helper globally for direct invocation if needed
    window.openCommandPalette = openPalette;
    window.closeCommandPalette = closePalette;
}

function escapeHtml(str) {
    if (!str) return '';
    return str.replace(/[&<>'"]/g, 
        tag => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[tag] || tag)
    );
}

// Ensure execution even if DOMContentLoaded already fired
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCommandPalette);
} else {
    initCommandPalette();
}
