## Run script local

1. Up docker compose:
    ```shell
    make up
    ```

2. Enter to the PHP container console:
    ```shell
    make exec-to-php-fpm
    ```

3. Run script:
    ```shell
    php send-notifications.php
    ```