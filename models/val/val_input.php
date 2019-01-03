<?php

function validateFirstName($firstName)
{
    if (isStringBlank($firstName)) {
        return 'Please provide your name';
    } else if (!validateStringLength($firstName, 1, 50)) {
        return 'First Name is too Long';
    }
    return null;
}

function validateEmail($email)
{
    if ($email === false || isStringBlank($email)) {
        return 'A Valid Email Address is required';
    } else if (findEmail($email)) {
        return 'This email has already been used by someone else';
    }
    return null;
}

function validatePassword($password, $passwordConfirm)
{
    if (isStringBlank($password)) {
        return 'A Password is Required';
    } else if ($password != $passwordConfirm) {
        return 'Passwords do not match';
    } else if (strlen($password) < 6) {
        return 'Password must be at least 6 characters';
    } else if (strlen($password) > 60) {
        return 'Password must be less than 60 characters';
    } else {
        //need 2 out of 4 requirements
        $passedRequirements = 0;
        if (preg_match('/[A-Z]/', $password)) {
            $passedRequirements++;
        }

        if (preg_match('/[a-z]/', $password)) {
            $passedRequirements++;
        }

        if (preg_match('/[0-9]/', $password)) {
            $passedRequirements++;
        }

        if (preg_match('/[!@#\$%\^&\*]/', $password)) {
            $passedRequirements++;
        }

        if ($passedRequirements < 2) {
            return 'Password must have at least 2 of the following: UPPERCASE Leter, lowercase letter, number, symbol';
        }

    }
    return null;
}
