<?php

/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 5:27 PM
 */
namespace Fabwebstudio\Webline\Protection;

use Fabwebstudio\Webline\Core;

class Client {
    public $Title;
    public $FirstName;
    public $Surname;
    public $DOB;
    public $Sex;
    public $Smoker;
    public $AnnualEarnings;
    public $OccCode = '';
    public $OccClass = '';
    public $Email = '';

    public function __construct($title, $name, $surname, $dob, $sex, $isSmoker, $earnings) {
        $this->Title = $title;
        $this->FirstName = $name;
        $this->Surname = $surname;
        $this->DOB = $dob;
        $this->Sex = $sex;
        $this->Smoker = \Fabwebstudio\Webline\Core\YesNo::fromBool($isSmoker);
        $this->AnnualEarnings = $earnings;
    }
}