$('#formNewTer').hide();
function newTer(){
  $('#formNewTer').show();
  $('#newTer').hide();
  $('#modBtnTer').hide();
  $('#btnAnMod').hide();
}
function annAddTer(){
  $('#formNewTer').hide();
  $('#newTer').show();
  $('#modBtnTer').show();
  $('#btnAnMod').show();
}
function modTer(){
  $('#formNewTer').show();
  $('#modTer1').hide();
  $('#addBtnTer').hide();
  $('#btnAnAdd').hide();
  $('#btnDelTer').hide();
}
function annModTer(){
  $('#formNewTer').hide();
  $('#modTer1').show();
  $('#addBtnTer').show();
  $('#btnAnAdd').show();
  $('#btnDelTer').show();
}
