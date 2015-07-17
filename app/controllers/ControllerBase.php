<?php
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class ControllerBase extends Controller {

    protected function initialize() {
//        $this->view->setTemplateAfter('main');
        $this->view->disableLevel(array(
            View::LEVEL_LAYOUT => true,
            View::LEVEL_MAIN_LAYOUT => true
        ));
        $this->view->current_user = $this->session->get('auth');
    }

    protected function forward($uri) {
        $uriParts = explode('/', $uri);
        $params = array_slice($uriParts, 2);
        $this->dispatcher->setModuleName($uriParts[0]);
        return $this->dispatcher->forward(
                        array(
                            'module' => $uriParts[0],
                            'controller' => $uriParts[0],
                            'action' => $uriParts[1],
                            'params' => $params
                        )
        );
    }

    /**
     * @return Users
     */
    protected function getCurrentUser() {
        if (($auth = $this->session->get('auth'))) {
            return $auth;
        } else {
            return ['id' => 0, 'name' => '', 'role' => 'Guests'];
        }
    }

}
