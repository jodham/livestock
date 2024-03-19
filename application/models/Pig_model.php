<?php
class Pig_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
      // Load the second database
    }

    function getBreeds(){
        $query = "SELECT * FROM `breed` ORDER BY name ASC";
        return $this->db->query($query)->result();
    }
    function getBreedByName($name){
        $query = "SELECT * FROM `breed` WHERE name = ?";
        return $this->db->query($query, array($name))->row();
    }
    function getMalePigs(){
        $query = "SELECT * FROM `pig` WHERE gender ='Male'";
        return $this->db->query($query)->result();
    }
    function  getPigByTag($tag){
        $query = "SELECT * FROM `pig` WHERE tag = ?";
        return $this->db->query($query, array($tag))->row();
    }
    function  getPigs(){
        $query = "SELECT * FROM `pig` ORDER BY tag ASC";
        return $this->db->query($query)->result();
    }
    function getFemalePigs(){
        $query = "SELECT * FROM `pig` WHERE gender ='Female'";
        return $this->db->query($query)->result();
    }
    function getFateByName($fate) {
        $query = "SELECT * FROM `fate` WHERE fate = ?";
        return $this->db->query($query,array($fate))->row(); 
    }
    function getFates(){
        $query = "SELECT * FROM  `fate` ORDER BY fate ASC";
        return $this->db->query($query)->result();
    }
    function getPens(){
        $query = "SELECT * FROM `pen` ORDER BY pen_NO ASC";
        return $this->db->query($query)->result();
    }
    function getPenByName($pen) {
        $query = "SELECT * FROM `pen` WHERE pen_No = ?";
        return $this->db->query($query,array($pen))->row(); 
    }

}