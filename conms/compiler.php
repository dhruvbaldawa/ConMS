<?php
$link = mysql_connect("localhost", "root", "");
mysql_select_db("icwet", $link);
class QueryBuilder{
    public $_select;
    public $_tables;
    public $_conditions;

    function __construct(){
        $_select = array();
        $_tables = array();
        $_conditions = array();
    }

    function add_attributes($attr){
        if(is_array($attr)){
            for($i = 0;$i < sizeof($attr);$i++){
                if(@!in_array($attr[$i],$this->_select))
                    $this->_select[] = $attr[$i];
            }
        }else{
            if(@!in_array($attr,$this->_select))
                $this->_select[] = $attr;
        }
    }

    function add_tables($attr){
        if(is_array($attr)){
            for($i = 0;$i < sizeof($attr);$i++){
                if(@!in_array($attr[$i],$this->_tables))
                    $this->_tables[] = $attr[$i];
            }
        }else{
            if(@!in_array($attr,$this->_tables))
                $this->_tables[] = $attr;
        }
    }

    function add_conditions($attr){
        if(is_array($attr)){
            for($i = 0;$i < sizeof($attr);$i++){
                if(@!in_array($attr[$i],$this->_conditions))
                    $this->_conditions[] = $attr[$i];
            }
        }else{
            if(@!in_array($attr,$this->_conditions))
                $this->_conditions[] = $attr;
        }
    }

    function build_query(){
        //unset($this->_select[0]);
        //unset($this->_tables[0]);
        //unset($this->_conditions[0]);
        return "SELECT ".implode(",",$this->_select)." FROM ".implode(",",$this->_tables)." WHERE ".implode(" ",$this->_conditions);
    }
}

class Compiler {
    private $_illegal = false;
    private $_main_states;
    private $_states;
    private $_text;
    private $_rules;
    private $_words;
    private $_query;
    private $_current_main_state;
    private $_current_state;
    private $_previous_main_state;
    private $_previous_state;
    private $_error = false;
    private $_error_desc;

	function __construct() {
		$this->_main_states = '{"authors":{"state":"authors","valid_words":["authors","details","with"],"default_attributes":["id","name"],"tables":["users","authors"],"default_conditions":["1","AND users.id = authors.id"],"attributes":["id","name"],"references":["authors.id","users.name"]}}';
        $this->_states = '[{"id":0,"name":"get","transitions":[{"input":"authors","next_state":1}],"triggers":false,"final":false},{"id":1,"name":"authors","transitions":[{"input":"details","next_state":2},{"input":"with","next_state":5}],"triggers":true,"trigger_data":[{"type":"change_state","next_state":"authors"}],"final":true},{"id":2,"name":"details","transitions":[{"input":"(","next_state":3},{"input":"with","next_state":5}],"triggers":false,"final":true},{"id":3,"name":"attributes","transitions":[{"input":"","next_state":4}],"triggers":true,"trigger_data":[{"type":"attributes"}],"final":false},{"id":4,"name":"end_attributes","transitions":[{"input":"with","next_state":5}],"triggers":false,"final":true},{"id":5,"name":"with","transitions":[{"input":"(","next_state":6}],"triggers":false,"final":false},{"id":6,"name":"conditions","transitions":[{"next_state":7}],"triggers":true,"trigger_data":[{"type":"condition"}],"final":false},{"id":7,"name":"end_condition","transitions":[{"input":"having","next_state":8}],"triggers":false,"final":true}]';

	$this->_text = "get authors details";
        $this->_main_states = json_decode($this->_main_states);
        $this->_states = json_decode($this->_states);
        $this->_words = explode(" ",$this->_text);
        $this->_query = new QueryBuilder();
        $this->_current_main_state = "start";
        $this->_previous_main_state = "start";
        $this->_current_state = 0;
        $this->_previous_state = 0;
        $this->_error_desc = "No error found.";
    }

	public function process(){
	    if($this->_words[0] == "get"){
	        $this->go_to_main_state("authors");
            	$this->_current_state = 0;
	    }
	    else{
            	$this->_error = true;
            	$this->_error_desc = "The statement must begin with 'get'";
        	}
        	$i = 1;
        	while($i < sizeof($this->_words) && !$this->_error){
            		$checked = array();
            		for($j=0;$j<sizeof($this->_states[$this->_current_state]->transitions);$j++){
                		$checked[] = "'".$this->_states[$this->_current_state]->transitions[$j]->input."'";
                		if($this->_states[$this->_current_state]->transitions[$j]->input == $this->_words[$i]){
									
									//Checking for transitions from the current state.                    			
                    			$this->_previous_state = $this->_current_state;
                    			$this->_current_state = $this->_states[$this->_current_state]->transitions[$j]->next_state;
                    			echo $this->_words[$i]." done . Previous : ".$this->_previous_state." Current : ".$this->_current_state."<br />";
                    			break;
                		}
            		}
            		print_r($checked)."<br>";

						//Error if no transition found.            		
            		if($j == sizeof($this->_states[$this->_current_state]->transitions)){
                		$this->_error_desc = "Error parsing the string near '".$this->_words[$i]."'. '".$this->_words[$i]."' not expected. <br/>".implode(" or ",$checked)." expected.";
                		$this->_error = true;
            		}
            		$i++;
        	}
        	
        	//Complete if the state is final state.
        	if(isset($this->_states[$this->_current_state]->final) && !$this->_error){
            		//$this->go_to_main_state("end");
            		echo $this->_query->build_query();
        	}else{
            		echo $this->_error_desc;
        	}
        	
        	echo "<pre>";
        	print_r($this->_main_states);
        	print_r($this->_states);
        	echo "</pre>";
	}

    private function go_to_main_state($text){
	if(isset($this->_main_states->{$text})){
//Changing the main states
			$this->_previous_main_state = $this->_current_main_state;
			$this->_current_main_state = $text;
//Adding the attributes and conditions and stuff...
        	$this->add_attributes($this->_main_states->{$text}->default_attributes);
        	$this->_query->add_tables($this->_main_states->{$text}->tables);
        	$this->_query->add_conditions($this->_main_states->{$text}->default_conditions);
	}else{
		echo $text." not found.<br />";
		return false;
	}
        return true;
    }

    private function add_attributes($attr){			        
        if(is_array($attr)){
            $str = implode(",",$attr);
            $str = str_replace($this->_main_states->{$this->_current_main_state}->attributes,$this->_main_states->{$this->_current_main_state}->references,$str);
            echo $str."<br />";
        }else{
            $str = str_replace($this->_main_states->{$this->_current_main_state}->attributes,$this->_main_states->{$this->_current_main_state}->references,$str);
        }
        $str = explode(",",$str);
        $this->_query->add_attributes($str);
    }

    private function add_conditions($attr){
        if(is_array($attr)){
            $str = implode(",",$attr);
            $str = str_replace($this->_main_states->{$this->_previous_main_state}->attributes,$this->_main_states->{$this->_previous_main_state}->references,$str);
        }else{
            $str = str_replace($this->_main_states->{$this->_previous_main_state}->attributes,$this->_main_states->{$this->_previous_main_state}->references,$str);
        }
        $str = explode(",",$str);
        $this->_query->add_conditions($str);
    }

    private function is_legal($text){
        foreach($this->_rules->states->inputs as $a){
            if($text == $a){
                return true;
            }
        }
        return false;
    }

	public function get_error() {
		switch (json_last_error()) {
			case JSON_ERROR_DEPTH :
				return 'Maximum stack depth exceeded';
				break;
			case JSON_ERROR_CTRL_CHAR :
				return 'Unexpected control character found';
				break;
			case JSON_ERROR_SYNTAX :
				return 'Syntax error, malformed JSON';
				break;
			case JSON_ERROR_NONE :
				return 'No errors';
				break;
		}
	}
}
$compiler = new Compiler();
$compiler->process();

?>
