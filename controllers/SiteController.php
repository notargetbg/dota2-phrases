<?php

namespace app\controllers;

use app\models\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;

use app\models\Phrases;

use linslin\yii2\curl;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'free-mt'],
                'rules' => [
                    [
                        'actions' => ['logout', 'signup', 'free-mt'],
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

    public function actionIndex()
    {

        $this->view->params['body_class'] = 'index-page';

        return $this->render('index', [
            'phrases' => Phrases::find()->all(),
            'most_liked_phrase' => Phrases::find()->orderBy(['likes'=>SORT_DESC])->one()
        ]);
    }

    public function actionLike()
    {
        $request = Yii::$app->request;

        if($request->post('id')) {
            $id = $request->post('id');
            $model = Phrases::findOne($id);

            // get the cookie collection (yii\web\CookieCollection) from the "response" component
            $cookies = Yii::$app->response->cookies;

            if (!isset($request->cookies[ $id.'_already_liked'] )) {
                // add a new cookie to the response to be sent
                $cookies->add(new \yii\web\Cookie([
                    'name' => $id.'_already_liked',
                    'value' => 1,
                    'expire' => time()+60*60*24*30*120
                ]));

                $model->likes = $model->likes + 1;

                $model->save();
                return $model->likes;

            } else {
                return $model->likes;
            }
        }
    }


    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionAbout()
    {
        return $this->render('about');
    }


    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }






}
