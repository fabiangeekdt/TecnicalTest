<?php
/**
 * 	This class sorts the actor's movie data by an chronological order
 *
 * 	@author Fabian Moreno
 * 	@version 0.1
 * 	@date 08/09/2015	
 * 	@copyright Licensed under BSD (http://www.opensource.org/licenses/bsd-license.php)
 */
class OrderItem{
	
    //------------------------------------------------------------------------------
    // Class Variables
    //------------------------------------------------------------------------------
	
	private $_datatoorder;
   
    /**
    * 	Construct Class
    *
    * 	@param array $data An array with the data of the Person
    */
    public function __construct($_datatoorder){
        $this->_datatoorder = $_datatoorder;
    }
    
     /** 
     *  Get the actor's movie tittles and releases date 
     *
     *  @return array
     */
    public function getorder(){
        $arr_actedmovies = $this->_datatoorder;
        
        //sorting the array with the movie info data
        usort($arr_actedmovies,
            function ($a, $b) {
                $ad = new DateTime($a['releasedate']);
                $bd = new DateTime($b['releasedate']);
                
                if ($ad == $bd) {
                    return 0;
                }
                
                return $ad < $bd ? 1 : -1;
            }
        );
        
        //reverse the array so it can be watch in a descending order       
        return array_reverse($arr_actedmovies);;
    }         
}
?>