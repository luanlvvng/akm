<?php

/**
 * Home controller.
 * @RoutePrefix("/gioi-thieu", name="about")
 */
class AboutController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('About us');
        parent::initialize();
    }

    /**
     * Home action.
     *
     * @return void
     *
     * @Route("/", methods={"GET"}, name="about-index")
     */
    public function indexAction() {
    }

}
