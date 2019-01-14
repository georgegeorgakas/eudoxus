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

    /**
     * Get single book by id
     * @param $id
     *
     * @return array
     */
    public function getSingleBookById($id){
        $this->db->query('SELECT * FROM books WHERE idBooks = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            return $row;
        }
        return [];
    }

    /**
     * Update book ids on user
     * @param $id
     *
     * @param $books
     * @return bool
     */
    public function updateUserBooks($id, $books){
        $this->db->query('UPDATE users SET books_id = :books WHERE idUsers = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':books', $books);

        try{
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    /**
     * Update stock in books
     * @param $stock
     * @param $id
     *
     * @return bool
     */
    public function updateStockInBooks($stock, $id){
        $this->db->query('UPDATE books SET books_left = :stock WHERE idBooks = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':stock', $stock);

        try{
            $this->db->execute();
            return true;
        }catch (Exception $e){
            return false;
        }
    }
}