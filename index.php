<?php
// List of common bots (can be expanded)
$bots = [
    'Googlebot',
    'Bingbot',
    'Slurp',
    'DuckDuckBot',
    'Baiduspider',
    'YandexBot',
    'Sogou',
    'Exabot',
    'facebot',
    'ia_archiver'
];

// Get the User-Agent string
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

// Flag to detect bot
$isBot = false;

// Check if User-Agent matches known bots
foreach ($bots as $bot) {
    if (stripos($userAgent, $bot) !== false) {
        $isBot = true;
        break;
    }
}

// Redirect based on type
if ($isBot) {
    // Redirect bots
    header("Location: https://example.com/bot-page");
    exit();
} else {
    // Redirect real users
    header("Location: https://example.com/user-page");
    exit();
}
?>
