## Pelikula
### Nerubia Activity Project. 
A simple project that can fetch popular movies from the [themoviedb](https://www.themoviedb.org/).
Live demo: https://pelikula.jantinnerezo.com

### Requirements
PHP 7.4

To get started, obviously you need to clone this project to run it locally.

```bash
git clone https://github.com/jantinnerezo/pelikula.git
```

Install composer dependencies

```bash
composer install
```

Create .env file

```bash
cp .env.example .env
```

Add your [themoviedb](https://www.themoviedb.org/) API key. If you don't want to create for your account, feel free to contact me for the API key.

```env
MOVIEDDB_API_KEY=
```

Install npm dependencies

```bash
npm install && npm run dev
```

Remove unused CSS for production

```bash
npm run prod
```

Finally, run it depending on your dev environment, easiest way is:

```bash
php artisan serve
```

Using Laravel Valet?

```bash
valet link pelikula
```

And then you can access it with pelikula.test.


## That's it, Thank you!
