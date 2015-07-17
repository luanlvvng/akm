<?php

namespace Faq\Controllers;

/**
 * @RoutePrefix("/tu-van", name="faq")
 */
class FaqController extends \ControllerBase {

    /**
     * index action.
     *
     * @return void
     *
     * @Route("/", methods={"GET"}, name="faq-index")
     */
    public function indexAction() {
        echo 'indexAction';
        try {
            $this->view->faq_hot_list = \Faq\Models\Faq::find()->toArray();
        } catch (Exception $ex) {
            var_dump('<pre />', $ex);
        }
    }

    /**
     * index action.
     *
     * @return void
     *
     * @Route("/danh-sach", methods={"GET"}, name="faq-list")
     */
    public function listAction() {
        $this->view->faq_hot_list = \Faq\Models\Faq::find(array(
                    'conditions' => 'featured = ?1',
                    'bind' => array(1 => 1),
                    'order' => 'like_count desc,ord', 'limit' => 100
                ))->toArray();
        $this->view->faq_list = \Faq\Models\Faq::find(array(
                    'conditions' => 'featured <> ?1',
                    'bind' => array(1 => 1),
                    'order' => 'ord', 'limit' => 100
                ))->toArray();
    }

    /**
     * View faq details.
     *
     * @param string $slug.
     *
     * @return mixed
     *
     * @Get("/{id:[0-9]+}-{slug:[a-zA-Z0-9\-]+}", name="faq-view")
     */
    public function viewAction($id, $slug) {
        $this->view->faq = \Faq\Models\Faq::findFirst(array(
                    'conditions' => 'slug =?1',
                    'bind' => array(1 => $slug),
                    'bindTypes' => array(\Phalcon\Db\Column::BIND_PARAM_STR)
                ))->toArray();
        $faq_list = \Faq\Models\Faq::find(array(
                    'conditions' => 'group_id = ?1 AND id !=?2',
                    'bind' => array(1 => $this->view->faq['group_id'], 2 => $this->view->faq['id']),
                    'order' => 'ord', 'limit' => 5
        ));
        $this->view->faq_list = $faq_list->toArray();
    }

    /**
     *  submit action.
     *
     * @return void
     *
     * @Route("/gui-cau-hoi", methods={"GET", "POST"}, name="faq-submit")
     */
    public function submitAction() {
        if (!$this->request->isPost()) {
            return;
        }
        $faq = new \Faq\Models\Faq();
        $faq->assign($this->request->getPost());
        $user = $this->getCurrentUser();
        $faq->user_id = $user['id'];
        $faq->group_id = 0;
        if ($faq->save()) {
            $this->flashSession->success('Cập nhật thành công!');
            return $this->response->redirect(['for' => 'faq-index']);
        } else {
            foreach ($faq->getMessages() as $msg)
                $this->flashSession->error($msg->getMessage());
        }
    }

    /**
     *  counter action.
     *
     * @return void
     *
     * @Post("/counter", name="faq-counter")
     */
    public function counterAction() {
        $id = $this->request->getPost('id');
        $op = $this->request->getPost('op');
        $faq = \Faq\Models\Faq::findFirst($id);

        if ($faq->id > 0) {
            var_dump($faq->featured);
            if ($op == 'like') {
                $faq->like_count = intval($faq->like_count);
                $faq->like_count++;
            } else {
                $faq->view_count = intval($faq->view_count);
                $faq->view_count++;
            }
            $faq->save();
            var_dump($faq->featured);
        }
        exit();
    }

}
