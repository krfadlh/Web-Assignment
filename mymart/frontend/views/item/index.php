<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Item\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>
	<p><?=LinkPager::widget([
		'pagination'=>$dataProvider->pagination
	])?> </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?= Html::a('Create Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
    <?php $data=$dataProvider->getModels();
           foreach($data as $key=>$value){
             ?>
               <div class="col-md-2" style="margin-top : 2%">
                 <div class="panel panel-default" style="text-align:center">
                   <div class="panel-heading">
                      <h3 class="panel-title"><?php echo $value->nama ; ?></h3>
                  </div>
                  <div class="panel-body">
             <img src="<?= Yii::$app->urlManagerBackend->baseUrl.'/'.$value->photo; ?>" style="height:100px;width : 100px;" class="image-responsive">
             <br><br>
               <h3 class="panel-title">price : <?php echo $value->price ; ?></h3>
               <br>
               
<!--               <button type="button" class="btn btn-primary ">Detail</button> -->
                <?= Html::a('Detail',['/item/view?id='.$value->id],['class'=>'btn btn-primary']) ?>
				<?= Html::a('Buy',['/ordered/index?id='.$value->id],['class'=>'btn btn-primary']) ?>
              <!--<button type="button" class="btn btn-success ">Buy</button>-->

            </div>
            </div>
           </div>
              <?php }
    ?>
</div>
