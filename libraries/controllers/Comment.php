<?php 
namespace Controllers;
require_once('libraries/models/Article.php');
require_once('libraries/models/Comment.php');
require_once('libraries/utils.php');

class Comment{
    
    public function delete(){
        $modelComment = new \Models\Comment();
        
  
        /**
         * 1. Récupération du paramètre "id" en GET
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }
        
        $id = $_GET['id'];
        
        /**
         * 3. Vérification de l'existence du commentaire
         */
        $commentaire =   $modelComment->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }
        
        /**
         * 4. Suppression réelle du commentaire
         * On récupère l'identifiant de l'article avant de supprimer le commentaire
         */
        
        
        $article_id = $commentaire['article_id'];
        
        $modelComment->delete($id);
        
        /**
         * 5. Redirection vers l'article en question
         */
        // header("Location: article.php?id=" . $article_id);
        // exit();
        redirect("article.php?id=" . $article_id);
        }
} 
