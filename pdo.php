<pre>
    <?php


    $dns      = 'mysql:host=localhost;dbname=test';
    $user     = 'root';
    $pwd      = 'Momo78955';

    try {
        $pdo      = new PDO($dns, $user, $pwd, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        echo 'Connexion est ok !';
    } catch (PDOException $e) {
        echo "error :" . $e->getMessage();
    }

    // $user = [
    //     'firstname' => 'Dracula',
    //     'email' => 'dracula@istanbul.com',
    //     'password' => '258'
    // ];

    // $statement = $pdo->prepare('INSERT INTO user VALUE (
    //     DEFAULT,
    //     ?,
    //     ?,
    //     ?
    // )');

    // $statement->bindValue(1, $user['firstname']);
    // $statement->bindValue(2, $user['email']);
    // $statement->bindValue(3, $user['password']);

    class User {
        function greeting() {
            echo 'hello '. $this->firstname . ' '. $this->email;
        }
    }

    $statement = $pdo->prepare('SELECT * FROM user WHERE iduser=:id');
    $statement->bindValue(':id', 15);

    $statement->execute();

    $users = $statement->fetchObject('User');

    $users->greeting();

    // print_r($users);
    // foreach ($users as $user) {
    //     echo $user['firstname'];
    // }




    ?>
</pre>