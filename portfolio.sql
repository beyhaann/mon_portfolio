--supprimer les anciennes tables (ordre important à cause des clés étrangères)
DROP TABLE IF EXISTS project_comments;
DROP TABLE IF EXISTS contact_messages;
DROP TABLE IF EXISTS projects;
DROP TABLE IF EXISTS users;

-- Table des utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'visitor') DEFAULT 'visitor',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table des projets
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

-- Table des messages de contact
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(100),
    message TEXT NOT NULL,
    submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table des commentaires de projets
CREATE TABLE project_comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT NOT NULL,
    author_name VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE
);

-- Insertion d’un utilisateur admin
INSERT INTO users (username, email, password_hash, role)
VALUES ('admin', 'admin@example.com', SHA2('admin123', 256), 'admin');

-- Insertion d’un projet
INSERT INTO projects (title, description, tech_used, project_link, project_date, user_id)
VALUES (
    'Mon portfolio PHP',
    'Un site personnel développé avec PHP, MySQL et HTML/CSS.',
    'PHP, MySQL, HTML, CSS',
    'https://github.com/inesbeyhan/portfolio',
    '2025-06-30',
    1
);

-- Insertion d’un message de contact
INSERT INTO contact_messages (name, email, subject, message)
VALUES (
    'Elodie Demalvoisine',
    'elodie@example.com',
    'Demande d\'info',
    'Bonjour, très beau site, pouvez-vous me contacter ?'
);

-- Insertion d’un commentaire de projet
INSERT INTO project_comments (project_id, author_name, content)
VALUES (
    1,
    'Claire Martin',
    'Bravo pour ce projet très clair et bien structuré !'
);
