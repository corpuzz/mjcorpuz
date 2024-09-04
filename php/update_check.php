<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../db_connect.php';

// Fetch updated data from the database
$response = [];

// Get Home Section
$home_sql = "SELECT brand_name, brand_description, background_image_url FROM home LIMIT 1";
$home_result = $conn->query($home_sql);
if ($home_result->num_rows > 0) {
    $response['home'] = $home_result->fetch_assoc();
}

// Get Contact Section
$contact_sql = "SELECT heading_title, heading_description, phone_number, email FROM contact LIMIT 1";
$contact_result = $conn->query($contact_sql);
if ($contact_result->num_rows > 0) {
    $response['contact'] = $contact_result->fetch_assoc();
}

// Get Skills Section
$skills_sql = "SELECT skill_title, skill_description, skill_image_url FROM skills_expertise";
$skills_result = $conn->query($skills_sql);
$response['skills'] = [];
if ($skills_result->num_rows > 0) {
    while ($row = $skills_result->fetch_assoc()) {
        $response['skills'][] = $row;
    }
}

// Get Projects Section
$projects_sql = "SELECT project_title, project_description, project_image_url FROM projects";
$projects_result = $conn->query($projects_sql);
$response['projects'] = [];
if ($projects_result->num_rows > 0) {
    while ($row = $projects_result->fetch_assoc()) {
        $response['projects'][] = $row;
    }
}

// Output the response in JSON format
header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
