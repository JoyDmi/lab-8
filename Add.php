<?php

class Add
{
    private string $email, $category, $title, $description;

    public function __construct(string $email, string $category, string $title, string $description)
    {
        $this->email = $email;
        $this->category = $category;
        $this->title = $title;
        $this->description = $description;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
}