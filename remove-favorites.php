<?php
session_start();

// Check if removing all or a single painting
if (isset($_GET['remove']) && $_GET['remove'] === 'all') {
    unset($_SESSION['favorites']);
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = array_filter($_SESSION['favorites'], function ($favorite) use ($id) {
            return $favorite['PaintingID'] != $id;
        });
    }
}

// Redirect back to view-favorites.php
header("Location: view-favorites.php");
exit();
?>
