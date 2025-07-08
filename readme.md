# Mon Portfolio – Beyhan

Bienvenue sur mon portfolio personnel, conçu pour démontrer mes compétences techniques et ma motivation à intégrer la **L2 professionnelle Applications Web** à l'Université de Limoges.

---

# Objectif du projet

Ce projet met en valeur :
- Mes compétences en **HTML, CSS, JavaScript, PHP et SQL**
- Mon autonomie dans la conception d’un site dynamique
- L’intégration d’un formulaire de contact fonctionnel avec traitement côté serveur
- L’usage de **WordPress** (preuve par capture + certification)
- Le respect de bonnes pratiques en **accessibilité**, **SEO** et **organisation de projet**

---

# Contenu du projet

- `index.html` — page d’accueil avec navigation
- `a-propos.html` — présentation personnelle
- `competences.html` — compétences web (front/back)
- `projets.html` — projets réalisés + captures
- `contact.php` — formulaire de contact fonctionnel (avec envoi et sécurité)
- `db.php` — connexion à la base de données (locale)
- `portfolio.sql` — structure de la base SQL associée
- `script.js` — validation JS
- `css/` — styles CSS personnalisés
- `images/` — illustrations + capture WordPress
- `readme.md` — ce fichier 😉

---

# Fonctionnalité dynamique

Le fichier `contact.php` gère :
- La validation des champs côté serveur
- La connexion à une base MySQL (via `db.php`)
- L'insertion sécurisée des messages

Le formulaire HTML pointe correctement vers `contact.php`.

---

# Schéma SQL (`portfolio.sql`)

```sql
CREATE TABLE contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
