<?php

/**
 * This is the model class for table "contacts".
 *
 * The followings are the available columns in table 'contacts':
 * @property string $id
 * @property string $name
 * @property string $number
 * @property string $fk_user
 *
 * The followings are the available model relations:
 * @property UsergroupsUser $fkUser
 * @property ContactsHasGroups[] $contactsHasGroups
 */
class Contacts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contacts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, number, fk_user', 'required'),
			array('name', 'length', 'max'=>30),
			array('number', 'length', 'min'=>8, 'max'=>8),
			array('number', 'numerical'),
			array('fk_user', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, number, fk_user', 'safe', 'on'=>'search'),
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
			'fkUser' => array(self::BELONGS_TO, 'UsergroupsUser', 'fk_user'),
			'contactsHasGroups' => array(self::HAS_MANY, 'ContactsHasGroups', 'fk_contacts'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'number' => 'Number',
			'fk_user' => 'Fk User',
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

		$criteria->addCondition('fk_user='. Yii::app()->user->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contacts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getGroups($id_pnumber) {
		$sql = 'SELECT g.name FROM (contacts c JOIN contacts_has_groups h ON c.id = h.fk_contacts) JOIN groups g ON g.id = h.fk_groups WHERE c.id = :id_pnumber';
		$command = Yii::app()->getDb()->createCommand($sql);
		$command->bindParam(":id_pnumber", $id_pnumber, PDO::PARAM_INT);
		return $command->queryAll();
	}
}
