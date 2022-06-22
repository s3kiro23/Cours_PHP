
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<form action="javascript:connect();">
	<label> Utilisateur</label>
	<input type="text" id="login" class="field"/>
	<label> Mot de passe </label>
	<input type="password" id="passwd" class="field"/>
	<input type="submit" value="connexion"/>
</form>


<script>

function connect(){

	let login = $('#login').val();
	console.log("login = " + login);

	let passwd = $('#passwd').val();
	console.log("pwd = " + passwd);

    $.ajax({
		url: 'connect.php',
		dataType: 'JSON',
		type: 'POST',
		data: {
			request: 'connexion',
			password: passwd,
			login: login,
		},
		success: function(response) {

			if (response['status'] == 0){

				iziToast.error({

					timeout: 3000,
					progressBar: true,
					message: response['msg'],
					position: 'topRight',

				});

			}
			else{

				iziToast.success({

					timeout: 3000,
					progressBar: true,
					message: response['msg'],
					position: 'topRight',

				});

				console.log('Success');

			}

		},
		error: function() {
			
		}
	});
    }

</script>