
  <!-- Bootstrap core JavaScript -->
  <script src="{{URL::asset('assets/vendor/jquery/jquery.min.js')}} "></script>
  <script src="{{URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>