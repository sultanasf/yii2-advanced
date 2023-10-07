<?php

namespace backend\controllers;

use Yii;
use app\models\Item;
use app\models\ItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ItemImage;
use yii\web\UploadedFile;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Item models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Item model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Item();
        $modelImage = new ItemImage();

        if ($this->request->isPost) {
            $modelImage->image = UploadedFile::getInstance($modelImage, 'image');

            if ($model->load($this->request->post()) && $modelImage->image && $modelImage->validate()) {
                // Specify the absolute path where you want to save the image
                $uploadPath = Yii::getAlias('@frontend') . "\web\uploads\\";
                $location = $uploadPath . time() . '_' . $modelImage->image->baseName . '.' . $modelImage->image->extension;

                // Save the image to the specified location
                $modelImage->image->saveAs($location);

                // Update the model's image attribute with the relative path (e.g., '/uploads/...')
                $model->image_url = time() . '_' . $modelImage->image->baseName . '.' . $modelImage->image->extension;

                // Save the model
                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelImage' => $modelImage,
        ]);
    }

    /**
     * Updates an existing Item model.
     * It also updates the image_url attribute of the Item model.
     * It also uploads the image file to the computer and saves the image's relative path to the database.
     * The old image file will be replaced by the new image file.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelImage = new ItemImage();

        if ($this->request->isPost) {
            $modelImage->image = UploadedFile::getInstance($modelImage, 'image');

            if ($model->load($this->request->post()) && $modelImage->image && $modelImage->validate()) {
                // Specify the absolute path where you want to save the image
                $uploadPath = Yii::getAlias('@frontend') . "\web\uploads\\";
                //define new image location
                $location = $uploadPath . time() . '_' . $modelImage->image->baseName . '.' . $modelImage->image->extension;
                //remove old image
                $oldImage = $location;
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }

                // Save the image to the specified location
                $modelImage->image->saveAs($location);

                // Update the model's image attribute with the relative path (e.g., '/uploads/...')
                $model->image_url = time() . '_' . $modelImage->image->baseName . '.' . $modelImage->image->extension;

                // Save the model
                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', ['model' => $model, 'modelImage' => $modelImage]);
    }

    /**
     * Deletes an existing Item model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Item::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
