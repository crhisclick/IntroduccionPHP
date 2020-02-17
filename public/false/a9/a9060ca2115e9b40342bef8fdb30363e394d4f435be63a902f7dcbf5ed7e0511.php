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

/* admin.twig */
class __TwigTemplate_684c2cc459ab3213bdf6de98819a4348a17b5673f2b28f7ffe258ff87164b4c5 extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "admin.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h1>Dashboard</h1>
<ul>
<li><a href=\"/curso-introduccion-php/user/add\">Add User</a></li>
<li><a href=\"/curso-introduccion-php/jobs/add\">Add Jobs</a></li>
</ul>
<br>
<br>
<br>
<a href=\"/curso-introduccion-php/logout\">logout</a>
";
    }

    public function getTemplateName()
    {
        return "admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block content %}
<h1>Dashboard</h1>
<ul>
<li><a href=\"/curso-introduccion-php/user/add\">Add User</a></li>
<li><a href=\"/curso-introduccion-php/jobs/add\">Add Jobs</a></li>
</ul>
<br>
<br>
<br>
<a href=\"/curso-introduccion-php/logout\">logout</a>
{% endblock %}
", "admin.twig", "C:\\xampp\\htdocs\\curso-introduccion-php\\views\\admin.twig");
    }
}
