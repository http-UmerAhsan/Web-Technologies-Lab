CREATE DATABASE IF NOT EXISTS employee_db;
USE employee_db;

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL,
    salary DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO employees (name, email, position, salary) VALUES
('Ali Raza', 'ali.raza@example.com', 'Software Engineer', 150000),
('Fatima Khan', 'fatima.khan@example.com', 'Project Manager', 180000),
('Ahmed Hassan', 'ahmed.hassan@example.com', 'UI/UX Designer', 120000),
('Ayesha Malik', 'ayesha.malik@example.com', 'HR Manager', 140000);
