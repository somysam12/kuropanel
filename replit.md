# replit.md

## Overview

This is a CodeIgniter 4 web application built with PHP. The project appears to be a hosting-related platform (based on the "Hostlar" template references) that includes domain WHOIS lookup functionality. It uses the CodeIgniter 4 MVC framework with server-side DataTables integration for data display.

## User Preferences

Preferred communication style: Simple, everyday language.

## System Architecture

### Framework
- **CodeIgniter 4** - PHP full-stack web framework (v4.1.5)
- Standard MVC architecture with controllers in `app/Controllers/`, models in `app/Models/`, and views in `app/Views/`
- Configuration files located in `app/Config/`

### Frontend
- Bootstrap 4.6 for responsive UI components
- jQuery 3.5.1 for DOM manipulation and AJAX
- Owl Carousel for sliders/carousels
- SweetAlert2 for toast notifications and alerts
- Custom CSS using Poppins font family
- Assets organized in `/assets/` and `/public/assets/` directories

### Backend Components
- **DataTables Integration** - Uses `hermawan/codeigniter4-datatables` for server-side table processing
- **WHOIS Library** - Custom PHP WHOIS library in `/libs/whois/` for domain lookup functionality
- **SQL Parser** - `greenlion/php-sql-parser` for SQL query parsing (DataTables dependency)

### Directory Structure
- `app/` - Application code (controllers, models, views, config)
- `public/` - Web root directory (index.php entry point)
- `assets/` - Frontend assets (CSS, JS, vendor libraries)
- `libs/` - Third-party PHP libraries (WHOIS)
- `writable/` - Cache, logs, uploads (file system storage)
- `vendor/` - Composer dependencies

### Security
- Directory access forbidden via index.html files in sensitive directories
- Public folder separation for web server document root
- Sensitive data obfuscation (CSS class `key-sensi` with blur filter)

## External Dependencies

### PHP Dependencies (via Composer)
- `codeigniter4/framework` (^4) - Core framework
- `hermawan/codeigniter4-datatables` (^0.5.2) - Server-side DataTables
- `greenlion/php-sql-parser` - SQL parsing for DataTables
- `kint-php/kint` - Debugging tool
- `laminas/laminas-escaper` - XSS protection utilities

### Development Dependencies
- `fakerphp/faker` - Test data generation
- `mikey179/vfsstream` - Virtual filesystem for testing
- `phpunit/phpunit` (^9.1) - Testing framework

### Frontend Libraries (CDN/Local)
- Bootstrap 4.6.0
- jQuery 3.5.1
- SweetAlert2 (v11.1.0 via CDN)
- Bootstrap Icons (v1.5.0 via CDN)
- Magnific Popup (lightbox/modal)
- Owl Carousel 2.3.4
- WOW.js (scroll animations)

### PHP Requirements
- PHP 7.3+ or 8.0+
- Extensions: curl, intl, json, mbstring
- Optional: fileinfo (for mime detection)