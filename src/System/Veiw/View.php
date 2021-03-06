<?php


namespace App\System\Veiw;


use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

class View implements IView
{
    private PhpEngine $templating;

    public function __construct()
    {
        $filesystemLoader = new FilesystemLoader(ROOT . '/resources/views/%name%.php');
        $this->templating = new PhpEngine(new TemplateNameParser(), $filesystemLoader);

    }

    public function make($path, $data =[])
    {
        return $this->templating->render($path, $data);
    }

}