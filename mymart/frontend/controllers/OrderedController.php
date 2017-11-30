<?php

namespace frontend\controllers;

use Yii;
use common\models\Ordered\Ordered;
use common\models\Ordered\OrderedSearch;
use common\models\OrderedItem\OrderedItem;
use common\models\OrderedItem\OrderedItemSearch;
use common\models\customer\Customer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * OrderedController implements the CRUD actions for Ordered model.
 */
class OrderedController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ordered models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new OrderedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		$model = new Ordered();
		$customer = Customer::find()->where(['user_id'=>Yii::$app->user->identity->id])->One();
		$cek = Ordered::find()->where(['customer_id'=>$customer->id])->One();
		
		if(!$cek){
			$model->date = date('Y-m-d');
			$model->customer_id = $customer->id;
			$model->save();
		} else {
			$model = $cek;
		}
		

		//var_dump($model->getPrimaryKey()); die();
		
		$ordereditem = new OrderedItem(); 
		$ordereditem->item_id = $id;
		$ordereditem->ordered_id = $model->getPrimaryKey();
		$ordereditem->save();

		
		$query = OrderedItem::find()->where(['ordered_id' => $model->getPrimaryKey()]);
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);
		
		$searchModel = new OrderedItemSearch();
		
		return $this->render('view', [
			'model' => $this->findModel($model->getPrimaryKey()),
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel
		]);
    }

    /**
     * Displays a single Ordered model.
     * Displays a single Ordered model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ordered model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ordered();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }							
    }

    /**
     * Updates an existing Ordered model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ordered model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) 
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ordered model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ordered the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ordered::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
