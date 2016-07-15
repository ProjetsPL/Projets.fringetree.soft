<?php

final class Message {

    /**
     * Przechowuje instancję klasy Singleton
     *
     * @var object
     * @access private
     */
    private static $oInstance = false;

    /**
     * Zwraca instancję obiektu Singleton
     *
     * @return Singleton
     * @access public
     * @static
     */
    public static function getInstance()
    {
        if( self::$oInstance == false )
        {
            self::$oInstance = new Message();
        }
        return self::$oInstance;
    }


    private $type;
    private $content;

    const TYPE_DANGER = "danger";
    const TYPE_SUCCESS = "success";

    /**
     * Create a message object
     * @param string $type type of message
     * @param string $content content of message
     */
    public function __construct($type = null, $content = null) {
        $this->type = $type;
        $this->content = $content;
    }

    /**
     * Get a message from url
     * @return mixed false if there is not message
     *               or array: $content => message content
     *                     and $type    => message type
     */
    public static function get_message_from_url() {
        $type = filter_input(INPUT_GET, "message_type");
        $content = filter_input(INPUT_GET, "message_content");

        $message = false;
        if(!empty($type) && !empty($content)) {
            $message['type'] = $type;
            $message['content'] = $content;
        }

        return $message;
    }

    /**
     * Get type of message from URL
     * @return mixed false if is null
     *               or string message type
     */
    public function get_type_from_url() {
        $type = filter_input(INPUT_GET, "message_type");
        return $type ? $type : false;
    }

     /**
     * Get content of message from URL
     * @return mixed false if is null
     *               or string content type
     */
    public function get_content_from_url() {
        $content = filter_input(INPUT_GET, "message_content");
        return $content ? $content : false;
    }

    /**
     * Pass the message from URL to
     * message object
     * @return boolean status of successs
     */
    public function pass_it_on() {
        $type = filter_input(INPUT_GET, "message_type");
        $content = filter_input(INPUT_GET, "message_content");

        if(!empty($type) && !empty($content)) {
            $this->type    = $type;
            $this->content = $content;
            return true;
        }
        return false;
    }

    /**
     * Get an URL version message
     * @return string message URL
     */
    public function get_message_to_url() {
        return ($this->type && $this->content) ? "?message_type=" . $this->type . "&message_content=" . $this->content : null;
    }

    /**
     * Set type and content of message
     * @param string $type type of message
     * @param string $content content of message
     * @return boolean status of success
     */
    public function set_message($type, $content) {
        if($type && $content) {
            $this->type    = $type;
            $this->content = $content;
            return true;
        }
        return false;
    }

    /**
     * Set type of message
     * @param string $type type of message
     */
    public function set_type($type) {
        $this->type = $type;
    }
    /**
     * Get type of message
     * @return string type
     */
    public function get_type() {
        return $this->type;
    }

    /**
     * Set content of message
     * @param string $content content of message
     */
    public function set_content($content) {
        $this->content = $content;
    }

    /**
     * Get content of message
     * @return string content
     */
    public function get_content() {
        return $this->content;
    }
}
