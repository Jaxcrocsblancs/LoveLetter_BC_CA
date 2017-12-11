<?php

/* LoveLetterPlatformBundle:Advert:accueil.html.twig */
class __TwigTemplate_285e14442c4b02b10bd65c9b5ea0a65cfa743f87a06adbac65ce281d51aef34e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("LoveLetterPlatformBundle::layout.html.twig");

        $this->blocks = array(
            'ocplatform_body' => array($this, 'block_ocplatform_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "LoveLetterPlatformBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_ocplatform_body($context, array $blocks = array())
    {
        // line 4
        echo "
    
    
    
  <h2>Liste des parties</h2>
  Cliquer pour être spectateur
  <ul>
    
    ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ListePartie"]) ? $context["ListePartie"] : $this->getContext($context, "ListePartie")));
        foreach ($context['_seq'] as $context["_key"] => $context["partie"]) {
            // line 13
            echo "        <a href=\"http://localhost/LoveLetter/web/app_dev.php/ChercheManche/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "id"), "html", null, true);
            echo "\">
        <li> ";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "nomPartie"), "html", null, true);
            echo "</li>
        </a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['partie'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "    
    </br>
    </br>
    <a href=\"http://localhost/LoveLetter/web/app_dev.php/CreationPartie\">
    Creer un partie
    </a>
  </ul>
  
";
    }

    public function getTemplateName()
    {
        return "LoveLetterPlatformBundle:Advert:accueil.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 17,  50 => 14,  45 => 13,  41 => 12,  31 => 4,  28 => 3,);
    }
}
