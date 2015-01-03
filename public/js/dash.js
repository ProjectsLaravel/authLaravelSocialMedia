function showView(id,clases){
  console.debug(id+'    '+ clases);
  $('.'+clases).hide();
  $('#'+id).show();
}
