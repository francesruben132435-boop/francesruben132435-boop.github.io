  </main>

  <script>
    // Accordion behaviour
    document.querySelectorAll('.accordion-header').forEach(header => {
      header.addEventListener('click', () => {
        const target = header.getAttribute('data-target');
        const content = document.getElementById(target);
        const icon = header.querySelector('.accordion-icon');
        const isActive = content && content.classList.contains('active');

        document.querySelectorAll('.accordion-content.active').forEach(item => {
          if (item.id !== target) {
            item.classList.remove('active');
            const prev = item.previousElementSibling;
            if (prev) prev.querySelector('.accordion-icon').textContent = '+';
          }
        });

        if (!content) return;
        if (isActive) {
          content.classList.remove('active');
          icon.textContent = '+';
        } else {
          content.classList.add('active');
          icon.textContent = '−';
        }
      });
    });

    // Dropdown toggle for touch / click devices
    (function(){
      document.addEventListener('click', function(e){
        var toggle = e.target.closest && e.target.closest('.dropdown-toggle');
        if (toggle) {
          var dropdown = toggle.closest('.nav-dropdown');
          if (dropdown) dropdown.classList.toggle('open');
          return;
        }
        // Close any open dropdowns when clicking outside
        document.querySelectorAll('.nav-dropdown.open').forEach(function(nd){
          if (!nd.contains(e.target)) nd.classList.remove('open');
        });
      });
    })();
  </script>
</body>
</html>
