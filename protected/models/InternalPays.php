<?php

/**
 * This is the model class for table "acc_internal_pays".
 *
 * The followings are the available columns in table 'acc_internal_pays':
 * @property string $id
 * @property string $create_date
 * @property integer $create_user
 * @property integer $acc_user_id
 * @property string $service_id
 * @property string $description
 * @property string $summa
 *
 * The followings are the available model relations:
 * @property User $createUser
 * @property Service $service
 * @property User $accUser
 */
abstract class InternalPays extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'acc_internal_pays';
	}

        protected function beforeValidate() {
            ///TODO: should use current user
            $this->create_user = 1; 
            
            $this->{$this->service_id_param} = 1;
            $model = $this->service_model;
            $courseService = $model::model()->findByAttributes(array($this->service_id_param=>$this->{$this->service_id_param}));
        

            if(!isset($courseService))
            {

                $courseService = new $this->service_model();
                $courseService->{$this->service_id_param} = $this->{$this->service_id_param};
                $courseService->save();
                $this->service = $courseService->service;
                $this->service_id = $courseService->service_id;
            }
            else 
            {
                $this->service = $courseService->service;
                $this->service_id = $courseService->service_id;
            }
            
            return parent::beforeValidate();
        }


        /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('create_user, acc_user_id, service_id, summa', 'required'),
			array('create_user, acc_user_id', 'numerical', 'integerOnly'=>true),
			array('service_id, summa', 'length', 'max'=>10),
			array('description', 'length', 'max'=>512),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, create_date, create_user, acc_user_id, service_id, description, summa', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'createUser' => array(self::BELONGS_TO, 'User', 'create_user'),
			'accUser' => array(self::BELONGS_TO, 'User', 'acc_user_id'),
                        'service' => array(self::BELONGS_TO, $this->service_model, 'service_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'operation id',
			'create_date' => 'create date',
			'create_user' => 'User who create',
			'acc_user_id' => 'account user',
			'service_id' => 'Billed service',
			'description' => 'Description',
			'summa' => 'Payment summ',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('create_user',$this->create_user);
		$criteria->compare('acc_user_id',$this->acc_user_id);
		$criteria->compare('service_id',$this->service_id,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('summa',$this->summa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InternalPays the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
