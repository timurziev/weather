<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<!--meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"-->
	<title>Title</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="icon" href="img/favicon.ico">
</head>
<body>
	<div id="app">
		{{ info }}
	</div>
</body>
<footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script> window.jQuery || document.write('<script src="js/jquery-3.1.0.min.js"><\/script>')</script>
	<script src="js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	
	<script>
		var app = new Vue({
		  el: '#app',
			data() {
				return {
					info: null
				};
			},

			mounted() {
				axios
				.get("https://www.metaweather.com/api/location/search/?query=san")
				.then(response => (this.info = response));
			}
		})
	</script>
</footer>
</html>
