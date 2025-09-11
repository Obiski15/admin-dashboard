DROP DATABASE IF EXISTS school;
CREATE DATABASE school;

USE school;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT CHECK (age > 0),
    studentID VARCHAR(100) UNIQUE,
    department VARCHAR(255) NOT NULL
);

INSERT INTO students (name, age, studentID, department) 
VALUES
("Rick Sanchez", 11, "000001", "Computer Science"),
("Morty Smith ", 12, "000002", "Computer Science"),
("Tammy Gueterman", 13, "000003", "Computer Science"),
("Tyler Galpin", 14, "000004", "Computer Science"),
("Pugsley Addams", 15, "000005", "Computer Science"),
("Ajax Petropolus", 16, "000006", "Computer Science")
