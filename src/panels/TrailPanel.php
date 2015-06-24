<?php

namespace bedezign\yii2\audit\panels;

use bedezign\yii2\audit\models\AuditTrailSearch;
use yii\debug\Panel;

/**
 * TrailPanel
 * @package bedezign\yii2\audit\panels
 */
class TrailPanel extends Panel
{
    /**
     * @return string
     */
    public function getName()
    {
        return \Yii::t('audit', 'Trail');
    }

    /**
     * @return string
     */
    public function getDetail()
    {
        $searchModel = new AuditTrailSearch();
        $params = \Yii::$app->request->getQueryParams();
        $params['AuditTrailSearch']['entry_id'] = $params['id'];
        $dataProvider = $searchModel->search($params);

        return \Yii::$app->view->render('panels/trail/detail', [
            'panel'        => $this,
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }
}