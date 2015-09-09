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
	
	private $_args;
	
	/**
    * 	Construct Class
    *
    * 	@param array or string $_args  with the out data 
    */
	public function __construct(){
	}
	
	//public function __construct($_args){
	//	$this->_args = $_args;
	//}
	
	/** 
    *  Get the result echo for the client, this receive a string 
    *
    *  @return echo
    */
	public function getEchoNoResults(){
		echo '<center><h2><p>We´re sorry... The actor searched does not exist in the DataBase</p></h2></center>';
	}
	
	/** 
    *  Get the result echo for the client, this receive a array 
    *
    *  @return echo
    */
	public function getEchoResults($arrmsg){
		//$arrmsg = $this->_args;
		$date;
		if(is_array($arrmsg)){
			echo '</br><center><table>';
			foreach($arrmsg as $value){
				if(empty($value['releasedate'])){
					$date = 'No Release date found';
				}
				else{
					$date = $value['releasedate'];
				}
				echo '<tr>>';
				echo '<td><li>'. $value['movietitle'] .'</li></td> <td> realese: '. $date .'</td>';
				echo '</tr>';
			}
			echo '</center></table>';	
		}
	}
	
	/** 
    *  Get the formview for the client,  
    *
    *  @return echo
    */
	public function onInit(){
		echo '<center>
			<form method="post" id="search_form" >
				<label style="font-size:300%">ACTOR´s WEBSEARCH</label>
				</br></br>
				<li class="clearfix"> 
					<label for="actor">Actor´s name:</label>
					<input type="text" name="actor" id="actor"  placeholder="type the name of the actor you want to search."</input>
					<p id="actor_error" class="error">Please type a valid actor name</p>
				</li>
				</br></br>
				<li class="clearfix">
					<input type="submit" id="search_movies" value="Search"</input>
				</li>
			</form>
		</center>';
	}
}
?>