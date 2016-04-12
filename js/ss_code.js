(function() {
  els = document.getElementsByClassName('ss-code-social-link');
  
  for (var i=0; i < els.length; i++) {
    els[i].onclick = function(e) {
      href = e.target.getAttribute("href");
      w = window.open(this.href, 'targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=475, height=475');
      return false;
    };
  }
})();