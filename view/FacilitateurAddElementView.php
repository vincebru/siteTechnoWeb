<?php

class FacilitateurAddElementView extends AbstractView
{
    
    public function getHtml()
    {
        $param = $this->args['inputParam'];
        echo "<form action='index.php' method='post'>".
            "<input type='hidden' name='page' value='FacilitateurAddElement' />".
            "<select  onchange='this.form.submit()' name='object'>";
        
        $objectList=array('Code','Input','Menu','Table','Title','Form','Lesson','Page','TableCell',
            'Image','Link','Paragraph','TableRow');
        foreach ($objectList as $object){
            echo "<option value='".$object."' ";
            if (isset($param['object']) && $param['object']==$object){
                echo " selected ";
            }
            echo ">".$object."</option>";
        }
        
        echo "</select>".
            "</form>";
        if (isset($param['object'])) {
            echo "<form action='index.php' method='post'>".
            "<input type='hidden' name='page' value='FacilitateurAddElement' />".
            "<input type='hidden' name='saveElement' value='true' />".
            "<input type='hidden' name='object' value='".$param['object']."' />";
            
            foreach ($param['object']::getFullPropertyNameList() as $property){
                
                switch ($property) {
                    case 'element_id':
                    case 'mime':
                    case 'rank':
                    case 'type':
                        break;
                    case 'parent_id':
                        echo "<br>".$property.":<input type='text' name='".$property."' value='6'>";
                        break;
                    case 'file':
                        echo "<br>".$property.":<input type='text' name='".$property."'/>";
                        break;
                    default:
                        echo "<br>".$property.":<input type='text' name='".$property."'/>";
                }            
                
                
            }
            
            
            echo "<br><input type='submit' /></form>";
        }
            
        if (isset($param['id'])){
            echo "<br>Element ".$param['id']." was added";
        }
    }
}