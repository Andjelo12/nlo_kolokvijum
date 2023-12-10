<?php
function createDevelopersArray(array $names, array $positions, array $roles):array{
    $rand = $names[array_rand($names)];
    $password = $rand['firstname'] . "-" . date('Y') . "-" . mt_rand(500, 2000);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $username = strtolower($rand['firstname'] . $rand['lastname']);
    $email = strtolower($rand['firstname'] . $rand['lastname']) . "@company.com";
    $rand2 = array_rand($roles);
    $salary = $roles[$rand2];
    $role=$roles[array_rand($roles)];
    $pos=$positions[array_rand($positions)];
    $developers = [
        'username' => $username,
        'password' => $hash,
        'name'=>$rand['firstname'],
        'email' => $email,
        'salary' => $pos['salary'],
        'position'=>$pos['name'],
        'role'=>$role
    ];
    return $developers;
}
function insertIntoDevelopers(array $developers){
    $sql="INSERT INTO developers(username, password, name, position, salary, email, role) VALUES (:username,:password,:name,:position,:salary,:email,:role)";
    $stmt=$GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(':username',$developers['username'],PDO::PARAM_STR);
    $stmt->bindValue(':password',$developers['password'],PDO::PARAM_STR);
    $stmt->bindValue(':name',$developers['name'],PDO::PARAM_STR);
    $stmt->bindValue(':position',$developers['position'],PDO::PARAM_STR);
    $stmt->bindValue(':salary',$developers['salary'],PDO::PARAM_STR);
    $stmt->bindValue(':email',$developers['email'],PDO::PARAM_STR);
    $stmt->bindValue(':role',$developers['role'],PDO::PARAM_STR);
    $stmt->execute();
}

function checkUser(string $user, string $pass):array{
    $sql="SELECT id_developer, username, password, role FROM developers WHERE username=:username AND password=:password";
    $stmt=$GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(":username",$user,PDO::PARAM_STR);
    $stmt->bindValue(":password",$pass,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
}

function insertFalseLogin(string $user, string $pass){
    $sql="INSERT INTO logs(username, password) VALUES (:username,:password)";
    $stmt=$GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(":username",$user,PDO::PARAM_STR);
    $stmt->bindValue(":password",$pass,PDO::PARAM_STR);
    $stmt->execute();
}

function showData(int $developer){
    $sql="SELECT username, password, name, position, salary, email, role FROM developers WHERE id_developer=:id_developer";
    $stmt=$GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(":id_developer",$developer,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}

function showAllData(){
    $sql="SELECT id_developer, username FROM developers";
    $stmt=$GLOBALS['pdo']->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function insertIntoProjects(string $name,string $description,string $start_date,array $type,string $end_date):int{
    $sql="INSERT INTO projects(title, description, start_date, type, finish_date) VALUES (:title, :description, :start_date, :type, :finish_date)";
    $stmt=$GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(":title",$name,PDO::PARAM_STR);
    $stmt->bindValue(":description",$description,PDO::PARAM_STR);
    $stmt->bindValue(":start_date",$start_date,PDO::PARAM_STR);
    $stmt->bindValue(":type",join(",",$type),PDO::PARAM_STR);
    $stmt->bindValue(":finish_date",$end_date,PDO::PARAM_STR);
    $stmt->execute();

    return $GLOBALS['pdo']->lastInsertId();
}

function insertIntoProjectsDevelopers(int $id, int $developer){
    $sql="INSERT INTO projects_developers(id_project, id_developer) VALUES (:id_project,:id_developer)";
    $stmt=$GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(":id_project",$id,PDO::PARAM_INT);
    $stmt->bindValue(":id_developer",$developer,PDO::PARAM_INT);
    $stmt->execute();
}