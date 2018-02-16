<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AddressValidator extends ConstraintValidator
{
    const URL_GOOGLE = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyCyLL_wAkO_vMlDVj_AEXH9HUKJ7lVVNTY&address=';
    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint Address */

        $distJson = file_get_contents(self::URL_GOOGLE . urlencode($value));
        
        $data = json_decode($distJson);
        
        if(empty($data['status'])  ||  $data['status'] !== 'OK') {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        } 
        
    }
}
