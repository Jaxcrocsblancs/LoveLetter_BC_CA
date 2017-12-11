<?php

/* LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig */
class __TwigTemplate_8fbd8fbae281a858c83bf8cda9b74f11b285069880090d78c6c14cb464b05e8d extends Twig_Template
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
  <h1>Point de vu du joueur ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
        echo "</h1>
  <table>
        <tr>  
     ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["Liste"]) ? $context["Liste"] : $this->getContext($context, "Liste")));
        foreach ($context['_seq'] as $context["_key"] => $context["joueurL"]) {
            // line 9
            echo "          <th><a href='http://localhost/LoveLetter/web/app_dev.php/";
            echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "html", null, true);
            echo "?id_manche=";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "&nb_joueur=";
            echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
            echo "&choixJoueur=";
            echo twig_escape_filter($this->env, (isset($context["joueurL"]) ? $context["joueurL"] : $this->getContext($context, "joueurL")), "html", null, true);
            echo "'>
             Joueur ";
            // line 10
            echo twig_escape_filter($this->env, (isset($context["joueurL"]) ? $context["joueurL"] : $this->getContext($context, "joueurL")), "html", null, true);
            echo "
         </a></th>
     ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['joueurL'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "    
        </tr>  
        <tr>  
     ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["Liste"]) ? $context["Liste"] : $this->getContext($context, "Liste")));
        foreach ($context['_seq'] as $context["_key"] => $context["joueurL"]) {
            // line 16
            echo "          <th><a href='http://localhost/LoveLetter/web/app_dev.php/";
            echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "html", null, true);
            echo "?id_manche=";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "&nb_joueur=";
            echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
            echo "&choixJoueur=";
            echo twig_escape_filter($this->env, (isset($context["joueurL"]) ? $context["joueurL"] : $this->getContext($context, "joueurL")), "html", null, true);
            echo "'>
             <img src=http://static.mnium.org/images/contenu/actus/HearthStone/Dos_de_cartes/Hearthstone_dos_de_cartes_saison_22.png  alt=\"\" width=\"211\" height=\"300\" />
         </a></th>
     ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['joueurL'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "    
 </table>
  
";
    }

    public function getTemplateName()
    {
        return "LoveLetterPlatformBundle:Jeu:ChoixJoueur.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 19,  73 => 16,  69 => 15,  64 => 12,  55 => 10,  44 => 9,  40 => 8,  34 => 5,  31 => 4,  28 => 3,);
    }
}
