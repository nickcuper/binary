<?php

/**
 * This is the model class for table "employees".
 *
 * The followings are the available columns in table 'employees':
 * @property integer $employee_id
 * @property integer $root
 * @property integer $rgt
 * @property integer $lft
 * @property integer $level
 * @property string $first_name
 * @property string $last_name
 * @property string $positions
 * @property string $email
 * @property string $phone
 * @property string $notes
 * @property integer $date_register
 */
class Employees extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'employees';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, email, phone', 'required'),
			array('date_register', 'length', 'max'=>10),
			array('first_name, last_name', 'length', 'max'=>64),
			array('positions, email', 'length', 'max'=>255),
			array('phone', 'length', 'max'=>32),

                        array('first_name, last_name', 'match','pattern' => '/^[a-zA-Z\s]+$/'),
                        array('email', 'email', 'checkMX' => true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('employee_id, first_name, last_name, positions, email, phone, notes, date_register, lft, rgt, level, root', 'safe', 'on'=>'search'),
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

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_id' => 'Id',
			'root' => 'Parent',
			'rgt' => 'Right',
			'lft' => 'Left',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'positions' => 'Positions',
			'email' => 'Email',
			'phone' => 'Phone',
			'notes' => 'Notes',
			'date_register' => 'Date Register',
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

		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('root',$this->root,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('lft',$this->lft,true);
		$criteria->compare('rgt',$this->rgt,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('positions',$this->positions,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('date_register',$this->date_register,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Employees the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

        /**
         * Behavior Binary Tree
         * @return Array
         */
        public function behaviors()
        {
                return array(
                        'nestedSetBehavior'=>array(
                                'class'=>'ext.nestedset.NestedSetBehavior',
                                'hasManyRoots' => true,
                        ),
                );
        }

        /**
         * @return Boolean
         */
        protected function beforeSave()
	{
            $this->date_register = time();

            return parent::beforeSave();
	}
}
