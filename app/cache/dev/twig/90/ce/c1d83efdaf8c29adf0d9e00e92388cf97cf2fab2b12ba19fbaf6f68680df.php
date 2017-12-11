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
             <th></th>
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
         <th></th>
        ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ListeScore"]) ? $context["ListeScore"] : $this->getContext($context, "ListeScore")));
        foreach ($context['_seq'] as $context["_key"] => $context["score"]) {
            // line 17
            echo "          <th>point: ";
            echo twig_escape_filter($this->env, (isset($context["score"]) ? $context["score"] : $this->getContext($context, "score")), "html", null, true);
            echo "</th>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['score'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "        <tr>
        ";
        // line 20
        $context["cpt"] = 0;
        echo "  
            <th>Main des Joueurs </th>
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
            // line 27
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["joueurL"]) ? $context["joueurL"] : $this->getContext($context, "joueurL")));
            foreach ($context['_seq'] as $context["_key"] => $context["listeCarte"]) {
                echo " 
                ";
                // line 28
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["listeCarte"]) ? $context["listeCarte"] : $this->getContext($context, "listeCarte")));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
                    // line 29
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 0)) {
                        // line 30
                        echo "                        ";
                        if (((isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")) == twig_number_format_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur"))))) {
                            // line 31
                            echo "                            ";
                            if (((isset($context["tour_De"]) ? $context["tour_De"] : $this->getContext($context, "tour_De")) == (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")))) {
                                // line 32
                                echo "                                <a href='http://localhost/LoveLetter/web/app_dev.php/Choix?id_manche=";
                                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                                echo "&nb_joueur=";
                                echo twig_escape_filter($this->env, (isset($context["joueur"]) ? $context["joueur"] : $this->getContext($context, "joueur")), "html", null, true);
                                echo "&numCarteChoisi=";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "nombre"), "html", null, true);
                                echo "'>
                                <img src=";
                                // line 33
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
                                echo " alt=\"\" width=\"200\" height=\"284\" /></a>
                            ";
                            } else {
                                // line 35
                                echo "                                    <img src=";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
                                echo " alt=\"\" width=\"200\" height=\"284\" />
                            ";
                            }
                            // line 37
                            echo "                        ";
                        } else {
                            // line 38
                            echo "                                <img src=http://static.mnium.org/images/contenu/actus/HearthStone/Dos_de_cartes/Hearthstone_dos_de_cartes_saison_22.png  alt=\"dos de carte\" width=\"200\" height=\"284\" />
                        ";
                        }
                        // line 40
                        echo "                    ";
                    }
                    // line 41
                    echo "                ";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 42
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 0)) {
                        // line 43
                        echo "                        <li>Perdu</li>
                    ";
                    }
                    // line 45
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 46
                echo "                ";
                $context["cpt2"] = ((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) + 1);
                // line 47
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listeCarte'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "            </th>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['joueurL'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "       </tr>
       <tr>
            ";
        // line 52
        $context["cpt"] = 0;
        echo "  
           <th> Defausse des Joueurs</th>
            ";
        // line 54
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste"]) ? $context["liste"] : $this->getContext($context, "liste")));
        foreach ($context['_seq'] as $context["_key"] => $context["joueurL"]) {
            // line 55
            echo "            <th>
            ";
            // line 56
            $context["cpt"] = ((isset($context["cpt"]) ? $context["cpt"] : $this->getContext($context, "cpt")) + 1);
            // line 57
            echo "            ";
            $context["cpt2"] = 0;
            echo "  
            ";
            // line 58
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["joueurL"]) ? $context["joueurL"] : $this->getContext($context, "joueurL")));
            foreach ($context['_seq'] as $context["_key"] => $context["listeCarte"]) {
                echo " 
                ";
                // line 59
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["listeCarte"]) ? $context["listeCarte"] : $this->getContext($context, "listeCarte")));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
                    // line 60
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 1)) {
                        // line 61
                        echo "                        <img src=";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "url"), "html", null, true);
                        echo " alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["carte"]) ? $context["carte"] : $this->getContext($context, "carte")), "pouvoir"), "html", null, true);
                        echo "\" width=\"150\" height=\"214\" />
                     ";
                    }
                    // line 63
                    echo "                ";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 64
                    echo "                    ";
                    if (((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) == 1)) {
                        // line 65
                        echo "                    <li>Pas de carte</li>
                    ";
                    }
                    // line 67
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carte'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 68
                echo "                ";
                $context["cpt2"] = ((isset($context["cpt2"]) ? $context["cpt2"] : $this->getContext($context, "cpt2")) + 1);
                // line 69
                echo "               
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listeCarte'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            echo "            </th>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['joueurL'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
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
        return array (  271 => 73,  264 => 71,  257 => 69,  254 => 68,  248 => 67,  244 => 65,  241 => 64,  236 => 63,  228 => 61,  225 => 60,  220 => 59,  214 => 58,  209 => 57,  207 => 56,  204 => 55,  200 => 54,  195 => 52,  191 => 50,  184 => 48,  178 => 47,  175 => 46,  169 => 45,  165 => 43,  162 => 42,  157 => 41,  154 => 40,  150 => 38,  147 => 37,  141 => 35,  136 => 33,  127 => 32,  124 => 31,  121 => 30,  118 => 29,  113 => 28,  107 => 27,  101 => 25,  99 => 24,  96 => 23,  92 => 22,  87 => 20,  84 => 19,  75 => 17,  71 => 16,  67 => 14,  58 => 12,  55 => 11,  51 => 10,  45 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
