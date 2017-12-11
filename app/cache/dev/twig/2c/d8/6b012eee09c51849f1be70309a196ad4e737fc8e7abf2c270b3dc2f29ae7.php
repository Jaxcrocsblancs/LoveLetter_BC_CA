<?php

/* LoveLetterPlatformBundle:Jeu:finPartie.html.twig */
class __TwigTemplate_2cd86b012eee09c51849f1be70309a196ad4e737fc8e7abf2c270b3dc2f29ae7 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
  <head>
    <title>Bienvenue sur ma première page avec OpenClassrooms !</title>
  </head>
  <body>
     <a href='http://localhost/LoveLetter/web/app_dev.php/accueil'
    <h1>Joueur ";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
        echo " a gagner!</h1>
     </a>
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "LoveLetterPlatformBundle:Jeu:finPartie.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 8,  19 => 1,);
    }
}
