 <style>body {padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */}</style>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-wysihtml5-0.0.2.css"/>
<script type="text/javascript">
function checkall(){

for (var i = 0; i < document.frmaction.elements.length; i++) {

var e = document.frmaction.elements[i];

if ((e.name != 'chkall') && (e.type == 'checkbox')) {

e.checked = document.frmaction.chkall.checked;

}}}


</script>