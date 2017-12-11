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
  <h1>Point de vue du joueur ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
        echo ", manche ";
        echo twig_escape_filter($this->env, (isset($context["manche"]) ? $context["manche"] : $this->getContext($context, "manche")), "html", null, true);
        echo ", tour du joueur ";
        echo twig_escape_filter($this->env, (isset($context["tour_De"]) ? $context["tour_De"] : $this->getContext($context, "tour_De")), "html", null, true);
        echo ", il reste ";
        echo twig_escape_filter($this->env, (isset($context["pioche"]) ? $context["pioche"] : $this->getContext($context, "pioche")), "html", null, true);
        echo " carte dans la pioche </h1>
  <table>
        ";
        // line 7
        $context["cpt"] = 0;
        echo "  
        <tr border = 1>
        ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste"]) ? $context["liste"] : $this->getContext($context, "liste")));
        foreach ($context['_seq'] as $context["_key"] => $context["joueurL"]) {
            // line 10
            echo "          ";
            $context["cpt"] = ((isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")) + 1);
            // line 11
            echo "          <th>Joueur ";
            echo twig_escape_filter($this->env, (isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")), "html", null, true);
            echo "</th>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['joueurL'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "        </tr>
        ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ListeScore"]) ? $context["ListeScore"] : $this->getContext($context, "ListeScore")));
        foreach ($context['_seq'] as $context["_key"] => $context["score"]) {
            // line 15
            echo "          <th>score ";
            echo twig_escape_filter($this->env, (isset($context["score"]) ? $context["score"] : $this->getContext($context, "score")), "html", null, true);
            echo "</th>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['score'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "        <tr>
        ";
        // line 18
        $context["cpt"] = 0;
        echo "  
        ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste"]) ? $context["liste"] : $this->getContext($context, "liste")));
        foreach ($context['_seq'] as $context["_key"] => $context["joueurL"]) {
            // line 20
            echo "        <th>
        ";
            // line 21
            $context["cpt"] = ((isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")) + 1);
            // line 22
            echo "        ";
            $context["cpt2"] = 0;
            echo "  
            ";
            // line 23
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["joueurL"]) ? $context["joueurL"] : $this->getContext($context, "joueurL")));
            foreach ($context['_seq'] as $context["_key"] => $context["listeCarte"]) {
                echo " 
                ";
                // line 24
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["listeCarte"]) ? $context["listeCarte"] : $this->getContext($context, "listeCarte")));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
                    // line 25
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 0)) {
                        // line 26
                        echo "                        ";
                        if (((isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")) == twig_number_format_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur"))))) {
                            // line 27
                            echo "                            ";
                            if (((isset($context["tour_De"]) ? $context["tour_De"] : $this->getContext($context, "tour_De")) == (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")))) {
                                // line 28
                                echo "                                <a href='http://localhost/LoveLetter/web/app_dev.php/Choix?id_manche=";
                                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                                echo "&nb_joueur=";
                                echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
                                echo "&numCarteChoisi=";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "nombre"), "html", null, true);
                                echo "'>
                                <img src=";
                                // line 29
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
                                echo " alt=\"\" width=\"211\" height=\"300\" /></a>
                            ";
                            } else {
                                // line 31
                                echo "                                    <img src=";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
                                echo " alt=\"\" width=\"211\" height=\"300\" />
                            ";
                            }
                            // line 33
                            echo "                        ";
                        } else {
                            // line 34
                            echo "                                <img src=http://static.mnium.org/images/contenu/actus/HearthStone/Dos_de_cartes/Hearthstone_dos_de_cartes_saison_22.png  alt=\"\" width=\"211\" height=\"300\" />
                        ";
                        }
                        // line 36
                        echo "                    ";
                    }
                    // line 37
                    echo "                ";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 38
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 0)) {
                        // line 39
                        echo "                        <li>Perdu</li>
                    ";
                    }
                    // line 41
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 42
                echo "                ";
                $context["cpt2"] = ((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) + 1);
                // line 43
                echo "            ";
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
        return array (  264 => 68,  257 => 66,  250 => 64,  247 => 63,  241 => 62,  237 => 60,  234 => 59,  229 => 58,  223 => 56,  220 => 55,  215 => 54,  209 => 53,  204 => 52,  202 => 51,  199 => 50,  195 => 49,  191 => 48,  187 => 46,  180 => 44,  174 => 43,  171 => 42,  165 => 41,  161 => 39,  158 => 38,  153 => 37,  150 => 36,  146 => 34,  143 => 33,  137 => 31,  132 => 29,  123 => 28,  120 => 27,  117 => 26,  114 => 25,  109 => 24,  103 => 23,  98 => 22,  96 => 21,  93 => 20,  89 => 19,  85 => 18,  82 => 17,  73 => 15,  69 => 14,  66 => 13,  57 => 11,  54 => 10,  50 => 9,  45 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
