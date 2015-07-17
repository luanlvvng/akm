<?php
namespace Faq\Controllers;
/**
 * @RoutePrefix("/admin/faq-group", name="admin-faqgroup")
 */
class FaqgroupAdminController extends \AdminControllerBase {

    /**
     * index action.
     *
     * @return void
     *
     * @Route("/", methods={"GET"}, name="admin-faqgroup-index")
     */
    public function indexAction() {
        $this->view->group_list = \Faq\Models\FaqGroup::find(array(
                    'order' => 'ord', 'limit' => array('number' => 100, 'offset' => 0)
        ))->toArray();
    }

    /**
     * View faq details.
     *
     * @param string $slug.
     *
     * @return mixed
     *
     * @Get("/{id:[0-9]+}-{slug:[a-zA-Z0-9\-]+}", name="admin-faqgroup-view")
     */
    public function viewAction($id, $slug) {
        $this->view->item = \Faq\Models\Faq::findFirst($id)->toArray();
    }

    /**
     * Create new faq.
     * @return mixed
     * @Route("/create", methods={"GET", "POST"}, name="admin-faqgroup-create")
     */
    public function createAction() {
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
        $item->save();

        $this->flashSession->success('New object created successfully!');

        return $this->response->redirect(['for' => 'admin-faqs']);
    }

    /**
     * Edit faq.
     * @param int $id Faq identity.
     * @return mixed
     * @Route("/edit/{id:[0-9]+}", methods={"GET", "POST"}, name="admin-faqgroup-edit")
     */
    public function editAction($id) {
        $item = Faq::findFirst($id);
        if (!$item) {
            return $this->response->redirect(['for' => 'admin-faqs']);
        }
        $this->view->item = $item;
        if (!$this->request->isPost()) {
            return;
        }
        $item->save();
        $this->flashSession->success('Object saved!');

        return $this->response->redirect(['for' => 'admin-faqs']);
    }

    /**
     * Delete faq.
     *
     * @param int $id Faq identity.
     *
     * @return mixed
     *
     * @Get("/delete/{id:[0-9]+}", name="admin-faqgroup-delete")
     */
    public function deleteAction($id) {
        $item = Faq::findFirst($id);
        if ($item) {
            if ($item->delete()) {
                $this->flashSession->notice('Object deleted!');
            } else {
                $this->flashSession->error($item->getMessages());
            }
        }

        return $this->response->redirect(['for' => 'admin-faqs']);
    }

}
