<?php
/**
Именование файлов.
PSR-4 не будет поддерживаться.
https://github.com/darkvortek/testRep/blob/main/index.php#L2
Клиентский код реализован внутри класс Newsletter.
https://github.com/darkvortek/testRep/blob/main/index.php#L17
Нарушен принцип единственной ответственности.
https://github.com/darkvortek/testRep/blob/main/index.php#L63
https://github.com/darkvortek/testRep/blob/main/index.php#L27
https://github.com/darkvortek/testRep/blob/main/index.php#L39
Зависимости создаются не при инициализации объекта класса.
https://github.com/darkvortek/testRep/blob/main/index.php#L23
"Магическое" определение класса.
Нет указание типов свойств класса.
https://github.com/darkvortek/testRep/blob/main/Dto/userDto.php#L23
Наследование выбрано не оптимально. Инкапсулирует структуру данных ввиде (recipient, message, additional)
https://github.com/darkvortek/testRep/blob/main/Notifications/abstractNotification.php#L7
Результат передается в стандартный поток вывода.
Класс содержит свойства, которые не используются.
https://github.com/darkvortek/testRep/blob/main/Notifications/emailNotification.php#L10
Ничем не отличается от EmailNotification.
https://github.com/darkvortek/testRep/blob/main/Notifications/pushNotification.php#L10
Нарушен принцип открытости/закрытости класса.
https://github.com/darkvortek/testRep/blob/main/Notifications/notificationManager.php#L9
Изменение внутреннего состояния объекта не безопастно.
https://github.com/darkvortek/testRep/blob/main/Notifications/notificationManager.php#L19
Нарушен принцип единственной ответственности.
https://github.com/darkvortek/testRep/blob/main/Validators/notificationValidator.php#L5
Материалы:
https://habr.com/ru/post/280071/
https://habr.com/ru/post/309858/
https://habr.com/ru/company/avito/blog/335584/
https://habr.com/ru/post/422507/
https://habr.com/ru/post/489426/
https://habr.com/ru/post/526220/
https://habr.com/ru/company/otus/blog/567710/
https://habr.com/ru/post/463125/
https://habr.com/ru/company/ruvds/blog/426413/
https://habr.com/ru/post/92570/
 */

define( 'APP_DIR', __DIR__ );
define( 'TEMPLATE_DIR', APP_DIR . DIRECTORY_SEPARATOR . 'Templates' );

require_once 'helpers.php';
require_once 'autoloader.php';

$user_repository = new \Repositories\UserRepository();

$command = new \Commands\SendUserNotification($user_repository);
$command->process();
