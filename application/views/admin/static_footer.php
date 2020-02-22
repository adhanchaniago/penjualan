<div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="">Contribute by Anggun.</a>
  </div>
</body>
</html>
<script>
  feather.replace();  
  $(document).ready(function(){
      $('.nav-item').on('click', function(){
          $(this).addClass('active');
          $('.nav-item').css({
            'color' : '#ffcc00'
          })
      })
  });
</script>