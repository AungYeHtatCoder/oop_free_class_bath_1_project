<?php 
namespace Libs\Database;
use PDO;
use PDOException;

class UsersTable 

{
 private $db = null;  // property

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 public function UserRegister($data)
 {
  try {
   $query = "INSERT INTO users (name, email, password, role_id, created_at) VALUES (:name, :email, :password, :role_id, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // user login

  public function UserLogin($email, $password)
 {
  $statement = $this->db->prepare("SELECT users.*, roles.name as role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE email = :email AND password = :password");
  $statement->execute([
   ':email' => $email,
   ':password' => $password
  ]);
  $row = $statement->fetch();
  return $row ?? false;
 }

 // user profile update
 
 public function ProfileUpdate($id, $profile_name)
	{
		$statement = $this->db->prepare(
			"UPDATE users SET profile=:profile_name WHERE id = :id"
		);
		$statement->execute([':profile_name' => $profile_name, ':id' => $id]);

		return $statement->rowCount();
	}


 // user name update
 
 public function NameUpdate($id, $name)
	{
		$statement = $this->db->prepare(
			"UPDATE users SET name=:name WHERE id = :id"
		);
		$statement->execute([':name' => $name, ':id' => $id]);

		return $statement->rowCount();
	}

 // user Password update
 
 public function PasswordUpdate($id, $password)
	{
		$statement = $this->db->prepare(
			"UPDATE users SET password=:password WHERE id = :id"
		);
		$statement->execute([':password' => $password, ':id' => $id]);

		return $statement->rowCount();
	}


	// user phone update
 
 public function PhoneUpdate($id, $phone)
	{
		$statement = $this->db->prepare(
			"UPDATE users SET phone=:phone WHERE id = :id"
		);
		$statement->execute([':phone' => $phone, ':id' => $id]);

		return $statement->rowCount();
	}
}