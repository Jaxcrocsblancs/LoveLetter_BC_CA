<?php

/* LoveLetterPlatformBundle:Jeu:Pretre.html.twig */
class __TwigTemplate_92a227264d40b9bf5ed79f0b35efccd16c3d433b96b04677a9098b39c73efb3e extends Twig_Template
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
        echo "<a href='http://localhost/LoveLetter/web/app_dev.php/TestFin?id_manche=";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "&nb_joueur=";
        echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
        echo "'>
    <table>
 <tr><th>Cliquez un fois que c'est bon</th></tr>
 <tr><img src=";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
        echo " alt=\"\" width=\"211\" height=\"300\" /></tr>
   </table>
</a>
";
    }

    public function getTemplateName()
    {
        return "LoveLetterPlatformBundle:Jeu:Pretre.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 7,  31 => 4,  28 => 3,);
    }
}
