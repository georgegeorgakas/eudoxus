<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Register User
     * @param array $data
     * @param string $category
     * @return bool
     */
    public function register(array $data, string $category){

        // Register the user
        $this->db->query('INSERT INTO users (userCategory, name, surname , password, email, username, telephoneNumber, relatedUniversity, address) 
                            VALUES (:category, :fname, :lname, :passwords, :email, :username, :phone, :university, :address )');
        // Bind Values
        $this->db->bind(':category',$category);
        $this->db->bind(':fname',$data['first_name']);
        $this->db->bind(':lname',$data['last_name']);
        $this->db->bind(':passwords',$data['password']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':username',$data['username']);
        $this->db->bind(':phone',$data['phone']);
        $this->db->bind(':university',$data['university']);
        $this->db->bind(':address',$data['address']);

        // Execute
        try{
            $this->db->execute();
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    /**
     * Find user by email
     * @param string $email
     * @return bool
     */
    public function findUserByEmail(string $email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
            return true;
        }else {
            return false;
        }
    }

    /**
     * Find user by username
     * @param string $username
     * @return bool
     */
    public function findUserByUsername(string $username){
        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
            return true;
        }else {
            return false;
        }
    }

    /**
     * Verify password by user with email or username
     * @param string $key
     * @param string $password
     * @return bool
     */
    public function login(string $key,string $password){
        $this->db->query('SELECT * FROM users WHERE username = :key or email = :key');
        $this->db->bind(':key', $key);
        $row = $this->db->single();
        $pass = $row->password;
        if($this->db->rowCount() > 0){
            if(password_verify($password, $pass)){
                return $row;
            }
        }
        return false;
    }

    /**
     * Get all Universities
     * @return array
     */
    public function getAllUniversities(){
        $this->db->query('SELECT * FROM university');
        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        }
        return [];
    }

    /**
     * Check if the password on db is the same as our input
     * @param string $password
     * @param string $id
     * @return bool
     */
    public function checkPasswordByUserId(string $password, string $id){
        $this->db->query('SELECT password FROM users WHERE idUsers = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            $pass = $row->password;
            if(password_verify($password, $pass)){
                return true;
            }
        }
        return false;
    }

    /**
     * Update username
     * @param string newUsername
     * @param int id
     *
     * @return bool
     */
    public function updateUsername(string $newUsername, int $id){
        $this->db->query('UPDATE users SET username=:newUsername WHERE idUsers=:id');
        $this->db->bind(':newUsername', $newUsername);
        $this->db->bind(':id', $id);
        try {
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Update email
     * @param string $newEmail
     * @param int id
     *
     * @return bool
     */
    public function updateEmail(string $newEmail, int $id){
        $this->db->query('UPDATE users SET email=:newEmail WHERE idUsers=:id');
        $this->db->bind(':newEmail', $newEmail);
        $this->db->bind(':id', $id);
        try {
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Update password
     * @param string newPassword
     * @param int id
     *
     * @return bool
     */
    public function updatePassword(string $newPassword, int $id){
        $this->db->query('UPDATE users SET password=:newPassword WHERE idUsers=:id');
        $this->db->bind(':newPassword', $newPassword);
        $this->db->bind(':id', $id);
        try {
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Update user Personal details
     * @param array $data
     * @param int id
     *
     * @return bool
     */
    public function updateDetails(array $data, int $id){
        $this->db->query('UPDATE users 
                              SET name = :name, surname = :last_name, telephoneNumber = :phone, address = :address
                              WHERE idUsers = :id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':id', $id);
        try{
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

}