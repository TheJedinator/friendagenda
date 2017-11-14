<script>
function clearbox(str){
  document.getElementById(str).value = "";
}
</script>
<div class="search">
  <form action="search.php" method="POST">
    <input name="search" type="text" id="search" maxlength="30" class="textfield"  value="search" onfocus="clearbox(this.id)"/>
  </form>
</div>
