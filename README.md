# TravelBlog
## Aide et assistance à la préparation de voyages

## Supports
### Framework
Symfony 6.0.6

### Langages
PHP 8.1
HTML 5
CSS 3
SASS
Javascript

## 
# Gestion de versions
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/jybast/travelblog.git
git push -u origin main
# Configuration
* Créer et Configurer le fichier .env.local:
* Créer la base de données : symfony console doctrine:database:create
* Créer les dossiers /assets (css, img, js, scss) dans /public
* Créer dossiers /uploads (images, documents) et /docs dans /public
* Intégrer Bootstrap 5 dans twig.yaml
* Configurer les chemins d'accès à /uploads/images et /uploads/documents dans services.yaml
* Intégrer fichiers bootstrap css et js
* supprimer les références webpack dans base.html.twig
* composer remove webpack
* supprimer les fichiers docker-compose.*
* décommenter la ligne #Symfony\Component\Mailer\Messenger\SendEmailMessage: async dans le fichier messenger.yaml,
# Système d'authentification et enregistrement
* Créer l'entité User : symfony console make:user
* Créer un HomeController de pages statiques (home, contact, about)
* symfony console make:auth
* symfony console make:registration-form
* composer require symfonycasts/reset-password-bundle
* composer require symfonycasts/verify-email-bundle
* symfony console make:reset-password

## TO DO