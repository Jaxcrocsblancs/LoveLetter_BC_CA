<?php

/* LoveLetterPlatformBundle::layoutJeu.html.twig */
class __TwigTemplate_1582f8b74ee61661bf9bf9a7dc357c95e611a336ab01aca1f064f23a070a4e18 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'LoveLetterplatform_body' => array($this, 'block_LoveLetterplatform_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<head>
  <meta charset=\"utf-8\">
    <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>

<body  style=\"background-color:#006600;\">

";
        // line 9
        $this->displayBlock('LoveLetterplatform_body', $context, $blocks);
        // line 11
        echo "
<div id=\"update\"></div>
</body>
</html>
<script type=\"text/javascript\">
 \tsetInterval(function(){
\t\t\$.ajax({
\t\t\turl: \"verify.php\",
\t\t\tmethod: 'post',
\t\t\tdata: {id: 2, user: 1}
\t\t})
\t\t.done(function(data){
\t\t\tconsole.log(data);
\t\t\t\$('#update').html(data);
\t\t});
 \t}, 500);
</script>";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "LoveLetter";
    }

    // line 9
    public function block_LoveLetterplatform_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "LoveLetterPlatformBundle::layoutJeu.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  62 => 9,  56 => 4,  36 => 11,  26 => 4,  21 => 1,  265 => 69,  258 => 67,  251 => 65,  248 => 64,  242 => 63,  238 => 61,  235 => 60,  230 => 59,  224 => 57,  221 => 56,  216 => 55,  210 => 54,  205 => 53,  203 => 52,  200 => 51,  196 => 50,  192 => 49,  188 => 47,  181 => 45,  175 => 44,  172 => 43,  166 => 42,  162 => 40,  159 => 39,  154 => 38,  151 => 37,  147 => 35,  144 => 34,  138 => 32,  133 => 30,  124 => 29,  121 => 28,  118 => 27,  115 => 26,  110 => 25,  104 => 24,  99 => 23,  97 => 22,  94 => 21,  90 => 20,  86 => 19,  83 => 18,  74 => 16,  70 => 15,  67 => 14,  58 => 12,  55 => 11,  51 => 10,  46 => 8,  34 => 9,  31 => 4,  28 => 3,);
    }
}
