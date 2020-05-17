<?php

use app\parsers\FastaParser;
use yiier\chartjs\ChartJs;
use yii\httpclient\Client;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">


    <div class="body-content">

        <?php
        //  https://ega-archive.org/metadata/v2/datasets/{id}?idType=EGA_STABLE_ID
        $client = new Client();
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
        ?>
        <div>
            <?php
                $data = FastaParser::parseContent($response->content);
                print_r($data);
            ?>
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