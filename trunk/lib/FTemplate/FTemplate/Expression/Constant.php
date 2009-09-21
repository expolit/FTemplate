<?php
class FTemplate_Expression_Constant extends FTemplate_Expression_Base
{

    public static function getRegExp()
    {
        return '[a-zA-Z_]\w+';
    }

    public function parse(array $matches)
    {
        return $matches[0];
    }

}