<?php

/*
 * This file is part of the NelmioApiDocBundle.
 *
 * (c) Nelmio <hello@nelm.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nelmio\ApiDocBundle\Tests\Formatter;

use Nelmio\ApiDocBundle\DataTypes;
use Nelmio\ApiDocBundle\Tests\WebTestCase;

class SimpleFormatterWithIntersectKeyTest extends SimpleFormatterTest
{
    public function testFormat()
    {
        $container = $this->getContainer();
        $extractor = $container->get('nelmio_api_doc.extractor.api_doc_extractor');
        set_error_handler(array($this, 'handleDeprecation'));
        $extractor->setIntersectKey(true);
        $data      = $extractor->all();
        restore_error_handler();
        $result    = $container->get('nelmio_api_doc.formatter.simple_formatter')->format($data);

        $expected = array (
            '/discriminators' =>
                array (
                    0 =>
                        array (
                            'method' => 'GET',
                            'uri' => '/discriminators',
                            'description' => 'Action with discriminator class in response',
                            'response' =>
                                array (
                                    'foo' =>
                                        array (
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                        ),
                                ),
                            'responseDiscriminatorClasses' =>
                                array (
                                    'DiscriminatorClass' =>
                                        array (
                                            'foo' =>
                                                array (
                                                    'dataType' => 'string',
                                                    'actualType' => 'string',
                                                    'subType' => NULL,
                                                    'required' => false,
                                                    'default' => NULL,
                                                    'description' => '',
                                                    'readonly' => false,
                                                    'sinceVersion' => NULL,
                                                    'untilVersion' => NULL,
                                                ),
                                            'bar' =>
                                                array (
                                                    'dataType' => 'string',
                                                    'actualType' => 'string',
                                                    'subType' => NULL,
                                                    'required' => false,
                                                    'default' => NULL,
                                                    'description' => '',
                                                    'readonly' => false,
                                                    'sinceVersion' => NULL,
                                                    'untilVersion' => NULL,
                                                ),
                                            'type' =>
                                                array (
                                                    'dataType' => 'string',
                                                    'required' => true,
                                                    'readonly' => false,
                                                    'format' => NULL,
                                                    'description' => 'type = type1',
                                                    'sinceVersion' => NULL,
                                                    'untilVersion' => NULL,
                                                ),
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    1 =>
                        array (
                            'method' => 'POST',
                            'uri' => '/discriminators',
                            'description' => 'Action with discriminator class in request params',
                            'parameters' =>
                                array (
                                    'foo' =>
                                        array (
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                        ),
                                ),
                            'requestDiscriminatorClasses' =>
                                array (
                                    'DiscriminatorClass' =>
                                        array (
                                            'foo' =>
                                                array (
                                                    'dataType' => 'string',
                                                    'actualType' => 'string',
                                                    'subType' => NULL,
                                                    'required' => false,
                                                    'default' => NULL,
                                                    'description' => '',
                                                    'readonly' => false,
                                                    'sinceVersion' => NULL,
                                                    'untilVersion' => NULL,
                                                ),
                                            'bar' =>
                                                array (
                                                    'dataType' => 'string',
                                                    'actualType' => 'string',
                                                    'subType' => NULL,
                                                    'required' => false,
                                                    'default' => NULL,
                                                    'description' => '',
                                                    'readonly' => false,
                                                    'sinceVersion' => NULL,
                                                    'untilVersion' => NULL,
                                                ),
                                            'type' =>
                                                array (
                                                    'dataType' => 'string',
                                                    'required' => true,
                                                    'readonly' => false,
                                                    'format' => NULL,
                                                    'description' => 'type = type1',
                                                    'sinceVersion' => NULL,
                                                    'untilVersion' => NULL,
                                                ),
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                ),
            '/tests' =>
                array (
                    0 =>
                        array (
                            'method' => 'GET',
                            'uri' => '/tests.{_format}',
                            'description' => 'index action',
                            'filters' =>
                                array (
                                    'a' =>
                                        array (
                                            'dataType' => 'integer',
                                        ),
                                    'b' =>
                                        array (
                                            'dataType' => 'string',
                                            'arbitrary' =>
                                                array (
                                                    0 => 'arg1',
                                                    1 => 'arg2',
                                                ),
                                        ),
                                ),
                            'requirements' =>
                                array (
                                    '_format' =>
                                        array (
                                            'requirement' => '',
                                            'dataType' => '',
                                            'description' => '',
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    1 =>
                        array (
                            'method' => 'GET',
                            'uri' => '/tests.{_format}',
                            'description' => 'index action',
                            'filters' =>
                                array (
                                    'a' =>
                                        array (
                                            'dataType' => 'integer',
                                        ),
                                    'b' =>
                                        array (
                                            'dataType' => 'string',
                                            'arbitrary' =>
                                                array (
                                                    0 => 'arg1',
                                                    1 => 'arg2',
                                                ),
                                        ),
                                ),
                            'requirements' =>
                                array (
                                    '_format' =>
                                        array (
                                            'requirement' => '',
                                            'dataType' => '',
                                            'description' => '',
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    2 =>
                        array (
                            'method' => 'POST',
                            'uri' => '/tests.{_format}',
                            'host' => 'api.test.dev',
                            'description' => 'create test',
                            'parameters' =>
                                array (
                                    'a' =>
                                        array (
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'default' => NULL,
                                            'required' => true,
                                            'description' => 'A nice description',
                                            'readonly' => false,
                                        ),
                                    'b' =>
                                        array (
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'default' => NULL,
                                            'required' => false,
                                            'description' => NULL,
                                            'readonly' => false,
                                        ),
                                    'c' =>
                                        array (
                                            'dataType' => 'boolean',
                                            'actualType' => 'boolean',
                                            'subType' => NULL,
                                            'default' => false,
                                            'required' => true,
                                            'description' => NULL,
                                            'readonly' => false,
                                        ),
                                    'd' =>
                                        array (
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'default' => 'DefaultTest',
                                            'required' => true,
                                            'description' => NULL,
                                            'readonly' => false,
                                        ),
                                ),
                            'requirements' =>
                                array (
                                    '_format' =>
                                        array (
                                            'requirement' => '',
                                            'dataType' => '',
                                            'description' => '',
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    3 =>
                        array (
                            'method' => 'POST',
                            'uri' => '/tests.{_format}',
                            'host' => 'api.test.dev',
                            'description' => 'create test',
                            'parameters' =>
                                array (
                                    'a' =>
                                        array (
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'default' => NULL,
                                            'required' => true,
                                            'description' => 'A nice description',
                                            'readonly' => false,
                                        ),
                                    'b' =>
                                        array (
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'default' => NULL,
                                            'required' => false,
                                            'description' => NULL,
                                            'readonly' => false,
                                        ),
                                    'c' =>
                                        array (
                                            'dataType' => 'boolean',
                                            'actualType' => 'boolean',
                                            'subType' => NULL,
                                            'default' => false,
                                            'required' => true,
                                            'description' => NULL,
                                            'readonly' => false,
                                        ),
                                    'd' =>
                                        array (
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'default' => 'DefaultTest',
                                            'required' => true,
                                            'description' => NULL,
                                            'readonly' => false,
                                        ),
                                ),
                            'requirements' =>
                                array (
                                    '_format' =>
                                        array (
                                            'requirement' => '',
                                            'dataType' => '',
                                            'description' => '',
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                ),
            '/tests2' =>
                array (
                    0 =>
                        array (
                            'method' => 'POST',
                            'uri' => '/tests2.{_format}',
                            'description' => 'post test 2',
                            'requirements' =>
                                array (
                                    '_format' =>
                                        array (
                                            'requirement' => '',
                                            'dataType' => '',
                                            'description' => '',
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                ),
            'TestResource' =>
                array (
                    0 =>
                        array (
                            'method' => 'ANY',
                            'uri' => '/named-resource',
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                ),
            'others' =>
                array (
                    0 =>
                        array (
                            'method' => 'POST',
                            'uri' => '/another-post',
                            'description' => 'create another test',
                            'parameters' =>
                                array (
                                    'dependency_type' =>
                                        array (
                                            'required' => true,
                                            'readonly' => false,
                                            'description' => '',
                                            'default' => NULL,
                                            'dataType' => 'object (DependencyType)',
                                            'actualType' => 'model',
                                            'subType' => 'Nelmio\ApiDocBundle\Tests\Fixtures\Form\DependencyType',
                                            'children' =>
                                                array (
                                                    'a' =>
                                                        array (
                                                            'dataType' => 'string',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'default' => NULL,
                                                            'required' => true,
                                                            'description' => 'A nice description',
                                                            'readonly' => false,
                                                        ),
                                                ),
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    1 =>
                        array (
                            'method' => 'ANY',
                            'uri' => '/any',
                            'description' => 'Action without HTTP verb',
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    2 =>
                        array (
                            'method' => 'ANY',
                            'uri' => '/any/{foo}',
                            'description' => 'Action without HTTP verb',
                            'requirements' =>
                                array (
                                    'foo' =>
                                        array (
                                            'requirement' => '',
                                            'dataType' => '',
                                            'description' => '',
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    3 =>
                        array (
                            'method' => 'ANY',
                            'uri' => '/authenticated',
                            'https' => false,
                            'authentication' => true,
                            'authenticationRoles' =>
                                array (
                                    0 => 'ROLE_USER',
                                    1 => 'ROLE_FOOBAR',
                                ),
                            'deprecated' => false,
                        ),
                    4 =>
                        array (
                            'method' => 'POST',
                            'uri' => '/jms-input-test',
                            'description' => 'Testing JMS',
                            'parameters' =>
                                array (
                                    'foo' =>
                                        array (
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                        ),
                                    'bar' =>
                                        array (
                                            'dataType' => 'DateTime',
                                            'actualType' => 'datetime',
                                            'subType' => NULL,
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => true,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                        ),
                                    'number' =>
                                        array (
                                            'dataType' => 'double',
                                            'actualType' => 'float',
                                            'subType' => NULL,
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                        ),
                                    'arr' =>
                                        array (
                                            'dataType' => 'array',
                                            'actualType' => 'collection',
                                            'subType' => NULL,
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                        ),
                                    'nested' =>
                                        array (
                                            'dataType' => 'object (JmsNested)',
                                            'actualType' => 'model',
                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\JmsNested',
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                            'children' =>
                                                array (
                                                    'foo' =>
                                                        array (
                                                            'dataType' => 'DateTime',
                                                            'actualType' => 'datetime',
                                                            'subType' => NULL,
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => '',
                                                            'readonly' => true,
                                                            'sinceVersion' => NULL,
                                                            'untilVersion' => NULL,
                                                        ),
                                                    'bar' =>
                                                        array (
                                                            'dataType' => 'string',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'required' => false,
                                                            'default' => 'baz',
                                                            'description' => '',
                                                            'readonly' => false,
                                                            'sinceVersion' => NULL,
                                                            'untilVersion' => NULL,
                                                        ),
                                                    'baz' =>
                                                        array (
                                                            'dataType' => 'array of integers',
                                                            'actualType' => 'collection',
                                                            'subType' => 'integer',
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => "Epic description.

With multiple lines.",
                                                            'readonly' => false,
                                                            'sinceVersion' => NULL,
                                                            'untilVersion' => NULL,
                                                        ),
                                                    'circular' =>
                                                        array (
                                                            'dataType' => 'object (JmsNested)',
                                                            'actualType' => 'model',
                                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\JmsNested',
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => '',
                                                            'readonly' => false,
                                                            'sinceVersion' => NULL,
                                                            'untilVersion' => NULL,
                                                        ),
                                                    'parent' =>
                                                        array (
                                                            'dataType' => 'object (JmsTest)',
                                                            'actualType' => 'model',
                                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\JmsTest',
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => '',
                                                            'readonly' => false,
                                                            'sinceVersion' => NULL,
                                                            'untilVersion' => NULL,
                                                            'children' =>
                                                                array (
                                                                    'foo' =>
                                                                        array (
                                                                            'dataType' => 'string',
                                                                            'actualType' => 'string',
                                                                            'subType' => NULL,
                                                                            'required' => false,
                                                                            'default' => NULL,
                                                                            'description' => '',
                                                                            'readonly' => false,
                                                                            'sinceVersion' => NULL,
                                                                            'untilVersion' => NULL,
                                                                        ),
                                                                    'bar' =>
                                                                        array (
                                                                            'dataType' => 'DateTime',
                                                                            'actualType' => 'datetime',
                                                                            'subType' => NULL,
                                                                            'required' => false,
                                                                            'default' => NULL,
                                                                            'description' => '',
                                                                            'readonly' => true,
                                                                            'sinceVersion' => NULL,
                                                                            'untilVersion' => NULL,
                                                                        ),
                                                                    'number' =>
                                                                        array (
                                                                            'dataType' => 'double',
                                                                            'actualType' => 'float',
                                                                            'subType' => NULL,
                                                                            'required' => false,
                                                                            'default' => NULL,
                                                                            'description' => '',
                                                                            'readonly' => false,
                                                                            'sinceVersion' => NULL,
                                                                            'untilVersion' => NULL,
                                                                        ),
                                                                    'arr' =>
                                                                        array (
                                                                            'dataType' => 'array',
                                                                            'actualType' => 'collection',
                                                                            'subType' => NULL,
                                                                            'required' => false,
                                                                            'default' => NULL,
                                                                            'description' => '',
                                                                            'readonly' => false,
                                                                            'sinceVersion' => NULL,
                                                                            'untilVersion' => NULL,
                                                                        ),
                                                                    'nested' =>
                                                                        array (
                                                                            'dataType' => 'object (JmsNested)',
                                                                            'actualType' => 'model',
                                                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\JmsNested',
                                                                            'required' => false,
                                                                            'default' => NULL,
                                                                            'description' => '',
                                                                            'readonly' => false,
                                                                            'sinceVersion' => NULL,
                                                                            'untilVersion' => NULL,
                                                                        ),
                                                                    'nested_array' =>
                                                                        array (
                                                                            'dataType' => 'array of objects (JmsNested)',
                                                                            'actualType' => 'collection',
                                                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\JmsNested',
                                                                            'required' => false,
                                                                            'default' => NULL,
                                                                            'description' => '',
                                                                            'readonly' => false,
                                                                            'sinceVersion' => NULL,
                                                                            'untilVersion' => NULL,
                                                                        ),
                                                                ),
                                                        ),
                                                    'since' =>
                                                        array (
                                                            'dataType' => 'string',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => '',
                                                            'readonly' => false,
                                                            'sinceVersion' => '0.2',
                                                            'untilVersion' => NULL,
                                                        ),
                                                    'until' =>
                                                        array (
                                                            'dataType' => 'string',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => '',
                                                            'readonly' => false,
                                                            'sinceVersion' => NULL,
                                                            'untilVersion' => '0.3',
                                                        ),
                                                    'since_and_until' =>
                                                        array (
                                                            'dataType' => 'string',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => '',
                                                            'readonly' => false,
                                                            'sinceVersion' => '0.4',
                                                            'untilVersion' => '0.5',
                                                        ),
                                                ),
                                        ),
                                    'nested_array' =>
                                        array (
                                            'dataType' => 'array of objects (JmsNested)',
                                            'actualType' => 'collection',
                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\JmsNested',
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    5 =>
                        array (
                            'method' => 'GET',
                            'uri' => '/jms-return-test',
                            'description' => 'Testing return',
                            'response' =>
                                array (
                                    'dependency_type' =>
                                        array (
                                            'required' => true,
                                            'readonly' => false,
                                            'description' => '',
                                            'default' => NULL,
                                            'dataType' => 'object (DependencyType)',
                                            'actualType' => 'model',
                                            'subType' => 'Nelmio\ApiDocBundle\Tests\Fixtures\Form\DependencyType',
                                            'children' =>
                                                array (
                                                    'a' =>
                                                        array (
                                                            'dataType' => 'string',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'default' => NULL,
                                                            'required' => true,
                                                            'description' => 'A nice description',
                                                            'readonly' => false,
                                                        ),
                                                ),
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    6 =>
                        array (
                            'method' => 'ANY',
                            'uri' => '/my-commented/{id}/{page}/{paramType}/{param}',
                            'description' => 'This method is useful to test if the getDocComment works.',
                            'documentation' => 'This method is useful to test if the getDocComment works.
And, it supports multilines until the first \'@\' char.',
                            'requirements' =>
                                array (
                                    'id' =>
                                        array (
                                            'dataType' => 'int',
                                            'description' => 'A nice comment',
                                            'requirement' => '',
                                        ),
                                    'page' =>
                                        array (
                                            'dataType' => 'int',
                                            'description' => '',
                                            'requirement' => '',
                                        ),
                                    'paramType' =>
                                        array (
                                            'dataType' => 'int',
                                            'description' => 'The param type',
                                            'requirement' => '',
                                        ),
                                    'param' =>
                                        array (
                                            'dataType' => 'int',
                                            'description' => 'The param id',
                                            'requirement' => '',
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    7 =>
                        array (
                            'method' => 'ANY',
                            'uri' => '/return-nested-output',
                            'response' =>
                                array (
                                    'foo' =>
                                        array (
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                        ),
                                    'bar' =>
                                        array (
                                            'dataType' => 'DateTime',
                                            'actualType' => 'datetime',
                                            'subType' => NULL,
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => true,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                        ),
                                    'number' =>
                                        array (
                                            'dataType' => 'double',
                                            'actualType' => 'float',
                                            'subType' => NULL,
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                        ),
                                    'arr' =>
                                        array (
                                            'dataType' => 'array',
                                            'actualType' => 'collection',
                                            'subType' => NULL,
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                        ),
                                    'nested' =>
                                        array (
                                            'dataType' => 'object (JmsNested)',
                                            'actualType' => 'model',
                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\JmsNested',
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                            'children' =>
                                                array (
                                                    'foo' =>
                                                        array (
                                                            'dataType' => 'DateTime',
                                                            'actualType' => 'datetime',
                                                            'subType' => NULL,
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => '',
                                                            'readonly' => true,
                                                            'sinceVersion' => NULL,
                                                            'untilVersion' => NULL,
                                                        ),
                                                    'bar' =>
                                                        array (
                                                            'dataType' => 'string',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'required' => false,
                                                            'default' => 'baz',
                                                            'description' => '',
                                                            'readonly' => false,
                                                            'sinceVersion' => NULL,
                                                            'untilVersion' => NULL,
                                                        ),
                                                    'baz' =>
                                                        array (
                                                            'dataType' => 'array of integers',
                                                            'actualType' => 'collection',
                                                            'subType' => 'integer',
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => "Epic description.

With multiple lines.",
                                                            'readonly' => false,
                                                            'sinceVersion' => NULL,
                                                            'untilVersion' => NULL,
                                                        ),
                                                    'circular' =>
                                                        array (
                                                            'dataType' => 'object (JmsNested)',
                                                            'actualType' => 'model',
                                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\JmsNested',
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => '',
                                                            'readonly' => false,
                                                            'sinceVersion' => NULL,
                                                            'untilVersion' => NULL,
                                                        ),
                                                    'parent' =>
                                                        array (
                                                            'dataType' => 'object (JmsTest)',
                                                            'actualType' => 'model',
                                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\JmsTest',
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => '',
                                                            'readonly' => false,
                                                            'sinceVersion' => NULL,
                                                            'untilVersion' => NULL,
                                                            'children' =>
                                                                array (
                                                                    'foo' =>
                                                                        array (
                                                                            'dataType' => 'string',
                                                                            'actualType' => 'string',
                                                                            'subType' => NULL,
                                                                            'required' => false,
                                                                            'default' => NULL,
                                                                            'description' => '',
                                                                            'readonly' => false,
                                                                            'sinceVersion' => NULL,
                                                                            'untilVersion' => NULL,
                                                                        ),
                                                                    'bar' =>
                                                                        array (
                                                                            'dataType' => 'DateTime',
                                                                            'actualType' => 'datetime',
                                                                            'subType' => NULL,
                                                                            'required' => false,
                                                                            'default' => NULL,
                                                                            'description' => '',
                                                                            'readonly' => true,
                                                                            'sinceVersion' => NULL,
                                                                            'untilVersion' => NULL,
                                                                        ),
                                                                    'number' =>
                                                                        array (
                                                                            'dataType' => 'double',
                                                                            'actualType' => 'float',
                                                                            'subType' => NULL,
                                                                            'required' => false,
                                                                            'default' => NULL,
                                                                            'description' => '',
                                                                            'readonly' => false,
                                                                            'sinceVersion' => NULL,
                                                                            'untilVersion' => NULL,
                                                                        ),
                                                                    'arr' =>
                                                                        array (
                                                                            'dataType' => 'array',
                                                                            'actualType' => 'collection',
                                                                            'subType' => NULL,
                                                                            'required' => false,
                                                                            'default' => NULL,
                                                                            'description' => '',
                                                                            'readonly' => false,
                                                                            'sinceVersion' => NULL,
                                                                            'untilVersion' => NULL,
                                                                        ),
                                                                    'nested' =>
                                                                        array (
                                                                            'dataType' => 'object (JmsNested)',
                                                                            'actualType' => 'model',
                                                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\JmsNested',
                                                                            'required' => false,
                                                                            'default' => NULL,
                                                                            'description' => '',
                                                                            'readonly' => false,
                                                                            'sinceVersion' => NULL,
                                                                            'untilVersion' => NULL,
                                                                        ),
                                                                    'nested_array' =>
                                                                        array (
                                                                            'dataType' => 'array of objects (JmsNested)',
                                                                            'actualType' => 'collection',
                                                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\JmsNested',
                                                                            'required' => false,
                                                                            'default' => NULL,
                                                                            'description' => '',
                                                                            'readonly' => false,
                                                                            'sinceVersion' => NULL,
                                                                            'untilVersion' => NULL,
                                                                        ),
                                                                ),
                                                        ),
                                                    'since' =>
                                                        array (
                                                            'dataType' => 'string',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => '',
                                                            'readonly' => false,
                                                            'sinceVersion' => '0.2',
                                                            'untilVersion' => NULL,
                                                        ),
                                                    'until' =>
                                                        array (
                                                            'dataType' => 'string',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => '',
                                                            'readonly' => false,
                                                            'sinceVersion' => NULL,
                                                            'untilVersion' => '0.3',
                                                        ),
                                                    'since_and_until' =>
                                                        array (
                                                            'dataType' => 'string',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'required' => false,
                                                            'default' => NULL,
                                                            'description' => '',
                                                            'readonly' => false,
                                                            'sinceVersion' => '0.4',
                                                            'untilVersion' => '0.5',
                                                        ),
                                                ),
                                        ),
                                    'nested_array' =>
                                        array (
                                            'dataType' => 'array of objects (JmsNested)',
                                            'actualType' => 'collection',
                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\JmsNested',
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'sinceVersion' => NULL,
                                            'untilVersion' => NULL,
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    8 =>
                        array (
                            'method' => 'ANY',
                            'uri' => '/secure-route',
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    9 =>
                        array (
                            'method' => 'ANY',
                            'uri' => '/yet-another/{id}',
                            'requirements' =>
                                array (
                                    'id' =>
                                        array (
                                            'requirement' => '\\d+',
                                            'dataType' => '',
                                            'description' => '',
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    10 =>
                        array (
                            'method' => 'GET',
                            'uri' => '/z-action-with-deprecated-indicator',
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => true,
                        ),
                    11 =>
                        array (
                            'method' => 'POST',
                            'uri' => '/z-action-with-nullable-request-param',
                            'parameters' =>
                                array (
                                    'param1' =>
                                        array (
                                            'required' => false,
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'description' => 'Param1 description.',
                                            'readonly' => false,
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    12 =>
                        array (
                            'method' => 'GET',
                            'uri' => '/z-action-with-query-param',
                            'filters' =>
                                array (
                                    'page' =>
                                        array (
                                            'requirement' => '\\d+',
                                            'description' => 'Page of the overview.',
                                            'default' => '1',
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    13 =>
                        array (
                            'method' => 'GET',
                            'uri' => '/z-action-with-query-param-no-default',
                            'filters' =>
                                array (
                                    'page' =>
                                        array (
                                            'requirement' => '\\d+',
                                            'description' => 'Page of the overview.',
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    14 =>
                        array (
                            'method' => 'GET',
                            'uri' => '/z-action-with-query-param-strict',
                            'requirements' =>
                                array (
                                    'page' =>
                                        array (
                                            'requirement' => '\\d+',
                                            'dataType' => '',
                                            'description' => 'Page of the overview.',
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    15 =>
                        array (
                            'method' => 'POST',
                            'uri' => '/z-action-with-request-param',
                            'parameters' =>
                                array (
                                    'param1' =>
                                        array (
                                            'required' => true,
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'description' => 'Param1 description.',
                                            'readonly' => false,
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    16 =>
                        array (
                            'method' => 'ANY',
                            'uri' => '/z-return-jms-and-validator-output',
                            'response' =>
                                array (
                                    'bar' =>
                                        array (
                                            'default' => NULL,
                                            'actualType' => 'datetime',
                                            'subType' => NULL,
                                            'dataType' => 'DateTime',
                                            'readonly' => false,
                                            'required' => false,
                                            'description' => '',
                                        ),
                                    'objects' =>
                                        array (
                                            'default' => NULL,
                                            'actualType' => 'collection',
                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\Test',
                                            'dataType' => 'array of objects (Test)',
                                            'children' =>
                                                array (
                                                    'a' =>
                                                        array (
                                                            'default' => 'nelmio',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'format' => '{length: min: foo}, {not blank}',
                                                            'required' => true,
                                                            'dataType' => 'string',
                                                            'readonly' => false,
                                                        ),
                                                    'b' =>
                                                        array (
                                                            'default' => NULL,
                                                            'actualType' => DataTypes::MODEL,
                                                            'subType' => NULL,
                                                            'dataType' => 'object (DateTime)',
                                                            'readonly' => null,
                                                            'required' => null,
                                                        ),
                                                ),
                                            'readonly' => false,
                                            'required' => false,
                                            'description' => '',
                                        ),
                                    'related' =>
                                        array (
                                            'dataType' => 'object (Test)',
                                            'actualType' => 'model',
                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\Test',
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'children' =>
                                                array (
                                                    'a' =>
                                                        array (
                                                            'default' => 'nelmio',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'format' => '{length: min: foo}, {not blank}',
                                                            'required' => true,
                                                            'dataType' => 'string',
                                                            'readonly' => false,
                                                            'description' => '',
                                                        ),
                                                    'b' =>
                                                        array (
                                                            'default' => NULL,
                                                            'actualType' => DataTypes::MODEL,
                                                            'subType' => NULL,
                                                            'dataType' => 'object (DateTime)',
                                                            'readonly' => false,
                                                            'required' => false,
                                                            'description' => '',
                                                        ),
                                                ),
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    17 =>
                        array (
                            'method' => 'ANY',
                            'uri' => '/z-return-selected-parsers-input',
                            'parameters' =>
                                array (
                                    'a' =>
                                        array (
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'default' => NULL,
                                            'required' => true,
                                            'description' => 'A nice description',
                                            'readonly' => false,
                                        ),
                                    'b' =>
                                        array (
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'default' => NULL,
                                            'required' => false,
                                            'description' => NULL,
                                            'readonly' => false,
                                        ),
                                    'c' =>
                                        array (
                                            'dataType' => 'boolean',
                                            'actualType' => 'boolean',
                                            'subType' => NULL,
                                            'default' => false,
                                            'required' => true,
                                            'description' => NULL,
                                            'readonly' => false,
                                        ),
                                    'd' =>
                                        array (
                                            'dataType' => 'string',
                                            'actualType' => 'string',
                                            'subType' => NULL,
                                            'default' => 'DefaultTest',
                                            'required' => true,
                                            'description' => NULL,
                                            'readonly' => false,
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                    18 =>
                        array (
                            'method' => 'ANY',
                            'uri' => '/z-return-selected-parsers-output',
                            'response' =>
                                array (
                                    'bar' =>
                                        array (
                                            'default' => NULL,
                                            'actualType' => 'datetime',
                                            'subType' => NULL,
                                            'dataType' => 'DateTime',
                                            'readonly' => false,
                                            'required' => false,
                                            'description' => '',
                                        ),
                                    'objects' =>
                                        array (
                                            'default' => NULL,
                                            'actualType' => 'collection',
                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\Test',
                                            'dataType' => 'array of objects (Test)',
                                            'children' =>
                                                array (
                                                    'a' =>
                                                        array (
                                                            'default' => 'nelmio',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'format' => '{length: min: foo}, {not blank}',
                                                            'required' => true,
                                                            'dataType' => 'string',
                                                            'readonly' => false,
                                                        ),
                                                    'b' =>
                                                        array (
                                                            'default' => null,
                                                            'actualType' => 'model',
                                                            'subType' => null,
                                                            'dataType' => 'object (DateTime)',
                                                            'readonly' => null,
                                                            'required' => null,
                                                        ),
                                                ),
                                            'readonly' => false,
                                            'required' => false,
                                            'description' => '',
                                        ),
                                    'related' =>
                                        array (
                                            'dataType' => 'object (Test)',
                                            'actualType' => 'model',
                                            'subType' => 'Nelmio\\ApiDocBundle\\Tests\\Fixtures\\Model\\Test',
                                            'required' => false,
                                            'default' => NULL,
                                            'description' => '',
                                            'readonly' => false,
                                            'children' =>
                                                array (
                                                    'a' =>
                                                        array (
                                                            'default' => 'nelmio',
                                                            'actualType' => 'string',
                                                            'subType' => NULL,
                                                            'format' => '{length: min: foo}, {not blank}',
                                                            'required' => true,
                                                            'dataType' => 'string',
                                                            'readonly' => false,
                                                            'description' => '',
                                                        ),
                                                    'b' =>
                                                        array (
                                                            'default' => NULL,
                                                            'actualType' => 'model',
                                                            'subType' => NULL,
                                                            'dataType' => 'object (DateTime)',
                                                            'readonly' => false,
                                                            'required' => false,
                                                            'description' => '',
                                                        ),
                                                ),
                                        ),
                                ),
                            'https' => false,
                            'authentication' => false,
                            'authenticationRoles' =>
                                array (
                                ),
                            'deprecated' => false,
                        ),
                ),
        );

        $this->assertEquals($expected, $result);
    }

    public function testFormatOne()
    {
        $container = $this->getContainer();

        $extractor  = $container->get('nelmio_api_doc.extractor.api_doc_extractor');
        $annotation = $extractor->get('Nelmio\ApiDocBundle\Tests\Fixtures\Controller\TestController::indexAction', 'test_route_1');
        $result     = $container->get('nelmio_api_doc.formatter.simple_formatter')->formatOne($annotation);

        $expected = array(
            'method' => 'GET',
            'uri' => '/tests.{_format}',
            'description' => 'index action',
            'filters' => array(
                'a' => array(
                    'dataType' => 'integer',
                ),
                'b' => array(
                    'dataType' => 'string',
                    'arbitrary' => array(
                        'arg1',
                        'arg2',
                    ),
                ),
            ),
            'requirements' => array(
                '_format' => array('dataType' => '', 'description' => '', 'requirement' => ''),
            ),
            'https' => false,
            'authentication' => false,
            'authenticationRoles' => array(),
            'deprecated' => false,
        );

        $this->assertEquals($expected, $result);
    }
}
