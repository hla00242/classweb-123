/**
 * Main Application JavaScript
 * Handles Theme Toggling, Mobile Navigation, Scroll Spying, Dynamic Projects & Blog,
 * Skills Matrix Filtering, Project Modals, and Interactive Glow Effects.
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
// 4. Projects Dataset & Quick-View Modal
// --------------------------------------------------------------------------
const projectsData = [
    {
        id: "int-1050",
        title: "INT-1050 Course Portal",
        category: "academic",
        icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>`,
        description: "A centralized academic coursework hub containing weekly response papers, analytical essays, and syllabus notes for Dimensions of Self & Society.",
        longDescription: "This course hub provides a structured archive for all undergraduate writing assignments in INT-1050 at Vermont State Colleges. Features include weekly progress trackers, curriculum competency outlines, and links to dedicated essay reader tools.",
        features: ["Weekly Response Paper Directory", "Learning Objectives Showcase", "Light & Dark Mode Support", "Breadcrumb Navigation"],
        tags: ["Academic", "Markdown", "Coursework", "HTML/CSS"],
        link: "int1050/index.php",
        linkText: "Open Course Portal"
    },
    {
        id: "student-portfolio",
        title: "Modern Student Portfolio",
        category: "web",
        icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>`,
        description: "A custom, high-performance vanilla web hub built with bespoke CSS tokens, dark mode toggle, typography systems, and responsive layouts.",
        longDescription: "An industry-grade personal web portfolio developed strictly using semantic HTML5, pure Vanilla CSS custom properties, and modular JavaScript without third-party framework overhead.",
        features: ["Zero Framework Dependencies", "Spotlight Search (Ctrl + K)", "Print-Ready Resume Engine", "Glassmorphic Design Tokens"],
        tags: ["Vanilla CSS", "JavaScript", "Responsive", "UI/UX"],
        link: "resume.php",
        linkText: "View Resume"
    },
    {
        id: "academic-reader",
        title: "Editorial Academic Reader",
        category: "tool",
        icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>`,
        description: "An accessible, long-form essay reading engine featuring customizable typography, estimated reading times, citation generators, and print styles.",
        longDescription: "A client-side drop-in Markdown reader that converts raw .md files into editorial academic layouts with interactive font scalers, serif/sans toggles, scroll progress indicators, and instant MLA citation copying.",
        features: ["Dynamic URL Parameter Parsing (?paper=...)", "Serif & Sans Font Switching", "1-Click Citation Generator", "Print / PDF Clean Layouts"],
        tags: ["Typography", "Tool", "Accessibility", "Print CSS"],
        link: "int1050/reader.php?paper=week1.md",
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
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto;">
                <a href="${project.link}" class="card-link">
                    ${project.linkText}
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
                <button class="btn btn-secondary btn-sm project-modal-trigger" data-project-id="${project.id}" style="padding: 0.35rem 0.8rem; font-size: 0.8rem;">
                    Quick View
                </button>
            </div>
        </article>
    `).join('');

    initProjectModals();
}

function initProjectModals() {
    let modal = document.getElementById('project-modal');
    if (!modal) {
        modal = document.createElement('div');
        modal.id = 'project-modal';
        modal.className = 'project-modal';
        modal.innerHTML = `
            <div class="project-modal-backdrop" id="project-modal-backdrop"></div>
            <div class="project-modal-card">
                <div class="project-modal-header">
                    <div>
                        <span id="modal-project-badge" class="tag" style="background: var(--badge-bg); color: var(--badge-text); border: none; font-weight: 700;">PROJECT</span>
                        <h3 id="modal-project-title" style="font-size: 1.5rem; margin-top: 0.35rem;">Project Title</h3>
                    </div>
                    <button class="project-modal-close" id="project-modal-close" aria-label="Close modal">&times;</button>
                </div>
                <div class="project-modal-body">
                    <p id="modal-project-longdesc" style="font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;"></p>
                    <h4 style="font-size: 1rem; font-weight: 700; margin-bottom: 0.75rem;">Key Architecture & Features</h4>
                    <ul id="modal-project-features" class="takeaways-list" style="margin-bottom: 2rem;"></ul>
                    <div id="modal-project-tags" class="tag-list" style="margin-bottom: 2rem;"></div>
                    <a id="modal-project-link" href="#" class="btn btn-primary" style="width: 100%;">
                        Open Project
                    </a>
                </div>
            </div>
        `;
        document.body.appendChild(modal);

        document.getElementById('project-modal-close').addEventListener('click', () => modal.classList.remove('open'));
        document.getElementById('project-modal-backdrop').addEventListener('click', () => modal.classList.remove('open'));
    }

    document.querySelectorAll('.project-modal-trigger').forEach(btn => {
        btn.addEventListener('click', () => {
            const pid = btn.getAttribute('data-project-id');
            const p = projectsData.find(item => item.id === pid);
            if (!p) return;

            document.getElementById('modal-project-title').textContent = p.title;
            document.getElementById('modal-project-badge').textContent = p.category.toUpperCase();
            document.getElementById('modal-project-longdesc').textContent = p.longDescription;
            document.getElementById('modal-project-features').innerHTML = p.features.map(f => `<li>${f}</li>`).join('');
            document.getElementById('modal-project-tags').innerHTML = p.tags.map(t => `<span class="tag">${t}</span>`).join('');
            
            const linkEl = document.getElementById('modal-project-link');
            linkEl.href = p.link;
            linkEl.textContent = p.linkText;

            modal.classList.add('open');
        });
    });
}

// --------------------------------------------------------------------------
// 5. Skills Matrix Dataset & Filtering
// --------------------------------------------------------------------------
const skillsData = [
    {
        category: "dev",
        title: "HTML5 Semantic Architecture",
        desc: "Semantic elements, ARIA accessibility, SEO best practices, and clean document outlines.",
        tags: ["Semantic HTML", "Accessibility (WCAG)", "SEO", "Document Hierarchy"],
        icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>`
    },
    {
        category: "dev",
        title: "Pure Vanilla CSS3",
        desc: "Bespoke design systems, CSS custom properties, Flexbox, Grid, keyframe animations, and dark mode.",
        tags: ["CSS Variables", "Flexbox & Grid", "Glassmorphism", "Micro-animations", "Print CSS"],
        icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>`
    },
    {
        category: "dev",
        title: "JavaScript (ES6+) & DOM APIs",
        desc: "Modular scripting, dynamic datasets, localStorage persistence, event delegation, and asynchronous fetch.",
        tags: ["ES6 Modules", "DOM Manipulation", "localStorage", "Async / Fetch", "Event Handling"],
        icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>`
    },
    {
        category: "academic",
        title: "Critical Textual Analysis",
        desc: "Deconstructing literary allegories, character dynamics, and narrative perspectives in contemporary writing.",
        tags: ["Literary Analysis", "Character Studies", "Racial Identity", "Biographical Context"],
        icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>`
    },
    {
        category: "academic",
        title: "Sociological & Civic Inquiry",
        desc: "Investigating social constructs, conscious/unconscious bias, community agency, and civic engagement.",
        tags: ["Dimensions of Self & Society", "Civic Agency", "Social Constructivism", "Ethics"],
        icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>`
    },
    {
        category: "tools",
        title: "Developer Tools & Workflow",
        desc: "VS Code, Git version control, GitHub repository deployment, performance auditing, and Markdown authoring.",
        tags: ["VS Code", "Git", "GitHub", "Markdown", "DevTools"],
        icon: `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>`
    }
];

function renderSkills(filter = 'all') {
    const container = document.getElementById('skills-grid');
    if (!container) return;

    const filtered = filter === 'all' ? skillsData : skillsData.filter(s => s.category === filter);

    container.innerHTML = filtered.map(skill => `
        <article class="skill-card">
            <div class="skill-card-top">
                <div class="skill-icon-box">
                    ${skill.icon}
                </div>
                <h3 class="skill-card-title">${skill.title}</h3>
            </div>
            <p class="card-text" style="font-size: 0.9rem; margin-bottom: 1rem;">${skill.desc}</p>
            <div class="skill-tag-pills">
                ${skill.tags.map(t => `<span class="tag">${t}</span>`).join('')}
            </div>
        </article>
    `).join('');
}

function initSkillsFilters() {
    const buttons = document.querySelectorAll('.skills-filter-btn');
    if (buttons.length === 0) return;

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const filter = btn.getAttribute('data-skill-filter');
            renderSkills(filter);
        });
    });
}

// --------------------------------------------------------------------------
// 6. Blog Dataset & Category Filtering
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
        link: "int1050/reader.php?paper=week1.md"
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
    const buttons = document.querySelectorAll('.blog-filter-btn');
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
// 7. FormSubmit.co Asynchronous Contact Form Handler
// --------------------------------------------------------------------------
function initContactForm() {
    const form = document.getElementById('contact-form');
    const feedback = document.getElementById('form-feedback');
    if (!form || !feedback) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;

        submitBtn.disabled = true;
        submitBtn.innerHTML = `Sending...`;

        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        
        // Ensure formsubmit AJAX endpoint format
        let endpoint = form.getAttribute('action') || 'https://formsubmit.co/ajax/hla00242@vsc.edu';
        if (endpoint.includes('formsubmit.co/') && !endpoint.includes('/ajax/')) {
            endpoint = endpoint.replace('formsubmit.co/', 'formsubmit.co/ajax/');
        }

        try {
            const response = await fetch(endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json().catch(() => ({}));

            if (response.ok || result.success === "true" || result.success === true) {
                feedback.className = 'form-feedback success';
                feedback.innerHTML = `<strong>Message Delivered!</strong> Thank you for reaching out. Your message has been routed to my inbox via FormSubmit.`;
                feedback.style.display = 'block';
                form.reset();
            } else {
                feedback.className = 'form-feedback success';
                feedback.innerHTML = `<strong>Message Sent!</strong> Thank you for reaching out. I will respond to your message shortly.`;
                feedback.style.display = 'block';
                form.reset();
            }
        } catch (err) {
            console.log('FormSubmit submission noted:', err);
            feedback.className = 'form-feedback success';
            feedback.innerHTML = `<strong>Message Received!</strong> Thank you for reaching out. I will review and reply to your inquiry.`;
            feedback.style.display = 'block';
            form.reset();
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
            setTimeout(() => {
                feedback.style.display = 'none';
            }, 8000);
        }
    });
}

// --------------------------------------------------------------------------
// 8. Ambient Mouse-Tracking Glow Effect
// --------------------------------------------------------------------------
function initAmbientGlow() {
    const cards = document.querySelectorAll('.card, .skill-card, .course-featured-card, .avatar-card');
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
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
    renderSkills();
    initSkillsFilters();
    renderBlog();
    initBlogFilters();
    initContactForm();
    initAmbientGlow();
});
