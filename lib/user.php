<?php

/*
 * @name: Barmat MVC
 * @author: Bartłomiej Matlęga <bartlomiej.matlega95@gmail.com>
 */

 final class User {

   private static $oInstance = false;

   public static function getInstance()
   {
       if( self::$oInstance == false )
       {
           self::$oInstance = new User();
       }
       return self::$oInstance;
   }


   public function __construct() {
   }

   public function register($password, $repeat_password, $email) {
     if ($password != $repeat_password)
       throw new UserWrongDataException("Hasła się nie zgadzają.");

     if (RedBeanPHP\R::find('user', 'email = ?', [$email]).sizeof > 0)
       throw new UserWrongDataException("Istnieje juz użytkownik z tym emailem.");


     $user = RedBeanPHP\R::dispense("user");
     $user->password  = md5($password);
     $user->email     = $email;
     RedBeanPHP\R::store($user);
     return $user;
   }

   public function logIn($email, $password) {
     if (!User::isLogged()) {
       $users = RedBeanPHP\R::find('user', 'email = ? AND password = ?', [$email, md5($password)]);
       if (!empty($users)) {
         $user = reset($users);
         Session::set("userid", $user->id);
         return $user;

       } else {
        throw new UserWrongDataException("Nieprawidłowy login lub hasło.");

       }
     } else {
       throw new UserLoggedException("Jesteś już zalogowany.");
     }
   }

   public function logOut() {
     if ($this->isLogged()) {
       $user = RedBeanPHP\R::load("user", Session::get("userid"));
       Session::destroy("userid");
       return $user;

     } else {
       throw new UserLoggedException("Nie jesteś zalogowany.");
     }
   }

   public static function isLogged() {
     if (Session::get("userid") != null) {
       return true;

     } else {
       return false;
     }
   }

   public function getCurrentUser() {
     if (User::isLogged()) {
      return RedBeanPHP\R::load("user", Session::get("userid"));

     } else {
       throw new UserLoggedException("Nie jesteś zalogowany.");
     }
   }
}

class UserWrongDataException extends Exception {
}

class UserLoggedException extends Exception {
}
