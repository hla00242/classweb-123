<?php
/**
 * Global Helper Functions & Academic Coursework Scanner
 * Handles dynamic discovery of Markdown essays, metadata parsing, and utility helpers.
 */

/**
 * Scans a directory for .md files and extracts academic metadata.
 * @param string $dir Path to course directory
 * @return array List of parsed paper objects
 */
function getCoursePapers($dir) {
    $papers = [];
    if (!is_dir($dir)) {
        return $papers;
    }

    $files = glob($dir . '/*.md');
    if (!$files) {
        return $papers;
    }

    foreach ($files as $filePath) {
        $filename = basename($filePath);
        $content = file_get_contents($filePath);
        
        $lines = preg_split('/\r\n|\r|\n/', trim($content));
        $meta = [
            'filename'    => $filename,
            'slug'        => pathinfo($filename, PATHINFO_FILENAME),
            'title'       => '',
            'author'      => 'Hesten A. (Sheldon)',
            'date'        => 'September 2025',
            'assignment'  => 'Response Paper',
            'course'      => 'Dimensions of Self & Society',
            'word_count'  => str_word_count(strip_tags($content)),
            'read_time'   => ceil(str_word_count(strip_tags($content)) / 200) . ' min read',
            'summary'     => '',
            'status'      => 'Completed'
        ];

        $isHeader = true;
        $bodyLines = [];

        foreach ($lines as $i => $line) {
            $trimmed = trim($line);

            if ($isHeader && $i === 0 && !str_contains($trimmed, ':') && !empty($trimmed)) {
                $meta['title'] = ltrim($trimmed, '# ');
                continue;
            }

            if ($isHeader) {
                $lower = strtolower($trimmed);
                if (str_starts_with($lower, 'student name:')) {
                    $meta['author'] = trim(substr($trimmed, strpos($trimmed, ':') + 1));
                    continue;
                } elseif (str_starts_with($lower, 'date:')) {
                    $meta['date'] = trim(substr($trimmed, strpos($trimmed, ':') + 1));
                    continue;
                } elseif (str_starts_with($lower, 'assignment:')) {
                    $meta['assignment'] = trim(substr($trimmed, strpos($trimmed, ':') + 1));
                    continue;
                } elseif (str_starts_with($lower, 'class:') || str_starts_with($lower, 'course:')) {
                    $meta['course'] = trim(substr($trimmed, strpos($trimmed, ':') + 1));
                    continue;
                } elseif (empty($trimmed) && (!empty($meta['title']) || !empty($meta['date']))) {
                    $isHeader = false;
                    continue;
                }
            }

            $isHeader = false;
            if (!empty($trimmed)) {
                $bodyLines[] = $trimmed;
            }
        }

        if (empty($meta['title'])) {
            $meta['title'] = ucfirst($meta['slug']);
        }

        // Generate excerpt
        if (!empty($bodyLines)) {
            $firstPara = $bodyLines[0];
            $meta['summary'] = strlen($firstPara) > 180 ? substr($firstPara, 0, 180) . '...' : $firstPara;
        }

        $papers[] = $meta;
    }

    return $papers;
}

/**
 * Cleanly escapes string for safe HTML output.
 */
function e($str) {
    return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8');
}
