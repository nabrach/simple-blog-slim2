<h1>Posts</h1>

{% if posts is empty %}
	<p>No posts yes</p>
{% else %}
	{% for post in posts %}
	    <div class="posts">
	    	<h2><a href="#">{{post.title}}</a></h2>
	    	<p>{{post.body[:50]}}</p>
	    	<div class="author">
	    		By: {{post.author}}
	    	</div>
	    </div>
	{% endfor %}
{% endif %}