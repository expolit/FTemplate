<?php
class FTemplate_Expression_Var extends FTemplate_Expression
{

    public static function getRegEx()
    {
        return '\$(\w+)((:?\.\w+|\[T_EXPRESSION\])+)';
    }

    public function replace(array $matches)
    {
        // $xxx
        $return = '$this->_vars[\'' . $matches[1] . '\']';

        // a.b.c[T_EXPRESSION].e -> ['a']['b']['c'][T_EXPRESSION]['e']
        //@todo add support of: $a.b.c->e.g[T_EXPRESSION]->gg;
        if (!empty($matches[2])) {
            $tmp = $matches[2];

            $tmp = strtr($tmp, array(
                '[' => "'][",
                '].' => "]['",
                '.' => "']['"
            ));

            $return .= "['$tmp']";
        }

        return $return;
    }

}
