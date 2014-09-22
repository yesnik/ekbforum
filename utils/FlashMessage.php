<?php

namespace utils;

/**
 * Class FlashMessage
 * Используется для показа пользователям сообщений об ошибке или успехе операции
 *
 * @package utils
 */
class FlashMessage {
    private $errorMessages = array();
    private $successMessages = array();

    /**
     * Добавить сообщение об ошибке
     * @param string $message
     */
    public function addError ($message = '')
    {
        if ($message) {
            $this->errorMessages[] = $message;
        }
    }

    /**
     * Добавить сообщение об успешной операции
     * @param string $message
     */
    public function addSuccess ($message = '')
    {
        if ($message) {
            $this->successMessages[] = $message;
        }
    }

    /**
     * Возвращает html с сообщениями
     * @return string
     */
    public function getHtml ()
    {
        $html = '';
        if ($this->errorMessages) {
            $html .= '<ul class="flash-messages flash-messages_error">';
            foreach ($this->errorMessages as $msg) {
                $html .= '<li>' . $msg . '</li>';
            }
            $html .= '</ul>';
        }

        if ($this->successMessages) {
            $html .= '<ul class="flash-messages flash-messages_success">';
            foreach ($this->successMessages as $msg) {
                $html .= '<li>' . $msg . '</li>';
            }
            $html .= '</ul>';
        }
        return $html;
    }

    /**
     * Есть ли флеш-сообщения для показа пользователю
     * @return bool
     */
    public function exists ()
    {
        return (sizeof($this->errorMessages) > 0 || sizeof($this->successMessages) > 0);
    }
}