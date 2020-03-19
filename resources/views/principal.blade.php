
<!DOCTYPE html>
<html>
  <head>
    <title>Mapa Coronavirus Sattlink</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 97%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 97%;
        margin: 0;
        padding: 0;
      }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  </head>
  <body>
    <nav class=" navbar-expand-lg navbar navbar-dark bg-primary">
      <a class="navbar-brand" href="/">MiAppshop by Sattlink©</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/conocenos">Quienes somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/recomendacion">Cuidados</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="alert alert-primary" role="alert">
      Selecciona  en el mapa las ubicaciones para ver más información
    </div>

   
    <!-- Footer  <div id="map"></div> -->
<footer class="page-footer font-small blue bg-primary">
 
  <!-- Copyright -->
  <div class="footer-copyright text-center py-2">
   
   
    © 2020 Copyright:
    
    <a style="color: white;"href="http://sattlink.com/">Mi AppShop by Sattlink© </a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:0, lng: 0},
          zoom: 2
        });
        renderData()
        async function getData() {
      const response = await fetch('https://wuhan-coronavirus-api.laeyoung.endpoint.ainize.ai/jhu-edu/latest')
      const data = await response.json()
      return data
    }
    function renderExtraData({ confirmed, deaths, recovered, provincestate, countryregion }) {
      return (`
        <div>
          <p> <strong>${provincestate} - ${countryregion}</strong> </p>
          <p> confirmados: ${confirmed} </p>
          <p> muertes: ${deaths} </p>
          <p> recuperados: ${recovered} </p>
        </div>
      `)
    }

    const popup = new window.google.maps.InfoWindow()
    async function renderData() {
      const data = await getData()

      data.forEach(item => {
        if(item.confirmed>0){
        const marker = new window.google.maps.Marker({
          position: {
            lat: item.location.lat,
            lng: item.location.lng,
          },
          map,
          //icon,
          title: String(item.confirmed),
        })
        marker.addListener('click', () => {
          popup.setContent(renderExtraData(item))
          popup.open(map, marker)
        })
        }
      })
    }




      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDn-SItPueeJksJgURjiGNpeHjhzCef9iM&callback=initMap"
    async defer></script>
  </body>
</html>






