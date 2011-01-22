<?php
    $link = mysql_connect("localhost","root","");
    mysql_select_db("icwet",$link);
    $data = file_get_contents("data.csv");
    $data1 = explode("\n",$data);
    $bad_authors = array();
    foreach($data1 as &$line){
        $line = preg_replace("/[,]+/",",",$line);
        $array = explode(",",$line);
        unset($array[sizeof($array)-1]);
        foreach($array as $key => &$author){
            if($key == 0)
                continue;
            $query = "SELECT id FROM users WHERE LOWER(name) = '".trim(strtolower($author))."'";
            if($q = mysql_query($query)){
                $result = mysql_fetch_assoc($q);
                if(isset($result['id']))
                    $author = $result['id'];
                else{
                    $bad_authors[] = $author;
                    echo $author."<br />";
                }
            }
        }
        /*echo "<pre>";
        print_r($array);
        echo "</pre>";*/
        for($i = 1;$i < sizeof($array);$i++){
            echo "INSERT INTO author_paper VALUES (".$array[$i].",".$array[0].");<br />";
        }
    }
?>
<pre>
<?php ?>
</pre>