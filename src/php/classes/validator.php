<?php

class Validator {

    protected static $EMAIL_VENDORS = ['gmail.com', 'yahoo.com', 'outlook.com', 'icloud.com', 'example.us'];

    protected static function returnResponse($isValid, $responseText) {
        return json_encode(['isValid' => $isValid, 'responseText' => $responseText]);
    }

    public static function validateEmail(string $value) {
        $isValid = true;
        $responseText = '';

        $atindex = strpos($value, '@');
        $vendor = substr($value, $atindex + 1);

        if(!in_array($vendor, self::$EMAIL_VENDORS)) {
            $isValid = false;
            $responseText = "We only accept these email providers: " . implode(', ', self::$EMAIL_VENDORS);
        }

        return self::returnResponse($isValid,$responseText);
    }

    public static function validatePassword(string $value) {
        $isValid = true;
        $responseText = '';

        if(strlen($value) < 8) {
            $isValid = false;
            $responseText .= "Password length can't be less than 8";
        }

        if(!preg_match('/[A-Z]/', $value)) {
            $isValid = false;
            if(!empty($responseText)){
                $responseText .= ', ';
            }
            $responseText .= "Need atleast 1 uppercase letter";
        }

        if (!preg_match('/[0-9]/', $value)) {

            $isValid = false;
            if(!empty($responseText)){
                $responseText .= ', ';
            }
            $responseText .= "Need atleast 1 number";
        }

        if (!preg_match('/[!@#$%^&*]/', $value)) {

            $isValid = false;
            if(!empty($responseText)){
                $responseText .= ', ';
            }
            $responseText .= "Need atleast 1 special character {!,@,#,$,%,^,&,*}";
        }

        return self::returnResponse($isValid,$responseText);

    }

    public static function validateName(string $value) {
        $isValid = true;
        $responseText = '';
        if($isValid = preg_match('/[^A-Za-z ]/', $value) || strlen($value) <= 0) {
            $responseText = 'Name is not valid, cannot have numbers or special characters';
        }
        return self::returnResponse(!$isValid,$responseText);
    }

    public static function validateAge(string $value) {
        $isValid = true;
        $responseText = '';
        if($value < 18 || $value > 60) {
            $isValid = false;
            $responseText = "You can't be younger than 18 or older than 60 to register";
        } 

        return self::returnResponse($isValid,$responseText);
    }
}