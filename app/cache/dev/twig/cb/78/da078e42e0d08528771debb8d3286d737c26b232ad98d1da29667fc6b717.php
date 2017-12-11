<?php

/* LoveLetterPlatformBundle:Advert:choixNbJoueur.html.twig */
class __TwigTemplate_cb78da078e42e0d08528771debb8d3286d737c26b232ad98d1da29667fc6b717 extends Twig_Template
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
        echo "    <h1>Combien de joueur voulez vous dans cette partie</h1>
  
    <table>
        <tr>
            <th><center>2 Joueur</center></th>
            <th><center>3 Joueur</center></th>
            <th><center>4 Joueur</center></th>
        </tr>
         <tr>
            <th>
                <a href=\"LancementPartie/PasEuLeTempsDeFaireChoisirLeNom/2\" >
                <img src=http://static.mnium.org/images/contenu/actus/HearthStone/Dos_de_cartes/Hearthstone_dos_de_cartes_saison_22.png  alt=\"\" width=\"211\" height=\"300\" />
                </a>    
            </th>
            <th>
                 <a href=\"LancementPartie/PasEuLeTempsDeFaireChoisirLeNom/3\" >
                <img src=http://static.mnium.org/images/contenu/actus/HearthStone/Dos_de_cartes/Hearthstone_dos_de_cartes_saison_22.png  alt=\"\" width=\"211\" height=\"300\" />
                </a>
            </th>
            <th>
                 <a href=\"LancementPartie/PasEuLeTempsDeFaireChoisirLeNom/4\" >
                <img src=http://static.mnium.org/images/contenu/actus/HearthStone/Dos_de_cartes/Hearthstone_dos_de_cartes_saison_22.png  alt=\"\" width=\"211\" height=\"300\" />
                 </a>
            </th>
        </tr>
        </table>
";
    }

    public function getTemplateName()
    {
        return "LoveLetterPlatformBundle:Advert:choixNbJoueur.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
