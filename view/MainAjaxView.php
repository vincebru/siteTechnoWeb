<?php
class MainAjaxView extends AbstractView
{
    const MESSAGE_TO_DISPLAY_KEY='messageToDisplay';
    
    private $message;
    
    public function getHtml()
    {
        if (isset($this->args[self::MESSAGE_TO_DISPLAY_KEY])) {
            echo($this->args[self::MESSAGE_TO_DISPLAY_KEY]);
        }else {
            echo 'Ok';
        }
            
    }
    
    public function setMessage($message){
        $this->message=$message;
    }
    
}
