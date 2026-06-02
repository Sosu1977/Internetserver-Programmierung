# Geburtstags-Wunschzettel

## Projektbeschreibung

Dieses Projekt ist eine PHP-Webanwendung zur Erstellung eines Geburtstags-Wunschzettels.

Beim ersten Aufruf der Datei `index.php` können bis zu drei Wünsche eingegeben werden. Sobald mindestens ein Wunschfeld sinnvoll ausgefüllt wurde und keine Sonderzeichen enthält, wird die zweite Seite angezeigt.

Auf der zweiten Seite werden die Lieferangaben eingegeben. Nur wenn alle erforderlichen Felder sinnvoll ausgefüllt sind, wird die dritte Seite angezeigt. Sind die Eingaben unvollständig oder ungültig, erscheint eine Fehlermeldung und die zweite Seite wird erneut angezeigt.

Die gesamte Ablaufsteuerung und Validierung erfolgt serverseitig mit PHP.

## Technologien

- PHP 8.3
- Apache2
- Ubuntu 24.04 über WSL
- PHPStorm
- HTML
- CSS

## Projektstruktur

- `index.php` – Hauptdatei mit Formularlogik
- `css/style.css` – Design der Anwendung
- `images/` – Bilder und Grafiken
- `includes/` – ausgelagerte PHP-Dateien

## Autor

Sönmez Süner