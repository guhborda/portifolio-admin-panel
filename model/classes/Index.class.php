<?php 
namespace classes;
use sys\Conexao;

/**
* 
*/
class Index
{
	private $titulo;
	private $keywords;
	private $description;
	private $author;
	private $sec1_pic;
	private $sec1_name1;
	private $sec1_name2;
	private $sec1_text;
	private $sec1_social;
	private $sec2_textabout;
	private $sec2_pic;
	private $sec3_school= array();
	private $sec3_skills = array();
	private $sec4_projects = array();
	function __construct()
	{
		
	}

	public function setTitle($title)
	{
		$this->titulo = $title;
	}
	public function getTitle()
	{
		return $this->titulo;
	}
	public function setKeywords($keywords)
	{
		$this->keywords = $keywords;
	}
	public function getKeywords()
	{
		return $this->keywords;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}
	public function getDescription()
	{
		return $this->description;
	}
	public function setAuthor($author)
	{
		$this->author = $author;
	}
	public function getAuthor()
	{
		return $this->author;
	}
	public function setSec1Pic($pic)
	{
		$this->sec1_pic = $pic;
	}
	public function getSec1Pic()
	{
		return $this->sec1_pic;
	}
	public function setSec1Name1($name)
	{
		$this->sec1_name1 = $name;
	}
	public function getSec1Name1()
	{
		return $this->sec1_name1;
	}
	public function setSec1Name2($name)
	{
		$this->sec1_name2 = $name;
	}
	public function getSec1Name2()
	{
		return $this->sec1_name2;
	}
	public function setSec1Text($text)
	{
		$this->sec1_text = $text;
	}
	public function getSec1Text()
	{
		return $this->sec1_text;
	}
	public function setSec1Social($social=array())
	{
		$this->sec1_social = $social;
	}
	public function getSec1Social()
	{
		return $this->sec1_social;
	}
	public function setSec2TxtAbout($txtabout)
	{
		$this->sec2_textabout = $txtabout;
	}
	public function getSec2TxtAbout()
	{
		return $this->sec2_textabout;
	}
	public function setSec2Pic($pic)
	{
		$this->sec2_pic = $pic;
	}
	public function getSec2Pic()
	{
		return $this->sec2_pic;
	}
	public function setSec3School($school=array())
	{
		$this->sec3_school[] = $school;
	}
	public function getSec3School()
	{
		return $this->sec3_school;
	}
	public function setSec3Skills($skills=array())
	{
		$this->sec3_skills[] = $skills;
	}
	public function getSec3Skills()
	{
		return $this->sec3_skills;
	}
	public function setSec4Projects($projects=array())
	{
		$this->sec4_projects[] = $projects;
	}
	public function getSec4Projects()
	{
		return $this->sec4_projects;
	}

	public function updateIndex($con){
		$con = new Conexao;

		$sql = "UPDATE section1 SET picture = ?,first_name = ?, last_name = ?, description = ? WHERE id = 1";
		$vars = array($this->sec1_pic,$this->sec1_name1,$this->sec1_name2,$this->sec1_text);
		$update = $con->query($sql,$vars);
		
		
	}

	public function setIndex(){
		$con = new Conexao;
		$sec1 = "SELECT * FROM section1 WHERE id = 1";
		$sec2 = "SELECT * FROM section2 WHERE id = 1";
		$sec3school = "SELECT * FROM school ORDER BY data DESC";
		$sec3skills = "SELECT * FROM skills";
		$sec1social = "SELECT * FROM social";
		$sec4projects = "SELECT * FROM projects LEFT JOIN categoria ON `projects`.`cat_id` = `categoria`.`id_cat` ";
		$ProjCategoria = "SELECT * FROM categoria"; 
		$sec1 = $con->query($sec1);
		$sec1 = $sec1->fetch(\PDO::FETCH_ASSOC);
		$countsec1 = count($sec1);
		//query da sessão 1
		$sec2 = $con->query($sec2);
		$sec2 = $sec2->fetch(\PDO::FETCH_ASSOC);
		$countsec2 = count($sec2);
		//query da sessão 2

		$sec3school = $con->query($sec3school);
		$sec3school = $sec3school->fetch(\PDO::FETCH_ASSOC);
		$countsec3school = count($sec3school);

		//query da sessao 3 div school

		$sec3skills = $con->query($sec3skills);
		$sec3skills = $sec3skills->fetch(\PDO::FETCH_ASSOC);
		$countsec3skill = count($sec3skills);

		//query da sessao 3 div skills

		$sec4projects = $con->query($sec4projects);
		$sec4projects = $sec4projects->fetch(\PDO::FETCH_ASSOC);
		$countprojects = count($sec4projects);

		//query sessao 4
		$sec1social = $con->query($sec1social);
		$sec1social = $sec1social->fetchAll();
		

		if(($countsec1>=1) && ($countsec2 >= 1) && ($countsec3school >=1) && ($countsec3skill >= 1) ){
				self::setSec1Pic($sec1['picture']);
				self::setSec1Name1($sec1['first_name']);
				self::setSec1Name2($sec1['last_name']);
				self::setSec1Text($sec1['description']);
				self::setSec2Pic($sec2['picture']);
				self::setSec2TxtAbout($sec2['about']);
				self::setSec3School(['course'=>$sec3school['course_title'],'school'=> $sec3school['school'], 'status'=> $sec3school['status'],'date' => $sec3school['data']] );
				self::setSec3Skills(['title' => $sec3skills['skill_title'], 'status' => $sec3skills['status']]);
				//$indice = array($this->sec1_pic,$this->sec1_name1,$this->sec1_name2,$this->sec1_text);
				self::setSec4Projects([$sec4projects['p_id'],$sec4projects['p_title'],$sec4projects['p_desc'],$sec4projects['cat_id'],$sec4projects['p_url'],$sec4projects['p_tools']]);
				self::setSec1Social($sec1social);
				
		}else{
			echo "Nada encontrado";
		}
		// Getting the section 1 of database



	}
}


?>