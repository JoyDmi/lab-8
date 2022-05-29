<?php

class MySQL
{
    private mysqli $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli('db', 'root', 'helloworld', 'web');
        if (mysqli_connect_errno())
            throw new mysqli_sql_exception();
    }
    public function saveAd(Ad $ad)
    {
        $statement = $this->mysqli->prepare("INSERT INTO ad (email, title, description, category) VALUES (?, ?, ?, ?)");
        $email = $ad->getEmail();
        $title = $ad->getTitle();
        $description = $ad->getDescription();
        $category = $ad->getCategory();

        if($statement->bind_param("ssss", $email, $title, $category, $description)===false || $statement->execute()===false || $statement->close()===false)
            throw new mysqli_sql_exception();

    }
    public function getAds()
    {
        $adsArr = [];
        if ($result = $this->mysqli->query('SELECT * FROM ad')){
            while($row = $result->fetch_assoc())
                $adsArr[] = new Ad($row["email"], $row["category"], $row["title"], $row["description"]);

            $result->close();
        }
        return $adsArr;
    }
    public function getCategories()
    {
        $categories = [];
        if ($result = $this->mysqli->query('SELECT category FROM categories')){
            while($row = $result->fetch_assoc())
                $categories[] = $row["category"];
            $result->close();
        }
        return $categories;
    }
}