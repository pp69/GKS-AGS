GKS-AGS \ 69dd
=======

CONFIGURATION
-------------------------

``` php
//  index.php - Ligne 3 - %URL% > URL du flux.
$feed_url = '%URL%';
```

``` c
##  .htaccess - Ligne 3 - %IP% > IP du serveur.
allow from %IP%
```

INSTALLATION
-------------------------

Placer les deux fichiers dans un repertoire accessible en http. (ie. /var/www/htdocs/ags/)

UTILISATION
-------------------------

Ouvrir l'URL pointant vers le nouveau repertoire avec comme paramètre '?AIDE' (ie. http://localhost/ags/?AIDE) dans votre navigateur pour connaitre les nouvelles URLs à insérer dans votre client BT.
