<?php
/**
 * Created by PhpStorm.
 * User: samjunior
 * Date: 12/18/14
 * Time: 10:58 AM
 */

namespace Younggeeks\InfobipL4;

use Illuminate\Config\Repository;
use SmsClient;
use SMSRequest;

class InfobipL4{

    /**
     * @var Repository
     */
    private $config;
    private $infobip;
    private $infobipMsg;


    public function __construct(Repository $config)
    {
        $this->config = $config;

       // $this->infobip=new InfobipL4();
       $this->infobip= new SmsClient($this->config->get('infobip-l4::username'),$this->config->get('infobip-l4::password'));
        $this->infobipMsg=new SMSRequest();
    }

    public function send($to,$msg)
    {

        $this->infobipMsg->senderAddress=$this->config->get('infobip-l4::phone');

        $this->infobipMsg->senderName=$this->config->get('infobip-l4::name');

        $this->infobipMsg->address=intval($to);

        $this->infobipMsg->message=$msg;

        $send=$this->infobip->sendSMS($this->infobipMsg);

        if($send){
            return true;
        }
        else{
            return false;
        }

    }
}