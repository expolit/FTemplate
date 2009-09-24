<?php
class FTemplate_Expression_Constant extends FTemplate_Expression_Base
{
    public function getRegExp()
    {
        return '[a-zA-Z_]\w+ (?!\w)';
    }

    public function parse(array $matches)
    {
        return $matches[0];
    }
}