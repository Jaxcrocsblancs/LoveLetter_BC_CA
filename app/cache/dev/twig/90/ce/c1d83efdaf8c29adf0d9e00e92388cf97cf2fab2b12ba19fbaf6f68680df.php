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
        echo ", tour du joueur ";
        echo twig_escape_filter($this->env, (isset($context["tour_De"]) ? $context["tour_De"] : $this->getContext($context, "tour_De")), "html", null, true);
        echo ", il reste ";
        echo twig_escape_filter($this->env, (isset($context["pioche"]) ? $context["pioche"] : $this->getContext($context, "pioche")), "html", null, true);
        echo " carte dans la pioche </h1>
  
  <table border = 1>
        ";
        // line 8
        $context["cpt"] = 0;
        echo "  
        <tr border = 1>
        ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste"]) ? $context["liste"] : $this->getContext($context, "liste")));
        foreach ($context['_seq'] as $context["_key"] => $context["joueurL"]) {
            // line 11
            echo "          ";
            $context["cpt"] = ((isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")) + 1);
            // line 12
            echo "          <th>Joueur ";
            echo twig_escape_filter($this->env, (isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")), "html", null, true);
            echo "</th>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['joueurL'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "        </tr>
        <tr>
            ";
        // line 16
        $context["cpt"] = 0;
        echo "  
            ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste"]) ? $context["liste"] : $this->getContext($context, "liste")));
        foreach ($context['_seq'] as $context["_key"] => $context["joueurL"]) {
            // line 18
            echo "            <th>
            ";
            // line 19
            $context["cpt"] = ((isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")) + 1);
            // line 20
            echo "            ";
            $context["cpt2"] = 0;
            echo "  
            ";
            // line 21
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["joueurL"]) ? $context["joueurL"] : $this->getContext($context, "joueurL")));
            foreach ($context['_seq'] as $context["_key"] => $context["listeCarte"]) {
                echo " 

                ";
                // line 23
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["listeCarte"]) ? $context["listeCarte"] : $this->getContext($context, "listeCarte")));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
                    // line 24
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 0)) {
                        // line 25
                        echo "                        ";
                        if (((isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")) == twig_number_format_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur"))))) {
                            // line 26
                            echo "                            ";
                            if (((isset($context["tour_De"]) ? $context["tour_De"] : $this->getContext($context, "tour_De")) == (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")))) {
                                // line 27
                                echo "                            <a href='http://localhost/LoveLetter/web/app_dev.php/Choix?id_manche=";
                                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                                echo "&nb_joueur=";
                                echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
                                echo "&numCarteChoisi=";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "nombre"), "html", null, true);
                                echo "'>
                                    <img src=";
                                // line 28
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
                                echo " alt=\"\" width=\"211\" height=\"300\" /></a>
                            ";
                            } else {
                                // line 30
                                echo "                                <img src=";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
                                echo " alt=\"\" width=\"211\" height=\"300\" />
                            ";
                            }
                            // line 32
                            echo "                        ";
                        } else {
                            // line 33
                            echo "                            <img src=http://static.mnium.org/images/contenu/actus/HearthStone/Dos_de_cartes/Hearthstone_dos_de_cartes_saison_22.png  alt=\"\" width=\"211\" height=\"300\" />
                        ";
                        }
                        // line 35
                        echo "                     ";
                    }
                    // line 36
                    echo "                ";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 37
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 0)) {
                        // line 38
                        echo "                    <li>Pas de carte</li>
                    ";
                    }
                    // line 40
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 41
                echo "                ";
                $context["cpt2"] = ((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) + 1);
                // line 42
                echo "               
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listeCarte'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "            </th>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['joueurL'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "       </tr>
       <tr>
            ";
        // line 48
        $context["cpt"] = 0;
        echo "  
            ";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste"]) ? $context["liste"] : $this->getContext($context, "liste")));
        foreach ($context['_seq'] as $context["_key"] => $context["joueurL"]) {
            // line 50
            echo "            <th>
            ";
            // line 51
            $context["cpt"] = ((isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")) + 1);
            // line 52
            echo "            ";
            $context["cpt2"] = 0;
            echo "  
            ";
            // line 53
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["joueurL"]) ? $context["joueurL"] : $this->getContext($context, "joueurL")));
            foreach ($context['_seq'] as $context["_key"] => $context["listeCarte"]) {
                echo " 
                ";
                // line 54
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["listeCarte"]) ? $context["listeCarte"] : $this->getContext($context, "listeCarte")));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
                    // line 55
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 1)) {
                        // line 56
                        echo "                        <img src=";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
                        echo " alt=\"\" width=\"211\" height=\"300\" />
                     ";
                    }
                    // line 58
                    echo "                ";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 59
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 1)) {
                        // line 60
                        echo "                    <li>Pas de carte</li>
                    ";
                    }
                    // line 62
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 63
                echo "                ";
                $context["cpt2"] = ((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) + 1);
                // line 64
                echo "               
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listeCarte'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "            </th>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['joueurL'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "       </tr>
       
       
       
 </table>
";
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
        return array (  250 => 68,  243 => 66,  236 => 64,  233 => 63,  227 => 62,  223 => 60,  220 => 59,  215 => 58,  209 => 56,  206 => 55,  201 => 54,  195 => 53,  190 => 52,  188 => 51,  185 => 50,  181 => 49,  177 => 48,  173 => 46,  166 => 44,  159 => 42,  156 => 41,  150 => 40,  146 => 38,  143 => 37,  138 => 36,  135 => 35,  131 => 33,  128 => 32,  122 => 30,  117 => 28,  108 => 27,  105 => 26,  102 => 25,  99 => 24,  94 => 23,  87 => 21,  82 => 20,  80 => 19,  77 => 18,  73 => 17,  69 => 16,  65 => 14,  56 => 12,  53 => 11,  49 => 10,  44 => 8,  34 => 5,  31 => 4,  28 => 3,);
    }
}
