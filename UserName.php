<?php


//DOWU = IDOWU
//IDOWU EBUNOLUWA = EBUNOLUWA IDOWU
//IDOWU EBUNOLUWA = IDOWU EBUNOLUWA
//IDOWU SARAH EBUNOLUWA = EBUNOLUWA IDOWU
//IDOWU EBUNOLUWA SARAH = SARAH, EBUNOLUWA IDOWU
//IDOWU EBUNOLUWA = EBUNOLUWA SARAH IDOWU

class UserName {
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function compareTo($value) {
        $isEqual = 0;
        $parts1 =  preg_split("/[\s,\.]+/", trim($this->value));
        $parts2 =  preg_split("/[\s,\.]+/", trim($value));

        if (count($parts1) < count($parts2)) {
            $buf = $parts1;
            $parts1 = $parts2;
            $parts2 = $buf;
        }

        for ($i = 0; ($i < count($parts1)) && (count($parts2) > 0) ; $i++) {
            $isEqual = in_array($parts1[$i], $parts2)? $isEqual + 1 : $isEqual;
        }

        return $isEqual == count($parts2);
    }

    public function __toString() {
        return $this->value;
    }
}


