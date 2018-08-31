<?php
class LessonView extends ElementView {

    protected function render(){
        ?>
        <div class="row flex-xl-nowrap">
            <div class="col-xl-2 bd-sidebar">
                <nav id='summary' class="navbar navbar-light flex-column">
                    <span class="navbar-brand">
                        <a class="navbar-brand" href="#">Outline</a>
                    </span>
                    <nav class="nav nav-pills flex-column">
                    <?php echo $this->getOutlineHtml(); ?>
                    </nav>
                </nav>
            </div>
            <div class="col-xl-10 bd-content">
                <div data-spy="scroll" data-target="#summary" data-offset="0" id="lesson" class="lessonEdition">
                    <h1 id='lesson-<?php echo $this->getElement()->getId(); ?>'><?php echo $this->getElement()->getContent(); ?></h1>
                    <?php echo $this->renderChildren(); ?>
                </div>
            </div>
        </div>
        <?php
    }

    protected function renderOutline(){
        ?>
        <a class="nav-link active" href="#lesson-<?php echo $this->getElement()->getId(); ?>"><?php echo $this->getElement()->getContent(); ?></a>
        <nav class="nav nav-pills flex-column">
        <?php echo $this->renderChildrenOutline(); ?>
        </nav>
        <?php
    }
}
