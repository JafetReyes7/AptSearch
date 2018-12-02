<?php

//-------------------------ADD PROPERTY PAGE-------------------------

//TODO... 
//(DONE)(1) needs to use post (params passed not in url) => so that the page is not bookmarkable
//(DONE)(2) plan for going to the page without parameters
//(3) this page should also be replaced after changes SAVED or DISCARDED
//		[a] replace it with new page (IF previous page != next page)
//		[b] replace it with the previous page (IF previous page == next page)
//		[*] replacement occurs so you cant go back to the same page
//TODO switch to fully client side checks
$app->post('/addProperty', function ($request, $response, $args) {
	$user = current_user();
	if($user != null){
		$this->view->render($response, "property/html.html",
			['user'=>$user, 'add'=>true]);
		return $response;
	}
	else{
		Header("Location: ./authentication");
		exit();
	}
});
//-------------------------EDIT PROPERTY PAGE-------------------------

//TODO... 
//(1) needs to use post (params passed not in url) => so that the page is not bookmarkable
//(2) plan for going to the page without parameters
//(3) this page should also be replaced after changes SAVED or DISCARDED
//		[a] replace it with new page (IF previous page != next page)
//		[b] replace it with the previous page (IF previous page == next page)
//		[*] replacement occurs so you cant go back to the same page
//TODO switch to fully client side checks
$app->get('/editProperty', function ($request, $response, $args) {
	$user = current_user();
	//TODO implement isset() check
	$property = PropertyQuery::create()->findPk($_GET['propertyID']);
	if($user != null){
		$this->view->render($response, "property/html.html",
			['user'=>$user, 'property'=>$property, 'add'=>false]);
		return $response;
	}
	else{
		Header("Location: ./authentication");
		exit();
	}
});

$app->post('/verifyProperty', function ($request, $response, $args) {
    $fields = $_POST;
	foreach($fields as $field){
		if(empty($field)){
			return json_encode(['valid'=>'false']);
		}
	}
	createProperty($fields);
	return json_encode(['valid'=>'true']);
});
$app->post('/verifyProperty/edit', function ($request, $response, $args) {
    $fields = $_POST;
	foreach($fields as $field){
		if(empty($field)){
			return json_encode(['valid'=>'false']);
		}
	}
	updateProperty($fields, $fields['propertyID']);
	return json_encode(['valid'=>'true']);
});

function createProperty($fields){
	$newAddr = new Address();
	$newAddr->setContinenttypeid(1); //DEFAULT US
	$newAddr->setCountrytypeid(321); //DEFAULT US
	$newAddr->setState($fields['state']);
	$newAddr->setLocality($fields['locality']);
	$newAddr->setZipcode($fields['zip']);
	$newAddr->setStreetname($fields['street']);
	$newAddr->setBuildingindentifier($fields['buildNum']);
	$newAddr->setApartmentidentifier($fields['aptNum']);
	$newAddr->save();

	$newProperty = new Property();
	$newProperty->setAddressid($newAddr->getId());
	$newProperty->setUserid(current_user()->getId());
	$newProperty->setPostname($fields['postName']);
	$newProperty->setAvailable(true);
	$newProperty->setExpectedrentpermonth($fields['rent']);
	$newProperty->setSquarefootage($fields['sqrFootage']);
	$newProperty->setBedroomcount($fields['bedrooms']);
	$newProperty->setBathroomcount($fields['bathrooms']);
	$newProperty->save();
}
function updateProperty($fields, $propertyID){

	$editProperty = PropertyQuery::create()->findPk($propertyID);
	$editProperty->setPostname($fields['postName']);
	$editProperty->setAvailable(true);
	$editProperty->setExpectedrentpermonth($fields['rent']);
	$editProperty->setSquarefootage($fields['sqrFootage']);
	$editProperty->setBedroomcount($fields['bedrooms']);
	$editProperty->setBathroomcount($fields['bathrooms']);
	$editProperty->save();
}
?>