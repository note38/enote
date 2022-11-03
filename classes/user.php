<?php
class User 
{
    public function get_data($id)
    {
        $query = "SELECT * FROM account WHERE userid = 'id' limit 1";
        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            $row = $result [0]; 
            return $row;
        }
        else
        {
            return false;
        }
    }
}

?>