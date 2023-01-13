# Green Fit
[![forthebadge](http://forthebadge.com/images/badges/built-with-love.svg)](http://forthebadge.com) 
![Logo](https://greenfit-ecf.herokuapp.com/images/logo.png)
[Accéder au projet en ligne](https://greenfit-ecf.herokuapp.com/)


## Table des matières

1. Informations générales
2. Sujet
3. Auteur
4. Stack
5. Prérequis
6. Installation
    A. Déployer en local
    B. Déployer sur Heroku
7. Documents complémentaires

## 1. Informations générales

Projet réalisé dans le cadre de l'ECF de décembre 2022 pour le titre de développeur fullstack web et web mobile.
Dans le dossier Annexes du dépôt se trouvent les documents demandés.


## 2. Sujet

> Notre client, une grande marque de salles de sport (Green Fit), veut gérer les droits d'accès et de permissions d'une application web pour ses partenaires et leurs structures (salles de sport).

> Chaque partenaire a son propre contrat qui dépend de la somme qu’elle verse au client. Plus ou moins de permissions lui seront alors accessibles.

> Chaque partenaire peut posséder plusieurs structures (salles de sport), et bénéficie d'un certain nombre de modules activés (gestion de planning d'équipe, envoi de newsletters, envoi de SMS, etc...) en fonction du contrat qu'il aura souscrit avec la marque.

> Chaque structure est rattachée à un partenaire, et bénéficie de modules.

> Les Partenaires et Structures ont un accès en LECTURE SEULE à leurs informations.

> Pour toute modification sur leurs permissions ou informations, ils doivent contacter un technicien de Green Fit qui est le seul à avoir les pleins pouvoirs.

## 3. Auteur

Jérôme OLLIVIER 


## 4. Stack

- **Front-end:** HTML / CSS /Javascript /Bootstrap 5
- **Moteur de template:** Twig
- **Back-end:** PHP 8, Symfony 5.4
- **Base de données:** MySQL - Maria DB

## 5. Prérequis 

- Xampp avec Apache 2 et MySQL
- PHP >= 8..1.6 avec au minimum ces extensions PHP : intl, pdo_pgsql, xsl, amqp, gd, openssl, sodium.
- Composer >= 2.3.5
- Heroku CLI (optionnel : https://devcenter.heroku.com/articles/heroku-cli)
- Symfony CLI
- un compte Github : pour le suivi du versionning
- un compte Heroku : pour le déploiement de l'application


## 6. Installation 

<!-- ### Installer en local

Pour vérifier si vous avez toutes les conditions nécessaires à l’installation de Symfony :

```bash
composer require symfony/requirements-checker
```

Utiliser git clone pour clôner le dépôt :

```bash
git clone https://github.com/Spirecool/greenfit-ecf.git
```


Se placer dans le dossier d'installation
```bash
cd greenfit-ecf
```

Dupliquer le fichier .env en .env.local :

```bash
cp .env .env.local
```

Effectuer l'installation des dépendances
```bash
composer install
```

Création de la base de données
```bash
php bin/console doctrine:database:create
```

Création des tables avec l'aide des migrations
```bash
php bin/console doctrine:migrations:migrate
```

Se connecter à mySQL en ligne de commande : 
```bash
mysql -u root -p 
```

Se connecter à la base greenfit-ecf :
```bash
USE greenfit-ecf;
```

Saisir les lignes du fichier greenfit-bdd.sql ( repertoire Annexes ) pour alimenter les differentes tables
Sortir de la console MySQL

Et lancer l'application en local avec :
```bash
symfony serve
``` -->


### Déployer en local



#### Installer Xampp :
https://www.apachefriends.org/fr/download.html

#### Créer un répertoire
Puis créer un répertoire Apps dans c:/xampp/ avec un terminal
```bash
c:/xampp/
mkdir Apps
```

#### Vérifier les prérequis techniques
Pour vérifier si vous avez toutes les conditions nécessaires à l’installation de Symfony :
```bash
composer require symfony/requirements-checker
```

#### Clôner le projet
Clonez le projet dans un répertoire dans le répertoire Apps de XAMPP et créez votre base de données grâce au fichier SQL fourni. 
```bash
git clone https://github.com/Spirecool/greenfit-ecf.git
```

#### Installer les dépendances Symfony

Pour installer les dépendances de symfony pour ce projet, lancez la commande :
```bash
composer install
```

#### Lancer le serveur avec PHP et MySql  :

Pour tester le projet en local, lancez xampp, mamp, ou le logiciel que vous utilisez sur votre machine, lancez Apache et MySQL.

#### Insérer le fichier SQL dans la base de données :

Utilisez le fichier greenfit-ecf.sql situé dans le dossier Annexes du projet pour créer votre base de données. Attention, pour pouvoir utiliser les différents comptes utilisateur, il faudra changer les mots de passe et les encoder avant de lancer les requêtes.

<!-- Ou bien : 

Créez la base de données avec le terminal du projet

```bash
$ php bin/console doctrine:database:create
```

Exécutez les migrations
```bash
$ php bin/console doctrine:migrations:migrate
``` -->


### Créer un compte admin

Si vous démarrez de zéro, vous devrez commencer par ajouter un compte admin dans la table user avec un mot de passe pré-encodé avec Bcrypt : https://www.bcrypt.fr/ La commande SQL est la suivante :
```sql
INSERT INTO `users`(`email`, `roles`, `password`, `lastname`, `firstname`, `address`, `zipcode`, `city`, `roles_users_id`) VALUES ('votre email','[\"ROLE_ADMIN"\]','mot de passe encrypté','votre nom de famille','votre prénom','votre adresse','votre code postal','votre ville','1')
```

#### Variables d'environnement

Ajoutez les fichiers de configuration des variables d'environnement (.env, .env.local).

Ce projet nécessite le paramétrage de APP_ENV, APP_SECRET, DATABASE_URL ET MAILER_DSN
Pensez à supprimer ces variables d'environnemnt de votre fichier .env, avant votre premier push sur GitHub et ne les mettre que dans le fichier .env.local

Saisissez vos identifiants PhpMyAdmin et définissez le nom de votre base de données dans la variable suivante :
```bash
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"
```

Configurer un DNS SMTP 
```bash
MAILER_DSN=smtp://localhost:port
``

Si vous utilisez MailTrap : 
```bash
MAILER_DSN=smtp:/nomUtilisateurCompteMailTrap:motDePasseCompteMailTrap@smtp.mailtrap.io:2525?encryption=tls&auth_mode=login
```

#### Tester l'application

Pour lancer votre application, lancez la commande :
```bash
symfony server:start
```

Pensez à bien vérifier que MySQL sur Xampp soit bien activé, pour que votre base de données soit accessible.

Ouvrez votre navigateur sur <http://localhost:8000/>

Pour plus d'informations, vous pouvez lire la documentations symfony :
<https://symfony.com/doc/current/setup.html>


### Déployer en ligne sur Heroku

Pour le déploiement en ligne, il vous suffira de créer un compte Heroku. Une fois le projet clôné sur un compte github, la connection peut être établie de diverses façons:

1. Par les CLI heroku depuis la console VSCODE par exemple.
<!-- Après avoir installé Heroku CLI, depuis le terminal du projet, connectez-vous à Heroku :

```bash
heroku login
```

Créez un nouveau projet sur Heroku :

```bash
heroku create nom-du-projet
```
Puis relier l'application web à votre dépôt Heroku : 

Ajoutez une base de données à votre projet sur Heroku, en installant un add-on. Vous pouvez prendre ClearDB MySQL qui est gratuit. 

Définisez les variables d'environnement sur Heroku :

Depuis le terminal du projet :

```bash
heroku create nom-du-projet
``````

Configurez l'environnement en environnement de production en reprenant les informations de votre base de données locale

```bash
heroku config:set DATABASE_URL="mysql://..."
```
Enfin, définissez les variables suivantes

```bash
APP_ENV=prod
APP_SECRET=
MAILER_DSN=
MESSENGER_TRANSPORT_DSN
KEY
```

Deployez l'application :
Exécutez les commandes suivantes :

```bash
heroku config:set DATABASE_URL="mysql://..."
```

En cas d'erreur, verifiez les logs avec la commande : 

```bash
heroku logs --tail
``` -->

2. En automatisant le déploiement sur la branche principale de votre github. Pour cela il faudra choisir l'option adéquate depuis le dashboard de Heroku dans l'onglet deploy. *
3. De façon manuelle, en sélection la branche à déployer en bas de la page deploy. 

Créer le fichier Procfile 

```bash
echo 'web: heroku-php-apache2 public/' > Procfile
git add Procfile
git commit -m "Heroku Procfile"
```

PEnsez à paramétrer les variables d'environnement (APP_ENV, APP_SECRET, DATABASE_URL ET MAILER_DSN) dans l'onglet settings de Heroku(cliquez sur Reveal Config Vars) et n'oubliez pas d'ajouter le build pack heroku/php. Dans l'onglet Resources vous ajouterez un add-on de base de données. J'ai choisis ClearDb MySQLsymfony. La valeur de DATABASE_URL devra être reprise en fonction de cette base (copiez-collez l'intégralité de la variable dans la bonne section). Pour créer le schéma et injecter les données dans votre base en ligne, l'utilisation de Workbench d'Oracle, ou d'un autre utilitaire de gestion de base de données sera nécessaire pour l'exécution du script sql fourni dans les Annexes.

## 7. Documents complémentaires

Les documents demandés sont dans le répertoire "annexes":
- Guide déploiement au format PDF
- Manuel d'utilisation au format html (slides)
- Manuel d'utilisation au format PDF
- Questions et réflexion, document technique

Les autres documents nécessaires à mon projet son sur mon Google Drive (le lien est sur la copie)
- Sécurité et bonnes pratiques
- Les zonings
- Les wireframes
- Les mockups, etc.

Login compte Admin : admin@greefit.fr
Password : PasswordAdmin22