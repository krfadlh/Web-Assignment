<?php
	namespace common\components;
	use yii\base\component;
	use frontend\models\Statistic;
	use Yii;
	
	class MyComponent extends Component
	{
		//Definikan event
		const EVENT_AFTER_SOMETHING = 'after-something';
		
		//Membuat handler
		public function Handler(){
			//echo "<script> console.log('An Event Occured')</script>";
			$statistic = new Statistic;
			$statistic -> access_time = date("Y-m-d H:i:s");
			$statistic -> user_ip = Yii::$app->getRequest()->getUserIP();
			$statistic -> user_host = Yii::$app->getRequest()->getUserHost();
			$statistic -> path_info = Yii::$app->getRequest()->getPathInfo();
			$statistic -> query_string = Yii::$app->getRequest()->getQueryString();
			$statistic->save();
		}
		public $label1;
		private $label2;
		
		public function getLabel2(){
			return $this->_label2;
		}
		public function setLabel2($value){
			$this->_label2= strtolower($value);
		}
		public function welcome(){
			echo "Hello.. Welcome to MyComponent";
		}
	}
?>