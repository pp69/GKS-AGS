GKS-AGS \ 96dd
=======

CONFIGURATION
-------------------------

``` php
//  index.php - Ligne 3 - %URL% > URL du flux.
$feed_url = '%URL%';
```

``` c
##  .htaccess - Ligne 3 - %IP% > IP du serveur.
allow from all %IP%
```

INSTALLATION
-------------------------

Placer les deux fichiers dans un repertoire accessible en http. (ie. /var/www/htdocs/ags/)

UTILISATION
-------------------------

Ouvrir l'URL pointant vers le nouveau repertoire avec comme paramètre '?HELP' (ie. http://localhost/ags/?HELP) dans votre navigateur pour connaitre les nouvelles URLs à insérer dans votre client BT.
