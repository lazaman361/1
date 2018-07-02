## First of all, what was my goal here?

Napraviti identifikaciju korisnika koristeci PHP, MySql i MVC design pattern, pritom ne koristeci PHP framework.

Flow korisnika:
- Korisnik otvori login stranicu.
- Prikazuje mu se forma sa 2 opcije: Login & Register.
- Ako je postojeci korisnik uloguj ga na "BO" a.k.a. Back Office web aplikacije.
- Unutar BO ispisi Hello "user" i to je "home" tab u BO navigaciji.
- Unutar BO postoji navigacija sa opcijama/akcijama: home, list all users, logout.
- Klikom na tab desavaju se predvidjene akcije.
- Na akciju "list all users" izlistaj sve registrovane korisnike po vremenu kreiranja korisnika.
- Klikom na logout korisnik je izlogovan.

## Requirements (Windows/Linux)

- **Wampserver 3.0.9**+ (http://www.wampserver.com/en/)

OR, individually:

- **PHP 5.6**+ (http://php.net/downloads.php). Note: PHP 7 is just fine, too.
- **Apache 2.4.23**+ (https://httpd.apache.org/download.cgi).
- **MySQL 5.7.14**+ (https://dev.mysql.com/downloads/mysql/).
- **phpMyAdmin 4.6.4**+ (https://www.phpmyadmin.net/downloads/) or **MySQL Workbench 6.3**+ (https://dev.mysql.com/downloads/workbench/), which is similar to phpMyAdmin, but with a nicer GUI and more advanced features.

## How to check the website offline (on your own computer)

1. Start the Wampserver.
2. Create Database (using phpMyAdmin or MySQL Workbench). Remember the database name for step 4.
3. Import "20180627mvc.sql" to your database.
4. Configure "config.php" to your needs. By default URL should just be 'http://localhost/' and DB_NAME was created in step 2. Please don't forget to update MYURL variable in two JS files, as already mentioned in "config.php".
5. git clone this repository to (default folder of x64 Wampserver on Windows) c:\wamp64\www\
6. Start your browser and visit 'http://localhost/'

## Experiencing responsiveness issues on the given website? Please be patient or try again later :)

Please be patient if the website is slow, it's on a free web hosting.