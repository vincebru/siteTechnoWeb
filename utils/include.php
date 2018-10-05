<?php

include_once("utils/Database.php");
//include utils
include_once 'log.php';

//include dto

include_once 'dto/utils/PropertyKey.php';

include_once 'dto/DTO.php';
include_once 'dto/Answer.php';
include_once 'dto/Element.php';
include_once 'dto/Rights.php';
include_once 'dto/Role.php';
include_once 'dto/SessionGroup.php';
include_once 'dto/User.php';
include_once 'dto/WorkGroup.php';
include_once 'dto/Contact.php';

include_once 'dto/elements/Code.php';
include_once 'dto/elements/Menu.php';
include_once 'dto/elements/Paragraph.php';
include_once 'dto/elements/Lesson.php';
include_once 'dto/elements/Page.php';
include_once 'dto/elements/Form.php';
include_once 'dto/elements/Image.php';
include_once 'dto/elements/Input.php';
include_once 'dto/elements/Li.php';
include_once 'dto/elements/Link.php';
include_once 'dto/elements/Title.php';
include_once 'dto/elements/Table.php';
include_once 'dto/elements/TableRow.php';
include_once 'dto/elements/TableCell.php';
include_once 'dto/elements/Ul.php';

include_once 'action/Action.php';
include_once 'action/WriteAction.php';
include_once 'action/FacilitateurAddElement.php';
include_once 'action/ajax/Delete.php';
include_once 'action/ajax/Move.php';
include_once 'action/ajax/Patch.php';
include_once 'action/ajax/Post.php';
include_once 'action/AddAccount.php';
include_once 'action/AddContact.php';
include_once 'action/Disconnect.php';
include_once 'action/Login.php';
include_once 'action/UpdatePassword.php';

include_once 'view/AbstractView.php';
include_once 'view/ContactView.php';
include_once 'view/CreateAccountForm.php';
include_once 'view/ErrorView.php';
include_once 'view/LogoutForm.php';
include_once 'view/LoginForm.php';
include_once 'view/MainView.php';
include_once 'view/NotAllowedView.php';
include_once 'view/NewAccountView.php';
include_once 'view/ResultView.php';
include_once 'view/UserView.php';
include_once 'view/FacilitateurAddElementView.php';
include_once 'view/ChangePasswordForm.php';
include_once 'view/ChangePasswordView.php';

include_once 'view/link/AbstractLinkView.php';
include_once 'view/link/AdminMenuLinkView.php';
include_once 'view/link/AdminLinkView.php';
include_once 'view/link/ContactLinkView.php';
include_once 'view/link/MenuLinkView.php';
include_once 'view/link/ResultLinkView.php';


include_once 'view/administration/AdminMenuView.php';


include_once 'view/ajax/GetView.php';
include_once 'view/model/ElementView.php';
include_once 'view/model/MenuView.php';
include_once 'view/model/CodeView.php';
include_once 'view/model/ParagraphView.php';
include_once 'view/model/PageView.php';
include_once 'view/model/FormView.php';
include_once 'view/model/ImageView.php';
include_once 'view/model/InputView.php';
include_once 'view/model/LiView.php';
include_once 'view/model/LinkView.php';
include_once 'view/model/TitleView.php';
include_once 'view/model/TableView.php';
include_once 'view/model/TableRowView.php';
include_once 'view/model/TableCellView.php';
include_once 'view/model/UlView.php';

//include model
include_once 'model/CacheElementsManager.php';
include_once 'model/GlobalModel.php';
include_once 'model/RoleModel.php';
include_once 'model/UserModel.php';
include_once 'model/PageModel.php';
include_once 'model/LessonModel.php';

include_once 'utils/Config.php';
include_once 'utils/TechnowebException.php';

//include view
include 'view/Header.php';
