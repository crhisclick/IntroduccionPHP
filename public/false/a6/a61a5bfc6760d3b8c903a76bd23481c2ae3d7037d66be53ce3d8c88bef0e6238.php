<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* login.twig */
class __TwigTemplate_bf7027ab7bf9e4ac846433a25a3f88f6d9e23740eb57f4cc563f309a42f74e8c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.twig", "login.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h1>Loggin</h1>
<div class=\"alert alert-primary\" role=\"alert\">
";
        // line 6
        echo twig_escape_filter($this->env, ($context["responseMessage"] ?? null), "html", null, true);
        echo "
</div>
<div>  
    <form action=\"/curso-introduccion-php/auth\" method=\"post\">
        <label for=\"\">Email</label>
        <input type=\"text\" name=\"email\" placeholder=\"Email\"><br>
        <label for=\"\">Password</label>
        <input type=\"password\" name=\"password\" placeholder=\"Password\"><br>
        <button type=\"submit\">Login</button>
    </form>
</div>


";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 6,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block content %}
<h1>Loggin</h1>
<div class=\"alert alert-primary\" role=\"alert\">
{{responseMessage}}
</div>
<div>  
    <form action=\"/curso-introduccion-php/auth\" method=\"post\">
        <label for=\"\">Email</label>
        <input type=\"text\" name=\"email\" placeholder=\"Email\"><br>
        <label for=\"\">Password</label>
        <input type=\"password\" name=\"password\" placeholder=\"Password\"><br>
        <button type=\"submit\">Login</button>
    </form>
</div>


{% endblock %}", "login.twig", "C:\\xampp\\htdocs\\curso-introduccion-php\\views\\login.twig");
    }
}
