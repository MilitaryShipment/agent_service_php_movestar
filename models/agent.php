<?php

require_once __DIR__ . '/../db_record_php_7/record.php';


class Agent extends Record{

    const DRIVER = 'mssql';
    const DB = 'ezshare';
    const TABLE = 'tbl_movestar_agents';
    const PRIMARYKEY = 'AgentID';

    public $ID;
    public $MoveStarID;
    public $AgentID;
    public $Name;
    public $Phone;
    public $Fax;
    public $TollFree;
    public $MailingAddress1;
    public $MailingAddress2;
    public $MailingCity;
    public $MailingState;
    public $MailingZip;
    public $MailingCountry;
    public $PhysicalAddress1;
    public $PhysicalAddress2;
    public $PhysicalCity;
    public $PhysicalState;
    public $PhysicalZip;
    public $PhysicalCountry;
    public $TimeZone;
    public $Website;
    public $Email;
    public $FromEasyDPS;
    public $_409agree; /*  *********  */
    public $AgentGBLOC;
    public $Agreement;
    public $AllowATR;
    public $APUcharge;
    public $COG;
    public $CustomerID;
    public $DoDapproved;
    public $DOT;
    public $DPS409;
    public $DPSagent;
    public $DPSWhsID;
    public $EffectiveDate;
    public $EndDate;
    public $GBLOC;
    public $Haulingrate;
    public $MCICC;
    public $PlanningArea;
    public $ReceiveSIT;
    public $SCAC;
    public $SCACAcct;
    public $SCACID;
    public $ServiceRadius;
    public $StartDate;
    public $Status;
    public $VendorID;
    public $IsAdjuster;
    public $IsBooker;
    public $IsCarrier;
    public $IsContractor;
    public $IsCorporateaccount;
    public $IsCustomer;
    public $IsDestinationHauler;
    public $IsGBLOC;
    public $IsHauler;
    public $IsPacker;
    public $IsPort;
    public $IsPortAgent;
    public $IsPrimeAgent;
    public $IsPrimeHauler;
    public $IsRepairFirm;
    public $IsShuttle;
    public $IsSurveyor;
    public $IsVendor;
    public $IsWarehouse;
    public $LastUpdated;

    public function __construct($id = null){
        parent::__construct(self::DRIVER,self::DRIVER,self::DB,self::TABLE,self::PRIMARYKEY,$id);
    }

    public static function get($key,$value){
        $ids = array();
        $data = array();
        $results = $GLOBALS['db']
            ->suite(self::DRIVER)
            ->driver(self::DRIVER)
            ->database(self::DB)
            ->table(self::TABLE)
            ->select(self::PRIMARYKEY)
            ->where($key,"=",$value)
            ->get();
        while($row = sqlsrv_fetch_array($results,SQLSRV_FETCH_ASSOC)){
            $ids[] = $row[self::PRIMARYKEY];
        }
        foreach($ids as $id){
            $data[] = new self($id);
        }
        return $data;
    }
}