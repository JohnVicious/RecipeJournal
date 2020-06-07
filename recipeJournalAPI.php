<?php
require ('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class recipeJournalAPI {
	protected $pdo;
	
	public function __construct()
	{
		$this->pdo = new PDO("mysql:host=" . getenv('DBHOST') . ";port=3306;dbname=" . getenv('DBNAME') . ";charset=utf8", getenv('DBUSER'), getenv('DBPASSWORD'), array(PDO::ATTR_PERSISTENT => false));
	}
	
	public function getRecipes()
	{
		$recipes = array();
		$recipeTbl = $this->pdo->prepare("SELECT ID, Title, Body, ImageURL FROM recipes;");
		
		if($recipeTbl->execute()){
			while($row = $recipeTbl->fetch()){
				$r = array();
				$r['ID'] = $row['ID'];
				$r['Title'] = $row['Title'];
				$r['Body'] = $row['Body'];
				$r['ImageURL'] = $row['ImageURL'];
				
				$recipes[] = $r;
			}
		}
		
		return json_encode($recipes);
	}
	
}

$api = new recipeJournalAPI();
header('Content-Type: application/json');
echo $api->getRecipes();

?>
