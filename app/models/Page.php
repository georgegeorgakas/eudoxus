<?php

class Page
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Do live search for books by title
     * @param string $key
     *
     * @return array
     */
    public function getAllBooksBySearch(string $key){
        $this->db->query("SELECT * FROM books WHERE title LIKE '$key%'
                                                      OR author LIKE '$key%'");
        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        }
        return [];
    }
}