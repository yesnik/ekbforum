<?php

namespace utils;

class FlashMessage {
    private $errorMessages = array();
    private $successMessages = array();

    public function addError ($message = '')
    {
        if ($message) {
            $this->errorMessages[] = $message;
        }
    }

    public function addSuccess ($message = '')
    {
        if ($message) {
            $this->successMessages[] = $message;
        }
    }

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
}