<?php
namespace app\services;
use Exception;

class UserService {
    public $model;
    public function __construct() {
        $this->model = (new \app\models\TaskModel())->getCurrentConn();
    }

    /**
     * Get list
     *
     * @return array|booblean Return all user
     */
    public function getAll()
    {
        $query = "
            SELECT
              *
            FROM
              `users` `u`
            ORDER BY `id` DESC
        ";
        $all = [];
        $sth = $this->model->query($query);
        while ($users = $sth->fetch(\PDO::FETCH_ASSOC))
            $all[] = $users;
        return $all;
    }

    /**
     * Get user by id
     * 
     * @return array|booblean Return one user
     */
    public function getById($id)
    {
        $sth = $this->model->query('SELECT * FROM users WHERE id='.$id);
        $users = $sth->fetch(\PDO::FETCH_ASSOC);
        return $users;
    }

    /**
     * Create user
     * 
     * @param array $data
     * @return array|boolean Return last inserted user
     */
    public function create($data)
    {
        try {
            $this->checkUser($data);
            $this->isValidData($data);
        } catch (\Exception $e) {
            throw new \Exception ($e->getMessage());
        }

        $data['role'] = 0;
        $query = "
            INSERT INTO `test`.`users` (`username`, `email`, `role`) 
            VALUES
              (?, ?, ?)
        ";
        $sth = $this->model->prepare($query);
        return $sth->execute(array_values($data));
    }

    /**
     * Update by id 
     * 
     * @param int $id user id
     * @param array $data user id and new value
     * @return booblean
     */
    public function update($id, $data)
    {
        try {
            $this->isValidData($data);
        } catch (\Exception $e) {
            throw new \Exception ($e->getMessage());
        }
        
        $query = "
            UPDATE 
              `users` 
            SET
              `username` = ?,
              `email`    = ? 
            WHERE `id` = {$id}    
        ";
        $sth = $this->model->prepare($query);
        return $sth->execute(array_values($data));
    }
    
    /**
     * Delete by id
     * 
     * @param int $id
     * @return booblean
     */
    public function delete($id)
    {
        $sth = $this->model->prepare('DELETE FROM users WHERE id='.$id);
        return $sth->execute();
    }

    public function checkLogin()
    {
         return !empty($_SESSION['logged_in']);
    }
    
    private function checkUser($data)
    {
        $query = "
            SELECT 
              count(`id`) as count
            FROM
              `users`
            WHERE 
                username = '{$data['username']}'
            OR
                email = '{$data['email']}'
        ";
        $sth = $this->model->query($query);
        $user = $sth->fetch(\PDO::FETCH_ASSOC);
        if($user['count'])
            throw new \Exception ('Such user already exists !');
        return true;
    }
    
    private function isValidData($data)
    {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Incorrect email {$data['email']} !");
        }
        return true;
    }
}