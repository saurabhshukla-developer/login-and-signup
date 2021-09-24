<?php
class validateInput{
    public function validateEmail($email)
    {
        return (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) ? true : false;
    }

    public function validatePassword($password)
    {
        # code...
    }

    public function validateName($name)
    {
        return (preg_match ("/^[a-zA-z]*$/", $name) ) ? true : false;
    }

    public function validateContactNumber($contactNumber)
    {
        if(is_numeric($contactNumber) && strlen())
        return ;
    }
}

$validation = new validateInput();
$output = $validation->validateContactNumber(1);
print_r($output);