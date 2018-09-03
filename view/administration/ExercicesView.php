<?php
class ExercicesView extends AbstractView
{
    protected $elements;

    public function __construct($args)
    {
        parent::__construct($args);
        $this->elements = LessonModel::getAllElementsForAdmin('Exercice');
    }

    public function getHtml()
    {
        ?>
<div class="container mt-3">
	<h2>Excercices List</h2>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Page name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($this->elements as $code => $label) {
            ?>
			<tr>
				<td><?php echo $label; ?></td>
				<td><a href="index.php?menu=Admin&page=Exercices&edit=<?php echo $code; ?>">Edit</a></td>
			</tr>
		<?php
        } ?>
		</tbody>
	</table>
</div>
<div class="container-fuild mt-3">
	<?php if (array_key_exists('edit', $this->args)) {
            $this->args['element'] = GlobalModel::getInstance(Element::TYPE_EXERCICE, $this->args['edit']);
            $view = new LessonView($this->args); ?>
	<div class="shadow-sm p-3 mb-5 bg-white rounded">
	<?php echo $view->getViewHtml(); ?>
	</div>
	<?php
        } ?>
</div>
<?php
    }
}
