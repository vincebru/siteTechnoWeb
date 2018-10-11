<?php

abstract class AbstractAdminView extends AbstractView {
    
    
    protected function currentUrl() {
        $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
        $host     = $_SERVER['HTTP_HOST'];
        $script   = $_SERVER['SCRIPT_NAME'];
        $params   = $_SERVER['QUERY_STRING'];
                
        return $protocol . '://' . $host . $script . '?' . $params;
    }
    
	protected function buildModalHtml($action, $class)
	{
	    ?>
    <div class="modal fade" id="<?php echo $action.$class; ?>Modal" tabindex="-1" role="dialog" aria-labelledby="<?php echo $action.$class; ?>ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="<?php echo $action.$class; ?>ModalLabel"><?php echo $action.$class; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning alert-dismissible fade show d-none" role="alert">
						<strong>Something went wrong!</strong> Fail to save the <?php echo $class; ?>.
						<button type="button" class="close" data-hide="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
                    <?php 
                    if ($action == ElementView::ACTION_ADD && $class == 'Element'){
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
					<button type="button" class="btn btn-primary do<?php echo $action.$class; ?>">Submit</button>
				</div>
			</div>
		</div>
	</div>
	<?php
    }
}