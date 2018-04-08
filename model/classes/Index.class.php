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
	private $sec4_pic_projects = array();
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

	public function setSec4PicProjects($pic=array()){
		$this->sec4_pic_projects = $pic;
	}
	public function getSec4PicProjects(){
		return $this->sec4_pic_projects;
	}

	public function updateIndex($con){
		$con = new Conexao;

		$sql = "UPDATE section1 SET picture = ?,first_name = ?, last_name = ?, description = ? WHERE id = 1";
		$vars = array($this->sec1_pic,$this->sec1_name1,$this->sec1_name2,$this->sec1_text);
		$update = $con->query($sql,$vars);
		
		
	}

	public function setIndex(){
		$con = new Conexao;
		$sec1 = "SELECT * FROM section1";
		$sec2 = "SELECT * FROM section2";
		$sec3school = "SELECT * FROM school ORDER BY data DESC";
		$sec3skills = "SELECT * FROM skills";
		$sec1social = "SELECT * FROM social";
		$sec4projects = "SELECT * FROM projects LEFT JOIN categoria ON `projects`.`cat_id` = `categoria`.`id_cat` LEFT JOIN projects_pic ON `projects`.`p_pic_id` = `projects_pic`.`pic_id` ";
		$ProjCategoria = "SELECT * FROM categoria"; 

		$projects_pictures= "SELECT * FROM projects_pic";
		
		$sec1 = $con->query($sec1);
		$sec1 = $sec1->fetch(\PDO::FETCH_ASSOC);
		//query da sessão 1
		$sec2 = $con->query($sec2);
		$sec2 = $sec2->fetch(\PDO::FETCH_ASSOC);
		//query da sessão 2

		$sec3school = $con->query($sec3school);
		$sec3school = $sec3school->fetch(\PDO::FETCH_ASSOC);


		//query da sessao 3 div school

		$sec3skills = $con->query($sec3skills);
		$sec3skills = $sec3skills->fetch(\PDO::FETCH_ASSOC);


		//query da sessao 3 div skills

		$sec4projects = $con->query($sec4projects);
		$sec4projects = $sec4projects->fetch(\PDO::FETCH_ASSOC);

		//query sessao 4
		$sec1social = $con->query($sec1social);
		$sec1social = $sec1social->fetch(\PDO::FETCH_ASSOC);
		
		//query pictures sessao 4
		$projects_pictures = $con->query($projects_pictures);
		$projects_pictures = $projects_pictures->fetch(\PDO::FETCH_ASSOC);

				self::setSec1Pic($sec1['picture']);
				self::setSec1Name1($sec1['first_name']);
				self::setSec1Name2($sec1['last_name']);
				self::setSec1Text($sec1['description']);
				self::setSec2Pic($sec2['picture']);
				self::setSec2TxtAbout($sec2['about']);
				self::setSec3School(['course'=>$sec3school['course_title'],'school'=> $sec3school['school'], 'status'=> $sec3school['status'],'date' => $sec3school['data']] );
				self::setSec3Skills(['title' => $sec3skills['skill_title'], 'status' => $sec3skills['status']]);
				//$indice = array($this->sec1_pic,$this->sec1_name1,$this->sec1_name2,$this->sec1_text);
				self::setSec1Social($sec1social);
				self::setSec4Projects([$sec4projects['p_id'],$sec4projects['p_title'],$sec4projects['p_desc'],$sec4projects['cat_id'],$sec4projects['p_url'],$sec4projects['p_tools'],$sec4projects['p_pic_id']]);
				self::setSec4PicProjects([$projects_pictures['pic_id'],$projects_pictures['pic_title'],$projects_pictures['pic_alt'],$projects_pictures['pic_url']]);
		// Getting the section 1 of database



	}
}


?>