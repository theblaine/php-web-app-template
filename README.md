# PHP Web App Template

A minimal, framework-free PHP starter template for small web applications and internal tools.

Designed as a clean baseline that can be cloned and expanded per project.

---

## ✨ Features

- Single entry point (`index.php`)
- Local environment configuration
- Debug toggle for development/production
- Clean, minimal structure
- No framework dependencies

---

## 🚀 Getting Started

After cloning this repository:

### 1️⃣ Create Your Local Configuration File

This project uses a local configuration file that is not included in the repository.

Rename:

```
config.example.local.php
```

to:

```
config.local.php
```

Example:

```bash
cp config.example.local.php config.local.php
```

Then edit the file:

```php
$config = [
    'debug' => true,
];
```

- `true` enables error display (development)
- `false` hides errors (production)

---

## 🔐 Why Use a Local Config File?

`config.local.php` is excluded from version control to:

- Prevent committing sensitive values
- Allow environment-specific configuration
- Keep production settings safe

If you modify the configuration structure, update `config.example.local.php` accordingly.

---

## 📂 Project Structure

```
.
├── .gitignore
├── config.example.local.php
├── index.php
└── README.md
```

---

## 🧱 Philosophy

This template intentionally avoids:

- Frameworks
- Routing layers
- MVC structure
- Authentication scaffolding

It is meant to be:

- Cloned
- Renamed
- Expanded intentionally

Start simple. Add only what your project needs.
