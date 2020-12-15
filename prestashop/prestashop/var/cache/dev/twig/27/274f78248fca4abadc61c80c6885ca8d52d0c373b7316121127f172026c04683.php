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

/* @Twig/form_max_length.html.twig */
class __TwigTemplate_951df79de11137810736088621421a491db5f969a6e1f4bead1a4158051cdc18 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Twig/form_max_length.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Twig/form_max_length.html.twig"));

        // line 25
        if ($this->getAttribute(($context["attr"] ?? null), "counter", [], "any", true, true)) {
            // line 26
            echo "  ";
            $context["isRecommandedType"] = ($this->getAttribute(($context["attr"] ?? null), "counter_type", [], "any", true, true) && ($this->getAttribute(($context["attr"] ?? $this->getContext($context, "attr")), "counter_type", []) == "recommended"));
            // line 27
            echo "  <small class=\"form-text text-muted text-right maxLength ";
            echo (( !($context["isRecommandedType"] ?? $this->getContext($context, "isRecommandedType"))) ? ("maxType") : (""));
            echo "\">
      <em>
        ";
            // line 29
            if (($context["isRecommandedType"] ?? $this->getContext($context, "isRecommandedType"))) {
                // line 30
                echo "          ";
                echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("[1][/1] of [2][/2] characters used (recommended)", [], "Admin.Catalog.Feature"), ["[1]" => "<span class=\"currentLength\">", "[/1]" => "</span>", "[2]" => ("<span class=\"currentTotalMax\">" . $this->getAttribute(                // line 33
($context["attr"] ?? $this->getContext($context, "attr")), "counter", [])), "[/2]" => "</span>"]);
                // line 35
                echo "
        ";
            } else {
                // line 37
                echo "          ";
                echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("[1][/1] of [2][/2] characters allowed", [], "Admin.Catalog.Feature"), ["[1]" => "<span class=\"currentLength\">", "[/1]" => "</span>", "[2]" => ("<span class=\"currentTotalMax\">" . $this->getAttribute(                // line 40
($context["attr"] ?? $this->getContext($context, "attr")), "counter", [])), "[/2]" => "</span>"]);
                // line 42
                echo "
        ";
            }
            // line 44
            echo "      </em>
  </small>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/form_max_length.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 44,  61 => 42,  59 => 40,  57 => 37,  53 => 35,  51 => 33,  49 => 30,  47 => 29,  41 => 27,  38 => 26,  36 => 25,);
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
{% if attr.counter is defined %}
  {% set isRecommandedType = attr.counter_type is defined and attr.counter_type == 'recommended' %}
  <small class=\"form-text text-muted text-right maxLength {{ not(isRecommandedType) ? 'maxType' }}\">
      <em>
        {% if isRecommandedType %}
          {{ '[1][/1] of [2][/2] characters used (recommended)'|trans({}, 'Admin.Catalog.Feature')|replace({
            '[1]': '<span class=\"currentLength\">',
            '[/1]': '</span>',
            '[2]': '<span class=\"currentTotalMax\">'~attr.counter,
            '[/2]': '</span>',
          })|raw }}
        {% else %}
          {{ '[1][/1] of [2][/2] characters allowed'|trans({}, 'Admin.Catalog.Feature')|replace({
            '[1]': '<span class=\"currentLength\">',
            '[/1]': '</span>',
            '[2]': '<span class=\"currentTotalMax\">'~attr.counter,
            '[/2]': '</span>',
          })|raw }}
        {% endif %}
      </em>
  </small>
{% endif %}
", "@Twig/form_max_length.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/TwigTemplateForm/form_max_length.html.twig");
    }
}
