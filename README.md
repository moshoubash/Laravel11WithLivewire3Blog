# Laravel Blog

A modern, feature-rich blog application built with Laravel 11, featuring real-time interactions, user authentication, and a reactive user interface powered by Livewire.

## Features

### Core Blog Functionality
- **Post Management**: Create, edit, view, and organize blog posts with rich content
- **Categories**: Organize posts into categories for better navigation
- **Search**: Full-text search across posts with instant results
- **Profiles**: Personalized user profiles with post history

### User Engagement
- **Real-time Chat**: Instant messaging between users with broadcasting
- **Likes System**: Users can like posts with real-time notifications
- **Notifications**: Comprehensive notification system for likes, comments, and user interactions
- **Email Notifications**: Welcome emails and activity notifications

### Authentication & Security
- **User Registration & Login**: Secure authentication with Laravel Breeze
- **Email Verification**: Account activation via email
- **Session Management**: Secure session handling with proper expiration
- **Password Management**: Password confirmation and reset functionality

### Real-time Features
- **WebSockets**: Laravel Reverb for real-time broadcasting
- **Live Updates**: Instant updates for likes, notifications, and chat messages
- **Pusher Integration**: Cloud-based real-time messaging

### Technical Features
- **Responsive Design**: Mobile-friendly interface with Tailwind CSS
- **SPA-like Experience**: Livewire-powered reactive components
- **API Ready**: RESTful routes and clean architecture
- **Database Migrations**: Structured database with seeders and factories

## Installation

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL or PostgreSQL database

### Setup
1. Clone the repository:
   ```bash
   git clone https://github.com/moshoubash/laravel11-blog.git
   cd laravel11-blog
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install JavaScript dependencies:
   ```bash
   npm install
   ```

4. Copy environment file:
   ```bash
   cp .env.example .env
   ```

5. Generate application key:
   ```bash
   php artisan key:generate
   ```

6. Configure your database in `.env` file

7. Run database migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

8. Build assets:
   ```bash
   npm run build
   ```

### Running the Application

For development with hot reloading:
```bash
composer run dev
```

Or manually:
```bash
php artisan serve
npm run dev
php artisan queue:listen
```

## Usage

### Creating Posts
1. Register/Login to your account
2. Navigate to "Create Post" from the navigation
3. Fill in title, content, and select category
4. Publish your post

### Engaging with Content
- Like posts by clicking the heart icon
- Chat with other users in real-time
- Search for posts using the search bar
- View notifications in your dashboard

### Customization
- Modify views in `resources/views/`
- Extend functionality in Livewire components
- Add new features through Laravel's MVC structure

## Tech Stack

- **Backend**: Laravel 11 Framework
- **Frontend**: Livewire 3 + Tailwind CSS + Alpine.js
- **Database**: MySQL/PostgreSQL with Eloquent ORM
- **Real-time**: Laravel Reverb + Pusher
- **Authentication**: Laravel Breeze
- **Email**: Laravel Mail with views
- **Testing**: PHPUnit

## Project Structure

```
app/
├── Console/Commands/     # Artisan commands
├── Events/              # Broadcasting events
├── Http/Controllers/    # HTTP controllers
├── Livewire/            # Reactive components
├── Models/              # Eloquent models
├── Notifications/       # Notification classes
├── Policies/            # Authorization policies
└── Mail/                # Email templates

resources/
├── views/               # Blade templates
├── css/                 # Stylesheets
└── js/                  # JavaScript assets

database/
├── migrations/          # Database migrations
├── seeders/            # Database seeders
└── factories/          # Model factories
```

## Contributing

We welcome contributions from the community! This is an open-source project and we appreciate any help to improve it.

### How to Contribute

1. Fork the repository on GitHub
2. Clone your forked repository locally:
   ```bash
   git clone https://github.com/your-username/laravel11-blog.git
   ```

3. Create a new branch for your feature:
   ```bash
   git checkout -b feature/your-feature-name
   ```

4. Make your changes and ensure they follow the coding standards
5. Write tests for new features
6. Commit your changes:
   ```bash
   git commit -am 'Add some feature'
   ```

7. Push to the branch:
   ```bash
   git push origin feature/your-feature-name
   ```

8. Create a Pull Request on GitHub

### Contribution Guidelines

- Follow PSR-4 autoloading standards
- Use descriptive commit messages
- Write comprehensive tests for new features
- Update documentation as needed
- Maintain code quality with Laravel Pint (code formatting)
- Ensure all tests pass before submitting PR

### Reporting Issues

- Use GitHub Issues to report bugs
- Provide detailed steps to reproduce the issue
- Include relevant error messages and environment details
- Suggest improvements or feature requests

### Code of Conduct

This project follows a standard code of conduct. Be respectful and constructive in all interactions.

## License

This project is open-sourced software licensed under the [MIT License](https://opensource.org/licenses/MIT).

## Support

If you need help or have questions:
- Create an issue on GitHub
- Join our community discussions
- Check the Laravel documentation for framework-specific questions

## Acknowledgments

- Built with [Laravel](https://laravel.com/) - The PHP Framework for Web Artisans
- Powered by [Livewire](https://laravel-livewire.com/) for reactive components
- Styled with [Tailwind CSS](https://tailwindcss.com/)
- Real-time features with [Laravel Reverb](https://laravel.com/docs/reverb)
