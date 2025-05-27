<?php
// Get IP address of visitor
$ip = $_SERVER['REMOTE_ADDR'];

// Use ip-api.com for geolocation (free for non-commercial use)
$locationData = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"), true);

if ($locationData && $locationData['status'] === 'success') {
    $country = $locationData['countryCode'];

    // Redirect based on country code
    switch ($country) {
        case 'US':
            header("Location: https://us.example.com");
            break;
        case 'IN':
            header("Location: https://in.example.com");
            break;
        case 'GB':
            header("Location: https://uk.example.com");
            break;
        default:
            header("Location: https://global.example.com");
            break;
    }

    exit(); // Always exit after redirection
} else {
    // If geolocation fails, redirect to global
    header("Location: https://global.example.com");
    exit();
}
?>
