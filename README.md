# 📚 Gestion de Bibliothèque

Application web développée avec **Laravel**, permettant de gérer des livres, des auteurs, et des bibliothèques.  
Ce projet est conçu pour être facilement déployable grâce à **Docker**.

---

## 🧰 Technologies utilisées

- PHP 8+
- Laravel
- MySQLLite
- Docker / Docker Compose
- Blade (moteur de templates Laravel)


---

## ⚙️ Instructions de build et exécution locale

### 🐳 Avec Docker

bash
# Cloner le projet
git clone https://github.com/ayoub-2255/gestion_bibliotheque.git
cd gestion_bibliotheque

# Construire et lancer les containers
docker compose up --build -d

# Accéder au conteneur Laravel
docker exec -it app bash

# Installer les dépendances PHP
composer install

# Installer les dépendances frontend
npm install && npm run dev

# Copier le fichier d'environnement et générer la clé
cp .env.example .env
php artisan key:generate

# Configurer la base de données (dans .env), puis :
php artisan migrate

📦 Lien vers l'image Docker

https://hub.docker.com/r/ayoublouleb/gestion-bibliotheque


🧪 Commandes utiles

🐳 Docker

# Pull l'image depuis Docker Hub
docker pull ayoublouleb/gestion-bibliotheque

# Lancer l'image Docker manuellement
docker run -d --name gestion-biblio -p 8080:80 ayoublouleb/gestion-bibliotheque

# Build + lancer les conteneurs avec docker-compose
docker compose up --build -d

# Stopper les conteneurs
docker compose down

# Voir les logs en direct
docker compose logs -f

# Accéder à un container
docker exec -it app bash

🧰 Laravel / Artisan

php artisan migrate          # Exécuter les migrations
php artisan db:seed          # Exécuter les seeders
php artisan serve            # Lancer le serveur Laravel localement

👨‍💻 Auteur

Ayoub louleb et yahya barkaoui


