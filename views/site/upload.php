<?php

use app\helpers\BioHelper;
use app\helpers\FileHelper;
use app\models\bio\biomolecule\DeoxyribonucleicAcid;
use app\models\bio\biomolecule\Helix;
use app\parsers\FastaParser;
use yii\bootstrap\ActiveForm;
use yiier\chartjs\ChartJs;
use yii\httpclient\Client;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">


    <div class="body-content">

		<?php
			$data = FastaParser::parse($filepath);
			$item = FastaParser::join($data);
			$helix = BioHelper::createHelix($item->body);
		?>
		<div>
			<pre><?php
				print_r(strval($helix));
			?></pre>
		</div>
		<div>
            <pre><?= json_encode($data, JSON_PRETTY_PRINT); ?></pre>       
		</div>
		<hr>
		<div>
            <pre><?= json_encode($item, JSON_PRETTY_PRINT); ?></pre>       
        </div>
		<hr>
        <div>
            <pre><?= print_r($model); ?></pre>       
        </div>

    </div>
</div>