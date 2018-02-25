<?php

namespace App\Validator\Constraints;

use App\Service\Geocoder;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AddressValidator extends ConstraintValidator
{
    private $geocoder;
    
    public function __construct(Geocoder $geocoder) {
        $this->geocoder = $geocoder;
    }
    
    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint Address */
        
        $data = $this->geocoder->getAddressInfos($value);
        
        if( ! $data) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        } 
        
    }
}
