<?php

class Account 
{
    private $id;
    private $email;
    private $firstName;
    private $defaultView;
    private $theme;
    private $hideHints;
    private $creationTime;

    function __construct($id, $email, $firstName, $defaultView, $theme, $hideHints, $creationTime) {
        $this->id = $id;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->defaultView = $defaultView;
        $this->theme = $theme;
        $this->hideHints = $hideHints;
        $this->creationTime = $creationTime;
    }

    function get_id() {
        return $this->id;
    }

    function get_email() {
        return $this->email;
    }

    function get_firstName() {
        return $this->firstName;
    }

    function get_defaultView() {
        return $this->defaultView;
    }

    function get_theme() {
        return $this->theme;
    }

    function get_hideHints() {
        return $this->hideHints;
    }

    function get_creationTime() {
        return $this->creationTime;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_email($email) {
        $this->email = $email;
    }

    function set_firstName($firstName) {
        $this->firstName = $firstName;
    }

    function set_defaultView($defaultView) {
        $this->defaultView = $defaultView;
    }

    function set_theme($theme) {
        $this->theme = $theme;
    }

    function set_hideHints($hideHints) {
        $this->hideHints = $hideHints;
    }

    function set_creationTime($creationTime) {
        $this->creationTime = $creationTime;
    }


}

?>