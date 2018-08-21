<?php
class LessonView extends ElementView {

    protected function render(){
        ?>
        <div class="col-3 bg-light"> 
            <nav id='summary' class="navbar navbar-light flex-column">
                <span class="navbar-brand">
                    <a class="navbar-brand" href="#">Outline</a>
                </span>
                <nav class="nav nav-pills flex-column">
                <?php echo $this->renderChildrenOutline(); ?>
                </nav>
            </ul>
        </div>
        <div class="col-9">
            <div data-spy="scroll" data-target="#summary" data-offset="0" class="lessonEdition">
                <h2 id='lesson-<?php echo $this->getElement()->getId(); ?>'><?php echo $this->getElement()->getTitle(); ?></h2>
                <?php echo $this->renderChildren(); ?>
            </div>
        </div>
        <?php
    }

    protected function renderOutline(){
        return $this->renderChildrenOutline();
    }
}
