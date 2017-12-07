<?php

/* LoveLetterPlatformBundle:Jeu:finManche.html.twig */
class __TwigTemplate_e4d84ec305b013e59b009c6c3071c8dbfa04ced00888f38777713695bad2f042 extends Twig_Template
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
     <a href='http://localhost/LoveLetter/web/app_dev.php/DebutManche?id_partie=";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["idPartie"]) ? $context["idPartie"] : $this->getContext($context, "idPartie")), "html", null, true);
        echo "'
    <h1>Joueur ";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
        echo " a perdu car ";
        echo twig_escape_filter($this->env, (isset($context["test"]) ? $context["test"] : $this->getContext($context, "test")), "html", null, true);
        echo "!</h1>
     </a>
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "LoveLetterPlatformBundle:Jeu:finManche.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 8,  27 => 7,  19 => 1,);
    }
}
