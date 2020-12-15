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

/* @PrestaShop/Admin/TwigTemplateForm/material.html.twig */
class __TwigTemplate_bd7b51f71ccfa40eca930af18b0e16aa7a20069108fd16357acac35ce9ea568b extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'material_choice_tree_widget' => [$this, 'block_material_choice_tree_widget'],
            'material_choice_tree_item_widget' => [$this, 'block_material_choice_tree_item_widget'],
            'material_choice_tree_item_checkbox_widget' => [$this, 'block_material_choice_tree_item_checkbox_widget'],
            'material_choice_tree_item_radio_widget' => [$this, 'block_material_choice_tree_item_radio_widget'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/TwigTemplateForm/material.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/TwigTemplateForm/material.html.twig"));

        // line 25
        echo "
";
        // line 26
        $this->displayBlock('material_choice_tree_widget', $context, $blocks);
        // line 48
        echo "
";
        // line 49
        $this->displayBlock('material_choice_tree_item_widget', $context, $blocks);
        // line 69
        echo "
";
        // line 70
        $this->displayBlock('material_choice_tree_item_checkbox_widget', $context, $blocks);
        // line 88
        echo "
";
        // line 89
        $this->displayBlock('material_choice_tree_item_radio_widget', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 26
    public function block_material_choice_tree_widget($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "material_choice_tree_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "material_choice_tree_widget"));

        // line 27
        echo "<div class=\"material-choice-tree-container js-choice-tree-container\" id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "id", []), "html", null, true);
        echo "\">
  <div class=\"choice-tree-actions\">
    <span class=\"form-control-label js-toggle-choice-tree-action\"
          data-expanded-text=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Expand", [], "Admin.Actions"), "html", null, true);
        echo "\"
          data-expanded-icon=\"expand_more\"
          data-collapsed-text=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Collapse", [], "Admin.Actions"), "html", null, true);
        echo "\"
          data-collapsed-icon=\"expand_less\"
          data-action=\"expand\"
    >
      <i class=\"material-icons\">expand_more</i>
      <span class=\"js-toggle-text\">";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Expand", [], "Admin.Actions"), "html", null, true);
        echo "</span>
    </span>
  </div>

  <ul class=\"choice-tree\">
    ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["choices_tree"] ?? $this->getContext($context, "choices_tree")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["choice"]) {
            // line 43
            echo "      ";
            $this->displayBlock("material_choice_tree_item_widget", $context, $blocks);
            echo "
    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['choice'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "  </ul>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 49
    public function block_material_choice_tree_item_widget($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "material_choice_tree_item_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "material_choice_tree_item_widget"));

        // line 50
        echo "  ";
        $context["has_children"] = $this->getAttribute(($context["choice"] ?? null), ($context["choice_children"] ?? $this->getContext($context, "choice_children")), [], "array", true, true);
        // line 51
        echo "
  <li class=\"";
        // line 52
        if ($this->getAttribute(($context["choice"] ?? $this->getContext($context, "choice")), "has_selected_children", [])) {
            echo "expanded";
        } elseif (($context["has_children"] ?? $this->getContext($context, "has_children"))) {
            echo "collapsed";
        }
        echo "\">
    ";
        // line 53
        if (($context["multiple"] ?? $this->getContext($context, "multiple"))) {
            // line 54
            echo "      ";
            $this->displayBlock("material_choice_tree_item_checkbox_widget", $context, $blocks);
            echo "
    ";
        } else {
            // line 56
            echo "      ";
            $this->displayBlock("material_choice_tree_item_radio_widget", $context, $blocks);
            echo "
    ";
        }
        // line 58
        echo "
    ";
        // line 59
        if (($context["has_children"] ?? $this->getContext($context, "has_children"))) {
            // line 60
            echo "      <ul>
        ";
            // line 61
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["choice"] ?? $this->getContext($context, "choice")), ($context["choice_children"] ?? $this->getContext($context, "choice_children")), [], "array"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 62
                echo "          ";
                $context["choice"] = $context["item"];
                // line 63
                echo "          ";
                $this->displayBlock("material_choice_tree_item_widget", $context, $blocks);
                echo "
        ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "      </ul>
    ";
        }
        // line 67
        echo "  </li>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 70
    public function block_material_choice_tree_item_checkbox_widget($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "material_choice_tree_item_checkbox_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "material_choice_tree_item_checkbox_widget"));

        // line 71
        echo "  <div class=\"checkbox js-input-wrapper\">
    <div class=\"md-checkbox md-checkbox-inline\">
      <label>
        <input type=\"checkbox\"
               ";
        // line 75
        if ( !(null === $this->getAttribute(($context["choice"] ?? $this->getContext($context, "choice")), ($context["choice_value"] ?? $this->getContext($context, "choice_value")), [], "array"))) {
            // line 76
            echo "                 name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "full_name", []), "html", null, true);
            echo "[]\"
                 value=\"";
            // line 77
            echo twig_escape_filter($this->env, $this->getAttribute(($context["choice"] ?? $this->getContext($context, "choice")), ($context["choice_value"] ?? $this->getContext($context, "choice_value")), [], "array"), "html", null, true);
            echo "\"
                 ";
            // line 78
            if (twig_in_filter($this->getAttribute(($context["choice"] ?? $this->getContext($context, "choice")), ($context["choice_value"] ?? $this->getContext($context, "choice_value")), [], "array"), ($context["selected_values"] ?? $this->getContext($context, "selected_values")))) {
                echo "checked";
            }
            // line 79
            echo "               ";
        }
        // line 80
        echo "               ";
        if ((($context["disabled"] ?? $this->getContext($context, "disabled")) || twig_in_filter($this->getAttribute(($context["choice"] ?? $this->getContext($context, "choice")), ($context["choice_value"] ?? $this->getContext($context, "choice_value")), [], "array"), ($context["disabled_values"] ?? $this->getContext($context, "disabled_values"))))) {
            echo "disabled";
        }
        // line 81
        echo "        >
        <i class=\"md-checkbox-control\"></i>
        ";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute(($context["choice"] ?? $this->getContext($context, "choice")), ($context["choice_label"] ?? $this->getContext($context, "choice_label")), [], "array"), "html", null, true);
        echo "
      </label>
    </div>
  </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 89
    public function block_material_choice_tree_item_radio_widget($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "material_choice_tree_item_radio_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "material_choice_tree_item_radio_widget"));

        // line 90
        echo "  <div class=\"radio js-input-wrapper\">
    <label>
      <input type=\"radio\"
             name=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "full_name", []), "html", null, true);
        echo "\"
             value=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute(($context["choice"] ?? $this->getContext($context, "choice")), ($context["choice_value"] ?? $this->getContext($context, "choice_value")), [], "array"), "html", null, true);
        echo "\"
             ";
        // line 95
        if (twig_in_filter($this->getAttribute(($context["choice"] ?? $this->getContext($context, "choice")), ($context["choice_value"] ?? $this->getContext($context, "choice_value")), [], "array"), ($context["selected_values"] ?? $this->getContext($context, "selected_values")))) {
            echo "checked";
        }
        // line 96
        echo "             ";
        if ((($context["disabled"] ?? $this->getContext($context, "disabled")) || twig_in_filter($this->getAttribute(($context["choice"] ?? $this->getContext($context, "choice")), ($context["choice_value"] ?? $this->getContext($context, "choice_value")), [], "array"), ($context["disabled_values"] ?? $this->getContext($context, "disabled_values"))))) {
            echo "disabled";
        }
        // line 97
        echo "      >
      ";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute(($context["choice"] ?? $this->getContext($context, "choice")), ($context["choice_label"] ?? $this->getContext($context, "choice_label")), [], "array"), "html", null, true);
        echo "
    </label>
  </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/TwigTemplateForm/material.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  339 => 98,  336 => 97,  331 => 96,  327 => 95,  323 => 94,  319 => 93,  314 => 90,  305 => 89,  290 => 83,  286 => 81,  281 => 80,  278 => 79,  274 => 78,  270 => 77,  265 => 76,  263 => 75,  257 => 71,  248 => 70,  237 => 67,  233 => 65,  216 => 63,  213 => 62,  196 => 61,  193 => 60,  191 => 59,  188 => 58,  182 => 56,  176 => 54,  174 => 53,  166 => 52,  163 => 51,  160 => 50,  151 => 49,  139 => 45,  122 => 43,  105 => 42,  97 => 37,  89 => 32,  84 => 30,  77 => 27,  68 => 26,  58 => 89,  55 => 88,  53 => 70,  50 => 69,  48 => 49,  45 => 48,  43 => 26,  40 => 25,);
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

{% block material_choice_tree_widget %}
<div class=\"material-choice-tree-container js-choice-tree-container\" id=\"{{ form.vars.id }}\">
  <div class=\"choice-tree-actions\">
    <span class=\"form-control-label js-toggle-choice-tree-action\"
          data-expanded-text=\"{{ 'Expand'|trans({}, 'Admin.Actions') }}\"
          data-expanded-icon=\"expand_more\"
          data-collapsed-text=\"{{ 'Collapse'|trans({}, 'Admin.Actions') }}\"
          data-collapsed-icon=\"expand_less\"
          data-action=\"expand\"
    >
      <i class=\"material-icons\">expand_more</i>
      <span class=\"js-toggle-text\">{{ 'Expand'|trans({}, 'Admin.Actions') }}</span>
    </span>
  </div>

  <ul class=\"choice-tree\">
    {% for choice in choices_tree %}
      {{ block('material_choice_tree_item_widget') }}
    {% endfor %}
  </ul>
</div>
{% endblock material_choice_tree_widget %}

{% block material_choice_tree_item_widget %}
  {% set has_children = choice[choice_children] is defined %}

  <li class=\"{% if choice.has_selected_children %}expanded{% elseif has_children %}collapsed{% endif %}\">
    {% if multiple %}
      {{ block('material_choice_tree_item_checkbox_widget') }}
    {% else %}
      {{ block('material_choice_tree_item_radio_widget') }}
    {% endif %}

    {% if has_children %}
      <ul>
        {% for item in choice[choice_children] %}
          {% set choice = item %}
          {{ block('material_choice_tree_item_widget') }}
        {% endfor %}
      </ul>
    {% endif %}
  </li>
{% endblock material_choice_tree_item_widget %}

{% block material_choice_tree_item_checkbox_widget %}
  <div class=\"checkbox js-input-wrapper\">
    <div class=\"md-checkbox md-checkbox-inline\">
      <label>
        <input type=\"checkbox\"
               {% if choice[choice_value] is not null %}
                 name=\"{{ form.vars.full_name }}[]\"
                 value=\"{{ choice[choice_value] }}\"
                 {% if choice[choice_value] in selected_values %}checked{% endif %}
               {% endif %}
               {% if disabled or choice[choice_value] in disabled_values %}disabled{% endif %}
        >
        <i class=\"md-checkbox-control\"></i>
        {{ choice[choice_label] }}
      </label>
    </div>
  </div>
{% endblock material_choice_tree_item_checkbox_widget %}

{% block material_choice_tree_item_radio_widget %}
  <div class=\"radio js-input-wrapper\">
    <label>
      <input type=\"radio\"
             name=\"{{ form.vars.full_name }}\"
             value=\"{{ choice[choice_value] }}\"
             {% if choice[choice_value] in selected_values %}checked{% endif %}
             {% if disabled or choice[choice_value] in disabled_values %}disabled{% endif %}
      >
      {{ choice[choice_label] }}
    </label>
  </div>
{% endblock material_choice_tree_item_radio_widget %}
", "@PrestaShop/Admin/TwigTemplateForm/material.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/TwigTemplateForm/material.html.twig");
    }
}
