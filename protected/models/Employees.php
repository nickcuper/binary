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

        public static function get_tree($except = -1)
        {
                $sql = "SELECT * FROM employees Where 1 LIMIT 0,10";

                $a = Yii::app()->db->createCommand($sql)->queryAll();
                $children = array();

                // first pass - collect children
                foreach($a as $v )
                {
                        $pt = $v['parent_id'];
                        $list = @$children[$pt] ? $children[$pt] : array();
                        array_push( $list, $v );
                        $children[$pt] = $list;
                }

                // second pass - get an indent list of the items
                $items = self::flat_tree( 0, '', array(), $children, 9999, 0, 1 );
                // third pass, set into different menus
                foreach($items as $key=>$item)
                {
                    $resultlist[$key] = $item;
                }

                return $resultlist;
        }

	protected static function flat_tree($id, $indent, $list, &$children, $maxlevel=9999, $level=0, $type=1)
        {
                if (@$children[$id] && $level <= $maxlevel)
                {
                        foreach ($children[$id] as $v)
                        {
                                $id = $v['employee_id'];

                                if ( $type )
                                {
                                        $pre    = '- ';
                                        $spacer = '-   ';
                                } else {
                                        $pre    = '- ';
                                        $spacer = '  ';
                                }

                                if ( $v['parent_id']== 0 )
                                {
                                        $txt    = $v['first_name'];
                                } else {
                                        $txt    = $pre . $v['first_name'];
                                }
                                $pt = $v['parent_id'];
                                $list[$id] = $v;
                                $list[$id]['name'] = "$indent$txt";

                                $list = self::flat_tree( $id, $indent . $spacer, $list, $children, $maxlevel, $level+1, $type );
                        }
                }
                return $list;
        }
}
