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

/* @PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig */
class __TwigTemplate_f80d51882a1d0c58a75399ecccc05d539edd03b40f87d51ff3356a58f88f6764 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'customer_form' => [$this, 'block_customer_form'],
            'customer_form_rest' => [$this, 'block_customer_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig"));

        // line 25
        echo "
";
        // line 26
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig", 26);
        // line 27
        echo "
";
        // line 28
        $context["allowedNameChars"] = "0-9!<>,;?=+()@#\"°{}_\$%:";
        // line 29
        $context["isGuest"] = (((isset($context["isGuest"]) || array_key_exists("isGuest", $context))) ? (_twig_default_filter(($context["isGuest"] ?? $this->getContext($context, "isGuest")), false)) : (false));
        // line 30
        echo "
";
        // line 31
        $this->displayBlock('customer_form', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_customer_form($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "customer_form"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "customer_form"));

        // line 32
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["customerForm"] ?? $this->getContext($context, "customerForm")), 'form_start');
        echo "
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">person</i>
        ";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Customer", [], "Admin.Global"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-block row\">
        <div class=\"card-text\">
          ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["customerForm"] ?? $this->getContext($context, "customerForm")), 'errors');
        echo "

          ";
        // line 42
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "gender_id", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Social title", [], "Admin.Global")]);
        // line 44
        echo "

          ";
        // line 46
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "first_name", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("First name", [], "Admin.Global"), "help" => sprintf("%s %s", $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Invalid characters:", [], "Admin.Notifications.Info"),         // line 48
($context["allowedNameChars"] ?? $this->getContext($context, "allowedNameChars")))]);
        // line 49
        echo "

          ";
        // line 51
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "last_name", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Last name", [], "Admin.Global"), "help" => sprintf("%s %s", $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Invalid characters:", [], "Admin.Notifications.Info"),         // line 53
($context["allowedNameChars"] ?? $this->getContext($context, "allowedNameChars")))]);
        // line 54
        echo "

          ";
        // line 56
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "email", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Email", [], "Admin.Global")]);
        // line 58
        echo "

          ";
        // line 60
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "password", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Password", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Password should be at least %length% characters long.", ["%length%" =>         // line 62
($context["minPasswordLength"] ?? $this->getContext($context, "minPasswordLength"))], "Admin.Notifications.Info"), "class" => ((        // line 63
($context["isGuest"] ?? $this->getContext($context, "isGuest"))) ? ("d-none") : (""))]);
        // line 64
        echo "

          ";
        // line 66
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "birthday", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Birthday", [], "Admin.Orderscustomers.Feature")]);
        // line 68
        echo "

          ";
        // line 70
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "is_enabled", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enabled", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable or disable customer login.", [], "Admin.Orderscustomers.Help")]);
        // line 73
        echo "

          ";
        // line 75
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "is_partner_offers_subscribed", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Partner offers", [], "Admin.Orderscustomers.Feature"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This customer will receive your ads via email.", [], "Admin.Orderscustomers.Help")]);
        // line 78
        echo "

          ";
        // line 80
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "group_ids", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Group access", [], "Admin.Orderscustomers.Feature"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select all the groups that you would like to apply to this customer.", [], "Admin.Orderscustomers.Help")]);
        // line 83
        echo "

          ";
        // line 85
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "default_group_id", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Default customer group", [], "Admin.Orderscustomers.Feature"), "help" => sprintf("%s %s", $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This group will be the user's default group.", [], "Admin.Orderscustomers.Help"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Only the discount for the selected group will be applied to this customer.", [], "Admin.Orderscustomers.Help"))]);
        // line 88
        echo "

          ";
        // line 90
        if (($context["isB2bFeatureActive"] ?? $this->getContext($context, "isB2bFeatureActive"))) {
            // line 91
            echo "            ";
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "company_name", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Company", [], "Admin.Global")]);
            // line 93
            echo "

            ";
            // line 95
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "siret_code", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("SIRET", [], "Admin.Orderscustomers.Feature")]);
            // line 97
            echo "

            ";
            // line 99
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "ape_code", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("APE", [], "Admin.Orderscustomers.Feature")]);
            // line 101
            echo "

            ";
            // line 103
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "website", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Website", [], "Admin.Orderscustomers.Feature")]);
            // line 105
            echo "

            ";
            // line 107
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "allowed_outstanding_amount", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Allowed outstanding amount", [], "Admin.Orderscustomers.Feature"), "help" => sprintf("%s 0-9", $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Valid characters:", [], "Admin.Orderscustomers.Help"))]);
            // line 110
            echo "

            ";
            // line 112
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "max_payment_days", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Maximum number of payment days", [], "Admin.Orderscustomers.Feature"), "help" => sprintf("%s 0-9", $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Valid characters:", [], "Admin.Orderscustomers.Help"))]);
            // line 115
            echo "

            ";
            // line 117
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? $this->getContext($context, "customerForm")), "risk_id", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Risk rating", [], "Admin.Orderscustomers.Feature")]);
            // line 119
            echo "
          ";
        }
        // line 121
        echo "
          ";
        // line 122
        $this->displayBlock('customer_form_rest', $context, $blocks);
        // line 125
        echo "        </div>
      </div>
      <div class=\"card-footer\">
        ";
        // line 128
        if (((isset($context["displayInIframe"]) || array_key_exists("displayInIframe", $context)) && (($context["displayInIframe"] ?? $this->getContext($context, "displayInIframe")) == true))) {
            // line 129
            echo "          <a href=\"javascript:window.history.back();\" class=\"btn btn-outline-secondary\">
        ";
        } else {
            // line 131
            echo "          <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\Extension\PathWithBackUrlExtension')->getPathWithBackUrl("admin_customers_index"), "html", null, true);
            echo "\" class=\"btn btn-outline-secondary\">
        ";
        }
        // line 133
        echo "          ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        echo "
        </a>
        <button class=\"btn btn-primary float-right\">
          ";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
        </button>
      </div>
    </div>
  ";
        // line 140
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["customerForm"] ?? $this->getContext($context, "customerForm")), 'form_end');
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 122
    public function block_customer_form_rest($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "customer_form_rest"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "customer_form_rest"));

        // line 123
        echo "            ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["customerForm"] ?? $this->getContext($context, "customerForm")), 'rest');
        echo "
          ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 123,  248 => 122,  236 => 140,  229 => 136,  222 => 133,  216 => 131,  212 => 129,  210 => 128,  205 => 125,  203 => 122,  200 => 121,  196 => 119,  194 => 117,  190 => 115,  188 => 112,  184 => 110,  182 => 107,  178 => 105,  176 => 103,  172 => 101,  170 => 99,  166 => 97,  164 => 95,  160 => 93,  157 => 91,  155 => 90,  151 => 88,  149 => 85,  145 => 83,  143 => 80,  139 => 78,  137 => 75,  133 => 73,  131 => 70,  127 => 68,  125 => 66,  121 => 64,  119 => 63,  118 => 62,  117 => 60,  113 => 58,  111 => 56,  107 => 54,  105 => 53,  104 => 51,  100 => 49,  98 => 48,  97 => 46,  93 => 44,  91 => 42,  86 => 40,  79 => 36,  71 => 32,  53 => 31,  50 => 30,  48 => 29,  46 => 28,  43 => 27,  41 => 26,  38 => 25,);
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

{% import '@PrestaShop/Admin/macros.html.twig' as ps %}

{% set allowedNameChars = '0-9!<>,;?=+()@#\"°{}_\$%:' %}
{% set isGuest = isGuest|default(false) %}

{% block customer_form %}
  {{ form_start(customerForm) }}
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">person</i>
        {{ 'Customer'|trans({}, 'Admin.Global') }}
      </h3>
      <div class=\"card-block row\">
        <div class=\"card-text\">
          {{ form_errors(customerForm) }}

          {{ ps.form_group_row(customerForm.gender_id, {}, {
            'label': 'Social title'|trans({}, 'Admin.Global')
          }) }}

          {{ ps.form_group_row(customerForm.first_name, {}, {
            'label': 'First name'|trans({}, 'Admin.Global'),
            'help': '%s %s'|format('Invalid characters:'|trans({}, 'Admin.Notifications.Info'), allowedNameChars)
          }) }}

          {{ ps.form_group_row(customerForm.last_name, {}, {
            'label': 'Last name'|trans({}, 'Admin.Global'),
            'help': '%s %s'|format('Invalid characters:'|trans({}, 'Admin.Notifications.Info'), allowedNameChars)
          }) }}

          {{ ps.form_group_row(customerForm.email, {}, {
            'label': 'Email'|trans({}, 'Admin.Global')
          }) }}

          {{ ps.form_group_row(customerForm.password, {}, {
            'label': 'Password'|trans({}, 'Admin.Global'),
            'help': 'Password should be at least %length% characters long.'|trans({'%length%': minPasswordLength}, 'Admin.Notifications.Info'),
            'class': isGuest ? 'd-none' : ''
          }) }}

          {{ ps.form_group_row(customerForm.birthday, {}, {
            'label': 'Birthday'|trans({}, 'Admin.Orderscustomers.Feature')
          }) }}

          {{ ps.form_group_row(customerForm.is_enabled, {}, {
            'label': 'Enabled'|trans({}, 'Admin.Global'),
            'help': 'Enable or disable customer login.'|trans({}, 'Admin.Orderscustomers.Help')
          }) }}

          {{ ps.form_group_row(customerForm.is_partner_offers_subscribed, {}, {
            'label': 'Partner offers'|trans({}, 'Admin.Orderscustomers.Feature'),
            'help': 'This customer will receive your ads via email.'|trans({}, 'Admin.Orderscustomers.Help')
          }) }}

          {{ ps.form_group_row(customerForm.group_ids, {}, {
            'label': 'Group access'|trans({}, 'Admin.Orderscustomers.Feature'),
            'help': 'Select all the groups that you would like to apply to this customer.'|trans({}, 'Admin.Orderscustomers.Help')
          }) }}

          {{ ps.form_group_row(customerForm.default_group_id, {}, {
            'label': 'Default customer group'|trans({}, 'Admin.Orderscustomers.Feature'),
            'help': '%s %s'|format('This group will be the user\\'s default group.'|trans({}, 'Admin.Orderscustomers.Help'), 'Only the discount for the selected group will be applied to this customer.'|trans({}, 'Admin.Orderscustomers.Help'))
          }) }}

          {% if isB2bFeatureActive %}
            {{ ps.form_group_row(customerForm.company_name, {}, {
              'label': 'Company'|trans({}, 'Admin.Global')
            }) }}

            {{ ps.form_group_row(customerForm.siret_code, {}, {
              'label': 'SIRET'|trans({}, 'Admin.Orderscustomers.Feature')
            }) }}

            {{ ps.form_group_row(customerForm.ape_code, {}, {
              'label': 'APE'|trans({}, 'Admin.Orderscustomers.Feature')
            }) }}

            {{ ps.form_group_row(customerForm.website, {}, {
              'label': 'Website'|trans({}, 'Admin.Orderscustomers.Feature')
            }) }}

            {{ ps.form_group_row(customerForm.allowed_outstanding_amount, {}, {
              'label': 'Allowed outstanding amount'|trans({}, 'Admin.Orderscustomers.Feature'),
              'help': '%s 0-9'|format('Valid characters:'|trans({}, 'Admin.Orderscustomers.Help'))
            }) }}

            {{ ps.form_group_row(customerForm.max_payment_days, {}, {
              'label': 'Maximum number of payment days'|trans({}, 'Admin.Orderscustomers.Feature'),
              'help': '%s 0-9'|format('Valid characters:'|trans({}, 'Admin.Orderscustomers.Help'))
            }) }}

            {{ ps.form_group_row(customerForm.risk_id, {}, {
              'label': 'Risk rating'|trans({}, 'Admin.Orderscustomers.Feature')
            }) }}
          {% endif %}

          {% block customer_form_rest %}
            {{ form_rest(customerForm) }}
          {% endblock %}
        </div>
      </div>
      <div class=\"card-footer\">
        {% if (displayInIframe is defined and displayInIframe == true) %}
          <a href=\"javascript:window.history.back();\" class=\"btn btn-outline-secondary\">
        {% else %}
          <a href=\"{{ pathWithBackUrl('admin_customers_index') }}\" class=\"btn btn-outline-secondary\">
        {% endif %}
          {{ 'Cancel'|trans({}, 'Admin.Actions') }}
        </a>
        <button class=\"btn btn-primary float-right\">
          {{ 'Save'|trans({}, 'Admin.Actions') }}
        </button>
      </div>
    </div>
  {{ form_end(customerForm) }}
{% endblock %}
", "@PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Sell/Customer/Blocks/form.html.twig");
    }
}
