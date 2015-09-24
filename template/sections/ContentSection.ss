<% if Image %>
    <img class="image" data-interchange="
        [{$Image.CroppedImage(400, 400).URL}, (small)],
        [{$Image.CroppedImage(500, 500).URL}, (medium)],
        [{$Image.CroppedImage(600, 600).URL}, (large)],
        " />
<% end_if %>
<% if Title %>
	<h2 class="title">$Title</h2>
<% end_if %>
<% if Content %>
	<div class="content">$Content</div>
<% end_if %>
