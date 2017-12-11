<?php

/* LoveLetterPlatformBundle:Advert:add.html.twig */
class __TwigTemplate_81d3b34244280a3dd19d30f2a78bce135df43e40107adee4ad207634e330514a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<center><h1>Creation Compte</h1></center>
    <center>
    <form action=\"";
        // line 3
        echo $this->env->getExtension('routing')->getPath("LoveLetter_platform_add");
        echo "\" method=\"post\">
       ";
        // line 4
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "
       <input type=\"submit\" />
    </form></center>
";
    }

    public function getTemplateName()
    {
        return "LoveLetterPlatformBundle:Advert:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  23 => 3,  19 => 1,);
    }
}
