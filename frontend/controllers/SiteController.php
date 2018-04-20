<?php
namespace frontend\controllers;

use frontend\models\Reserv;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionSitemap()
    {

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'application/xml');

        $items  = [];

       // $items = \worstinme\zoo\models\Items::find()->where(['state'=>1])->all();

        $urls = [
            [
                'loc' => ['/site/about'],
                'changefreq' => 'weekly',
                'priority' => 0.6,
            ],
        ];

        $data = $this->renderPartial('sitemap', [
            'items' => $items,
            'urls' => $urls,
        ]);

        return $data;

    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionReserv()
    {
        $model = new Reserv();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->mailer->compose()
                ->setTo(Yii::$app->params['adminEmail'])
                ->setFrom(Yii::$app->params['senderEmail'])
                ->setSubject('Заказ столика через сайт Манана')
                ->setHtmlBody($model->name.'<br>'.$model->phone.'<br>'.$model->email.'<br>'.$model->restoran.'<br>'.$model->booking_date.'<br>'.Yii::$app->formatter->asDate($model->created_at).'<br>'.$model->comment)
                ->send();

            Yii::$app->session->setFlash('reserved');
        }

        return $this->render('reserv',[
            'model'=>$model,
        ]);

    }

    public function actionCart() {

        return $this->render('cart');
    }
}
