<?php

/* LoveLetterPlatformBundle:Jeu:plateauDeJeu.html.twig */
class __TwigTemplate_90cec1d83efdaf8c29adf0d9e00e92388cf97cf2fab2b12ba19fbaf6f68680df extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("LoveLetterPlatformBundle::layoutJeu.html.twig");

        $this->blocks = array(
            'LoveLetterplatform_body' => array($this, 'block_LoveLetterplatform_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "LoveLetterPlatformBundle::layoutJeu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_LoveLetterplatform_body($context, array $blocks = array())
    {
        // line 4
        echo "
  <h1>Bientot le jeu ici</h1>

  <ul>
    ";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "
    <center> <img src=";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), "html", null, true);
        echo " alt=\"\" width=\"211\" height=\"300\"/>
    <img src=";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["url2"]) ? $context["url2"] : $this->getContext($context, "url2")), "html", null, true);
        echo " alt=\"\" width=\"211\" height=\"300\"/></center> 
  </ul>

";
    }

    public function getTemplateName()
    {
        return "LoveLetterPlatformBundle:Jeu:plateauDeJeu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 10,  41 => 9,  37 => 8,  31 => 4,  28 => 3,);
    }
}
