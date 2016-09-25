<?php
/**
 * Created by PhpStorm.
 * User: mtomczak
 * Date: 25.09.16
 * Time: 14:18
 */

namespace Command;


use ItePHP\Command\CommandConfig;
use ItePHP\Command\CommandInterface;
use ItePHP\Command\InputStream;
use ItePHP\Command\OutputStream;
use ItePHP\Core\Environment;
use \lessc;

class LessCompilerCommand implements CommandInterface
{

    /**
     * @var Environment
     */
    private $environment;

    /**
     * @var lessc
     */
    private $compiler;

    public function __construct(Environment $environment){
        $this->environment=$environment;
        $this->compiler=new lessc();
    }

    /**
     *
     * @param InputStream $in
     * @param OutputStream $out
     */
    public function execute(InputStream $in, OutputStream $out)
    {
        $dir=$this->environment->getRootPath()."/asset/less";
        $this->compileFile($dir,"creative.less");
    }

    /**
     *
     * @param CommandConfig $config
     */
    public function doConfig(CommandConfig $config)
    {
        //ignore
    }

    private function compileFile($dir, $file)
    {
        $name = pathinfo($file, \PATHINFO_FILENAME);
        $this->compiler->compileFile($dir."/".$file,$this->environment->getWebPath()."/css/".$name.".css");
    }
}