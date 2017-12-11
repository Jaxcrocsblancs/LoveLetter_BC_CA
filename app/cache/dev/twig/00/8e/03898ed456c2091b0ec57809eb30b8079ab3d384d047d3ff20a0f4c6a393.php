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
      <h1>LoveLetter</h1>
      
    </div>

   
      <div id=\"content\" class=\"col-md-9\">
        ";
        // line 26
        $this->displayBlock('body', $context, $blocks);
        // line 28
        echo "      </div>
    </div>

      <hr>
  </div>

  ";
        // line 34
        $this->displayBlock('javascripts', $context, $blocks);
        // line 39
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

    // line 26
    public function block_body($context, array $blocks = array())
    {
        // line 27
        echo "        ";
    }

    // line 34
    public function block_javascripts($context, array $blocks = array())
    {
        // line 35
        echo "    ";
        // line 36
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>
    <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js\"></script>
  ";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  98 => 36,  96 => 35,  93 => 34,  89 => 27,  86 => 26,  81 => 13,  79 => 12,  76 => 11,  70 => 9,  64 => 39,  62 => 34,  54 => 28,  52 => 26,  39 => 15,  37 => 11,  32 => 9,  23 => 2,);
    }
}
