<?php
    require_once './data/dataBaseVG.php';
    require_once './App/Models/VideoGame.php';

    

     // Si le formulaire vient d'être validé
     if (
            isset($_POST['title'])
            && isset($_POST['link'])
            && isset($_POST['release_date'])
            && isset($_POST['developer'])
            && isset($_GET['platform'])
    ) {
    
            $statement = $dbVideoGames->prepare('
                INSERT INTO `game` (
                    `title`,
                    `release_date`,
                    `link`,
                    `developer_Id`,
                    `platform_Id`

                )
                VALUES (
                    :title,
                    :release_date,
                    :link,
                    :developer_id,
                    :platform_id
                )
            ');
            $statement->execute([
                ':title' => $_POST['title'],
                ':release_date' => $_POST['release_date'],
                ':link' => $_POST['link'],
                ':developer_id' => $_POST['developer'],
                ':platform_id' => $_POST['platform'],
            ]);
            
    };
    
$game = new VideoGame(
        null,
        $_POST['title'],
        $_POST['release_date'],
        $_POST['link'],
        $_POST['developer'],
        $_POST['platform']
    );
    var_dump($game);
    ?> 
