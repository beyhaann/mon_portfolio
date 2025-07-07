-- création de la table utilisateurs
CREATE TABLE utilisateurs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  inscrit DATE DEFAULT CURRENT_DATE
);

-- insertion d'un utilisateur exemple
INSERT INTO utilisateurs (nom, email) VALUES
('Beyhan', 'beyhan@example.com');
