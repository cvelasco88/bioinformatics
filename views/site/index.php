<?php

use app\helpers\BioHelper;
use app\helpers\BioFileHelper;
use app\models\bio\biomolecule\DeoxyribonucleicAcid;
use app\models\bio\biomolecule\Helix;
use app\models\bio\biomolecule\NucleicAcidSimpleStream;
use app\models\bio\biomolecule\NucleoBaseHelper;
use app\models\bio\cell\EukaryoticCell;
use app\models\UploadForm;
use app\parsers\FastaParser;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yiier\chartjs\ChartJs;
use yii\httpclient\Client;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">


    <div class="body-content">

        <?php
        //  https://ega-archive.org/metadata/v2/datasets/{id}?idType=EGA_STABLE_ID
        /*$client = new Client();
        $response = $client->createRequest()
                ->setFormat(Client::FORMAT_RAW_URLENCODED)
            ->setMethod('GET')
            ->setUrl('https://www.ebi.ac.uk/ena/data/view/A00145&display=fasta')
            //->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
            ->send();
        if ($response->isOk) {
        ?>
        <pre><?= $response->content; ?></pre>
        <?php	    
            //$newUserId = $response->data['id'];
            //echo $newUserId;
        } else {
            echo "Nope";
        }
        $path = Yii::getAlias("@uploads");
        $path .= DIRECTORY_SEPARATOR . "sample.fasta";
        BioFileHelper::save($path, $response->content);
        $data = $response->content;
        print_r($data);        
        */
        ?>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Url::to(['site/upload']),]); ?>
        <?php $model = new UploadForm(); ?>
        <?= $form->field($model, 'file')->fileInput() ?>
        <button>Submit</button>
        <?php ActiveForm::end() ?>
        <div>
            <?php
                $path = Yii::getAlias("@uploads");
                $path .= DIRECTORY_SEPARATOR . "sample.fasta";
                $fileContent = "";
                $data = [];
                try {
                    $fileContent = BioFileHelper::read($path);
                    $data = FastaParser::parseContent($fileContent);
                } catch(Exception $ex){
                    // handle exception
                }
            ?>
            <hr>
            <pre><?= $fileContent ?></pre>
            <hr>
            <pre><?= json_encode($data, JSON_PRETTY_PRINT); ?></pre>        
        </div>
        <div>
            <?php
            foreach($data as $item){ ?>
                <div>
                    <?php

                        $backgroundColor = [
                            "A" => "#f66020",
                            "C" => "#f7c02f",
                            "G" => "#706e44",
                            "T" => "#30b59a",                            
                            "U" => "#142f3f",
                        ];
                        $helix = BioHelper::createHelix($item->body);
                        $eCell = new EukaryoticCell($helix);
                    ?>
                    <pre><?php
                        $counts = count_chars(strval($helix), 1);
                        $countsFix = [];
                        foreach($counts as $key => $value){
                            $countsFix[chr($key)] = $value;
                        }
                        echo json_encode($countsFix);
                    ?></pre>
                    <?= ChartJs::widget([
                        'type' => 'line',
                        'options' => [
                        'height' => 200,
                        'width' => 600
                        ],
                        'data' => [
                            'labels' => array_keys($countsFix),
                            'datasets' => array_map(function($key) use ($countsFix, $backgroundColor) {
                                return [
                                    'label'=> '# '.$key,
                                    'data' => array_map(function($key2) use ($key, $countsFix) {
                                        if($key == $key2) {
                                            return $countsFix[$key];
                                        } else {
                                            return 0;
                                        }
                                    }, array_keys($countsFix)),
                                    'backgroundColor' => [$backgroundColor[$key]],
                                ];
                            }, array_keys($countsFix)),
                        ]
                    ]);?>

                    <pre><?php
                            // mRNA
                            $naHelix = $helix->transcribe();
                            $naHelix->mode = NucleoBaseHelper::MODE_RNA;
                            $mHelix = new Helix($naHelix);
                            // mRNA
                            $counts = count_chars(strval($mHelix), 1);
                            $countsFix = [];
                            foreach($counts as $key => $value){
                                $countsFix[chr($key)] = $value;
                            }
                            echo json_encode($countsFix);
                        ?></pre>
                        <?= ChartJs::widget([
                            'type' => 'line',
                            'options' => [
                            'height' => 200,
                            'width' => 600
                            ],
                            'data' => [
                                'labels' => array_keys($countsFix),
                                'datasets' => array_map(function($key) use ($countsFix, $backgroundColor) {
                                    return [
                                        'label'=> '# '.$key,
                                        'data' => array_map(function($key2) use ($key, $countsFix) {
                                            if($key == $key2) {
                                                return $countsFix[$key];
                                            } else {
                                                return 0;
                                            }
                                        }, array_keys($countsFix)),
                                        'backgroundColor' => [$backgroundColor[$key]],
                                    ];
                                }, array_keys($countsFix)),
                            ]
                        ]);?>
                    </div>
                        
                    <h3>Helix: <?= $item->header ?></h3>
                    <div>
                        <pre><?php
                            print_r(strval($helix));
                        ?></pre>
                        <hr>
                        <pre><?php
                            //print_r(json_encode($helix));
                        ?></pre>
                    </div>
                </div>
                    
                <div>
                    <pre><?php
                        print_r(strval($mHelix));
                    ?></pre>
                    <hr>
                    <pre><?php
                        //print_r(json_encode($mHelix));
                    ?></pre>
                </div>
            <?php } ?>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p>
            </div>
        </div>

    </div>
</div>