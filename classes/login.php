<?php 

class Login
{
    private $error = "";


    public function evaluate($data)
    {
        $email = addslashes($data['email']);
        $password = addslashes($data['password']);
        // my query ---->
        $query="SELECT * FROM account WHERE email = '$email' limit 1 ";
        // <-----
        
        // database connect --->
        $DB = new Database();
        $result = $DB->read($query);
        // <-----
        if ($result)
        {
            $row = $result[0];

            if ($password == $row ['password'])
            {
                //session data
                $_SESSION['userid'] = $row['userid'];
            }
            else
            {
                $this->error .= "Wrong password <br>";
            } 
        }else
            {
                $this->error .= "No such email was found! <br>";
            }

        return $this->error;
    }
    public function check_login($id)
    {
        $query="SELECT userid FROM account WHERE userid = '$id' limit 1 ";
        // <-----
        
        // database connect --->
        $DB = new Database();
        $result = $DB->read($query);
        // <-----
        if ($result)
        {
            return true;
        }
        return false;
    }
    
}
?>