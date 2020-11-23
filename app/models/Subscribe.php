<?php
  class Subscribe {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getSubscribers(){
      $this->db->query('SELECT * FROM subscribers');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addSubscriber($data){
      $this->db->query('INSERT INTO subscribers (email) VALUES(:email)');
      $this->db->bind(':email', $data['email']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function deleteSubscriber($id){
      $this->db->query('DELETE FROM subscribers WHERE id = :id');
      $this->db->bind(':id', $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }