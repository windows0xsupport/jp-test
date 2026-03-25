
  //navigator.keyboard.lock();
  document.onkeydown = function (e) {
    if (e.key === 'Escape' || e.keyCode === 27) {
      e.preventDefault();
  }
  return false;
  }
  