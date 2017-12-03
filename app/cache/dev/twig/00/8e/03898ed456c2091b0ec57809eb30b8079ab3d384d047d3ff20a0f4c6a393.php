<?php

/* ::layout.html.twig */
class __TwigTemplate_008e03898ed456c2091b0ec57809eb30b8079ab3d384d047d3ff20a0f4c6a393 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
<!DOCTYPE html>
<html>
<head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

  <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

  ";
        // line 11
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 15
        echo "</head>

<body>
  <div class=\"container\">
    <div id=\"header\" class=\"jumbotron\">
      <h1>Jeu</h1>
      <p>
        Ce projet est propulsé par Symfony,
        et construit grâce au MOOC OpenClassrooms et SensioLabs.
      </p>
    </div>

    <div class=\"row\">
      <div id=\"menu\" class=\"col-md-3\">
        <h3>Les Parties</h3>
        <ul class=\"nav nav-pills nav-stacked\">
         ";
        // line 32
        echo "         ";
        // line 33
        echo "        </ul>

        <h4>Dernières Partie</h4>
        ";
        // line 37
        echo "      </div>
      <div id=\"content\" class=\"col-md-9\">
        ";
        // line 39
        $this->displayBlock('body', $context, $blocks);
        // line 41
        echo "      </div>
    </div>

    <hr>

    <footer>
      <p>The sky's the limit © ";
        // line 47
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " and beyond.</p>
    </footer>
  </div>

  ";
        // line 51
        $this->displayBlock('javascripts', $context, $blocks);
        // line 56
        echo "
</body>
</html>";
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        echo "LoveLetter";
    }

    // line 11
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        // line 13
        echo "    <link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css\">
  ";
    }

    // line 39
    public function block_body($context, array $blocks = array())
    {
        // line 40
        echo "        ";
    }

    // line 51
    public function block_javascripts($context, array $blocks = array())
    {
        // line 52
        echo "    ";
        // line 53
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>
    <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js\"></script>
  ";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 53,  119 => 52,  116 => 51,  112 => 40,  109 => 39,  104 => 13,  102 => 12,  99 => 11,  93 => 9,  87 => 56,  85 => 51,  78 => 47,  70 => 41,  68 => 39,  64 => 37,  59 => 33,  57 => 32,  39 => 15,  37 => 11,  32 => 9,  23 => 2,  63 => 18,  60 => 17,  55 => 19,  52 => 17,  46 => 12,  43 => 10,  40 => 9,  33 => 6,  30 => 5,  31 => 4,  28 => 3,);
    }
}
