<?php 
/**
 * Admin view for editing the Multiple Choice function
 *
 * @author Grégoire Gaonach
 */
class AdminMultipleChoice extends AbstractAdminView{
    
    public function __construct($args)
    {

        parent::__construct($args);
        $this->cssFiles['updatedMultipleChoice'] = 'updatedMultipleChoice';

        $this->multipleChoiceList = MultipleChoiceModel::getMultipleChoiceList(False, 'created ASC');

    }

    public function checkAllowed() {
        if(!UserModel::isAdminConnectedUser()) {
            throw new TechnowebException('NotAllowed', 'NotAllowed');
        }
    }
    
    public function getHtml()
    {
    ?>

        <div class="container">
            <div class="jumbotron">

                <h2>Multiple Choice Editing</h2>

                <p class="lead">From this section you can create a new Multiple Choice exercice, edit one or juste delete it.</p>
                <hr class="my-4">

                <div class="form-group">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Lesson</th>
                          <th scope="col">Created</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($this->multipleChoiceList as $v): ?>
                            <tr>
                              <th scope="row">1</th>
                              <td><?= $v->getName() ?></td>
                              <td><?= $v->getLessonId() ?></td>
                              <td><?= $v->getCreatedEnhanced() ?></td>
                              <td>
                                    <a href="./index.php?page=MultipleChoiceEdit&multipleChoiceId=<?= $v->getId(); ?>&edit=true">
                                        <button type="button" class="btn btn-outline-primary mr-1 btn-sm"><i class="fa fa-pencil nested"></i> Edit <b>(TO DO)</b></button>
                                    </a>
                                    <a href="./index.php?page=MultipleChoiceResults&multipleChoiceId=<?= $v->getId(); ?>&session=1">
                                        <button type="button" class="btn btn-outline-primary mr-1 btn-sm"><i class="fa fa-signal nested"></i> Stats</button>
                                    </a>
                                    <a href="./index.php?page=MultipleChoiceDelete&multipleChoiceId=<?= $v->getId(); ?>" onclick="return confirm('Are you sure to delete the Multiple Choice ?')" >
                                        <button type="button" class="btn btn-outline-primary mr-1 btn-sm"><i class="fa fa-trash nested"></i> Delete <b>(TO DO)</b></button>
                                    </a>
                                    <a href="./index.php?page=MultipleChoiceDisplay&multipleChoiceId=<?= $v->getId(); ?>">
                                        <button type="button" class="btn btn-outline-primary mr-1 btn-sm"><i class="fa fa-eye nested"></i></button>
                                    </a>
                              </td>
                            </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                </div>

                <div class="form-group-buttons">
                    <a href="./index.php?page=MultipleChoiceEdit&edit=false">
                        <button type="button" class="btn btn-primary"><i class="fa fa-plus nested"></i> Create a new Mutliple Choice <b>(TO DO)</b></button>
                    </a>
                </div>
                <div class="clear"></div>

            </div>
        </div>

        <?php
        
    }
}