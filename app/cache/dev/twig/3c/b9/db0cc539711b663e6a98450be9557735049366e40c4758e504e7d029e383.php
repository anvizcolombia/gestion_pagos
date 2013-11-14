<?php

/* WebProfilerBundle:Profiler:toolbar_redirect.html.twig */
class __TwigTemplate_3cb9db0cc539711b663e6a98450be9557735049366e40c4758e504e7d029e383 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("TwigBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Redirection Intercepted";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"sf-reset\">
        <div class=\"block-exception\">
            <h1>This request redirects to <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "</a>.</h1>

            <p>
                <small>
                    The redirect was intercepted by the web debug toolbar to help debugging.
                    For more information, see the \"intercept-redirects\" option of the Profiler.
                </small>
            </p>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_redirect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 11,  58 => 18,  20 => 1,  167 => 62,  160 => 57,  127 => 45,  113 => 54,  77 => 27,  70 => 24,  134 => 54,  129 => 45,  124 => 6,  97 => 35,  76 => 27,  23 => 1,  148 => 70,  118 => 5,  114 => 43,  104 => 37,  81 => 28,  53 => 15,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 59,  107 => 36,  61 => 13,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 68,  135 => 53,  119 => 42,  102 => 33,  71 => 13,  67 => 25,  63 => 24,  59 => 14,  28 => 3,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 71,  142 => 59,  138 => 54,  136 => 48,  121 => 48,  117 => 42,  105 => 40,  91 => 35,  62 => 24,  49 => 14,  94 => 28,  89 => 30,  85 => 23,  75 => 28,  68 => 12,  56 => 16,  38 => 6,  26 => 6,  93 => 34,  88 => 38,  78 => 18,  87 => 32,  46 => 34,  44 => 11,  31 => 8,  27 => 4,  25 => 5,  21 => 2,  24 => 2,  19 => 1,  79 => 29,  72 => 16,  69 => 25,  47 => 9,  40 => 8,  37 => 6,  22 => 2,  246 => 90,  157 => 74,  145 => 50,  139 => 49,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 55,  108 => 36,  101 => 32,  98 => 34,  96 => 30,  83 => 31,  74 => 30,  66 => 25,  55 => 38,  52 => 18,  50 => 15,  43 => 10,  41 => 5,  35 => 5,  32 => 4,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 46,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 39,  106 => 50,  103 => 32,  99 => 36,  95 => 42,  92 => 28,  86 => 28,  82 => 22,  80 => 41,  73 => 19,  64 => 21,  60 => 22,  57 => 39,  54 => 22,  51 => 37,  48 => 13,  45 => 9,  42 => 8,  39 => 10,  36 => 5,  33 => 5,  30 => 5,);
    }
}
