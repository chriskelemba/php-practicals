<?php
require_once 'User.php';

class Admin extends User
{
    protected $table_name = "users";

    public function addAlumni($alumniData)
    {
        // Check if required fields are set
        if (!isset($alumniData['username'], $alumniData['email'], $alumniData['password'])) {
            throw new Exception("All fields are required.");
        }

        // Sanitize input data
        $username = htmlspecialchars(strip_tags($alumniData['username']));
        $email = htmlspecialchars(strip_tags($alumniData['email']));
        $password = htmlspecialchars(strip_tags($alumniData['password']));

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }

        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Insert into database
        $query = "INSERT INTO " . $this->table_name . " (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->conn->prepare($query);

        // Bind values
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $passwordHash);

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Unable to add alumni.");
        }
    }

    public function viewAlumni()
    {
        // Implementation for viewing alumni
    }

    public function updateAlumni($alumniId, $alumniData)
    {
        // Implementation for updating alumni
    }

    public function deleteAlumni($alumniId)
    {
        // Implementation for deleting alumni
    }

    public function postJob($jobData)
    {
        // Implementation for posting job
    }
}
