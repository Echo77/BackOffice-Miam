$(document).ready(function() {
  $("#close_popup").click(function() {
  	//alert("coucou");
  window.close();
  window.opener.location.reload();
});
});