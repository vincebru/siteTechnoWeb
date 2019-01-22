<?php 
	class ModalMenuView {

		public static function contactButtons($id) {
				if(UserModel::isConnected()) {
					$contacts = GlobalModel::getAll(Contact::class, ' where user_id = '.UserModel::getConnectedUser()->getId().' and main.parent_id = -1 and element_id = '.$id.' order by created DESC',null);
					$length = count($contacts);
					if ($length != 0) {
						echo <<<EOF
							<a data-toggle="modal" data-target="#listContact" id="number-$id" class="btn btn-sm btn-primary my-2 my-sm-0">$length</a>  
EOF;
					}
					echo <<<EOF
						<button data-toggle="modal" data-target="#addContact" id="ask-$id" content="$content" class="btn btn-sm btn-primary my-2 my-sm-0"><i class="fa fa-pencil"></i></button>
EOF;
				}
		}

		public static function addContactodal() {
			echo <<<EOF
			<div class="modal fade" id="addContact" tabindex="-1" role="dialog" aria-labelledby="addContactLabel" style="display: none;" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h2 class="modal-title" id="addContactLabel">Ask Question/Add note</h2>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
EOF;
			echo ContactFunctions::displayForm("inline", "none", true);
			echo <<<EOF
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary doAddContact">Ask a question</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								</div>
							</div>
						</div>
					</div>
EOF;
		}

		public static function listContactModal() {
			echo <<<EOF
								<div class="modal fade" id="listContact" tabindex="-1" role="dialog" aria-labelledby="listContactLabel" style="display: none;" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h2 class="modal-title" id="listContactLabel">Questions/Notes</h2>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
EOF;
		}
	}