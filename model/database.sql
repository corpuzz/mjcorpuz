-- Create the database
CREATE DATABASE IF NOT EXISTS dashboard_db;

-- Use the database
USE dashboard_db;

-- Create the 'home' table
CREATE TABLE IF NOT EXISTS home (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(255),
    brand_description TEXT,
    background_image_url TEXT
);

-- Create the 'contact' table
CREATE TABLE IF NOT EXISTS contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    heading_title VARCHAR(255),
    heading_description TEXT,
    phone_number VARCHAR(20),
    email VARCHAR(255)
);

-- Create the 'skills_expertise' table
CREATE TABLE IF NOT EXISTS skills_expertise (
    id INT AUTO_INCREMENT PRIMARY KEY,
    skill_title VARCHAR(255),
    skill_description TEXT,
    skill_image_url TEXT
);

-- Create the 'projects' table
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_title VARCHAR(255),
    project_description TEXT,
    project_image_url TEXT
);
