<?php
namespace aitsyd;
class Validator{
  public static function username( $username ){
    $errors = array();
    //check for spaces
    $userLetters = str_split( $username );
    foreach( $userLetters as $letter ){
      if( $letter == ' '){
        array_push( $errors, 'cannot contain spaces');
        break;
      }
    }
    //check for length
    if( strlen($username) < 6 || strlen($username) > 16){
      array_push( $errors, 'incorrect length');
    }
    //check for alphanumeric
    if( ctype_alnum($username) == false ){
      array_push( $errors, 'only alphanumeric characters');
    }
    //check for html tags
    if( strlen( strip_tags($username) ) !== strlen( $username ) ){
      array_push( $errors, 'cannot contain HTML');
    }
    $result = array();
    if( count($errors) > 0 ){
      $result['success'] = false;
      $result['errors'] = $errors;
    }
    else{
      $result['success'] = true;
    }
    return $result;
  }
}
?>