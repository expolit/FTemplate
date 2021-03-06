<?php
class FTemplate_Compiler_Context_Template
    extends FTemplate_Compiler_Context_NodeList
{
    protected $_name;

    protected $_args = array();

    protected $_items = array();

    public function __construct($context, $name)
    {
        $this->_name = $name;
    }

    public function addArg($name, $default = null)
    {
        if ($this->_name == 'main') {
            $this->_context->error('Template <main> can not have arguments!');
        }

        if (isset($this->_args[$name])) {
            $this->_context->error(
                "Argument with name <$name> already exists"
            );
        }

        $this->_args[$name] = $default;
    }

    protected function _checkName($name)
    {

    }

    public function getQuotedName()
    {
        return '_' . str_replace('-', '_', $this->_name);
    }

    public function getName()
    {
        return $this->_name;
    }

}