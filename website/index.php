<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<div class="mydata"></div>
	<button onclick="read_data()">Fetch Data</button>
	<br>
	<br>
	<button onclick="next()">Next ></button>
	<br>
	<br>
	<button onclick="prev()">< Previous</button>

	<script type="text/javascript">
		var id = 1

		function read_data() {
			const mydiv = document.querySelector(".mydata")
			mydiv.innerHTML = "Loading ..."

			var url = 'https://sites.local/api.development.sample/api/public/users/2b5c1bd5-3e2a-4e6a-b9de-910695014618'
			fetch(url)
			.then(function(resp) {
				return resp.json()
			})
			.then(function(data) {
				data = data[0];
				console.log(data.user_id)
				mydiv.innerHTML =  `
					<div>
						<p>${data.user_fullname}</p>
					</div>
				`;
			}).catch(function(err) {
				alert(err);
			})
		}

		function next() {
			id += 1;
			read_data()
		}

		function prev() {
			id -= 1
			if (id < 1) {
				id = 1
			}
			read_data()
		}
	</script>
</body>
</html>