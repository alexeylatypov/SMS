<?php
namespace latypov\sms\OMS;


class OMS_User extends OMS_Object{
    public $_xmlns = 'http://schemas.microsoft.com/office/Outlook/2006/OMS';
	public $customData;
    protected $rootElName = 'xmsUser';

    public function __construct($userId,$password,$client='Microsoft Office Outlook 14.0'){
		$this->userId = $userId;
		$this->password = $password;
		$this->_client = $client;
	}
}
