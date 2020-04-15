README Projet RAFIK_LARAVEL  M1DCISS 
- HAMMAR Rafik

# Guide d'installation
1. Cloner le projet:
- Ouvrir l'invité de commande
- Vous placer dans le dossier où vous voulez cloner le projet
- Utiliser la commande suivante:
		$ git clone https://github.com/rafikou01/Laravel_Rafik.git

2. Pour qu'une base de donnée soit utilisable:
- Créer la base de données sqlite dans le répertoire database du projet
- Aller modifier le fichier .env du projet en indiquant le chemin vers la bd à la ligne DB_BATABASE= 
ainsi que sqlite à DB_CONNEXION=
- Lancer la commande pour remplir la bd: php artisan migrate:refresh --seed . La base de donnée contient 20 users avec 1 article chacun. (Un user et un admin avec id et mot de passe sont créés pour la fonction d'authentification, voir Fonctionnalités ci-après). 

3. Rendre le projet fonctionnel:
- Ouvrir l'invité de commande
- Vous placer dans le répertoire du projet
- Utiliser les commandes suivantes:
		composer require laravel/ui
		php artisan serve
- Vous pouvez maintenant visiter la page (avec comme adresse celle du locahost)

# Fonctionnalités
 J'ai  implémenté les fonctionnalités suivantes:
1. Gestion des commentaires:
	Il est possible d'ajouter un commentaire en dessous des articles.
2. CRUD des articles:
	La partie "pour aller plus loin" a aussi été effectuée (protection par l'authentification, voir fonctionnalité suivante). Chaque utilisateur dispose d'un espace personnel d'où il peut gérer (CRUD) ses articles.
3. Identification / Authentification qui protège l'accès à l’administration. Pour la fonctionnalité ajoutant l’authentification, vous pouvez utiliser les comptes suivants:
* login: rafik@gmail.com     password: 'rafik' pour un utilisateur lambda
* login: admin@gmail.com    password:'admin' pour un administrateur
4. Ajout de rôles utilisateurs: 
	Il est possible de gérer(CRUD) les utilisateurs de l'application. Il est donc possible pour l'administrateur d'élever un utilisateur au role d'administrateur et vice versa.


## Fonctionnalités à regarder:
De préférence, suivez l'ordre des fonctionnalités présentées sinon vous ne serez pas connecté aux bons moments etc.
Les fonctionnalités du TP2 et les fonctionnalités optionnelles ajoutées étant reliées, J'ai structuré les tests à faire en 4 parties qui ne sont pas strictement exclusives: par exemple, certaines fonctionnalités de l'authentification sont impliquées dans le test de la fonctionnalité de gestion des commentaires.

1. Fonctionnalités générales:
- La page d'accueil contient les 5 articles les plus récents (titre et date).
- Cliquer sur l'onglet Articles: il contient les articles de la base de donnée (titre, date, auteur, article). On peut accéder à une page pour chaque article.
- Cliquer sur l'onglet protected : son contenu sera accessible pour les membres authentifiés uniquement.


2. Login/authentification et CRUD des articles:
- Cliquer sur l'onglet Login: se logger avec les identifiants fournis plus haut. Une fois loggé, dans contact il n'y a plus besoin de donner son nom/prénom et email (qui sont complétés automatiquement), il suffit de taper son message et de l'envoyer. En se loggant, une page supplémentaire est accessible: Mon profil.
- Cliquer sur la page Mon Profil: Elle contient la liste des articles de l'utilisateur connecté.
- On peut y créer un article (titre, catégorie, contenu) et cliquer sur envoyer. L'article apparait alors dans la liste d'articles de l'utilisateur et est ajouté à la BD (il est visible en première place dans l'onglet "Articles").
- Accédez directement à la page de l'article par le lien hypertexte sur le titre de l'article (dans la liste d'articles de l'utilisateur).
- Revenez sur "Mon profil", cliquez sur "modifier": le titre, la catégorie et le contenu préalables sont affichés. On peut changer l'article et le renvoyer. On peut aussi le supprimer. C'est ce qui correspond à la fonctionnalité 2- Le CRUD des articles.
- Allez sur la page ArticlesVIP: le contenu spécial pour les utilisateurs enregistrés est visible.

3. Gestion des commentaires:
- Allez sur la page Articles. Cliquez sur un article (le premier c'est plus simple pour la suite).
- Laissez un commentaire: vous n'avez pas besoin de donner votre nom et prénom car vous êtes connecté. Le commentaire s'affiche en dessous de l'article. Laissez un autre commentaire. Il s'ajoute en dessous du précédent. 
- Déconnectez vous en cliquant sur l'onglet "user" et en cliquant sur le bouton "logout" qui s'affiche.
- Maintenant retournez sur la page Articles. Cliquez sur l'article où vous avez mis les 2 commentaires. Ils sont toujours visibles après déconnexion. Laissez un autre commentaire: comme vous n'êtes plus connecté, vous devez maintenant donner votre nom/prénom, email en plus de votre commentaire.
- Si vous ne remplissez pas les champs, vous aurez des messages vous indiquant de remplir votre nom/prénom par exemple. De même si vous donnez une adresse mail ne contenant pas de @ par exemple.

4. Identification / Authentification qui protège l'accès à l’administration et protection par middlewares
- Connectez-vous avec comme identifiant 'admin@gmail.com' et '123456789' comme mot de passe. Vous avez les mêmes droits que l'utilisateur lambda mais en plus vous avez un espace d'administration (onglet Administration). Pour cela, nous avons utilisé des middleware (voir dans les routes du projet) pour permettre à certains utilisateurs d'accéder à certaines fonctionnalités/parties du site et pour les protéger:
- Si vous tapez l'URL http://localhost:8000/admin cela va fonctionner car vous êtes connecté en tant qu'administrateur.
- En revanche, déconnectez vous (admin -> logout). Maintenant, si vous tapez cette même URL (http://localhost:8000/admin) vous accédez à la page d'accueil du site et non aux fonctionnalités d'administrateur.
- Dans l'espace d'administration, vous pouvez gérer(CRUD) les utilisateurs. Si vous supprimez un utilisateur, tous les articles de ce dernier seront egalement supprimés. Tous les commentaires des articles supprimés le seront aussi automatiquement.






<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)
- [云软科技](http://www.yunruan.ltd/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
