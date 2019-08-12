<?php


namespace Core;


use Exception;

class Application
{
    /**
     * @var string $controllerName
     */
    private $controllerName;
    /**
     * @var string $actionName
     */
    private $actionName;
    /**
     * @var array $params
     */
    private $params = [];

    /**
     * Application constructor.
     * @param string $controllerName
     * @param string $actionName
     * @param array $params
     */
    public function __construct(string $controllerName, string $actionName, array $params)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    /**
     * @param string $controllerName
     */
    public function setControllerName(string $controllerName): void
    {
        $this->controllerName = $controllerName;
    }

    /**
     * @return string
     */
    public function getActionName(): string
    {
        return $this->actionName;
    }

    /**
     * @param string $actionName
     */
    public function setActionName(string $actionName): void
    {
        $this->actionName = $actionName;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    public function start()
    {
        $controllerFullName = sprintf('Controllers\%s', ucfirst($this->controllerName));
        $controller = new $controllerFullName;

        call_user_func_array([$controller, $this->actionName], $this->params);
    }

}