<?php

class ParseRecipies {

    private String $category;
    function __construct(String $category) {
        $this->category = $category;
    }

    public function lastFive() {
        $files = opendir(__DIR__ . "/../recipes/" . $this->category);
        $amount = (sizeof($files) >= 5) ? 5 : sizeof($files);
        $rndfiles = array_rand($files, $amount);
        for ($i = 0; $i < $amount; $i++) {
            $this->parsePost($files[$i]);
        }
    }

    private function getFiles() {
        $path = __DIR__ . "/../recipes/" . $this->category;
        $files = scandir($path);
        $files = array_diff($files, array(".", ".."));
        $file_arr = array();
        foreach ($files as $i) {
            if ($i != "." || $i != "..") {
                $f = fopen($path."/".$i, "r");
                array_push($file_arr, array($path."/". $i, fgets($f)));
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
        for ($i = 0; $i < sizeof($find_files); $i++) {
            if (stripos(strtolower(str_replace("-", " ", $find_files[$i][1])), $word) !== false) {
                array_push($match, $find_files[$i][0]);
            }
        }

        if (sizeof($match) > 0) {
            for ($i = 0; $i < sizeof($match); $i++) {
                $this->parsePost($match[$i]);
            }
        }
    }
}
