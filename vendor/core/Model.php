<?php
/*
 * Blitz Framework - Small Framework to PHP
 * Copyright (C) 2016 Fernando Batels <luisfbatels@gmail.com>
 */

namespace blitz\vendor\core;
use blitz\vendor\core\helpers\Logs as log;

/**
 * Base Model
 *
 * @author Fernando Batels <luisfbatels@gmail.com>
 */
abstract class Model {

    /**
     * Method to import class models
     * 
     * @param type $name - Name Class
     */
    public static function import($name) {
        $name = ucfirst($name);
        $src = \blitz\vendor\Bootstrap::$settings['app_src'] . '/models/' . $name . '.php';
        if (file_exists($src)) {

            require_once $src;
        } else {
            echo "Sorry, but {$name} model not found :(";
            exit();
        }
    }

    /**
     * Simple write file
     * @param type $src
     * @param type $content
     */
    protected function writeFile($src, $content, $append = false) {

        file_put_contents($src, $content, $append ? FILE_APPEND : 0);
    }

    /**
     * Write file in private folder app
     * @param type $src
     * @param type $content
     */
    protected function writePrivateFile($src, $content, $append = false) {
        $this->writeFile(\blitz\vendor\Bootstrap::$settings['storage_src'] . '/private/' . $src, $content, $append);
    }

    /**
     * Write file in public folder app
     * @param type $src
     * @param type $content
     */
    protected function writePublicFile($src, $content, $append = false) {
        $this->writeFile(\blitz\vendor\Bootstrap::$settings['storage_src'] . '/public/' . $src, $content, $append);
    }

    /**
     * Simple read file
     * @param type $src
     */
    protected function readFile($src) {
        return file_get_contents($src);
    }

    /**
     * Read file in private folder app
     * @param type $src
     */
    protected function readPrivateFile($src) {
        return $this->readFile(\blitz\vendor\Bootstrap::$settings['storage_src'] . '/private/' . $src);
    }

    /**
     * Read file in public folder app
     * @param type $src
     */
    protected function readPublicFile($src) {
        return $this->readFile(\blitz\vendor\Bootstrap::$settings['storage_src'] . '/public/' . $src);
    }

    /**
     * Simple delete file
     * @param type $src
     */
    protected function deleteFile($src) {
        unlink($src);
    }

    /**
     * Delete file in private folder
     * @param type $src
     */
    protected function deletePrivateFile($src) {
        $this->deleteFile(\blitz\vendor\Bootstrap::$settings['storage_src'] . '/private/' . $src);
    }

    /**
     * Delete file in public folder
     * @param type $src
     */
    protected function deletePublicFile($src) {
        $this->deleteFile(\blitz\vendor\Bootstrap::$settings['storage_src'] . '/public/' . $src);
    }

    /**
     * Check if file/folder exists
     * @param type $src
     * @return type
     */
    protected function existFile($src) {
        return file_exists($src);
    }

    /**
     * Check if file/folder exists in private folder app
     * 
     * @param type $src
     */
    protected function existPrivateFile($src) {
        return $this->existFile(\blitz\vendor\Bootstrap::$settings['storage_src'] . '/private/' . $src);
    }

    /**
     * 
     * Check if file/folder exists in public folder app
     * @param type $src
     * @return type
     */
    protected function existPublicFile($src) {
        return $this->existFile(\blitz\vendor\Bootstrap::$settings['storage_src'] . '/public/' . $src);
    }

    /**
     * Make folders
     */
    protected function mkdirs($src, $mode = 0760) {
        mkdir($src, $mode);
    }

    /**
     * Make folders in private folder app
     */
    protected function mkdirsPrivate($src, $mode = 0760) {
        $this->mkdirs(\blitz\vendor\Bootstrap::$settings['storage_src'] . '/private/' . $src, $mode);
    }

    /**
     * Make folders in public folder app
     * @param type $src
     * @param type $mode
     */
    protected function mkdirsPublic($src, $mode = 0760) {
        $this->mkdirs(\blitz\vendor\Bootstrap::$settings['storage_src'] . '/public/' . $src, $mode);
    }

    public function log($content, $src = null) {
        $src == null?log::log($content):log::log($content, $src);
    }


}
