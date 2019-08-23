# Application Web

Application Web qui permet a un administrateur d'upload des fichiers excel et a un utilisateur de telecharger/afficher les fichiers .

## Structure du projet

Utilisation du pattern MVC avec quelques touche personnelles :

  - Config :
    * config.php : Contient les parametres de connexion a la base de donne .
    * include.php : Regroupe tous includes du projet .

  - Controller :
    * *Handler.php : Gere les differentes requetes ajax .
    *  note.txt : Fichier tempo qui permet de gerer la fonctionnalite "Ajoute une note" .

  - uploads : Dossier qui contient les fichiers uploadé .

  - View/display : Dossier qui contient les fichiers uploadé en .html  

## prérequis

  - Base de donne :
      Script de creation de la base de donne :
    ```
    CREATE DATABASE `Circet` /*!40100 DEFAULT CHARACTER SET latin1 */


    CREATE TABLE `users` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `Date` datetime(6) DEFAULT NULL,
     `CheminFichier` varchar(255) DEFAULT NULL,
     `NomFichier` varchar(255) DEFAULT NULL,
     PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8

    ```
