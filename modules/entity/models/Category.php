<?php
namespace yii\easyii\modules\entity\models;

use yii\easyii\components\CategoryWithFieldsModel;

class Category extends CategoryWithFieldsModel
{
    public static function tableName()
    {
        return 'easyii_entity_categories';
    }

    public function rules()
    {
        $rules = parent::rules();
        
        $rules[] = ['text', 'safe'];
        $rules[] = ['cache', 'integer'];
        
        return $rules;
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();

        $labels['text'] = 'Текст';
        $labels['cache'] = 'Кеш';

        return $labels;
    }

    public function getItems()
    {
        return $this->hasMany(Item::className(), ['category_id' => 'id'])->orderBy('title');
    }

    public function afterDelete()
    {
        parent::afterDelete();

        foreach($this->getItems()->all() as $item){
            $item->delete();
        }
    }

    public static function getCacheName($category_id)
    {
        return 'entity' . $category_id;
    }
}