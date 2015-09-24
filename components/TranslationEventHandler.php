<?php

/*

 */

namespace app\components;

use yii\i18n\MissingTranslationEvent;

/**
 * Description of TranslationEventHandler
 *
 * @author Adsavin
 */
class TranslationEventHandler {

    public static function handleMissingTranslation(MissingTranslationEvent $event) {
//        $event->translatedMessage = "@MISSING: {$event->category}.{$event->message} FOR LANGUAGE {$event->language} @";

        $source = new \app\models\SourceMessage();

        $exist = $source->find()->where("message=:message", [":message" => $event->message])->one();
        if (!$exist) {
            $source->category = $event->category;
            $source->message = $event->message;
            $source->save();
        }
    }

}
