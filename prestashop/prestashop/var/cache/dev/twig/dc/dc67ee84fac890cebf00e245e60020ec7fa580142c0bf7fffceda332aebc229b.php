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

/* @PrestaShop/Admin/Module/Includes/modal_confirm_prestatrust.html.twig */
class __TwigTemplate_b19e054f2d70fdff53a7bd8bb26d64ab0b11c9612c70f2175c80b7905e0cff15 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Module/Includes/modal_confirm_prestatrust.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Module/Includes/modal_confirm_prestatrust.html.twig"));

        // line 25
        echo "
<div id=\"modal-prestatrust\" class=\"modal\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Module verification", [], "Admin.Modules.Feature"), "html", null, true);
        echo "</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\">
        <div class=\"row\">
            <div class=\"col-md-2 text-sm-center\">
              <img id=\"pstrust-img\" src=\"\" alt=\"\"/>
            </div>
            <div class=\"col-md-10\">
              <dl class=\"row\">
                <dt class=\"col-sm-3\">";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Module", [], "Admin.Global"), "html", null, true);
        echo "</dt>
                <dd class=\"col-sm-9\">
                    <strong id=\"pstrust-name\"></strong>
                </dd>
                <dt class=\"col-sm-3\">";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Author", [], "Admin.Modules.Feature"), "html", null, true);
        echo "</dt>
                <dd class=\"col-sm-9\" id=\"pstrust-author\"></dd>
                <dt class=\"col-sm-3\">";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Status", [], "Admin.Global"), "html", null, true);
        echo "</dt>
                <dd class=\"col-sm-9\"><strong><span class=\"text-info\" id=\"pstrust-label\"></span></strong></dd>
              </dl>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"alert alert-info\" id=\"pstrust-message\" role=\"alert\">
                    <p class=\"alert-text\"></p>
                </div>
            </div>
        </div>
      </div>
      <div class=\"modal-footer\">
        <div id=\"pstrust-btn-property-ok\">
            <button type=\"button\" class=\"btn btn-outline-secondary\" data-dismiss=\"modal\">";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Back to modules list", [], "Admin.Modules.Feature"), "html", null, true);
        echo "</button>
            <button type=\"submit\" class=\"btn btn-primary pstrust-install\">";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Proceed with the installation", [], "Admin.Modules.Feature"), "html", null, true);
        echo "</button>
        </div>
        <div id=\"pstrust-btn-property-nok\">
            <button type=\"submit\" class=\"btn btn-outline-secondary pstrust-install\">";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Proceed with the installation", [], "Admin.Modules.Feature"), "html", null, true);
        echo "</button>
            <a href=\"\" class=\"btn btn-primary\" id=\"pstrust-buy\" target=\"_blank\">";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Buy module", [], "Admin.Modules.Feature"), "html", null, true);
        echo "</a>
        </div>
      </div>
    </div>
  </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Module/Includes/modal_confirm_prestatrust.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 68,  98 => 67,  92 => 64,  88 => 63,  70 => 48,  65 => 46,  58 => 42,  43 => 30,  36 => 25,);
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

<div id=\"modal-prestatrust\" class=\"modal\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">{{ \"Module verification\"|trans({}, 'Admin.Modules.Feature') }}</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\">
        <div class=\"row\">
            <div class=\"col-md-2 text-sm-center\">
              <img id=\"pstrust-img\" src=\"\" alt=\"\"/>
            </div>
            <div class=\"col-md-10\">
              <dl class=\"row\">
                <dt class=\"col-sm-3\">{{ \"Module\"|trans({}, 'Admin.Global') }}</dt>
                <dd class=\"col-sm-9\">
                    <strong id=\"pstrust-name\"></strong>
                </dd>
                <dt class=\"col-sm-3\">{{ \"Author\"|trans({}, 'Admin.Modules.Feature') }}</dt>
                <dd class=\"col-sm-9\" id=\"pstrust-author\"></dd>
                <dt class=\"col-sm-3\">{{ \"Status\"|trans({}, 'Admin.Global') }}</dt>
                <dd class=\"col-sm-9\"><strong><span class=\"text-info\" id=\"pstrust-label\"></span></strong></dd>
              </dl>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"alert alert-info\" id=\"pstrust-message\" role=\"alert\">
                    <p class=\"alert-text\"></p>
                </div>
            </div>
        </div>
      </div>
      <div class=\"modal-footer\">
        <div id=\"pstrust-btn-property-ok\">
            <button type=\"button\" class=\"btn btn-outline-secondary\" data-dismiss=\"modal\">{{\"Back to modules list\"|trans({}, 'Admin.Modules.Feature')}}</button>
            <button type=\"submit\" class=\"btn btn-primary pstrust-install\">{{\"Proceed with the installation\"|trans({}, 'Admin.Modules.Feature')}}</button>
        </div>
        <div id=\"pstrust-btn-property-nok\">
            <button type=\"submit\" class=\"btn btn-outline-secondary pstrust-install\">{{\"Proceed with the installation\"|trans({}, 'Admin.Modules.Feature')}}</button>
            <a href=\"\" class=\"btn btn-primary\" id=\"pstrust-buy\" target=\"_blank\">{{\"Buy module\"|trans({}, 'Admin.Modules.Feature')}}</a>
        </div>
      </div>
    </div>
  </div>
</div>
", "@PrestaShop/Admin/Module/Includes/modal_confirm_prestatrust.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/modal_confirm_prestatrust.html.twig");
    }
}
