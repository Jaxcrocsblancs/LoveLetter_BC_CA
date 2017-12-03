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
  <h1>Bientot le jeu ici ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "</h1>

  
  
  <footer>
    <a href=\"http://localhost/LoveLetter/web/app_dev.php/Partie/";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["id1"]) ? $context["id1"] : $this->getContext($context, "id1")), "html", null, true);
        echo " \">
     <img src=";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), "html", null, true);
        echo " alt=\"\" width=\"211\" height=\"300\" /> </a>
     
      <a href=\"http://localhost/LoveLetter/web/app_dev.php/Partie/";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["id2"]) ? $context["id2"] : $this->getContext($context, "id2")), "html", null, true);
        echo " \">
    <img src=";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["url2"]) ? $context["url2"] : $this->getContext($context, "url2")), "html", null, true);
        echo " alt=\"\" width=\"211\" height=\"300\" align=bottom/> </a>
   </footer>
    
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
        return array (  55 => 14,  51 => 13,  46 => 11,  42 => 10,  34 => 5,  31 => 4,  28 => 3,);
    }
}
