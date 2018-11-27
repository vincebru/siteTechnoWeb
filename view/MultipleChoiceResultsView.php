<?php 
/**
 * Admin view for editing the Multiple Choice function
 *
 * @author Grégoire Gaonach
 */
class MultipleChoiceResultsView extends AbstractView{
    
    public function __construct($args)
    {

        parent::__construct($args);
        $this->cssFiles['updatedMultipleChoice'] = 'updatedMultipleChoice';

        $this->multipleChoice = MultipleChoiceModel::getMultipleChoiceFromId($args["multipleChoiceId"]);
        $this->statistics     = MultipleChoiceUsersModel::getStatistics($args["multipleChoiceId"]);

    }
    
    public function getHtml()
    {
    ?>

        <div class="container">
            <div class="jumbotron">

                <h2>Multiple Choice Exercice: <?= $this->multipleChoice->getName() ?> <span style="font-weight: normal; font-size: large;" class="badge badge-secondary">Lesson: <?= $this->multipleChoice->getLessonName() ?></span></h2>

                <p class="lead">Please, answer all thoses questions. Questions may have from one to multiple good answers. Good luck!</p>
                <hr class="my-4">

                <?php foreach ($this->statistics as $q): ?>
                  <div class="question">
                    <b>Question : <?= $q->getQuestion() ?></b>
                    <ul>
                      <?php foreach ($q->getAnswers() as $a): ?>
                        <li>
                          <input type="checkbox" name="answer-<?= $a->getId(); ?>" class="form-check-input" id="<?= $a->getId(); ?>" disabled>
                          <label class="form-check-label" for="<?= $a->getId(); ?>">
                            <?= $a->getAnswer(); ?> 
                            <span class="badge <?= ($a->getResult()==true?"badge-success":"badge-warning") ?>">
                                <?= sprintf("%.2f%%", $a->getStats() * 100); ?>
                            </span>
                          </label>
                        </li>
                      <?php endforeach ?>
                    </ul>
                  </div>
                <?php endforeach ?>

                <div class="form-group-buttons">
                    <a href="index.php?page=MultipleChoiceList" ><button type="button" class="btn btn-secondary">Back to the admin page</button></a>
                </div>
                <div class="clear"></div>

            </div>
        </div>

    <?php    
    }
}