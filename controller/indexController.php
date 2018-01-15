<?php 

include '../autoload.php';
use classes\Index;

$index = new Index;
$indexQuery = $index->setIndex();
$titulo= $index->getTitle();
$keywords=$index->getKeywords();
$description=$index->getDescription();
$author=$index->getAuthor();
$sec1_pic=$index->getSec1Pic();
$sec1_name1=$index->getSec1Name1();
$sec1_name2=$index->getSec1Name2();
$sec1_text=$index->getSec1Text();
$sec1_social=$index->getSec1Social();
$sec2_textabout=$index->getSec2TxtAbout();
$sec2_pic=$index->getSec2Pic();
$sec3_school= $index->getSec3School();
$sec3_skills = $index->getSec3Skills();
$sec4_projects = $index->getSec4Projects();
$result=array('site_title'=>$titulo,'site_keywords'=>$keywords,'site_description'=>$description,'site_author'=>$author,'sec1_pic'=>$sec1_pic,'sec1_name1'=>$sec1_name1,'sec1_name2'=>$sec1_name2,'sec1_txt'=>$sec1_text,'sec1_social'=>$sec1_social,'sec2_nametxt'=>$sec2_textabout,'sec2_pic'=>$sec2_pic,'sec3_school'=>$sec3_school,'sec3_skills'=>$sec3_skills,'sec4_projects'=>$sec4_projects);
echo json_encode($result);

 ?>