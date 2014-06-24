<?php

/**
 * This is the model class for table "users2jobs".
 *
 * The followings are the available columns in table 'users2jobs':
 * @property string $users2jobs_id
 * @property string $job_id
 * @property string $email
 * @property string $name
 * @property string $phone_cell
 * @property string $comment
 * @property string $cv_path
 * @property integer $status
 */
class Users2jobs extends CActiveRecord
{

        /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users2jobs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('job_id, email, name, phone_cell', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('job_id', 'length', 'max'=>10),
			array('email, cv_path', 'length', 'max'=>255),
			array('name', 'length', 'max'=>80),
			array('phone_cell', 'length', 'max'=>20),
			array('comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('users2jobs_id, job_id, email, name, phone_cell, comment, status, cv_path', 'safe', 'on'=>'search'),
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
                    'job' => array(self::BELONGS_TO, 'Jobs', 'job_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'users2jobs_id' => 'Users2jobs',
			'job_id' => 'Job',
			'email' => 'Email',
			'name' => 'Name',
			'phone_cell' => 'Phone Cell',
			'comment' => 'Comment',
			'cv_path' => 'CV',
			'status' => 'Status',
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

		$criteria->compare('users2jobs_id',$this->users2jobs_id,true);
		$criteria->compare('job_id',$this->job_id,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone_cell',$this->phone_cell,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('cv_path',$this->cv_path,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users2jobs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
