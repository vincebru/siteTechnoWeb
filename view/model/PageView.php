<?php
class PageView extends ElementView
{
    protected function render()
    {
        if ($this->isEdition()) {
            ?>
        <div class="toolbar">
            <button type="button" class="btn btn-outline-primary mr-1 btn-sm addElement" data-id="<?php echo $this->getElement()->getId(); ?>" data-toggle="modal" data-target="#addElementModal">
                <i class="fa fa-plus"></i>
            </button>
            <button type="button" class="btn btn-outline-primary mr-1 btn-sm removePage" data-id="<?php echo $this->getElement()->getId(); ?>" data-toggle="modal" data-target="#removePageModal">
                <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-outline-primary mr-1 btn-sm editPage" data-id="<?php echo $this->getElement()->getId(); ?>" data-toggle="modal" data-target="#editPageModal">
                <i class="fa fa-edit"></i>
            </button>
        </div>
        <?php
        } ?>
        <div class="ul-container">
			<h2 id="page-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getContent(); ?></h2>
		</div>
        <?php echo $this->renderChildren(); ?>
        <?php
    }

    protected function renderOutline()
    {
        ?>
        <a class="nav-link ml-2" href="#page-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getContent(); ?></a>
        <nav class="nav nav-pills flex-column">
        <?php echo $this->renderChildrenOutline(); ?>
        </nav>
        <?php
    }

    private function getModalHtml()
    {
        ?>
        <div class="modal fade" id="addPageModal" tabindex="-1" role="dialog" aria-labelledby="addPageModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addPageModalLabel">Add Page</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning alert-dismissible fade show d-none" role="alert">
						<strong>Something went wrong!</strong> Fail to save the new page.
						<button type="button" class="close" data-hide="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form>
						<div class="form-group row">
							<label for="newPageTitle" class="col-sm-2 col-form-label">Title</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="newPageTitle" />
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary doAddPage">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="editPageModal" tabindex="-1" role="dialog" aria-labelledby="editPageModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editPageModalLabel">Edit Page</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning alert-dismissible fade show d-none" role="alert">
						<strong>Something went wrong!</strong> Fail to save the new page.
						<button type="button" class="close" data-hide="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label" for="editPageTitle">Title</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="editPageTitle" placeholder="Title"/>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary doEditPage">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="removePageModal" tabindex="-1" role="dialog" aria-labelledby="removePageModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="removePageModalLabel">Remove Page</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning alert-dismissible fade show d-none" role="alert">
						<strong>Something went wrong!</strong> Fail to remove the Lesson.
						<button type="button" class="close" data-hide="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<p>Remove the page?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary doRemovePage">Remove</button>
				</div>
			</div>
		</div>
	</div>
	<?php
    }
}
