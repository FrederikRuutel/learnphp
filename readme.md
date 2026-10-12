# Learn PHP

An MM24 learning project using PHP, SQLite, Composer and Bootstrap. It includes articles, authentication, a Technology page and user management.

## Run locally

Install PHP 8.4.1+ and Composer 2. The locked Symfony dependency requires PHP 8.4.1 or newer. Enable `PDO`, `pdo_sqlite` and `mbstring` in the PHP configuration shown by `php --ini`.

Clone the repository:

```sh
git clone https://github.com/FrederikRuutel/learnphp.git
cd learnphp
composer install
```

If you already have a clone, commit or stash your local changes first, then update it before working:

```sh
git pull
composer install
```

Start the development server from the project directory:

```sh
php -S localhost:8000 -t public public/index.php
```

Open [http://localhost:8000](http://localhost:8000). Stop the server with Ctrl+C. Windows users can also run `server.bat`; Linux/macOS users can run `sh server.sh`.

The repository includes `db.sqlite`; this is a plain PHP project with no Laravel migrations. PHP needs write access to the database file and its directory. Back up this file before experimenting with existing records. `bootstrap.php` contains a fallback autoloader, but use `composer install` for the normal course setup.

## User management

1. Create an account at `/register`, then sign in at `/login`.
2. Open **Users** in the navigation, or visit `/admin/users`.
3. Choose **New User** to create a user with a name, unique email and confirmed password.
4. Choose **View** to see one user's ID, name and email. Passwords and hashes are not displayed.
5. Choose **Edit** to change the name or email. Leave both password fields empty to keep the current password, or fill both to set a new one.
6. Choose **Delete** to open a confirmation page. Only submitting the confirmation form deletes the user. Deleting your own account signs you out.

The password length is 8–72 bytes, matching the bcrypt limit. Forms preserve the entered name and email when validation fails; passwords are never filled back in. Missing users return HTTP 404, invalid forms return 422 and invalid CSRF tokens return 403.

This course project has no administrator role: user management requires login, and every signed-in user has access. Add role-based authorization before using it as a real multi-user service.

### Routes

| Method | Path | Action |
| --- | --- | --- |
| GET | `/admin/users` | List users |
| GET | `/admin/users/create` | Show creation form |
| POST | `/admin/users` | Save a new user |
| GET | `/admin/users/view?id=1` | View a user |
| GET | `/admin/users/edit?id=1` | Show editing form |
| POST | `/admin/users/edit?id=1` | Save changes |
| GET | `/admin/users/delete?id=1` | Show deletion confirmation |
| POST | `/admin/users/delete?id=1` | Delete the user |

Controller: `src/Controllers/UsersController.php`. Views: `views/users/`. Routes: `routes.php`. The shared `User` model and `DB` class handle database access with prepared values.

## Manual checks

- Create a test user, view it, edit its name and email, and delete it.
- Try a name containing an apostrophe, such as `O'Connor`.
- Try a duplicate email, invalid email and mismatched passwords.
- Save an edit with empty password fields and check that the old password still works.
- Change the password and verify login with the new password.
- Check that a nonexistent user ID returns 404.
- Open a delete confirmation and cancel; the user must remain.
- Sign out and verify that `/admin/users` redirects to `/login`.

## Other pages

- `/admin/articles`: existing article CRUD.
- `/tech`: Technology page and its four example posts.
- `/forms`: form examples.
- `/register`, `/login`, `/logout`: authentication.

This is a learning project, not a production-ready application.
