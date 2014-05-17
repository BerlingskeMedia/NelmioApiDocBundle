<?php

/*
 * This file is part of the NelmioApiDocBundle.
 *
 * (c) Nelmio <hello@nelm.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nelmio\ApiDocBundle\Annotation;

use Symfony\Component\Routing\Route;

/**
 * @Annotation
 */
class ApiDoc
{
    /**
     * Requirements are mandatory parameters in a route.
     *
     * @var array
     */
    private $requirements = array();

    /**
     * Filters are optional parameters in the query string.
     *
     * @var array
     */
    private $filters = array();

    /**
     * Parameters are data a client can send.
     *
     * @var array
     */
    private $parameters = array();

    /**
     * @var string
     */
    private $input = null;

    /**
     * @var string
     */
    private $output = null;

    /**
     * @var string
     */
    private $link = null;

    /**
     * Most of the time, a single line of text describing the action.
     *
     * @var string
     */
    private $description = null;

    /**
     * Section to group actions together.
     *
     * @var string
     */
    private $section = null;

    /**
     * Extended documentation.
     *
     * @var string
     */
    private $documentation = null;

    /**
     * @var Boolean
     */
    private $resource = false;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $uri;

    /**
     * @var array
     */
    private $response = array();

    /**
     * @var Route
     */
    private $route;

    /**
     * @var boolean
     */
    private $https = false;

    /**
     * @var boolean
     */
    private $authentication = false;

    /**
     * @var array
     */
    private $authenticationRoles = array();

    /**
     * @var int
     */
    private $cache;

    /**
     * @var boolean
     */
    private $deprecated = false;

    /**
     * @var array
     */
    private $statusCodes = array();

    /**
     * @var string
     */
    private $requestBodyExample;

    /**
     * @var string
     */
    private $responseBodyExample;
    
    /**
     * @var array
     */
    private $requestDiscriminatorClasses;

    /**
     * @var array
     */
    private $responseDiscriminatorClasses;

    /**
     * @var array
     */
    private $headers;

    public function __construct(array $data)
    {
        $this->resource = !empty($data['resource']) ? $data['resource'] : false;

        if (isset($data['description'])) {
            $this->description = $data['description'];
        }

        if (isset($data['input'])) {
            $this->input = $data['input'];
        } elseif (isset($data['filters'])) {
            foreach ($data['filters'] as $filter) {
                if (!isset($filter['name'])) {
                    throw new \InvalidArgumentException('A "filter" element has to contain a "name" attribute');
                }

                $name = $filter['name'];
                unset($filter['name']);

                $this->addFilter($name, $filter);
            }
        }

        if (isset($data['headers'])) {
            foreach ($data['headers'] as $header) {
                if (!isset($header['name'])) {
                    throw new \InvalidArgumentException('A "headers" element has to contain a "name" attribute');
                }

                $name = $header['name'];
                unset($header['name']);

                $this->addHeader($name, $header);
            }
        }

        if (isset($data['requirements'])) {
            foreach ($data['requirements'] as $requirement) {
                if (!isset($requirement['name'])) {
                    throw new \InvalidArgumentException('A "requirement" element has to contain a "name" attribute');
                }

                $name = $requirement['name'];
                unset($requirement['name']);

                $this->addRequirement($name, $requirement);
            }
        }

        if (isset($data['parameters'])) {
            foreach ($data['parameters'] as $parameter) {
                if (!isset($parameter['name'])) {
                    throw new \InvalidArgumentException('A "parameter" element has to contain a "name" attribute');
                }

                if (!isset($parameter['dataType'])) {
                    throw new \InvalidArgumentException(sprintf(
                        '"%s" parameter element has to contain a "dataType" attribute',
                        $parameter['name']
                    ));
                }

                $name = $parameter['name'];
                unset($parameter['name']);

                $this->addParameter($name, $parameter);
            }
        }

        if (isset($data['output'])) {
            $this->output = $data['output'];
        }

        if (isset($data['statusCodes'])) {
            foreach ($data['statusCodes'] as $statusCode => $description) {
                $this->addStatusCode($statusCode, $description);
            }
        }

        if (isset($data['authentication'])) {
            $this->setAuthentication((bool) $data['authentication']);
        }

        if (isset($data['authenticationRoles'])) {
            foreach ($data['authenticationRoles'] as $key => $role) {
                $this->authenticationRoles[] = $role;
            }
        }

        if (isset($data['cache'])) {
            $this->setCache($data['cache']);
        }

        if (isset($data['section'])) {
            $this->section = $data['section'];
        }

        if (isset($data['deprecated'])) {
            $this->deprecated = $data['deprecated'];
        }

        if (isset($data['https'])) {
            $this->https = $data['https'];
        }

        if (isset($data['requestBody'])) {
            $this->requestBodyExample = $this->addRequestBodyExample($data['requestBody']);
        }

        if (isset($data['responseBody'])) {
            $this->responseBodyExample = $this->addResponseBodyExample($data['responseBody']);
        }
    }

    /**
     * @param string|array $requestBodyExample
     * @return string
     */
    public function addRequestBodyExample($requestBodyExample)
    {
        if (is_array($requestBodyExample)) {
            $content = $this->exampleBodyFromArray($requestBodyExample);
        } else {
            $content = $requestBodyExample;
        }

        return $this->markdownBlockCodeFormater($content);
    }

    /**
     * @param string|array $responseBodyExample
     * @return string
     */
    public function addResponseBodyExample($responseBodyExample)
    {
        if (is_array($responseBodyExample)) {
            $content = $this->exampleBodyFromArray($responseBodyExample);
        } else {
            $content = $responseBodyExample;
        }

        return $this->markdownBlockCodeFormater($content);
    }

    /**
     * @param string $name
     * @param array  $filter
     */
    public function addFilter($name, array $filter)
    {
        $this->filters[$name] = $filter;
    }

    /**
     * @param string $statusCode
     * @param mixed  $description
     */
    public function addStatusCode($statusCode, $description)
    {
        $this->statusCodes[$statusCode] = !is_array($description) ? array($description) : $description;
    }

    /**
     * @param string $name
     * @param array  $requirement
     */
    public function addRequirement($name, array $requirement)
    {
        $this->requirements[$name] = $requirement;
    }

    /**
     * @param array $requirements
     */
    public function setRequirements(array $requirements)
    {
        $this->requirements = array_merge($this->requirements, $requirements);
    }

    /**
     * @return string|null
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param array $groups
     */
    public function setInputGroups(array $groups)
    {
        $this->input['groups'] = $groups;
    }

    /**
     * @return string|null
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param array $groups
     */
    public function setOutputGroups(array $groups)
    {
        $this->output['groups'] = $groups;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @param string $section
     */
    public function setSection($section)
    {
        $this->section = $section;
    }

    /**
     * @return string
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param string $documentation
     */
    public function setDocumentation($documentation)
    {
        $this->documentation = $documentation;
    }

    /**
     * @return string
     */
    public function getDocumentation()
    {
        return $this->documentation;
    }

    /**
     * @return Boolean
     */
    public function isResource()
    {
        return (bool) $this->resource;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource && is_string($this->resource) ? $this->resource : false;
    }

    /**
     * @param string $name
     * @param array  $parameter
     */
    public function addParameter($name, array $parameter)
    {
        $this->parameters[$name] = $parameter;
    }

    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Sets the responsed data as processed by the parsers - same format as parameters
     *
     * @param array $response
     */
    public function setResponse(array $response)
    {
        $this->response = $response;
    }

    /**
     * @param Route $route
     */
    public function setRoute(Route $route)
    {
        $this->route = $route;

        if (method_exists($route, 'getHost')) {
            $this->host = $route->getHost() ? : null;
        } else {
            $this->host = null;
        }

        $this->uri    = $route->getPattern();
        $this->method = $route->getRequirement('_method') ? : 'ANY';
    }

    /**
     * @return Route
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return boolean
     */
    public function getHttps()
    {
        return $this->https;
    }

    /**
     * @param boolean $https
     */
    public function setHttps($https)
    {
        $this->https = $https;
    }

    /**
     * @return boolean
     */
    public function getAuthentication()
    {
        return $this->authentication;
    }

    /**
     * @param boolean $authentication
     */
    public function setAuthentication($authentication)
    {
        $this->authentication = $authentication;
    }

    /**
     * @return array
     */
    public function getAuthenticationRoles()
    {
        return $this->authenticationRoles;
    }

    /**
     * @param array $authenticationRoles
     */
    public function setAuthenticationRoles($authenticationRoles)
    {
        $this->authenticationRoles = $authenticationRoles;
    }

    /**
     * @return int
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @param int $cache
     */
    public function setCache($cache)
    {
        $this->cache = (int) $cache;
    }

    /**
     * @return boolean
     */
    public function getDeprecated()
    {
        return $this->deprecated;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @return array
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * @param string $responseBodyExample
     */
    public function setResponseBodyExample($responseBodyExample)
    {
        $this->responseBodyExample = $responseBodyExample;
    }

    /**
     * @return string
     */
    public function getResponseBodyExample()
    {
        return $this->responseBodyExample;
    }

    /**
     * @param string $requestBodyExample
     */
    public function setRequestBodyExample($requestBodyExample)
    {
        $this->requestBodyExample = $requestBodyExample;
    }

    /**
     * @return string
     */
    public function getRequestBodyExample()
    {
        return $this->requestBodyExample;
    }

    /**
     * @param boolean $deprecated
     */
    public function setDeprecated($deprecated)
    {
        $this->deprecated = (bool) $deprecated;

        return $this;
    }

    /**
     * @param array $responseDiscriminatorClasses
     */
    public function setResponseDiscriminatorClasses($responseDiscriminatorClasses)
    {
        $this->responseDiscriminatorClasses = $responseDiscriminatorClasses;
    }

    /**
     * @return array
     */
    public function getResponseDiscriminatorClasses()
    {
        return $this->responseDiscriminatorClasses;
    }

    /**
     * @param array $requestDiscriminatorClasses
     */
    public function setRequestDiscriminatorClasses($requestDiscriminatorClasses)
    {
        $this->requestDiscriminatorClasses = $requestDiscriminatorClasses;
    }

    /**
     * @return array
     */
    public function getRequestDiscriminatorClasses()
    {
        return $this->requestDiscriminatorClasses;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = array(
            'method' => $this->method,
            'uri'    => $this->uri,
        );

        if ($host = $this->host) {
            $data['host'] = $host;
        }

        if ($description = $this->description) {
            $data['description'] = $description;
        }

        if ($link = $this->link) {
            $data['link'] = $link;
        }

        if ($documentation = $this->documentation) {
            $data['documentation'] = $documentation;
        }

        if ($filters = $this->filters) {
            $data['filters'] = $filters;
        }

        if ($headers = $this->headers) {
            $data['headers'] = $headers;
        }

        if ($parameters = $this->parameters) {
            $data['parameters'] = $parameters;
        }

        if ($requirements = $this->requirements) {
            $data['requirements'] = $requirements;
        }

        if ($response = $this->response) {
            $data['response'] = $response;
        }

        if ($statusCodes = $this->statusCodes) {
            $data['statusCodes'] = $statusCodes;
        }

        if ($section = $this->section) {
            $data['section'] = $section;
        }

        if ($cache = $this->cache) {
            $data['cache'] = $cache;
        }

        if ($requestDiscriminatorClasses = $this->requestDiscriminatorClasses) {
            $data['requestDiscriminatorClasses'] = $requestDiscriminatorClasses;
        }

        if ($responseDiscriminatorClasses = $this->responseDiscriminatorClasses) {
            $data['responseDiscriminatorClasses'] = $responseDiscriminatorClasses;
        }

        if ($requestBodyExample = $this->requestBodyExample) {
            $data['requestBodyExample'] = $requestBodyExample;
        }

        if ($responseBodyExample = $this->responseBodyExample) {
            $data['responseBodyExample'] = $responseBodyExample;
        }

        $data['https'] = $this->https;
        $data['authentication'] = $this->authentication;
        $data['authenticationRoles'] = $this->authenticationRoles;
        $data['deprecated'] = $this->deprecated;

        return $data;
    }

    /**
     * Read example body from file
     * Each line of code block should be prefixed by tabulator as required by dflydev/markdown extension
     *
     * @param array $body
     * @return string
     */
    private function exampleBodyFromArray($body)
    {
        if (!empty($body['file']) && is_readable($body['file'])) {
            return file_get_contents($body['file']);
        }

        return '';
    }

    /**
     * dflydev/markdown extension required that code block should be prefixed by tabulator
     * @param string $code
     * @return string
     */
    private function markdownBlockCodeFormater($code)
    {
        return !empty($code) ? "```\n" . $code . "\n```" : "";
    }

    /**
     * @param string $name
     * @param array  $header
     */
    public function addHeader($name, array $header)
    {
        $this->headers[$name] = $header;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}
