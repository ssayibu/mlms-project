CREATE DATABASE IF NOT EXISTS medical_lab;

USE medical_lab;

CREATE TABLE IF NOT EXISTS patients (
    PatientID VARCHAR(20) PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    DateOfBirth DATE NOT NULL,
    Gender VARCHAR(10) NOT NULL,
    ContactNumber VARCHAR(15) NOT NULL,
    Results VARCHAR(255) NOT NULL,
    LabTechnician TEXT NOT NULL
);

-- Use the medical_lab database
USE medical_lab;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

