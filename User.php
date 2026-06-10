<?php 
class User{
    private $conn;
    public function __construct($conn){
        $this->conn = $conn;
}
public function createUser($name, $email, $hashed_password, $age, $gender, $position, $comments){
$stmt = $this->conn->prepare("INSERT INTO datalogin (name, password, email, age, gender, position, comments) VALUES (?, ?, ?, ?, ?, ?, ?)"); 
    $stmt->bind_param(
     "sssisss",
     $name, 
     $hashed_password, 
     $email,
     $age,
     $gender, 
     $position,
     $comments
     );
return $stmt->execute();
}
public function getUserByEmail($email){
 $stmt = $this->conn->prepare("SELECT id, name, password FROM datalogin WHERE email = ?");
    $stmt->bind_param("s",$email);

    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
 public function getUserById($id){
    $stmt = $this->conn->prepare("SELECT id, name, email, age, gender, position, comments FROM datalogin WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
}
?>
 