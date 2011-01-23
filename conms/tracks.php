<?php
    $link = mysql_connect("localhost","root","");
    mysql_select_db("icwet",$link);
    $data = file_get_contents("tracks.csv");
    $data1 = explode(chr(13),$data);
    $bad_authors = array();
    foreach($data1 as &$line){
        $line = preg_replace("/[,]+/",",",$line);
        $array = str_getcsv($line,",","\"","\\");
        foreach($array as $key => &$track){
            if($key == 0)
                continue;
            $track = str_replace("\"","",$track);
            $query = "SELECT id FROM tracks WHERE LOWER(name) = '".trim(strtolower($track))."'";
            if($q = mysql_query($query)){
                $result = mysql_fetch_assoc($q);
                if(isset($result['id']))
                    $track = $result['id'];
                else{
                    $bad_tracks[] = $track;
                    echo $track."<br />";
                }
            }
        }
        echo "<pre>";
        //print_r($array);
        echo "</pre>";

        echo "UPDATE paper SET tracks_id = '".$array[1]."' WHERE id = '".$array[0]."';<br />";
    }
?>
<pre>
<?php ?>
</pre>