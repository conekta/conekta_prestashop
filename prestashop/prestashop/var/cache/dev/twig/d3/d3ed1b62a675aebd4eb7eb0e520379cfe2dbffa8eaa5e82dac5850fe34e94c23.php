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

/* @PrestaShop/Admin/Module/catalog.html.twig */
class __TwigTemplate_72adadb43d7daa7e0a3db4b8b495ef1b00fc2d5aefd9cc1252af97f8aab25a47 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Module/common.html.twig", "@PrestaShop/Admin/Module/catalog.html.twig", 25);
        $this->blocks = [
            'javascripts' => [$this, 'block_javascripts'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@PrestaShop/Admin/Module/common.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Module/catalog.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Module/catalog.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 27
    public function block_javascripts($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 28
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script>
    \$('body').on(
      'moduleCatalogLoaded',
      function() {
        ";
        // line 33
        if ($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "request", []), "get", [0 => "filterCategoryTab"], "method")) {
            // line 34
            echo "        \$('.module-category-menu[data-category-tab=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "request", []), "get", [0 => "filterCategoryTab"], "method"), "html", null, true);
            echo "\"]').click();
        ";
        }
        // line 36
        echo "        ";
        if ($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "request", []), "get", [0 => "filterCategoryRef"], "method")) {
            // line 37
            echo "        \$('.module-category-menu[data-category-ref=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "request", []), "get", [0 => "filterCategoryRef"], "method"), "html", null, true);
            echo "\"]').click();
        ";
        }
        // line 39
        echo "      }
    );
  </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 44
    public function block_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 45
        echo "  <div class=\"row justify-content-center\">
    <div class=\"col-lg-10 module-catalog-page\">
      ";
        // line 48
        echo "      ";
        $this->loadTemplate("@PrestaShop/Admin/Module/Includes/modal_addons_connect.html.twig", "@PrestaShop/Admin/Module/catalog.html.twig", 48)->display(twig_array_merge($context, ["level" => ($context["level"] ?? $this->getContext($context, "level")), "errorMessage" => ($context["errorMessage"] ?? $this->getContext($context, "errorMessage"))]));
        // line 49
        echo "      ";
        // line 50
        echo "      ";
        $this->loadTemplate("@PrestaShop/Admin/Module/Includes/modal_confirm_prestatrust.html.twig", "@PrestaShop/Admin/Module/catalog.html.twig", 50)->display($context);
        // line 51
        echo "      ";
        // line 52
        echo "      ";
        $this->loadTemplate("@PrestaShop/Admin/Module/Includes/modal_import.html.twig", "@PrestaShop/Admin/Module/catalog.html.twig", 52)->display(twig_array_merge($context, ["level" => ($context["level"] ?? $this->getContext($context, "level")), "errorMessage" => ($context["errorMessage"] ?? $this->getContext($context, "errorMessage"))]));
        // line 53
        echo "      ";
        // line 54
        echo "      ";
        $this->loadTemplate("@PrestaShop/Admin/Module/Includes/menu_top.html.twig", "@PrestaShop/Admin/Module/catalog.html.twig", 54)->display($context);
        // line 55
        echo "      ";
        // line 56
        echo "      ";
        $this->loadTemplate("@PrestaShop/Admin/Module/Includes/grid_loader.html.twig", "@PrestaShop/Admin/Module/catalog.html.twig", 56)->display($context);
        // line 57
        echo "      ";
        // line 58
        echo "      ";
        if ($this->getAttribute(($context["topMenuData"] ?? null), "categories", [], "any", true, true)) {
            // line 59
            echo "        ";
            $this->loadTemplate("@PrestaShop/Admin/Module/Includes/categories_grid.html.twig", "@PrestaShop/Admin/Module/catalog.html.twig", 59)->display(twig_array_merge($context, ["categories" => $this->getAttribute(($context["topMenuData"] ?? $this->getContext($context, "topMenuData")), "categories", [])]));
            // line 60
            echo "      ";
        }
        // line 61
        echo "    </div>
  </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Module/catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 61,  144 => 60,  141 => 59,  138 => 58,  136 => 57,  133 => 56,  131 => 55,  128 => 54,  126 => 53,  123 => 52,  121 => 51,  118 => 50,  116 => 49,  113 => 48,  109 => 45,  100 => 44,  87 => 39,  81 => 37,  78 => 36,  72 => 34,  70 => 33,  61 => 28,  52 => 27,  22 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#**
 * 2007-2019 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *#}
{% extends '@PrestaShop/Admin/Module/common.html.twig' %}

{% block javascripts %}
  {{ parent() }}
  <script>
    \$('body').on(
      'moduleCatalogLoaded',
      function() {
        {% if app.request.get('filterCategoryTab') %}
        \$('.module-category-menu[data-category-tab=\"{{ app.request.get('filterCategoryTab') }}\"]').click();
        {% endif %}
        {% if app.request.get('filterCategoryRef') %}
        \$('.module-category-menu[data-category-ref=\"{{ app.request.get('filterCategoryRef') }}\"]').click();
        {% endif %}
      }
    );
  </script>
{% endblock %}

{% block content %}
  <div class=\"row justify-content-center\">
    <div class=\"col-lg-10 module-catalog-page\">
      {# Addons connect modal #}
      {% include '@PrestaShop/Admin/Module/Includes/modal_addons_connect.html.twig' with { 'level' : level, 'errorMessage' : errorMessage } %}
      {# PrestaTrust modal #}
      {% include '@PrestaShop/Admin/Module/Includes/modal_confirm_prestatrust.html.twig' %}
      {# Contains toolbar-nav for module page #}
      {% include '@PrestaShop/Admin/Module/Includes/modal_import.html.twig' with { 'level' : level, 'errorMessage' : errorMessage } %}
      {# Contains menu with Selection/Categories/Popular and Tag Search #}
      {% include '@PrestaShop/Admin/Module/Includes/menu_top.html.twig' %}
      {# Temporary loader until ajax has finished and display the full catalog #}
      {% include '@PrestaShop/Admin/Module/Includes/grid_loader.html.twig' %}
      {# Module Categories Grid #}
      {% if topMenuData.categories is defined %}
        {% include '@PrestaShop/Admin/Module/Includes/categories_grid.html.twig' with { 'categories' : topMenuData.categories }  %}
      {% endif %}
    </div>
  </div>
{% endblock %}
", "@PrestaShop/Admin/Module/catalog.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Module/catalog.html.twig");
    }
}
