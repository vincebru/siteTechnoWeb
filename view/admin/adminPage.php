<?php
$lessonList=LessonModel::getAllLessonsForMenu("lessons",null,null);
$exerciceList=LessonModel::getAllLessonsForMenu("exercices",null,null);
?>
Lesson List:
<table>
	<tr>
		<th>page name</th>
		<th>action</th>
	</tr>
	<?php foreach ( $lessonList as $code=>$label){ ?>
		<tr>
			<td><?php echo $code?></td>
			<td><a href="index.php?menu=admin&page=adminPage&editLesson=<?php echo $code?>">Edit</a></td>
		</tr>
	<?php } ?>
</table>
<!--Exercices List:
<table>
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

-->

<?php if(isset($_GET['editLesson'])){
	$lesson = LessonModel::getLessonWithPages($_GET['editLesson']);

	?>
	<div id='summary'>
		<ul>
		<?php 
		foreach ($lesson->getPageList() as $rank => $page) {
			echo "<li><a href='index.php?menu=admin&page=adminPage&editLesson=".$_GET['editLesson']
				."&lessonPageId=".$page->getId()."'>".$rank." - ".$page->getTitle()."</a></li>"; 
		}?>
	</ul>
	</div>


	<div id='pageName'><?php echo $lesson->getTitle();?><div>
<?php

}?>