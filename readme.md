# learnphp + Technology

Kõik algse learnphp projekti failid ja SQLite-andmebaas on kaasas.
Technology leht sisaldab tech.zip nelja näidispostitust.

## Käivitamine

Vaja on PHP 8.0+ ning PDO ja pdo_sqlite laiendusi. PHP peab olema PATH-is.
Ava terminal learnphp kaustas ja käivita:

```sh
php -S localhost:8000 -t public public/index.php
```

Windowsis võib kasutada ka server.bat faili; Linuxis/macOS-is `sh server.sh`.
Ava http://localhost:8000 ja vali menüüst Technology või ava
http://localhost:8000/tech otse.

Composer ei ole käivitamiseks kohustuslik: bootstrap.php laadib App klassid
ise, kui vendor/autoload.php puudub. Algne composer.json ja composer.lock on
säilitatud; nende valikuline Symfony sõltuvus vajab PHP 8.4.1 või uuemat.
Andmebaasile db.sqlite ja selle kaustale peab PHP-l olema kirjutusõigus.

## Ühendamine

- /tech marsruut → PublicController::tech() → views/tech.php.
- Tech-lehe näidispostitused on views/tech.php failis; neid kuvab
  views/partials/tech-posts.php. Algne andmebaasipõhine posts.php jääb alles.
- Tech kasutab learnphp ühist päist, navigatsiooni, jalust ja public/assets faile.
- Sisselogimine, registreerimine, vormid ja artiklite haldus on alles.
- Parandatud ühise blog.css tee, staatiliste failide teenindamine ja 404 staatus.

Tegemist on olemasoleva õppeprojektiga; ühendamine ei ole turvaaudit.
