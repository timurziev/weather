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
							<th>Weather state</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="city in cities">
							<td><router-link :to="{ path: '/weather/' +  city.id }">{{ city.name }}</router-link></td>
							<td>{{ city.temp ? (Math.round(city.temp * 100)/100).toFixed(0) : '' }} °C</td>
							<td>{{ city.max_temp ? (Math.round(city.max_temp * 100)/100).toFixed(0) : '' }} °C</td>
							<td>{{ city.min_temp ? (Math.round(city.min_temp * 100)/100).toFixed(0) : '' }} °C</td>
							<td><img style="width: 20px" :src="'https://www.metaweather.com/static/img/weather/ico/' + city.state + '.ico'" alt=""></td>
						</tr>
					</tbody>
				</table>
				<router-view></router-view>
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
		const proxy = "https://cryptic-headland-94862.herokuapp.com/";
		const NotFound = { template: '<p>Page not found</p>' }
		const Home = { template: '<p>home page</p>' }
		const About = { template: '<p>about page</p>' }

		const routes = [
		  { path: '/', component: Home },
  		  { path: '/weather/:woeid', component: About }
		]

		const router = new VueRouter({
		  routes
		})

		var app = new Vue({
			router,
		  el: '#app',
			data() {
				return {
					data: [],
					icon: null,
					cities: [
						{ name: 'Istanbul', id: 2344116, temp: '', max_temp: '', min_temp: '', state: '' },
						{ name: 'Berlin', id: 638242, temp: '', max_temp: '', min_temp: '', state: '' },
						{ name: 'London', id: 44418, temp: '', max_temp: '', min_temp: '', state: '' },
						{ name: 'Helsinki', id: 565346, temp: '', max_temp: '', min_temp: '', state: '' },
						{ name: 'Dublin', id: 560743, temp: '', max_temp: '', min_temp: '', state: '' },
						{ name: 'Vancouver', id: 9807, temp: '', max_temp: '', min_temp: '', state: '' }
					],
					currentRoute: window.location.pathname
				};
			},

			

			mounted() {
				var requests = [];

				this.cities.forEach(function(value, key) {
					requests.push(axios.get(proxy + "https://www.metaweather.com/api/location/" + value.id + "/2018/07/06"));
				});


				axios.all(requests)
				.then(function(results) {
					console.log(results);
					results.forEach(function(value, key) {
							this.cities[key].temp = value.data[35].the_temp
							this.cities[key].max_temp = value.data[35].max_temp
							this.cities[key].min_temp = value.data[35].min_temp
							this.cities[key].state = value.data[35].weather_state_abbr
					}.bind(this))
				}.bind(this))
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
