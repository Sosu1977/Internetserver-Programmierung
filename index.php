<?php

// ----------------------------------------
// Projekt: Geburtstags-Wunschzettel
// Datei: index.php
// Aufgabe:
// Eine PHP-Datei erzeugt drei verschiedene Ansichten.
// Ansicht 1: Wünsche eingeben
// Ansicht 2: Lieferangaben eingeben
// Ansicht 3: Übersicht anzeigen
// ----------------------------------------

include 'includes/debug.php';
include 'includes/functions.php';

$status = $_POST['status'] ?? 'wishes';

$errors = [];

$wish1 = trim($_POST['wish1'] ?? '');
$wish2 = trim($_POST['wish2'] ?? '');
$wish3 = trim($_POST['wish3'] ?? '');

$fullname = trim($_POST['fullname'] ?? '');
$city = trim($_POST['city'] ?? '');
$phone = trim($_POST['phone'] ?? '');

$wishes = [$wish1, $wish2, $wish3];

// ----------------------------------------
// Status: Wünsche prüfen
// ----------------------------------------
if ($status === 'check_wishes') {

    $errors = validateWishes($wishes);

    if (empty($errors)) {
        $status = 'delivery';
    } else {
        $status = 'wishes';
    }
}

// ----------------------------------------
// Status: Lieferangaben prüfen
// ----------------------------------------
elseif ($status === 'check_delivery') {

    $errors = validateDelivery($fullname, $city, $phone);

    if (empty($errors)) {
        $status = 'overview';
    } else {
        $status = 'delivery';
    }
}

include 'includes/header.php';

if ($status === 'wishes') {

    writeWishForm($errors, $wish1, $wish2, $wish3);

} elseif ($status === 'delivery') {

    writeDeliveryForm($errors, $wish1, $wish2, $wish3, $fullname, $city, $phone);

} elseif ($status === 'overview') {

    writeOverview($wish1, $wish2, $wish3, $fullname, $city, $phone);

} else {

    writeWishForm($errors, $wish1, $wish2, $wish3);
}

include 'includes/footer.php';

?>