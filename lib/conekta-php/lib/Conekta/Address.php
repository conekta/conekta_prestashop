<?php 

namespace Conekta;

use \Conekta\ConektaResource;

class Address extends ConektaResource
{
  var $street1 = "";
  var $street2 = "";
  var $street3 = "";
  var $city    = "";
  var $state   = "";
  var $zip     = "";
  var $country = "";

	public function __get($property)
  {   
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function  __isset($property)
  {
    return isset($this->$property);
  }

}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 84e64705292069b96fb8c4a25b16164e0ba1c2f9
