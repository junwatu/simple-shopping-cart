<?php
/**
 * User: Equan Pr.
 * Date: 3/30/13
 * Time: 6:34 AM
 */

namespace SimpleStore;

class Helper {

    private function html($text)
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }

    public function htmlout($text)
    {
        echo $this->html($text);
    }
}