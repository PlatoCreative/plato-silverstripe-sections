<% if Image %>
    <img class="image" data-interchange="
        [{$Image.Fill(400, 400).Link}, small],
        [{$Image.Fill(500, 500).Link}, medium],
        [{$Image.Fill(600, 600).Link}, large],
        " />
<% end_if %>
<% if Title %>
	<h2 class="title">$Title</h2>
<% end_if %>
<% if Content %>
	<div class="content">$Content</div>
<% end_if %>
