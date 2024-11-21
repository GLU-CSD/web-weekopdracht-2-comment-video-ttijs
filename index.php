<?php
include("config.php");
include("reactions.php");

if(!empty($_POST)){

    //dit is een voorbeeld array.  Deze waardes moeten erin staan.
    $postArray = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'message' => $_POST['message'],
    ];

    $setReaction = Reactions::setReaction($postArray);

    if(isset($setReaction['error']) && $setReaction['error'] != ''){
        prettyDump($setReaction['error']);
    }
   

}

$getReactions = Reactions::getReactions();
//uncomment de volgende regel om te kijken hoe de array van je reactions eruit ziet
// echo "<pre>".var_dump($getReactions)."</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube remake</title>
</head>
<body>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=twI61ZGDECBr4ums" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

    <h2>Hieronder komen reacties</h2>
    <p>Maak hier je eigen pagina van aan de hand van de opdracht</p>

    <form action="" method="post">
        <input type="text" name="name" placeholder="name"><br>
        <input type="email" name="email" placeholder="email"><br>
        <textarea name="message" placeholder="message"></textarea><br>
        <input type="submit" value="Send">
    </form>

        <?php
        if(!empty($getReactions)){
            foreach($getReactions as $reaction){
                echo "<h3>{$reaction['name']}</h3>";
                echo "<p>{$reaction['email']}</p>";
                echo "<p>{$reaction['message']}</p>";
                echo "<p>{$reaction['date_added']}</p>";
                echo "<hr>";
            }
        }
        ?>


</body>
</html>

<?php
$con->close();
?>