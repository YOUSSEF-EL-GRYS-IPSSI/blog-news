<?php

class authDB
{


    private PDOStatement $statementRegister;


    function __construct(private PDO $pdo)
    {
        $this->statementRegister = $pdo->prepare('INSERT INTO user VALUES (DEFAULT,:firstname,:lastname,:email,:password)');
    }

    function login(array $credential): void
    {
    }
    function register(array $user): void
    {

        $hashPassword = password_hash($user['password'], PASSWORD_ARGON2ID);
        $this->$statementRegister->bindValue(':firstname', $user['firstname']);
        $this->$statementRegister->bindValue(':lastname', $user['lastname']);
        $this->$statementRegister->bindValue(':email', $user['email']);
        $this->$statementRegister->bindValue(':password', $hashPassword);
        $this->$statementRegister->execute();
        return;
    }

    function isloggedin(): array | false
    {
    }

    function logout(): void
    {
    }
}
return new authDB($pdo);

// function isloggedin(){
//     global $pdo;

//     $sessionId = $_COOKIE['session'] ?? '';

//     if($sessionId){
//         $statementSession = $pdo->prepare('SELECT * FROM session WHERE id=:id');
//         $statementSession->bindValue(':id',$sessionId);
//         $statementSession->execute();
//         $session = $statementSession->fetch();
//         if ($session) {
//             $statementUser = $pdo->prepare('SELECT * FROM user WHERE id=:id');
//             $statementUser->bindValue(':id',$session['userid']);
//             $statementUser->execute();
//             $user = $statementUser->fetch();
            
//         }
//     }
//     return $user ?? false;
// }