# Installation Guide

## Beschreibung

Für die Entwicklung des Projekts **Geburtstags-Wunschzettel** wurde eine Linux-basierte Entwicklungsumgebung unter Windows eingerichtet.

Die Entwicklungsumgebung besteht aus folgenden Komponenten:

* **WSL2** stellt eine Linux-Umgebung innerhalb von Windows bereit.
* **Ubuntu 24.04** dient als Betriebssystem.
* **Apache2** wird als Webserver verwendet.
* **PHP 8.3** wird für die Serverlogik eingesetzt.
* **Git** dient zur Versionsverwaltung.
* **GitHub** wird als Remote Repository verwendet.
* **PhpStorm 2026** wird als Integrated Development Environment (IDE) eingesetzt.

Ziel dieser Konfiguration ist die Bereitstellung einer professionellen PHP-Entwicklungsumgebung, die einem produktiven Linux-Server möglichst nahekommt.

---

## Required Software

```text
Windows 11
WSL2
Ubuntu 24.04
Apache2
PHP 8.3
Git
PhpStorm 2026
GitHub Account
```

---

## Install WSL

PowerShell als Administrator öffnen:

```bash
wsl --install
```

Installation überprüfen:

```bash
wsl --list --verbose
```

---

## Install Apache

Paketinformationen aktualisieren:

```bash
sudo apt update
```

Apache installieren:

```bash
sudo apt install apache2
```

Apache starten:

```bash
sudo systemctl start apache2
```

Status prüfen:

```bash
sudo systemctl status apache2
```

Erwartetes Ergebnis:

```text
active (running)
```

---

## Install PHP

PHP installieren:

```bash
sudo apt install php8.3-cli php8.3 libapache2-mod-php
```

Installation überprüfen:

```bash
php -v
```

---

## Install Git

Git installieren:

```bash
sudo apt install git
```

Installation überprüfen:

```bash
git --version
```

---

## Install PhpStorm

PhpStorm wurde als Entwicklungsumgebung verwendet.

Projektpfad:

```text
\\wsl.localhost\Ubuntu-24.04\var\www\html
```

---

## Absicherung der Entwicklungsumgebung

Für den Zugriff auf die lokale Entwicklungsumgebung wurde ein Passwortschutz eingerichtet.

Benutzer anlegen:

```bash
sudo htpasswd -c /etc/apache2/.htpasswd USERNAME
```

### Apache-Konfiguration

Konfigurationsdatei öffnen:

```bash
sudo nano /etc/apache2/apache2.conf
```

Verzeichnisfreigabe prüfen:

```apache
<Directory /var/www/>
    AllowOverride All
</Directory>
```

### .htaccess erstellen

Datei:

```text
/var/www/html/.htaccess
```

Inhalt:

```apache
AuthType Basic
AuthName "Restricted Area"
AuthUserFile /etc/apache2/.htpasswd
Require valid-user
```

### Apache neu laden

```bash
sudo systemctl reload apache2
```

### Funktionstest

Aufruf:

```text
http://localhost
```

Erwartetes Ergebnis:

```text
Benutzername und Passwort werden abgefragt.
Nach erfolgreicher Anmeldung wird die Webseite angezeigt.
```

---

## GitHub Repository

Repository:

```text
Internetserver-Programmierung
```

Remote Repository verbinden:

```bash
git remote add origin https://github.com/Sosu1977/Internetserver-Programmierung.git
```

Projekt hochladen:

```bash
git push -u origin main
```
