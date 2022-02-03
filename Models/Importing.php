<?php

class Importing extends MainBase{
    
    public static function importing(){
        if(isset($_FILES['file']['name']) &&  $_FILES['file']['name'] != '') 
        {
            $query = "
            INSERT INTO addresses 
            (addresses_id, addresses_address, addresses_street, addresses_street_name, addresses_street_type, addresses_adm, addresses_adm1, addresses_adm2, addresses_cord_y, addresses_cord_x) 
            VALUES(:addresses_id, :addresses_address, :addresses_street, :addresses_street_name, :addresses_street_type, :addresses_adm, :addresses_adm1, :addresses_adm2, :addresses_cord_y, :addresses_cord_x);
            ";
            
            $valid_extension = array('xml');
            $file_data = explode('.', $_FILES['file']['name']);
            $file_extension = end($file_data);
            if(in_array($file_extension, $valid_extension))
            {
                $data = simplexml_load_file($_FILES['file']['tmp_name']);
                //  
                $connect = MainBase::conPDO();

                $statement = $connect->prepare($query);
                for($i = 0; $i < count($data); $i++)
                {
                    $statement->execute(
                        array(
                            ':addresses_id'   => $data->addresses[$i]->addresses_id,
                            ':addresses_address'  => $data->addresses[$i]->addresses_address,
                            ':addresses_street'  => $data->addresses[$i]->addresses_street,
                            ':addresses_street_name' => $data->addresses[$i]->addresses_street_name,
                            ':addresses_street_type'   => $data->addresses[$i]->addresses_street_type,
                            ':addresses_adm'   => $data->addresses[$i]->addresses_adm,
                            ':addresses_adm1'   => $data->addresses[$i]->addresses_adm1,
                            ':addresses_adm2'   => $data->addresses[$i]->addresses_adm2,
                            ':addresses_cord_y'   => $data->addresses[$i]->addresses_cord_y,
                            ':addresses_cord_x'   => $data->addresses[$i]->addresses_cord_x,
                        )
                    );

                    
                }
            }
        }
    }
}

?>