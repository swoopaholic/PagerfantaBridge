Pagerfanta Bridge
=================

This small library is intended to remove the dependency on the Pagerfanta bundle and it's twig extensions.
By using the view, you can create a template to render the pager.

Installation
------------

All the installation instructions are located in the documentation.

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    LICENSE


Twig example
-------

Create a macro template for rendering the pager:

```twig
{% block page_first %}
    <li{% if pager.currentPage <= 1 %} class="disabled"{% endif %}><a href="{{ pager.first }}">&laquo;</a></li>
{% endblock %}

{% block page_last %}
    <li{% if pager.currentPage >= pager.pages|length %} class="disabled"{% endif %}><a href="{{ pager.last }}">&raquo;</a></li>
{% endblock %}

{% block page_prev %}
    <li{% if pager.currentPage <= 1 %} class="disabled"{% endif %}><a href="{{ pager.prev }}">&larr;</a></li>
{% endblock %}

{% block page_next %}
    <li{% if pager.currentPage >= pager.pages|length %} class="disabled"{% endif %}><a href="{{ pager.next }}">&rarr;</a></li>
{% endblock %}

{% block page_link %}
    <li{% if active %} class="active"{% endif %}><a href="{{ item.url }}">{{ item.content }}</a></li>
{% endblock %}

{% macro pager(pager) %}
    {% if pager.count > 1 %}
        <ul class="pagination">
            {{ block('page_first') }}
            {{ block('page_prev') }}
            {% for number,page in pager.pages %}
                {% set item = {'url': page, 'content': number} %}
                {% set active = number == pager.currentPage %}
                {{ block('page_link') }}
            {% endfor %}
            {{ block('page_next') }}
            {{ block('page_last') }}
        </ul>
    {% endif %}
{% endmacro %}
```

Using the macro 'pager' in a template with the view ('pagerfanta') is easy:

``` twig
{% import 'MyLayoutTemplatesBundle:Navigation:pager.html.twig' as pager %}

...

{{ pager.pager(pagerfanta) }}
```
