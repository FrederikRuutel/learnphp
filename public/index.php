<?php
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
}
function dump(...$vars)
{
    echo '<pre>';
    var_dump(...$vars);
    echo '</pre>';
}

spl_autoload_register(function ($class){
    $class = substr($class,4);
    $class = str_replace('\\', '/', $class);
    require_once __DIR__ . "/../src/$class.php";
});

use App\Router;

Router::addRoute('/', function() {
        $title = 'World';
        $posts = [
            [
                'title' => 'Some world title 1',
                'content' => 'Some world content 1',
                'date' => 'January 1, 2021',
                'author' => 'Pets',
            ],
            [
                'title' => 'Some world title 2',
                'content' => 'Some world content 2',
                'date' => 'January 2, 2021',
                'author' => 'Juss',
            ],
            [
                'title' => 'Some world title 3',
                'content' => 'Some world content 3',
                'date' => 'January 3, 2021',
                'author' => 'Alex',
            ],
            [
                'title' => 'Some world title 4',
                'content' => 'Some world content 4',
                'date' => 'January 4, 2021',
                'author' => 'Manivald',
            ],
        ];
        include __DIR__ . '/../views/index.php';
});

Router::addRoute('/us', function() {
        $title = 'U.S';
        $posts = [
            [
                'title' => 'Some U.S title 1',
                'content' => 'Some U.S content 1',
                'date' => 'January 1, 2021',
                'author' => 'Pets',
            ],
            [
                'title' => 'Some U.S title 2',
                'content' => 'Some U.S content 2',
                'date' => 'January 2, 2021',
                'author' => 'Juss',
            ],
            [
                'title' => 'Some U.S title 3',
                'content' => 'Some U.S content 3',
                'date' => 'January 3, 2021',
                'author' => 'Alex',
            ],
            [
                'title' => 'Some U.S title 4',
                'content' => 'Some U.S content 4',
                'date' => 'January 4, 2021',
                'author' => 'Manivald',
            ],
        ];
        include __DIR__ . '/../views/us.php';
});

$router = new Router($_SERVER['REQUEST_URI']);
$match = $router->match();
if ($match) {
    call_user_func($match['action']);
} else {
    echo '404';
}

// switch ($_SERVER['REQUEST_URI']) {
//     case '/':
//         $title = 'World';
//         $posts = [
//             [
//                 'title' => 'Some world title 1',
//                 'content' => 'Some world content 1',
//                 'date' => 'January 1, 2021',
//                 'author' => 'Pets',
//             ],
//             [
//                 'title' => 'Some world title 2',
//                 'content' => 'Some world content 2',
//                 'date' => 'January 2, 2021',
//                 'author' => 'Juss',
//             ],
//             [
//                 'title' => 'Some world title 3',
//                 'content' => 'Some world content 3',
//                 'date' => 'January 3, 2021',
//                 'author' => 'Alex',
//             ],
//             [
//                 'title' => 'Some world title 4',
//                 'content' => 'Some world content 4',
//                 'date' => 'January 4, 2021',
//                 'author' => 'Manivald',
//             ],
//         ];
//         include __DIR__ . '/../views/index.php';
//         break;
//     case '/us':
//         $title = 'U.S';
//         $posts = [
//             [
//                 'title' => 'Some U.S title 1',
//                 'content' => 'Some U.S content 1',
//                 'date' => 'January 1, 2021',
//                 'author' => 'Pets',
//             ],
//             [
//                 'title' => 'Some U.S title 2',
//                 'content' => 'Some U.S content 2',
//                 'date' => 'January 2, 2021',
//                 'author' => 'Juss',
//             ],
//             [
//                 'title' => 'Some U.S title 3',
//                 'content' => 'Some U.S content 3',
//                 'date' => 'January 3, 2021',
//                 'author' => 'Alex',
//             ],
//             [
//                 'title' => 'Some U.S title 4',
//                 'content' => 'Some U.S content 4',
//                 'date' => 'January 4, 2021',
//                 'author' => 'Manivald',
//             ],
//         ];
//         include __DIR__ . '/../views/us.php';
//         break;
//     default:
//         echo '404';
// }
