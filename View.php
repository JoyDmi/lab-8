<?php

class View
{
    public function renderAds(array $ads, array $categories)
    {
        $html = file_get_contents('index.html');
        $categoriesHtml = "";
        foreach ($categories as $category) {
            $categoriesHtml .= "<option value='$category'>$category</option>";
        }
        $html = str_replace('<!-- $CATEGORIES$ -->', $categoriesHtml, $html);
        $tableHtml = "";
        foreach ($ads as $ad) {
            $tableHtml .= "<tr> <td>" . $ad->getCategory() . "</td> <td>". $ad->getTitle() ." </td> <td>". $ad->getDescription() ." </td> <td> ". $ad->getEmail() ." </td> </tr>";
        }
        $html = str_replace('<!-- $TABLE$ -->', $tableHtml, $html);

        echo $html;
    }
}
