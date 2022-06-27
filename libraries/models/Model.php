<?php
namespace Models;

abstract class Model{
        protected $pdo;
        protected $table;

        public function __construct(){
            $this->pdo = getPdo();
        }
    /**
     * retourne un article, un commentaire, ... ... ...  grâce à son identifiant
     * 
     * @param integer $id
     * @return void
     */
    public function find(int $id){
        
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();
        return $item;
    }

    /**
     * Retourne la liste des articles classés par date de creation 
     * 
     * @return array
     */

    public function findAll(?string $order = "") : array {

        $sql = "SELECT * FROM {$this->table}";

        if ($order){

            $sql .= " ORDER BY " . $order;
        }

            $resultats = $this->pdo->query($sql);
            // On fouille le résultat pour en extraire les données réelles
            $articles = $resultats->fetchAll();
            return $articles;
          
    } 
    /**
     * Supprime  un commentaire, un article, ... .... ..... dans la base prâce à son identifiant
     * 
     * @param inteder $id
     * @return void
     */
    public function delete(int $id) : void {
        // $pdo = getPdo();
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        
        
    }
}