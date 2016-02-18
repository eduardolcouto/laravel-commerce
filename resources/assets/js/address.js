var Address = {
		init: function(){
			Address.isSameDelivery();
		},
		isSameDelivery: function(){
			$('#useSameDelivery').change(function(){
				
				if($(this).prop("checked") == true)
				{
					$("input[name='billing[zipcode]'").val($("input[name='delivery[zipcode]'").val());
					$("input[name='billing[address]'").val($("input[name='delivery[address]'").val());
					$("input[name='billing[city]'").val($("input[name='delivery[city]'").val());
					$("input[name='billing[state]'").val($("input[name='delivery[state]'").val());
					$("input[name='billing[country]'").val($("input[name='delivery[country]'").val());
					

				}
				else
				{
					$("input[name*='billing'").each(function(){
						$(this).val('');
					});
				}
			});
		},

	};
$(document).ready(function(){
	Address.init();
});