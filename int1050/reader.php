<?php
/**
 * INT-1050 Reader Forwarder to Universal Courses Reader
 */
$paper = $_GET['paper'] ?? 'week1.md';
header("Location: ../courses/reader.php?paper=" . urlencode($paper));
exit;
