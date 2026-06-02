<?php

// ----------------------------------------
// Projekt: Geburtstags-Wunschzettel
// Datei: functions.php
// Beschreibung:
// Enthält Funktionen für Validierung und HTML-Ausgabe.
// ----------------------------------------

function validateWishes(array $wishes): array
{
    $errors = [];
    $hasWish = false;

    foreach ($wishes as $wish) {

        if ($wish !== '') {

            $hasWish = true;

            if (!preg_match('/^[a-zA-ZäöüÄÖÜß0-9 ]+$/', $wish)) {
                $errors[] = 'Sonderzeichen sind bei den Wünschen nicht erlaubt.';
                break;
            }
        }
    }

    if (!$hasWish) {
        $errors[] = 'Bitte geben Sie mindestens einen Wunsch ein.';
    }

    return $errors;
}

function validateDelivery(string $fullname, string $city, string $phone): array
{
    $errors = [];

    if ($fullname === '') {
        $errors[] = 'Bitte geben Sie Ihren Vor- und Nachnamen ein.';
    } elseif (!preg_match('/^[a-zA-ZäöüÄÖÜß ]+$/', $fullname)) {
        $errors[] = 'Im Namen sind nur Buchstaben erlaubt.';
    }

    if ($city === '') {
        $errors[] = 'Bitte geben Sie PLZ und Ort ein.';
    } elseif (!preg_match('/^[0-9]{5}\s+[a-zA-ZäöüÄÖÜß ]+$/', $city)) {
        $errors[] = 'Bitte geben Sie eine fünfstellige PLZ mit Leerzeichen und einen Ort an.';
    }

    if ($phone === '') {
        $errors[] = 'Bitte geben Sie eine Telefonnummer ein.';
    } elseif (!preg_match('/^[0-9]+$/', $phone)) {
        $errors[] = 'Telefon darf nur Zahlen enthalten.';
    }

    return $errors;
}

function writeErrors(array $errors): void
{
    if (!empty($errors)) {

        echo '<div class="error-message">';

        foreach ($errors as $error) {
            echo '<p>' . htmlspecialchars($error) . '</p>';
        }

        echo '</div>';
    }
}

function writeWishForm(array $errors, string $wish1, string $wish2, string $wish3): void
{
    echo '<h2>Meine Wünsche</h2>';

    writeErrors($errors);

    echo '<form method="post" action="index.php">';
    echo '<input type="hidden" name="status" value="check_wishes">';

    echo '<div class="form-grid">';

    echo '<label for="wish1">1. Wunsch:</label>';
    echo '<input type="text" id="wish1" name="wish1" value="' . htmlspecialchars($wish1) . '">';

    echo '<label for="wish2">2. Wunsch:</label>';
    echo '<input type="text" id="wish2" name="wish2" value="' . htmlspecialchars($wish2) . '">';

    echo '<label for="wish3">3. Wunsch:</label>';
    echo '<input type="text" id="wish3" name="wish3" value="' . htmlspecialchars($wish3) . '">';

    echo '</div>';

    echo '<div class="button-row">';
    echo '<button type="reset">Abbrechen</button>';
    echo '<button type="submit">OK</button>';
    echo '</div>';

    echo '</form>';
}

function writeDeliveryForm(
    array $errors,
    string $wish1,
    string $wish2,
    string $wish3,
    string $fullname,
    string $city,
    string $phone
): void {
    echo '<h2>Lieferangaben</h2>';

    writeErrors($errors);

    echo '<div class="wish-summary">';
    echo '<p>1. Wunsch: ' . htmlspecialchars($wish1) . '</p>';
    echo '<p>2. Wunsch: ' . htmlspecialchars($wish2) . '</p>';
    echo '<p>3. Wunsch: ' . htmlspecialchars($wish3) . '</p>';
    echo '</div>';

    echo '<form method="post" action="index.php">';

    echo '<input type="hidden" name="status" value="check_delivery">';

    echo '<input type="hidden" name="wish1" value="' . htmlspecialchars($wish1) . '">';
    echo '<input type="hidden" name="wish2" value="' . htmlspecialchars($wish2) . '">';
    echo '<input type="hidden" name="wish3" value="' . htmlspecialchars($wish3) . '">';

    echo '<div class="form-grid">';

    echo '<label for="fullname">Vor- und Nachname:</label>';
    echo '<input type="text" id="fullname" name="fullname" value="' . htmlspecialchars($fullname) . '">';

    echo '<label for="city">PLZ und Ort:</label>';
    echo '<input type="text" id="city" name="city" value="' . htmlspecialchars($city) . '">';

    echo '<label for="phone">Telefon:</label>';
    echo '<input type="text" id="phone" name="phone" value="' . htmlspecialchars($phone) . '">';

    echo '</div>';

    echo '<div class="button-row">';
    echo '<button type="submit" name="status" value="wishes">Zurück</button>';
    echo '<button type="submit">OK</button>';
    echo '</div>';

    echo '</form>';
}

function writeOverview(
    string $wish1,
    string $wish2,
    string $wish3,
    string $fullname,
    string $city,
    string $phone
): void {
    echo '<h2>Wunschübersicht</h2>';

    echo '<div class="overview-list">';

    echo '<p>1. Wunsch: ' . htmlspecialchars($wish1) . '</p>';
    echo '<p>2. Wunsch: ' . htmlspecialchars($wish2) . '</p>';
    echo '<p>3. Wunsch: ' . htmlspecialchars($wish3) . '</p>';

    echo '<br>';

    echo '<p>Vor- und Nachname: ' . htmlspecialchars($fullname) . '</p>';
    echo '<p>PLZ und Ort: ' . htmlspecialchars($city) . '</p>';
    echo '<p>Telefon: ' . htmlspecialchars($phone) . '</p>';

    echo '</div>';

    echo '<div class="success-message">';
    echo '✅ Wunschzettel erfolgreich erstellt.';
    echo '</div>';

    echo '<div class="button-row">';
    echo '<form method="post" action="index.php">';
    echo '<button type="submit">Neu starten</button>';
    echo '</form>';
    echo '</div>';
}