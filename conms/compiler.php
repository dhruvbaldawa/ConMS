<?php
$start_time = microtime(true);
// $link = mysql_connect("localhost", "root", "");
// mysql_select_db("icwet", $link);

/**
 *
 * Represents Query Builder class.
 *
 * It is used for building the SQL queries
 *
 */
class QueryBuilder {
/**
 *
 * @var array $_select
 * This variable is used to store the columns in SELECT clause.
 */
    public $_select;
/**
 *
 * @var array $_tables
 * This variable is used to store the tables in the FROM clause.
 */
    public $_tables;
/**
 *
 * @var array $_conditions
 * This variable stores the conditions in the WHERE clause.
 */
    public $_conditions;

/**
 *
 * Initialize the arrays
 */
    function __construct() {
        $_select = array();
        $_tables = array();
        $_conditions = array();
    }

/**
 * This function adds the attributes to the given query.
 *
 * @param $attr
 *   It can be a array or a single element.
 *   It consists of the attributes to add.
 */
    function add_attributes($attr) {
/**
 * @todo
 * Use PHP merge functions to simplify the process
 */
        if (is_array($attr)) {
            for ($i = 0; $i < sizeof($attr); $i++) {
                if (@!in_array($attr[$i], $this->_select))
                    $this->_select[] = $attr[$i];
            }
        }else {
            if (@!in_array($attr, $this->_select))
                $this->_select[] = $attr;
        }
    }

/**
 * This function adds the tables to the given query.
 *
 * @param $attr
 *   It can be a array or a single element.
 *   It consists of the tables to add.
 */
    function add_tables($attr) {
/**
 * @todo
 * Use PHP merge functions to simplify the process
 */
        if (is_array($attr)) {
            for ($i = 0; $i < sizeof($attr); $i++) {
                if (@!in_array($attr[$i], $this->_tables))
                    $this->_tables[] = $attr[$i];
            }
        }else {
            if (@!in_array($attr, $this->_tables))
                $this->_tables[] = $attr;
        }
    }

/**
 * This function adds the conditions to the given query.
 *
 * @param $attr
 *   It can be a array or a single element.
 *   It consists of the conditions to add.
 */
    function add_conditions($attr) {
/**
 * @todo
 * Use PHP merge functions to simplify the process
 */
        if (is_array($attr)) {
            for ($i = 0; $i < sizeof($attr); $i++) {
                if (@!in_array($attr[$i], $this->_conditions))
                    $this->_conditions[] = $attr[$i];
            }
        }else {
            if (@!in_array($attr, $this->_conditions))
                $this->_conditions[] = $attr;
        }
    }

/**
 * This function generates the SQL Query.
 *
 */
    function build_query() {
        return "SELECT " . implode(",", $this->_select) . " FROM " . implode(",", $this->_tables) . " WHERE " . implode(" ", $this->_conditions);
    }

}

/**
 *
 * Represents the class which generates the query
 */
class QueryGenerator {

/**
 *
 * @todo Make $_error_desc an array of errors
 *
 */
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

/**
 *
 * Initializes all the state variables and constants
 */
    function __construct() {
        // The main states metadata file
        $this->_main_states = '{"authors":{"state":"authors","valid_words":["authors","details","with"],"default_attributes":["id","name"],"tables":["users","authors"],"default_conditions":["1","AND users.id = authors.id"],"attributes":["id","name"],"references":["authors.id","users.name"]}}';

        // The transition states metadata file
        $this->_states = '[{"id":0,"name":"get","transitions":[{"input":"authors","next_state":1}],"triggers":false,"final":false},{"id":1,"name":"authors","transitions":[{"input":"details","next_state":2},{"input":"with","next_state":5}],"triggers":true,"trigger_data":[{"type":"change_state","next_state":"authors"}],"final":true},{"id":2,"name":"details","transitions":[{"input":"(","next_state":3},{"input":"with","next_state":5}],"triggers":false,"final":true},{"id":3,"name":"attributes","transitions":[{"input":"","next_state":4}],"triggers":true,"trigger_data":[{"type":"attributes"}],"final":false},{"id":4,"name":"end_attributes","transitions":[{"input":"with","next_state":5}],"triggers":false,"final":true},{"id":5,"name":"with","transitions":[{"input":"(","next_state":6}],"triggers":false,"final":false},{"id":6,"name":"conditions","transitions":[{"next_state":7}],"triggers":true,"trigger_data":[{"type":"condition"}],"final":false},{"id":7,"name":"end_condition","transitions":[{"input":")","next_state":7}],"triggers":false,"final":true}]';

        // The input text
        $this->_text = "get authors details ( asas jgjg hghg hggh ) with ( asdasd asdasd asdasd asasdasdasd )";

        // Converting into php objects
        $this->_main_states = json_decode($this->_main_states);
        $this->_states = json_decode($this->_states);

        // Getting the individual words or tokens from the text.
        // You can call this step as Lexical Analysis
        $this->_words = explode(" ", $this->_text);

        // Merging the tokens between ( and ) as a single token
        $i = 0;
        while ($i < sizeof($this->_words)) {
            if ($this->_words[$i] == "(") {
                $i++;
                $j = $i;
                while ($this->_words[$i] != ")") {
                    $this->_words[$j] = $this->_words[$j] . " " . $this->_words[$i];
                    unset($this->_words[$i]);
                    $i++;
                }
                //unset($this->_words[$i]);
            } else {
                $i++;
            }
        }
        ksort($this->_words);
        // End of Lexical Analysis

        // Creating the QueryBuilder class object
        $this->_query = new QueryBuilder();

        // Initializing the starting states and the state variables
        $this->_current_main_state = "start";
        $this->_previous_main_state = "start";
        $this->_current_state = 0;
        $this->_previous_state = 0;
        $this->_error_desc = "No error found.";
    }

/**
 * The actual processing of the input string is done
 * by this function
 */
    public function process() {
        // Checking for the first to be get

        if ($this->_words[0] == "get") {
            $this->go_to_main_state("authors");
            $this->_current_state = 0;
        } else {
            $this->_error = true;
            $this->_error_desc = "The statement must begin with 'get'";
        }

        // Parsing the string now
        foreach ($this->_words as $word) {
            echo "Current State : ". $this->_current_state. "<br />";
            $checked = array();

            // Serving the triggers
            if(!empty($this->_states[$this->_current_state]->triggers)){
                foreach($this->_states[$this->_current_state]->trigger_data as $data){
                    switch($data->type){
                        case 'change_state' :
                            $this->go_to_main_state($data->next_state);
                            break;
                        case 'attributes' :
                            $this->add_attributes($word);
                            break;
                        case 'condition' :
                            $this->add_conditions($word);
                            break;
                    }
                }
            }

            foreach ($this->_states[$this->_current_state]->transitions as $transition) {
                $checked[] = "'" . $transition->input . "'";

                // Checking for the input word and the next state
                if ($transition->input == $word && !empty($transition->input)) {

                    //Checking for transitions from the current state.
                    $this->_previous_state = $this->_current_state;
                    $this->_current_state = $transition->next_state;
                    echo $word . " done . Previous : " . $this->_previous_state . " Current : " . $this->_current_state . "<br />";
                    break;
                }

                // For null transitions
                else if (empty($transition->input) && !empty($transition->next_state)){
                    $this->_previous_state = $this->_current_state;
                    $this->_current_state = $transition->next_state;
                    echo $word . " done . Previous : " . $this->_previous_state . " Current : " . $this->_current_state . "<br />";
                    break;
                }
            }

            //Error if no transition found.
            if ($j == sizeof($this->_states[$this->_current_state]->transitions)) {
                $this->_error_desc = "Error parsing the string near '" . $word . "'. '" . $word . "' not expected. <br/>" . implode(" or ", $checked) . " expected.";
                $this->_error = true;
            }
        }

        //Complete if the state is final state.
        if (isset($this->_states[$this->_current_state]->final) && !$this->_error) {
            //$this->go_to_main_state("end");
            echo $this->_query->build_query();
        } else {
            echo $this->_error_desc;
        }

        echo "<pre>";
        print_r($this->_words);
        print_r($this->_main_states);
        print_r($this->_states);
        echo "</pre>";
    }

/**
 *
 * This function performs transition to a main state
 * @param string $text
 * @return boolean
 */
    private function go_to_main_state($text) {
        if (isset($this->_main_states->{$text})) {
            // Making a transition to the main state and changing the state variables
            $this->_previous_main_state = $this->_current_main_state;
            $this->_current_main_state = $text;

            // Adding the default attributes, tables and linking conditions for a state
            $this->add_attributes($this->_main_states->{$text}->default_attributes);
            $this->_query->add_tables($this->_main_states->{$text}->tables);
            $this->_query->add_conditions($this->_main_states->{$text}->default_conditions);
        } else {
            echo $text . " not found.<br />";
            return false;
        }
        return true;
    }

/**
 *
 * This method replaces the user attributes with the
 * database attributes and makes it available to the
 * QueryBuilder tool for execution
 *
 * @param array $attr
 *
 */
    private function add_attributes($attr) {
        if (is_array($attr)) {
            $str = implode(",", $attr);
            $str = str_replace($this->_main_states->{$this->_current_main_state}->attributes, $this->_main_states->{$this->_current_main_state}->references, $str);
            echo $str . "<br />";
        } else {
            $str = str_replace($this->_main_states->{$this->_current_main_state}->attributes, $this->_main_states->{$this->_current_main_state}->references, $attr);
        }
        $str = explode(",", $str);
        $this->_query->add_attributes($str);
    }

/**
 *
 * This method replaces the user attributes with the
 * database attributes and makes it available to the
 * QueryBuilder tool for execution
 *
 * @param array $attr
 *
 */
    private function add_conditions($attr) {
        if (is_array($attr)) {
            $str = implode(",", $attr);
            $str = str_replace($this->_main_states->{$this->_previous_main_state}->attributes, $this->_main_states->{$this->_previous_main_state}->references, $str);
        } else {
            $str = str_replace($this->_main_states->{$this->_previous_main_state}->attributes, $this->_main_states->{$this->_previous_main_state}->references, $attr);
        }
        $str = explode(",", $str);
        $this->_query->add_conditions($str);
    }

 /**
 *
 * This method checks whether the input is legal or not
 *
 * @param array $attr
 *
 */
    private function is_legal($text) {
        foreach ($this->_rules->states->inputs as $a) {
            if ($text == $a) {
                return true;
            }
        }
        return false;
    }

/**
 *
 * This method gives an error, in case of error during parsing JSON queries
 *
 */
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

$generator = new QueryGenerator();
$generator->process();

// Get the execution time
echo "Execution time : <b>". (microtime(true) - $start_time) ."</b> ms";
?>