<?php

namespace latypov\sms;

/**
 * This is just an example.
 */
class SMS extends \yii\base\Widget
{
    public function run()
    {
        
		$myNumber = '79221234536';
		$u = new OMS\OMS_User($myNumber,'N364S6');
		try{
			$c = new OMS\OMS($u,
				'https://sms.megafon.ru/oms/service.asmx',
				//'https://sms.megafon.ru/oms/service.asmx?WSDL', // A russian carrier won't send us WSDL just like that
				//it obviously needs some browser-style headers, so we can fetch wsdl emulating it, but that's not our aim

				'https://www.intellisoftware.co.uk/smsgateway/oms/oms.asmx?WSDL' //simplier to get them there
				//'http://dl.dropbox.com/u/3477485/oms.wsdl' //or there. in case intellisoftware.co.uk is down
			);
			
		}catch(OMS_Exception $e){
			die('Login should be like 79274445566, and a service guide password as that password');
		}
		
		$m = new OMS\OMS_Message(new OMS\OMS_Body_SMS('Проверка связи'),'+79221234529');
		if($c->DeliverXms($m))
			return true;
		else {
			return false;
		}

    }
}
