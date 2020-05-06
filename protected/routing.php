<?php
    if(!array_key_exists('P',$_GET) || empty($_GET['P']))
        $_GET['P'] = 'home';


    switch ($_GET['P']) {
        case 'home':
            require_once PROTECTED_DIR.'normal/home.php';
            break;

        case 'forum':
            IsUserLoggedIn() ?
            require_once PROTECTED_DIR.'forum.php' :
            header('Location: index.php');
            break;

        case 'new_post':
            IsUserLoggedIn() ?
            require_once PROTECTED_DIR.'posts/add.php' :
            header('Location: index.php');
            break;

        case 'login':
            !IsUserLoggedIn() ?
            require_once PROTECTED_DIR.'users/login.php' :
            header('Location: index.php');
            break;

        case 'register':
            !IsUserLoggedIn() ?
            require_once PROTECTED_DIR.'users/register.php' :
            header('Location: index.php');
            break;

        case 'logout':
            IsUserLoggedIn() ? UserLogout() : header('Location: index.php');
            break;
            
        default:
            require_once PROTECTED_DIR.'normal/404.php';
            break;
    }
    
?>