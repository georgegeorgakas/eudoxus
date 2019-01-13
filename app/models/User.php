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
}