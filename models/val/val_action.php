<?php

function validateSignupAdmin($username, $password, $passwordConfirm)
{
 $errorMsgs             = [];
 $errorMsgs['username'] = validateUsername($username);
 $errorMsgs['password'] = validatePassword($password, $passwordConfirm);

 return $errorMsgs;
}

function validateSignup($firstName, $email, $password, $passwordConfirm)
{
 $errorMsgs              = [];
 $errorMsgs['firstName'] = validateFirstName($firstName);
 $errorMsgs['email']     = validateEmail($email);
 $errorMsgs['password']  = validatePassword($password, $passwordConfirm);

 return $errorMsgs;
}
