document.addEventListener('DOMContentLoaded', () => {
    // Initialize AOS
    AOS.init({
      offset: 100,
      duration: 800,
      easing: 'ease-in-out',
      once: true,
      mirror: true,
      anchorPlacement: 'center-bottom'
    });
  
    // Fetch coins data
    const fetchCoinsData = async () => {
      try {
        const response = await fetch('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=bitcoin,ethereum,tether,litecoin,binancecoin&order=market_cap_desc&per_page=5&page=1&sparkline=false');
        const data = await response.json();
        displayCoinsData(data);
      } catch (error) {
        console.error('Error fetching coins data:', error);
      }
    };
  
    // Display coins data
    const displayCoinsData = (coinsData) => {
      const pricesContainer = document.getElementById('prices-container');
      coinsData.forEach((coin, index) => {
        const priceDiv = document.createElement('div');
        priceDiv.classList.add(`price${index + 1}`);
  
        const coinImage = document.createElement('img');
        coinImage.setAttribute('src', coin.image);
        coinImage.setAttribute('alt', `${coin.name} logo`);
        coinImage.setAttribute('width', '23');
        coinImage.setAttribute('height', '23');
        coinImage.setAttribute('data-aos', 'flip-left');
        priceDiv.appendChild(coinImage);
        priceDiv.innerHTML += '<br/>';
  
        const coinName = document.createElement('small');
        coinName.setAttribute('data-aos', 'zoom-in-up');
        coinName.textContent = coin.name.toUpperCase();
        priceDiv.appendChild(coinName);
        priceDiv.innerHTML += '<br/>';
  
        const coinPrice = document.createElement('small');
        coinPrice.setAttribute('data-aos', 'zoom-in-up');
        coinPrice.textContent = `$${coin.current_price}`;
        priceDiv.appendChild(coinPrice);
        priceDiv.innerHTML += '<br/>';
  
        pricesContainer.appendChild(priceDiv);
      });
    };
  
    fetchCoinsData();
  });
  