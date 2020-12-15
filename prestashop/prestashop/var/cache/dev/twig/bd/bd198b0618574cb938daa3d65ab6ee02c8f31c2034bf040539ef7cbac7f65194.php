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

/* @PrestaShop/Admin/Module/Includes/dropdown_bulk.html.twig */
class __TwigTemplate_5fe1afee4f910f1b01e7ad1089fb7523f84a25476bfb84d55be1b16192dac94b extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Module/Includes/dropdown_bulk.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Module/Includes/dropdown_bulk.html.twig"));

        // line 25
        echo "<div class=\"ps-dropdown dropdown btn-group bordered mb-1 module-bulk-actions disabled\">
  <div id=\"bulk-actions-dropdown\" class=\"dropdown-label\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
    <span class=\"js-selected-item selected-item module-bulk-actions-selector-label\">
      ";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Uninstall", [], "Admin.Actions"), "html", null, true);
        echo "
    </span>
    <i class=\"material-icons arrow-down float-right\">keyboard_arrow_down</i>
  </div>

  <div class=\"ps-dropdown-menu dropdown-menu module-category-selector\">
    <ul class=\"items-list js-items-list\">
      ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["bulkActions"] ?? $this->getContext($context, "bulkActions")));
        foreach ($context['_seq'] as $context["key"] => $context["name"]) {
            // line 36
            echo "        <li
          class=\"module-bulk-menu\"
          data-ref=\"";
            // line 38
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\"
          data-display-name=\"";
            // line 39
            echo twig_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\"
        >
          <a class=\"dropdown-item\" href=\"#\">
            ";
            // line 42
            echo twig_escape_filter($this->env, $context["name"], "html", null, true);
            echo "
          </a>
        </li>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "    </ul>
  </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Module/Includes/dropdown_bulk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 46,  69 => 42,  63 => 39,  59 => 38,  55 => 36,  51 => 35,  41 => 28,  36 => 25,);
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
<div class=\"ps-dropdown dropdown btn-group bordered mb-1 module-bulk-actions disabled\">
  <div id=\"bulk-actions-dropdown\" class=\"dropdown-label\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
    <span class=\"js-selected-item selected-item module-bulk-actions-selector-label\">
      {{ 'Uninstall'|trans({}, 'Admin.Actions') }}
    </span>
    <i class=\"material-icons arrow-down float-right\">keyboard_arrow_down</i>
  </div>

  <div class=\"ps-dropdown-menu dropdown-menu module-category-selector\">
    <ul class=\"items-list js-items-list\">
      {% for key, name in bulkActions %}
        <li
          class=\"module-bulk-menu\"
          data-ref=\"{{key}}\"
          data-display-name=\"{{name}}\"
        >
          <a class=\"dropdown-item\" href=\"#\">
            {{ name }}
          </a>
        </li>
      {% endfor %}
    </ul>
  </div>
</div>
", "@PrestaShop/Admin/Module/Includes/dropdown_bulk.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/dropdown_bulk.html.twig");
    }
}
