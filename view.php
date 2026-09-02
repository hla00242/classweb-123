<?php
/**
 * Root Course Forwarder / View Handler
 * Allows direct access to /view.php?code=cis1151 or /course.php?code=cis1151
 */
$code = $_GET['code'] ?? 'his1211';
$cleanCode = strtolower(str_replace(['-', ' '], '', $code));

// If a dedicated course folder exists, redirect directly to it
if (in_array($cleanCode, ['int1050', 'his1211', 'edu1030', 'cis1151', 'eng1061'])) {
    header("Location: " . $cleanCode . "/index.php");
    exit;
}

// Otherwise forward to courses/view.php
header("Location: courses/view.php?code=" . urlencode($code));
exit;
