<?php

class ParseRecipes {

    private String $category;
    private String $path;
    public int $total;
    function __construct(String $category) {
        $this->category = $category;
        $this->path = __DIR__ . "/../recipes/" . $category;
        $this->total = sizeof($this->getFiles());
    }

    /*
        ParseRecipes->fiveRandom() 
        grab five random recipes; if there are less than 5, return the amount of 
        available recipes.
    */
    public function fiveRandom() {
        $files = scandir($this->path);
        $files = array_values(array_diff($files, array(".", "..")));
        $amount = ($this->total >= 5) ? 5 : $this->total;
        $picks = array_rand($files, $amount);
        if ($amount === 1)
            $picks = array($picks);
        for ($i = 0; $i < sizeof($picks); $i++) {
            $this->parsePost($this->path . "/" . $files[$picks[$i]]);
        }
    }

    private function getFiles() {
        $files = scandir($this->path);
        $files = array_diff($files, array(".", ".."));
        $file_arr = array();
        foreach ($files as $i) {
            if ($i != "." || $i != "..") {
                $f = fopen($this->path."/".$i, "r");
                array_push($file_arr, array($this->path."/". $i, fgets($f)));
                fclose($f);
            }
        }

        return $file_arr;
    }

    private function parsePost($file) {
        $file = fopen($file, "r");
        $element = "<div class='recipe_card'>";
        while(($line = fgets($file)) !== false) {
            if (preg_match("/^#/", $line)) {
                $element .= "<h1>" . str_replace("#", "", $line) . "</h1>";
            } else if (preg_match("/^##/", $line)) {
                $element .= "<h2>" . str_replace("##", "", $line) . "</h2>";
            } else if (preg_match("/^DATE\:/", $line)) {
                $element .= "<p> Created at: " . str_replace("DATE:", "", $line) . "</p>"; 
            } else {
                $element .= "<p>" . $line . "</p>";
            }
        }
        $element .= "</div>";
        fclose($file);
        echo $element;
    }

    public function search($word) {
        $find_files = $this->getFiles();
        $match = array();
        if ($word !== "") {
            for ($i = 0; $i < sizeof($find_files); $i++) {
                $check = preg_split("/[\s]+/", $find_files[$i][1]);
                for ($x = 0; $x < sizeof($check); $x++) {
                    if (strtolower($check[$x]) === strtolower($word)) {
                        array_push($match, $find_files[$i][0]);
                    }
                }
            }
            if (sizeof($match) > 0) {
                for ($i = 0; $i < sizeof($match); $i++) {
                    $this->parsePost($match[$i]);
                }
            }
        } else {
            echo "";
        } 
    }
}
