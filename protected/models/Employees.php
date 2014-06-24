<?php

/**
 * This is the model class for table "employees".
 *
 * The followings are the available columns in table 'employees':
 * @property string $employee_id
 * @property string $parent_id
 * @property string $first_name
 * @property string $last_name
 * @property string $positions
 * @property string $email
 * @property string $phone
 * @property string $notes
 * @property string $date_register
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
			array('parent_id, date_register', 'length', 'max'=>10),
			array('first_name, last_name', 'length', 'max'=>64),
			array('positions, email', 'length', 'max'=>255),
			array('phone', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('employee_id, parent_id, first_name, last_name, positions, email, phone, notes, date_register', 'safe', 'on'=>'search'),
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
                        'subordinate' => array(self::HAS_MANY, 'Employees', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_id' => 'Id',
			'parent_id' => 'Parent',
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
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('first_name',$this->first_name,true);
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
        
        protected function beforeSave()
	{
            $this->date_register = time();

            return parent::beforeSave();
	}
        
        function get_tree($except = -1) 
        {
            $a=$this->find('all', array('conditions' => array('is_tmp' => 0), 'fields' => array('id',"parent_id","name", 'alias'),'order'=>"name"));
		
            $b=array();
            foreach ($a as $value)
            {
                $b[$value[$this->name]['parent_id']][]=$value[$this->name];
            }
            return $this->flat_tree($b, $except);
        }

	function flat_tree(&$data, $except=-1, $id=0, $add="")
        {
            $res=array();
            if (isset($data[$id]) && is_array($data[$id]))
            foreach ($data[$id] as $value)
            {
                if ($value['id']!=$except)
                {
                    $res["{$value['id']}"]=$add.$value['name'];
                    if (array_key_exists($value['id'],$data)) {
                        $res=$this->merge($res,$this->flat_tree($data,$except,$value['id'],$add."--"));
                    }
                }
            }
            return $res;
        }

	public function merge($ar1, $ar2)
        {
            foreach ($ar2 as $key => $value)
            {
                $ar1[$key]=$value;
            }
            return $ar1;
        }
}
