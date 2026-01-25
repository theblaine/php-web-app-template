# Clean PHP Baseline (Root-Only)

A minimal, framework-free PHP web application designed to be predictable, readable, and easy to reason about.

This repository intentionally avoids frameworks, autoloaders, environment magic, build scripts, and hidden configuration. Everything lives in the repository root and runs with plain PHP.

---

## Goals

- Provide a known-good baseline for small PHP web apps
- Make every file’s responsibility obvious
- Eliminate path confusion and implicit behavior
- Serve as a reference point when experimenting or refactoring

If something breaks, you should immediately know where and why.

---

## Requirements

- PHP 8.1 or newer (recommended)
- Any web server capable of serving PHP  
  (Apache, Nginx, IIS, or PHP’s built-in server)

No Composer dependencies. No external libraries.

---

## Project Structure

All files live in the repository root.

```
/
├─ index.php          # Single entry point
├─ bootstrap.php      # Error handling and config loading
├─ config.local.php   # Local configuration (gitignored)
├─ layout.php         # Base HTML layout
├─ header.php         # Shared header
├─ footer.php         # Shared footer
├─ home.php           # Home page content
├─ simple/            # Single-file reference implementation
│  └─ index.php
└─ .gitignore
```

---

## How the Application Works

### Entry Point

`index.php` is the only entry point. It is responsible for:

1. Loading `bootstrap.php`
2. Setting page-level variables
3. Including a page file

Example:

```php
require __DIR__ . '/bootstrap.php';
require __DIR__ . '/home.php';
```

---

### Configuration

Local configuration lives in `config.local.php`.

This file is required and intentionally not committed to version control.

Example:

```php
<?php

return [
    'app_name' => 'My PHP App',
    'debug' => true,
];
```

There is no `.env` file and no environment variable loader. Configuration is explicit and PHP-native.

---

### Templates and Layout

Pages generate content using PHP output buffering:

```php
ob_start();
// Page HTML here
$content = ob_get_clean();
require 'layout.php';
```

The layout file (`layout.php`) wraps the page content:

```php
<main>
    <?= $content ?>
</main>
```

This approach provides layout control without introducing a framework or template engine.

---

## /simple Reference Application

The `simple/` folder contains a single-file version of the app:

```
/simple/index.php
```

Purpose:

- Known-good reference implementation
- Zero includes
- Zero path complexity
- Useful for debugging and sanity checks

If the main app breaks, load `/simple/`.  
If it works, PHP and the server are functioning correctly and the issue is structural.

The `simple` app is reference-only and should not be extended.

---

## Design Principles

- Root-only files
- One entry point
- One configuration file
- Explicit includes
- No hidden behavior
- No premature abstractions

Changes should be additive rather than refactors.

---

## Versioning

This repository starts at:

```
v0.1-baseline
```

This tag represents a frozen, known-good foundation. Future work should preserve this baseline and build on top of it.

---

## License

Free to use for personal or internal projects.

No warranty. No magic. No surprises.
