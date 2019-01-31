<?php

abstract class ElementView extends AbstractView
{

    const ACTION_ADD = 'Add';
    const ACTION_EDIT = 'Edit';
    const ACTION_REMOVE = 'Remove';
    
    const PROPERTY_ELEMENT_KEY='element';
    
    
    protected $mode;
    protected $element;
    protected $parentView;
    protected $lessonId;
    
    protected $subViews;

    public function __construct($args, $parent)
    {
        parent::__construct($args);
        if ($parent instanceof ElementView){
            $this->lessonId=$parent->lessonId;   
        } else {
            if ($this->isEdition()) {
                $this->lessonId = $args['edit'];
            } else {
                $this->lessonId = $args['id'];
            }
        }
        $this->parentView=$parent;
        $this->element = $args[self::PROPERTY_ELEMENT_KEY];
        $this->subViews=array();
        foreach ($this->element->getSubElements() as $subElement) {
            $this->subViews[]=$this->getSubView($subElement);
        }
    }
    
    public function checkAllowed() {
        $parentLesson = LessonModel::getLessonParent($this->element);
        $parentMenu = GlobalModel::getElementParent($parentLesson);
        
        if(! RoleModel::isAllowed($parentMenu->getCode(),$parentLesson->getId())){
            $message = "NotAllowed";
            throw new TechnowebException($message, $message);
        }
        return true;
    }
    
    protected function getToolBar(){
        ?>
        <div class="toolbar">
            <a href="index.php?page=FacilitateurAddElement&parentId=<?php echo $this->getElement()->getId(); 
                ?>&sourceId=<?php echo $this->lessonId?>" >
                <button type="button" class="btn btn-outline-primary mr-1 btn-sm addElement" >
                    <i class="fa fa-plus"></i>
                </button>
            </a>
            <button type="button" class="btn btn-outline-primary mr-1 btn-sm removeElement" 
            	data-id="<?php echo $this->getElement()->getId(); ?>" 
            	data-type="<?php echo $this->getElement()->getElementType(); ?>" >
                <i class="fa fa-minus"></i>
            </button>
            <a href="index.php?page=FacilitateurAddElement&elementId=<?php echo $this->getElement()->getId(); 
                ?>&sourceId=<?php echo $this->lessonId?>" >
                <button type="button" class="btn btn-outline-primary mr-1 btn-sm editElement">
                    <i class="fa fa-edit"></i>
                </button>
            </a>
        </div>
        <?php
    }

    public function getHtml()
    {
        ?><div class='elementDiv' ><?php 
        if ($this->isEdition()) {
            $this->getToolBar();
        }           
        
        $this->render();
        ?></div><?php 
    }

    public function getOutlineHtml()
    {
        $this->renderOutline();
    }

    protected function getElement()
    {
        return $this->element;
    }

    protected function isEdition()
    {
        return isset($this->args['edit']);
    }

    protected function renderChildren()
    {
        logDebug('Element '.$this->element->getType().' -  HTML: '.$this->element->getId().', subElement: '.count($this->element->getSubElements()));
        $html = '';
        foreach ($this->subViews as $subView) {
            $html = $html.$subView->getHtml();
        }

        return $html;
    }

    protected function renderChildrenOutline()
    {
        logDebug('Element '.$this->element->getType().' - Outline: '.$this->element->getId().', subElement: '.count($this->element->getSubElements()));
        $html = '';
        foreach ($this->subViews as $subView) {
            $html = $html.$subView->getOutlineHtml();
        }

        return $html;
    }

    abstract protected function render();

    abstract protected function renderOutline();


    public function getModalHtml($action)
    {
        ob_start();
        $this->buildModalHtmlContent($action);
        $modalHtml = ob_get_contents();
        ob_end_clean();

        $modalHtml = str_replace("\n", "", $modalHtml);
        $modalHtml = str_replace("  ", "", $modalHtml);

        return $modalHtml;
    }

    abstract protected function buildModalHtmlContent($action);

    private function getSubView($subElementId)
    {
        $subElement = CacheElementsManager::getElement($subElementId);

        $subViewType = $subElement->getType().'View';
        $viewArg = array();
        $viewArg[ElementView::PROPERTY_ELEMENT_KEY] = $subElement;
        if ($this->isEdition()){
            $viewArg['edit'] = true;
        }
        $subView = new $subViewType($viewArg,$this);

        $this->jsFiles = array_merge($this->jsFiles, $subView->getJsFiles());
        $this->cssFiles = array_merge($this->cssFiles, $subView->getCssFiles());

        return $subView;
    }
    
}
