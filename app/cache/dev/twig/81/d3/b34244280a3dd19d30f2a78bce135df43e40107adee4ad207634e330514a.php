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
        echo "
   <center> <h1>Creation Compte</h1></center>
    <center>
    <form action=>
       <li>Pseudo :";
        // line 5
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pseudo"), 'form');
        echo "</li>
       <li> Mots de passe :";
        // line 6
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "mdp"), 'form');
        echo "</li>
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
        return array (  29 => 6,  25 => 5,  19 => 1,);
    }
}
