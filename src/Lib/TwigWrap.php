<?php


namespace Lib;


class TwigWrap
{
    public function render(array $render_value,string $path) : void
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../../templates');
        $twig = new \Twig_Environment($loader);

        echo $twig->render($path, $render_value);
    }
}