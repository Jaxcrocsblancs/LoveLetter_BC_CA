<?php

/* LoveLetterPlatformBundle:Advert:accueil.html.twig */
class __TwigTemplate_285e14442c4b02b10bd65c9b5ea0a65cfa743f87a06adbac65ce281d51aef34e extends Twig_Template
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
        echo "
  <h2>Liste des parties</h2>

  <ul>
    
  </ul>

";
    }

    public function getTemplateName()
    {
        return "LoveLetterPlatformBundle:Advert:accueil.html.twig";
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
