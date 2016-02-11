var Cart = {
		init: function(){
			Cart.add;
			Cart.remove;
		},
		add: function(id){
			$.ajax('cart/add/'+id)
				.done(function(){
					location.reload();
				})
				.fail(function(){
					alert('Não foi possivel atualizar a quantidade');
			    });
		},

		remove: function(id){
		$.ajax('cart/remove/'+id)
			.done(function(){
				location.reload();
			})
			.fail(function(){
				alert('Não foi possivel atualizar a quantidade');
		    })
		}
	};
$(document).ready(function(){
	Cart.init;
});