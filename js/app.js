/**
 * Main Application JavaScript
 * Handles Theme Toggling, Mobile Navigation, Scroll Spying, Dynamic Projects & Blog, and Form Validation
 */

// --------------------------------------------------------------------------
// 1. Theme Management (Light / Dark Mode)
// --------------------------------------------------------------------------
function initTheme() {
    const savedTheme = localStorage.getItem('site-theme');
    const systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    if (savedTheme) {
        document.documentElement.setAttribute('data-theme', savedTheme);
    } else if (systemPrefersDark) {
        document.documentElement.setAttribute('data-theme', 'dark');
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
    }

    const toggleBtns = document.querySelectorAll('.theme-toggle-btn');
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('site-theme', newTheme);
        });
    });
}

// --------------------------------------------------------------------------
// 2. Mobile Navigation Drawer
// --------------------------------------------------------------------------
function initMobileMenu() {
    const menuBtn = document.querySelector('.mobile-menu-btn');
    const drawer = document.querySelector('.mobile-drawer');
    if (!menuBtn || !drawer) return;

    menuBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        drawer.classList.toggle('open');
    });

    document.querySelectorAll('.mobile-nav-links .nav-link').forEach(link => {
        link.addEventListener('click', () => {
            drawer.classList.remove('open');
        });
    });

    document.addEventListener('click', (e) => {
        if (!drawer.contains(e.target) && !menuBtn.contains(e.target)) {
            drawer.classList.remove('open');
        }
    });
}

// --------------------------------------------------------------------------
// 3. Scroll Spy & Navbar Highlighting
// --------------------------------------------------------------------------
function initScrollSpy() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-links .nav-link');
    if (sections.length === 0 || navLinks.length === 0) return;

    window.addEventListener('scroll', () => {
        let currentSection = '';
        const scrollPosition = window.scrollY + 120;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                currentSection = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${currentSection}`) {
                link.classList.add('active');
            }
        });
    });
}

// --------------------------------------------------------------------------
// 4. Projects Dataset & Rendering
// --------------------------------------------------------------------------
const projectsData = [
    {
        id: "int-1050",
        title: "INT-1050 Course Portal",
        category: "academic",
        icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>`,
        description: "A centralized academic coursework hub containing weekly response papers, analytical essays, and syllabus notes for Dimensions of Self & Society.",
        tags: ["Academic", "Markdown", "Coursework", "HTML/CSS"],
        link: "int1050/index.html",
        linkText: "Open Course Portal"
    },
    {
        id: "student-portfolio",
        title: "Modern Student Portfolio",
        category: "web",
        icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>`,
        description: "A custom, high-performance vanilla web hub built with bespoke CSS tokens, dark mode toggle, typography systems, and responsive layouts.",
        tags: ["Vanilla CSS", "JavaScript", "Responsive", "UI/UX"],
        link: "#",
        linkText: "View Architecture"
    },
    {
        id: "academic-reader",
        title: "Editorial Academic Reader",
        category: "tool",
        icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>`,
        description: "An accessible, long-form essay reading engine featuring customizable typography, estimated reading times, citation generators, and print styles.",
        tags: ["Typography", "Tool", "Accessibility", "Print CSS"],
        link: "int1050/week1.html",
        linkText: "Launch Reader"
    }
];

function renderProjects() {
    const container = document.getElementById('projects-grid');
    if (!container) return;

    container.innerHTML = projectsData.map(project => `
        <article class="card">
            <div class="card-icon-wrap">
                ${project.icon}
            </div>
            <h3 class="card-title">${project.title}</h3>
            <p class="card-text">${project.description}</p>
            <div class="tag-list">
                ${project.tags.map(tag => `<span class="tag">${tag}</span>`).join('')}
            </div>
            <a href="${project.link}" class="card-link">
                ${project.linkText}
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </article>
    `).join('');
}

// --------------------------------------------------------------------------
// 5. Blog Dataset & Category Filtering
// --------------------------------------------------------------------------
const blogArticles = [
    {
        title: "Why I Rebuilt My Portfolio with Pure Vanilla CSS",
        date: "September 1, 2026",
        category: "dev",
        readTime: "4 min read",
        summary: "Moving away from heavy runtime framework CDNs toward a clean, lightweight custom design system using CSS variables, glassmorphism, and semantic HTML.",
        link: "#blog"
    },
    {
        title: "Analyzing Racial Identity in Literature: Lawrence Hill's Allegory",
        date: "September 13, 2025",
        category: "academic",
        readTime: "5 min read",
        summary: "A reflective analysis on how subtle character interactions and parental lessons shape our understanding of race and empathy in modern society.",
        link: "int1050/week1.html"
    },
    {
        title: "Crafting Accessible Reading Experiences on the Web",
        date: "August 20, 2025",
        category: "design",
        readTime: "3 min read",
        summary: "How font size scalers, serif/sans toggles, high contrast ratios, and print stylesheets enhance reading comprehension for academic essays.",
        link: "#blog"
    }
];

function renderBlog(filter = 'all') {
    const container = document.getElementById('blog-posts-grid');
    if (!container) return;

    const filtered = filter === 'all' ? blogArticles : blogArticles.filter(item => item.category === filter);

    container.innerHTML = filtered.map(post => `
        <article class="card">
            <div class="tag-list" style="margin-bottom: 0.75rem;">
                <span class="tag" style="background: var(--badge-bg); color: var(--badge-text); border: none; font-weight: 700;">${post.category.toUpperCase()}</span>
                <span class="tag">${post.readTime}</span>
            </div>
            <h3 class="card-title">${post.title}</h3>
            <p class="paper-mini-meta" style="margin-bottom: 1rem;">${post.date}</p>
            <p class="card-text">${post.summary}</p>
            <a href="${post.link}" class="card-link">
                Read Article
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </article>
    `).join('');
}

function initBlogFilters() {
    const buttons = document.querySelectorAll('.filter-btn');
    if (buttons.length === 0) return;

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const filterValue = btn.getAttribute('data-filter');
            renderBlog(filterValue);
        });
    });
}

// --------------------------------------------------------------------------
// 6. Interactive Contact Form
// --------------------------------------------------------------------------
function initContactForm() {
    const form = document.getElementById('contact-form');
    const feedback = document.getElementById('form-feedback');
    if (!form || !feedback) return;

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;

        submitBtn.disabled = true;
        submitBtn.innerHTML = `Sending...`;

        setTimeout(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
            feedback.className = 'form-feedback success';
            feedback.innerHTML = `<strong>Message Sent!</strong> Thank you for reaching out. I will get back to you shortly.`;
            form.reset();

            setTimeout(() => {
                feedback.style.display = 'none';
            }, 6000);
        }, 600);
    });
}

// --------------------------------------------------------------------------
// DOM Initialization
// --------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    initMobileMenu();
    initScrollSpy();
    renderProjects();
    renderBlog();
    initBlogFilters();
    initContactForm();
});
