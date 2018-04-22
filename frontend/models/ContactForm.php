<?php
/**
 * Copyright (c) 2018
 * cms Smetana
 * project: alt-money
 *
 */

namespace frontend\models;

use common\models\EmailForm;
use himiklab\yii2\recaptcha\ReCaptchaValidator;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $email;
    public $phone;
    public $message;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'required', 'on' => 'contact'],
            ['phone', 'required', 'on' => 'callback'],
            [['message'], 'required'],
            [['email', 'message', 'phone'], 'filter', 'filter' => 'strip_tags'],
            ['email', 'email'],
            [['message'], 'string', 'min' => 25, 'on' => 'contact'],
            [['message'], 'string', 'min' => 5, 'on' => 'callback'],
            ['phone', 'string', 'min' => 10],
            [['verifyCode'], ReCaptchaValidator::class]

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'phone' => Yii::t('app-model', 'Phone'),
            'message' => Yii::t('app-model', 'Message'),
            'verifyCode' => Yii::t('app-model', 'Verification Code')
        ];
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['contact'] = ['email', 'message', 'phone', 'verifyCode'];
        $scenarios['callback'] = ['email', 'message', 'phone', 'verifyCode'];
        return $scenarios;
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        $contact_form= new EmailForm();

        if(isset(Yii::$app->user) && !Yii::$app->user->isGuest)
            $contact_form->user_id= Yii::$app->user->id;

        $this->message= $this->message. '
        
        Email: '.$this->email . '
        '.Yii::t('app-model', 'Phone').': '.$this->phone;

        $contact_form->textBody=$this->message;
        $contact_form->subject="From contacts Page";
        $contact_form->setToEmail=$this->email? $this->email: Yii::$app->params['adminEmail'];
        $contact_form->setToName=$this->email? $this->email: Yii::$app->params['adminEmail'];
        $contact_form->setFromEmail=Yii::$app->params['supportEmail'];
        $contact_form->setFromName=Yii::$app->name;
        $contact_form->save();

        $result = Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([Yii::$app->params['supportEmail'] => 'С контактов'])
            ->setSubject(Yii::$app->name)
            ->setTextBody($this->message)
            ->send();
        //$result =  mail ( Yii::$app->params['adminEmail'], 'Заявка с сайта', $this->message);

        //$this->sendViber($this->message);

        $contact_form->status=$result;
        $contact_form->save();

        return $result;
    }

    /**
     * Send messages via Viber messenger
     *
     * requirements:
     * composer require bogdaan/viber-bot-php
     * composer require yii2mod/yii2-settings
     * and then Config !
     *
     * @param $message
     * @return bool
     *
    public function sendViber($message) {
        $settings = Yii::$app->settings;
        $apiKey = $settings->get('ViberForm', 'apiKey');
        $finance_list = explode(';',$settings->get('ViberForm', 'finance'));

        if(!$apiKey || !count($finance_list))
            return false;

        $botSender = new Sender([
            'name' => $settings->get('ViberForm', 'botName'),
            'avatar' => 'https://developers.viber.com/img/favicon.ico',
        ]);

        $bot = null;
        try {
            // create bot instance
            $bot = new Bot(['token' => $apiKey]);

            for($i=0; $i<count($finance_list); $i++) {
                $user_id= $finance_list[$i];

                $bot->getClient()->sendMessage(
                    (new \Viber\Api\Message\Text())
                        ->setSender($botSender)
                        ->setReceiver($user_id)
                        ->setText($message)
                );
            }

            return true;

        } catch (\Exception $e) {
            Yii::warning('Exception: '. $e->getMessage());
            if ($bot) {
                //Yii::warning('Actual sign: ' . $bot->getSignHeaderValue());
                //Yii::warning('Actual body: ' . $bot->getInputBody());
            }
            return false;
        }
    }*/
}
