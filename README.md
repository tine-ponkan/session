# PHP + MySQL Login System

## Setup (XAMPP / Laragon / any PHP + MySQL stack)
1. Copy this folder into `htdocs` (XAMPP) or `www` (Laragon).
2. Import `login_system.sql` in phpMyAdmin (or `mysql -u root < login_system.sql`).
3. Adjust credentials in `db.php` if needed.
4. Open `http://localhost/login_system/`.

Demo login (if seeded): demo@example.com / password123

## Files
- `db.php`        – MySQL connection
- `index.php`     – login page
- `register.php`  – sign-up page
- `home.php`      – protected home page (requires session)
- `logout.php`    – ends session
- `style.css`     – styling
- `login_system.sql` – database + users table

## Security notes
Passwords hashed with `password_hash`, queries use prepared statements,
output escaped with `htmlspecialchars`, session ID regenerated on login.
