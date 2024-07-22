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
