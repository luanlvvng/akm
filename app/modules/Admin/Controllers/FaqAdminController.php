<?php

namespace Admin\Controllers;

/**
 * @RoutePrefix("/admin/faq", name="admin-faq")
 */
class FaqAdminController extends \AdminControllerBase {

    /**
     * index action.
     *
     * @return void
     *
     * @Route("/", methods={"GET"}, name="admin-faq-index")
     */
    public function indexAction() {
        $faq_list = \Faq\Models\Faq::find(array(
                    'order' => 'ord', 'limit' => array('number' => 20, 'offset' => 0)
        ));
        $this->view->faq_list = $faq_list->toArray();
    }

    /**
     * View faq details.
     *
     * @param string $slug.
     *
     * @return mixed
     *
     * @Get("/{id:[0-9]+}-{slug:[a-zA-Z0-9\-]+}", name="admin-faq-view")
     */
    public function viewAction($id, $slug) {
        $this->view->item = \Faq\Models\Faq::findFirst($id)->toArray();
    }

    /**
     * Create new faq.
     * @return mixed
     * @Route("/create", methods={"GET", "POST"}, name="admin-faq-create")
     */
    public function createAction() {
        $this->view->group_list = \Faq\Models\FaqGroup::find(array(
                    'conditions' => 'status > 0',
                    'order' => 'ord', 'limit' => array('number' => 100, 'offset' => 0)
                ))->toArray();
         $this->view->render("faq","edit");
        if (!$this->request->isPost() || !$form->isValid($this->request->getPost(), true)) {
            $id = $this->request->get('id');
            if ($id > 0) {
                $this->view->item = \Faq\Models\Faq::findFirst($id)->toArray();
            }
            
           
            return;
        }
        $item = new \Faq\Models\Faq();
        $item->assign($this->request->getPost());
        $user = $this->getCurrentUser();
        $item->user_id = $user['id'];
        if ($item->validation()) {
            $item->save();
            $this->flashSession->success('Cập nhật thành công!');
            return $this->response->redirect(['for' => 'admin-faq-index']);
        } else {
            foreach ($item->getMessages() as $msg)
                $this->flashSession->error($msg->getMessage());
        }
    }

    /**
     * Edit faq.
     * @param int $id Faq identity.
     * @return mixed
     * @Route("/edit/{id:[0-9]+}", methods={"GET", "POST"}, name="admin-faq-edit")
     */
    public function editAction($id) {
        if ($id < 1)
            return;
        $this->view->group_list = \Faq\Models\FaqGroup::find(array(
                    'conditions' => 'status > 0',
                    'order' => 'ord', 'limit' => array('number' => 100, 'offset' => 0)
                ))->toArray();
        $item = \Faq\Models\Faq::findFirst($id);
        if (!$this->request->isPost()) {
            if (!$item) {
                return $this->response->redirect(['for' => 'admin-faq-index']);
            }
            $this->view->item = $item;
            return;
        }
        $item->assign($this->request->getPost());
        $user = $this->getCurrentUser();
        $item->user_id = $user['id'];
        if ($item->save()) {
            $this->flashSession->success('Cập nhật thành công!');
            return $this->response->redirect(['for' => 'admin-faq-index']);
        } else {
            foreach ($item->getMessages() as $msg)
                $this->flashSession->error($msg->getMessage());
        }
        $this->view->item = $item;
    }

    /**
     * Delete faq.
     *
     * @param int $id Faq identity.
     *
     * @return mixed
     *
     * @Get("/delete/{id:[0-9]+}", name="admin-faq-delete")
     */
    public function deleteAction($id) {
        $item = \Faq\Models\Faq::findFirst($id);
        if ($item) {
            if ($item->delete()) {
                $this->flashSession->notice('Xóa thành công!');
            } else {
                $this->flashSession->error($item->getMessages());
            }
        }

        return $this->response->redirect(['for' => 'admin-faq-index']);
    }

    /**
     *
     * @return mixed
     *
     * @Get("/group", name="admin-faq-group-index")
     */
    public function groupIndexAction() {
        $this->view->group_list = \Faq\Models\FaqGroup::find(array(
                    'order' => 'ord', 'limit' => array('number' => 100, 'offset' => 0)
                ))->toArray();
    }

    /**
     * @Route("/group/edit/{id:[0-9]+}", methods={"GET", "POST"}, name="admin-faq-group-edit")
     */
    public function groupEditAction($id) {
        if ($id < 1)
            return;
        $item = \Faq\Models\FaqGroup::findFirst($id);
        if (!$this->request->isPost()) {
            if (!$item) {
                return $this->response->redirect(['for' => 'admin-faq-group-index']);
            }
            $this->view->item = $item;
            return;
        }
        $item->assign($this->request->getPost());
        $user = $this->getCurrentUser();
        $item->user_id = $user['id'];
        if ($item->validation()) {
            $item->save();
            $this->flashSession->success('Cập nhật thành công!');
            return $this->response->redirect(['for' => 'admin-faq-group-index']);
        } else {
            foreach ($item->getMessages() as $msg)
                $this->flashSession->error($msg->getMessage());
        }
        $this->view->item = $item;
    }

    /**
     * @Get("/group/delete/{id:[0-9]+}", name="admin-faq-group-delete")
     */
    public function groupDeleteAction($id) {
        $item = \Faq\Models\FaqGroup::findFirst($id);
        if ($item) {
            if ($item->delete()) {
                $this->flashSession->notice('Object deleted!');
            } else {
                $this->flashSession->error($item->getMessages());
            }
        }

        return $this->response->redirect(['for' => 'admin-faq-group-index']);
    }

}
