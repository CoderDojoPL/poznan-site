<?php

namespace Presenter;

use ItePHP\Core\Environment;
use ItePHP\Core\Exception;
use ItePHP\Core\Presenter;
use ItePHP\Core\Request;
use ItePHP\Core\Response;

/**
 * Class JSA
 * @package Presenter
 */
class JSA implements Presenter
{
    /**
     * @var Request $config
     */
    private $config;

    /**
     * @var Environment
     */
    private $environment;

    /**
     * JSA constructor.
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {

        $this->environment = $environment;
    }

    /**
     * {@inheritdoc}
     */
    public function render(Request $config, Response $response)
    {
        $response->setHeader('content-type', 'application/json');
        $this->config = $config;
        $this->setHeaders($response);
        if ($response->getStatusCode() < 401)
            $this->renderSuccess($response);
        else
            $this->renderFail($response);
    }

    /**
     * @param Response $response
     */
    private function renderSuccess(Response $response)
    {
        echo json_encode($response->getContent());
    }

    /**
     * @param Response $response
     */
    private function renderFail(Response $response)
    {
        if (!$this->environment->isSilent())
            header('HTTP/1.1 ' . $response->getStatusCode() . ' ' . $response->getStatusMessage());

        if ($response->getContent() instanceof \Exception) {
            $exception = $response->getContent();
            $message = 'Błąd wewnętrzny!';
            if ($exception instanceof Exception) {
                $message = $exception->getSafeMessage();
            }

            if ($this->environment->isDebug())
                $message = $exception->getMessage();

            $data = array('code' => $exception->getCode()
            , 'message' => $message);
            if ($this->environment->isDebug()) {
                $data = array_merge($data, array(
                    'file' => $exception->getFile()
                , 'line' => $exception->getLine()
                , 'trace' => $exception->getTraceAsString()
                , 'exception' => get_class($exception)
                ));
            }

            echo json_encode($data);

        }
    }

    /**
     * @param Response $response
     */
    private function setHeaders($response)
    {
        if (!$this->environment->isSilent()) {
            foreach ($response->getHeaders() as $name => $value) {
                header($name . ': ' . $value);
            }

        }
    }
}