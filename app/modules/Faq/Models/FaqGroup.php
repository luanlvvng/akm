<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Faq\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Uniqueness;

class FaqGroup extends Model {

    /**
     * Validations and business logic.
     *
     * @return bool
     */
    public function validation() {
        if ($this->_errorMessages === null) {
            $this->_errorMessages = [];
        }
        if (!$this->id) {
            $this->creation_date = $this->modified_date = time();
            if (!empty($this->name))
                $this->validate(new Uniqueness(['field' => 'name', 'message' => 'Tên nhóm đã tồn tại!']));
        } else {
            $this->modified_date = time();
        }
        $this->validate(new PresenceOf(['field' => 'name', 'message' => 'Vui lòng nhập tên nhóm!']));
        if (empty($this->slug) && !empty($this->name)) {
            $this->slug = \Custom\Util\String::stripAccents($this->name, '-');
        }
        return $this->validationHasFailed() !== true;
    }

}
