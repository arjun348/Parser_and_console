<?php
    $content = file_get_contents('https://www.tasteofhome.com/recipes/jalapeno-mac-and-cheese/');
    $htmlDom = new DOMDocument;
    @$htmlDom->loadHTML($content);
    $xpath = new DomXPath($htmlDom);
    
    $get_title = $xpath->query("//h1[@class='recipe-title']");
    foreach($get_title as $node){
        $title = $node->nodeValue;
    }
    echo "Title : ".$title."<br><br>";

    $get_image = $xpath->query("//*[@class='-image']");
    foreach($get_image as $node){
        $image_url = $node->getAttribute('src');
    }
    echo "Image URL : ".$image_url."<br><br>";

    $get_cooking_time = $xpath->query("//div[@class='recipe-time-yield__label-prep']");
    foreach($get_cooking_time as $node){
        $cooking_time = $node->nodeValue;
    }
    echo "Cooking time : ".$cooking_time."<br><br>";

    $get_servings = $xpath->query("//div[@class='recipe-time-yield__label-servings']");
    foreach($get_servings as $node){
        $servings = $node->nodeValue;
    }
    echo "Servings : ".$servings."<br><br>";
    
    $get_ingredients = $xpath->query("//ul[@class='recipe-ingredients__list recipe-ingredients__collection splitColumns']");
    foreach($get_ingredients as $node){
        $arr=$node->getElementsByTagName('li');
        foreach($arr as $item){
            $ingredients_array[] = $item->nodeValue;
        }
    }
    echo "Ingredients : ";
    print_r($ingredients_array);
    echo "<br><br>";

    $get_directions = $xpath->query("//ul[@class='recipe-directions__list']");
    foreach($get_directions as $node){
        $arr = $node->getElementsByTagName('li');
        foreach($arr as $item){
            $directions_array[] = $item->nodeValue;
        }
    }
    echo "Directions : ";
    print_r($directions_array);
?>