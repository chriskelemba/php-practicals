<?php
class Job {
    private $conn;
    private $table_name = "jobs";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createJob($jobData) {
        // Check if required fields are set
        if (!isset($jobData['username'], $jobData['email'])) {
            throw new Exception("All fields are required.");
        }

        // Sanitize input data
        $title = htmlspecialchars(strip_tags($jobData['job_title']));
        $description = htmlspecialchars(strip_tags($jobData['job_description']));

        // Insert into database
        $query = "INSERT INTO " . $this->table_name . " (job_title, job_description) VALUES (:job_title, :job_description)";
        $stmt = $this->conn->prepare($query);

        // Bind values
        $stmt->bindParam(":job_title", $title);
        $stmt->bindParam(":job_description", $description);

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Unable to add job.");
        }
    }

    public function getJobs() {
        // Implementation for retrieving all job posts
    }

    public function deleteJob($jobId) {
        // Implementation for deleting a job post
    }
}
?>
