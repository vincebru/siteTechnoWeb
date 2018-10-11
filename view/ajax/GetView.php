<?php


class GetView extends AbstractView{
    
    
    public function getHtml(){
        $element = '{';
        $action;
        
        if (isset($refArray['action'])){
            // action could be Move/Patch/Delete
            $action = $refArray['action'];
        }
        if(!isset($id) || $id == ''){
            
            if($action == 'Describe') {
                if (class_exists($object)){
                    // http://localhost/sitetechnoweb/ajax.php?object=Lesson&action=Describe
                    //    {"type": "Lesson", "properties": ["content"]}
                    // http://localhost/sitetechnoweb/ajax.php?object=Image&action=Describe
                    //    {"type": "Image", "properties": ["width", "height", "mime", "file", "content"]}
                    $result = new $object(array());
                    
                    $element .= '"type": "' . $object . '", ';
                    $properties = $result->getComplementProperties();
                    $element .= '"properties": [';
                    if (is_array($properties) && count($properties) > 0){
                        foreach ($properties as $arrId => $arrValue){
                            $element .= '"' . $arrValue . '"';
                            if ($arrId < count($properties)){
                                $element .= ', ';
                            }
                        }
                    
                    }
                    $element .= '"content"]';
                }else{
                    $element .= '"error":"Unknown object type "' . $object . '"';
                }
            } else if($action == ElementView::ACTION_ADD){
                // http://localhost/sitetechnoweb/ajax.php?object=Lesson&action=Describe
                //    {"type": "Lesson", "popup": "<form><div class=\"form-group row\"><label for=\"Content\" class=\"col-sm-2 col-form-label\">Name<\/label><div class=\"col-sm-10\"><input type=\"text\" class=\"form-control\" id=\"Content\" \/><\/div><\/div><\/form>"}
                // http://localhost/sitetechnoweb/ajax.php?object=Image&action=Describe
                //    {"type": "Image", "popup": "<form><div class=\"form-group row\"><label for=\"Content\" class=\"col-sm-2 col-form-label\">Content<\/label><div class=\"col-sm-10\"><input type=\"file\" class=\"form-control\" id=\"Content\" \/><\/div><\/div><div class=\"form-group row\"><label for=\"Width\" class=\"col-sm-2 col-form-label\">Width<\/label><div class=\"col-sm-10\"><input type=\"text\" class=\"form-control\" id=\"Width\" \/><\/div><\/div><div class=\"form-group row\"><label for=\"Height\" class=\"col-sm-2 col-form-label\">Height<\/label><div class=\"col-sm-10\"><input type=\"text\" class=\"form-control\" id=\"Height\" \/><\/div><\/div><\/form>"}
                $viewArg = array();
                $viewArg[ElementView::PROPERTY_ELEMENT_KEY] = null;
                $viewArg['mode'] = ElementView::MODE_VIEW;
                $viewName = $object . 'View';
                $view = new $viewName($viewArg);
        
                $element .= '"type": "' . $object . '", ';
                $element .= '"popup": ' . json_encode($view->getModalHtml($action));
            }
        } else {
            $result = GlobalModel::getInstance($object, $id);
        
            if($action == ElementView::ACTION_EDIT || $action == ElementView::ACTION_REMOVE){
                // http://localhost/sitetechnoweb/ajax.php?object=Lesson&action=Edit&id=30
                //    {"type": "Lesson", "popup": "<form><div class=\"form-group row\"><label for=\"Content\" class=\"col-sm-2 col-form-label\">Name<\/label><div class=\"col-sm-10\"><input type=\"text\" class=\"form-control\" id=\"Content\"value=\"Real HTML\"\/><\/div><\/div><\/form>"}
                $viewArg = array();
                $viewArg[ElementView::PROPERTY_ELEMENT_KEY] = $result;
                $viewArg['mode'] = ElementView::MODE_VIEW;
                $viewName = $object . 'View';
                $view = new $viewName($viewArg);
        
                $element .= '"type": "' . $object . '", ';
                $element .= '"popup": ' . json_encode($view->getModalHtml($action));
            } else {
                // http://localhost/sitetechnoweb/ajax.php?object=Lesson&id=30
                //    {"element_id": "30", "type": "Lesson", "content": "Real HTML", "parent_id": "3", "rank": "4", "children": [31, 200, 38, 45, 220, 221, 222, 223, 57, 63, 698799100109110111112113114119120128140141144145146]}
                $properties = $result->getAllProperties();
                
                foreach ($properties as $id => $property){
                    $value = $result->get($property);
                
                    if (is_array($value)){
                        $arrayValue = '[';
                        foreach ($value as $arrId => $arrValue){
                            $arrayValue .= $arrValue;
                
                            if ($arrId < count($value)){
                                $arrayValue .= ', ';
                            }
                        }
                
                        $value = $arrayValue . ']';
                    }
                
                    $element .= '"' . $property . '": "' . $value . '"';
                    if ($id < count($properties) - 1){
                        $element .= ', ';
                    }
                }
                
                $subElements = $result->getSubElements();
                if (is_array($subElements) && count($subElements) > 0){
                    $element .= ', "children": [';
                    foreach ($subElements as $arrId => $arrValue){
                        $element .= $arrValue;
                
                        if ($arrId < count($subElements)){
                            $element .= ', ';
                        }
                    }
                
                    $element .= ']';
                }
            }
        }
        
        $element .= '}';    
        
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header('Content-Type: application/json; charset=utf-8');
        
        echo $element;
    }
}
