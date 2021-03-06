<?php
namespace Models;
require_once('libraries/database.php');
require_once("libraries/models/Model.php");
class Comment extends Model{

    
    protected $table = "comments";

/**
 * retourne tous les commentaures d'un article donné
 * 
 * @param inteder $article_id
 * @return array 
 */
public function findAllWithArticle(int $article_id) : array {
    //$pdo = getPdo();
    $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
    $query->execute(['article_id' => $article_id]);
    $commentaires = $query->fetchAll();

    return $commentaires;

}

/**
 * insère un commentaire  dans la base de données
 * @param string $author
 * @param string $content
 * @param integer $article_id 
 * @return void 
 */
public function insert (string $author, string $content, int $article_id ) : void {
    // 3. Insertion du commentaire
    $pdo = getPdo();
    $query = $pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
    $query->execute(compact('author', 'content', 'article_id'));

}

}