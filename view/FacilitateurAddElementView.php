<?php

class FacilitateurAddElementView extends AbstractView
{
    
    private $element;
    
    
    public function __construct($args)
    {
        parent::__construct($args);
        $this->element = null;
        if (isset($this->args['parentId'])){
            $this->args['parent_id'] = $this->args['parentId'];
        }
        if (isset($this->args["elementId"])){
            $this->element = GlobalModel::getElement($this->args["elementId"]);
            if (!isset($this->args['object'])) {
                $this->args['object'] = $this->element->getElementType();
            }
        }
    }
    
    private function getParamValue($paramKey){
        if ($this->element!=null && $this->element->get($paramKey,true) != null) {
            return $this->element->get($paramKey,true);
        } elseif (isset($this->args[$paramKey])){
            return $this->args[$paramKey];
        }
        return "";
    }
    
    public function getHtml()
    {
        if ($this->getParamValue("sourceId")!=""){
            echo "<a href='index.php?page=AdminMenuLink&edit=".$this->getParamValue("sourceId")."' >retour</a>";
        }
        $param = $this->args;        
        echo "<form action='index.php' method='post'>".
            "<input type='hidden' name='page' value='FacilitateurAddElement' />".
            "<input type='hidden' name='elementId' value='".$this->getParamValue("elementId")."' />".
            "<input type='hidden' name='sourceId' value='".$this->getParamValue("sourceId")."' />".
            "<input type='hidden' name='parent_id' value='".$this->getParamValue("parent_id")."' />".
            "<select  onchange='this.form.submit()' name='object'>";
        
        $objectList=array('Code','Input','InputFile','Menu','Table','Title','Ul','Li','Form','Lesson','Page','TableCell',
            'Image','File','IncludeCode','Link','Paragraph','TableRow');
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
            echo "<form action='index.php' method='post'  enctype='multipart/form-data'>".
            "<input type='hidden' name='page' value='FacilitateurAddElement' />".
            "<input type='hidden' name='saveElement' value='true' />".
            "<input type='hidden' name='elementId' value='".$this->getParamValue("elementId")."' />".
            "<input type='hidden' name='sourceId' value='".$this->getParamValue("sourceId")."' />".
            "<input type='hidden' name='object' value='".$param['object']."' />";
            
            foreach ($param['object']::getFullPropertyNameList() as $property){
                
                switch ($property) {
                    case 'element_id':
                    case 'mime':
                    case 'name':
                    case 'rank':
                    case 'type':
                        break;
                    case 'parent_id':
                        echo "<br>".$property.":<input type='text' name='".$property."' value='".$this->getParamValue("parent_id")."'>";
                        break;
                    case 'file':
                        echo "<br>".$property.":<input type='file' name='".$property."'/>";
                        break;
                    case 'level':
                        echo "<br>".$property.":<input type='number' name='".$property."' value='".$this->getParamValue("$property")."'/>";
                        break;
                    case 'content':
                        echo "<br>".$property.":<textarea name='".$property."' style='margin-top: 0px; margin-bottom: 0px; width: 800px;height: 238px;' >".
                            $this->getParamValue("$property")."</textarea>";
                        break;
                    default:
                        echo "<br>".$property.":<input type='text' name='".$property."' value='".$this->getParamValue("$property")."'/>";
                }            
                
                
            }
            
            
            echo "<br><input type='submit' /></form>";
        }
            
        if (isset($param['id'])){
            echo "<br>Element ".$param['id']." was added";
        }
    }
}