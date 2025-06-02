<?php
// app/models/TaskApplication.php

class TaskApplication extends Model {

    // Método utilizado por el controlador para crear una nueva postulación
    public function create($data) {
        $query = "INSERT INTO task_applications (task_id, worker_id, proposal_amount, proposal_message) 
                  VALUES (:task_id, :worker_id, :proposal_amount, :proposal_message)";
        
        $this->db->prepare($query);
        $this->db->bind(':task_id', $data['task_id']);
        $this->db->bind(':worker_id', $data['worker_id']);
        $this->db->bind(':proposal_amount', $data['proposal_amount']);
        $this->db->bind(':proposal_message', $data['proposal_message'] ?? '');
        
        return $this->db->execute();
    }

    // Verifica si el cachuelero ya se postuló a una tarea
    public function exists($taskId, $workerId) {
        $this->db->prepare("SELECT id FROM task_applications WHERE task_id = :task AND worker_id = :worker");
        $this->db->bind(':task', $taskId);
        $this->db->bind(':worker', $workerId);
        return $this->db->single() ? true : false;
    }

    // Obtiene las postulaciones a una tarea específica (para el cliente)
    public function getTaskApplications($taskId) {
        $query = "SELECT ta.*, up.first_name, up.last_name, up.average_rating, up.total_jobs, up.description
                  FROM task_applications ta
                  JOIN user_profiles up ON ta.worker_id = up.user_id
                  WHERE ta.task_id = :task_id AND ta.status = 'pendiente'
                  ORDER BY ta.created_at DESC";
        
        $this->db->prepare($query);
        $this->db->bind(':task_id', $taskId);
        return $this->db->resultSet();
    }
}

