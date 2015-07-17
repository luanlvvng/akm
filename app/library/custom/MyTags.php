<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyTag
 *
 * @author LUANLV
 */
namespace Custom;

class MyTags extends \Phalcon\Tag {

    public static function isAllowed($role, $controller, $action) {
        return (new \SecurityPlugin())->isAllowed($role, $controller, $action);
    }

}
