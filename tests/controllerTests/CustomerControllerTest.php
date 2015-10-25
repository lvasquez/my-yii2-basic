<?php

use Yii;
use app\models\Customers;
use app\models\CustomersSearch;

class MyProceduralTest extends PHPunit_Framework_Testcase {

	
	public function testIndex()
	{

		$searchModel = new CustomersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


	}
	

  	public function testPushAndPop()
    {
        $stack = array();
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }
}
?>