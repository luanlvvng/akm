<?php

use Phalcon\Mvc\View;

class AdminControllerBase extends ControllerBase {

    protected function initialize() {
        $this->view->setViewsDir(APP_PATH . 'app/templates/admin/views/');
        $this->view->disableLevel(array(
            View::LEVEL_LAYOUT => true,
            View::LEVEL_MAIN_LAYOUT => true
        ));
        $this->view->current_user = $this->session->get('auth');
    }
}
