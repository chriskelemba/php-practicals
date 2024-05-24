<?php
require_once 'User.php';

class Admin extends User
{
    protected $table_name_users = "users";
    protected $table_name_jobs = "jobs";

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
        $query = "INSERT INTO " . $this->table_name_users . " (username, email, password) VALUES (:username, :email, :password)";
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
        $sql = "SELECT * FROM " . $this->table_name_users;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $result;
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
            // Check if required fields are set
            if (!isset($jobData['job_title'], $jobData['job_description'], $jobData['job_location'])) {
                throw new Exception("All fields are required.");
            }
    
            // Sanitize input data
            $title = htmlspecialchars(strip_tags($jobData['job_title']));
            $description = htmlspecialchars(strip_tags($jobData['job_description']));
            $location = htmlspecialchars(strip_tags($jobData['job_location']));
    
            // Insert into database
            $query = "INSERT INTO " . $this->table_name_jobs . " (job_title, job_description, job_location, job_status) VALUES (:job_title, :job_description, :job_location, 'Approved')";
            $stmt = $this->conn->prepare($query);
    
            // Bind values
            $stmt->bindParam(":job_title", $title);
            $stmt->bindParam(":job_description", $description);
            $stmt->bindParam(":job_location", $location);
    
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Unable to add job.");
            }
        }

    public function viewJobs()
    {
        $sql = "SELECT * FROM " . $this->table_name_jobs;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $result;
    }
}

