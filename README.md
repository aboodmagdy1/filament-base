# FilamentPHP Base Dashboard

A powerful and feature-rich admin dashboard built with FilamentPHP, providing a solid foundation for your Laravel applications with dynamic content management and API resources.

## Table of Contents
- [Overview](#overview)
- [Features](#features)
- [Models & Resources](#models--resources)
- [API Endpoints](#api-endpoints)
- [Tools](#tools)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Overview

This base dashboard is built on top of FilamentPHP, offering a comprehensive set of features and tools to kickstart your admin panel development. It provides a modern, responsive interface with essential functionality for managing your application, including dynamic home sections, services, categories, and user management.

## Features

### Core Features
- 🌐 **Language Switcher**
  - Multi-language support
  - Easy language switching interface
  - Translation management

- 👤 **Profile Management**
  - User profile customization
  - Avatar management
  - Personal information settings
  - Browser Sessions Management

- 📁 **Spatie Media Library Integration**
  - Advanced media management
  - File uploads and organization
  - Media collections and conversions

- 🔒 **RBAC with Shield**
  - Role-based access control
  - Permission management
  - User role assignment
  - Granular access control

- ⚙️ **Spatie Settings**
  - Application settings management
  - Configurable options
  - Settings groups and categories

- 🎨 **GrapesJS Integration**
  - Visual page builder
  - Drag-and-drop interface
  - Custom component management
  - Template system

- 📊 **ApexCharts Integration**
  - Interactive data visualization
  - Multiple chart types
  - Real-time data updates
  - Customizable charts

- 👤 **Breezy Profile**
  - Enhanced user profile management
  - Two-factor authentication
  - Session management
  - Security settings

- 🔃 **Spatie Translatable**
  - Multi-language content support
  - Translatable models and fields
  - Language-specific content management
  - Seamless translation workflow

### Content Management Features
- 🏠 **Dynamic Home Sections**
  - Configurable homepage sections
  - Multiple section types (Services, Categories for example)
  - Drag-and-drop ordering
  - Active/inactive status management

- 🛠️ **Services Management**
  - Service creation and editing
  - Translatable service content
  - Status management
  - Ordering capabilities

- 📂 **Categories Management**
  - Category organization
  - Translatable category content
  - Status and order management
  - Hierarchical structure support

- 🔗 **API Resources**
  - RESTful API endpoints
  - Structured JSON responses
  - Resource transformation
  - Collection handling

## Models & Resources

### Core Models
- **User** - User management with authentication
- **HomeSection** - Dynamic homepage sections with translations
- **Service** - Service offerings with multilingual support
- **Category** - Content categorization system

### API Resources
- **SectionResource** - Transforms home sections with nested data
- **ServiceResource** - Service data transformation
- **CategoryResource** - Category data transformation

### Filament Resources
- **UserResource** - Admin panel user management
- **HomeSectionResource** - Homepage section administration
- **ServiceResource** - Service management interface
- **CategoryResource** - Category administration panel



## Tools

### Development Tools
- Laravel 10.x
- FilamentPHP 3.x
- PHP 8.1+
- MySQL/PostgreSQL
- Node.js & NPM

### Key Packages
- **Spatie Translatable** - Multi-language support
- **Spatie Media Library** - File management
- **Spatie Settings** - Configuration management
- **Filament Shield** - Role-based access control
- **Filament Breezy** - Enhanced authentication

### Required Extensions
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Installation

1. Clone the repository
```bash
git clone [repository-url]
cd base
```

2. Install dependencies
```bash
composer install
npm install
```

3. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in `.env` file
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Run migrations and seeders
```bash
php artisan migrate
php artisan db:seed
```

6. Create admin user
```bash
php artisan make:filament-user
```

7. Build assets
```bash
npm run build
```

8. Start the development server
```bash
php artisan serve
```

## Usage

### Accessing the Admin Panel
- Navigate to `/admin` to access the Filament admin panel
- Login with your admin credentials
- Manage users, sections, services, and categories

### Managing Home Sections
1. Go to **Home Sections** in the admin panel
2. Create new sections with different types
3. Configure order and status
4. Add translatable content

### API Usage
- Access the homepage API at `/` 
- Returns structured JSON with all active sections
- Use the data to build dynamic frontends

### Multi-language Support
- All content models support translations
- Use the language switcher in the admin panel
- Configure available languages in the settings

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

### Development Guidelines
- Follow PSR-12 coding standards
- Write tests for new features
- Update documentation for changes
- Use conventional commit messages

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
