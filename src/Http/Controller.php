<?php

namespace News\Http;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

abstract class Controller
{
    /**
     * Twig Template Engine container
     *
     * @param \Twig_Environment
     */
    protected $twig;

    /**
     * Symfony's HttpFoundation's Request container
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    protected $request;

    /**
     * Redirect to the URI given
     *
     * @param string $uri
     */
    public function redirect(string $uri) : RedirectResponse
    {
        return new RedirectResponse($uri);
    }

    /**
     * Returns a standard response
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(string $template, array $params = []) : Response
    {
        return new Response($this->twig->render($template, $params));
    }

    /**
     * Returns the response in JSON format
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function jsonResponse($data) : JsonResponse
    {
        return new JsonResponse($data);
    }

    /**
     * Sets the Request
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Sets Twig Template Engine
     *
     * @param \Twig_Environment
     */
    public function setTwig(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }
}
