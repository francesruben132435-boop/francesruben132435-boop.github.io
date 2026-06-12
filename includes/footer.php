  </main>

  <script>
    document.querySelectorAll('.accordion-header').forEach(header => {
      header.addEventListener('click', () => {
        const target = header.getAttribute('data-target');
        const content = document.getElementById(target);
        const icon = header.querySelector('.accordion-icon');
        const isActive = content.classList.contains('active');

        // Cerrar otros acordeones abiertos
        document.querySelectorAll('.accordion-content.active').forEach(item => {
          if (item.id !== target) {
            item.classList.remove('active');
            item.previousElementSibling.querySelector('.accordion-icon').textContent = '+';
          }
        });

        // Toggle el actual
        if (isActive) {
          content.classList.remove('active');
          icon.textContent = '+';
        } else {
          content.classList.add('active');
          icon.textContent = '−';
        }
      });
    });
  </script>
</body>Array.from(document.querySelectorAll('.product-card')).map((c,i)=>({
  i,
  classes:[...c.classList],
  hasCardInner: !!c.querySelector('.card-inner'),
  hasFront: !!c.querySelector('.card-front'),
  hasBack: !!c.querySelector('.card-back'),
  rect: c.getBoundingClientRect()
}))
</html>
