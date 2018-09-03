<?php
class LessonsView extends AbstractView
{
    protected $elements;

    public function __construct($args)
    {
        parent::__construct($args);
        $this->elements = LessonModel::getAllElementsForAdmin('Lesson');
    }

    public function getHtml()
    {
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
		<?php foreach ($this->elements as $code => $label) {
            ?>
			<tr>
				<th scope="row"><?php echo $code; ?></th>
				<td><?php echo $label; ?></td>
				<td>
					<a href="index.php?menu=Admin&page=Lessons&edit=<?php echo $code; ?>" class="btn btn-outline-primary mr-1 btn-sm" data-id="<?php echo $code; ?>">
						<i class="fa fa-edit"></i>
					</a>
					<button type="button" class="btn btn-outline-primary mr-1 btn-sm removeLesson" data-id="<?php echo $code; ?>" data-toggle="modal" data-target="#removeLessonModal">
						<i class="fa fa-minus"></i>
					</button>
				</td>
			</tr>
		<?php
        } ?>
		</tbody>
	</table>
</div>
<div class="container-fuild mt-3">
	<?php if (array_key_exists('edit', $this->args)) {
            $this->args['element'] = GlobalModel::getInstance(Element::TYPE_LESSON, $this->args['edit']);
            $view = new LessonView($this->args); ?>
	<div class="shadow-sm p-3 mb-1 bg-white rounded">
	<?php echo $view->getViewHtml(); ?>
	</div>
	<!-- Modal -->
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

	<div class="modal fade" id="removeLessonModal" tabindex="-1" role="dialog" aria-labelledby="removeLessonModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="removeLessonModalLabel">Remove Lesson</h5>
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
					<p>Remove the lesson?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary doRemoveLesson">Remove</button>
				</div>
			</div>
		</div>
	</div>
	<?php
        } ?>
</div>
<?php
    }
}
