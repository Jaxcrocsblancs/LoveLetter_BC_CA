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
        echo ", manche ";
        echo twig_escape_filter($this->env, (isset($context["manche"]) ? $context["manche"] : $this->getContext($context, "manche")), "html", null, true);
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
        ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ListeScore"]) ? $context["ListeScore"] : $this->getContext($context, "ListeScore")));
        foreach ($context['_seq'] as $context["_key"] => $context["score"]) {
            // line 16
            echo "          <th>score ";
            echo twig_escape_filter($this->env, (isset($context["score"]) ? $context["score"] : $this->getContext($context, "score")), "html", null, true);
            echo "</th>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['score'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "        
        
        <tr>
        ";
        // line 21
        $context["cpt"] = 0;
        echo "  
        ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste"]) ? $context["liste"] : $this->getContext($context, "liste")));
        foreach ($context['_seq'] as $context["_key"] => $context["joueurL"]) {
            // line 23
            echo "        <th>
        ";
            // line 24
            $context["cpt"] = ((isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")) + 1);
            // line 25
            echo "        ";
            $context["cpt2"] = 0;
            echo "  
            ";
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["joueurL"]) ? $context["joueurL"] : $this->getContext($context, "joueurL")));
            foreach ($context['_seq'] as $context["_key"] => $context["listeCarte"]) {
                echo " 
                ";
                // line 27
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["listeCarte"]) ? $context["listeCarte"] : $this->getContext($context, "listeCarte")));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
                    // line 28
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 0)) {
                        // line 29
                        echo "                        ";
                        if (((isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")) == twig_number_format_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur"))))) {
                            // line 30
                            echo "                            ";
                            if (((isset($context["tour_De"]) ? $context["tour_De"] : $this->getContext($context, "tour_De")) == (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")))) {
                                // line 31
                                echo "                                <a href='http://localhost/LoveLetter/web/app_dev.php/Choix?id_manche=";
                                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                                echo "&nb_joueur=";
                                echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
                                echo "&numCarteChoisi=";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "nombre"), "html", null, true);
                                echo "'>
                                <img src=";
                                // line 32
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
                                echo " alt=\"\" width=\"211\" height=\"300\" /></a>
                            ";
                            } else {
                                // line 34
                                echo "                                    <img src=";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
                                echo " alt=\"\" width=\"211\" height=\"300\" />
                            ";
                            }
                            // line 36
                            echo "                        ";
                        } else {
                            // line 37
                            echo "                                <img src=http://static.mnium.org/images/contenu/actus/HearthStone/Dos_de_cartes/Hearthstone_dos_de_cartes_saison_22.png  alt=\"\" width=\"211\" height=\"300\" />
                        ";
                        }
                        // line 39
                        echo "                    ";
                    }
                    // line 40
                    echo "                ";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 41
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 0)) {
                        // line 42
                        echo "                        <li>Perdu</li>
                    ";
                    }
                    // line 44
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 45
                echo "                ";
                $context["cpt2"] = ((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) + 1);
                // line 46
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listeCarte'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "            </th>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['joueurL'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "       </tr>
       <tr>
            ";
        // line 51
        $context["cpt"] = 0;
        echo "  
            ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste"]) ? $context["liste"] : $this->getContext($context, "liste")));
        foreach ($context['_seq'] as $context["_key"] => $context["joueurL"]) {
            // line 53
            echo "            <th>
            ";
            // line 54
            $context["cpt"] = ((isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")) + 1);
            // line 55
            echo "            ";
            $context["cpt2"] = 0;
            echo "  
            ";
            // line 56
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["joueurL"]) ? $context["joueurL"] : $this->getContext($context, "joueurL")));
            foreach ($context['_seq'] as $context["_key"] => $context["listeCarte"]) {
                echo " 
                ";
                // line 57
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["listeCarte"]) ? $context["listeCarte"] : $this->getContext($context, "listeCarte")));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
                    // line 58
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 1)) {
                        // line 59
                        echo "                        <img src=";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
                        echo " alt=\"\" width=\"211\" height=\"300\" />
                     ";
                    }
                    // line 61
                    echo "                ";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 62
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 1)) {
                        // line 63
                        echo "                    <li>Pas de carte</li>
                    ";
                    }
                    // line 65
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 66
                echo "                ";
                $context["cpt2"] = ((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) + 1);
                // line 67
                echo "               
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listeCarte'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            echo "            </th>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['joueurL'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
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
        return array (  267 => 71,  260 => 69,  253 => 67,  250 => 66,  244 => 65,  240 => 63,  237 => 62,  232 => 61,  226 => 59,  223 => 58,  218 => 57,  212 => 56,  207 => 55,  205 => 54,  202 => 53,  198 => 52,  194 => 51,  190 => 49,  183 => 47,  177 => 46,  174 => 45,  168 => 44,  164 => 42,  161 => 41,  156 => 40,  153 => 39,  149 => 37,  146 => 36,  140 => 34,  135 => 32,  126 => 31,  123 => 30,  120 => 29,  117 => 28,  112 => 27,  106 => 26,  101 => 25,  99 => 24,  96 => 23,  92 => 22,  88 => 21,  83 => 18,  74 => 16,  70 => 15,  67 => 14,  58 => 12,  55 => 11,  51 => 10,  46 => 8,  34 => 5,  31 => 4,  28 => 3,);
    }
}
