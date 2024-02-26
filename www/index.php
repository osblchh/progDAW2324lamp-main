<html>
    <head>
        <title>Welcome to LAMP Infrastructure</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <?php
                echo "<h1>Hello, Welcome DAW Student!</h1>";

                $conn = mysqli_connect('db', 'root', 'test', "dbname");
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                /*
                //sentencia ejemplo de insert
                $insert = 'INSERT INTO Person(id, name) VALUES (111, 'NombrePrueba')';
                $result = mysqli_query($conn, $insert);
                echo ($conn->query($insert)) ? "insert ok" : "insert failed";
                 
                
                //ejemplo prepared statement
                $stmt = $conn->prepare('INSERT INTO Person(id, name) VALUES (?, ?)');
                $stmt->bindParam("is", $id, $name);
                $id = 222;
                $name = "Lenin";
                $stmt->execute();
                */

                $query = 'SELECT * From Person';
                $result = mysqli_query($conn, $query);

                echo '<table class="table table-striped">';
                echo '<thead><tr><th>id</th><th>name</th></tr></thead>';
                while($value = $result->fetch_array(MYSQLI_ASSOC)){
                    echo '<tr>';
                    foreach($value as $element){
                        echo '<td>' . $element . '</td>';
                    }

                    echo '</tr>';
                }
                echo '</table>';

                $result->close();
                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>
