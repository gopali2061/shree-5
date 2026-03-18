<?php
// Prevent clickjacking
header("X-Frame-Options: DENY");

// Prevent MIME type sniffing
header("X-Content-Type-Options: nosniff");

// Enable basic XSS protection
header("X-XSS-Protection: 1; mode=block");

// Control referrer information
header("Referrer-Policy: no-referrer");

// Optional: basic Content Security Policy
header("Content-Security-Policy: default-src 'self'; img-src 'self' data:; script-src 'self'; style-src 'self' 'unsafe-inline';");
?>