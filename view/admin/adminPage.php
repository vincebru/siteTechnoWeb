<?php
$lessonList=LessonModel::getAllLessonsForMenu("lessons",null,null);
$exerciceList=LessonModel::getAllLessonsForMenu("exercices",null,null);
?>
<div class="container">
	<h2>Lesson List</h2>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Page name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ( $lessonList as $code=>$label){ ?>
			<tr>
				<td><?php echo $code?></td>
				<td><a href="index.php?menu=admin&page=adminPage&editLesson=<?php echo $code?>">Edit</a></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>

<?php if(isset($_GET['editLesson'])){
	$lesson = LessonModel::getLessonWithPages($_GET['editLesson']);
	?>
	<div class="shadow-sm p-3 mb-5 bg-white rounded">
		<div class="row pl-3">
			<div class="col-3 bg-light"> 
				<nav id='summary' class="navbar navbar-light flex-column">
					<span class="navbar-brand">
						<a class="navbar-brand" href="#">Lesson: <?php echo $_GET['editLesson'] ?></a>
						<button type="button" class="btn btn-outline-primary btn-sm addPage" data-id="<?php echo $lesson->getId(); ?>" data-toggle="modal" data-target="#addPageModal">
							<i class="fa fa-plus"></i>
						</button>
					</span>
					<nav class="nav nav-pills flex-column">
					<?php 
					$first = true;
					foreach ($lesson->getPageList() as $rank => $page) { ?>
						<a class="nav-link <?php if ($first) { echo "active"; $first = false; } ?>" href="#<?php echo $rank; ?>"><?php echo $rank . " - " . $page->getTitle(); ?></a>
					<?php }?>
					</nav>
				</nav>
			</div>
			<div class="col-9">
				<div data-spy="scroll" data-target="#summary" data-offset="0" class="lessonEdition">
					<h3 id='<?php echo $lesson->getTitle(); ?>'><?php echo $lesson->getTitle(); ?></h3>
					<?php 
					foreach ($lesson->getPageList() as $rank => $page) { ?>
					<h4 class="float-left" id='<?php echo $rank; ?>'><?php echo $rank . " - " . $page->getTitle(); ?></h4>
					<button type="button" class="btn btn-outline-primary mr-1 btn-sm float-right removePage" data-id="<?php echo $page->getId(); ?>" data-toggle="modal" data-target="#removePageModal">
						<i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-outline-primary mr-1 btn-sm float-right editPage" data-id="<?php echo $page->getId(); ?>" data-toggle="modal" data-target="#editPageModal">
						<i class="fa fa-edit"></i>
					</button>
					<p class="float-none"><?php echo $page->getContent(); ?></p>
					<?php }?>
				</div>
			</div>
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
							<strong>Something went wrong!</strong> Fail to save the new page.
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
	</div>
<?php } ?>
<?php if (!empty($exerciceList)) { ?>
	<h2>Exercices List</h2>
	<table class="table table-hover">
		<tr>
			<th>page name</th>
			<th>action</th>
		</tr>
	<?php foreach ( $exerciceList as $code=>$label){ ?>
		<tr>
			<td><?php echo $code?></td>
			<td><a href="index.php?menu=admin&page=adminPage&editLesson=<?php echo $code?>">Edit</a></td>
		</tr>
	<?php } ?>
	</table>
<?php } ?>
</div>
