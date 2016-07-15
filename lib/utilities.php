<?

class Utilities {
  public static function redirect($url) {
    $message = Message::getInstance();
    header("location: ".$url . $message->get_message_to_url());
    exit;

  }
}
