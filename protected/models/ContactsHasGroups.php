<?php

/**
 * This is the model class for table "contacts_has_groups".
 *
 * The followings are the available columns in table 'contacts_has_groups':
 * @property string $id_contacts
 * @property string $id_groups
 * @property string $fk_contacts
 * @property string $fk_groups
 *
 * The followings are the available model relations:
 * @property Contacts $fkContacts
 * @property Groups $fkGroups
 */
class ContactsHasGroups extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contacts_has_groups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_contacts, id_groups, fk_contacts, fk_groups', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_contacts, id_groups, fk_contacts, fk_groups', 'safe', 'on'=>'search'),
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
			'fkContacts' => array(self::BELONGS_TO, 'Contacts', 'fk_contacts'),
			'fkGroups' => array(self::BELONGS_TO, 'Groups', 'fk_groups'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_contacts' => 'Id Contacts',
			'id_groups' => 'Id Groups',
			'fk_contacts' => 'Fk Contacts',
			'fk_groups' => 'Fk Groups',
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

		$criteria->compare('id_contacts',$this->id_contacts,true);
		$criteria->compare('id_groups',$this->id_groups,true);
		$criteria->compare('fk_contacts',$this->fk_contacts,true);
		$criteria->compare('fk_groups',$this->fk_groups,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ContactsHasGroups the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}