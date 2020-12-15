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

/* @PrestaShop/Admin/Module/Includes/action_menu.html.twig */
class __TwigTemplate_5e54a986412b4be743e937f694c4bf5d81e0cb2e6798a4b6f6921f593f9e156e extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Module/Includes/action_menu.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Module/Includes/action_menu.html.twig"));

        // line 25
        list($context["url"], $context["priceRaw"], $context["priceDisplay"], $context["url_active"], $context["urls"], $context["name"]) =         [$this->getAttribute($this->getAttribute(        // line 26
($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "url", []), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 27
($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "price", []), "raw", []), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 28
($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "price", []), "displayPrice", []), $this->getAttribute($this->getAttribute(        // line 29
($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "url_active", []), $this->getAttribute($this->getAttribute(        // line 30
($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "urls", []), $this->getAttribute($this->getAttribute(        // line 31
($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "name", [])];
        // line 33
        echo " <div class=\"btn-group module-actions\"> 
  ";
        // line 34
        if ((($context["url_active"] ?? $this->getContext($context, "url_active")) == "buy")) {
            // line 35
            echo "    <a class=\"btn btn-primary btn-primary-reverse btn-block btn-outline-primary module_action_menu_go_to_addons\" href=\"";
            echo twig_escape_filter($this->env, ($context["url"] ?? $this->getContext($context, "url")), "html", null, true);
            echo "\" target=\"_blank\">
      ";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Discover", [], "Admin.Modules.Feature"), "html", null, true);
            echo "
    </a>
  ";
        } elseif (twig_length_filter($this->env,         // line 38
($context["urls"] ?? $this->getContext($context, "urls")))) {
            // line 39
            echo "    ";
            $this->loadTemplate("@PrestaShop/Admin/Module/Includes/action_button.html.twig", "@PrestaShop/Admin/Module/Includes/action_menu.html.twig", 39)->display(twig_array_merge($context, ["name" =>             // line 40
($context["name"] ?? $this->getContext($context, "name")), "classes_form" => "btn-group form-action-button", "classes" => "btn btn-primary-reverse btn-outline-primary", "url" => $this->getAttribute(            // line 43
($context["urls"] ?? $this->getContext($context, "urls")), ($context["url_active"] ?? $this->getContext($context, "url_active")), [], "array"), "action" =>             // line 44
($context["url_active"] ?? $this->getContext($context, "url_active"))]));
            // line 46
            echo "    ";
            if ((twig_length_filter($this->env, ($context["urls"] ?? $this->getContext($context, "urls"))) > 1)) {
                // line 47
                echo "        <input type=\"hidden\" class=\"btn\" /> 
        <button type=\"button\" class=\"btn btn-outline-primary dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> 
          <span class=\"caret\"></span> 
        </button>
        <span class=\"sr-only\">";
                // line 51
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Toggle Dropdown", [], "Admin.Modules.Feature"), "html", null, true);
                echo "</span> 
        <div class=\"dropdown-menu\">
          ";
                // line 53
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["urls"] ?? $this->getContext($context, "urls")));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["module_action"] => $context["module_url"]) {
                    // line 54
                    echo "            ";
                    if (($context["module_action"] != ($context["url_active"] ?? $this->getContext($context, "url_active")))) {
                        // line 55
                        echo "                <li>
                  ";
                        // line 56
                        $this->loadTemplate("@PrestaShop/Admin/Module/Includes/action_button.html.twig", "@PrestaShop/Admin/Module/Includes/action_menu.html.twig", 56)->display(twig_array_merge($context, ["name" =>                         // line 57
($context["name"] ?? $this->getContext($context, "name")), "classes" => "dropdown-item", "url" =>                         // line 59
$context["module_url"], "action" =>                         // line 60
$context["module_action"]]));
                        // line 62
                        echo "                </li>
            ";
                    }
                    // line 64
                    echo "          ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['module_action'], $context['module_url'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 65
                echo "        </div>
    ";
            }
            // line 67
            echo "  ";
        }
        // line 68
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Module/Includes/action_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 68,  131 => 67,  127 => 65,  113 => 64,  109 => 62,  107 => 60,  106 => 59,  105 => 57,  104 => 56,  101 => 55,  98 => 54,  81 => 53,  76 => 51,  70 => 47,  67 => 46,  65 => 44,  64 => 43,  63 => 40,  61 => 39,  59 => 38,  54 => 36,  49 => 35,  47 => 34,  44 => 33,  42 => 31,  41 => 30,  40 => 29,  39 => 28,  38 => 27,  37 => 26,  36 => 25,);
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
{% set url, priceRaw, priceDisplay, url_active, urls, name =
  module.attributes.url,
  module.attributes.price.raw,
  module.attributes.price.displayPrice,
  module.attributes.url_active,
  module.attributes.urls,
  module.attributes.name
%}
 <div class=\"btn-group module-actions\"> 
  {% if url_active == 'buy' %}
    <a class=\"btn btn-primary btn-primary-reverse btn-block btn-outline-primary module_action_menu_go_to_addons\" href=\"{{ url }}\" target=\"_blank\">
      {{ 'Discover'|trans({}, 'Admin.Modules.Feature') }}
    </a>
  {% elseif urls|length %}
    {% include '@PrestaShop/Admin/Module/Includes/action_button.html.twig' with {
        'name': name,
        'classes_form': 'btn-group form-action-button',
        'classes' : 'btn btn-primary-reverse btn-outline-primary',
        'url': urls[url_active],
        'action': url_active}
    %}
    {% if (urls|length > 1) %}
        <input type=\"hidden\" class=\"btn\" /> 
        <button type=\"button\" class=\"btn btn-outline-primary dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> 
          <span class=\"caret\"></span> 
        </button>
        <span class=\"sr-only\">{{ 'Toggle Dropdown'|trans({}, 'Admin.Modules.Feature') }}</span> 
        <div class=\"dropdown-menu\">
          {% for module_action, module_url in urls %}
            {% if module_action != url_active %}
                <li>
                  {% include '@PrestaShop/Admin/Module/Includes/action_button.html.twig' with {
                      'name': name,
                      'classes' : 'dropdown-item',
                      'url': module_url,
                      'action': module_action}
                  %}
                </li>
            {% endif %}
          {% endfor %}
        </div>
    {% endif %}
  {% endif %}
</div>
", "@PrestaShop/Admin/Module/Includes/action_menu.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/action_menu.html.twig");
    }
}
