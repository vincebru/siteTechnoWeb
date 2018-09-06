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
<?php
    }

    public function getEditHtml()
    {
        if (!array_key_exists('element', $this->args)) {
            $this->args['element'] = GlobalModel::getInstance(Element::TYPE_LESSON, $this->args['edit']);
        }
        $view = new LessonView($this->args); ?>
<div class="container-fuild mt-3">
	<div class="shadow-sm p-3 mb-1 bg-white rounded">
	<?php echo $view->getViewHtml(); ?>
	</div>
</div>
	<?php
    }

    public function getModals()
    {
        if (!array_key_exists('element', $this->args)) {
            $this->args['element'] = GlobalModel::getInstance(Element::TYPE_LESSON, $this->args['edit']);
        }

        $view = new LessonView($this->args);

        return $view->getModals();
    }
}
