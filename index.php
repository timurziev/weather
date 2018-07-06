<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<!--meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"-->
	<title>Title</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="icon" href="img/favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div id="app" class="row">
		<div class="col-md-8 offset-md-2">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>City</th>
							<th>Temperature</th>
							<th>Max temperature</th>
							<th>Min temperature</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="item in data">
							<td>{{ item.id }}</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- <router-link to="/">Home page</router-link>
    	<router-link to="/about">About page</router-link>

    	<router-view></router-view> -->
	</div>
</body>
<footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script> window.jQuery || document.write('<script src="js/jquery-3.1.0.min.js"><\/script>')</script>
	<script src="js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
	<script>
		const proxy = "https://cors-anywhere.herokuapp.com/";
		const NotFound = { template: '<p>Page not found</p>' }
		const Home = { template: '<p>home page</p>' }
		const About = { template: '<p>about page</p>' }

		const routes = [
		  { path: '/', component: Home },
  		  { path: '/about', component: About }
		]

		const router = new VueRouter({
		  routes
		})

		var app = new Vue({
			router,
		  el: '#app',
			data() {
				return {
					data: null,
					currentRoute: window.location.pathname
				};
			},

			mounted() {
				axios
				.get(proxy + "https://www.metaweather.com/api/location/44418/2018/07/06")
				.then(response => (this.data = response.data));
			},

			computed: {
			    username () {
			      return this.$route.params.username
			    }
			  }
			})
	</script>
</footer>
</html>
