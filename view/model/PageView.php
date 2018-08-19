<?php echo $this->type;

foreach($this->getSubElements() as $subElement){
	$subElement->getHtml();
}