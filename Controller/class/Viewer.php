<?php
/**
 * 	This class handles the out messages for the client
 *
 * 	@author Fabian Moreno
 * 	@version 0.1
 * 	@date 08/09/2015	
 * 	@copyright Licensed under BSD (http://www.opensource.org/licenses/bsd-license.php)
 */
class Viewer{
	
	//------------------------------------------------------------------------------
    // Class Variables
    //------------------------------------------------------------------------------
	
	private $varHtml;
	
	/**
    * 	Construct Class
    *
    * 	@param none 
    */
	public function __construct(){
	}
	
	/** 
    *  Get the result echo for the client, this receive a string 
    *
    *  @return string
    */
	public function getEchoNoResults($args){
		switch($args){
			case 1:
				$varHtml = '<center><h2><p>We´re sorry... The actor searched does not exist in the DataBase</p></h2></center>';
				break;
			case 2:
				$varHtml = '<center><h2><p>The actor searched does not have a movie list in the DataBase</p></h2></center>';
				break;
			default:
				$varHtml = '<center><h2><p>Oops... something went wrong.</p></h2></center>';
		}
		//$varHtml = '<center><h2><p>We´re sorry... The actor searched does not exist in the DataBase</p></h2></center>'; 
		return $varHtml;
	}
	
	/** 
    *  Get the result echo for the client, this receive a array 
    *
    *  @return string
    */
	public function getEchoResults($arrmsg){
		$date;
		if(is_array($arrmsg)){
			$varHtml = '</br><center><table>'; 
			foreach($arrmsg as $value){
				if(empty($value['releasedate'])){
					$date = 'No Release date found';
				}
				else{
					$date = $value['releasedate'];
				}
				$varHtml .= '<tr>>';
				$varHtml .= '<td><li>'. $value['movietitle'] .'</li></td> <td> realese: '. $date .'</td>';
				$varHtml .= '</tr>';
			}
			$varHtml .= '</center></table>';
		}
		return $varHtml;
	}
	
	/** 
    *  Get the formview for the client,  
    *
    *  @return string
    */
	public function onInit(){
		$varHtml = '<center>';
		$varHtml .= '<form method="post" id="search_form" >';
		$varHtml .= '<label style="font-size:300%">ACTOR´s WEBSEARCH</label></br></br>';
		$varHtml .= '<li class="clearfix">';
		$varHtml .= '<label for="actor">Actor´s name:</label>';
		$varHtml .= '<input type="text" name="actor" id="actor"  placeholder="type the name of the actor you want to search."</input>';
		$varHtml .= '<p id="actor_error" class="error">Please type a valid actor name</p>';
		$varHtml .= '</li></br></br>';
		$varHtml .= '<input type="submit" id="search_movies" value="Search"</input>';
		$varHtml .= '</form></center>';
		return $varHtml;

	}
}
?>