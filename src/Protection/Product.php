<?php
/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 5:28 PM
 */

namespace Fabwebstudio\Webline\Protection;

use Fabwebstudio\Webline\Core;

class Product
{
    public $TermYears;
    public $Benefit;
    public $PremiumFrequency;
    public $ProtectionType =  'PERSONAL';
    public $ProtectionSubtype = 'TERM';
    public $BenefitType = 'DEATH_BENEFIT';
    public $CICTPDMask = 0;
    public $Renewable = false;
    public $Premium = 0;
    public $SplitBenefitLife = 0;
    public $SplitBenefitCic = 0;
    public $SplitBenefitLifeOrCic = 0;
    public $IncreasingBenefit = 'No';
    public $WaiverBasis = 'None';
    public $RevRts = 'No';
    public $CoverBasis = 'SingleLife1';
    public $MortgageInterestRate = 8;
    public $CeaseAge = '';

    public function __construct($term, $benefit, $frequency, $prottype, $coverbasis) {
        $this->TermYears = $term;
        $this->Benefit = $benefit;
        $this->PremiumFrequency = $frequency;
        $this->ProtectionSubtype = $prottype;
        $this->CoverBasis = $coverbasis;
    }
}