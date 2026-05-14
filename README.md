# Books Library - Laravel & Livewire

A modern web application for managing and searching a library of books, built with Laravel and enhanced with Livewire for a seamless, real-time user experience.

- **Dynamic Search**: Filter books by category and tag instantly without page reloads using Livewire.
- **Book Management**: Full CRUD operations for books, including cover image uploads.
- **Advanced Filtering**: Sort books by price, title, or date.
- **Multilingual Support**: Easily switch between different languages.
- **Responsive Design**: Built with Tailwind CSS for a beautiful look on all devices.
- **Email Integration**: Send book details directly to your email.

- **Framework**: [Laravel 12](https://laravel.com)
- **Frontend Interactivity**: [Livewire](https://livewire.laravel.com)
- **Styling**: [Tailwind CSS](https://tailwindcss.com)
- **Database**: SQLite

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/younesabourrig01/Books-Library.git
   cd Books-Library
   ```

2. **Install dependencies**:
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Environment Setup**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure Database**:
   Update your `.env` file with your database credentials.

5. **Run Migrations & Seeders**:
   ```bash
   php artisan migrate --seed
   ```

6. **Storage Link**:
   ```bash
   php artisan storage:link
   ```

7. **Start the Server**:
   ```bash
   php artisan serve
   ```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
