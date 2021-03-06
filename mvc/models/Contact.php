<?php

class Contact
{
    private $id;
    private $email;
    private $comment;

    public function __construct(
        $email,
        $comment
    ) {
        $this->email      = $email;
        $this->comment    = $comment;
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getComment() {
        return $this->comment;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }
}