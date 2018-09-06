<?php

class AdminView extends AbstractView
{
    protected $modals;

    public function __construct($args)
    {
        parent::__construct($args);
        $this->elements = LessonModel::getAllElementsForAdmin('Lesson');
        $this->cssFiles['admin'] = 'admin';
        $this->jsFiles['admin'] = 'admin';
        $this->modals = array();
    }

    private function isEditMode()
    {
        return array_key_exists('edit', $this->args);
    }

    public function getHtml()
    {
        if (!PageModel::isAdminPage($this->args['page'])) {
            $mainPage = new MainView($this->args);
            $mainPage->getHtml();

            return;
        }

        $class = $this->args['page'].'View';
        $view = new $class($this->args);
        $view->getHtml();

        if ($this->isEditMode()) {
            $view->getEditHtml();
            $this->modals = $view->getModals();
            $this->getModalsHtml();
            $this->buildModalHtml('Add', 'Element');
            $this->buildModalHtml('Remove', 'Element');
        }
    }

    private function getModalsHtml()
    {
        foreach ($this->modals as $type => $actions) {
            foreach ($actions as $action) {
                $this->buildModalHtml($action, $type);
            }
        }
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
