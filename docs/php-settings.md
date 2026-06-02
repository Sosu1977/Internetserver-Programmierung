# PHP Settings

## Purpose

This document describes the PHP configuration used for the development environment of the project **"Geburtstags-Wunschzettel"**.

---

## Environment

| Component        | Version             |
| ---------------- | ------------------- |
| Operating System | Ubuntu 24.04 (WSL2) |
| Web Server       | Apache2             |
| PHP              | 8.3                 |
| IDE              | PhpStorm 2026       |
| Version Control  | Git / GitHub        |

---

## PHP Configuration File

```text
/etc/php/8.3/apache2/php.ini
```

---

## Development Settings

The following settings were configured for development and debugging:

```ini
display_errors = On
display_startup_errors = On
error_reporting = E_ALL
log_errors = On
date.timezone = Europe/Berlin
```

### Description

| Setting                | Description                                       |
| ---------------------- | ------------------------------------------------- |
| display_errors         | Displays PHP errors directly in the browser       |
| display_startup_errors | Displays startup errors during PHP initialization |
| error_reporting        | Reports all PHP errors, warnings and notices      |
| log_errors             | Enables logging of PHP errors                     |
| date.timezone          | Sets the default timezone to Europe/Berlin        |

---

## Check PHP Version

```bash
php -v
```

---

## Check Active Configuration

```bash
php --ini
```

---

## Reload Apache

After modifying the PHP configuration:

```bash
sudo systemctl reload apache2
```

---

## Check Apache Status

```bash
sudo systemctl status apache2
```

Expected result:

```text
active (running)
```

---

## PHP Information Page

Example:

```php
<?php
phpinfo();
?>
```

Access through:

```text
http://localhost/index.php
```

This page can be used to verify that PHP is correctly installed and configured.
