<?php

/*
 * @name: Barmat MVC
 * @author: Bartłomiej Matlęga <bartlomiej.matlega95@gmail.com>
 */

class Data {

    private $data = [];
    private $title = '';
    private $header = [];
    private $options = [];

    public function __construct() {
    }

    /**
     * Get data by key
     * @param string $key data key
     * @return string data
     */
    public function __get($key) {
        return $this->data[$key];
    }

    /**
     * Set data
     * @param string $key data key
     * @param string $value data value
     */
    public function __set($key, $value) {
        $this->data[$key]  = $value;
    }

    /**
     * Set page title
     * @param string $value page title
     */
    public function setTitle($value) {
        $this->title = $value;
    }

    /**
    * Return page title
    * @return string page title
    */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Add headers
     * @param string $value elements in head
     */
    public function addHeader($value) {
        $this->header[] = $value;
    }

    /**
     * Get headers
     * @return string headers
     */
    public function getHeaders() {
        return $this->header;
    }

    /**
     * Add options to front-end edit
     * @param string $key option key
     * @param string $value option value
     */
    public function setOption($key, $value) {
        $this->options[$key] = $value;
    }

    /**
     * Get front-end options
     * @param string $key option key
     * @return string front-end option
     */
    public function getOption($key) {
        return isset($this->options[$key]) ? $this->options[$key] : null;
    }

    /**
     * Get all saved data
     * @return array(string) all data
     */
    public function getArray() {
        return $this->data;
    }

    /**
     * Print saved data
     * Only when build !
     */
    public function printData() {
        print_r($this->data);
    }


}
