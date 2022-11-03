<?php

class Signup
{
    // ERROR VALUE --->
    private $error = ""; 

    public function evaluate($data)
    {
        foreach ($data as $key => $value)
        {
            // IF EMPTY ERROR --->
            if (empty($value))
            {
                $this->error = $this->error . $key ."is empty!<br>";
            }
        }
        if ($this->error == "")
        {
            // no error
            $this->create_user($data);
        }else{
            return $this->error;
        }
    }
    public function create_user($data)
    {
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $email = $data['email'];
        $password = $data['password'];

            // URL ADDRESS --->
        $url_address = strtolower($firstname) . "." . strtolower($lastname);
        $userid =  $this->create_userid();
        // my query ---->
        $query="insert into account (firstname,lastname,email,password,url_address,userid)
        values('$firstname','$lastname','$email','$password','$url_address','$userid')";
        // <-----
      
        // database connect --->
        $DB = new Database();
        $DB->save($query);
        // <-----
        return $query;
        
    }
    private function create_userid()
    {
        $length = rand(4,19);
        $number = ""; 
        for ($i=0; $i < $length; $i++){

            $new_rand = rand(0,9);

            $number = $number . $new_rand;
        }
        return $number;
    }
}
 
?>