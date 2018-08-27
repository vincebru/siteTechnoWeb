<?php

//include utils
include_once("log.php");

//include dto

include_once("dto/DTO.php");
include_once("dto/MenuLink.php");
include_once("dto/Element.php");
include_once("dto/Rights.php");
include_once("dto/Role.php");
include_once("dto/SessionGroup.php");
include_once("dto/User.php");
include_once("dto/WorkGroup.php");
include_once("dto/elements/Paragraph.php");
include_once("dto/elements/Lesson.php");
include_once("dto/elements/Page.php");
include_once("dto/elements/Form.php");
include_once("dto/elements/Image.php");
include_once("dto/elements/Input.php");
include_once("dto/elements/Link.php");
include_once("dto/elements/Title.php");
include_once("dto/elements/Table.php");
include_once("dto/elements/TableRow.php");
include_once("dto/elements/TableCell.php");

include_once("view/AbstractView.php");
include_once("view/Contact.php");
include_once("view/CreateAccount.php");
include_once("view/Error.php");
include_once("view/LogoutForm.php");
include_once("view/LoginForm.php");
include_once("view/Main.php");
include_once("view/NotAllowed.php");
include_once("view/NewAccount.php");
include_once("view/Results.php");

include_once("view/model/ElementView.php");
include_once("view/model/ParagraphView.php");
include_once("view/model/LessonView.php");
include_once("view/model/PageView.php");
include_once("view/model/FormView.php");
include_once("view/model/ImageView.php");
include_once("view/model/InputView.php");
include_once("view/model/LinkView.php");
include_once("view/model/TitleView.php");
include_once("view/model/TableView.php");
include_once("view/model/TableLineView.php");
include_once("view/model/TableCellView.php");

//include model
include_once("model/CacheElementsManager.php");
include_once("model/GlobalModel.php");
include_once("model/RoleModel.php");
include_once("model/UserModel.php");
include_once("model/PageModel.php");
include_once("model/LessonModel.php");

include_once("utils/Config.php");

//include view
include ('view/Header.php');

