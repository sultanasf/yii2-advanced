<?php

namespace frontend\components;

use Yii;
use yii\base\Component;
use app\models\Statistics;

class MyComponent extends Component
{
    const STATISTIC_EVENT = 'statistic-event';

    public static function statisticEventHandler()
    {
        $stats = new Statistics();
        $stats->access_time = date('Y-m-d H:i:s');
        $stats->user_ip = Yii::$app->request->userIP;
        $stats->user_host = Yii::$app->request->userHost;
        $stats->path_info = Yii::$app->request->pathInfo;
        $stats->query_string = Yii::$app->request->queryString;

        $stats->save();
    }
}
