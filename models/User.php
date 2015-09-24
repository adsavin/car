<?php

namespace app\models;

use dektrium\user\models\User as BaseUser;
/**
 * Description of User
 *
 * @author Adsavin
 */
class User extends BaseUser implements \yii\web\IdentityInterface {

    public function getAuthKey() {
        return $this->auth_key;
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey) {
        return $this->auth_key === $authKey;
    }

    public static function findIdentity($id) {
        $user = self::find()->where("id=:id", [":id" => $id])->one();
        return $user ? new static($user) : null;
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        $user = self::find()->where("password_reset_token=:token", [":token" => $token])->one();
        return $user ? new static($user) : null;
    }

    public function validatePassword($password) {
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}
