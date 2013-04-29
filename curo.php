<?php
require('config.php');
$curo=new curo;
$curo_url=new simpleUrl(BASE_URL);
//var_dump($curo_url->segment(2));

class simpleUrl{
    var $site_path;
     
    function __construct($site_path){
        $this->site_path = $this->removeSlash($site_path);
    }
     
    function __toString(){
        return $this->site_path;
    }
     
    private function removeSlash($string){
        if($string[strlen($string) - 1] == '/' )
            $string = rtrim($string, '/');
             
        return $string;
    }
     
    function segment($segment){
        $url = str_replace($this->site_path, '', $_SERVER['REQUEST_URI']);
        $url = explode('/', $url);
        if(isset($url[$segment]))
            return $url[$segment];
        else
            return false;
         
    }
}//end of curo clean url class
class curo{
	public $dbcon;
	public $dsn;
	private $user_admin;
	private $access_string;

	public function __construct(){//initial processes to do
		$this->dsn='mysql:host='.DB_HOST.';dbname='.DB_NAME.'';
		$this->dbcon=new PDO($this->dsn,DB_USER,DB_PASSWORD) or die($this->dbcon->errorInfo());
		$this->admin_session();
	}//initialization area
	
	private function admin_session(){
		session_start();	
		if(isset($_SESSION['userid_admin'])){
			$this->user_admin=$_SESSION['userid_admin'];
		}
	}
	
	public function access($access_field='access'){
		if(isset($this->user_admin)){//if admin has logged in
			if($this->user_admin==1){//if access level is administrator
					return $this->access_string="AND $access_field='4' OR $access_field='3' OR $access_field='2' OR $access_field='1'";
			}elseif($this->user_admin==2){//if access level is Editor

					return $this->access_string="AND $access_field='4' OR $access_field='3' OR $access_field='2'";
			}elseif($this->user_admin==3){//if access level is Registered
					return $this->access_string="AND $access_field='4' OR $access_field='3'";
			}else{//if access level is Public
					return $this->access_string="AND $access_field='4'";
			}
			
		}else{//if access level is Public
					return $this->access_string="AND $access_field='4'";
			}
		
	}
	public function create_slug($string){//replaces spaces between words with hyphens (Slugs)
	  $string=str_replace('&', 'and', $string);
   	  $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
   		return $slug;
	}
	
	public function str_short($string, $length = 80, $etc = '...',$break_words = false, $middle = false){//truncate string
	if ($length == 0)
		return '';
	
		if (strlen($string) > $length) {
			$length -= min($length, strlen($etc));
			if (!$break_words && !$middle) {
				$string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length+1));
			}
			if(!$middle) {
				return substr($string, 0, $length) . $etc;
			} else {
				return substr($string, 0, $length/2) . $etc . substr($string, -$length/2);
			}
		} else {
			return $string;
		}
	}
	
	public function get_url_id($string){
		$pid=explode('-',$string);
		return end($pid);
	}
	public function section_info($sectionid,$field=''){//Get section information in array
		$res=$this->dbcon->prepare("SELECT * FROM cu_sections WHERE id='$sectionid' OR alias='$sectionid'") or die($this->dbcon->errorInfo());
		$res->execute();
		if(empty($field)){
			return $row=$res->fetch(PDO::FETCH_ASSOC);
		}elseif(!empty($field)){
			$row=$res->fetch(PDO::FETCH_ASSOC);
			return $row[$field];
		}	
	}
	public function get_category_id($cat_slug){
		$res=$this->dbcon->prepare("SELECT * FROM cu_categories WHERE alias='$cat_slug'") or die($this->dbcon->errorInfo());
		$res->execute();
		 return $row['id'];
	}

	public function category_info($categoryid,$field=''){//Get category information in array
		$res=$this->dbcon->prepare("SELECT * FROM cu_categories WHERE id='$categoryid' OR alias='$categoryid'") or die($this->dbcon->errorInfo());
		$res->execute();
		if(empty($field)){
			return $row=$res->fetch(PDO::FETCH_ASSOC);
		}elseif(!empty($field)){
			$row=$res->fetch(PDO::FETCH_ASSOC);
			return $row[$field];
		}	
	}

	public function content_info($contentid,$field=''){//Get category information in array
		$res=$this->dbcon->prepare("SELECT * FROM cu_contents WHERE id='$contentid' OR content_alias='$contentid' AND published='published'") or die($this->dbcon->errorInfo());
		$res->execute();
		if(empty($field)){
			return $row=$res->fetch(PDO::FETCH_ASSOC);
		}elseif(!empty($field)){
			$row=$res->fetch(PDO::FETCH_ASSOC);
			return $row[$field];
		}	
	}
	
	public function access_info($access_id,$field=''){//get access information in array
		$res=$this->dbcon->prepare("SELECT * FROM cu_access WHERE access='$access_id'") or die($this->dbcon->errorInfo());
		$res->execute();
		if(empty($field)){
			return $row=$res->fetch(PDO::FETCH_ASSOC);
		}elseif(!empty($field)){
			$row=$res->fetch(PDO::FETCH_ASSOC);
			return $row[$field];
		}	
	}
	
	public function gallery_info($galleryid,$field=''){//Get category information in array
		$res=$this->dbcon->prepare("SELECT * FROM cu_gallery WHERE gallery_id='$galleryid'") or die($this->dbcon->errorInfo());
		$res->execute();
		if(empty($field)){
			return $row=$res->fetch(PDO::FETCH_ASSOC);
		}elseif(!empty($field)){
			$row=$res->fetch(PDO::FETCH_ASSOC);
			return $row[$field];
		}	
	}
	
	public function event_info($eventid,$field=''){//Get event information in array
		$res=$this->dbcon->prepare("SELECT * FROM cu_events WHERE event_id='$eventid'") or die($this->dbcon->errorInfo());
		$res->execute();
		if(empty($field)){
			return $row=$res->fetch(PDO::FETCH_ASSOC);
		}elseif(!empty($field)){
			$row=$res->fetch(PDO::FETCH_ASSOC);
			return $row[$field];
		}	
	}
	
	public function image_info($imageid,$field=''){//Get image information in array
		$res=$this->dbcon->prepare("SELECT * FROM cu_images WHERE image_id='$imageid'") or die($this->dbcon->errorInfo());
		$res->execute();
		if(empty($field)){
			return $row=$res->fetch(PDO::FETCH_ASSOC);
		}elseif(!empty($field)){
			$row=$res->fetch(PDO::FETCH_ASSOC);
			return $row[$field];
		}	
	}

	public function load_topmenu(){// Display  a list of main section
		$res=$this->dbcon->prepare("SELECT * FROM cu_sections WHERE section_show='1' AND main_nav='1' ".$this->access()." ORDER by ordering ASC") or die($this->dbcon->errorInfo());
		$res->execute();
		$count=$res->rowCount();
		if($count>0){
		while($row=$res->fetch(PDO::FETCH_ASSOC)){
				$topmenu[]=$row;
		}
		return $topmenu;
	}
					
	}//End load Top Menu
	
	
	public function sub_menu($section_id){//Diplay the sub menu of the main menu (sectoin)
		$res=$this->dbcon->prepare("SELECT * FROM cu_categories WHERE section_id='$section_id' AND category_show='1' ".$this->access()."") or die($this->dbcon->errorInfo());
		$sec=$this->section_info($section_id);
		$res->execute();
		$count=$res->rowCount();
		if($count>0){
			while($row=$res->fetch(PDO::FETCH_ASSOC)){
				$submenu[]=$row;
			}
		  return $submenu;
		}
	}
	
	public function slide_show(){//slide show
		$res=$this->dbcon->prepare("SELECT * FROM cu_slideshow WHERE slide_feature='1' AND slide_show='1' ".$this->access('slide_access')." ORDER by slide_order ASC") or die($this->dbcon->errorInfo());
		$res->execute();
		$count=$res->rowCount();
		if($count>0){
			while($row=$res->fetch(PDO::FETCH_ASSOC)){
				$slidehow[]=$row;
			}
		  return $slidehow;
		}
	}
	
	
}///end curo class
?>