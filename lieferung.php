<?php
<?php

// ----------------------------------------
// Projekt: Geburtstags-Wunschzettel
// Datei: lieferung.php
// Aufgabe: 2. Seitenaufruf
// Autor: Sönmez Süner
// Beschreibung:
// Anzeige der Wünsche aus Seite 1.
// Eingabe und Prüfung der Lieferdaten.
// Nur bei gültigen Eingaben erfolgt die
// Weiterleitung zur Seite Übersicht.
// ----------------------------------------

// Debug-Ausgabe und Session starten
include 'includes/debug.php';

// Hilfsfunktionen einbinden
include 'includes/functions.php';

// Fehlerliste aus der Session lesen
$errors = $_SESSION['delivery_errors'] ?? [];

// Fehlerliste nach dem Auslesen löschen
unset($_SESSION['delivery_errors']);

// Wünsche aus der Session lesen
$wish1 = $_SESSION['wish1'] ?? '';
$wish2 = $_SESSION['wish2'] ?? '';
$wish3 = $_SESSION['wish3'] ?? '';

// Prüfen, ob das Formular abgeschickt wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Eingaben aus dem Formular lesen und Leerzeichen entfernen
    $fullname = trim($_POST['fullname'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $phone = trim($_POST['phone'] ?? '');

    // Fehlerliste vorbereiten
    $errors = [];

    // Prüfen, ob alle Felder ausgefüllt wurden
    if ($fullname === '') {
        $errors[] = 'Bitte geben Sie Ihren Vor- und Nachnamen ein.';
    }

    if ($city === '') {
        $errors[] = 'Bitte geben Sie PLZ und Ort ein.';
    }

    if ($phone === '') {
        $errors[] = 'Bitte geben Sie eine Telefonnummer ein.';
    }

    // Vor- und Nachname prüfen
    // Es sind nur Buchstaben, Umlaute und Leerzeichen erlaubt.
    if ($fullname !== '' && !preg_match('/^[a-zA-ZäöüÄÖÜß ]+$/', $fullname)) {
        $errors[] = 'Im Namen sind nur Buchstaben erlaubt.';
    }

    // PLZ und Ort prüfen
    // Es sind Buchstaben, Zahlen, Umlaute und Leerzeichen erlaubt.
    if ($city !== '' && !preg_match('/^[a-zA-ZäöüÄÖÜß0-9 ]+$/', $city)) {
        $errors[] = 'PLZ und Ort dürfen keine Sonderzeichen enthalten.';
    }

    // Telefonnummer prüfen
    // Es sind ausschließlich Zahlen erlaubt.
    if ($phone !== '' && !preg_match('/^[0-9]+$/', $phone)) {
        $errors[] = 'Telefon darf nur Zahlen enthalten.';
    }

    // Fehlerfall: Fehlerliste speichern und Seite erneut aufrufen
    if (!empty($errors)) {
        $_SESSION['delivery_errors'] = $errors;
        header('Location: lieferung.php');
        exit;
    }

    // Erfolgsfall: Lieferdaten in der Session speichern
    $_SESSION['fullname'] = $fullname;
    $_SESSION['city'] = $city;
    $_SESSION['phone'] = $phone;

    // Zur Übersichtsseite weiterleiten
    header('Location: uebersicht.php');
    exit;
}

// HTML-Kopfbereich laden
include 'includes/header.php';

?>

    <h2>Lieferangaben</h2>

<?php

// Fehlermeldungen anzeigen, falls vorhanden
if (!empty($errors)) {

    echo '<div class="error-message">';

    foreach ($errors as $error) {
        echo '<p>' . $error . '</p>';
    }

    echo '</div>';
}

?>

    <div class="wish-summary">
        <p>1. Wunsch: <?php echo htmlspecialchars($wish1); ?></p>
        <p>2. Wunsch: <?php echo htmlspecialchars($wish2); ?></p>
        <p>3. Wunsch: <?php echo htmlspecialchars($wish3); ?></p>
    </div>

    <form method="post" action="lieferung.php">

        <div class="form-grid">

            <label for="fullname">Vor- und Nachname:</label>
            <input type="text" id="fullname" name="fullname">

            <label for="city">PLZ und Ort:</label>
            <input type="text" id="city" name="city">

            <label for="phone">Telefon:</label>
            <input type="text" id="phone" name="phone">

        </div>

        <div class="button-row">
            <button type="button" onclick="history.back()">Abbrechen</button>
            <button type="submit">OK</button>
        </div>

    </form>

<?php

// HTML-Dokument schließen
include 'includes/footer.php';

?>