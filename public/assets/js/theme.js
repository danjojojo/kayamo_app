(function() {
  "use strict"; // Start of use strict

  var sidebar = document.querySelector('.sidebar');
  var rowcontent = document.querySelector('.row');
  var bottomnavbar = document.querySelector('#nav-wrapper');
  var sidebarTog = document.querySelector('#sidebarToggleTop');
  var homeNavTop = document.querySelector('#homenavtop');
  var sidebarToggles = document.querySelectorAll('#sidebarToggle, #sidebarToggleTop');

  if (sidebar) {
    var collapseEl = sidebar.querySelector('.collapse');
    var collapseElementList = [].slice.call(document.querySelectorAll('.sidebar .collapse'))
    var sidebarCollapseList = collapseElementList.map(function(collapseEl) {
      return new bootstrap.Collapse(collapseEl, { toggle: false });
    });

    for (var toggle of sidebarToggles) {
      // Toggle the side navigation
      toggle.addEventListener('click', function(e) {
        document.body.classList.toggle('sidebar-toggled');
        sidebar.classList.toggle('toggled');

        if (sidebar.classList.contains('toggled')) {
          for (var bsCollapse of sidebarCollapseList) {
            bsCollapse.hide();
          }
        }
      });
    }

    function adjustLayout() {
      var vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);

      if (vw < 768) {
        sidebar.style.display = 'none';
        sidebarTog.style.display = 'none';
        bottomnavbar.style.display = 'block';
        homeNavTop.style.display = 'flex';
        rowcontent.style.marginBottom = '80px';
      } else {
        sidebar.style.display = 'block';
        sidebarTog.style.display = 'block'; // Ensure the sidebar toggle is also displayed
        bottomnavbar.style.display = 'none';
        homeNavTop.style.display = 'none';
        rowcontent.style.marginBottom = '50px';
      }
    }

    // Adjust layout on initial load
    adjustLayout();

    // Adjust layout on window resize
    window.addEventListener('resize', adjustLayout);
  }

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  var fixedNavigation = document.querySelector('body.fixed-nav .sidebar');

  if (fixedNavigation) {
    fixedNavigation.addEventListener('mousewheel DOMMouseScroll wheel', function(e) {
      var vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);

      if (vw > 768) {
        var e0 = e.originalEvent,
          delta = e0.wheelDelta || -e0.detail;
        this.scrollTop += (delta < 0 ? 1 : -1) * 30;
        e.preventDefault();
      }
    });
  }

  var scrollToTop = document.querySelector('.scroll-to-top');

  if (scrollToTop) {
    // Scroll to top button appear
    window.addEventListener('scroll', function() {
      var scrollDistance = window.pageYOffset;

      // Check if user is scrolling up
      if (scrollDistance > 100) {
        scrollToTop.style.display = 'block';
      } else {
        scrollToTop.style.display = 'none';
      }
    });
  }

  document.getElementById('goBackButton').addEventListener('click', function() {
    window.history.back();
  });

})(); // End of use strict
