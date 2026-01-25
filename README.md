# Single-File PHP App (With Local Config)

This repository contains a **single-file PHP web application** designed to stay simple, explicit, and easy to understand.

There are no frameworks, no autoloaders, no routing libraries, and no environment magic.
Everything runs from one `index.php` file, with an optional local configuration include.

---

## Goals

- One folder
- One executable PHP file
- Explicit control over behavior
- Easy to debug and reason about
- Safe to copy, rename, or deploy anywhere

This template is ideal for:
- internal tools
- admin utilities
- prototypes
- simple web apps
- sanity-checking PHP environments

---

## Requirements

- PHP 8.1 or newer
- Any PHP-capable web server  
  (Apache, Nginx, IIS, or PHP’s built-in server)

No Composer. No external dependencies.

---

## Project Structure

```
/
├─ index.php
├─ config.local.php   (gitignored)
├─ README.md
└─ .gitignore
```

---

## How It Works

### Entry Point

`index.php` is the only executable file. It performs these steps in order:

1. Loads local configuration
2. Applies error handling based on configuration
3. Selects a page using a query parameter
4. Renders page content
5. Wraps content in a simple HTML layout

There are no hidden includes or side effects.

---

## Configuration

Local configuration lives in `config.local.php`.

This file is required and intentionally **not committed** to version control.

Example:

```php
<?php

return [
    'app_name' => 'Single File PHP App',
    'debug' => true,
];
```

### `debug` setting

- `true`  → PHP errors are displayed in the browser
- `false` → PHP errors are hidden from the browser

This allows the same codebase to be used for development and production.

---

## Page Handling

Pages are handled explicitly inside `index.php` using a switch statement:

```php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'page1':
        // Page 1 output
        break;

    case 'page2':
        // Page 2 output
        break;

    default:
        // Home page
        break;
}
```

Navigation uses simple query strings:

```
?page=page1
?page=page2
```

No routing layer is used.

---

## Layout

Page content is captured using output buffering and injected into a simple layout at the bottom of the file.

This keeps content and layout logically separated while remaining in a single file.

---

## Design Rules

- Keep everything in `index.php`
- Add new pages by extending the switch statement
- Avoid introducing frameworks or loaders
- Prefer clarity over abstraction

If the file starts becoming hard to understand, it’s a signal to refactor intentionally — not incrementally.

---

## License

Free to use for personal or internal projects.

No warranty. No magic. No surprises.
