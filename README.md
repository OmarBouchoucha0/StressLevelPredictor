# 🧠 Stress Level Predictor

A web application that predicts your stress level based on lifestyle factors and provides personalized recommendations to help you manage stress better.

## 🚀 Quick Start

### Prerequisites

- PHP 8.1 or higher
- Composer
- Symfony CLI (optional but recommended)

### Installation

1. **Clone the repository**
```bash
git clone https://github.com/OmarBouchoucha0/StressLevelPredictor.git
cd StressLevelPredictor
```

2. **Install dependencies**
```bash
composer install
```

3. **Configure environment**
```bash
# Copy the example environment file
cp .env .env.local

# The default SQLite configuration should work out of the box
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
```

4. **Set up the database**
```bash
# Generate and run migrations
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

5. **Start the development server**
```bash
# Using Symfony CLI (recommended)
symfony server:start

# OR using PHP built-in server
php -S localhost:8000 -t public/
```

6. **Open your browser**
```
http://localhost:8000
```

## 📖 Usage

1. **Register** - Create a new account
2. **Login** - Sign in with your credentials
3. **Take Assessment** - Click "Start Stress Assessment" and answer the questions
4. **View Results** - See your stress level and personalized recommendations
5. **Track Progress** - Take assessments regularly to monitor your stress levels

## 🛠️ Tech Stack

- **Framework**: Symfony 7.0
- **Language**: PHP 8.1+
- **Database**: SQLite
- **Frontend**: Bootstrap 5, Font Awesome
- **Authentication**: Symfony Security Component

## 📁 Project Structure

```
stress-predictor/
├── src/
│   ├── Controller/         # Application controllers
│   ├── Entity/            # Database entities
│   ├── Form/              # Form types
│   ├── Repository/        # Database repositories
│   ├── Security/          # Authentication logic
│   └── Service/           # Business logic (ML model integration)
├── templates/             # Twig templates
├── config/                # Configuration files
└── public/                # Public assets
```

## 🔧 Configuration

### Database
The application uses SQLite by default. The database file is created at `var/data.db`.

To use a different database, update `DATABASE_URL` in `.env.local`:

```env
# MySQL
DATABASE_URL="mysql://user:password@127.0.0.1:3306/stress_predictor"

# PostgreSQL
DATABASE_URL="postgresql://user:password@127.0.0.1:5432/stress_predictor"
```
⭐ If you find this project helpful, please give it a star!
