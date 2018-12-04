<?php 
/**
 * Admin view for editing the Multiple Choice function
 *
 * @author Grégoire Gaonach
 */
class MultipleChoiceDisplayView extends AbstractView{
    
    public function __construct($args)
    {

        parent::__construct($args);
        $this->cssFiles['updatedMultipleChoice'] = 'updatedMultipleChoice';

        $this->multipleChoice = MultipleChoiceModel::getMultipleChoiceFromId($args["multipleChoiceId"]);
        $this->questions      = MultipleChoiceQuestionsModel::getMultipleChoiceQuestionsList($args["multipleChoiceId"]);

        # Check if the user allready completed the Multiple Choice Exercice
        $this->answered       = MultipleChoiceModel::answered($args['multipleChoiceId'], UserModel::getCurrentId());

    }
    
    public function getHtml()
    {
    ?>

        <div class="container">
            <div class="jumbotron">

                <h2>Multiple Choice Exercice: <?= $this->multipleChoice->getName() ?> <span style="font-weight: normal; font-size: large;" class="badge badge-secondary">Lesson: <?= $this->multipleChoice->getLessonName() ?></span></h2>

                <p class="lead">Please, answer all thoses questions. Questions may have from one to multiple good answers. Good luck!</p>
                <hr class="my-4">

                <?php if ($this->answered): ?>

                  <p>Thanks for your answers! You can get your score below: </p>

                  <p class="score">
                    <?= sprintf("%.2f%%", MultipleChoiceUsersModel::getResults(UserModel::getCurrentId(), $this->multipleChoice->getId()) * 100); ?>
                  </p>

                <?php else: ?>

                  <form method='POST' action='index.php' id='MultipleChoiceDisplay'>
                    <input type='hidden' name='page' value='MultipleChoiceDisplay' />
                    <input type='hidden' name='sent' value='1' />
                    <input type='hidden' name='multipleChoiceId' value='<?php echo $this->multipleChoice->getId()?>' /> 

                    <?php foreach ($this->questions as $q): ?>
                      <div class="question">
                        <b>Question : <?= $q->getQuestion() ?></b>
                        <ul>
                          <?php foreach ($q->getAnswers() as $a): ?>
                            <li>
                              <input type="checkbox" name="answer-<?= $a->getId(); ?>" class="form-check-input" id="<?= $a->getId(); ?>">
                              <label class="form-check-label" for="<?= $a->getId(); ?>"><?= $a->getAnswer(); ?></label>
                            </li>
                          <?php endforeach ?>
                        </ul>
                      </div>
                    <?php endforeach ?>

                    <div class="form-group-buttons">
                        <a href="index.php?page=MenuLink&id=<?= $this->multipleChoice->getLessonId(); ?>" ><button type="button" class="btn btn-secondary">Cancel</button></a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="clear"></div>

                  </form>

                <?php endif ?>
  


            </div>
        </div>

    <?php    
    }
}