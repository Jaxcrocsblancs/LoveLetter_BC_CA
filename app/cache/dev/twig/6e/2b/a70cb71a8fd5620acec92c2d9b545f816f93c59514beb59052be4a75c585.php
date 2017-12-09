<?php

/* LoveLetterPlatformBundle:Jeu:garde.html.twig */
class __TwigTemplate_6e2ba70cb71a8fd5620acec92c2d9b545f816f93c59514beb59052be4a75c585 extends Twig_Template
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

    // line 4
    public function block_LoveLetterplatform_body($context, array $blocks = array())
    {
        // line 5
        echo "    
    Quelque carte pense veux tu choisir
   ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_cartes"]) ? $context["liste_cartes"] : $this->getContext($context, "liste_cartes")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
            // line 8
            echo "    <a href='http://localhost/LoveLetter/web/app_dev.php/GardeChoix2?id_manche=";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "&nb_joueur=";
            echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
            echo "&id_carte=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "nombre"), "html", null, true);
            echo "&choixJoueur=";
            echo twig_escape_filter($this->env, (isset($context["jchoisie"]) ? $context["jchoisie"] : $this->getContext($context, "jchoisie")), "html", null, true);
            echo "'>
    <img src=";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
            echo " alt=\"\" width=\"211\" height=\"300\" />
    </a>
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 12
            echo "    <li>Pas de carte</li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "    
";
    }

    public function getTemplateName()
    {
        return "LoveLetterPlatformBundle:Jeu:garde.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 14,  59 => 12,  51 => 9,  40 => 8,  35 => 7,  31 => 5,  28 => 4,);
    }
}
