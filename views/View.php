<html>
    <head>
        <title>MyFirstproject</title> 
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="post" action="../controllers/Presenter.php">
            <label> Voer een tekst in <br /></label>          
            <input type = "text" name ="naam" />             
            <input type ="submit" name="submit" value="Submit"/>
        </form>
        <p>
        <?php
            echo $viewData["palindroom"]."<br />";
            echo $viewData["message"]."<br />";
            echo $viewData["actie"];
            ?>
        </p>
    </body>
</html>

