<?php
use yii\helpers\Html;

use yii\helpers\StringHelper;

use yii\grid\GridView;
use yii\widgets\Pjax;

$formatter = \Yii::$app->formatter;




/* @var $this yii\web\View */
/* @var $posts app\models\Posts */

$this->registerMetaTag(['name' => 'keywords', 'content' => 'фрази, смърт , Dota2']);
$this->title = 'Фрази, водещи до смърт в Dota2';



?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Фрази, водещи до смърт в Dota2</h1>
    </div>

    <div class="body-content">

        <div class="well">
<!--            --><?php //echo Html::img('img/aegis-of-champions.png', ['style' => 'max-width: 50px; margin-right: 25px;']) ?>
            <blockquote>
                <small>Топ фраза:</small>
                <h2>
                    "<?php print_r( $most_liked_phrase->phrase ); ?>"
                </h2>
            </blockquote>
        </div>


        <ul class="list-group">
            <?php
            // Save $vars here
            $index = 1;
            ?>

           <?php foreach ($phrases as $phrase) : ?>
            <li id="<?php echo $phrase->ID ?>" class="list-group-item" data-toggle="tooltip" data-placement="left" title="<?php echo $formatter->asDate($phrase->created, 'long'); ?>">
                <span class="pull-left phrase-index"><?php echo $index."."; ?></span>
                <span class="badge like-count"><?php print_r($phrase->likes); ?></span>
                <span class="pull-right glyphicon glyphicon-thumbs-up like" onClick="cwRating(<?php echo $phrase->ID; ?>,1)"></span>

                <?php print_r($phrase->phrase); ?>


            </li>
            <?php $index++; endforeach; ?>
        </ul>

    </div>
</div>

<script
    src=""
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
<script>

</script>

</script>