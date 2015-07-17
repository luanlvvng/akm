<?php

namespace Faq\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\PresenceOf;

class Faq extends Model {

    public function validation() {
        if ($this->_errorMessages === null) {
            $this->_errorMessages = [];
        }
        if (!empty($this->question)) {
            $this->slug = \Custom\Util\String::stripAccents($this->question, '-');
        }
        if (!is_numeric($this->dob)) {
            $this->dob = strtotime(intval($this->dob));
        }
        if (!is_numeric($this->featured)) {
            $this->featured = $this->featured == 'on' ? 1 :$this->featured;
        }
        if (!$this->id){
            $this->creation_date = $this->modified_date = time();
            if(!empty($this->question)) 
            $this->validate(new Uniqueness(['field' => 'question','message'=>'Câu hỏi này đã tồn tại!']));
        } else {
            $this->modified_date = time();
        }
        $this->validate(new PresenceOf(['field' => 'question','message'=>'Vui lòng nhập nội dung câu hỏi!']));
        return $this->validationHasFailed() !== true;
    }
}
