<?php

function get_template(string $template, array $data = [])
{
    if (!empty($data)) {
        extract($data);
    }

    ob_start();

    require TEMPLATE_DIR . DIRECTORY_SEPARATOR . $template;

    return ob_get_clean();
}

function provider() {
    return Providers\AppProvider::getInstance();
}