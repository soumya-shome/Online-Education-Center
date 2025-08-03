# Online Exam Portal - Laravel Application

A comprehensive online examination system built with Laravel framework, featuring student and admin management, course enrollment, online/offline exams, and result tracking.

## Features

### For Students
- User registration and authentication
- Course enrollment
- View available courses and materials
- Take online exams with timer
- View exam results and progress
- Profile management

### For Administrators
- Student management
- Course creation and management
- Exam scheduling and management
- Paper set creation with questions
- Result monitoring and analytics
- File upload for course materials

### System Features
- Secure authentication system
- Role-based access control
- Online and offline exam support
- Real-time exam timer
- Automatic result calculation
- Responsive design with Bootstrap 5
- File upload and management

## Requirements

- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Web server (Apache/Nginx)

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd online-exam-portal
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   Edit `.env` file and update database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=online_exam_001
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run database migrations**
   ```bash
   php artisan migrate
   ```

6. **Seed the database (optional)**
   ```bash
   php artisan db:seed
   ```

7. **Create storage link**
   ```bash
   php artisan storage:link
   ```

8. **Set proper permissions**
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

## Database Structure

The application uses the following main tables:

- `users` - User authentication and basic info
- `students` - Student-specific information
- `admin` - Administrator information
- `courses` - Course details and materials
- `paper_sets` - Exam paper configurations
- `questions` - Individual exam questions
- `exams` - Scheduled examinations
- `results` - Exam results and scores
- `st_course` - Student course enrollments
- `p_on` - Online paper configurations
- `p_off` - Offline paper configurations

## Usage

### Student Registration
1. Visit the registration page
2. Fill in student details
3. Create account with email and password
4. Login and enroll in courses

### Admin Setup
1. Create admin user in database:
   ```sql
   INSERT INTO users (name, email, password, user_type) 
   VALUES ('Admin', 'admin@example.com', '$2y$10$...', 'ADMIN');
   ```

2. Create admin profile:
   ```sql
   INSERT INTO admin (a_id, name, password) 
   VALUES ('admin@example.com', 'Administrator', 'password');
   ```

### Creating Courses
1. Login as admin
2. Navigate to Courses section
3. Create new course with details
4. Upload course materials

### Creating Exams
1. Create paper sets with questions
2. Schedule exams for students
3. Set exam parameters (time, marks, etc.)

## API Endpoints

The application provides RESTful API endpoints for:

- Authentication (login/register)
- Course management
- Exam management
- Result tracking
- Student management

## Security Features

- CSRF protection
- SQL injection prevention
- XSS protection
- Password hashing
- Role-based access control
- Session management

## File Structure

```
online-exam-portal/
├── app/
│   ├── Http/Controllers/    # Application controllers
│   ├── Models/             # Eloquent models
│   └── Http/Middleware/    # Custom middleware
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/           # Database seeders
├── resources/
│   └── views/             # Blade templates
├── routes/
│   └── web.php            # Web routes
├── public/
│   ├── css/               # Stylesheets
│   ├── js/                # JavaScript files
│   └── images/            # Images
└── storage/
    └── app/               # File uploads
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## License

This project is licensed under the MIT License.

## Support

For support and questions, please contact the development team or create an issue in the repository.

## Changelog

### Version 1.0.0
- Initial release
- Basic authentication system
- Course management
- Exam functionality
- Result tracking
- Admin and student interfaces
 
