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

/* @PrestaShop/Admin/Module/Includes/modal_confirm.html.twig */
class __TwigTemplate_6146f663c58992195f2a59fcebadb4cd89e0430628bbfcba174b22b385fe7090 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Module/Includes/modal_confirm.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Module/Includes/modal_confirm.html.twig"));

        // line 25
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "urls", [])) >= 1)) {
            // line 26
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "urls", []));
            foreach ($context['_seq'] as $context["module_action"] => $context["module_url"]) {
                // line 27
                echo "    ";
                if (twig_in_filter($context["module_action"], [0 => "disable", 1 => "uninstall", 2 => "reset"])) {
                    // line 28
                    echo "      <div id=\"module-modal-confirm-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "name", []), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                    echo "\" class=\"modal modal-vcenter fade\" role=\"dialog\">
        <div class=\"modal-dialog\">
          <!-- Modal content-->
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <h4 class=\"modal-title module-modal-title\">
                ";
                    // line 34
                    if (($context["module_action"] == "disable")) {
                        // line 35
                        echo "                  ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Disable module?", [], "Admin.Modules.Feature"), "html", null, true);
                        echo "
                ";
                    }
                    // line 37
                    echo "                ";
                    if (($context["module_action"] == "uninstall")) {
                        // line 38
                        echo "                  ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Uninstall module?", [], "Admin.Modules.Feature"), "html", null, true);
                        echo "
                ";
                    }
                    // line 40
                    echo "                ";
                    if (($context["module_action"] == "reset")) {
                        // line 41
                        echo "                  ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reset module?", [], "Admin.Modules.Feature"), "html", null, true);
                        echo "
                ";
                    }
                    // line 43
                    echo "              </h4>
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
              </button>
            </div>
            <div class=\"modal-body row\">
              <div class=\"col-md-12\">
                <p>
                  ";
                    // line 51
                    if (($context["module_action"] == "disable")) {
                        // line 52
                        echo "                    ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You are about to disable %moduleName% module.", ["%moduleName%" => $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "displayName", [])], "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    <br>
                    <br>
                    ";
                        // line 55
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Your current settings will be saved, but the module will no longer be active.", [], "Admin.Modules.Notification"), "html", null, true);
                        echo "
                  ";
                    }
                    // line 57
                    echo "                  ";
                    if (($context["module_action"] == "uninstall")) {
                        // line 58
                        echo "                    ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You are about to uninstall %moduleName% module.", ["%moduleName%" => $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "displayName", [])], "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    <br>
                    ";
                        // line 60
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "confirmUninstall", []), "html", null, true);
                        echo "
                    <br>
                    <br>
                    ";
                        // line 63
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This will disable the module and delete all its files. For good.", [], "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    <br>
                    <label>
                      <input type=\"checkbox\" id=\"force_deletion\" name=\"force_deletion\" data-tech-name=\"";
                        // line 66
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "name", []), "html", null, true);
                        echo "\"> ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Optional: delete module folder after uninstall.", [], "Admin.Modules.Feature"), "html", null, true);
                        echo "
                    </label>
                    <br>
                    <span class=\"italic red\">
                      ";
                        // line 70
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This action cannot be undone.", [], "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    </span>
                  ";
                    }
                    // line 73
                    echo "                  ";
                    if (($context["module_action"] == "reset")) {
                        // line 74
                        echo "                    ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You're about to reset %moduleName% module.", ["%moduleName%" => $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "displayName", [])], "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    <br>
                    <br>
                    ";
                        // line 77
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This will restore the defaults settings.", [], "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    <br>
                    <span class=\"italic red\">
                      ";
                        // line 80
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This action cannot be undone.", [], "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    </span>
                  ";
                    }
                    // line 83
                    echo "                </p>
              </div>
            </div>
            <div class=\"modal-footer\">
              <input type=\"button\" class=\"btn btn-outline-secondary\" data-dismiss=\"modal\" value=\"";
                    // line 87
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", [], "Admin.Actions"), "html", null, true);
                    echo "\" />
              ";
                    // line 88
                    if (($context["module_action"] == "disable")) {
                        // line 89
                        echo "                <a
                  class=\"btn btn-primary uppercase module_action_modal_";
                        // line 90
                        echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                        echo "\"
                  href=\"";
                        // line 91
                        echo twig_escape_filter($this->env, $context["module_url"], "html", null, true);
                        echo "\"
                  data-dismiss=\"modal\"
                  data-tech-name=\"";
                        // line 93
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "name", []), "html", null, true);
                        echo "\"
                >
                  ";
                        // line 95
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Yes, disable it", [], "Admin.Modules.Feature"), "html", null, true);
                        echo "
                </a>
              ";
                    }
                    // line 98
                    echo "              ";
                    if (($context["module_action"] == "uninstall")) {
                        // line 99
                        echo "                <a
                  class=\"btn btn-primary uppercase module_action_modal_";
                        // line 100
                        echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                        echo "\"
                  href=\"";
                        // line 101
                        echo twig_escape_filter($this->env, $context["module_url"], "html", null, true);
                        echo "\"
                  data-dismiss=\"modal\"
                  data-tech-name=\"";
                        // line 103
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "name", []), "html", null, true);
                        echo "\"
                >
                  ";
                        // line 105
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Yes, uninstall it", [], "Admin.Modules.Feature"), "html", null, true);
                        echo "
                </a>
              ";
                    }
                    // line 108
                    echo "              ";
                    if (($context["module_action"] == "reset")) {
                        // line 109
                        echo "                <a
                  class=\"btn btn-primary uppercase module_action_modal_";
                        // line 110
                        echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                        echo "\"
                  href=\"";
                        // line 111
                        echo twig_escape_filter($this->env, $context["module_url"], "html", null, true);
                        echo "\"
                  data-dismiss=\"modal\"
                  data-tech-name=\"";
                        // line 113
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", []), "name", []), "html", null, true);
                        echo "\"
                >
                  ";
                        // line 115
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Yes, reset it", [], "Admin.Modules.Feature"), "html", null, true);
                        echo "
                </a>
              ";
                    }
                    // line 118
                    echo "            </div>
          </div>
        </div>
      </div>
    ";
                }
                // line 123
                echo "  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['module_action'], $context['module_url'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Module/Includes/modal_confirm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  260 => 123,  253 => 118,  247 => 115,  242 => 113,  237 => 111,  233 => 110,  230 => 109,  227 => 108,  221 => 105,  216 => 103,  211 => 101,  207 => 100,  204 => 99,  201 => 98,  195 => 95,  190 => 93,  185 => 91,  181 => 90,  178 => 89,  176 => 88,  172 => 87,  166 => 83,  160 => 80,  154 => 77,  147 => 74,  144 => 73,  138 => 70,  129 => 66,  123 => 63,  117 => 60,  111 => 58,  108 => 57,  103 => 55,  96 => 52,  94 => 51,  84 => 43,  78 => 41,  75 => 40,  69 => 38,  66 => 37,  60 => 35,  58 => 34,  46 => 28,  43 => 27,  38 => 26,  36 => 25,);
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
{% if module.attributes.urls|length >= 1 %}
  {% for module_action, module_url in module.attributes.urls %}
    {% if module_action in ['disable', 'uninstall', 'reset'] %}
      <div id=\"module-modal-confirm-{{module.attributes.name}}-{{ module_action }}\" class=\"modal modal-vcenter fade\" role=\"dialog\">
        <div class=\"modal-dialog\">
          <!-- Modal content-->
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <h4 class=\"modal-title module-modal-title\">
                {% if module_action == 'disable' %}
                  {{ \"Disable module?\"|trans({}, 'Admin.Modules.Feature') }}
                {% endif %}
                {% if module_action == 'uninstall' %}
                  {{ \"Uninstall module?\"|trans({}, 'Admin.Modules.Feature') }}
                {% endif %}
                {% if module_action == 'reset' %}
                  {{ \"Reset module?\"|trans({}, 'Admin.Modules.Feature') }}
                {% endif %}
              </h4>
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
              </button>
            </div>
            <div class=\"modal-body row\">
              <div class=\"col-md-12\">
                <p>
                  {% if module_action == 'disable' %}
                    {{ \"You are about to disable %moduleName% module.\"|trans({'%moduleName%': module.attributes.displayName}, 'Admin.Modules.Notification') }}
                    <br>
                    <br>
                    {{ \"Your current settings will be saved, but the module will no longer be active.\"|trans({}, 'Admin.Modules.Notification') }}
                  {% endif %}
                  {% if module_action == 'uninstall' %}
                    {{ \"You are about to uninstall %moduleName% module.\"|trans({'%moduleName%': module.attributes.displayName}, 'Admin.Modules.Notification') }}
                    <br>
                    {{ module.attributes.confirmUninstall }}
                    <br>
                    <br>
                    {{ \"This will disable the module and delete all its files. For good.\"|trans({}, 'Admin.Modules.Notification') }}
                    <br>
                    <label>
                      <input type=\"checkbox\" id=\"force_deletion\" name=\"force_deletion\" data-tech-name=\"{{module.attributes.name}}\"> {{ \"Optional: delete module folder after uninstall.\"|trans({}, 'Admin.Modules.Feature') }}
                    </label>
                    <br>
                    <span class=\"italic red\">
                      {{ \"This action cannot be undone.\"|trans({}, 'Admin.Modules.Notification') }}
                    </span>
                  {% endif %}
                  {% if module_action == 'reset' %}
                    {{ \"You're about to reset %moduleName% module.\"|trans({'%moduleName%': module.attributes.displayName}, 'Admin.Modules.Notification') }}
                    <br>
                    <br>
                    {{ \"This will restore the defaults settings.\"|trans({}, 'Admin.Modules.Notification') }}
                    <br>
                    <span class=\"italic red\">
                      {{ \"This action cannot be undone.\"|trans({}, 'Admin.Modules.Notification') }}
                    </span>
                  {% endif %}
                </p>
              </div>
            </div>
            <div class=\"modal-footer\">
              <input type=\"button\" class=\"btn btn-outline-secondary\" data-dismiss=\"modal\" value=\"{{ \"Cancel\"|trans({}, 'Admin.Actions') }}\" />
              {% if module_action == 'disable' %}
                <a
                  class=\"btn btn-primary uppercase module_action_modal_{{ module_action }}\"
                  href=\"{{ module_url }}\"
                  data-dismiss=\"modal\"
                  data-tech-name=\"{{module.attributes.name}}\"
                >
                  {{ \"Yes, disable it\"|trans({}, 'Admin.Modules.Feature') }}
                </a>
              {% endif %}
              {% if module_action == 'uninstall' %}
                <a
                  class=\"btn btn-primary uppercase module_action_modal_{{ module_action }}\"
                  href=\"{{ module_url }}\"
                  data-dismiss=\"modal\"
                  data-tech-name=\"{{module.attributes.name}}\"
                >
                  {{ \"Yes, uninstall it\"|trans({}, 'Admin.Modules.Feature') }}
                </a>
              {% endif %}
              {% if module_action == 'reset' %}
                <a
                  class=\"btn btn-primary uppercase module_action_modal_{{ module_action }}\"
                  href=\"{{ module_url }}\"
                  data-dismiss=\"modal\"
                  data-tech-name=\"{{module.attributes.name}}\"
                >
                  {{ \"Yes, reset it\"|trans({}, 'Admin.Modules.Feature') }}
                </a>
              {% endif %}
            </div>
          </div>
        </div>
      </div>
    {% endif %}
  {% endfor %}
{% endif %}
", "@PrestaShop/Admin/Module/Includes/modal_confirm.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/modal_confirm.html.twig");
    }
}
