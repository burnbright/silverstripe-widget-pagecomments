<% if Comments %>
	<ul>
	<% control Comments %>
		<li><% if Name %>$Name on <% end_if %><a href="$Link" title="$Created.Date - {$Comment.LimitWordCountXML}...">$Parent.Title</a></li>
	<% end_if %>
	</ul>
<% end_if %>