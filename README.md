# Todo devops
## Preparation
1. open a terminal in a folder you want to code in
2. Create a New Laravel Project
```bash
composer create-project laravel/laravel it-dev-portfolio
```
2. Change Directory
```bash
cd it-dev-portfolio
```
3. Install Dependencies by running:
```bash
composer install
npm install
npm run build
```
4. Set Up Environment File
Copy the `.env.example` to `.env`, then generate the application key:
```bash
cp .env.example .env
php artisan key:generate
```
replace the DB bits in `.env` with this
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=it-dev-portfolio
DB_USERNAME=root
DB_PASSWORD=
```
5. Set Up Localhost And Database
host the project with xampp, I think you know how
open http://localhost/phpmyadmin/ to add a schema named `it-dev-portfolio`
run 
```bash
php artisan migrate fresh --seed
```
and open the project at: http://localhost/ to test if it works
6. Set up git branches
create a git repository and save this to the new `empty-laravel` branch as well for later
```bash
git init
git add .
git commit -m "initial: empty laravel project"
git branch "empty-laravel"
```

## 2 Security 1
create and checkout branch `security-1` with code from `empty-laravel`
```bash
git checkout -b security-1 empty-laravel
```
1. Install Laravel Breeze via Composer
```bash
composer require laravel/breeze --dev
```
2. Install Breeze Scaffolding
This installs it, without any interactive prompts, for `blade` with dark mode support and phpunit testing (if we were to need that somehow)
```bash
php artisan breeze:install blade --dark
```
3. Install NPM Dependencies and Compile Assets
```bash
npm install && npm run build
```
4. Run Migrations
```bash
php artisan migrate:fresh --seed
```
5. commit
```bash
git add .&&git commit -m "installed laravel breeze"
```
You now have a Laravel project with **authentication** (login, register, forgot password, etc.) powered by **Laravel Breeze**!
Visit `http://localhost/register` or `http://localhost/login` to see the auth pages in action.

## security 2
*recording a 5-minute-video can take a while, you may skip this if you want*
1.
create and checkout branch `security-2` with code from `security-1`
```bash
git checkout -b security-2 security-1
```
2.
Plak de code hieronder in `app\Http\Controllers\Auth\RegisteredUserController.php` regel 35
```php
'password' => ['required', 'confirmed', Password::min(12)
->mixedCase()
->numbers()
->symbols()
->uncompromised()],
```
3. Neem de video op, in de video
   1. registreer en toon aan dat je geen zwak wachtwoord (acht of minder tekens) kan hebben
   2. login met een verkeerd wachtwoord herhaaldelijk en laat zien dat het geblocked wordt (default na vijf keer)
      - verander login throttling parameters `app\Http\Requests\Auth\LoginRequest.php` op regel 62 en laat zien dat het in de website veranderd
   3. Laat zien dat password managerszijn ondersteund (ik weet niet hoe want dat zijn ze altijd al). *Feedback Hugo: A label alone is not sufficient for this. Your authentication forms must also technically adapt to password managers.*
   4. wachtwoord vergeten
      - open `storage\logs\laravel.log` om emails te lezen en zoek het onderste "emailbericht" met zoektherm: `Reset Password: `, ctrl-klik de link die daar staat
   5. registreer met een ander account met hetzelfde wachtwoord als eerst
      - open http://localhost/phpmyadmin/ en laat zien dat de `users` tabel in de `it-dev-portfolio` schema een passwords kolom heeft met daarin twee vershillende hashes, zeg dit en dat dat betekent dat er een "salt" is (automatische unieke toevoeging)
4. commit
```bash
git add .&&git commit -m "improved breeze security"
```

## Devops voorbereiding
1. create and checkout branch `crud` with code from `empty-laravel`
```bash
git checkout -b crud empty-laravel
```
2. kopieer crud code [hier vandaan](https://github.com/SP4CEBARsystems/it-dev-portfolio-guide/tree/crud) en zet het in een model, resource controller, migration, (optioneel seeder en factory) en vier views


## Devops 3
(yes, we start with 3)
1. create and checkout branch `devops-3` with code from `security-1`
```bash
git checkout -b devops-3 security-1
```
2. add crud, expect merge conflicts, make sure `web.php` and `welcome.php` work
```bash
git merge crud
```
3. protect your crud
```php
Route::middleware(['auth'])->group(function () {
    //example crud
    Route::resource('/categories', CategoryController::class);
});
```
4. add your route to `navigation.blade.php`
5. commit
```bash
git add .&&git commit -m "secured crud"
```
6. create new GitHub repo [here](<https://github.com/new>) and copy the `https://github.com/username/repo.git` of your new repo
7. add code to your GitHub repo (paste the url you copied to replace the placeholder url below)
```bash
git remote add origin https://github.com/username/repo.git
push
```
8. follow [my guide to deploy laravel on render.com](<https://github.com/SP4CEBARsystems/Deploy-Laravel-on-Render>), make sure to deploy from branch `devops-3` when setting up your web app


## devops 1 en 2
1. create and checkout branch `devops-1` with code from `crud`
```bash
git checkout -b devops-1 crud
```
2. create and checkout branch `devops-2` with code from `devops-1`
```bash
git checkout -b devops-2 devops-1
```

## Usability 1
1. create and checkout branch `usability-1` with code from `empty-laravel`
```bash
git checkout -b usability-1 empty-laravel
```
2. voeg deze route toe
```bash
Route::get('/simulate-500', function () {
    abort(500); // or throw new \Exception('Simulated Server Error');
});
```
3. maak deze bestanden aan
   - `resources\views\errors\404.blade.php`
   - `resources\views\errors\500.blade.php`
4. voeg styling toe, zorg ervoor dat de gebruiker zich op zijn gemak voelt en weet wat die nu moet doen en een knopje heeft
5. commit
```bash
git add .&&git commit -m "usability 1"
```
6. maak deze paginas na op [figma.com](https://www.figma.com/), teken een wireflow met pijlen van de knopjes naar de paginas waarnaar de gebruiker dan gestuurd wordt
