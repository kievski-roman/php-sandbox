<?php
class Validator
{
    public static function validateEmail($email): bool{
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    public static function validateAge($age):bool{
        return is_numeric($age) && (int)$age > 0 && (int)$age < 150;
    }
    public static function validateName($name):bool
    {
        return trim($name) !== '';
    }
}