<?php
session_start();

// Check if required query parameters are present
if (isset($_GET['id'], $_GET['file'], $_GET['title'])) {
    // Sanitize inputs
    $id = intval($_GET['id']); // Ensure ID is an integer
    $file = htmlspecialchars($_GET['file'], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars(urldecode($_GET['title']), ENT_QUOTES, 'UTF-8');
    
    // Retrieve or initialize the favorites list
    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = [];
    }

    // Check if the item already exists in favorites
    $exists = false;
    foreach ($_SESSION['favorites'] as $favorite) {
        if ($favorite['PaintingID'] == $id) {
            $exists = true;
            break;
        }
    }

    // Add the painting only if it doesn't already exist
    if (!$exists) {
        $_SESSION['favorites'][] = [
            'PaintingID' => $id,
            'ImageFileName' => $file,
            'Title' => $title
        ];
    }
}

// Redirect to view-favorites.php
header("Location: view-favorites.php");
exit();
?>