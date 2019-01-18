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
      array_push( $errors, 'has to be between 6 and 16 characters');
    }
    //check for alphanumeric
    if( ctype_alnum($username) == false ){
      array_push( $errors, 'only alphanumeric characters allowed');
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
  
  public static function password( $password ){
    $errors = array();
    if( strlen($password) < 6 ){
      array_push($errors, 'minimum 6 characters');
    }
    if( ctype_alnum($password) ){
      array_push($errors, 'need to contain a symbol');
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
  public static function email( $email ){
    $errors = array();
    if( filter_var($email,FILTER_VALIDATE_EMAIL ) == false ){
      array_push( $errors, 'invalid email address');
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