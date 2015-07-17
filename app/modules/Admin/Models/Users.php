<?php

namespace Admin\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;

class Users extends Model
{
    private static $_currentUser = null;
    public function validation()
    {
        $this->validate(new EmailValidator(array(
            'field' => 'email'
        )));
        $this->validate(new UniquenessValidator(array(
            'field' => 'email',
            'message' => 'Sorry, The email was registered by another user'
        )));
        $this->validate(new UniquenessValidator(array(
            'field' => 'username',
            'message' => 'Sorry, That username is already taken'
        )));
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }
    /**
     * Get current user
     * If user logged in this function will return user object with data
     * If user isn't logged in this function will return empty user object with ID = 0
     *
     * @return User
     */
    public static function getCurrentUser()
    {
        if (null === self::$_currentUser) {
            $di = new FactoryDefault();
            $identity = $di->get('session')->auth()->getIdentity();
            if ($identity) {
                self::$_currentUser = self::findFirst($identity);
            }
            if (!self::$_currentUser) {
                self::$_currentUser = new Users();
                self::$_currentUser->id = 0;
                self::$_currentUser->role_id = Role::getRoleByType(Acl::DEFAULT_ROLE_GUEST)->id;
            }
        }

        return self::$_currentUser;
    }
}
