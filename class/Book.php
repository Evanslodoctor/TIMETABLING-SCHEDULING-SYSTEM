<?php 
require_once('../database/Database.php');
require_once('../interface/iBook.php');
class Book extends Database implements iBook{

	public function getAllBook()
	{
		$sql = "SELECT *
				FROM reserve
				;
		";
		return $this->getRows($sql);
	}//end getAllBook

	public function deleteBook($tracker)
	{
		$sql = "DELETE FROM reserve WHERE reserveId = ?;";
		// return true;
		return $this->deleteRow($sql, [$tracker]);
	}//end deleteBook

	public function getBookBy($tracker)//limit 1
	{
		$sql = "SELECT * FROM reserve WHERE reserveId = ? LIMIT 1";
		return $this->getRow($sql, [$tracker]);
	}//end getPassengerList

	public function getPassengers($tracker)
	{
		$sql = "SELECT *
				FROM reserve WHERE reserveId = ?;
		";
		return $this->getRows($sql, [$tracker]);
	}///end getPassengers

	public function selectBook($book_id)
	{
		$sql = "SELECT *
				FROM reserve WHERE reserveId= ?;
		";
		return $this->getRow($sql, [$book_id]);
	}//end selectBook

	public function deleteBookByID($bid)
	{
		$sql = "DELETE 
				FROM booked 
				WHERE book_id = ?
		";
		return $this->deleteRow($sql, [$bid]);
	}//end deleteBookByID



	public function updateBook($tracker)
	{
		$sql = "UPDATE reserve SET results='Accepted' WHERE reserveId = ?;";
		// return true;
		return $this->updateRow($sql, [$tracker]);
	}//end deleteBook
}//end class

$book = new Book();