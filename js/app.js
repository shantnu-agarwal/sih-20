window.addEventListener('load', () => {
	let long;
	let lat;
	let temperatureDescription = document.querySelector('.temp-desc');
	let temperatureDegree = document.querySelector('.temp-degree');
	let locationTimezone = document.querySelector('.location-timezone');
	let temperatureSection = document.querySelector('.temperature');
	let temperatureSpan = document.querySelector('.temperature span');

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition((position) => {
			long = position.coords.longitude;
			lat = position.coords.latitude;

			const proxy = 'https://cors-anywhere.herokuapp.com/';
			const api = `${proxy}https://api.darksky.net/forecast/d6132541ed58f719a3668e19e929da7c/${lat},${long}`;

			fetch(api)
				.then((response) => {
					return response.json();
				})
				.then((data) => {
					const { temperature, summary, icon } = data.currently;

					// set DOM elements from the API
					temperatureDegree.textContent = temperature;
					temperatureDescription.textContent = summary;
					locationTimezone.textContent = data.timezone;

					// FORMULA for Celsius
					let celsius = (temperature - 32) * (5 / 9);

					// set Icon
					setIcons(icon, document.querySelector('.icon'));

					// change temperature to celsius/farenheit
					temperatureSection.addEventListener('click', () => {
						if (temperatureSpan.textContent === '°F') {
							temperatureSpan.textContent = '°C';
							temperatureDegree.textContent = Math.floor(celsius);
						} else {
							temperatureSpan.textContent = '°F';
							temperatureDegree.textContent = temperature;
						}
					});
				});
		});
	}

	function setIcons(icon, iconID) {
		const skycons = new Skycons({ color: 'white' });
		const currentIcon = icon.replace(/-/g, '_').toUpperCase();
		skycons.play();

		return skycons.set(iconID, Skycons[currentIcon]);
	}
});
