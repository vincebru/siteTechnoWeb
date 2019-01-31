<?php
class MainView extends AbstractView
{
    const MESSAGE_TO_DISPLAY_KEY='messageToDisplay';
    
    private $message;
    
    public function getHtml()
    {
        ?>
        <div class="container mt-3">
            <p>
            <?php if (isset($this->args[self::MESSAGE_TO_DISPLAY_KEY])) {
                echo($this->args[self::MESSAGE_TO_DISPLAY_KEY]);
            }else {
                echo 'This is the welcome (default) page.';
            }
                
                ?>
            
            
            </p>
        </div>
        <?php
    }
    
    public function setMessage($message){
        $this->message=$message;
    }
    
}
