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
<div class="container-fluid mt-3">
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
				<td><a href="index.php?menu=Admin&page=Lessons&editLesson=<?php echo $code; ?>">Edit</a></td>
			</tr>
		<?php
        } ?>
		</tbody>
	</table>
</div>
<?php
    }
}
