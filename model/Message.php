<?php
class Message{
    private $mss;
    private $class;

    public function __construct($mss, $class) {
        $this->mss = $mss;
        $this->class = $class;
    }

    public function getHtml(){
        return '<div class="alert alert-'.$this->class.' alert-dismissible fade show" role="alert">'
            .$this->mss
            .'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}
?> 