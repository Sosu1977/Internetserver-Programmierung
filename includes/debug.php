<?php

// ----------------------------------------
// Debug-Ausgabe für Entwicklungszwecke
// Zeigt POST-, REQUEST- und SESSION-Daten an
// ----------------------------------------

$debug = "nein";

session_start();

if ($debug === "ja") {
    error_reporting(-1);

    echo "<hr>";
    echo "<strong>POST</strong><br>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    echo "<strong>REQUEST</strong><br>";
    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";

    echo "<strong>SESSION</strong><br>";
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
} else {
    error_reporting(0);
}