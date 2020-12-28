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

/* @PrestaShop/Admin/macros.html.twig */
class __TwigTemplate_f01d8b002c045d66897422483f65176671d2554b3801b0f9c93b3c09c38236e6 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/macros.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/macros.html.twig"));

        // line 28
        echo "
";
        // line 32
        echo "
";
        // line 38
        echo "
";
        // line 46
        echo "
";
        // line 54
        echo "
";
        // line 70
        echo "
";
        // line 88
        echo "
";
        // line 95
        echo "
";
        // line 125
        echo "
";
        // line 245
        echo "
 ";
        // line 280
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 25
    public function getform_label_tooltip($__name__ = null, $__tooltip__ = null, $__placement__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "tooltip" => $__tooltip__,
            "placement" => $__placement__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "form_label_tooltip"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "form_label_tooltip"));

            // line 26
            echo "    ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["name"] ?? $this->getContext($context, "name")), 'label', ["label_attr" => ["tooltip" => ($context["tooltip"] ?? $this->getContext($context, "tooltip")), "tooltip_placement" => (((isset($context["placement"]) || array_key_exists("placement", $context))) ? (_twig_default_filter(($context["placement"] ?? $this->getContext($context, "placement")), "top")) : ("top"))]]);
            echo "
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 29
    public function getcheck($__variable__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "variable" => $__variable__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "check"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "check"));

            // line 30
            echo "  ";
            echo twig_escape_filter($this->env, ((((isset($context["variable"]) || array_key_exists("variable", $context)) && (twig_length_filter($this->env, ($context["variable"] ?? $this->getContext($context, "variable"))) > 0))) ? (($context["variable"] ?? $this->getContext($context, "variable"))) : (false)), "html", null, true);
            echo "
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 33
    public function gettooltip($__text__ = null, $__icon__ = null, $__position__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "text" => $__text__,
            "icon" => $__icon__,
            "position" => $__position__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "tooltip"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "tooltip"));

            // line 34
            echo "  <span data-toggle=\"pstooltip\" class=\"label-tooltip\" data-original-title=\"";
            echo twig_escape_filter($this->env, ($context["text"] ?? $this->getContext($context, "text")), "html", null, true);
            echo "\" data-html=\"true\" data-placement=\"";
            echo twig_escape_filter($this->env, (((isset($context["position"]) || array_key_exists("position", $context))) ? (_twig_default_filter(($context["position"] ?? $this->getContext($context, "position")), "top")) : ("top")), "html", null, true);
            echo "\">
    <i class=\"material-icons\">";
            // line 35
            echo twig_escape_filter($this->env, ($context["icon"] ?? $this->getContext($context, "icon")), "html", null, true);
            echo "</i>
  </span>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 39
    public function getinfotip($__text__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "text" => $__text__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "infotip"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "infotip"));

            // line 40
            echo "<div class=\"alert alert-info\" role=\"alert\">
  <p class=\"alert-text\">
    ";
            // line 42
            echo twig_escape_filter($this->env, ($context["text"] ?? $this->getContext($context, "text")), "html", null, true);
            echo "
  </p>
</div>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 47
    public function getwarningtip($__text__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "text" => $__text__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "warningtip"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "warningtip"));

            // line 48
            echo "<div class=\"alert alert-warning\" role=\"alert\">
  <p class=\"alert-text\">
    ";
            // line 50
            echo twig_escape_filter($this->env, ($context["text"] ?? $this->getContext($context, "text")), "html", null, true);
            echo "
  </p>
</div>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 55
    public function getlabel_with_help($__label__ = null, $__help__ = null, $__class__ = "", $__for__ = "", $__isRequired__ = false, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "label" => $__label__,
            "help" => $__help__,
            "class" => $__class__,
            "for" => $__for__,
            "isRequired" => $__isRequired__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "label_with_help"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "label_with_help"));

            // line 56
            echo "<label";
            if ( !twig_test_empty(($context["for"] ?? $this->getContext($context, "for")))) {
                echo " for=\"";
                echo twig_escape_filter($this->env, ($context["for"] ?? $this->getContext($context, "for")), "html", null, true);
                echo "\"";
            }
            echo " class=\"form-control-label ";
            echo twig_escape_filter($this->env, ($context["class"] ?? $this->getContext($context, "class")), "html", null, true);
            echo "\">
  ";
            // line 57
            if (($context["isRequired"] ?? $this->getContext($context, "isRequired"))) {
                // line 58
                echo "    <span class=\"text-danger\">*</span>
  ";
            }
            // line 60
            echo "
  ";
            // line 61
            echo twig_escape_filter($this->env, ($context["label"] ?? $this->getContext($context, "label")), "html", null, true);
            echo "
  <span
    class=\"help-box\"
    data-toggle=\"popover\"
    data-content=\"";
            // line 65
            echo twig_escape_filter($this->env, ($context["help"] ?? $this->getContext($context, "help")), "html", null, true);
            echo "\">
  </span>
</label>
<p class=\"sr-only\">";
            // line 68
            echo twig_escape_filter($this->env, ($context["help"] ?? $this->getContext($context, "help")), "html", null, true);
            echo "</p>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 72
    public function getsortable_column_header($__title__ = null, $__sortColumnName__ = null, $__orderBy__ = null, $__sortOrder__ = null, $__prefix__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "title" => $__title__,
            "sortColumnName" => $__sortColumnName__,
            "orderBy" => $__orderBy__,
            "sortOrder" => $__sortOrder__,
            "prefix" => $__prefix__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "sortable_column_header"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "sortable_column_header"));

            // line 73
            echo "  ";
            list($context["sortOrder"], $context["orderBy"], $context["prefix"]) =             [(((isset($context["sortOrder"]) || array_key_exists("sortOrder", $context))) ? (_twig_default_filter(($context["sortOrder"] ?? $this->getContext($context, "sortOrder")), "")) : ("")), (((isset($context["orderBy"]) || array_key_exists("orderBy", $context))) ? (_twig_default_filter(($context["orderBy"] ?? $this->getContext($context, "orderBy")))) : ("")), (((isset($context["prefix"]) || array_key_exists("prefix", $context))) ? (_twig_default_filter(($context["prefix"] ?? $this->getContext($context, "prefix")), "")) : (""))];
            // line 74
            echo "  <div
      class=\"ps-sortable-column\"
      data-sort-col-name=\"";
            // line 76
            echo twig_escape_filter($this->env, ($context["sortColumnName"] ?? $this->getContext($context, "sortColumnName")), "html", null, true);
            echo "\"
      data-sort-prefix=\"";
            // line 77
            echo twig_escape_filter($this->env, ($context["prefix"] ?? $this->getContext($context, "prefix")), "html", null, true);
            echo "\"
      ";
            // line 78
            if ((($context["orderBy"] ?? $this->getContext($context, "orderBy")) == ($context["sortColumnName"] ?? $this->getContext($context, "sortColumnName")))) {
                // line 79
                echo "        data-sort-is-current=\"true\"
        data-sort-direction=\"";
                // line 80
                echo (((($context["sortOrder"] ?? $this->getContext($context, "sortOrder")) == "desc")) ? ("desc") : ("asc"));
                echo "\"
      ";
            }
            // line 82
            echo "    >
      <span role=\"columnheader\">";
            // line 83
            echo twig_escape_filter($this->env, ($context["title"] ?? $this->getContext($context, "title")), "html", null, true);
            echo "</span>
      <span role=\"button\" class=\"ps-sort\" aria-label=\"";
            // line 84
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Sort by", [], "Admin.Actions"), "html", null, true);
            echo "\"></span>
    </div>
  </th>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 90
    public function getimport_file_sample($__label__ = null, $__filename__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "label" => $__label__,
            "filename" => $__filename__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "import_file_sample"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "import_file_sample"));

            // line 91
            echo "    <a class=\"list-group-item list-group-item-action\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_import_sample_download", ["sampleName" => ($context["filename"] ?? $this->getContext($context, "filename"))]), "html", null, true);
            echo "\">
        ";
            // line 92
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(($context["label"] ?? $this->getContext($context, "label")), [], "Admin.Advparameters.Feature"), "html", null, true);
            echo "
    </a>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 105
    public function getform_widget_with_error($__form__ = null, $__vars__ = null, $__extraVars__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "vars" => $__vars__,
            "extraVars" => $__extraVars__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "form_widget_with_error"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "form_widget_with_error"));

            // line 106
            echo "  ";
            $context["self"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/macros.html.twig", 106);
            // line 107
            echo "
  ";
            // line 108
            $context["vars"] = (((isset($context["vars"]) || array_key_exists("vars", $context))) ? (_twig_default_filter(($context["vars"] ?? $this->getContext($context, "vars")), [])) : ([]));
            // line 109
            echo "  ";
            $context["extraVars"] = (((isset($context["extraVars"]) || array_key_exists("extraVars", $context))) ? (_twig_default_filter(($context["extraVars"] ?? $this->getContext($context, "extraVars")), [])) : ([]));
            // line 110
            echo "  ";
            $context["attr"] = (($this->getAttribute(($context["vars"] ?? null), "attr", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["vars"] ?? null), "attr", []), [])) : ([]));
            // line 111
            echo "  ";
            $context["attr"] = twig_array_merge(($context["attr"] ?? $this->getContext($context, "attr")), ["class" => (($this->getAttribute(($context["attr"] ?? null), "class", [], "any", true, true)) ? ($this->getAttribute(($context["attr"] ?? $this->getContext($context, "attr")), "class", [])) : (""))]);
            // line 112
            echo "  ";
            $context["vars"] = twig_array_merge(($context["vars"] ?? $this->getContext($context, "vars")), ["attr" => ($context["attr"] ?? $this->getContext($context, "attr"))]);
            // line 113
            echo "
  ";
            // line 114
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? $this->getContext($context, "form")), 'widget', ($context["vars"] ?? $this->getContext($context, "vars")));
            echo "

  ";
            // line 116
            if (($this->getAttribute(($context["extraVars"] ?? null), "help", [], "any", true, true) && $this->getAttribute(($context["extraVars"] ?? $this->getContext($context, "extraVars")), "help", []))) {
                // line 117
                echo "      <small class=\"form-text\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["extraVars"] ?? $this->getContext($context, "extraVars")), "help", []), "html", null, true);
                echo "</small>
    ";
            } elseif (($this->getAttribute($this->getAttribute(            // line 118
($context["form"] ?? null), "vars", [], "any", false, true), "help", [], "any", true, true) && $this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "help", []))) {
                // line 119
                echo "      <small class=\"form-text\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "help", []), "html", null, true);
                echo "</small>
  ";
            }
            // line 121
            echo "
  ";
            // line 122
            echo $context["self"]->getform_error_with_popover(($context["form"] ?? $this->getContext($context, "form")));
            echo "

";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 135
    public function getform_error_with_popover($__form__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "form_error_with_popover"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "form_error_with_popover"));

            // line 136
            echo "  ";
            $context["errors"] = [];
            // line 137
            echo "
  ";
            // line 138
            if (($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", [], "any", false, true), "valid", [], "any", true, true) &&  !$this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "valid", []))) {
                // line 139
                echo "    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "errors", []));
                foreach ($context['_seq'] as $context["_key"] => $context["parentError"]) {
                    // line 140
                    echo "      ";
                    $context["errors"] = twig_array_merge(($context["errors"] ?? $this->getContext($context, "errors")), [0 => $this->getAttribute($context["parentError"], "message", [])]);
                    // line 141
                    echo "    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parentError'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 142
                echo "
    ";
                // line 144
                echo "    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "children", []));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 145
                    echo "      ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["child"], "vars", []), "errors", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 146
                        echo "        ";
                        $context["errors"] = twig_array_merge(($context["errors"] ?? $this->getContext($context, "errors")), [0 => $this->getAttribute($context["error"], "message", [])]);
                        // line 147
                        echo "      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 148
                    echo "    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 149
                echo "  ";
            }
            // line 150
            echo "
  ";
            // line 151
            if ((twig_length_filter($this->env, ($context["errors"] ?? $this->getContext($context, "errors"))) > 0)) {
                // line 152
                echo "    ";
                // line 153
                echo "    ";
                $context["errorPopover"] = null;
                // line 154
                echo "
    ";
                // line 155
                if ((twig_length_filter($this->env, ($context["errors"] ?? $this->getContext($context, "errors"))) > 1)) {
                    // line 156
                    echo "      ";
                    $context["popoverContainer"] = ("popover-error-container-" . $this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "id", []));
                    // line 157
                    echo "      <div class=\"";
                    echo twig_escape_filter($this->env, ($context["popoverContainer"] ?? $this->getContext($context, "popoverContainer")), "html", null, true);
                    echo "\"></div>


      ";
                    // line 160
                    if ($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", [], "any", false, true), "errors_by_locale", [], "any", true, true)) {
                        // line 161
                        echo "          ";
                        $context["popoverErrors"] = $this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "errors_by_locale", []);
                        // line 162
                        echo "
          ";
                        // line 164
                        echo "          ";
                        $context["translatableErrors"] = [];
                        // line 165
                        echo "          ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["popoverErrors"] ?? $this->getContext($context, "popoverErrors")));
                        foreach ($context['_seq'] as $context["_key"] => $context["translatableError"]) {
                            // line 166
                            echo "            ";
                            $context["translatableErrors"] = twig_array_merge(($context["translatableErrors"] ?? $this->getContext($context, "translatableErrors")), [0 => $this->getAttribute($context["translatableError"], "error_message", [])]);
                            // line 167
                            echo "          ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translatableError'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 168
                        echo "
          ";
                        // line 170
                        echo "          ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? $this->getContext($context, "errors")));
                        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                            // line 171
                            echo "            ";
                            if (!twig_in_filter($context["error"], ($context["translatableErrors"] ?? $this->getContext($context, "translatableErrors")))) {
                                // line 172
                                echo "              ";
                                $context["popoverErrors"] = twig_array_merge(($context["popoverErrors"] ?? $this->getContext($context, "popoverErrors")), [0 => $context["error"]]);
                                // line 173
                                echo "            ";
                            }
                            // line 174
                            echo "          ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 175
                        echo "
        ";
                    } else {
                        // line 177
                        echo "          ";
                        $context["popoverErrors"] = ($context["errors"] ?? $this->getContext($context, "errors"));
                        // line 178
                        echo "      ";
                    }
                    // line 179
                    echo "
      ";
                    // line 180
                    $context["errorMessages"] = [];
                    // line 181
                    echo "      ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["popoverErrors"] ?? $this->getContext($context, "popoverErrors")));
                    foreach ($context['_seq'] as $context["_key"] => $context["popoverError"]) {
                        // line 182
                        echo "        ";
                        $context["errorMessage"] = $context["popoverError"];
                        // line 183
                        echo "
        ";
                        // line 184
                        if (($this->getAttribute($context["popoverError"], "error_message", [], "any", true, true) && $this->getAttribute($context["popoverError"], "locale_name", [], "any", true, true))) {
                            // line 185
                            echo "          ";
                            $context["errorMessage"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%error_message% - Language: %language_name%", ["%error_message%" => $this->getAttribute($context["popoverError"], "error_message", []), "%language_name%" => $this->getAttribute($context["popoverError"], "locale_name", [])], "Admin.Notifications.Error");
                            // line 186
                            echo "        ";
                        }
                        // line 187
                        echo "
        ";
                        // line 188
                        $context["errorMessages"] = twig_array_merge(($context["errorMessages"] ?? $this->getContext($context, "errorMessages")), [0 => ($context["errorMessage"] ?? $this->getContext($context, "errorMessage"))]);
                        // line 189
                        echo "      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['popoverError'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 190
                    echo "
      ";
                    // line 191
                    ob_start();
                    // line 192
                    echo "        <div class=\"popover-error-list\">
          <ul>
            ";
                    // line 194
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["errorMessages"] ?? $this->getContext($context, "errorMessages")));
                    foreach ($context['_seq'] as $context["_key"] => $context["popoverError"]) {
                        // line 195
                        echo "              <li class=\"text-danger\">
                ";
                        // line 196
                        echo twig_escape_filter($this->env, $context["popoverError"], "html", null, true);
                        echo "
              </li>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['popoverError'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 199
                    echo "          </ul>
        </div>
      ";
                    $context["popoverErrorContent"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                    // line 202
                    echo "
      <template class=\"js-popover-error-content\" data-id=\"";
                    // line 203
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "id", []), "html", null, true);
                    echo "\">
        ";
                    // line 204
                    echo twig_escape_filter($this->env, ($context["popoverErrorContent"] ?? $this->getContext($context, "popoverErrorContent")), "html", null, true);
                    echo "
      </template>

      ";
                    // line 207
                    ob_start();
                    // line 208
                    echo "        <span
          data-toggle=\"form-popover-error\"
          data-id=\"";
                    // line 210
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "id", []), "html", null, true);
                    echo "\"
          data-placement=\"bottom\"
          data-template='<div class=\"popover form-popover-error\" role=\"tooltip\"><h3 class=\"popover-header\"></h3><div class=\"popover-body\"></div></div>'
          data-trigger=\"hover\"
          data-container=\".";
                    // line 214
                    echo twig_escape_filter($this->env, ($context["popoverContainer"] ?? $this->getContext($context, "popoverContainer")), "html", null, true);
                    echo "\"
        >
          <i class=\"material-icons form-error-icon\">error_outline</i> <u>";
                    // line 216
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->transchoice("%count% errors", twig_length_filter($this->env, ($context["popoverErrors"] ?? $this->getContext($context, "popoverErrors"))), [], "Admin.Global"), "html", null, true);
                    echo "</u>
        </span>
      ";
                    $context["errorPopover"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                    // line 219
                    echo "
    ";
                } elseif ($this->getAttribute($this->getAttribute(                // line 220
($context["form"] ?? null), "vars", [], "any", false, true), "error_by_locale", [], "any", true, true)) {
                    // line 221
                    echo "      ";
                    $context["errorByLocale"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%error_message% - Language: %language_name%", ["%error_message%" => $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "error_by_locale", []), "error_message", []), "%language_name%" => $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "error_by_locale", []), "locale_name", [])], "Admin.Notifications.Error");
                    // line 222
                    echo "      ";
                    $context["errors"] = [0 => ($context["errorByLocale"] ?? $this->getContext($context, "errorByLocale"))];
                    // line 223
                    echo "    ";
                }
                // line 224
                echo "
    <div class=\"invalid-feedback-container\">
      ";
                // line 226
                if ( !(null === ($context["errorPopover"] ?? $this->getContext($context, "errorPopover")))) {
                    // line 227
                    echo "        <div class=\"text-danger\">
          ";
                    // line 228
                    echo twig_escape_filter($this->env, ($context["errorPopover"] ?? $this->getContext($context, "errorPopover")), "html", null, true);
                    echo "
        </div>
      ";
                } else {
                    // line 231
                    echo "        <div class=\"d-inline-block text-danger align-top\">
          <i class=\"material-icons form-error-icon\">error_outline</i>
        </div>
        <div class=\"d-inline-block\">
          ";
                    // line 235
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? $this->getContext($context, "errors")));
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 236
                        echo "            <div class=\"text-danger\">
              ";
                        // line 237
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "
            </div>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 240
                    echo "        </div>
      ";
                }
                // line 242
                echo "    </div>
  ";
            }
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 252
    public function getform_group_row($__form__ = null, $__vars__ = null, $__extraVars__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "vars" => $__vars__,
            "extraVars" => $__extraVars__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "form_group_row"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "form_group_row"));

            // line 253
            echo "  ";
            $context["self"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/macros.html.twig", 253);
            // line 254
            echo "
  ";
            // line 255
            $context["class"] = (($this->getAttribute(($context["extraVars"] ?? null), "class", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["extraVars"] ?? null), "class", []), "")) : (""));
            // line 256
            echo "
  <div class=\"form-group row ";
            // line 257
            echo twig_escape_filter($this->env, ($context["class"] ?? $this->getContext($context, "class")), "html", null, true);
            echo "\">
    ";
            // line 258
            $context["extraVars"] = (((isset($context["extraVars"]) || array_key_exists("extraVars", $context))) ? (_twig_default_filter(($context["extraVars"] ?? $this->getContext($context, "extraVars")), [])) : ([]));
            // line 259
            echo "
    ";
            // line 260
            if ($this->getAttribute(($context["extraVars"] ?? null), "label", [], "any", true, true)) {
                // line 261
                echo "      ";
                $context["isRequired"] = (($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", [], "any", false, true), "required", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", [], "any", false, true), "required", []), false)) : (false));
                // line 262
                echo "
      ";
                // line 263
                if ($this->getAttribute(($context["extraVars"] ?? null), "required", [], "any", true, true)) {
                    // line 264
                    echo "        ";
                    $context["isRequired"] = $this->getAttribute(($context["extraVars"] ?? $this->getContext($context, "extraVars")), "required", []);
                    // line 265
                    echo "      ";
                }
                // line 266
                echo "
      <label for=\"";
                // line 267
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "vars", []), "id", []), "html", null, true);
                echo "\" class=\"form-control-label\">
        ";
                // line 268
                if (($context["isRequired"] ?? $this->getContext($context, "isRequired"))) {
                    // line 269
                    echo "          <span class=\"text-danger\">*</span>
        ";
                }
                // line 271
                echo "        ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["extraVars"] ?? $this->getContext($context, "extraVars")), "label", []), "html", null, true);
                echo "
      </label>
    ";
            }
            // line 274
            echo "
    <div class=\"col-sm\">
      ";
            // line 276
            echo $context["self"]->getform_widget_with_error(($context["form"] ?? $this->getContext($context, "form")), ($context["vars"] ?? $this->getContext($context, "vars")), ($context["extraVars"] ?? $this->getContext($context, "extraVars")));
            echo "
    </div>
  </div>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 281
    public function getmultistore_switch($__form__ = null, $__extraVars__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "extraVars" => $__extraVars__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "multistore_switch"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "multistore_switch"));

            // line 282
            echo "  ";
            $context["self"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/macros.html.twig", 282);
            // line 283
            echo "  ";
            if ($this->getAttribute(($context["form"] ?? null), "shop_restriction_switch", [], "any", true, true)) {
                // line 284
                echo "    ";
                ob_start();
                // line 285
                echo "      <strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Check / Uncheck all", [], "Admin.Actions"), "html", null, true);
                echo "</strong> <br>
      ";
                // line 286
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You are editing this page for a specific shop or group. Click \"Yes\" to check all fields, \"No\" to uncheck all.", [], "Admin.Design.Help"), "html", null, true);
                echo " <br>
      ";
                // line 287
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If you check a field, change its value, and save, the multistore behavior will not apply to this shop (or group), for this particular parameter.", [], "Admin.Design.Help"), "html", null, true);
                echo "
    ";
                $context["defaultLabel"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 289
                echo "
    ";
                // line 290
                if ( !$this->getAttribute(($context["extraVars"] ?? null), "help", [], "any", true, true)) {
                    // line 291
                    echo "      ";
                    $context["extraVars"] = twig_array_merge(($context["extraVars"] ?? $this->getContext($context, "extraVars")), ["help" => ($context["defaultLabel"] ?? $this->getContext($context, "defaultLabel"))]);
                    // line 292
                    echo "    ";
                }
                // line 293
                echo "
    ";
                // line 294
                $context["vars"] = ["attr" => ["class" => "js-multi-store-restriction-switch"]];
                // line 295
                echo "
    ";
                // line 296
                echo $context["self"]->getform_group_row($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "shop_restriction_switch", []), ($context["vars"] ?? $this->getContext($context, "vars")), ($context["extraVars"] ?? $this->getContext($context, "extraVars")));
                echo "
  ";
            }
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/macros.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1103 => 296,  1100 => 295,  1098 => 294,  1095 => 293,  1092 => 292,  1089 => 291,  1087 => 290,  1084 => 289,  1079 => 287,  1075 => 286,  1070 => 285,  1067 => 284,  1064 => 283,  1061 => 282,  1042 => 281,  1017 => 276,  1013 => 274,  1006 => 271,  1002 => 269,  1000 => 268,  996 => 267,  993 => 266,  990 => 265,  987 => 264,  985 => 263,  982 => 262,  979 => 261,  977 => 260,  974 => 259,  972 => 258,  968 => 257,  965 => 256,  963 => 255,  960 => 254,  957 => 253,  937 => 252,  914 => 242,  910 => 240,  901 => 237,  898 => 236,  894 => 235,  888 => 231,  882 => 228,  879 => 227,  877 => 226,  873 => 224,  870 => 223,  867 => 222,  864 => 221,  862 => 220,  859 => 219,  853 => 216,  848 => 214,  841 => 210,  837 => 208,  835 => 207,  829 => 204,  825 => 203,  822 => 202,  817 => 199,  808 => 196,  805 => 195,  801 => 194,  797 => 192,  795 => 191,  792 => 190,  786 => 189,  784 => 188,  781 => 187,  778 => 186,  775 => 185,  773 => 184,  770 => 183,  767 => 182,  762 => 181,  760 => 180,  757 => 179,  754 => 178,  751 => 177,  747 => 175,  741 => 174,  738 => 173,  735 => 172,  732 => 171,  727 => 170,  724 => 168,  718 => 167,  715 => 166,  710 => 165,  707 => 164,  704 => 162,  701 => 161,  699 => 160,  692 => 157,  689 => 156,  687 => 155,  684 => 154,  681 => 153,  679 => 152,  677 => 151,  674 => 150,  671 => 149,  665 => 148,  659 => 147,  656 => 146,  651 => 145,  646 => 144,  643 => 142,  637 => 141,  634 => 140,  629 => 139,  627 => 138,  624 => 137,  621 => 136,  603 => 135,  579 => 122,  576 => 121,  570 => 119,  568 => 118,  563 => 117,  561 => 116,  556 => 114,  553 => 113,  550 => 112,  547 => 111,  544 => 110,  541 => 109,  539 => 108,  536 => 107,  533 => 106,  513 => 105,  489 => 92,  484 => 91,  465 => 90,  440 => 84,  436 => 83,  433 => 82,  428 => 80,  425 => 79,  423 => 78,  419 => 77,  415 => 76,  411 => 74,  408 => 73,  386 => 72,  363 => 68,  357 => 65,  350 => 61,  347 => 60,  343 => 58,  341 => 57,  330 => 56,  308 => 55,  283 => 50,  279 => 48,  261 => 47,  236 => 42,  232 => 40,  214 => 39,  190 => 35,  183 => 34,  163 => 33,  139 => 30,  121 => 29,  97 => 26,  77 => 25,  66 => 280,  63 => 245,  60 => 125,  57 => 95,  54 => 88,  51 => 70,  48 => 54,  45 => 46,  42 => 38,  39 => 32,  36 => 28,);
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
{% macro form_label_tooltip(name, tooltip, placement) %}
    {{ form_label(name, null, {'label_attr': {'tooltip': tooltip, 'tooltip_placement': placement|default('top')}}) }}
{% endmacro %}

{% macro check(variable) %}
  {{ variable is defined and variable|length > 0 ? variable : false }}
{% endmacro %}

{% macro tooltip(text, icon, position) %}
  <span data-toggle=\"pstooltip\" class=\"label-tooltip\" data-original-title=\"{{ text }}\" data-html=\"true\" data-placement=\"{{ position|default('top') }}\">
    <i class=\"material-icons\">{{ icon }}</i>
  </span>
{% endmacro %}

{% macro infotip(text)%}
<div class=\"alert alert-info\" role=\"alert\">
  <p class=\"alert-text\">
    {{ text }}
  </p>
</div>
{% endmacro %}

{% macro warningtip(text)%}
<div class=\"alert alert-warning\" role=\"alert\">
  <p class=\"alert-text\">
    {{ text }}
  </p>
</div>
{% endmacro %}

{% macro label_with_help(label, help, class = '', for = '', isRequired = false) %}
<label{% if for is not empty %} for=\"{{ for }}\"{% endif %} class=\"form-control-label {{ class }}\">
  {% if isRequired %}
    <span class=\"text-danger\">*</span>
  {% endif %}

  {{ label }}
  <span
    class=\"help-box\"
    data-toggle=\"popover\"
    data-content=\"{{ help }}\">
  </span>
</label>
<p class=\"sr-only\">{{ help }}</p>
{% endmacro %}

{# Table column headers with sorting indicators #}
{% macro sortable_column_header(title, sortColumnName, orderBy, sortOrder, prefix) %}
  {% set sortOrder, orderBy, prefix = sortOrder|default(''), orderBy|default, prefix|default('') %}
  <div
      class=\"ps-sortable-column\"
      data-sort-col-name=\"{{ sortColumnName }}\"
      data-sort-prefix=\"{{ prefix }}\"
      {% if orderBy == sortColumnName %}
        data-sort-is-current=\"true\"
        data-sort-direction=\"{{ sortOrder == 'desc' ? 'desc' : 'asc' }}\"
      {% endif %}
    >
      <span role=\"columnheader\">{{ title }}</span>
      <span role=\"button\" class=\"ps-sort\" aria-label=\"{{ 'Sort by'|trans({}, 'Admin.Actions') }}\"></span>
    </div>
  </th>
{% endmacro %}

{# Show link to import file sample #}
{% macro import_file_sample(label, filename) %}
    <a class=\"list-group-item list-group-item-action\" href=\"{{ path('admin_import_sample_download', {'sampleName': filename}) }}\">
        {{ label|trans({}, 'Admin.Advparameters.Feature') }}
    </a>
{% endmacro %}

{#
  Show form widget with errors rendered below it. It displays all nested errors for any form type.
  If form type has error_by_locale parameter set then the error is being displayed with the specific locale assigned to it.
  If form type has errors_by_locale parameter set then the errors are being assigned to the locales and are displayed
  in the popover template.
  If there are more then one error it also assigns all errors in the pop-up to appear.
  On page load, user sees only the errors count but then user hovers over the element the popover
  appears with the errors combined by language.
#}
{% macro form_widget_with_error(form, vars, extraVars) %}
  {% import '@PrestaShop/Admin/macros.html.twig' as self %}

  {% set vars = vars|default({}) %}
  {% set extraVars = extraVars|default({}) %}
  {% set attr = vars.attr|default({}) %}
  {% set attr = attr|merge({'class': (attr.class is defined ? attr.class : '')} ) %}
  {% set vars = vars|merge({'attr': attr}) %}

  {{ form_widget(form, vars) }}

  {% if extraVars.help is defined and extraVars.help%}
      <small class=\"form-text\">{{ extraVars.help }}</small>
    {% elseif form.vars.help is defined and form.vars.help %}
      <small class=\"form-text\">{{ form.vars.help }}</small>
  {% endif %}

  {{ self.form_error_with_popover(form) }}

{% endmacro %}

{#
  It displays all nested errors for any form type.
  If form type has error_by_locale parameter set then the error is being displayed with the specific locale assigned to it.
  If form type has errors_by_locale parameter set then the errors are being assigned to the locales and are displayed
  in the popover template.
  If there are more then one error it also assigns all errors in the pop-up to appear.
  On page load, user sees only the errors count but then user hovers over the element the popover
  appears with the errors combined by language.
#}
{% macro form_error_with_popover(form) %}
  {% set errors = [] %}

  {% if form.vars.valid is defined and not form.vars.valid  %}
    {% for parentError in form.vars.errors %}
      {% set errors = errors|merge([parentError.message]) %}
    {% endfor %}

    {#iterating over child errors because errors can be nested#}
    {% for child in form.children %}
      {% for error in child.vars.errors %}
        {% set errors = errors|merge([error.message]) %}
      {% endfor %}
    {% endfor %}
  {% endif %}

  {% if errors|length > 0 %}
    {# for form types which has locales and there are more then 1 error , additional errors are displaying inside popover #}
    {% set errorPopover = null %}

    {% if errors|length > 1 %}
      {% set popoverContainer = 'popover-error-container-'~form.vars.id %}
      <div class=\"{{ popoverContainer }}\"></div>


      {% if form.vars.errors_by_locale is defined %}
          {% set popoverErrors = form.vars.errors_by_locale %}

          {# collecting translatable errors - the ones which has locale name attached #}
          {% set translatableErrors = [] %}
          {% for translatableError in popoverErrors %}
            {% set translatableErrors = translatableErrors|merge([translatableError.error_message]) %}
          {% endfor %}

          {# if an error found which does not exist in translatable errors array - it adds it to the popover error container #}
          {% for error in errors %}
            {% if error not in translatableErrors %}
              {% set popoverErrors = popoverErrors|merge([error]) %}
            {% endif %}
          {% endfor %}

        {% else %}
          {% set popoverErrors = errors %}
      {% endif %}

      {% set errorMessages = [] %}
      {% for popoverError in popoverErrors %}
        {% set errorMessage = popoverError %}

        {% if popoverError.error_message is defined and popoverError.locale_name is defined %}
          {% set errorMessage = '%error_message% - Language: %language_name%'|trans({'%error_message%': popoverError.error_message, '%language_name%': popoverError.locale_name}, 'Admin.Notifications.Error') %}
        {% endif %}

        {% set errorMessages = errorMessages|merge([errorMessage]) %}
      {% endfor %}

      {% set popoverErrorContent %}
        <div class=\"popover-error-list\">
          <ul>
            {% for popoverError in errorMessages %}
              <li class=\"text-danger\">
                {{ popoverError }}
              </li>
            {% endfor %}
          </ul>
        </div>
      {% endset %}

      <template class=\"js-popover-error-content\" data-id=\"{{ form.vars.id }}\">
        {{ popoverErrorContent }}
      </template>

      {% set errorPopover %}
        <span
          data-toggle=\"form-popover-error\"
          data-id=\"{{ form.vars.id }}\"
          data-placement=\"bottom\"
          data-template='<div class=\"popover form-popover-error\" role=\"tooltip\"><h3 class=\"popover-header\"></h3><div class=\"popover-body\"></div></div>'
          data-trigger=\"hover\"
          data-container=\".{{ popoverContainer }}\"
        >
          <i class=\"material-icons form-error-icon\">error_outline</i> <u>{{ '%count% errors'|transchoice(popoverErrors|length, {}, 'Admin.Global') }}</u>
        </span>
      {% endset %}

    {% elseif form.vars.error_by_locale is defined %}
      {% set errorByLocale = '%error_message% - Language: %language_name%'|trans({'%error_message%': form.vars.error_by_locale.error_message, '%language_name%': form.vars.error_by_locale.locale_name}, 'Admin.Notifications.Error') %}
      {% set errors = [errorByLocale] %}
    {% endif %}

    <div class=\"invalid-feedback-container\">
      {% if errorPopover is not null %}
        <div class=\"text-danger\">
          {{ errorPopover }}
        </div>
      {% else %}
        <div class=\"d-inline-block text-danger align-top\">
          <i class=\"material-icons form-error-icon\">error_outline</i>
        </div>
        <div class=\"d-inline-block\">
          {% for error in errors %}
            <div class=\"text-danger\">
              {{ error }}
            </div>
          {% endfor %}
        </div>
      {% endif %}
    </div>
  {% endif %}
{% endmacro %}

 {#
  Helper function to render most common structure for single input
  @param form - form view to render
  @param vars - custom vars that are passed to form_widget
  @param extraVars - parameters that are not related to form_widget, but are needed for input (label, help text & etc.)
 #}
{% macro form_group_row(form, vars, extraVars) %}
  {% import '@PrestaShop/Admin/macros.html.twig' as self %}

  {% set class = extraVars.class|default('') %}

  <div class=\"form-group row {{ class }}\">
    {% set extraVars = extraVars|default({}) %}

    {% if extraVars.label is defined %}
      {% set isRequired = form.vars.required|default(false) %}

      {% if extraVars.required is defined %}
        {% set isRequired = extraVars.required %}
      {% endif %}

      <label for=\"{{ form.vars.id }}\" class=\"form-control-label\">
        {% if isRequired %}
          <span class=\"text-danger\">*</span>
        {% endif %}
        {{ extraVars.label }}
      </label>
    {% endif %}

    <div class=\"col-sm\">
      {{ self.form_widget_with_error(form, vars, extraVars) }}
    </div>
  </div>
{% endmacro %}

{% macro multistore_switch(form, extraVars) %}
  {% import '@PrestaShop/Admin/macros.html.twig' as self %}
  {% if form.shop_restriction_switch is defined %}
    {% set defaultLabel %}
      <strong>{{ 'Check / Uncheck all'|trans({}, 'Admin.Actions') }}</strong> <br>
      {{ 'You are editing this page for a specific shop or group. Click \"Yes\" to check all fields, \"No\" to uncheck all.'|trans({}, 'Admin.Design.Help') }} <br>
      {{ 'If you check a field, change its value, and save, the multistore behavior will not apply to this shop (or group), for this particular parameter.'|trans({}, 'Admin.Design.Help') }}
    {% endset %}

    {% if extraVars.help is not defined %}
      {% set extraVars = extraVars|merge({'help': defaultLabel}) %}
    {% endif %}

    {% set vars = { 'attr': { 'class': 'js-multi-store-restriction-switch'}} %}

    {{ self.form_group_row(form.shop_restriction_switch, vars, extraVars) }}
  {% endif %}
{% endmacro %}
", "@PrestaShop/Admin/macros.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/macros.html.twig");
    }
}
