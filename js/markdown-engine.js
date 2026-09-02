/**
 * Lightweight Zero-Dependency Markdown & Academic Metadata Parser
 * Converts raw Markdown files with academic headers into rich semantic HTML
 */

class MarkdownEngine {
    /**
     * Parses raw markdown text into an object with metadata, TOC, and HTML content.
     * @param {string} rawText 
     * @returns {Object} { meta: Object, toc: Array, html: string }
     */
    static parse(rawText) {
        if (!rawText) return { meta: {}, toc: [], html: '' };

        const lines = rawText.split(/\r?\n/);
        const meta = {
            title: '',
            author: 'Hesten A. (Sheldon)',
            date: '',
            assignment: '',
            course: 'DIMENSIONS OF SELF AND SOCIETY',
            instructor: '',
            institution: 'Community College of Vermont / VSC'
        };

        const contentLines = [];
        let isParsingHeader = true;

        // 1. Extract Academic Header lines (e.g. Student Name: ..., Date: ..., Assignment: ...)
        for (let i = 0; i < lines.length; i++) {
            const line = lines[i].trim();

            if (isParsingHeader && i === 0 && !line.includes(':') && line.length > 0) {
                meta.title = line.replace(/^#\s*/, '');
                continue;
            }

            if (isParsingHeader) {
                const lower = line.toLowerCase();
                if (lower.startsWith('student name:')) {
                    meta.author = line.substring(line.indexOf(':') + 1).trim();
                    continue;
                } else if (lower.startsWith('date:')) {
                    meta.date = line.substring(line.indexOf(':') + 1).trim();
                    continue;
                } else if (lower.startsWith('assignment:')) {
                    meta.assignment = line.substring(line.indexOf(':') + 1).trim();
                    continue;
                } else if (lower.startsWith('class:') || lower.startsWith('course:')) {
                    meta.course = line.substring(line.indexOf(':') + 1).trim();
                    continue;
                } else if (lower.startsWith('instructor:')) {
                    meta.instructor = line.substring(line.indexOf(':') + 1).trim();
                    continue;
                } else if (line === '' && (meta.title || meta.date || meta.assignment)) {
                    isParsingHeader = false;
                    continue;
                }
            }

            // Once header is passed, remainder is essay content
            isParsingHeader = false;
            contentLines.push(lines[i]);
        }

        if (!meta.title) {
            meta.title = meta.assignment || 'Academic Response Paper';
        }

        // 2. Parse Markdown Body
        const toc = [];
        const html = MarkdownEngine.renderMarkdown(contentLines.join('\n'), toc);

        return { meta, toc, html };
    }

    static renderMarkdown(text, toc) {
        if (!text) return '';

        // Normalize text
        let html = text.trim();

        // Escape HTML tags to prevent XSS
        html = html
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');

        // Blockquotes
        html = html.replace(/^>\s*(.+)$/gim, '<blockquote class="paper-quote"><span class="paper-quote-icon">&ldquo;</span>$1</blockquote>');

        // Headers
        html = html.replace(/^### (.*$)/gim, (match, title) => {
            const id = MarkdownEngine.slugify(title);
            toc.push({ level: 3, text: title, id });
            return `<h3 id="${id}">${title}</h3>`;
        });

        html = html.replace(/^## (.*$)/gim, (match, title) => {
            const id = MarkdownEngine.slugify(title);
            toc.push({ level: 2, text: title, id });
            return `<h2 id="${id}">${title}</h2>`;
        });

        html = html.replace(/^# (.*$)/gim, (match, title) => {
            const id = MarkdownEngine.slugify(title);
            toc.push({ level: 1, text: title, id });
            return `<h1 id="${id}">${title}</h1>`;
        });

        // Bold & Italic
        html = html.replace(/\*\*\*(.*?)\*\*\*/g, '<strong><em>$1</em></strong>');
        html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
        html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');
        html = html.replace(/__(.*?)__/g, '<strong>$1</strong>');
        html = html.replace(/_(.*?)_/g, '<em>$1</em>');

        // Inline Code
        html = html.replace(/`([^`]+)`/g, '<code>$1</code>');

        // Links
        html = html.replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2" target="_blank" rel="noopener noreferrer">$1</a>');

        // Unordered Lists
        html = html.replace(/^\s*[-*]\s+(.*)$/gim, '<li>$1</li>');
        html = html.replace(/(<li>.*<\/li>)/gis, '<ul>$1</ul>');

        // Paragraphs (split on double newlines)
        const paragraphs = html.split(/\n\s*\n/);
        const parsedParagraphs = paragraphs.map(para => {
            para = para.trim();
            if (!para) return '';
            if (para.startsWith('<h') || para.startsWith('<blockquote') || para.startsWith('<ul') || para.startsWith('<ol')) {
                return para;
            }
            return `<p>${para.replace(/\n/g, '<br>')}</p>`;
        });

        return parsedParagraphs.join('\n\n');
    }

    static slugify(text) {
        return text
            .toString()
            .toLowerCase()
            .trim()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-');
    }
}

// Make globally available
window.MarkdownEngine = MarkdownEngine;
