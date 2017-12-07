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
            'effet' => array($this, 'block_effet'),
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
         <th>carte joueur</th>
  ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_cartesJ1"]) ? $context["liste_cartesJ1"] : $this->getContext($context, "liste_cartesJ1")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
            // line 10
            echo "    <th><img src=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
            echo " alt=\"\" width=\"211\" height=\"300\" /></th>
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 12
            echo "    <th><li>Pas de carte</li></th>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "  </tr>
  
  <tr>   
   <th>carte defausser par j1 </th>
  ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_cartesJouerJ1"]) ? $context["liste_cartesJouerJ1"] : $this->getContext($context, "liste_cartesJouerJ1")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
            // line 19
            echo "    <th><img src=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
            echo " alt=\"\" width=\"211\" height=\"300\" /></th>
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 21
            echo "    <th><li>Pas de carte</li></th>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "  </tr>
  
  <tr> 
  <th>carte adversaire</th>
  ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_cartesJ2"]) ? $context["liste_cartesJ2"] : $this->getContext($context, "liste_cartesJ2")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
            // line 28
            echo "    <th><a href='http://localhost/LoveLetter/web/app_dev.php/TestFin?id_manche=";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "&nb_joueur=";
            echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
            echo "'>
            <img src=";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
            echo " alt=\"\" width=\"211\" height=\"300\" />
            </a></th>
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 32
            echo "    <li>Pas de carte</li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "  </tr> 
  
   <tr> 
   <th>carte defausser par j2</th>
  ";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_cartesJouerJ2"]) ? $context["liste_cartesJouerJ2"] : $this->getContext($context, "liste_cartesJouerJ2")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
            // line 39
            echo "   <th> <img src=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
            echo " alt=\"\" width=\"211\" height=\"300\" /></th>
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 41
            echo "   <th> <li>Pas de carte</li></th>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "  
  ";
        // line 44
        $this->displayBlock('effet', $context, $blocks);
        // line 46
        echo "  </tr> 
  
 </table>
  
";
    }

    // line 44
    public function block_effet($context, array $blocks = array())
    {
        // line 45
        echo "  ";
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
        return array (  163 => 45,  160 => 44,  152 => 46,  150 => 44,  147 => 43,  140 => 41,  132 => 39,  127 => 38,  121 => 34,  114 => 32,  106 => 29,  99 => 28,  94 => 27,  88 => 23,  81 => 21,  73 => 19,  68 => 18,  62 => 14,  55 => 12,  47 => 10,  42 => 9,  35 => 5,  32 => 4,  29 => 3,);
    }
}
