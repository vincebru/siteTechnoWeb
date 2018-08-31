<?php

// start session
session_start();

//include utils function
include 'utils/include.php';

// database connexion
//nothing todo, database connexion will be initialised when needed

// control on user
UserModel::init();
