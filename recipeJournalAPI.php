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
		$recipeTbl = $this->pdo->prepare("SELECT ID, RecipeData FROM recipes;");
		
		if($recipeTbl->execute()){
			while($row = $recipeTbl->fetch()){				
				$recipeData = json_decode($row['RecipeData'],true);
				$r = array();
				$r['ID'] = $row['ID'];
				$r['Title'] = $recipeData['title'];
				$r['SubTitle'] = $recipeData['subTitle'];
				$r['Image'] = "require('../../assets/recipeImages/" . $recipeData['image'] . "')";
				$r['Servings'] = $recipeData['servings'];
				$r['Serves'] = $recipeData['serves'];
				$r['PrepTime'] = $recipeData['prepTime'];
				$r['CookTime'] = $recipeData['cookTime'];
				$r['Calories'] = $recipeData['calories'];
				$r['Story'] = $recipeData['story'];
				$r['Ingredients'] = $recipeData['ingredients'];
				$r['Instructions'] = $recipeData['instructions'];
				$r['Notes'] = $recipeData['notes'];				
				
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
