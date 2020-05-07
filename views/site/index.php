<?php

use yiier\chartjs\ChartJs;
use yii\httpclient\Client;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">
	<?= ChartJs::widget([
	    'type' => 'line',
	    'options' => [
		'height' => 200,
		'width' => 600
	    ],
	    'data' => [
		'labels' => ["January", "February", "March", "April", "May", "June", "July"],
		 'datasets' => [
		     [
		         'label'=> '# of Votes',
		         'data' => [65, 59, 90, 81, 56, 55, 40]
		     ],
		     [
		         'label'=> '# of Votes',
		         'data' => [28, 48, 40, 19, 96, 27, 100]
		     ]
		 ]
	    ]
	]);?>

	<?php
	$client = new Client();
	$response = $client->createRequest()
	    ->setMethod('GET')
	    ->setUrl('https://ega-archive.org/metadata/v2/datasets')
	    //->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
	    ->send();
	if ($response->isOk) {
	?>
	<pre>
	<?= print_r($response->data); ?>
	</pre>
	<?php	    
	    //$newUserId = $response->data['id'];
	    //echo $newUserId;
	} else {
	    echo "Nope";
	}
	?>

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
