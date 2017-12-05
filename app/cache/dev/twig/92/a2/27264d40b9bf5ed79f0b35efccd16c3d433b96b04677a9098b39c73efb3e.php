<?php

/* LoveLetterPlatformBundle:Jeu:Pretre.html.twig */
class __TwigTemplate_92a227264d40b9bf5ed79f0b35efccd16c3d433b96b04677a9098b39c73efb3e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("LoveLetterPlatformBundle::plateauDeJeu.html.twig");

        $this->blocks = array(
            'pretre' => array($this, 'block_pretre'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "LoveLetterPlatformBundle::plateauDeJeu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_pretre($context, array $blocks = array())
    {
        // line 3
        echo "    carte adversaire
   ";
        // line 4
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_cartesJ2"]) ? $context["liste_cartesJ2"] : $this->getContext($context, "liste_cartesJ2")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
            // line 5
            echo "    <img src=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
            echo " alt=\"\" width=\"211\" height=\"300\" />
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 7
            echo "    <li>Pas de carte</li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
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
        return array (  47 => 7,  39 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
