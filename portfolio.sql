-- suppression propre
DROP DATABASE IF EXISTS portfolio;
CREATE DATABASE portfolio DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE portfolio;

-- table des utilisateurs (admin ou invités)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'visitor') DEFAULT 'visitor',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- table des projets du portfolio
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    tech_used VARCHAR(255),
    project_link VARCHAR(255),
    project_date DATE,
    user_id INT DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

--table des messages envoyés depuis le formulaire de contact
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(100),
    message TEXT NOT NULL,
    submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- table des commentaires sur les projets
CREATE TABLE project_comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT NOT NULL,
    author_name VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE
);

-- données de démonstration : utilisateurs
INSERT INTO users (username, email, password_hash, role)
VALUES ('admin', 'admin@example.com', SHA2('admin123', 256), 'admin');

-- données de démonstration : projets
INSERT INTO projects (title, description, tech_used, project_link, project_date, user_id)
VALUES (
    'Mon portfolio PHP',
    'Un site personnel développé avec PHP, MySQL et HTML/CSS. Contient un formulaire de contact dynamique et une base de données.',
    'PHP, MySQL, HTML, CSS',
    'https://github.com/inesbeyhan/portfolio',
    '2025-06-30',
    1
);

-- données de démonstration : messages de contact
INSERT INTO contact_messages (name, email, subject, message)
VALUES (
    'Elodie Demalvoisine',
    'elodie@example.com',
    'Demande d\'info',
    'Bonjour, très beau site, pouvez-vous me contacter ?'
);

-- Données de démonstration : commentaire
INSERT INTO project_comments (project_id, author_name, content)
VALUES (
    1,
    'Claire Martin',
    'Bravo pour ce projet très clair et bien structuré !'
);

-- Requête test pour affichage des commentaires liés aux projets
SELECT p.title, c.author_name, c.content
FROM project_comments c
JOIN projects p ON c.project_id = p.id
ORDER BY c.created_at DESC;
