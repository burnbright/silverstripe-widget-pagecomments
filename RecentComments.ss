<% if Comments %>
	<ul>
	<% control Comments %>
		<li>$Name on <a href="$Link" title="$Created.Date - {$Comment.LimitWordCountXML}...">$Parent.Title</a></li>
	<% end_if %>
	</ul>
<% end_if %>