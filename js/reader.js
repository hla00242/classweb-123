/**
 * Academic Paper Reader Interactive Utilities
 * Reading Progress, Font Customizer, Reading Time, and Citation Generator
 */

document.addEventListener('DOMContentLoaded', () => {
    initTheme(); // Share theme engine
    initReadingProgressBar();
    initTypographyControls();
    initReadingTime();
    initCitationTools();
});

// --------------------------------------------------------------------------
// 1. Reading Progress Bar
// --------------------------------------------------------------------------
function initReadingProgressBar() {
    const progressBar = document.getElementById('reading-progress');
    if (!progressBar) return;

    window.addEventListener('scroll', () => {
        const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
        if (totalHeight > 0) {
            const progress = (window.scrollY / totalHeight) * 100;
            progressBar.style.width = `${Math.min(100, Math.max(0, progress))}%`;
        }
    });
}

// --------------------------------------------------------------------------
// 2. Typography Controls (Font Size & Font Family)
// --------------------------------------------------------------------------
function initTypographyControls() {
    const paperContent = document.getElementById('paper-content');
    if (!paperContent) return;

    // Load saved preferences
    const savedFontSize = localStorage.getItem('paper-font-size') || 'md';
    const savedFontFamily = localStorage.getItem('paper-font-family') || 'sans';

    paperContent.classList.add(`font-size-${savedFontSize}`);
    paperContent.classList.add(`font-${savedFontFamily}`);

    // Font Size Buttons
    const sizeButtons = document.querySelectorAll('[data-font-size]');
    sizeButtons.forEach(btn => {
        if (btn.getAttribute('data-font-size') === savedFontSize) {
            btn.classList.add('active');
        }
        btn.addEventListener('click', () => {
            sizeButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const size = btn.getAttribute('data-font-size');
            paperContent.classList.remove('font-size-sm', 'font-size-md', 'font-size-lg');
            paperContent.classList.add(`font-size-${size}`);
            localStorage.setItem('paper-font-size', size);
        });
    });

    // Font Family Toggle Button
    const fontToggleBtn = document.getElementById('font-family-toggle');
    if (fontToggleBtn) {
        updateFontToggleText(fontToggleBtn, savedFontFamily);

        fontToggleBtn.addEventListener('click', () => {
            const isSerif = paperContent.classList.contains('font-serif');
            const newFamily = isSerif ? 'sans' : 'serif';

            paperContent.classList.remove('font-serif', 'font-sans');
            paperContent.classList.add(`font-${newFamily}`);
            localStorage.setItem('paper-font-family', newFamily);
            updateFontToggleText(fontToggleBtn, newFamily);
            showToast(`Switched to ${newFamily === 'serif' ? 'Serif (Academic)' : 'Sans-Serif (Modern)'} font`);
        });
    }
}

function updateFontToggleText(btn, family) {
    btn.innerHTML = family === 'serif' 
        ? `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg> Serif Mode`
        : `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path></svg> Sans Mode`;
}

// --------------------------------------------------------------------------
// 3. Dynamic Reading Time Calculator
// --------------------------------------------------------------------------
function initReadingTime() {
    const content = document.getElementById('paper-content');
    const target = document.getElementById('estimated-read-time');
    if (!content || !target) return;

    const text = content.innerText || '';
    const words = text.trim().split(/\s+/).length;
    const minutes = Math.ceil(words / 200); // 200 words per minute average reading speed
    target.textContent = `${minutes} min read (${words} words)`;
}

// --------------------------------------------------------------------------
// 4. Citation Tools & Clipboard
// --------------------------------------------------------------------------
function initCitationTools() {
    const copyCitationBtn = document.getElementById('copy-citation-btn');
    const citationText = document.getElementById('citation-text');
    if (!copyCitationBtn || !citationText) return;

    copyCitationBtn.addEventListener('click', () => {
        const textToCopy = citationText.innerText;
        navigator.clipboard.writeText(textToCopy).then(() => {
            showToast('Citation copied to clipboard!');
        }).catch(() => {
            showToast('Unable to copy citation');
        });
    });

    const printBtn = document.getElementById('print-paper-btn');
    if (printBtn) {
        printBtn.addEventListener('click', () => {
            window.print();
        });
    }
}

// --------------------------------------------------------------------------
// 5. Toast Notification System
// --------------------------------------------------------------------------
function showToast(message) {
    let toast = document.getElementById('toast-notice');
    if (!toast) {
        toast = document.createElement('div');
        toast.id = 'toast-notice';
        toast.className = 'toast-notice';
        document.body.appendChild(toast);
    }

    toast.textContent = message;
    toast.classList.add('show');

    setTimeout(() => {
        toast.classList.remove('show');
    }, 3000);
}
