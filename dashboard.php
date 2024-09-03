<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Handle Home form submission
    if (isset($_POST['brand-name'])) {
        $brandName = $_POST['brand-name'];
        $brandDescription = $_POST['brand-description'];
        $backgroundImage = $_POST['background-image'];

        $sql = "INSERT INTO home (brand_name, brand_description, background_image_url)
                VALUES ('$brandName', '$brandDescription', '$backgroundImage')
                ON DUPLICATE KEY UPDATE 
                    brand_name='$brandName', 
                    brand_description='$brandDescription', 
                    background_image_url='$backgroundImage'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Home section updated successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Handle Contact form submission
    if (isset($_POST['heading-title'])) {
        $headingTitle = $_POST['heading-title'];
        $headingDescription = $_POST['heading-description'];
        $phoneNumber = $_POST['phone-number'];
        $email = $_POST['email'];

        $sql = "INSERT INTO contact (heading_title, heading_description, phone_number, email)
                VALUES ('$headingTitle', '$headingDescription', '$phoneNumber', '$email')
                ON DUPLICATE KEY UPDATE 
                    heading_title='$headingTitle', 
                    heading_description='$headingDescription', 
                    phone_number='$phoneNumber', 
                    email='$email'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Contact section updated successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Handle Skills and Expertise form submission
    if (isset($_POST['skill-title'])) {
        $skillTitle = $_POST['skill-title'];
        $skillDescription = $_POST['skill-description'];
        $skillImageUrl = $_POST['skill-image-url'];

        $sql = "INSERT INTO skills_expertise (skill_title, skill_description, skill_image_url)
                VALUES ('$skillTitle', '$skillDescription', '$skillImageUrl')
                ON DUPLICATE KEY UPDATE 
                    skill_description='$skillDescription', 
                    skill_image_url='$skillImageUrl'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Skills section updated successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Handle Projects form submission
    if (isset($_POST['project-title'])) {
        $projectTitle = $_POST['project-title'];
        $projectDescription = $_POST['project-description'];
        $projectImageUrl = $_POST['project-image-url'];

        $sql = "INSERT INTO projects (project_title, project_description, project_image_url)
                VALUES ('$projectTitle', '$projectDescription', '$projectImageUrl')
                ON DUPLICATE KEY UPDATE 
                    project_description='$projectDescription', 
                    project_image_url='$projectImageUrl'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Projects section updated successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
