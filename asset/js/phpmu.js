var maxAmount = 160;
function textCounter(textField, showCountField) {
	if (textField.value.length > maxAmount) {
	  textField.value = textField.value.substring(0, maxAmount);
	}else{ 
	  showCountField.value = maxAmount - textField.value.length;
	}
}

$(document).on("click", ".open-AddBookDialog", function () {
   var myBookId = $(this).data('id');
   var myBookId1 = $(this).data('id1');
   $(".modal-body #bookId").val(myBookId);
   $(".modal-body #bookId1").val(myBookId1);
});