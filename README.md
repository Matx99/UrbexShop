# UrbexShop

### Installation :

- `composer install`
- `php bin/console doctrine:database:create`
- `php bin/console make:migration`
- `php bin/console d:m:m`
- `php bin/console d:f:l --no-interaction`
- `php bin/console server:run`
- **Back-end:** aller sur la route /register/master pour cr�er un admin puis se connecter avec les identifiants email : admin@urbexshop.com et password : admin

### Didacticiel

- Tous les produits sont affich�s sur le site si l'utilisateur connect� a le r�le "ROLE_ADMIN" (pour qu'il puisse �diter le produit depuis le site - exemple du produit "Masque a Gaz Urbex 3M 6200" qui n'est pas disponible (boolean false) et accessible par les admins uniquement). Sinon, seuls les produits disponibles (boolean true) sont affich�s.
- Pour ajouter/�diter un produit, il faut �tre connect� en tant qu'admin et aller sur "Tous les produits" puis cliquer sur "Cr�er un produit". Pour �diter il faut aller sur le produit et l'�diter avec le bouton orange.
- Pareil pour les cat�gories, se rendre sur les cat�gories en tant qu'admin.


### Cahier des charges :

Vous devez g�rer la commande en ligne sur un catalogue existant (on ne demande pas la gestion des stocks !).

L'utilisateur final pourra naviguer entre cat�gories de produits et choisir un produit pour le mettre dans son panier (on choisira de placer plut�t le panier en variable de session, mais la solution qu'il soit dans la base est aussi possible).

Lors de la mise en panier du produit ou lors de la commande finale, il pourra ajuster le nombre d'exemplaires du(des) produit(s) choisi(s).

A la visualisation de la commande, le montant de chaque ligne sera affich�, ainsi que le montant total et le prix du transport.

Pour payer, l'acheteur devra se connecter, s'il se connecte pour la premi�re fois, il devra s'enregistrer en fournissant son nom,  son e-mail un password et une adresse de livraison.

Lorsque l'utilisateur se connecte � la boutique, ses param�tres de connexion le suivront en variable de session.

On ne demande pas le traitement du paiement (pas de tunnel d'achat).

Le back-office de la boutique permettra de g�rer le catalogue

L'utilisateur aura acc�s � son profil pour le mettre � jour.