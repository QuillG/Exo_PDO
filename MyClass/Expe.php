<?php
class Expe{
    public $id;
    public $name;
    public $content;
    public $date;
    
    
    
   public function getResume() {
        return substr($this->content, 0,1);

    }

    public function getDate() {
        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::SHORT);
        return $formatter->format($this->date);
    }
}



?>