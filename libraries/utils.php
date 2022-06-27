<?php

    //render('articles/show')
    function render(string $path, $variables=[]){
        extract($variables);   
        ob_start();
        require('templates/articles/' . $path . '.html.php');
        $pageContent = ob_get_clean();

        require('templates/layout.html.php');
    }


    function redirect(string $url) : void{
        header("Location: $url");
        exit();
    }