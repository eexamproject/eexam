<?php 
    class validation
    {
    function validate_email($email)
    {
        if($email == null)
        {
            $email_error = "please enter email";
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $email_error = "please enter correct email";
        }
        else
        {
            return true;
        }
        return $email_error;
    }

    function validate_password($password)
    {
        if($password == null)
        {
            $password_error = "please enter password";
        }
        else if(strlen($password) != 6)
        {
            $password_error = "please enter correct password";
        }
        else
        {
            return true;
        }
        return $password_error;
    }
    static function validate_exam($input)
    {
        if($input == null)
        {
            $input_error = "ERROR IN STORING";
        }
        else
        {
            return true;
        }
        return $input_error;
    }
}
?>