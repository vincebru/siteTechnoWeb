<?php
class AdminMenuView extends AbstractView
{
    protected $elements;
    protected $menu;
    
    const PROPERTY_MENU_ID = 'element_id';

    public function __construct($args)
    {
        parent::__construct($args);
        $this->cssFiles['admin'] = 'admin';
        $this->jsFiles['admin'] = 'admin';
        $this->menu=GlobalModel::getInstance(Element::TYPE_MENU,$args[self::PROPERTY_MENU_ID]);
        $this->elements = $this->menu->getSubElements();
    }
    
    
    

    public function getHtml()
    {
        $link = AdminMenuLinkView::getInstance($this->menu->getcode());
        ?>
        <div class="container mt-3">
        	<h2>Lessons List</h2>
        	<table class="table table-hover table-sm">
        		<thead>
        			<tr>
        				<th scope="col">#</th>
        				<th scope="col">Lessons names</th>
        				<th scope="col">Action</th>
        			</tr>
        		</thead>
        		<tbody>
        		<?php foreach ($this->elements as $idElement) {
        		    $subElement=CacheElementsManager::getElement($idElement);
        		    if ($subElement instanceof Lesson){
            		    $subId = $subElement->getId();
            		    $label = $subElement->getContent();
                        ?>
            			<tr>
            				<th scope="row"><?php echo $subId; ?></th>
            				<td><?php echo $label; ?></td>
            				<td>
            					<a href="<?php echo($link->getUrl())?>&code=<?php echo($this->menu->getCode())?>&edit=<?php echo $subId; ?>" class="btn btn-outline-primary mr-1 btn-sm" data-id="<?php echo $subId; ?>">
            						<i class="fa fa-edit"></i>
            					</a>
            					<button type="button" class="btn btn-outline-primary mr-1 btn-sm removeLesson" data-id="<?php echo $subId; ?>" data-toggle="modal" data-target="#removeLessonModal">
            						<i class="fa fa-minus"></i>
            					</button>
            				</td>
            			</tr>
        		<?php
        		    }
                } ?>
        		</tbody>
        	</table>
        </div>
        <?php

        if (isset($this->args['edit'])/*$this->isEditMode()*/) {
            $this->getEditHtml();
            $this->buildModalHtml(ElementView::ACTION_ADD, 'Element');
            $this->buildModalHtml(ElementView::ACTION_EDIT, 'Element');
            $this->buildModalHtml(ElementView::ACTION_REMOVE, 'Element');
                        
            logDebug($this->jsFiles);
        }
    }

    public function getEditHtml()
    {
        if (!array_key_exists(ElementView::PROPERTY_ELEMENT_KEY, $this->args)) {
            $this->args[ElementView::PROPERTY_ELEMENT_KEY] = GlobalModel::getInstance(Element::TYPE_LESSON, $this->args['edit']);
        }
        $view = new MenuView($this->args); ?>
        <div class="container-fuild mt-3">
        	<div class="shadow-sm p-3 mb-1 bg-white rounded">
        	<?php echo $view->getViewHtml(); ?>
        	</div>
        </div>
		<?php

		$this->jsFiles = array_merge($this->jsFiles, $view->getJsFiles());
		$this->cssFiles = array_merge($this->cssFiles, $view->getCssFiles());
	}
	
	
	private function buildModalHtml($action, $elementType)
	{
	    ?>
    <div class="modal fade" id="<?php echo $action.$elementType; ?>Modal" tabindex="-1" role="dialog" aria-labelledby="<?php echo $action.$elementType; ?>ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="<?php echo $action.$elementType; ?>ModalLabel"><?php echo $action.$elementType; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning alert-dismissible fade show d-none" role="alert">
						<strong>Something went wrong!</strong> Fail to save the <?php echo $elementType; ?>.
						<button type="button" class="close" data-hide="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
                    <?php 
                    if ($action == ElementView::ACTION_ADD){
                    ?>
                    <form>
                        <div class="form-group">
                            <label for="newElementType">Element Type</label>
                            <select class="form-control" id="newElementType">
                                <option id="NOT_THIS_ONE">--- Select ---</option>
                                <option>Code</option>
                                <option>Form</option>
                                <option>Image</option>
                                <option>Input</option>
                                <option>Link</option>
                                <option>Page</option>
                                <option>Paragraph</option>
                                <option>Table</option>
                                <option>TableCell</option>
                                <option>TableLine</option>
                                <option>Title</option>
                            </select>
                        </div>
                    </form>
                    <?php } ?>
                    <div id="actionForm"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary do<?php echo $action.$elementType; ?>">Submit</button>
				</div>
			</div>
		</div>
	</div>
	<?php
    }
	
}
