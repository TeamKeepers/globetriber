<?php

namespace App\Service;
/**
 * Description of Geocoder
 *
 * @author Laeti
 */
class Geocoder {
    
    const URL_GOOGLE = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyCyLL_wAkO_vMlDVj_AEXH9HUKJ7lVVNTY&address=';
    
    /**
     *
     * @var array
     */
    private $data;
    
    public function getAddressInfos($addressUser){
        if(empty($this->data[$addressUser])) {
            $distJson = file_get_contents(self::URL_GOOGLE . urlencode($addressUser));
            $data = json_decode($distJson, TRUE);
            if( ! $data) {
                return null;
            }
            if( $data['status'] != 'OK'){
                $this->data[$addressUser] = null;
                return null;
            }
            $result = $data['results'][0];
            $types = ['locality' =>'town','country' => 'country','postal_code'=>'postal_code'];
            $address = [];
            foreach($result['address_components'] as $addrComponent) {
                foreach($types as $type => $value) {
                    if(in_array($type, $addrComponent['types'])){
                        $address[$value] = $addrComponent['long_name'];
                    }
                }
            }
            $address['lat'] = $result['geometry']['location']['lat'];
            $address['lng'] = $result['geometry']['location']['lng'];
            $address['formatted'] = $result['formatted_address'];
            
            $this->data[$addressUser] = $address;
        }
        
        return $this->data[$addressUser];
    }
}
