<?php

namespace Nelmio\ApiDocBundle\Parser;

class OutputArrayParser implements ParserInterface, PostParserInterface
{
    const RETURN_KEY = '[]';

    /**
     * @var ParserInterface
     */
    private $parser;

    /**
     * @param ParserInterface $parser
     */
    public function __construct(ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(array $item)
    {
        list($className, $type) = $this->getClassType($item);

        if (empty($className) || empty($type)) {
            return false;
        }

        $item['class'] = $className;

        return $this->parser->supports($item);
    }

    /**
     * {@inheritdoc}
     */
    public function parse(array $item)
    {
        list($classNameWithNamespace, $type) = $this->getClassType($item);

        if (empty($classNameWithNamespace) || empty($type)) {
            return false;
        }

        $className = explode("\\", $classNameWithNamespace);

        $item['class'] = $classNameWithNamespace;

        $returnData = array(
            'dataType' => $type,
            'required' => true,
            'description' => sprintf("%s of objects (%s)", $type, end($className)),
            'readonly' => false,
            'children' => $this->parser->parse($item)
        );

        return array(self::RETURN_KEY => $returnData);
    }

    /**
     * @inheritdoc
     */
    public function postParse(array $item, array $parameters)
    {
        $parameters = $parameters[self::RETURN_KEY]['children'];
        if ($this->parser instanceof PostParserInterface) {
            $parameters = $this->parser->postParse($item, $parameters);
        }

        return array(
            self::RETURN_KEY => array('children' => $parameters)
        );
    }

    /**
     * @param array $item
     *
     * @return array
     */
    private function getClassType(array $item)
    {
        $className = $type = '';

        if (preg_match('/(.+)\<(.+)\>/', $item['class'], $match)) {
            $className = $match[2];
            $type = $match[1];
        }

        return array($className, $type);
    }

}
