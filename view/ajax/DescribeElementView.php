<?php 
class DescribeElementView extends AbstractView {
    
    private $object;
    
    public function __construct($args)
    {
        parent::__construct($args);
        $this->object=$args['object'];
    }
    
    
    public function getHtml(){
        $object=$this->object;
        if (class_exists($object)){
            echo "<form id='elementForm' action='ajax.php' method='post'  enctype='multipart/form-data'>".
                "<input type='hidden' name='object' value='".$object."' />";
            
            foreach ($object::getFullPropertyNameList() as $property){
                switch ($property) {
                    case 'element_id':
                    case 'mime':
                    case 'name':
                    case 'rank':
                    case 'type':
                        break;
                    case 'parent_id':
                        if (isset($this->args['parentId'])){
                            echo "<input type='hidden' name='".$property."' value='".$this->args['parentId']."'>";
                        } else {
                            echo "<br>".$property.":<input type='text' name='".$property."' value='30'>";
                        }
                        break;
                    case 'file':
                        echo "<br>".$property.":<input type='file' name='".$property."'/>";
                        break;
                    case 'level':
                        echo "<br>".$property.":<input type='number' name='".$property."' value='2'/>";
                        break;
                    case 'content':
                        echo "<br>".$property.":<textarea name='".$property."' value='2' style='margin-top: 0px; margin-bottom: 0px; width: 400px;height: 238px;' ></textarea>";
                        break;
                    default:
                        echo "<br>".$property.":<input type='text' name='".$property."'/>";
                }
            }   
            echo "</form>";
        }        
    }
}
?>