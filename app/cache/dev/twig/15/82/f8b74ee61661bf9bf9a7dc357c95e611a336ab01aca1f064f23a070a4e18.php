<?php

/* LoveLetterPlatformBundle::layoutJeu.html.twig */
class __TwigTemplate_1582f8b74ee61661bf9bf9a7dc357c95e611a336ab01aca1f064f23a070a4e18 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'LoveLetterplatform_body' => array($this, 'block_LoveLetterplatform_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "

 <head>
        <meta charset=\"utf-8\" />
        <link rel=\"stylesheet\" href=\"style.css\" />
        <title>Premiers tests du CSS</title>
    </head>
  ";
        // line 11
        echo "  ";
        $this->displayBlock('LoveLetterplatform_body', $context, $blocks);
    }

    public function block_LoveLetterplatform_body($context, array $blocks = array())
    {
        // line 12
        echo "      
  ";
    }

    public function getTemplateName()
    {
        return "LoveLetterPlatformBundle::layoutJeu.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  36 => 12,  29 => 11,  20 => 2,  55 => 14,  51 => 13,  46 => 11,  42 => 10,  34 => 5,  31 => 4,  28 => 3,);
    }
}
