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
            'pretre' => array($this, 'block_pretre'),
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
            echo "    <th>  <a href='http://localhost/LoveLetter/web/app_dev.php/Choix?id_manche=";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "&nb_joueur=";
            echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
            echo "&numCarteChoisi=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "nombre"), "html", null, true);
            echo "'>
    <img src=";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
            echo " alt=\"\" width=\"211\" height=\"300\" />
    </a></th>
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 14
            echo "    <th><li>Pas de carte</li></th>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "  </tr>
  
  <tr>   
   <th>carte defausser par j1 </th>
  ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_cartesJouerJ1"]) ? $context["liste_cartesJouerJ1"] : $this->getContext($context, "liste_cartesJouerJ1")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
            // line 21
            echo "    <th><img src=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
            echo " alt=\"\" width=\"211\" height=\"300\" /></th>
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 23
            echo "    <th><li>Pas de carte</li></th>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "  </tr>
  
  <tr> 
  <th>carte adversaire</th>
  ";
        // line 29
        $this->displayBlock('pretre', $context, $blocks);
        // line 36
        echo "  </tr> 
  
   <tr> 
   <th>carte defausser par j2</th>
  ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_cartesJouerJ2"]) ? $context["liste_cartesJouerJ2"] : $this->getContext($context, "liste_cartesJouerJ2")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
            // line 41
            echo "   <th> <img src=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
            echo " alt=\"\" width=\"211\" height=\"300\" /></th>
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 43
            echo "   <th> <li>Pas de carte</li></th>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "  
  ";
        // line 46
        $this->displayBlock('effet', $context, $blocks);
        // line 48
        echo "  </tr> 
  
 </table>
  
";
    }

    // line 29
    public function block_pretre($context, array $blocks = array())
    {
        // line 30
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_cartesJ2"]) ? $context["liste_cartesJ2"] : $this->getContext($context, "liste_cartesJ2")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
            // line 31
            echo "      <th><img src=http://static.mnium.org/images/contenu/actus/HearthStone/Dos_de_cartes/Hearthstone_dos_de_cartes_saison_22.png  alt=\"\" width=\"211\" height=\"300\" /></th>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 33
            echo "      <th><li>Pas de carte</li></th>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "  ";
    }

    // line 46
    public function block_effet($context, array $blocks = array())
    {
        // line 47
        echo "  ";
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
        return array (  174 => 47,  171 => 46,  167 => 35,  160 => 33,  154 => 31,  148 => 30,  145 => 29,  137 => 48,  135 => 46,  132 => 45,  125 => 43,  117 => 41,  112 => 40,  106 => 36,  104 => 29,  98 => 25,  91 => 23,  83 => 21,  78 => 20,  72 => 16,  65 => 14,  57 => 11,  48 => 10,  43 => 9,  36 => 5,  33 => 4,  30 => 3,);
    }
}
