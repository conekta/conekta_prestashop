<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @WebProfiler/Icon/logger.svg */
class __TwigTemplate_267983fe1554eaab01e6e34cb6532e8755426bc7d765026283a1a9ce2b9a6b3b extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Icon/logger.svg"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Icon/logger.svg"));

        // line 1
        echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path fill=\"#AAA\" d=\"M21 4v13.8c0 2.7-2.5 5.2-5.2 5.2H6c-.6 0-1-.4-1-1s.4-1 1-1h9.8c1.6 0 3.2-1.7 3.2-3.2V4c0-.6.4-1 1-1s1 .4 1 1zM5.5 20A2.5 2.5 0 0 1 3 17.5v-14C3 2.1 4.1 1 5.5 1h10.1C16.9 1 18 2.1 18 3.5v14.1c0 1.4-1.1 2.5-2.5 2.5h-10zM9 11.4c0 .3.3.6.6.6h1.8c.3 0 .6-.3.6-.6V4.6c0-.3-.3-.6-.6-.6H9.6c-.3 0-.6.3-.6.6v6.8zm0 5c0 .3.3.6.6.6h1.8c.3 0 .6-.3.6-.6v-1.8c0-.3-.3-.6-.6-.6H9.6c-.3 0-.6.3-.6.6v1.8z\"/></svg>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Icon/logger.svg";
    }

    public function getDebugInfo()
    {
        return array (  36 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path fill=\"#AAA\" d=\"M21 4v13.8c0 2.7-2.5 5.2-5.2 5.2H6c-.6 0-1-.4-1-1s.4-1 1-1h9.8c1.6 0 3.2-1.7 3.2-3.2V4c0-.6.4-1 1-1s1 .4 1 1zM5.5 20A2.5 2.5 0 0 1 3 17.5v-14C3 2.1 4.1 1 5.5 1h10.1C16.9 1 18 2.1 18 3.5v14.1c0 1.4-1.1 2.5-2.5 2.5h-10zM9 11.4c0 .3.3.6.6.6h1.8c.3 0 .6-.3.6-.6V4.6c0-.3-.3-.6-.6-.6H9.6c-.3 0-.6.3-.6.6v6.8zm0 5c0 .3.3.6.6.6h1.8c.3 0 .6-.3.6-.6v-1.8c0-.3-.3-.6-.6-.6H9.6c-.3 0-.6.3-.6.6v1.8z\"/></svg>
", "@WebProfiler/Icon/logger.svg", "/var/www/html/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Icon/logger.svg");
    }
}
