<?php

/* LoveLetterPlatformBundle::layout.html.twig */
class __TwigTemplate_5ace1996e0345ce9de621f0bfafb0d4ce191678ba4c36bc1c5eae5279ea46d2a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'ocplatform_body' => array($this, 'block_ocplatform_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        // line 6
        echo "  Partie - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "  ";
        $this->displayBlock('ocplatform_body', $context, $blocks);
    }

    public function block_ocplatform_body($context, array $blocks = array())
    {
        // line 11
        echo "      
      
  ";
    }

    public function getTemplateName()
    {
        return "LoveLetterPlatformBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 10,  40 => 9,  33 => 6,  30 => 5,  59 => 17,  50 => 11,  45 => 13,  41 => 12,  31 => 4,  28 => 3,);
    }
}
