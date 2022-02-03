<?php

class Searching extends MainBase{
    public static function Searching(){
        
        $search = $_POST['search'];
        if (empty($search)) return;
        $conn = MainBase::conPDO();
        $sql = "select * from addresses where addresses_street_name like '%$search%'";
        $result = $conn->query($sql);
        $result = $result->fetchAll();
        if(isset($result) && !empty($result)) {
            if (count($result) > 0){
                
                echo '<table class="first">';
                echo '<tr class="kako">';
                echo "<td>Up to 30 km </td>";
                echo "<td>Up to 20 km </td>";
                echo "<td>up to 10 km </td>";
                echo "<td>less then 10 km </td>";
                echo "</tr>";
                    foreach($result as $res){
                         
                    $res1 = Distance::getDistanceFromLatLonInKm(55.7558,  37.6173 , $res["addresses_cord_x"], $res["addresses_cord_y"]);
    
                      $res1.'/n';
                    if($res1 > 30){
                            echo "<tr>";
                            echo "<td>".$res["addresses_street_name"]."&ensp;" ;
                            echo  $res1 . "km" ;
                            echo "</td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "</tr>";
                            // unset($res1);
                    }
                    elseif($res1 > 20){
                            echo "<tr>";
                            echo "<td></td>";
                            echo "<td>".$res["addresses_street_name"]."&ensp;" ;
                            echo  $res1 . "km" ;
                            echo "</td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "</tr>";
                            // unset($res1);
                    }
                    elseif($res1 > 10){
                            echo "<tr>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td>".$res["addresses_street_name"]."&ensp;" ;
                            echo  $res1  . "km";
                            echo "</td>";
                            echo "<td></td>";
                            echo "</tr>";
                            // unset($res1);
                    }
                    else{
                            echo "<tr>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td>".$res["addresses_street_name"]."&ensp;" ;
                            echo  $res1  . "km";
                            echo "</td>";
                            echo "</tr>";
                    }
            }  
                    } 
    } else {
            echo 'datark e axpers!!!';die;
    }
    echo "</table>";
    
    }
}

?>