<?php

namespace Admin\Controllers;

/**
 * @RoutePrefix("/admin/session", name="admin-session")
 */
class SessionAdminController extends \AdminControllerBase {

    public function initialize() {
        parent::initialize();
    }

    /**
     * index action.
     *
     * @return void
     *
     * @Route("/", methods={"GET"}, name="admin-session-index")
     */
    public function indexAction() {
        if (!$this->request->isPost()) {
            $this->tag->setDefault('email', '');
            $this->tag->setDefault('password', '');
        }
    }

    /**
     * Register an authenticated user into session data
     *
     * @param Users $user
     */
    private function _registerSession(Users $user) {
        $this->session->set('auth', array(
            'id' => $user->id,
            'name' => $user->name,
            'role' => $user->role
        ));
    }

    /**
     * index action.
     *
     * @return void
     *
     * @Route("/start", methods={"GET","POST"}, name="admin-session-start")
     */
    public function startAction() {
        if ($this->request->isPost()) {

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            try {
                $user = Users::findFirst(array(
                            "(email = :email: OR username = :email:) AND password = :password: AND active = 'Y'",
                            'bind' => array('email' => $email, 'password' => sha1($password))
                ));
            } catch (Exception $ex) {
                var_dump($ex);
            }
            if ($user != false) {
                $this->_registerSession($user);
                $this->flash->success('Welcome ' . $user->name);
                return $this->forward('/admin/index');
            }
            $this->flash->error('Wrong email/password');
        }
        return $this->forward('session_admin/index');
    }

    /**
     * index action.
     *
     * @return void
     *
     * @Route("/end", methods={"GET","POST"}, name="admin-session-end")
     */
    public function endAction() {
        $this->session->remove('auth');
        $this->flash->success('Goodbye!');
        return $this->forward('index/index');
    }

}
